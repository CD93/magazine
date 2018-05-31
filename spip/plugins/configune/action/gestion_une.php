<?php

if (!defined("_ECRIRE_INC_VERSION")) return;
function action_gestion_une() {
	$type = _request("type");
	$nbr = _request("nbr");
	$compos = _request("compos");
	$id_rubrique = _request("id_rubrique");
	$nombre = sql_getfetsel($nbr, 'spip_configunes', 'id_rubrique=' . intval($id_rubrique));
	if ($type == "ajouter") {
			$nombre++;
			sql_updateq("spip_configunes", array($nbr => $nombre), "id_rubrique = '$id_rubrique'");

	}
	if ($type == "retrait") {
			$nombre--;
			sql_updateq("spip_configunes", array($nbr => $nombre), "id_rubrique = '$id_rubrique'");
			
	}
	if ($type == "choixc") {
		sql_updateq("spip_configunes", array('composition' => $compos), "id_rubrique = '$id_rubrique'");
	}
	echo $nombre;
}
?>