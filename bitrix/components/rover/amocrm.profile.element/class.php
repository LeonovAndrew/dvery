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
use AmoCRM\Exceptions\AmoCRMMissedTokenException;
use AmoCRM\Exceptions\AmoCRMoAuthApiException;
use AmoCRM\Helpers\EntityTypesInterface;
use Bitrix\Main;
use Bitrix\Main\ArgumentNullException;
use Bitrix\Main\ArgumentOutOfRangeException;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\SystemException;
use Bitrix\Sale\Internals\StatusLangTable;
use Rover\AmoCRM\Component\ElementBase;
use Rover\AmoCRM\Config\Tabs;
use Rover\AmoCRM\Snippet\Table as TableSnippet;
use Rover\AmoCRM\Directory\Entity\Connection;
use Rover\AmoCRM\Directory\Entity\Profile;
use Rover\AmoCRM\Mapping;
use Rover\AmoCRM\Mapping\Companies;
use Rover\AmoCRM\Mapping\Contacts;
use Rover\AmoCRM\Mapping\Leads;
use Rover\AmoCRM\Mapping\Tasks;
use Rover\AmoCRM\Model\Source;
use Bitrix\Main\Web\Uri;
use Rover\AmoCRM\Service\Duplicate as DuplicateAlias;
use Rover\AmoCRM\Service\Message;
use Rover\AmoCRM\Service\Params;
use Rover\AmoCRM\Service\Placeholder;
use Rover\AmoCRM\Snippet\Mapping as MappingSnippet;

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
class RoverAmoCrmProfileElement extends ElementBase
{
    const FORM_ID = 'amocrm_preset_update';

    /**
     * @author Pavel Shulaev (https://rover-it.me)
     */
	public function onIncludeComponentLang() : void
	{
		$this->includeComponentLang(basename(__FILE__));

		Loc::loadMessages(__FILE__);
		Loc::loadMessages($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/rover.amocrm/lib/config/tabs.php'); // for tabs
	}

	/**
	 * @param $params
	 * @return mixed
	 * @author Pavel Shulaev (https://rover-it.me)
	 */
	public function onPrepareComponentParams($params) : array
	{
	    $params['ID'] = intval($params['ID']);

		return $params;
	}

    /**
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws Main\LoaderException
     * @throws SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
	protected function requestAddProfile()
    {
        if (empty($this->request->get('connection_id')))
            throw new Main\ArgumentNullException('connection_id');

        /** @var Connection $connection */
        if (!$connection = Connection::load($this->request->get('connection_id')))
            throw new Main\ArgumentOutOfRangeException('connection_id');

        if (!$connection->isAvailable())
            throw new SystemException('Connection unavailable');

        // try to create preset
        $source     = Source::build($this->request->get('source_type'), intval($this->request->get('source_id')));
        $result     = Profile::addBySource($source, $connection);
        if (!$result->isSuccess())
            throw new SystemException(implode('<br>', $result->getErrorMessages()));

        $uri = new Uri($this->request->getRequestUri());

        $uri->deleteParams(['source_type', 'source_id']);
        $uri->addParams(["profile_id" => $result->getId()]);

        LocalRedirect($uri->getUri());
    }

    /**
     * @return array
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws Main\ArgumentException
     * @throws Main\LoaderException
     * @throws SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getActionPanel() : array
    {
        return array(
            array(
                'TEXT'  => Loc::getMessage('rover-acpe__action-back', array('#cnt#' => Profile::getCount())),
                'TITLE' => Loc::getMessage('rover-acpe__action-back_title'),
                'LINK'  => '/bitrix/admin/rover-acrm__profile-list.php?lang=' . LANGUAGE_ID,
                'ICON'  => 'btn-list'
            ),
            array(
                'TEXT'  => Loc::getMessage('rover-acpe__action-elements', array('#cnt#' => $this->getProfile()->getResultsCount())),
                'TITLE' => Loc::getMessage('rover-acpe__action-elements_title'),
                'LINK'  => '/bitrix/admin/rover-acrm__result-list.php?profile_id=' . $this->arParams['ID'] . '&lang=' . LANGUAGE_ID,
                'ICON'  => 'btn-list'
            ),
            array(
                'TEXT'  => Loc::getMessage('rover-acpe__action-connections', ['#cnt#' => Connection::getCount()]),
                'TITLE' => Loc::getMessage('rover-acpe__action-connections_title'),
                'LINK'  => '/bitrix/admin/rover-acrm__connection-list.php?lang=' . LANGUAGE_ID,
                'ICON'  => 'btn-list'
            ),
            array('SEPARATOR' => true),
            array(
                'TEXT'  => Loc::getMessage('rover-acpe__action-settings'),
                'TITLE' => Loc::getMessage('rover-acpe__action-settings_title'),
                'LINK'  => '/bitrix/admin/settings.php?lang=' . LANGUAGE_ID . '&mid=rover.amocrm&mid_menu=1',
                'ICON'  => 'btn-settings'
            )
        );
    }

    /**
     * @param $text
     * @return string
     * @throws ArgumentNullException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getHelp($text) : string
    {
        $text = trim($text);
        if (!strlen($text))
            throw new ArgumentNullException('text');

        return '<br><small style="color: #777;">' . $text .  '</small>';
    }

    /**
     * @param $text
     * @return string
     * @throws ArgumentNullException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getPostInput($text) : string
    {
        $text = trim($text);
        if (!strlen($text))
            throw new ArgumentNullException('text');

        return 'b">' . $text .  '<a a="b';
    }

    /**
     * @param string      $id
     * @param array       $params
     * @param string|null $name
     * @param string|null $help
     * @param null        $value
     * @return array
     * @throws ArgumentNullException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    public function getCheckbox(string $id, array $params = [], string $name = null, string $help = null, $value = null) : array
    {
        $id = trim($id);
        if (!mb_strlen($id))
            throw new ArgumentNullException('id');

        $field = [
            'id'        => $id,
            'name'      => $name ?? Profile::getFieldL18n($id),
            'required'  => false,
            'type'      => 'checkbox',
        ];

        if (!is_null($value))
            $field['value'] = $value;

        if (count($params))
        {
            $field['params'] = $params;
        } else {
            if (is_null($help))
            {
                if (mb_strlen(Loc::getMessage('rover-acpe__field-' . $id . '_help')))
                    $help = Loc::getMessage('rover-acpe__field-' . $id . '_help');
                // @TODO: delete
                elseif (mb_strlen(Loc::getMessage($id . '_help')))
                    $help = Loc::getMessage($id . '_help');
            }

            if (!is_null($help))
            {
                $field['params']['a'] = $this->getPostInput($this->getHelp($help));
            }
        }

        return $field;
    }

    /**
     * @param       $entityType
     * @param array $params
     * @return string
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws Main\LoaderException
     * @throws SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getDuplicateControlRow($entityType, array $params = []) : string
    {
        $entityType = trim($entityType);
        if (!mb_strlen($entityType))
            throw new ArgumentNullException('type');

        return TableSnippet::getCheckBoxRow([
            'name'      => Profile::UF_DUPLICATE_DATA . "[$entityType][" . Profile::DUPLICATE_ACTIVE . ']',
            'checked'   => $this->getProfile()->isDuplicateControl($entityType),
        ] + $params,
            Loc::getMessage('rover-acpe__duplicate-control-label'),
            Loc::getMessage('rover-acpe__duplicate-control-help')
        );
    }

    /**
     * @param string $entityType
     * @param array  $options
     * @param array  $params
     * @return string
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws Main\LoaderException
     * @throws SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getDuplicateFieldsRow(string $entityType, array $options, array $params = []) : string
    {
        $entityType = trim($entityType);
        if (!mb_strlen($entityType))
            throw new ArgumentNullException('entityType');

        return TableSnippet::getSelectRow([
            'options'   => $options,
            'selected'  => $this->getProfile()->getDuplicateData()[$entityType][Profile::DUPLICATE_FIELDS] ?? null,
            'params'    => [
                'name'      => Profile::UF_DUPLICATE_DATA . "[$entityType][" . Profile::DUPLICATE_FIELDS . '][]',
                'id'        => Profile::UF_DUPLICATE_DATA . "[$entityType][" . Profile::DUPLICATE_FIELDS . ']',
                'multiple'  => true,
                'size'      => min(6, count($options))
            ]
        ] + $params,
            Loc::getMessage('rover-acpe__duplicate-fields-label'),
            Loc::getMessage('rover-acpe__duplicate-fields-help')
        );
    }

    /**
     * @param string $entityType
     * @param array  $params
     * @return string
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws Main\LoaderException
     * @throws SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getDuplicateLogicRow(string $entityType, array $params = []) : string
    {
        $entityType = trim($entityType);
        if (!mb_strlen($entityType))
            throw new ArgumentNullException('entityType');

        return TableSnippet::getSelectRow([
            'options'   => [
                DuplicateAlias::LOGIC__AND  => Loc::getMessage('rover-acpe__duplicate-logic-' . DuplicateAlias::LOGIC__AND . '_label'),
                DuplicateAlias::LOGIC__OR   => Loc::getMessage('rover-acpe__duplicate-logic-' . DuplicateAlias::LOGIC__OR . '_label'),
            ],
            'selected'  => $this->getProfile()->getDuplicateData()[$entityType][Profile::DUPLICATE_LOGIC] ?? null,
            'params'    => [
                'name'      => Profile::UF_DUPLICATE_DATA . "[$entityType][" . Profile::DUPLICATE_LOGIC . ']',
                'id'        => Profile::UF_DUPLICATE_DATA . "[$entityType][" . Profile::DUPLICATE_LOGIC . ']',
            ]
        ] + $params, Loc::getMessage('rover-acpe__duplicate-logic-label'));
    }

    /**
     * @param $entityType
     * @return array
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws Main\ArgumentException
     * @throws Main\LoaderException
     * @throws SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    public function getDuplicateActionRow(string $entityType, array $params = []) : string
    {
        $entityType = trim($entityType);
        if (!mb_strlen($entityType))
            throw new ArgumentNullException('entityType');

        $help = $this->getProfile()->isUnsorted()
            ? Loc::getMessage('rover-acrm__duplicate-action-unsorted-help')
            : '';

        $actions = array(
            DuplicateAlias::ACTION__ADD_NOTE => Loc::getMessage('rover-acpe__duplicate-action-' . DuplicateAlias::ACTION__ADD_NOTE . '_label'),
            DuplicateAlias::ACTION__COMBINE => Loc::getMessage('rover-acpe__duplicate-action-' . DuplicateAlias::ACTION__COMBINE . '_label'),
            DuplicateAlias::ACTION__SKIP => Loc::getMessage('rover-acpe__duplicate-action-' . DuplicateAlias::ACTION__SKIP . '_label'),
        );

        return TableSnippet::getSelectRow([
                'options'   => $actions,
                'selected'  => $this->getProfile()->getDuplicateData()[$entityType][Profile::DUPLICATE_ACTION] ?? null,
                'params'    => [
                    'name'      => Profile::UF_DUPLICATE_DATA . "[$entityType][" . Profile::DUPLICATE_ACTION . ']',
                    'id'        => Profile::UF_DUPLICATE_DATA . "[$entityType][" . Profile::DUPLICATE_ACTION . ']',
                ]
            ] + $params, Loc::getMessage('rover-acpe__duplicate-action-label'), $help);
    }

    /**
     * @param        $id
     * @param        $name
     * @param array  $options
     * @param bool   $isMultiple
     * @param string $help
     * @param bool   $required
     * @param int    $size
     * @param bool   $disabled
     * @param null   $value
     * @return array
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws Main\LoaderException
     * @throws SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getSelect($id, $name, array $options = [], bool $isMultiple = false, string $help = '', bool $required = false, int $size = 4, bool $disabled = false, $value = null) : array
    {
        $id = trim($id);
        if (!strlen($id))
            throw new ArgumentNullException('id');

        $config = [
            'options' => $options,
            'params' => [
                'id'    => $id,
                'name'  => $id
            ],
            'selected'  => $value ?? $this->getProfile()->getCollection()->offsetGet($id),
            'help'      => $help,
        ];

        if ($isMultiple)
        {
            $config['params']['multiple'] = 'multiple';
            $config['params']['size']     = min($size, count($options));
            $config['params']['name']     .= '[]';
        }

        if ($disabled)
            $config['params']['disabled'] = 'disabled';

        if ($required)
            $config['params']['required'] = 'required';

        $select = $this->getSelectInput($config);

        return [
            'id'        => $id . ($isMultiple ? '[]' : ''),
            'name'      => $name,
            'required'  => $required,
            'type'      => 'custom',
            'value'     => $select
        ];
    }

    /**
     * @return array[]
     * @throws AmoCRMApiException
     * @throws AmoCRMoAuthApiException
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws Main\ArgumentException
     * @throws Main\LoaderException
     * @throws Main\ObjectPropertyException
     * @throws ReflectionException
     * @throws SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getTabs() : array
    {
        $tabs = [$this->getMainTab()];

        if ($this->getProfile()->getSource()->isOrder())
            $tabs[] = $this->getOrderTab();

        return array_merge($tabs, [
            $this->getLeadTab(),
            $this->getContactCompanyTab(EntityTypesInterface::CONTACTS),
            $this->getContactCompanyTab(EntityTypesInterface::COMPANIES),
            $this->getTaskTab()
        ]);
    }

    /**
     * @param $name
     * @param $options
     * @param $groupName
     * @return string
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws Main\LoaderException
     * @throws SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getSelectGroupInput($name, $options, $groupName): string
    {
        // change group script
        $html           = '';
        $optionsId      = crc32(serialize($options));
        $resultItems    = [];

        // for keeping sort
        foreach ($options as $itemId => $itemValue)
        {
            $item = [
                'id' => $itemId,
                'name' => $itemValue['name']
            ];

            if (isset($itemValue['options']))
            {
                $itemOptions = [];
                foreach ($itemValue['options'] as $optionId => $optionName)
                    $itemOptions[] = ['id' => $optionId, 'name' => $optionName];

                $item['options'] = $itemOptions;
            }

            $resultItems[] = $item;
        }

        $html .= '
			<script type="text/javascript">
                function OnType_'.$optionsId.'_Changed(typeSelect, selectID)
                {
                    var items       = ' . CUtil::PhpToJSObject($resultItems) . ';
                    var selected    = BX(selectID), options;
                  
                    if(!!selected)
                    {
                        for(var i=selected.length-1; i >= 0; i--){
                            selected.remove(i);
                        }
                        
                        // search selected group
                        for(var k in items)
                        {
                            if ((items[k]["id"] == typeSelect.value)
                                && (items[k]["options"]))
                            {
                                options = items[k]["options"];
                            }
                        }
                        
                        if (!!options) {
                            for(var j in options)
                            {
                                var newOption = new Option(options[j]["name"], options[j]["id"], false, false);
                                selected.options.add(newOption);
                            }
                        }
                    }
                }
			</script>
			';

        $groupValue = $this->getProfile()->getCollection()->offsetGet($groupName);
        if (empty($groupValue))
            $groupValue = array_key_first($options);

        $onChangeGroup  = 'OnType_' . $optionsId . '_Changed(this, \''. CUtil::JSEscape($name).'\');';

        $html .= '<select name="' . $groupName . '" id="' . $groupName . '" onchange="'.htmlspecialcharsbx($onChangeGroup).'">'."\n";

        foreach($options as $key => $optionValue)
            $html .= '<option value="' . htmlspecialcharsbx($key) . '"' . ($groupValue == $key? ' selected': '') . '>'
                    . htmlspecialcharsEx($optionValue['name'] ?? $key)
                . '</option>'."\n";

        $html .= "</select>\n";
        $html .= "&nbsp;\n";
        $html .= '<select name="' . $name . '" id="' . $name . '">'."\n";


        $value = $this->getProfile()->getCollection()->offsetGet($name);

        if (!is_null($groupValue))
            foreach($options[$groupValue]['options'] as $key => $optionValue2)
                $html .= '<option value="' . htmlspecialcharsbx($key) . '"' . ($key == $value? ' selected': '').'>'
                    . htmlspecialcharsEx($optionValue2)
                    . '</option>'."\n";

        $html .= "</select>\n";

        return $html;
    }

    /**
     * @return array
     * @throws AmoCRMApiException
     * @throws AmoCRMoAuthApiException
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws Main\ArgumentException
     * @throws Main\LoaderException
     * @throws Main\ObjectPropertyException
     * @throws ReflectionException
     * @throws SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getMainTab() : array
    {
        $profile    = $this->getProfile();
        $source     = $profile->getSource();
        $connection = $profile->getConnection();
        $sites              = ['' => Loc::getMessage('rover-acpe__all')] + Params::getSites();
        $responsibleList    = ['' => Loc::getMessage('rover-acpe__default')] + Params::getAmoUsers($connection);

        return [
            'id'        => 'header-main',
            'name'      => Loc::getMessage('rover-acpe__header-main'),
            'title'     => Loc::getMessage('rover-acpe__header-main'),
            'fields'    => [
                $this->getCheckbox(Profile::UF_ACTIVE),
                [
                    'id'        => Profile::UF_NAME,
                    'name'      => Profile::getFieldL18n(Profile::UF_NAME),
                    //'required'  => true,
                    'type'      => 'text',
                    'params'    => [
                        'size' => 50,
                        'a' => $this->getPostInput($this->getHelp(
                            Loc::getMessage('rover-acpe__field-' . Profile::UF_NAME . '_help', [
                                '#type#' =>  "<a title='{$source->getName()}' href='{$source->getEditUrl()}'>{$source->getName()}</a> ({$source->getTypeLabel()})",
                                '#connection#' => "<a title='{$connection->getName()}' href='/bitrix/admin/rover-acrm__connection-element.php?ID={$connection->getId()}&lang=" . LANGUAGE_ID . "'>{$connection->getName()}</a> ({$connection->getBaseDomain('')})"
                            ]))
                        )
                    ]
                ],
                $this->getSelect(Profile::UF_RESPONSIBLE_LIST, Profile::getFieldL18n(Profile::UF_RESPONSIBLE_LIST), $responsibleList, true, Loc::getMessage('rover-acpe__field-' . Profile::UF_RESPONSIBLE_LIST . '_help')),
                $this->getSelect(Profile::UF_SITES_IDS, Profile::getFieldL18n(Profile::UF_SITES_IDS), $sites, true, Loc::getMessage('rover-acpe__field-' . Profile::UF_SITES_IDS . '_help')),
                [
                    'id'        => Profile::UF_COMMON_TAGS,
                    'name'      => Profile::getFieldL18n(Profile::UF_COMMON_TAGS),
                    'required'  => false,
                    'type'      => 'text',
                    'params'    => [
                        'size'  => 50,
                        'id'    => Profile::UF_COMMON_TAGS,
                        'a'     => $this->getPostInput($this->getProfile()
                                ->getMapping(Leads::class)
                                ->getPlaceholder()
                                ->getButton(Profile::UF_COMMON_TAGS)
                            . $this->getHelp(Loc::getMessage('rover-acpe__field-' . Profile::UF_COMMON_TAGS . '_help')))
                    ]
                ],
                $this->getCheckbox(Profile::UF_ADD_COMPLEX),
                //$this->getCheckbox(Profile::UF_GROUP_NOTES),
                $this->getCheckbox(Profile::UF_HIT_DUPLICATES),
            ]
        ];
    }

    /**
     * @return array
     * @throws AmoCRMApiException
     * @throws AmoCRMoAuthApiException
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws Main\ArgumentException
     * @throws Main\LoaderException
     * @throws Main\ObjectPropertyException
     * @throws SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getOrderTab() : array
    {
        $profile    = $this->getProfile();
        $connection = $profile->getConnection();

        $orderStatuses = StatusLangTable::getList([
            'filter'    => ['=LID' => LANGUAGE_ID, '=STATUS.TYPE' => 'O'],
            'order'     => ['STATUS.SORT' => 'ASC'],
            'select'    => ['STATUS_ID', 'NAME'],
            'cache'     => ['ttl' => 3600]
        ]);
        $leadStatuses   = ['' => '-'] + Params::getLeadPipelinesStatuses($connection);

        $bxToAmoProductsParams = $amoToBxProductsParams = [];

        if ($this->getProfile()->isUnsorted() || !$this->getProfile()->getConnection()->isCatalogElementsEnabled())
        {
            $bxToAmoProductsParams['disabled'] = $amoToBxProductsParams['disabled'] = 'disabled';
            $catalogElementsHelp = !$this->getProfile()->getConnection()->isCatalogElementsEnabled()
                ? Loc::getMessage('rover-acpe__field-products_disabled_help')
                : Loc::getMessage('rover-acpe__field-products_unsorted_help');

            $bxToAmoProductsParams['a'] = $amoToBxProductsParams['a'] = $this->getPostInput($this->getHelp($catalogElementsHelp));
        }

        $count = $this->getProfile()->isAmoBxStatuses()
            + $this->getProfile()->isBxAmoStatuses()
            + $this->getProfile()->isAmoBxProducts()
            + $this->getProfile()->isBxAmoProducts();

        if ($count == 4)
        {
            $status = ' ✔';
        } elseif ($count == 0) {
            $status = ' ✖';
        } else {
            $status = ' ♦';
        }

        $tab = [
            'id'        => 'header-order',
            'name'      => Loc::getMessage('rover-acpe__header-order') . $status,
            'title'     => Loc::getMessage('rover-acpe__header-order'),
            'fields'    => [
                [
                    'id'    => 'fields-settings-order-bx-to-amo',
                    'name'  => Loc::getMessage('rover-acpe__header-fields-bx-to-amo-order'),
                    'type'  => 'section',
                ],
                $this->getCheckbox(Profile::UF_BX_AMO_STATUSES),
                $this->getCheckbox(Profile::UF_BX_AMO_PRODUCTS, $bxToAmoProductsParams),
                [
                    'id'    => 'fields-settings-order-amo-to-bx',
                    'name'  => Loc::getMessage('rover-acpe__header-fields-amo-to-bx-order'),
                    'type'  => 'section',
                ],
                $this->getCheckbox(Profile::UF_AMO_BX_STATUSES),
                $this->getCheckbox(Profile::UF_AMO_BX_PRODUCTS, $amoToBxProductsParams),
                [
                    'id'    => 'fields-settings-order-statuses-mapping',
                    'name'  => Loc::getMessage('rover-acpe__header-fields-statuses-mapping-order'),
                    'type'  => 'section',
                ]
            ]
        ];

        while ($orderStatus = $orderStatuses->fetch())
        {
            $tab['fields'][] = [
                'id'        => Profile::UF_MAPPING_DATA . '[' . Tabs::ORDER_STATUSES_MAPPING . '-' . $orderStatus['STATUS_ID'] . ']',
                'name'      => $orderStatus['NAME'],
                'required'  => false,
                'type'      => 'select',
                'items'     => $leadStatuses,
                'value'     => $this->getProfile()->getMappingData()[Tabs::ORDER_STATUSES_MAPPING . '-' . $orderStatus['STATUS_ID']] ?? null
            ];
        }

        $tab['fields'][] = [
            'id'        => Profile::UF_MAPPING_DATA . '[' . Tabs::ORDER_STATUSES_MAPPING_CANCELLED . ']',
            'name'      => Loc::getMessage('rover-acpe__field-' . Tabs::ORDER_STATUSES_MAPPING_CANCELLED . '_label'),
            'required'  => false,
            'type'      => 'select',
            'items'     => $leadStatuses,
            'value'     => $this->getProfile()->getMappingData()[Tabs::ORDER_STATUSES_MAPPING_CANCELLED] ?? null
        ];

        return $tab;
    }

    /**
     * @throws AmoCRMApiException
     * @throws AmoCRMoAuthApiException
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws Main\ArgumentException
     * @throws Main\LoaderException
     * @throws Main\ObjectPropertyException
     * @throws ReflectionException
     * @throws SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getLeadTab() : array
    {
        $profile    = $this->getProfile();
        $connection = $profile->getConnection();
        $allStatuses= ['' => Loc::getMessage('rover-acpe__header-fields-adv-all')] + Params::getLeadPipelinesStatuses($connection);

        if ($this->getProfile()->isMultiPipeline())
        {
            $pipelineField = [
                'id'    => Profile::UF_LEAD_STATUS_ID,
                'name'  => Loc::getMessage('rover-acpe__field-' . Profile::UF_LEAD_STATUS_ID . '_label_multy'),
                'type'  => 'custom',
                'value' => $this->getSelectGroupInput(Profile::UF_LEAD_STATUS_ID,
                    Params::getGroupedLeadStatuses($this->getProfile()->getConnection()), Profile::UF_LEAD_PIPELINE_ID)
            ];
        } else {
            $pipelineField = $this->getSelect(
                Profile::UF_LEAD_STATUS_ID,
                Loc::getMessage('rover-acpe__field-' . Profile::UF_LEAD_STATUS_ID . '_label_single'),
                Params::getLeadStatuses($connection)
            );

            // add hidden pipeline id
            $pipelines  = Params::getLeadPipelines($this->getProfile()->getConnection());
            $pipelineField['value'] .= '<input type="hidden" name="' . Profile::UF_LEAD_PIPELINE_ID . '" value="' . key($pipelines) . '">';
        }

        return [
            'id'        => 'header-' . EntityTypesInterface::LEADS,
            'name'      => Loc::getMessage('rover-acpe__header-' . EntityTypesInterface::LEADS)
                . ($this->getProfile()->isLeadsEnabled() ? ' ✔' : ' ✖'),
            'title'     => Loc::getMessage('rover-acpe__header-' . EntityTypesInterface::LEADS)
                . ($this->getProfile()->isLeadsEnabled() ? '' : ' ' . Loc::getMessage('rover-acpe__disabled')),
            'fields'    => [
                $this->getCheckbox(Profile::UF_AMO_ENTITIES . '[' . EntityTypesInterface::LEADS . ']', [],
                    Loc::getMessage('rover-acpe__field-create-' . EntityTypesInterface::LEADS),
                    Loc::getMessage('rover-acpe__field-create-' . EntityTypesInterface::LEADS . '_help'),
                    $this->getProfile()->isLeadsEnabled()
                ),
                $pipelineField,
                $this->getCheckbox(Profile::UF_LEAD_VISITOR_UID),
                [
                    'id'        => 'mapping-fields-subtabs_' . Leads::getUFName(),
                    'type'      => 'custom',
                    'colspan'   => true,
                    'value'     => $this->getEntitySubTabs($this->getProfile()->getMapping(Leads::class), $this->getLeadDuplicateOptions())
                ],
            ]
        ];
    }

    /**
     * @param Mapping $mapping
     * @return false|string
     * @throws AmoCRMApiException
     * @throws AmoCRMoAuthApiException
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws Main\LoaderException
     * @throws Main\NotImplementedException
     * @throws SystemException
     * @throws \AmoCRM\Exceptions\InvalidArgumentException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getEntitySubTabs(Mapping $mapping, array $availableDuplicateFields)
    {
        $entityType = $mapping->getAmoEntity();

        $enabled = $this->getProfile()->isDuplicateControl($entityType) && $this->getProfile()->getAddComplex();

        $initTabs = [
            [
                "DIV"   => "opt_site_mapping_" . $mapping::getUFName(),
                "TAB"   => Loc::getMessage('rover-acpe__header-mapping'),
                'TITLE' => Profile::getFieldL18n($mapping::getUFName())
            ],
                [
                "DIV"   => "opt_site_duplicates_" . $mapping::getUFName(),
                "TAB"   => Loc::getMessage('rover-acpe__header-duplicates')
                    . ($enabled ? ' &#10004;' : ' ✖'),
                'TITLE' => Loc::getMessage('rover-acpe__header-duplicates-' . $entityType)
                    . ($this->getProfile()->getAddComplex() ? Loc::getMessage('rover-acpe__duplicates-add-complex-note') : '')
            ],
        ];

        ob_start();

        $subTabControl = new \CAdminViewTabControl("subTabControl_mapping_fields_" . $entityType, $initTabs);
        $subTabControl->Begin();

        // mapping

        $subTabControl->BeginNextTab();
        echo '<table class="adm-detail-content-table edit-table bx-edit-table"><tbody>';
        echo '<tr><td colspan="2">' . MappingSnippet::getTable($mapping, null, true) . '</td></tr>';
        echo '</tbody></table>';

        // duplicates
        $subTabControl->BeginNextTab();
        echo '<table class="adm-detail-content-table edit-table bx-edit-table"><tbody>';
        echo $this->getDuplicateControlRow($entityType);
        echo $this->getDuplicateFieldsRow($entityType, $availableDuplicateFields);
        echo $this->getDuplicateLogicRow($entityType);

        if ($entityType == EntityTypesInterface::LEADS):

            $allStatuses= ['' => Loc::getMessage('rover-acpe__header-fields-adv-all')] + Params::getLeadPipelinesStatuses($this->getProfile()->getConnection());

            echo TableSnippet::getSelectRow([
                    'options'   => $allStatuses,
                    'selected'  => $this->getProfile()->getDuplicateData()[EntityTypesInterface::LEADS][Profile::DUPLICATE_STATUS] ?? null,
                    'params'    => [
                        'name'      => Profile::UF_DUPLICATE_DATA . '[' . EntityTypesInterface::LEADS . '][' . Profile::DUPLICATE_STATUS . '][]',
                        'id'        => Profile::UF_DUPLICATE_DATA . '[' . EntityTypesInterface::LEADS . '][' . Profile::DUPLICATE_STATUS . ']',
                        'multiple'  => true,
                        'size'      => min(6, count($allStatuses))
                ],
                ],
                Loc::getMessage('rover-acpe__duplicate-' . Profile::DUPLICATE_STATUS . '_label'),
                Loc::getMessage('rover-acpe__duplicate-' . Profile::DUPLICATE_STATUS . '_help')
            );
                // @TODO: LEAD_DUPLICATE_PIPELINE
        endif;

        echo $this->getDuplicateActionRow($entityType);

        if ($entityType == EntityTypesInterface::LEADS):

            echo TableSnippet::getCheckBoxRow([
                    'name'      => Profile::UF_DUPLICATE_DATA . '[' . EntityTypesInterface::LEADS . '][' . Profile::DUPLICATE_UPDATE_NAME . ']',
                    'checked'   => $this->getProfile()->isLeadDuplicateUpdateName(),
                ],
                Loc::getMessage('rover-acpe__duplicate-' . Profile::DUPLICATE_UPDATE_NAME . '_label'),
                Loc::getMessage('rover-acpe__duplicate-' . Profile::DUPLICATE_UPDATE_NAME . '_help')
            );

            echo TableSnippet::getCheckBoxRow([
                    'name'      => Profile::UF_DUPLICATE_DATA . '[' . EntityTypesInterface::LEADS . '][' . Profile::DUPLICATE_UPDATE_STATUS . ']',
                    'checked'   => $this->getProfile()->isLeadDuplicateUpdateStatus(),
                ],
                Loc::getMessage('rover-acpe__duplicate-' . Profile::DUPLICATE_UPDATE_STATUS . '_label'),
                Loc::getMessage('rover-acpe__duplicate-' . Profile::DUPLICATE_UPDATE_STATUS . '_help')
            );

        endif;

        echo '</tbody></table>';

        $subTabControl->End();

        return ob_get_clean();
    }

    /**
     * @return array|null
     * @throws AmoCRMApiException
     * @throws AmoCRMMissedTokenException
     * @throws AmoCRMoAuthApiException
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws Main\ArgumentException
     * @throws Main\LoaderException
     * @throws Main\ObjectPropertyException
     * @throws SystemException
     * @throws \AmoCRM\Exceptions\InvalidArgumentException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getLeadDuplicateOptions(): ?array
    {
        $options = $this->getProfile()->getMappingHelper()->getOptions(EntityTypesInterface::LEADS);

        $options['name']        = Loc::getMessage('rover-acpe__field-lead-name');
        $options['status_id']   = $this->getProfile()->isMultiPipeline()
            ? Loc::getMessage('rover-acpe__field-' . Profile::UF_LEAD_STATUS_ID . '_label_multy')
            : Loc::getMessage('rover-acpe__field-' . Profile::UF_LEAD_STATUS_ID . '_label_single');

        $options[EntityTypesInterface::CONTACTS] = Loc::getMessage('rover-acpe__field-contacts_id_label');

        return $options;
    }

    /**
     * @param $restType
     * @return array
     * @throws AmoCRMApiException
     * @throws AmoCRMMissedTokenException
     * @throws AmoCRMoAuthApiException
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws Main\ArgumentException
     * @throws Main\LoaderException
     * @throws Main\ObjectPropertyException
     * @throws ReflectionException
     * @throws SystemException
     * @throws \AmoCRM\Exceptions\InvalidArgumentException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getContactCompanyTab($entityType): array
    {
        $options = $this->getProfile()->getMappingHelper()->getOptions($entityType);

        if ($entityType == EntityTypesInterface::CONTACTS)
            $mappingClass = Contacts::class;
        elseif ($entityType == EntityTypesInterface::COMPANIES)
            $mappingClass = Companies::class;
        else
            throw new ArgumentOutOfRangeException('restType');

        return [
            'id'        => 'header-' . $entityType,
            'name'      => Loc::getMessage('rover-acpe__header-' . $entityType)
                . ($this->getProfile()->isAmoEntityEnabled($entityType) ? ' ✔' : ' ✖'),
            'title'     => Loc::getMessage('rover-acpe__header-' . $entityType),
            'fields'    => [
                $this->getCheckbox(Profile::UF_AMO_ENTITIES . '[' . $entityType . ']', [],
                    Loc::getMessage('rover-acpe__field-create-' . $entityType),
                    Loc::getMessage('rover-acpe__field-create-' . $entityType . '_help'),
                    $this->getProfile()->isAmoEntityEnabled($entityType)
                ),
                [
                    'id'        => 'mapping-fields-subtabs_' . $mappingClass::getUFName(),
                    'type'      => 'custom',
                    'colspan'   => true,
                    'value'     => $this->getEntitySubTabs($this->getProfile()->getMapping($mappingClass), $options)
                ],
            ]
        ];
    }

    /**
     * @return array
     * @throws AmoCRMApiException
     * @throws AmoCRMoAuthApiException
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws Main\ArgumentException
     * @throws Main\LoaderException
     * @throws Main\ObjectPropertyException
     * @throws ReflectionException
     * @throws SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getTaskTab() : array
    {
        $profile        = $this->getProfile();
        $connection     = $profile->getConnection();
        $elementTypes   = array(
            EntityTypesInterface::CONTACTS  => Loc::getMessage('rover-acpe__entity-' . EntityTypesInterface::CONTACTS . '_label'),
            EntityTypesInterface::COMPANIES => Loc::getMessage('rover-acpe__entity-' . EntityTypesInterface::COMPANIES . '_label'),
            EntityTypesInterface::LEADS     => Loc::getMessage('rover-acpe__entity-' . EntityTypesInterface::LEADS . '_label')
        );

        $enabled = $this->getProfile()->isTasksEnabled() && !$profile->isUnsorted();

        return [
            'id'        => 'tasks_header',
            'name'      => Loc::getMessage('rover-acpe__header-' . EntityTypesInterface::TASKS)
                . ($enabled ? ' ✔' : ' ✖'),
            'title'     => Loc::getMessage('rover-acpe__header-' . EntityTypesInterface::TASKS)
                . ($profile->isUnsorted() ? Loc::getMessage('rover-acpe__header-' . EntityTypesInterface::TASKS . '-disabled') : ''),
            'fields'    => [
                $this->getCheckbox(Profile::UF_AMO_ENTITIES . '[' . EntityTypesInterface::TASKS . ']', [],
                    Loc::getMessage('rover-acpe__field-create-' . EntityTypesInterface::TASKS),
                    Loc::getMessage('rover-acpe__field-create-' . EntityTypesInterface::TASKS . '_help'),
                    $this->getProfile()->isTasksEnabled()
                ),
                $this->getSelect(Profile::UF_TASK_ELEMENT_TYPE, Profile::getFieldL18n(Profile::UF_TASK_ELEMENT_TYPE),
                    $elementTypes, false, Loc::getMessage('rover-acpe__field-' . Profile::UF_TASK_ELEMENT_TYPE . '_help')),
                [
                    'id'        => Profile::UF_TASK_TYPE,
                    'name'      => Profile::getFieldL18n(Profile::UF_TASK_TYPE),
                    'required'  => false,
                    'type'      => 'select',
                    'items'     => Params::getTaskTypes($connection),
                ],
                [
                    'id'        => Profile::UF_TASK_DEADLINE,
                    'name'      => Profile::getFieldL18n(Profile::UF_TASK_DEADLINE),
                    'required'  => false,
                    'type'      => 'select',
                    'items'     => [
                        Profile::TASK_DEADLINE__NOW         => Loc::getMessage('rover-acpe__field-' . Profile::UF_TASK_DEADLINE . '_now'),
                        Profile::TASK_DEADLINE__ONE_HOUR    => Loc::getMessage('rover-acpe__field-' . Profile::UF_TASK_DEADLINE . '_one-hour'),
                        Profile::TASK_DEADLINE__DAY_END     => Loc::getMessage('rover-acpe__field-' . Profile::UF_TASK_DEADLINE . '_day-end'),
                    ],
                    ],
                [
                    'id'    => Tasks::getUFName() . '-section',
                    'name'  => Profile::getFieldL18n(Tasks::getUFName()),
                    'type'  => 'section'
                ],
                [
                        'id'        => Tasks::getUFName(),
                        'name'      => Profile::getFieldL18n(Tasks::getUFName()),
                        'required'  => false,
                        'type'      => 'custom',
                        'colspan'   => true,
                        'value'     => MappingSnippet::getTable($this->getProfile()->getMapping(Tasks::class), null, true)
                ],
            ]
        ];
    }

    /**
     * @throws Main\ArgumentException
     * @throws Main\ArgumentNullException
     * @throws Main\ArgumentOutOfRangeException
     * @throws Main\LoaderException
     * @throws Main\NotImplementedException
     * @throws Main\ObjectPropertyException
     * @throws Main\SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function checkRequest()
    {
        if ($this->request->get('ok_message'))
            Message::addOk($this->request->get('ok_message'));

        if ($this->request->get('error_message'))
            Message::addError($this->request->get('error_message'));

        if ($this->request->get('connection_id') && empty($this->arParams['ID']))
        {
            $this->requestAddProfile();
        }

        if (empty($this->arParams['ID']))
            throw new Main\ArgumentNullException('ID');

        if (!$this->getProfile()->getConnection()->isAvailable())
            throw new Main\SystemException(Loc::getMessage('rover-acpe__connection-unavailable'));

        if($this->request->isPost()
            && ($this->request->getPost('apply') || $this->request->getPost('save'))
            && check_bitrix_sessid())
        {
            $this->requestUpdateProfile();
        }
    }

    /**
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws Main\LoaderException
     * @throws Main\NotImplementedException
     * @throws SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function requestUpdateProfile() : void
    {
        $skipChecking = [];
        if ($this->arParams['ID'])
            $skipChecking[] = Profile::UF_CONNECTION_ID;

        if (!self::checkRequestFields(Profile::class, $skipChecking))
            return;

        $data = $this->getPostData();

        unset($data[Profile::UF_CONNECTION_ID]);    // do not update connection
        unset($data[Profile::UF_SOURCE_TYPE]);      // do not update source type
        unset($data[Profile::UF_SOURCE_ID]);        // do not update source id

        Profile::checkMandatoryData($data, [Profile::UF_CONNECTION_ID, Profile::UF_SOURCE_TYPE, Profile::UF_SOURCE_ID]);

        unset($data[Profile::UF_CONNECTION_ID]); // do not update connection
        $result = Profile::update($this->arParams['ID'], $data);

        if ($result->isSuccess())
        {
            if ($this->request->getPost('apply'))
                LocalRedirect('/bitrix/admin/rover-acrm__profile-element.php?profile_id=' . $result->getId() . '&lang=' . LANGUAGE_ID);
            else
                LocalRedirect('/bitrix/admin/rover-acrm__profile-list.php?lang=' . LANGUAGE_ID);
        }
        else
        {
            Message::addError(implode('<br>', $result->getErrorMessages()));
        }
    }

    /**
     * @return array
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws Main\LoaderException
     * @throws Main\NotImplementedException
     * @throws ReflectionException
     * @throws SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getPostData(): array
    {
        $postList   = $this->request->getPostList();
        $params     = Profile::getAdditionalUfParams();
        $result     = [];

        foreach ($params as $fieldParam)
        {
            if (in_array($fieldParam['FIELD_NAME'], [Profile::UF_AMO_ENTITIES]))
            {
                $value = [];
                foreach ($postList->get($fieldParam['FIELD_NAME']) as $type => $checkBoxValue)
                    if ($checkBoxValue == 'Y')
                        $value[] = $type;
            }
            else
            {
            $value = $postList->get($fieldParam['FIELD_NAME']);

            if (is_array($value) && $fieldParam['MULTIPLE'] != 'Y')
                $value = serialize($value);
                $mappingClassName = Mapping::getClassNameByUfName($fieldParam['FIELD_NAME']);

                if ($mappingClassName)
                {
                    $value = $mappingClassName::encode($value);
                }
                else
                {
            if ($fieldParam['USER_TYPE_ID'] == 'boolean')
            {
                if (!in_array($value, ['Y', 'N']))
                    continue;

                $value = $value == 'Y';

            } elseif (is_null($value) && isset($fieldParam['SETTINGS']['DEFAULT_VALUE']))
                $value = $fieldParam['SETTINGS']['DEFAULT_VALUE'];
                }
            }

            $result[$fieldParam['FIELD_NAME']] = $value;
        }

        return $result;
    }

    /**
     * @return array
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws Main\LoaderException
     * @throws Main\NotImplementedException
     * @throws SystemException
     * @throws ReflectionException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getData(): array
    {
        $data = $this->arParams['ID']
            ? $this->getProfile()->getCollection()->getCollection()
            : $this->getPostData();

        return self::prepareUfData($data, Profile::getAdditionalUfParams());
    }

    /**
     * @throws AmoCRMApiException
     * @throws AmoCRMoAuthApiException
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws Main\ArgumentException
     * @throws Main\LoaderException
     * @throws Main\ObjectPropertyException
     * @throws ReflectionException
     * @throws SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
	public function getResult() : void
    {
        $this->arResult['ACTION_PANEL'] = $this->getActionPanel();
        $this->arResult['TABS']         = $this->getTabs();
        $this->arResult['DATA']         = $this->getData();

        $serviceMessages = $this->getProfile()->getServiceMessages();
        if ($serviceMessages)
            Message::addError($serviceMessages);
    }
    
    /**
     * @return Profile
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws Main\LoaderException
     * @throws SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getProfile(): Profile
    {
        return Profile::load($this->arParams['ID']);
    }

    /**
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws Main\ArgumentException
     * @throws SystemException
     * @throws Main\LoaderException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function setTitle() : void
    {
        global $APPLICATION;
        $APPLICATION->SetTitle(Loc::getMessage('rover-acpe__title', ['#name#' => $this->getProfile()->getName()]));
    }

    /**
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws Main\ArgumentException
     * @throws Main\ObjectPropertyException
     * @throws SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
	public function executeComponent() : void
	{
		try {
			$this->setFrameMode(false);
			$this->checkParams();
            $this->checkRequest();
            $this->getResult();
            $this->checkRights($this->getProfile());
            $this->setTitle();

			$this->includeComponentTemplate();
		} catch (Exception $e) {
            RoverAmoCRM::handleException($e, true);
			echo Loc::getMessage('rover-acpe__to-list');
		}
	}
}