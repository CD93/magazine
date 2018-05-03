<?php
/*
 * Plugin Recommander a un ami
 * (c) 2006-2010 Fil
 * Distribue sous licence GPL
 *
 */

if (!defined("_ECRIRE_INC_VERSION")) return;

/**
 * Charger les valeurs du formulaire recommander
 * @param string $titre
 * @param string $url
 * @param string $texte
 * @param string $subject
 * @return array
 */
function formulaires_petit_agenda_charger_dist($lien = '', $class=''){
	if ($GLOBALS['spip_lang'] != $GLOBALS['meta']['langue_site'])
		$lang = $GLOBALS['spip_lang'];
	else
		$lang='';

	$action = generer_url_public("rubrique","id_rubrique=8"); # action specifique, ne passe pas par Verifier, ni Traiter
	return 
		array(
			'action' => $action,
			'formu' => _request('formu'),
			'ville'=> _request('ville'),
			'id_mot'=> _request('id_mot'),
			'titre'=> _request('titre'),
			'date'=> _request('date')
		);
}
?>