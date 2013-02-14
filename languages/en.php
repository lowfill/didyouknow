<?php

	// need this functions file
	require_once dirname(dirname(__FILE__)) . '/lib/functions.php';

	// create an array with some stuff for elgg_echo()
	$lang = array(
		'didyouknow:title' => "Did you know?",
		'didyouknow:error' => "There was an error loading the tip.<br /><br />Context: " . elgg_get_context() . ".",
		'didyouknow:refresh' => "Give me another!",
		'didyouknow:toggle' => "Toggle",
	);

	// add the the array with the array that is returned by dyk_prepare() which is declared in the /lib/functions.php file
	$lang = array_merge($lang, dyk_prepare());

	// add the translation
	add_translation("en", $lang);

?>