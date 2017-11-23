<?php
/**
 * Utilisation de l'action supprimer pour l'objet voeux2018
 *
 * @plugin     voeux2018
 * @copyright  2017
 * @author     Samuel Godo
 * @licence    GNU/GPL
 * @package    SPIP\Voeux2018\Action
 */

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}



/**
 * Action pour supprimer un·e voeux2018
 *
 * Vérifier l'autorisation avant d'appeler l'action.
 *
 * @param null|int $arg
 *     Identifiant à supprimer.
 *     En absence de id utilise l'argument de l'action sécurisée.
**/
function action_supprimer_voeux2018_dist($arg=null) {
	if (is_null($arg)){
		$securiser_action = charger_fonction('securiser_action', 'inc');
		$arg = $securiser_action();
	}
	$arg = intval($arg);

	// cas suppression
	if ($arg) {
		sql_delete('voeux2018',  'id_voeux2018=' . sql_quote($arg));
	}
	else {
		spip_log("action_supprimer_voeux2018_dist $arg pas compris");
	}
}
