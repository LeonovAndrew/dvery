<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$arComponentParameters = [
    'GROUPS' => [],
    'PARAMETERS' => [
        'TOKEN' => [
            'PARENT' => 'BASE',
            'NAME' => Loc::getMessage('CP_BCSF_INSTAGRAM_TOKEN'),
            'TYPE' => 'STRING',
            'DEFAULT' => 'IGQVJXTGNUdWhxa0JGNzVwY3ZAWY2QtRE9JRXVRWnVGMVh4LV8tRjV0WGdsZA3ExTWdORXFUa2c4T2dKLVE3TmFvYU9yTHhxeHR1aGk2SllDUzFOb2tLZAFFHMnRIanV6elA2enNRVlNicjk4WjYwc1pxSwZDZD',
        ],
        'TITLE' => [
            'PARENT' => 'BASE',
            'NAME' => Loc::getMessage('CP_BCSF_INSTAGRAM_TITLE'),
            'TYPE' => 'STRING',
            'DEFAULT' => 'Мы в Instagram',
        ],
        'LAYOUT' => [
            'PARENT' => 'BASE',
            'NAME' => Loc::getMessage('CP_BCSF_LAYOUT_NAME'),
            'TYPE' => 'LIST',
            'MULTIPLE' => 'N',
            'DEFAULT' => 'slider',
            'VALUES' => [
                'slider' => Loc::getMessage('CP_BCSF_LAYOUT_SLIDER')
            ],
            'REFRESH' => 'Y'
        ],
        'POST_TEMPLATE' => [
            'PARENT' => 'BASE',
            'NAME' => Loc::getMessage('CP_BCSF_POST_TEMPLATE_NAME'),
            'TYPE' => 'LIST',
            'MULTIPLE' => 'N',
            'DEFAULT' => 'classic',
            'VALUES' => [
                'classic' => Loc::getMessage('CP_BCSF_POST_TEMPLATE_CLASSIC'),
                'tile' => Loc::getMessage('CP_BCSF_POST_TEMPLATE_TILE')
            ],
            'REFRESH' => 'Y'
        ],
        'ITEMS_COUNT' => [
            'PARENT' => 'BASE',
            'NAME' => Loc::getMessage('CP_BCSF_ITEMS_COUNT'),
            'TYPE' => 'STRING',
            'DEFAULT' => 12,
        ],
        'COLUMNS' => [
            'PARENT' => 'BASE',
            'NAME' => Loc::getMessage('CP_BCSF_COLUMNS_NAME'),
            'TYPE' => 'STRING',
            'DEFAULT' => 4
        ],
        'ROWS' => [
            'PARENT' => 'BASE',
            'NAME' => Loc::getMessage('CP_BCSF_ROWS_NAME'),
            'TYPE' => 'STRING',
            'DEFAULT' => 1
        ],
        'MARGIN_POSTS' => [
            'PARENT' => 'BASE',
            'NAME' => Loc::getMessage('CP_BCSF_MARGIN_POSTS_NAME'),
            'TYPE' => 'STRING',
            'DEFAULT' => 0
        ],
        'WIDTH' => [
            'PARENT' => 'BASE',
            'NAME' => Loc::getMessage('CP_BCSF_WIDTH_NAME'),
            'TYPE' => 'STRING',
            'DEFAULT' => 'auto'
        ],
        'ELEMENTS_DISPLAY' => [
            'PARENT' => 'BASE',
            'NAME' => Loc::getMessage('CP_BCSF_ELEMENTS_DISPLAY_NAME'),
            'TYPE' => 'LIST',
            'MULTIPLE' => 'Y',
            'VALUES' => [
                'user' => Loc::getMessage('CP_BCSF_ELEMENTS_DISPLAY_USER'),
                'date' => Loc::getMessage('CP_BCSF_ELEMENTS_DISPLAY_DATE'),
                'instagram_link' => Loc::getMessage('CP_BCSF_ELEMENTS_DISPLAY_LINK'),
                'share' => Loc::getMessage('CP_BCSF_ELEMENTS_DISPLAY_SHARE'),
                'text' => Loc::getMessage('CP_BCSF_ELEMENTS_DISPLAY_TEXT')
            ],
            'DEFAULT' => ['user', 'date', 'like_count', 'comments_count', 'share', 'text']
        ],
        /*'ELEMENTS_POPUP' => [
            'PARENT' => 'BASE',
            'NAME' => Loc::getMessage('CP_BCSF_ELEMENTS_POPUP_NAME'),
            'TYPE' => 'LIST',
            'MULTIPLE' => 'Y',
            'VALUES' => [
                'user' => Loc::getMessage('CP_BCSF_ELEMENTS_POPUP_USER'),
                'location' => Loc::getMessage('CP_BCSF_ELEMENTS_POPUP_LOCATION'),
                'follow_button' => Loc::getMessage('CP_BCSF_ELEMENTS_POPUP_FOLLOW'),
                'instagram_link' => Loc::getMessage('CP_BCSF_ELEMENTS_POPUP_LINK'),
                'share' => Loc::getMessage('CP_BCSF_ELEMENTS_POPUP_SHARE'),
                'text' => Loc::getMessage('CP_BCSF_ELEMENTS_POPUP_TEXT'),
                'date' => Loc::getMessage('CP_BCSF_ELEMENTS_POPUP_DATE'),
            ],
            'DEFAULT' => ['user', 'location', 'follow_button', 'instagram_link', 'like_count', 'share', 'text', 'date']
        ],*/
        'ACTION_CLICK_IMG' => [
            'PARENT' => 'BASE',
            'NAME' => Loc::getMessage('CP_BCSF_ACTION_CLICK_IMG_NAME'),
            'TYPE' => 'LIST',
            'MULTIPLE' => 'N',
            'VALUES' => [
                /*'popup' => Loc::getMessage('CP_BCSF_ACTION_CLICK_IMG_POPUP'),*/
                'insta' => Loc::getMessage('CP_BCSF_ACTION_CLICK_IMG_INSTA'),
                'none' => Loc::getMessage('CP_BCSF_ACTION_CLICK_IMG_NONE')
            ],
            'DEFAULT' => 'insta'
        ],
        'CACHE_TIME' => [
            'DEFAULT' => 86400
        ],
        'CACHE_GROUPS' => [
            'PARENT' => 'CACHE_SETTINGS',
            'NAME' => Loc::getMessage('CP_BCSF_CACHE_GROUPS'),
            'TYPE' => 'CHECKBOX',
            'DEFAULT' => 'N'
        ]
    ]
];