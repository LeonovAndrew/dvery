<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 14.06.2017
 * Time: 13:15
 *
 * @author Pavel Shulaev (https://rover-it.me)
 */
use Rover\AmoCRM\Model\Source\PostEvent;
use Rover\AmoCRM\Model\Source\WebForm;

$MESS['rover-apl__presets']     = 'Integration profile';
$MESS['rover-apl__show']        = 'Show';
$MESS['rover-apl__all']         = 'All';
$MESS['rover-apl__check']       = 'check';
$MESS['rover-apl__activate']    = 'activate';
$MESS['rover-apl__deactivate']  = 'deactivate';
$MESS['rover-apl__delete']      = 'remove';

$MESS['rover-acrm__title']     = 'Creating new integration profile';
$MESS['rover-acrm__connection_select']                      = 'Choose connection';
$MESS['rover-acrm__' . WebForm::getType() . '_select']     = 'Choose web form';
$MESS['rover-acrm__' . PostEvent::getType() . '_select']   = 'Choose post event';
$MESS['rover-acrm__connection_empty']     = 'No connections found.<br>You can add it <a target="_blank" href="/bitrix/admin/rover-acrm__connection-list.php?lang=' . LANGUAGE_ID . '">here</a>';
$MESS['rover-acrm__' . WebForm::getType() . '_empty']     = 'No web forms found.<br>You can add it <a target="_blank" href="/bitrix/admin/rover-acrm__profile-list.php?lang=' . LANGUAGE_ID . '">here</a>';
$MESS['rover-acrm__' . PostEvent::getType() . '_empty']   = 'No post events forms found.<br>You can add it <a target="_blank" href="/bitrix/admin/rover-acrm__profile-list.php?lang=' . LANGUAGE_ID . '">here</a>';
$MESS['rover-acrm__button_close']   = 'Close';
$MESS['rover-acrm__button_add']   = 'Add';