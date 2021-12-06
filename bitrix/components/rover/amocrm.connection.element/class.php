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

use \Bitrix\Main;
use \Bitrix\Main\Localization\Loc;
use Rover\AmoCRM\Component\ElementBase;
use Rover\AmoCRM\Directory\Entity\Connection;
use Rover\AmoCRM\Directory\Entity\Profile;
use \Rover\AmoCRM\Options;

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
class RoverAmoCrmConnectionElement extends ElementBase
{
    const FORM_ID = 'amocrm_connection_element';

    /** @var Connection */
    protected $connection;

    /**
     * @return array
     * @throws Main\ArgumentNullException
     * @throws Main\ArgumentOutOfRangeException
     * @throws Main\LoaderException
     * @throws Main\SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getActionPanel(): array
    {
        return array(
            array(
                'TEXT'  => Loc::getMessage('rover-acce__action-back', array('#cnt#' => Connection::getCount())),
                'TITLE' => Loc::getMessage('rover-acce__action-back_title'),
                'LINK'  => '/bitrix/admin/rover-acrm__connection-list.php?lang=' . LANGUAGE_ID,
                'ICON'  => 'btn-list'
            ),
            array(
                'TEXT'  => Loc::getMessage('rover-acae__integration-profiles', array('#cnt#' => Profile::getCount())),
                'TITLE' => Loc::getMessage('rover-acae__integration-profiles_title'),
                'LINK'  => '/bitrix/admin/rover-acrm__profile-list.php?lang=' . LANGUAGE_ID,
                'ICON'  => 'btn-list'
            ),
            array('SEPARATOR' => true),
            array(
                'TEXT'  => Loc::getMessage('rover-acce__action-settings'),
                'TITLE' => Loc::getMessage('rover-acce__action-settings_title'),
                'LINK'  => '/bitrix/admin/settings.php?lang=' . LANGUAGE_ID . '&mid=' . Options::MODULE_ID . '&mid_menu=1',
                'ICON'  => 'btn-settings'
            )
        );
    }

    /**
     * @return array
     * @throws Main\ArgumentNullException
     * @throws Main\ArgumentOutOfRangeException
     * @throws Main\LoaderException
     * @throws Main\SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getData()
    {
        if ($this->arParams['ID']) {
            $data = $this->getConnection()->getCollection()->getCollection();
        } else {
            $data = $this->getPostData();
        }

        return $data;
    }

    /**
     * @return array
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getPostData()
    {
        return [
            Connection::UF_NAME             => $_POST[Connection::UF_NAME] ?:Loc::getMessage('rover-acce__name-default'),
            Connection::UF_ACTIVE           => $_POST[Connection::UF_ACTIVE] ?:'Y',
            Connection::UF_SORT             => $_POST[Connection::UF_SORT] ?:100,
            Connection::UF_CLIENT_SECRET    => $_POST[Connection::UF_CLIENT_SECRET] ?:'',
            Connection::UF_CLIENT_UUID      => $_POST[Connection::UF_CLIENT_UUID] ?:'',
        ];
    }

    /**
     * @return mixed|Connection|null
     * @throws Main\ArgumentNullException
     * @throws Main\ArgumentOutOfRangeException
     * @throws Main\LoaderException
     * @throws Main\SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getConnection()
    {
        if (empty($this->arParams['ID']))
            throw new Main\ArgumentNullException('ID');

        if (empty($this->connection))
        {
            if (!$this->connection = Connection::load($this->arParams['ID']))
                throw new Main\ArgumentOutOfRangeException('ID');

            $this->connection->getCollection()->offsetSet(Connection::UF_ACTIVE,
                $this->connection->getCollection()->offsetGet(Connection::UF_ACTIVE) ? 'Y' : 'N'
            );
        }

        return $this->connection;
    }

    /**
     * @throws Main\ArgumentNullException
     * @throws Main\ArgumentOutOfRangeException
     * @throws Main\LoaderException
     * @throws Main\SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
	protected function getResult()
    {
        $this->arResult['DATA'] = $this->getData();
        $this->arResult['TABS'] = $this->getTabs();
        $this->arResult['ACTION_PANEL'] = $this->getActionPanel();
    }

    /**
     * @return array[]
     * @throws Main\ArgumentException
     * @throws Main\ArgumentNullException
     * @throws Main\ObjectPropertyException
     * @throws Main\SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function getTabs(): array
    {
        $redirectUri = Options::getRedirectUri();
        $redirectUri = $redirectUri
            ? '<b id="redirect-uri">' . $redirectUri . '</b>&nbsp <span onclick="copyTextFromBlock(\'redirect-uri\', this);"><a href="#" onclick="return false">' . Loc::getMessage('rover-acce__copy-link') . '</a></span><br>' . $this->getHelp(Loc::getMessage('rover-acce__copy-link_help'))
            : '-';

        return [
            [
                'id'        => 'main',
                'name'      => Loc::getMessage('rover-acce__tab-name'),
                'title'     => Loc::getMessage('rover-acce__tab-title'),
                'icon'      => '',
                'fields'    => [
                    [
                        'id'        => 'link',
                        'name'      => Loc::getMessage('rover-acce__header-link'),
                        'required'  => false,
                        'type'      => 'custom',
                        'value'     => $redirectUri
                    ],
                    [
                        'id'        => Connection::UF_NAME,
                        'name'      => Connection::getFieldL18n(Connection::UF_NAME),
                        'required'  => true,
                    ],
                    [
                        'id'        => Connection::UF_ACTIVE,
                        'name'      => Connection::getFieldL18n(Connection::UF_ACTIVE),
                        'required'  => false,
                        'type'      => 'checkbox'
                    ],
                    [
                        'id'        => Connection::UF_CLIENT_SECRET,
                        'name'      => Connection::getFieldL18n(Connection::UF_CLIENT_SECRET),
                        'required'  => true,
                    ],
                    [
                        'id'        => Connection::UF_CLIENT_UUID,
                        'name'      => Connection::getFieldL18n(Connection::UF_CLIENT_UUID),
                        'required'  => true,
                    ],
                    [
                        'id'        => Connection::UF_SORT,
                        'name'      => Connection::getFieldL18n(Connection::UF_SORT),
                        'required'  => false,
                        'type'      => 'integer'
                    ],
                ]
            ]
        ];
    }

    /**
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function setTitle()
    {
        global $APPLICATION;
        if (isset($this->arResult['DATA']['ID']))
            $title = Loc::getMessage('rover-acce__edit-title', ['#name#' => $this->arResult['DATA'][Connection::UF_NAME]]);
        else
            $title = Loc::getMessage('rover-acce__add-title');

        $APPLICATION->SetTitle($title);
    }

    /**
     * @return false
     * @throws Main\ArgumentNullException
     * @throws Main\LoaderException
     * @throws Main\SystemException
     * @author Pavel Shulaev (https://rover-it.me)
     */
    protected function checkRequest()
    {
        //Form submitted
        if($this->request->isPost() && check_bitrix_sessid())
        {
            $data = [
                Connection::UF_NAME             => $_POST[Connection::UF_NAME],
                Connection::UF_CLIENT_SECRET    => $_POST[Connection::UF_CLIENT_SECRET],
                Connection::UF_CLIENT_UUID      => $_POST[Connection::UF_CLIENT_UUID],
                Connection::UF_ACTIVE           => $_POST[Connection::UF_ACTIVE] != 'N' ? true : false,
                Connection::UF_SORT             => $_POST[Connection::UF_SORT] ? : 500,
            ];

            if ($this->arParams['ID'])
            {
                $result = Connection::update($this->arParams['ID'], $data);
            } else {
                $result = Connection::add($data);
            }

            if ($result->isSuccess())
            {
                if (isset($_POST['apply']))
                    LocalRedirect('/bitrix/admin/rover-acrm__connection-element.php?ID=' . $result->getId() . '&lang=' . LANGUAGE_ID);
                else
                    LocalRedirect('/bitrix/admin/rover-acrm__connection-list.php?lang=' . LANGUAGE_ID);

            } else {
                $this->arResult['MESSAGES'][] = [
                    'MESSAGE'   => implode('<br>', $result->getErrorMessages()),
                    'TYPE'      => 'ERROR',
                    'HTML'      => true
                ];

                return false;
            }
        }
    }

	/**
	 * @author Pavel Shulaev (https://rover-it.me)
	 */
	public function executeComponent()
	{
		try {

			$this->setFrameMode(false);
			$this->checkParams();
			$this->checkRequest();
            $this->getResult();
			$this->includeComponentTemplate();
		    $this->setTitle();

		} catch (Exception $e) {
		    RoverAmoCRMEvents::handleException($e, true);
		}
	}
}