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
use AmoCRM\Helpers\EntityTypesInterface;
use Bitrix\Main;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\UI\PageNavigation;
use Rover\AmoCRM\Component\ListBase;
use Rover\AmoCRM\Directory\Entity\Link;
use Rover\AmoCRM\Directory\Entity\Profile;
use Rover\AmoCRM\Model\Source;
use Rover\AmoCRM\Options;
use Bitrix\Main\Web\Uri;
use Rover\AmoCRM\Directory\Entity\Event;
use Rover\AmoCRM\Service\Dependence;
use Rover\AmoCRM\Service\HitCache;
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
class RoverAmoCrmResultList extends ListBase
{
    const GRID_ID           = 'amocrm_preset_elements_';
    const ACTION__EXPORT    = 'export';

    /** @var \CGridOptions*/
    protected $gridOptions;

	/**
	 * @param $arParams
	 * @return mixed
	 * @author Pavel Shulaev (https://rover-it.me)
	 */
	public function onPrepareComponentParams($arParams)
	{
	    $arParams['PROFILE_ID'] = intval($arParams['PROFILE_ID']);

		return $arParams;
	}

    /**
     * @throws Main\ArgumentNullException
     * @throws Main\LoaderException
     * @throws Main\SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
	protected function checkParams()
	{
	    parent::checkParams();

	    if (empty($this->arParams['PROFILE_ID']))
	        throw new Main\ArgumentNullException('PROFILE_ID');
	}

    /**
     * @return Profile|mixed
     * @throws Main\ArgumentNullException
     * @throws Main\ArgumentOutOfRangeException
     * @throws Main\LoaderException
     * @throws Main\SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getProfile(): Profile
    {
        return Profile::load($this->arParams['PROFILE_ID']);
    }

    /**
     * @param Source $mainSource
     * @return array
     * @throws Main\ArgumentException
     * @throws Main\ArgumentNullException
     * @throws Main\ArgumentOutOfRangeException
     * @throws Main\LoaderException
     * @throws Main\ObjectPropertyException
     * @throws Main\SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getActionPanel(Source $mainSource): array
    {
        $profiles       = Profile::loadList();
        $presetsList    = array();
        $settingsList   = [];

        /** @var Profile $profile */
        foreach ($profiles as $profile)
        {
            $source = $profile->getSource();

            $presetsList[] = array(
                'ICONCLASS' => 'view',
                'TEXT'      => $profile->getName() . ' [' . $source->getTypeLabel() . '] (' . $source->getResultsCount() . ')',
                'ONCLICK'   => "jsUtils.Redirect(arguments, '/bitrix/admin/rover-acrm__result-list.php?profile_id=" . $profile->getId()  . "&lang=" . LANGUAGE_ID . "')"
            );

            if ($source === $mainSource)
                $settingsList[] = [
                    'ICONCLASS' => 'edit',
                    'TEXT'      => $profile->getName() . ' [' . implode(', ', $profile->getAllowedSitesIds()) . ']',
                    'ONCLICK'   => "jsUtils.Redirect(arguments, '/bitrix/admin/rover-acrm__profile-element.php?profile_id=" . $profile->getId()  . "&lang=" . LANGUAGE_ID . "')"
                ];
        }

        return array(
            array(
                'TEXT'  => Loc::getMessage('rover-ape__action-back', array('#cnt#' => Profile::getCount())),
                'TITLE' => Loc::getMessage('rover-ape__action-back_title'),
                'LINK'  => '/bitrix/admin/rover-acrm__profile-list.php?lang=' . LANGUAGE_ID ,
                'ICON'  => 'btn-list'
            ),
            array(
                'TEXT'  => Loc::getMessage('rover-ape__action-settings'),
                'TITLE' => Loc::getMessage('rover-ape__action-settings_title'),
                //'LINK'  => '/bitrix/admin/rover-acrm__profile-element.php?profile_id=' . $this->arParams['ID']  . "&lang=" . LANGUAGE_ID,
                'ICON'  => 'btn-settings',
                'MENU'  => $settingsList
            ),
            array(
                'TEXT'  => Loc::getMessage('rover-ape__action-presets'),
                'TITLE' => Loc::getMessage('rover-ape__action-presets_title'),
                'MENU'  => $presetsList,
                'ICON'  => 'btn-new'
            ),
            array(
                'SEPARATOR' => true
            ),
            array(
                'TEXT'  => Loc::getMessage('rover-ape__action-module-settings'),
                'TITLE' => Loc::getMessage('rover-ape__action-module-settings_title'),
                'LINK'  => '/bitrix/admin/settings.php?lang=' . LANGUAGE_ID . '&mid=rover.amocrm&mid_menu=1',
                'ICON'  => 'btn-settings'
            )
        );
    }


    /**
     * @return string
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getGridId(): string
    {
        return self::GRID_ID . $this->arParams['ID'];
    }

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
     * @param Source $source
     * @throws Main\ArgumentNullException
     * @throws Main\ArgumentOutOfRangeException
     * @throws Main\SystemException|Main\LoaderException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function requestActions(Source $source)
    {
        $action = $this->getRequestAction();
        switch ($action) {
            case self::ACTION__EXPORT:
                $this->requestExport($source);
                break;
        }

        if (mb_strlen($this->request->get('OK_MESSAGE')))
            Message::addOk($this->request->get('OK_MESSAGE'));
    }

    /**
     * @param Source $source
     * @throws Main\ArgumentNullException
     * @throws Main\ArgumentOutOfRangeException
     * @throws Main\SystemException|Main\LoaderException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function requestExport(Source $source)
    {
        $elementsIds = $this->request->get('ID');
        if (empty($elementsIds))
            return;

        if (!Options::isEnabled())
        {
            Message::addError(Loc::getMessage(Loc::getMessage("rover-ape__action-export-disabled")));
            return;
        }

        if (!is_array($elementsIds))
            $elementsIds = [$elementsIds];

        foreach ($elementsIds as $elementId)
            try{
                $event = Event::createBySourceEntityId($source, $elementId);

                RoverAmoCRM::addEvent($event);

            } catch (\Exception $e){
                Message::addException($e);
            }

        if (empty(Message::getErrors()))
        {
            $uri = new Uri($this->request->getRequestUri());

            $uri->deleteParams(array("ID", $this->getActionButton()));
            $uri->addParams(["OK_MESSAGE" => Options::isAgentHandleNew()
                ? Loc::getMessage('rover-ape__export-success-2')
                : Loc::getMessage('rover-ape__export-success-1')]);

            LocalRedirect($uri->getUri());
        }
    }

    /**
     * @throws AmoCRMApiException
     * @throws AmoCRMoAuthApiException
     * @throws Main\ArgumentException
     * @throws Main\ArgumentNullException
     * @throws Main\ArgumentOutOfRangeException
     * @throws Main\LoaderException
     * @throws Main\ObjectPropertyException
     * @throws Main\SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
	public function getResult()
    {
        $source = $this->getProfile()->getSource();

        $this->requestActions($source);
        $this->setTitle($source);

        $this->arResult['ROWS']         = $this->getRows($source);
        $this->arResult['HEADERS']      = $this->getHeaders($source);
        $this->arResult['ACTION_PANEL'] = $this->getActionPanel($source);
        $this->arResult['GRID_ID']      = $this->getGridId();
        $this->arResult['SORT']         = $this->getGridSort();
    }

    /**
     * @param Source $source
     * @return array
     * @throws AmoCRMApiException
     * @throws AmoCRMoAuthApiException
     * @throws Main\ArgumentException
     * @throws Main\ArgumentNullException
     * @throws Main\ArgumentOutOfRangeException
     * @throws Main\LoaderException
     * @throws Main\ObjectPropertyException
     * @throws Main\SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getRows(Source $source): array
    {
        global $APPLICATION;

        $curPage    = $APPLICATION->GetCurPage(true);
        $elements   = $this->getElements($source);
        $rows       = array();
        $links      = $this->getLinks();
        $baseDomain = $this->getProfile()->getConnection()->getBaseDomain('');

        foreach ($elements as $elementId => $element)
        {
            $linkedLeadId       = $links[$elementId][EntityTypesInterface::LEADS] ?? null;
            $linkedContactId    = $links[$elementId][EntityTypesInterface::CONTACTS] ?? null;
            $linkedCompanyId    = $links[$elementId][EntityTypesInterface::COMPANIES] ?? null;
            $linkedTaskId       = $links[$elementId][EntityTypesInterface::TASKS] ?? null;

            $element = [
                'ID'            => $elementId,
                'DATE_CREATE'   => $source->getResultDateCreate($elementId),
                'LINK_' . EntityTypesInterface::LEADS => $linkedLeadId,
                'LINK_' . EntityTypesInterface::CONTACTS => $linkedContactId,
                'LINK_' . EntityTypesInterface::COMPANIES => $linkedCompanyId,
                'LINK_' . EntityTypesInterface::TASKS => $linkedTaskId,
            ] + $element;

            $rows[] = array(
                'id'        => $elementId,
                'data'      => $element,
                'columns'   => [
                    'LINK_' . EntityTypesInterface::LEADS => $linkedLeadId
                        ? '<a target="_blank" href="https://' . $baseDomain .  '/leads/detail/' . $linkedLeadId . '">' . $linkedLeadId . '</a>' : '',
                    'LINK_' . EntityTypesInterface::CONTACTS => $linkedContactId
                        ? '<a target="_blank" href="https://' . $baseDomain .  '/contacts/detail/' . $linkedContactId . '">' . $linkedContactId . '</a>' : '',
                    'LINK_' . EntityTypesInterface::COMPANIES => $linkedCompanyId
                        ? '<a target="_blank" href="https://' . $baseDomain .  '/companies/detail/' . $linkedCompanyId . '">' . $linkedCompanyId . '</a>' : '',
                   // 'LINK_' . EntityTypesInterface::TASKS => $linkedTaskId
                  //      ? '<a href="https://' . $baseDomain .  '/tasks/detail/' . $linkedTaskId . '">' . $linkedTaskId . '</a>' : '',
                ],
                'actions'   => array(
                    array(
                        'TEXT'      => Loc::getMessage('rover-ape__action-export'),
                        'ONCLICK'   => "jsUtils.Redirect(arguments, '" . $curPage
                            . "?profile_id=" . $this->arParams['PROFILE_ID']
                            . "&ID=" . $elementId
                            . "&lang=" . LANGUAGE_ID
                            . "&" . $this->getActionButton() ."=" . self::ACTION__EXPORT . "')",
                        "ICONCLASS" => "copy",
                        //'DEFAULT'   => true
                    ),
                ),
                'editable'  => true
            );
        }

        return $rows;
    }

    /**
     * @param Source $source
     * @return mixed
     * @throws Main\ArgumentNullException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getElements(Source $source)
    {
        $cacheId = HitCache::genId(__METHOD__, [$source->getId()]);
        if (!HitCache::exists($cacheId))
        {
            $nav = new PageNavigation("nav-preset-elements");
            $nav->allowAllRecords(true)
                ->setPageSize($this->getGridPageSize())
                ->initFromUri();

            $sort     = $this->getGridSort();
            $elements = $source->getResultsData(array('order' => $sort['sort']), $nav);

            $this->arResult['NAV']  = $nav;

            HitCache::set($cacheId, $elements);
        }

        return HitCache::get($cacheId);
    }

    /**
     * @param Source $source
     * @return array
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getHeaders(Source $source): array
    {
        $labels = $source->getLabelMap();
        $result = array(
            array(
                'id'        => 'ID',
                'name'      => 'ID',
                'default'   => true,
                'sort'      => 'ID',
            )
        );

        foreach ($labels as $code => $name)
            $result[] = array(
                'id'        => $code,
                'name'      => $name,
                'default'   => true,
                //'sort'      => $code
            );

        $result[] = [
            'id'        => 'DATE_CREATE',
            'name'      => Loc::getMessage('rover-ape__datetime_created'),
            'default'   => true,
            //'type'      => 'date'
        ];

        $result[] = [
            'id'        => 'LINK_' . EntityTypesInterface::LEADS,
            'name'      => Loc::getMessage('rover-ape__header-' . EntityTypesInterface::LEADS),
            'default'   => true,
            //'type'      => 'date'
        ];

        $result[] = [
            'id'        => 'LINK_' . EntityTypesInterface::CONTACTS,
            'name'      => Loc::getMessage('rover-ape__header-' . EntityTypesInterface::CONTACTS),
            'default'   => true,
            //'type'      => 'date'
        ];

        $result[] = [
            'id'        => 'LINK_' . EntityTypesInterface::COMPANIES,
            'name'      => Loc::getMessage('rover-ape__header-' . EntityTypesInterface::COMPANIES),
            'default'   => true,
            //'type'      => 'date'
        ];

        $result[] = [
            'id'        => 'LINK_' . EntityTypesInterface::TASKS,
            'name'      => Loc::getMessage('rover-ape__header-' . EntityTypesInterface::TASKS),
            'default'   => true,
            //'type'      => 'date'
        ];

        return $result;
    }

    /**
     * @param Source $source
     * @throws Main\ArgumentNullException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function setTitle(Source $source)
    {
        global $APPLICATION;
        $APPLICATION->SetTitle(Loc::getMessage('rover-ape__title', array(
            '#name#' => $source->getName(),
            '#type#' => $source->getTypeLabel(),
        )));
    }

    /**
     * @return array
     * @throws Main\ArgumentException
     * @throws Main\ArgumentNullException
     * @throws Main\ArgumentOutOfRangeException
     * @throws Main\LoaderException
     * @throws Main\ObjectPropertyException
     * @throws Main\SystemException
     * @throws AmoCRMApiException
     * @throws AmoCRMoAuthApiException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getLinks(): array
    {
        $profile = $this->getProfile();

        $query = [
            'filter' => [
                '=' . Link::UF_BX_ENTITY_ID     => array_keys($this->getElements($profile->getSource())),
                '=' . Link::UF_BX_ENTITY_TYPE   => $profile->getSourceType(),
                '=' . Link::UF_ACCOUNT_ID       => $profile->getConnection()->getAccountId(),
            ],
            'select' => [Link::UF_BX_ENTITY_ID, Link::UF_AMO_ENTITY_TYPE, Link::UF_AMO_ENTITY_ID]
        ];

        $links      = [];
        $dbLinks    = Link::getList($query);
        while ($link = $dbLinks->fetch())
            $links[$link[Link::UF_BX_ENTITY_ID]][$link[Link::UF_AMO_ENTITY_TYPE]] = $link[Link::UF_AMO_ENTITY_ID];

        return $links;
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

            if (Dependence::getCheckStatus())
            {
                $this->getResult();
                $this->checkRights();
            }

			$this->includeComponentTemplate();
		} catch (Exception $e) {
            RoverAmoCRM::handleException($e, true);
		}
	}
}