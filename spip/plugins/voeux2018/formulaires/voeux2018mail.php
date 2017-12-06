<?php

/***************************************************************************\
 *  SPIP, Systeme de publication pour l'internet                           *
 *                                                                         *
 *  Copyright (c) 2001-2016                                                *
 *  Arnaud Martin, Antoine Pitrou, Philippe Riviere, Emmanuel Saint-James  *
 *                                                                         *
 *  Ce programme est un logiciel libre distribue sous licence GNU/GPL.     *
 *  Pour plus de details voir le fichier COPYING.txt ou l'aide en ligne.   *
\***************************************************************************/


if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

function formulaires_voeux2018mail_charger() {
  $valeurs = array(
    'mesvoeux' => 'Bonne année 2018 !',
  );
  return $valeurs;
}
function formulaires_voeux2018mail_verifier() {
  $erreurs = array();
  return $erreurs;
}
function formulaires_voeux2018_traiter() {
  $mail_dest = _request('mail_dest');
  $mail_exp = _request('mail_exp');
  $texte = _request('mesvoeux');
  $message = "envoyer la carte";
  return array(
    'message_ok' => $message,
    'message_erreur' => $erreurs
  );
}

?>
