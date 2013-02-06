<?php

	require_once dirname(dirname(__FILE__)) . '/lib/functions.php';

	$lang = array(
        'didyouknow:title' => "Saviez-vous?",
		'didyouknow:error' => "Erreur: s'il vous plaît vérifier les paramètres de l'interface d'administration."
	);

	$lang = array_merge($lang, dyk_prepare());

	add_translation("fr", $lang);

?>