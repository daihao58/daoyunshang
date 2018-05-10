<?php
/**
 * @Author: anchen
 * @Date:   2016-05-11 18:36:36
 * @Last Modified by:   anchen
 * @Last Modified time: 2016-05-11 18:41:59
 */
return array(
    'view_filter' => array('Behavior\TokenBuildBehavior'),
    "action_end"=>array("Behavior\CronRunBehavior")
);