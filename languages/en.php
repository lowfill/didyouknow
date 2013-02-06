<?php

	require_once dirname(dirname(__FILE__)) . '/lib/functions.php';

	$lang = array(
        'didyouknow:title' => "Did you know?",
		'didyouknow:error' => "Error: please check the administration settings panel."
	);

	$lang = array_merge($lang, dyk_prepare());

	add_translation("en", $lang);

?>