<?php
/**
 * Fichier gérant l'installation et désinstallation du plugin configuration_une
 *
 * @plugin     configuration_une
 * @copyright  2016
 * @author     samuel
 * @licence    GNU/GPL
 * @package    SPIP\Configune\Installation
 */

if (!defined('_ECRIRE_INC_VERSION')) return;


/**
 * Fonction d'installation et de mise à jour du plugin configuration_une.
 *
 * @param string $nom_meta_base_version
 *     Nom de la meta informant de la version du schéma de données du plugin installé dans SPIP
 * @param string $version_cible
 *     Version du schéma de données dans ce plugin (déclaré dans paquet.xml)
 * @return void
**/
function configune_upgrade($nom_meta_base_version, $version_cible) {
	$maj = array();

	$maj['create'] = array(array('maj_tables', array('spip_configunes', 'spip_configunes_liens')));

	include_spip('base/upgrade');
	maj_plugin($nom_meta_base_version, $version_cible, $maj);
}


/**
 * Fonction de désinstallation du plugin configuration_une.
 *
 * @param string $nom_meta_base_version
 *     Nom de la meta informant de la version du schéma de données du plugin installé dans SPIP
 * @return void
**/
function configune_vider_tables($nom_meta_base_version) {

	sql_drop_table("spip_configunes");
	sql_drop_table("spip_configunes_liens");

	# Nettoyer les versionnages et forums
	sql_delete("spip_versions",              sql_in("objet", array('configune')));
	sql_delete("spip_versions_fragments",    sql_in("objet", array('configune')));
	sql_delete("spip_forum",                 sql_in("objet", array('configune')));

	effacer_meta($nom_meta_base_version);
}