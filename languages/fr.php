<?php

	require_once dirname(dirname(__FILE__)) . '/lib/functions.php';

	$lang = array(
		'didyouknow:title' => "Saviez-vous?",
		'didyouknow:error' => "Il y avait une erreur lors du chargement.",
		'didyouknow:refresh' => "Donnez-moi une autre!",
		'didyouknow:toggle' => "Cacher",
	);

	$lang = array_merge($lang, dyk_prepare());

	add_translation("fr", $lang);

?>