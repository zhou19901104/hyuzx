<?php
return array(
	//'配置项'=>'配置值'
	'DEFAULT_MODULE'        => 'Home',

	'CSS_URL' => C('SITE_URL').'/Public/Home/css',
	'JS_URL' => C('SITE_URL').'/Public/Home/js',
	'IMG_URL' => C('SITE_URL').'/Public/Home/images',
	'URL_ROUTER_ON'   => true,
	'URL_ROUTE_RULES' => array(

		'sp/zqhd' => array('Special/zhongqiu'),
		'sp/slz' => array('Special/face'),
		'sp/tuom' => array('Special/gem'),
		'sp/miracle' => array('Special/miracle'),
		'sp/gdc' => array('Special/jtubes'),

	),




);
