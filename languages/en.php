<?php

	require_once dirname(dirname(__FILE__)) . '/lib/functions.php';

	$lang = array(
		'didyouknow:title' => "Did you know?",
		'didyouknow:error' => "There was an error loading the tip.",
		'didyouknow:refresh' => "Give me another!",
		'didyouknow:toggle' => "Hide",
	);

	$lang = array_merge($lang, dyk_prepare());

	add_translation("en", $lang);

?>