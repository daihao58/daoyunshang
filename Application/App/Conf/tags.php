<?php
return array(
	// 添加下面一行定义即可
	// 'app_begin' => array('Behavior\CheckLang'),

	// 必须使用app_end 原因还未查明，知道的请告知我一下谢谢
	'app_end' => array('Behavior\CronRunBehavior'),
);