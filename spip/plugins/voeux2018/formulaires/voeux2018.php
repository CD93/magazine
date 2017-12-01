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

function formulaires_voeux2018_charger() {
  $valeurs = array(
    'mesvoeux' => 'Bonne année 2018 !',
  );
  return $valeurs;
}
function formulaires_voeux2018_verifier() {
  $erreurs = array();
  return $erreurs;
}
function formulaires_voeux2018_traiter() {
  $rub95 = _request('rub95');
  $rub96 = _request('rub96');
  $rub97 = _request('rub97');
  $rub98 = _request('rub98');
  $rub99 = _request('rub99');
  $message = "Vous pouvez partager vos voeux ! <a href='plugins/voeux2018/imagevoeux2018.php?rub95=$rub95&rub96=$rub96&rub97=$rub97&rub98=$rub98&rub99=$rub99'>voir ici</a>";
  return array(
    'message_ok' => $message,
    'message_erreur' => $erreurs
  );
}

?>
