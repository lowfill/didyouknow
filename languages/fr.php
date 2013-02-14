<?php

	// see en.php for comments

	require_once dirname(dirname(__FILE__)) . '/lib/functions.php';

	$lang = array(
		'didyouknow:title' => "Saviez-vous?",
		'didyouknow:error' => "Il y avait une erreur lors du chargement.<br /><br />Contexte: " . elgg_get_context() . ".",
		'didyouknow:refresh' => "Donnez-moi une autre!",
		'didyouknow:toggle' => "Cacher / Montrer",
	);

	$lang = array_merge($lang, dyk_prepare());

	add_translation("fr", $lang);

?>