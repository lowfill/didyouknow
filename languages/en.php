<?php

	require_once elgg_get_plugins_path() . '/didyouknow/lib/functions.php';

	$lang = array(
        'didyouknow:title' => "Did you know?",
		'didyouknow:error' => "Error: please check the administration settings panel."
	);

	$lang = array_merge($lang, dyk_prepare());

	add_translation("en", $lang);

?>