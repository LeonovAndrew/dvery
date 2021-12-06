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
use AmoCRM\Models\CustomFields\CustomFieldModel;
use AmoCRM\Models\CustomFields\WithEnumCustomFieldModel;
use Bitrix\Main;
use Bitrix\Main\ArgumentNullException;
use Bitrix\Main\ArgumentOutOfRangeException;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\SystemException;
use Bitrix\Sale\Internals\StatusLangTable;
use Rover\AmoCRM\Component\ElementBase;
use Rover\AmoCRM\Config\Tabs;
use Rover\AmoCRM\Controller\Duplicate;
use Rover\AmoCRM\Directory\Entity\Connection;
use Rover\AmoCRM\Directory\Entity\Profile;
use Rover\AmoCRM\Model\AdditionalParam\VisitorUid;
use Rover\AmoCRM\Model\AdvMarks;
use Rover\AmoCRM\Model\Rest;
use Rover\AmoCRM\Model\Rest\Company;
use Rover\AmoCRM\Model\Rest\Contact;
use Rover\AmoCRM\Model\Rest\Lead;
use Rover\AmoCRM\Model\Rest\Note;
use Rover\AmoCRM\Model\Rest\Task;
use Rover\AmoCRM\Model\Source;
use Bitrix\Main\Web\Uri;
use Rover\AmoCRM\Service\CustomField;
use Rover\AmoCRM\Service\Message;
use Rover\AmoCRM\Service\Params;
use Rover\AmoCRM\Service\Placeholder;

if (!Main\Loader::includeModule('rover.amocrm'))
    throw new Main\SystemException('rover.amocrm module not found');
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
        $uri->addParams(["preset_id" => $result->getId()]);

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
                'LINK'  => '/bitrix/admin/rover-acrm__result-list.php?preset_id=' . $this->arParams['ID'] . '&lang=' . LANGUAGE_ID,
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
     * @param $restType
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
     * @throws AmoCRMMissedTokenException
     * @throws \AmoCRM\Exceptions\InvalidArgumentException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    public function getMappingSubTabControl($restType) : array
    {
        $initTabs = [];

        $tabsTypes = $restType == Task::getType()
            ? ['auto', 'adv', 'add']
            : ['auto', 'custom', 'adv', 'add'];

        foreach ($tabsTypes as $subTab)
        {
            $initTabs[] = [
                "DIV"   => "opt_site_" . $subTab . '_' . $restType,
                "TAB"   => Loc::getMessage('rover-acpe__header-fields-' . $subTab . '-' . $restType),
                'TITLE' => Loc::getMessage('rover-acpe__header-fields-' . $subTab . '-' . $restType . '-help')
            ];
        }

        $rest = Rest::buildByType($restType, $this->getProfile()->getConnection());
        $entityType = $rest::getEntityType();

        $mapping = $this->getProfile()->getMapping();
        ob_start();

        $subTabControl = new CAdminViewTabControl("subTabControl_mapping_fields_" . $restType, $initTabs);
        $subTabControl->Begin();
        // auto
        $subTabControl->BeginNextTab();
        $this->showMappingInput($mapping->getSubTabAutoLabels($restType), $mapping->getOptions($entityType, false),
            [$this->getProfile()->getSource()->getOptionName($restType, '~files') => Loc::getMessage('rover-acrm__' . Source\PostEvent::FIELD__FILES . '-help')]);

        if ($entityType != EntityTypesInterface::TASKS)
        {
            // custom
            $subTabControl->BeginNextTab();
            $this->showMappingInput(Params::getCustomSelectBoxes($this->getProfile()->getConnection(), $entityType));
        }
        // adv
        $subTabControl->BeginNextTab();
        $this->showMappingInput($mapping->getSubTabAdvLabels($restType), $mapping->getOptions($entityType), [
            AdvMarks::getTemplate() . $restType => Loc::getMessage('rover-acrm__' . AdvMarks::getType() . '-all-help')
        ]);
        // add
        $subTabControl->BeginNextTab();
        $this->showMappingInput($mapping->getSubTabAddLabels($restType), $mapping->getOptions($entityType), [
            VisitorUid::getTemplate() . $restType => Loc::getMessage('rover-acrm__' . VisitorUid::getType() . '-help')
        ]);

        $subTabControl->End();

        return [
            'id'        => Tabs::MAPPING_SUBTABCONROL . $entityType,
            'name'      => Loc::getMessage('rover-acpe__field-' . Tabs::MAPPING_SUBTABCONROL . '_label'),
            'required'  => false,
            'type'      => 'custom',
            'value'     => ob_get_clean()
        ];
    }

    /**
     * @param       $labels
     * @param array $values
     * @param array $helps
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws Main\ArgumentException
     * @throws SystemException
     * @throws Main\LoaderException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function showMappingInput($labels, array $values = [], array $helps = [])
    {
        //pr($labels);
        ?><table class="adm-detail-content-table edit-table">
            <tbody><?

                foreach ($labels as $name => $label):

                    if (empty($values) && ($label instanceof CustomFieldModel))
                    {

                        $name           = CustomField::getCodeById($label->getId());
                        $multiple       = $label->getType() == CustomFieldModel::TYPE_MULTISELECT;
                        $resultLabel    = $label->getName();
                        $isCheckBox     = $label->getType() == CustomFieldModel::TYPE_CHECKBOX;

                        if ($label instanceof WithEnumCustomFieldModel)
                        {
                            $resultValues  = [0 => Loc::getMessage('rover-ac__skip')];
                            foreach ($label->getEnums() as $enum)
                                $resultValues[$enum->getId()] = $enum->getValue();
                        }

                    } else {
                        $multiple       = false;
                        $resultValues   = $values;
                        $resultLabel    = $label;
                        $isCheckBox     = false;
                    }

                    $config = [
                        'options' => $resultValues,
                        'params' => [
                            'id' => Profile::UF_MAPPING_DATA . ':' . $name,
                            'name' => Profile::UF_MAPPING_DATA . '[' . $name . ']'
                        ],
                        'selected' => $this->getProfile()->getMappingData()[$name] ?? null
                    ];

                    if ($multiple)
                    {
                        $config['params']['multiple'] = 'multiple';
                        $config['params']['size'] = min(count($resultValues), 4);
                        $config['params']['name'] .= '[]';
                    }

                    if ($name):
                        ?><tr>
                            <td style="width:50%; vertical-align: top; padding-top: 7px;" class="adm-detail-content-cell-l">
                                <label for="<?=$name?>"
                                ><?=$resultLabel?></label>
                            </td>
                            <td style="width:50%" class="adm-detail-content-cell-r">
                                <? if ($isCheckBox): ?>
                                    <input type="hidden" name="<?=$config['params']['name']?>" value="N">
                                    <input type="checkbox" name="<?=$config['params']['name']?>" value="Y" <?=$config['selected'] == 'Y' ? 'checked' : ''?>>
                                <? else: ?>
                                    <?=$this->getSelectInput($config);?>
                                <?endif;?>
                                <? if (isset($helps[$name])): ?>
                                    <br><small style="color: #777"><?=$helps[$name]?></small>
                                <?php endif; ?>
                            </td>
                        </tr><?
                    endif;
                endforeach;
            ?></tbody>
        </table><?php
    }

    /**
     * @param       $name
     * @param array $addParams
     * @return string
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws Main\ArgumentException
     * @throws ReflectionException
     * @throws SystemException|Main\LoaderException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getPlaceholder($name, array $addParams = []) : string
    {
        $name = trim($name);
        if (!mb_strlen($name))
            throw new ArgumentNullException('name');

        return Loc::getMessage('rover-acpe__insert-placeholders', [
            '#elementId#'   => $name,
            '#content#'     => implode('<br>', Placeholder::getScriptedLegend($this->getProfile()->getSource(), $name, $addParams))
        ]);
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
    public function getDuplicateAction($entityType) : array
    {
        $help = $this->getProfile()->isUnsorted()
            ? Loc::getMessage('rover-acrm__duplicate_action_unsorted_help')
            : '';

        $actions = array(
            Duplicate::ACTION__ADD_NOTE => Loc::getMessage('rover-acpe__duplicate-action-' . Duplicate::ACTION__ADD_NOTE . '_label'),
            Duplicate::ACTION__COMBINE  => Loc::getMessage('rover-acpe__duplicate-action-' . Duplicate::ACTION__COMBINE . '_label'),
            Duplicate::ACTION__SKIP     => Loc::getMessage('rover-acpe__duplicate-action-' . Duplicate::ACTION__SKIP . '_label'),
        );

        return $this->getSelect(
            Profile::UF_DUPLICATE_DATA . "[$entityType][" . Duplicate::ACTION . ']',
            Loc::getMessage('rover-acpe__duplicate-action-label'),
            $actions,
            false,
            $help,
            false,
            1,
            (bool)strlen($help),
            $this->getProfile()->getDuplicateData()[$entityType][Duplicate::ACTION] ?? null
        );
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
     * @param $type
     * @return array
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws Main\LoaderException
     * @throws SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getDuplicateControl($type) : array
    {
        $type = trim($type);
        if (!mb_strlen($type))
            throw new ArgumentNullException('type');

        return [
            'id'        => Profile::UF_DUPLICATE_DATA . "[$type][" . Duplicate::ACTIVE . ']',
            'name'      => Loc::getMessage('rover-acpe__duplicate-control-label'),
            'required'  => false,
            'type'      => 'checkbox',
            'params'    => [
                'a' => $this->getPostInput($this->getHelp(Loc::getMessage('rover-acpe__duplicate-control-' . $type .  '-help')))
            ],
            'value'     => $this->getProfile()->getDuplicateData()[$type][Duplicate::ACTIVE] ?? null
        ];
    }

    /**
     * @param string $entityType
     * @param array  $options
     * @return array
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws Main\ArgumentException
     * @throws Main\LoaderException
     * @throws SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getDuplicateFields(string $entityType, array $options) : array
    {
        return $this->getSelect(Profile::UF_DUPLICATE_DATA . "[$entityType][" . Duplicate::FIELDS . ']',
            Loc::getMessage('rover-acpe__duplicate-fields-label'), $options, true,
            Loc::getMessage('rover-acpe__duplicate-fields-help'), false, 6, false,
            $this->getProfile()->getDuplicateData()[$entityType][Duplicate::FIELDS] ?? null);
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
     * @param $entityType
     * @return array
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws Main\LoaderException
     * @throws SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getDuplicateLogic($entityType) : array
    {
        $entityType = trim($entityType);
        if (!strlen($entityType))
            throw new ArgumentNullException('entityType');

        return [
            'id'        => Profile::UF_DUPLICATE_DATA . "[$entityType][" . Duplicate::LOGIC . ']',
            'name'      => Loc::getMessage('rover-acpe__duplicate-logic-label'),
            'required'  => false,
            'type'      => 'select',
            'items'     => array(
                Duplicate::LOGIC__AND => Loc::getMessage('rover-acpe__duplicate-logic-' . Duplicate::LOGIC__AND . '_label'),
                Duplicate::LOGIC__OR  => Loc::getMessage('rover-acpe__duplicate-logic-' . Duplicate::LOGIC__OR . '_label'),
            ),
            'value'     => $this->getProfile()->getDuplicateData()[$entityType][Duplicate::LOGIC] ?? null
        ];
    }

    /**
     * @return array
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws Main\ArgumentException
     * @throws ReflectionException
     * @throws SystemException
     * @throws Main\LoaderException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getTaskText() : array
    {
        $profile = $this->getProfile();

        $textarea = '<textarea id="' . Profile::UF_TASK_TEXT . '" rows="5" cols="80" name="' . Profile::UF_TASK_TEXT . '">'
            . $profile->getTaskText() .  '</textarea>'
            . $this->getPlaceholder(Profile::UF_TASK_TEXT, ['FIELDS' => Loc::getMessage('rover-acpe__field-' . Profile::UF_TASK_TEXT . '_fields')])
            . $this->getHelp(Loc::getMessage('rover-acpe__field-' . Profile::UF_TASK_TEXT . '_help'));

        return [
            'id'        => Profile::UF_TASK_TEXT,
            'name'      => Profile::getFieldL18n(Profile::UF_TASK_TEXT),
            'required'  => false,
            'type'      => 'custom',
            'value'     => $textarea
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
            $this->getContactCompanyTab(Contact::getType()),
            $this->getContactCompanyTab(Company::getType()),
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
        $sites      = Params::getSites();
        $responsibleList    = Params::getAmoUsers($connection);

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
                $this->getSelect(Profile::UF_SITES_IDS, Profile::getFieldL18n(Profile::UF_SITES_IDS), $sites, true, Loc::getMessage('rover-acpe__field-' . Profile::UF_SITES_IDS . '_help')),
                $this->getSelect(Profile::UF_RESPONSIBLE_LIST, Profile::getFieldL18n(Profile::UF_RESPONSIBLE_LIST), $responsibleList, true, Loc::getMessage('rover-acpe__field-' . Profile::UF_RESPONSIBLE_LIST . '_help')),
                [
                    'id'        => Profile::UF_COMMON_TAGS,
                    'name'      => Profile::getFieldL18n(Profile::UF_COMMON_TAGS),
                    'required'  => false,
                    'type'      => 'text',
                    'params'    => [
                        'size'  => 50,
                        'id'    => Profile::UF_COMMON_TAGS,
                        'a'     => $this->getPostInput($this->getPlaceholder(Profile::UF_COMMON_TAGS)
                            . $this->getHelp(Loc::getMessage('rover-acpe__field-' . Profile::UF_COMMON_TAGS . '_help')))
                    ]
                ],
                $this->getCheckbox(Profile::UF_GROUP_NOTES),
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

        $bxToAmoProductsParams = [];
        $amoToBxProductsParams = [];

        if ($this->getProfile()->isUnsorted())
        {
            $bxToAmoProductsParams['disabled'] = 'disabled';
            $bxToAmoProductsParams['a'] = $this->getPostInput($this->getHelp(
                    Loc::getMessage('rover-acpe__field-' . Profile::UF_ORDER_BX_AMO_PRODUCTS . '_unsorted_help')));

            $amoToBxProductsParams['disabled'] = 'disabled';
            $amoToBxProductsParams['a'] = $this->getPostInput($this->getHelp(
                    Loc::getMessage('rover-acpe__field-' . Profile::UF_ORDER_AMO_BX_PRODUCTS . '_unsorted_help')));
        }

        $tab = [
            'id'        => 'header-order',
            'name'      => Loc::getMessage('rover-acpe__header-order'),
            'title'     => Loc::getMessage('rover-acpe__header-order'),
            'fields'    => [
                [
                    'id'    => 'fields-settings-order-bx-to-amo',
                    'name'  => Loc::getMessage('rover-acpe__header-fields-bx-to-amo-order'),
                    'type'  => 'section',
                ],
                $this->getCheckbox(Profile::UF_ORDER_BX_AMO_STATUSES),
                $this->getCheckbox(Profile::UF_ORDER_BX_AMO_PRODUCTS, $bxToAmoProductsParams),
                [
                    'id'    => 'fields-settings-order-amo-to-bx',
                    'name'  => Loc::getMessage('rover-acpe__header-fields-amo-to-bx-order'),
                    'type'  => 'section',
                ],
                $this->getCheckbox(Profile::UF_ORDER_AMO_BX_STATUSES),
                $this->getCheckbox(Profile::UF_ORDER_AMO_BX_PRODUCTS, $amoToBxProductsParams),
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

        // duplicate options
        $options = $this->getProfile()->getMapping()->getOptions(EntityTypesInterface::LEADS);
        unset($options[Note::getType()]);

        $options[Lead::FIELD__SALE] = $options[Tabs::LEAD_SALE];
        unset($options[Tabs::LEAD_SALE]);

        $options[Lead::FIELD__NAME]         = Profile::getFieldL18n(Profile::UF_LEAD_NAME);
        $options[Lead::FIELD__STATUS_ID]    = $this->getProfile()->isMultiPipeline()
            ? Loc::getMessage('rover-acpe__field-' . Profile::UF_LEAD_STATUS_ID . '_label_multy')
            : Loc::getMessage('rover-acpe__field-' . Profile::UF_LEAD_STATUS_ID . '_label_single');

        $options['contacts'] = Loc::getMessage('rover-acpe__field-contacts_id_label');

        return [
            'id'        => 'header-' . EntityTypesInterface::LEADS,
            'name'      => Loc::getMessage('rover-acpe__header-' . Lead::getType()),
            'title'     => Loc::getMessage('rover-acpe__header-' . Lead::getType()),
            'fields'    => [
                $this->getCheckbox(Profile::UF_LEAD_CREATE),
                [
                    'id'        => Profile::UF_LEAD_NAME,
                    'name'      => Profile::getFieldL18n(Profile::UF_LEAD_NAME),
                    //'required'  => true,
                    'type'      => 'text',
                    'params'    => [
                        'id'    => Profile::UF_LEAD_NAME,
                        'size' => 50,
                        'a' => $this->getPostInput($this->getPlaceholder(Profile::UF_LEAD_NAME)
                            . $this->getHelp(Loc::getMessage('rover-acpe__field-' . Profile::UF_LEAD_NAME . '_help'))
                        )
                    ]
                ],
                $pipelineField,
                $this->getCheckbox(Profile::UF_LEAD_VISITOR_UID),
                $this->getMappingSubTabControl(Lead::getType()),
                [
                    'id'    => 'fields-settings-lead-duplicates',
                    'name'  => Loc::getMessage('rover-acpe__header-duplicates-' . EntityTypesInterface::LEADS),
                    'type'  => 'section'
                ],
                $this->getDuplicateControl(EntityTypesInterface::LEADS),
                $this->getCheckbox(Profile::UF_DUPLICATE_DATA . '[' . EntityTypesInterface::LEADS . '][' . Duplicate::CONTACT . ']',
                    [], Loc::getMessage('rover-acpe__duplicate-' . Duplicate::CONTACT . '_label'),
                    Loc::getMessage('rover-acpe__duplicate-' . Duplicate::CONTACT . '_help'),
                    $this->getProfile()->getDuplicateData()[EntityTypesInterface::LEADS][Duplicate::CONTACT] ?? null
                ),
                $this->getDuplicateFields(EntityTypesInterface::LEADS, $options),
                $this->getDuplicateLogic(EntityTypesInterface::LEADS),
                // @TODO: LEAD_DUPLICATE_PIPELINE
                $this->getSelect(Profile::UF_DUPLICATE_DATA . '[' . EntityTypesInterface::LEADS . '][' . Duplicate::STATUS  . ']',
                    Loc::getMessage('rover-acpe__duplicate-' . Duplicate::STATUS . '_label'),
                    $allStatuses, true, Loc::getMessage('rover-acpe__duplicate-' . Duplicate::STATUS . '_help'), false, 6, false,
                    $this->getProfile()->getDuplicateData()[EntityTypesInterface::LEADS][Duplicate::STATUS] ?? null),

                $this->getDuplicateAction(EntityTypesInterface::LEADS),
                $this->getCheckbox(Profile::UF_DUPLICATE_DATA . '[' . EntityTypesInterface::LEADS . '][' . Duplicate::UPDATE_NAME . ']',
                    [], Loc::getMessage('rover-acpe__duplicate-' . Duplicate::UPDATE_NAME . '_label'),
                    Loc::getMessage('rover-acpe__duplicate-' . Duplicate::UPDATE_NAME . '_help'),
                    $this->getProfile()->getDuplicateData()[EntityTypesInterface::LEADS][Duplicate::UPDATE_NAME] ?? null
                ),
                $this->getCheckbox(Profile::UF_DUPLICATE_DATA . '[' . EntityTypesInterface::LEADS . '][' . Duplicate::UPDATE_STATUS . ']',
                    [], Loc::getMessage('rover-acpe__duplicate-' . Duplicate::UPDATE_STATUS . '_label'),
                    Loc::getMessage('rover-acpe__duplicate-' . Duplicate::UPDATE_STATUS . '_help'),
                    $this->getProfile()->getDuplicateData()[EntityTypesInterface::LEADS][Duplicate::UPDATE_STATUS] ?? null
                ),
            ]
        ];
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
    protected function getContactCompanyTab($restType): array
    {
        $rest = Rest::buildByType($restType, $this->getProfile()->getConnection());
        $entityType = $rest::getEntityType();

        $activeUfName = $entityType == EntityTypesInterface::CONTACTS
            ? Profile::UF_CONTACT_CREATE
            : Profile::UF_COMPANY_CREATE;

        $options = $this->getProfile()->getMapping()->getOptions($entityType);
        unset($options[Note::getType()]);

        return [
            'id'        => 'header-' . $entityType,
            'name'      => Loc::getMessage('rover-acpe__header-' . $entityType),
            'title'     => Loc::getMessage('rover-acpe__header-' . $entityType),
            'fields'    => [
                $this->getCheckbox($activeUfName),
                $this->getMappingSubTabControl($restType),
                [
                    'id'    => 'fields-settings-contact-duplicates',
                    'name'  => Loc::getMessage('rover-acpe__header-duplicates-' . $entityType),
                    'type'  => 'section'
                ],
                $this->getDuplicateControl($entityType),
                $this->getDuplicateFields($entityType, $options),
                $this->getDuplicateLogic($entityType),
                $this->getDuplicateAction($entityType),
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
        $profile    = $this->getProfile();
        $connection = $profile->getConnection();
        $elementTypes   = array(
            Rest::ELEMENT_TYPE__CONTACT => Loc::getMessage('rover-acpe__entity-' . Contact::getType() . '_label'),
            Rest::ELEMENT_TYPE__COMPANY => Loc::getMessage('rover-acpe__entity-' . Company::getType() . '_label'),
            Rest::ELEMENT_TYPE__LEAD    => Loc::getMessage('rover-acpe__entity-' . Lead::getType() . '_label')
        );

        return [
            'id'        => '5_header',
            'name'      => Loc::getMessage('rover-acpe__header-' . Task::getType()),
            'title'     => Loc::getMessage('rover-acpe__header-' . Task::getType()),
            'fields'    => [
                $this->getCheckbox(Profile::UF_TASK_CREATE),
                $this->getSelect(Profile::UF_TASK_ELEMENT_TYPE, Profile::getFieldL18n(Profile::UF_TASK_ELEMENT_TYPE),
                    $elementTypes, false, Loc::getMessage('rover-acpe__field-' . Profile::UF_TASK_ELEMENT_TYPE . '_help')),
                [
                    'id'        => Profile::UF_TASK_TYPE,
                    'name'      => Profile::getFieldL18n(Profile::UF_TASK_TYPE),
                    'required'  => false,
                    'type'      => 'select',
                    'items'     => Params::getTaskTypes($connection),
                ],
                $this->getTaskText(),
                [
                    'id'        => Profile::UF_TASK_DEADLINE,
                    'name'      => Profile::getFieldL18n(Profile::UF_TASK_DEADLINE),
                    'required'  => false,
                    'type'      => 'select',
                    'items'     => [
                        \Rover\AmoCRM\Controller\AmoCRM\Task::DEADLINE__DAY_END => Loc::getMessage('rover-acpe__field-' . Profile::UF_TASK_DEADLINE . '_day-end'),
                        \Rover\AmoCRM\Controller\AmoCRM\Task::DEADLINE__NOW     => Loc::getMessage('rover-acpe__field-' . Profile::UF_TASK_DEADLINE . '_now'),
                    ],
                ],
                $this->getMappingSubTabControl(Task::getType()),
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

        $result = Profile::update($this->arParams['ID'], $data);

        if ($result->isSuccess())
        {
            if ($this->request->getPost('apply'))
                LocalRedirect('/bitrix/admin/rover-acrm__profile-element.php?preset_id=' . $result->getId() . '&lang=' . LANGUAGE_ID);
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
     * @throws Main\ArgumentNullException
     * @throws Main\ArgumentOutOfRangeException
     * @throws Main\LoaderException
     * @throws Main\NotImplementedException
     * @throws Main\SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getPostData(): array
    {
        $postList   = $this->request->getPostList();
        $params     = Profile::getAdditionalUfParams();
        $result     = [];

        foreach ($params as $fieldParam)
        {
            $value = $postList->get($fieldParam['FIELD_NAME']);

            if (is_array($value) && $fieldParam['MULTIPLE'] != 'Y')
                $value = serialize($value);

            if ($fieldParam['USER_TYPE_ID'] == 'boolean')
            {
                if (!in_array($value, ['Y', 'N']))
                    continue;

                $value = $value == 'Y';

            } elseif (is_null($value) && isset($fieldParam['SETTINGS']['DEFAULT_VALUE']))
                $value = $fieldParam['SETTINGS']['DEFAULT_VALUE'];

            $result[$fieldParam['FIELD_NAME']] = $value;
        }

        return $result;
    }

    /**
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
    protected function fixPipelineStatuses() : void
    {
        // fix pipeline
        if ($this->getProfile()->isMultiPipeline())
        {
            $pipelineId = $this->getProfile()->getLeadPipelineId();
            if ($pipelineId)
            {
                try{
                    // check pipeline existence
                    $this->getProfile()->getConnection()->getApiClient()->pipelines()->getOne($pipelineId);
                } catch (Exception $e) {
                    $pipelines          = Params::getLeadPipelines($this->getProfile()->getConnection());
                    $firstPipeline      = reset($pipelines);
                    $firstPipelineId    = $firstPipeline['id'] ?? null;

                    $this->getProfile()->setLeadPipelineId($firstPipelineId);
                }
            }
        }
    }

    /**
     * @return array
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws Main\LoaderException
     * @throws Main\NotImplementedException
     * @throws SystemException
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
            RoverAmoCRMEvents::handleException($e, true);
			echo Loc::getMessage('rover-acpe__to-list');
		}
	}
}