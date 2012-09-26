<?php

$EM_CONF[$_EXTKEY] = array(
	'title' => 'A Rest Webservice',
	'description' => '',
	'category' => 'plugin',
	'shy' => 0,
	'version' => '0.0.1',
	'dependencies' => 'extbase,fluid',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'alpha',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 1,
	'lockType' => '',
	'author' => 'Author',
	'author_email' => 'Author@web.de',
	'author_company' => '',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'php' => '5.3.0-0.0.0',
			'typo3' => '4.7.0-4.7.99',
			'extbase' => '1.5.0-0.0.0',
			'fluid' => '1.5.0-0.0.0',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:6:{s:12:"ext_icon.gif";s:4:"e922";s:17:"ext_localconf.php";s:4:"196b";s:14:"ext_tables.php";s:4:"ba8a";s:40:"Classes/Controller/WebserviceController.php";s:4:"48f0";s:34:"Configuration/TypoScript/setup.txt";s:4:"89bb";s:46:"Resources/Private/Templates/Webservice/Index.html";s:4:"6f32";}',
	'suggests' => array(
	),
);

?>