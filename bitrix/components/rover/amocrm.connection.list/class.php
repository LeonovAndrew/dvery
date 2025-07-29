<?php

/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 02.10.2015
 * Time: 19:12
 *
 * @author Pavel Shulaev (https://rover-it.me)
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use AmoCRM\Exceptions\BadTypeException;
use Bitrix\Main;
use Bitrix\Main\Localization\Loc;
use Rover\AmoCRM\Component\ListBase;
use Rover\AmoCRM\Directory\Entity\Connection;
use Rover\AmoCRM\Service\Message;

if (Main\Loader::includeSharewareModule('rover.amocrm') == Main\Loader::MODULE_DEMO_EXPIRED)
{
    ShowMessage(Loc::getMessage('rover-ac__demo-expired'));
    return;
}

if (!Main\Loader::includeModule('rover.amocrm'))
{
    ShowMessage('rover.amocrm module not found');
    return;
}

/**
 * Class RoverAmoCrmImport
 *
 * @author Pavel Shulaev (https://rover-it.me)
 */
class RoverAmoCrmConnectionList extends ListBase
{
    const GRID_ID = 'amocrm_account_list';

    /**
     * @return array
     * @throws BadTypeException
     * @throws Main\ArgumentNullException
     * @throws Main\LoaderException
     * @throws Main\SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getRows(): array
    {
        $nav        = $this->getNavObject();
        $sort       = $this->getGridSort()['sort'];
        $sortBy     = key($sort);
        $sortOrder  = $sort[$sortBy];

        $query = [
            'offset'        => $nav->getOffset(),
            'limit'         => $nav->getLimit(),
            'count_total'   => true,
            'order'         => [$sortBy => $sortOrder]
        ];

        $connectionsData   = Connection::getList($query);
        $nav->setRecordCount($connectionsData->getCount());

        $curDir = $this->getCurDir();
        $result = array();

        while ($connectionData = $connectionsData->fetch())
        {
            /** @var Connection $connection */
            $connection = Connection::buildByData($connectionData);

            $row = array(
                'id'    => $connection->getId(),
                'data'  => array(
                    'ID'                        => $connection->getId(),
                    Connection::UF_ACTIVE       => $connectionData[Connection::UF_ACTIVE] ? 'Y' : 'N',
                    Connection::UF_NAME         => $connectionData[Connection::UF_NAME],
                    Connection::UF_BASE_DOMAIN  => $connectionData[Connection::UF_BASE_DOMAIN] ?: '-',
                    Connection::UF_SORT         => $connectionData[Connection::UF_SORT],
                    'STATUS'                    => $connection->getStatus(),
                    'BUTTON'                    => '',
                ),
                'columns' => [
                    'STATUS' => $connection->getStatusPict(),
                    'BUTTON' => $connection->getOAuthButton(),
                    Connection::UF_ACTIVE => $connectionData[Connection::UF_ACTIVE] ? Loc::getMessage('rover-ac__yes') : Loc::getMessage('rover-ac__no')
                ],
                'actions' => array(
                    array(
                        'title'     => Loc::getMessage('rover-accl__action-update'),
                        'text'      => Loc::getMessage('rover-accl__action-update'),
                        'default'   => true,
                        'onclick'   => 'document.location.href="' . $curDir . 'rover-acrm__connection-element.php?ID=' . $connectionData['ID'] . '&lang=' . LANGUAGE_ID . '"',
                    ),
                    array(
                        'title'     => Loc::getMessage('rover-accl__action-remove'),
                        'text'      => Loc::getMessage('rover-accl__action-remove'),
                        'onclick'   => 'if (window.confirm("' . Loc::getMessage('rover-accl__action-delete_confirm') .  '")) {document.location.href="' . $curDir . 'rover-acrm__connection-list.php?ID=' . $connectionData['ID'] . '&lang=' . LANGUAGE_ID . '&' . $this->getActionButton() . '=delete&' . bitrix_sessid_get() . "&{$nav->getId()}=page-{$nav->getCurrentPage()}-size{$nav->getPageSize()}\"}",
                    )
                ),
            );

            $result[] = $row;
        }

        return $result;
    }

    /**
     * @return array[]
     * @throws Main\ArgumentNullException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getColumns(): array
    {
        return array(
            array(
                'id'        => 'ID',
                'name'      => 'ID',
                'default'   => false,
                'sort'      => 'ID'
            ),
            array(
                'id'        => Connection::UF_NAME,
                'name'      => Connection::getFieldL18n(Connection::UF_NAME),
                'default'   => true,
                'sort'      => Connection::UF_NAME,
            ),
            array(
                'id'        => Connection::UF_ACTIVE,
                'name'      => Connection::getFieldL18n(Connection::UF_ACTIVE),
                'default'   => true,
                'sort'      => Connection::UF_ACTIVE,
            ),
            array(
                'id'        => Connection::UF_BASE_DOMAIN,
                'name'      => Connection::getFieldL18n(Connection::UF_BASE_DOMAIN),
                'default'   => true,
                'sort'      => Connection::UF_BASE_DOMAIN,
            ),
            array(
                'id'        => Connection::UF_SORT,
                'name'      => Connection::getFieldL18n(Connection::UF_SORT),
                'default'   => true,
                'sort'      => Connection::UF_SORT,
            ),
            array(
                'id'        => 'STATUS',
                'name'      => Loc::getMessage('rover-accl__header-STATUS'),
                'default'   => true,
            ),
            array(
                'id'        => 'BUTTON',
                'name'      => Loc::getMessage('rover-accl__header-BUTTON'),
                'default'   => true,
            )
        );
    }

    /**
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function requestProcess()
    {
        $request = Main\Application::getInstance()->getContext()->getRequest();
        if ($request->get('OK_MESSAGE'))
            Message::addOk($request->get('OK_MESSAGE'));

        if ($request->get('ERROR_MESSAGE'))
            Message::addError($request->get('ERROR_MESSAGE'));

        switch ($this->getRequestAction()){
            case 'delete':
                $this->requestDelete();
                break;
            /*case 'edit':
                $this->requestEdit();
                break;
            case 'activate':
                $this->requestSetActive('Y');
                break;
            case 'deactivate':
                $this->requestSetActive('N');
                break;*/
        }
    }

    /**
     * @param $active
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function requestSetActive($active)
    {
        //@TODO
        /*$ids = $this->getRequestIds();
        if (!count($ids))
            return;

        foreach ($ids as $id)
        {
            $profile = IntegrationRule::loadById($id);
            if ($profile)
                $profile->setPresetEnabled($active);
        }*/
    }


    /**
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function requestEdit()
    {
        //@TODO
       /* $fields = $this->request->get('FIELDS');

        foreach ($fields as $presetId => $field)
        {
            $profile = IntegrationRule::loadById($presetId);
            if (!$profile)
                continue;

            foreach ($field as $fieldName => $fieldValue){

                switch ($fieldName) {
                    case 'NAME':
                        $profile->setName($fieldValue);
                        break;
                    case 'ACTIVE':
                        $profile->setPresetEnabled($fieldValue);
                        break;
                    case 'LEAD':
                        $profile->setValue(Tabs::INPUT__LEAD_CREATE, $fieldValue == 'Y' ? 'Y' : 'N');
                        break;
                    case 'CONTACT':
                        $profile->setValue(Tabs::INPUT__CONTACT_CREATE, $fieldValue == 'Y' ? 'Y' : 'N');
                        break;
                    case 'COMPANY':
                        $profile->setValue(Tabs::INPUT__COMPANY_CREATE, $fieldValue == 'Y' ? 'Y' : 'N');
                        break;
                    case 'TASK':
                        if (!$profile->isIncomingLead())
                            $profile->setValue(Tabs::INPUT__TASK_CREATE, $fieldValue == 'Y' ? 'Y' : 'N');
                        break;
                   /* case 'RESPONSIBLE':
                        $profile->setValue(Tabs::INPUT__CURRENT_RESPONSIBLE_ID, $fieldValue);
                        break;*/
          /*      }
            }
        }

        Options::load()->message->addOk(Loc::getMessage('rover-accl__action-update_success'));
        */
    }

    /**
     * @return array|null|string
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getRequestIds()
    {
        $ids = $this->request->get('ID');
        if (!is_array($ids))
            $ids = array($ids);

        return $ids;
    }

    /**
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function requestDelete()
    {
        $ids = $this->getRequestIds();

        if (!count($ids))
            return;

        $uri = new Main\Web\Uri($this->request->getRequestUri());
        $uri->deleteParams(array("ID", $this->getActionButton(), 'sessid'));

        try{
            foreach ($ids as $id)
                Connection::delete($id);

            $uri->addParams(['OK_MESSAGE' => Loc::getMessage('rover-accl__action-remove_success')]);
        } catch (\Exception $e) {
            $uri->addParams(['ERROR_MESSAGE' => Loc::getMessage('rover-accl__action-remove-error', ['#error#' => $e->getMessage()])]);
        }

        LocalRedirect($uri->getUri());
    }

    /**
     * @throws BadTypeException
     * @throws Main\ArgumentNullException
     * @throws Main\ArgumentOutOfRangeException
     * @throws Main\LoaderException
     * @throws Main\SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getResult()
    {
        $this->arResult['ROWS']         = $this->getRows();
        $this->arResult['COLUMNS']      = $this->getColumns();
        $this->arResult['NAV']          = $this->getNavObject();
        $this->arResult['SORT']         = $this->getGridSort();
        $this->arResult['PAGE_SIZES']   = $this->getPageSizes($this->arResult['NAV']);
        //$this->arResult['ACTION_PANEL'] = $this->getActionPanel();
    }

    /**
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function setTitle()
    {
        global $APPLICATION;
        $APPLICATION->SetTitle(Loc::getMessage('rover-accl__title'));
    }

    /**
     * @return void
     * @throws Main\ArgumentException
     * @throws Main\ArgumentNullException
     * @throws Main\ArgumentOutOfRangeException
     * @throws Main\ObjectPropertyException
     * @throws Main\SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    public function executeComponent()
    {
        try {
            $this->setFrameMode(false);
            $this->checkParams();

            $this->requestProcess();
            $this->getResult();
            $this->includeComponentTemplate();
            $this->setTitle();
        } catch (Exception $e) {
            RoverAmoCRM::handleException($e, true);
        }
    }
}