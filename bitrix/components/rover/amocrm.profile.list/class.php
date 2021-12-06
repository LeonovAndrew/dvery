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

use AmoCRM\Exceptions\AmoCRMApiException;
use AmoCRM\Exceptions\AmoCRMoAuthApiException;
use Bitrix\Main;
use Bitrix\Main\Localization\Loc;
use Rover\AmoCRM\Component\ListBase;
use Rover\AmoCRM\Directory\Entity\Connection;
use Rover\AmoCRM\Directory\Entity\Profile;
use Rover\AmoCRM\Model\Source;
use Rover\AmoCRM\Service\Dependence;
use Rover\AmoCRM\Service\Message;
use Rover\AmoCRM\Service\Params;

/**
 * Class RoverAmoCrmImport
 *
 * @author Pavel Shulaev (https://rover-it.me)
 */
class RoverAmoCrmProfileList extends ListBase
{
    const GRID_ID = 'amocrm_preset_list';

    /** @var array */
    protected $amoUsers;

    /**
     * @return array
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getGridSort(): array
    {
        return $this->getGridOptions()->GetSorting(array(
            "sort" => array("ID" => "ASC"),
            "vars" => array("by" => "by", "order" => "order")
        ));
    }

    /**
     * @return array
     * @throws Main\ArgumentException
     * @throws Main\ArgumentNullException
     * @throws Main\ArgumentOutOfRangeException
     * @throws Main\LoaderException
     * @throws Main\ObjectPropertyException
     * @throws Main\SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getRows(): array
    {
        global $APPLICATION;

        $nav        = $this->getNavObject();
        $sort       = $this->getGridSort()['sort'];
        $sortBy     = key($sort);
        $sortOrder  = $sort[$sortBy];
        if (!in_array($sortBy, array_keys(Profile::getAdditionalUfParams())))
            $sortBy = 'ID';

        $query = [
            'offset'        => $nav->getOffset(),
            'limit'         => $nav->getLimit(),
            'count_total'   => true,
            'order'         => [$sortBy => $sortOrder]
        ];

        $profilesData   = Profile::getList($query);
        $nav->setRecordCount($profilesData->getCount());

        $curPage    = $APPLICATION->GetCurPage(true);
        $curDir     = $this->getCurDir();
        $result     = array();

        /** @var Profile $profile */
        foreach ($profilesData as $profileData)
        {
            $profile        = Profile::buildByData($profileData);
            $profileId      = $profile->getId();

            try{
                $connection     = $profile->getConnection();
                $amoUsers       = $connection->isAvailable() ? Params::getAmoUsers($connection) : [];
                $source         = $profile->getSource();
                $sites          = $profile->getAllowedSitesIds();
                $resultsCnt     = $source->getResultsCount();
                $presetName     = $profile->getName();
                $responsibleList= $profile->getResponsibleList();
                $leadCreate     = $profile->isLeadCreate();
                $incomingLead   = $leadCreate && $profile->isUnsorted();

                if ($connection->isAvailable())
                {
                    $responsiblePrint = [];
                    foreach ($responsibleList as $responsibleId)
                    {
                        $responsible = $amoUsers[$responsibleId] ?? '<span style="color: red">' . Loc::getMessage('rover-apl__error_no_responsible') . ' (' . $responsibleId . ')</span>';

                        $responsiblePrint[$responsibleId] = $responsibleId == $profile->getCurrentResponsibleId()
                            ? '<b>' . $responsible . '</b>'
                            : $responsible;
                    }

                    $responsibleColumn = count($responsiblePrint)
                        ? implode('<br>', $responsiblePrint)
                        : Loc::getMessage('rover-apl__default_responsible');

                } else {
                    $responsibleColumn = Loc::getMessage('rover-apl__unavailable');
                }

                $sitesColumns = [];
                foreach ($sites as $siteLid)
                    $sitesColumns[] = '<a href="/bitrix/admin/site_edit.php?lang=' . LANGUAGE_ID . '&LID=' . $siteLid . '">' . $siteLid . '</a>';

                $row = array(
                    'id'    => $profileId,
                    'data'  => array(
                        'ID'                            => $profileId,
                        Profile::UF_NAME                => $presetName,
                        Profile::UF_SOURCE_ID         => $source->getTypeLabel(),
                        Profile::UF_SITES_IDS           => implode(', ', $sites),
                        Profile::UF_ACTIVE              => $profile->isActive() ? 'Y' : 'N',
                        Profile::UF_RESPONSIBLE_LIST    => $responsibleList,
                        Profile::UF_LEAD_CREATE         => $leadCreate ? 'Y' : 'N',
                        Profile::UF_CONTACT_CREATE      => $profile->isContactCreate() ? 'Y' : 'N',
                        Profile::UF_COMPANY_CREATE      => $profile->isCompanyCreate() ? 'Y' : 'N',
                        Profile::UF_TASK_CREATE         => !$incomingLead && $profile->isTaskCreate() ? 'Y' : 'N',
                        'ELEMENTS_CNT'                  => $resultsCnt,
                        Profile::UF_CONNECTION_ID       => $connection->getId()
                    ),
                    'columns' => array(
                        Profile::UF_NAME                => "<a title='" . Loc::getMessage('rover-apl__title-settings', array('#preset-name#' => $presetName))
                            . "' href='{$curDir}rover-acrm__profile-element.php?preset_id=$profileId&lang=" . LANGUAGE_ID . "'>$presetName</a>",
                        'ELEMENTS_CNT' => "<a title='" . Loc::getMessage('rover-apl__title-results', array('#preset-name#' => $presetName))
                            . "' href='{$curDir}rover-acrm__result-list.php?preset_id=$profileId&lang=" . LANGUAGE_ID . "'>$resultsCnt</a>",
                        Profile::UF_SOURCE_ID         => "<a title='{$source->getName()}' href='{$source->getEditUrl()}'>{$source->getName()}</a> ({$source->getTypeLabel()})",
                        Profile::UF_RESPONSIBLE_LIST    => $responsibleColumn,
                        Profile::UF_CONNECTION_ID       => '<div style="display: flex"><span>' . $connection->getStatusPict() . '</span>&nbsp;<span>'
                            . '<a href="/bitrix/admin/rover-acrm__connection-element.php?ID=' . $connection->getId() . '&lang=' . LANGUAGE_ID . '">'
                            . $connection->getName() . '</a>' . ' (' . $connection->getBaseDomain('') . ')'
                            . ($connection->isAvailable() ? '' : ' [' . Loc::getMessage('rover-apl__disabled') . ']') . '</span></div>',
                        Profile::UF_SITES_IDS           => implode(', ', $sitesColumns),
                    ),
                    'actions' => array(
                        array(
                            'TEXT'      => Loc::getMessage('rover-apl__action-update'),
                            'ONCLICK'   => "jsUtils.Redirect(arguments, '" . $curDir ."rover-acrm__profile-element.php?preset_id=" . $profileId . "&lang=" . LANGUAGE_ID . "')",
                            "ICONCLASS" => "edit",
                            'DEFAULT'   => true,
                        ),
                        array(
                            'TEXT'      => Loc::getMessage('rover-apl__action-copy'),
                            'ONCLICK'   => "jsUtils.Redirect(arguments, '" . $curPage . '?' . $this->getActionButton() . '=copy&ID=' . $profileId . "&lang=" . LANGUAGE_ID . "&{$nav->getId()}=page-{$nav->getCurrentPage()}-size{$nav->getPageSize()}')",
                            "ICONCLASS" => "copy"
                        ),
                        array(
                            'TEXT'      => Loc::getMessage('rover-apl__action-elements'),
                            'ONCLICK'   => "jsUtils.Redirect(arguments, '" . $curDir ."rover-acrm__result-list.php?preset_id=" . $profileId . "&lang=" . LANGUAGE_ID . "')",
                            "ICONCLASS" => "view"
                        ),
                        array(
                            'SEPARATOR' => true,
                        ),
                        array(
                            'TEXT'      => Loc::getMessage('rover-apl__action-remove'),
                            'ONCLICK'   => 'if(confirm("' . Loc::getMessage('rover-apl__action-confirm') . '")) window.location="' . $curPage . '?' . $this->getActionButton() . '=delete&ID=' . $profileId . '&' . bitrix_sessid_get()  . "&lang=" . LANGUAGE_ID . "&{$nav->getId()}=page-{$nav->getCurrentPage()}-size{$nav->getPageSize()}\";",
                            "ICONCLASS" => "delete"
                        )
                    ),
                    'editable'  => true,
                    'source'    => $source
                );

                if ($incomingLead){
                    $row['columns']['TASK'] = '<span style="color: #999" title="'
                        . Loc::getMessage('rover-apl__title-task-unavailable') .  '">'
                        . Loc::getMessage('rover-apl__unavailable') . '</span>';
                    $row['data']['TASK'] = '<span>' . $row['data']['TASK'] . '</span>';

                    $row['columns']['LEAD'] = Loc::getMessage('rover-apl__yes')
                        . '<br><span style="color: #999">'
                        . Loc::getMessage('rover-apl__header-UNSORTED') . '</span>';
                    $row['data']['LEAD'] = '<span>' . $row['data']['LEAD'] . '</span>';
                }

                foreach ($row['data'] as $name => $value)
                    $row['data']['~' . $name] = $value;

            } catch (Exception $e) {
                $row = array(
                    'id' => null,
                    'data' =>array(
                        'ID'                            => $profileId,
                        Profile::UF_NAME                => '<span style="color: red">Error: ' . $e->getMessage() . '</span>',
                        Profile::UF_SOURCE_ID         => '-',
                        Profile::UF_SITES_IDS           => '-',
                        Profile::UF_ACTIVE              => '-',
                        Profile::UF_RESPONSIBLE_LIST    => '-',
                        Profile::UF_LEAD_CREATE         => '-',
                        Profile::UF_CONTACT_CREATE      => '-',
                        Profile::UF_COMPANY_CREATE      => '-',
                        Profile::UF_TASK_CREATE         => '-',
                        'ELEMENTS_CNT'                  => 0,
                        Profile::UF_CONNECTION_ID       => '',

                    ),
                    'actions' => array(
                        array(
                            'TEXT'      => Loc::getMessage('rover-apl__action-remove'),
                            'ONCLICK'   => 'if(confirm("' . Loc::getMessage('rover-apl__action-confirm') . '")) window.location="' . $curPage . '?' . $this->getActionButton() . '=delete&ID=' . $profileId . '&' . bitrix_sessid_get() . "&lang=" . LANGUAGE_ID . '";',
                            "ICONCLASS" => "delete"
                        )
                    ),
                    'editable'  => false,
                    'source'    => null
                );

                RoverAmoCRMEvents::handleException($e);
            }

            $result[] = $row;
        }

        return $result;
    }

    /**
     * @param $array
     * @return mixed
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function sort($array)
    {
        $sort   = $this->getGridSort();
        $sort   = $sort['sort'];
        $by     = key($sort);
        $order  = $sort[$by];

        usort($array, function($a, $b) use ($by, $order)
        {
            if (is_numeric($a['data'][$by]) && is_numeric($b['data'][$by]))
                $result = $a['data'][$by] > $b['data'][$by]
                    ? 1 : ($a['data'][$by] < $b['data'][$by]
                        ? -1 : 0);
            else
                $result = strcasecmp($a['data'][$by], $b['data'][$by]);

            if ($order == 'desc')
                $result = $result * (-1);

            return $result;
        });

        return $array;
    }

    /**
     * @return array
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getHeaders(): array
    {
        /*$sites   = [];
        $sitesDB = Main\SiteTable::getList(['select' => ['LID', 'NAME']], ['cache' => ['ttl' => 3600]]);
        while ($site = $sitesDB->fetch())
            $sites[$site['LID']] = '[' . $site['LID'] . '] ' . $site['NAME'];
*/
        return array(
            array(
                'id'        => 'ID',
                'name'      => 'ID',
                'default'   => true,
                'sort'      => 'ID'
            ),
            array(
                'id'        => Profile::UF_ACTIVE,
                'name'      => Loc::getMessage('rover-apl__header-ACTIVE'),
                'default'   => true,
                'sort'      => Profile::UF_ACTIVE,
                'editable'  => true,
                "type"      => "checkbox"
            ),
            array(
                'id'        => Profile::UF_NAME,
                'name'      => Loc::getMessage('rover-apl__header-NAME'),
                'default'   => true,
                'sort'      => Profile::UF_NAME,
                'editable'  => true,
            ),

            array(
                'id'        => Profile::UF_SOURCE_ID,
                'name'      => Loc::getMessage('rover-apl__header-TYPE'),
                'default'   => true,
                'sort'      => Profile::UF_SOURCE_ID
            ),
            array(
                'id'        => Profile::UF_CONNECTION_ID,
                'name'      => Loc::getMessage('rover-apl__header-CONNECTION'),
                'default'   => true,
                // 'sort'      => 'CONNECTION',
                'editable'  => false,
            ),
            array(
                'id'        => Profile::UF_SITES_IDS,
                'name'      => Loc::getMessage('rover-apl__header-SITE'),
                'default'   => true,
               /* 'multiple'  => true,
                'type'      => 'list',
                // 'sort'      => 'TYPE'
                'editable'  => [
                    'items' => $sites
                ]*/
            ),

            array(
                'id'        => Profile::UF_RESPONSIBLE_LIST,
                'name'      => Loc::getMessage('rover-apl__header-RESPONSIBLE'),
                'default'   => true,

                'type'      => 'list',
               /* 'editable'  => [
                    'items' => TabList::getUsers()
                ],
                'params' => [
                    'multiple'  => true,
                ]*/
            ),
            array(
                'id'        => Profile::UF_LEAD_CREATE,
                'name'      => Loc::getMessage('rover-apl__header-LEAD'),
                'default'   => true,
                'sort'      => Profile::UF_LEAD_CREATE,
                'editable'  => true,
                "type"      => "checkbox"
            ),
            array(
                'id'        => Profile::UF_CONTACT_CREATE,
                'name'      => Loc::getMessage('rover-apl__header-CONTACT'),
                'default'   => true,
                'sort'      => Profile::UF_CONTACT_CREATE,
                'editable'  => true,
                "type"      => "checkbox"
            ),
            array(
                'id'        => Profile::UF_COMPANY_CREATE,
                'name'      => Loc::getMessage('rover-apl__header-COMPANY'),
                'default'   => true,
                'sort'      => Profile::UF_COMPANY_CREATE,
                'editable'  => true,
                "type"      => "checkbox"
            ),
            array(
                'id'        => Profile::UF_TASK_CREATE,
                'name'      => Loc::getMessage('rover-apl__header-TASK'),
                'default'   => true,
                'sort'      => Profile::UF_TASK_CREATE,
                'editable'  => true,
                "type"      => "checkbox"
            ),
            array(
                'id'        => 'ELEMENTS_CNT',
                'name'      => Loc::getMessage('rover-apl__header-ELEMENTS_CNT'),
                'default'   => true,
                'sort'      => 'ELEMENTS_CNT'
            ),
        );
    }

    /**
     * @return array
     * @throws Main\ArgumentNullException
     * @throws Main\LoaderException
     * @throws Main\SystemException
     * @throws ReflectionException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getActionPanel(): array
    {
        $buttons = array();

        $buttonAdd = array(
            'TEXT'  => Loc::getMessage('rover-apl__action-add'),
            'TITLE' => Loc::getMessage('rover-apl__action-add_title'),
            'MENU'  => array(),
            'ICON'  => 'btn-list'
        );

        $classes = Source::getChildClasses();
        foreach ($classes as $sourceClassName)
        {
            /**
             * @var Source $sourceClassName
             */
            if (strlen($sourceClassName::$module)
                && !Main\Loader::includeModule($sourceClassName::$module))
                continue;

            $buttonAdd['MENU'][] = array(
                'ICONCLASS' => 'add',
                'TEXT'      => Loc::getMessage('rover-apl__action-add_' . $sourceClassName::getType()),
                'ONCLICK'   => "amoCrmPresetList.popup('" . $sourceClassName::getType() . "')"
            );
        }

        $connectionCount = Connection::getList(['count_total' => true, 'select' => ['ID']])->getCount();

        $buttons[] = $buttonAdd;
        $buttons[] = array(
            'TEXT'  => Loc::getMessage('rover-apl__action-connections', ['#cnt#' => $connectionCount]),
            'TITLE' => Loc::getMessage('rover-apl__action-connections_title'),
            'LINK'  => '/bitrix/admin/rover-acrm__connection-list.php?lang=' . LANGUAGE_ID,
            'ICON'  => 'btn-list'
        );
        $buttons[] = array('SEPARATOR' => true);
        $buttons[] = array(
            'TEXT'  => Loc::getMessage('rover-apl__action-settings'),
            'TITLE' => Loc::getMessage('rover-apl__action-settings_title'),
            'LINK'  => '/bitrix/admin/settings.php?lang=' . LANGUAGE_ID . '&mid=rover.amocrm&mid_menu=1',
            'ICON'  => 'btn-settings'
        );

        return $buttons;
    }

    /**
     * @throws AmoCRMApiException
     * @throws AmoCRMoAuthApiException
     * @throws Main\ArgumentException
     * @throws Main\ArgumentNullException
     * @throws Main\ArgumentOutOfRangeException
     * @throws Main\Db\SqlQueryException
     * @throws Main\LoaderException
     * @throws Main\ObjectPropertyException
     * @throws Main\SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function requestProcess()
    {
        switch ($this->getRequestAction()){
            case 'delete':
                $this->requestDelete();
                break;
            case 'edit':
                $this->requestEdit();
                break;
            case 'activate':
                $this->requestSetPresetActive(true);
                break;
            case 'deactivate':
                $this->requestSetPresetActive(false);
                break;
            case 'copy':
                $this->requestCopy();
                break;
        }
    }

    /**
     * @throws Main\ArgumentNullException
     * @throws Main\ArgumentOutOfRangeException
     * @throws Main\LoaderException
     * @throws Main\SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function requestCopy()
    {
        $ids = $this->getRequestIds();

        if (!count($ids))
            return;

        $profiles = Profile::loadList(['filter' => ['=ID' => $ids]]);
        /** @var Profile $profile */
        foreach ($profiles as $profile)
            $result = $profile->createDuplicate();

        if ((count($ids) == 1) && $result->isSuccess())
            LocalRedirect($this->getCurDir() . "rover-acrm__profile-element.php?preset_id=" . $result->getId() . "&lang=" . LANGUAGE_ID );
    }

    /**
     * @param bool $active
     * @throws Main\ArgumentNullException
     * @throws Main\ArgumentOutOfRangeException
     * @throws Main\LoaderException
     * @throws Main\SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function requestSetPresetActive(bool $active)
    {
        $ids = $this->getRequestIds();
        if (!count($ids))
            return;

        $profiles = Profile::loadList(['filter' => ['=ID' => $ids]]);
        /** @var Profile $profile */
        foreach ($profiles as $profile)
            $profile->setActive($active)->save();
    }

    /**
     * @throws Main\ArgumentException
     * @throws Main\ArgumentNullException
     * @throws Main\ArgumentOutOfRangeException
     * @throws Main\LoaderException
     * @throws Main\ObjectPropertyException
     * @throws Main\SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function requestEdit()
    {
        $fields = $this->request->get('FIELDS');

        foreach ($fields as $presetId => $field)
        {
            /** @var Profile $profile */
            $profile = Profile::load($presetId);

            foreach ($field as $fieldName => $fieldValue){

                switch ($fieldName) {
                    case 'NAME':
                        $profile->setName($fieldValue);
                        break;
                    case 'ACTIVE':
                        $profile->setActive($fieldValue == 'Y');
                        break;
                    case 'LEAD':
                        $profile->setLeadCreate($fieldValue == 'Y');
                        break;
                    case 'CONTACT':
                        $profile->setContactCreate($fieldValue == 'Y');
                        break;
                    case 'COMPANY':
                        $profile->setCompanyCreate($fieldValue == 'Y');
                        break;
                    case 'TASK':
                        if (!$profile->isUnsorted())
                            $profile->setTaskCreate($fieldValue == 'Y');
                        break;
                   /* case 'RESPONSIBLE':
                        $profile->setValue(Tabs::INPUT__CURRENT_RESPONSIBLE_ID, $fieldValue);
                        break;*/
                }
            }

            $profile->save();
        }

        Message::addOk(Loc::getMessage('rover-apl__action-update_success'));
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
     * @throws Main\ArgumentNullException
     * @throws Main\ArgumentOutOfRangeException
     * @throws Main\SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function requestDelete()
    {
        $ids = $this->getRequestIds();

        if (!count($ids))
            return;

        try{
            foreach ($ids as $id)
                Profile::delete($id);

            Message::addOk(Loc::getMessage('rover-apl__action-remove_success'));
        } catch (Exception $e) {
            RoverAmoCRMEvents::handleException($e);
        }
    }

    /**
     * @return array
     * @throws Main\ArgumentNullException
     * @throws ReflectionException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    public function getSourcesList(): array
    {
        $sourceClasses  = Source::getChildClasses();
        $result         = array();

        /** @var Source $className */
        foreach ($sourceClasses as $className)
            try{
                $result[$className::getType()] = $className::getList();
            } catch(Exception $e) {}

        return $result;
    }

    /**
     * @return array
     * @throws Main\ArgumentNullException
     * @throws Main\LoaderException
     * @throws Main\SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getConnectionsList(): array
    {
        $connections = Connection::loadList([
            'filter' => [
                '=' . Connection::UF_ACTIVE => true,
                '=STATUS' => [Connection::STATUS_EXPIRED, Connection::STATUS_OK]
            ],
        ]);

        $result = [];
        /** @var Connection $connection */
        foreach ($connections as $connection)
            $result[$connection->getCollection()->offsetGet('ID')]
                = $connection->getCollection()->offsetGet(Connection::UF_NAME)
                    . ' (' . $connection->getCollection()->offsetGet(Connection::UF_BASE_DOMAIN) . ')';

        return $result;
    }

    /**
     * @throws Main\ArgumentException
     * @throws Main\ArgumentNullException
     * @throws Main\ArgumentOutOfRangeException
     * @throws Main\LoaderException
     * @throws Main\SystemException
     * @throws ReflectionException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getResult()
    {
        $this->arResult['ROWS']             = $this->getRows();
        $this->arResult['HEADERS']          = $this->getHeaders();
        $this->arResult['NAV']              = $this->getNavObject();
        $this->arResult['SORT']             = $this->getGridSort();
        $this->arResult['SOURCES_LIST']     = $this->getSourcesList();
        $this->arResult['ACTION_PANEL']     = $this->getActionPanel();
        $this->arResult['CONNECTIONS_LIST'] = $this->getConnectionsList();
    }

    /**
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function setTitle()
    {
        global $APPLICATION;
        $APPLICATION->SetTitle(Loc::getMessage('rover-apl__title'));
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
            $this->setTitle();

            if (Dependence::getCheckStatus())
            {
                $this->requestProcess();
                $this->getResult();
            }

            $this->includeComponentTemplate();
        } catch (Exception $e) {
            RoverAmoCRMEvents::handleException($e, true);
        }
    }
}