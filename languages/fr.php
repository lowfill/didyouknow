<?php

	require_once elgg_get_plugins_path() . 'didyouknow/lib/functions.php';

	$lang = array(
        'didyouknow:title' => "Saviez-vous?",
		'didyouknow:error' => "Erreur: s'il vous plaît vérifier les paramètres de l'interface d'administration."
	);

	$lang = array_merge($lang, dykPrepareFR('event_calendar'));
	$lang = array_merge($lang, dykPrepareFR('groups'));

	add_translation("fr", $lang);

?>