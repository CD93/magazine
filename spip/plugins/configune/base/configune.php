<?php
/**
 * Déclarations relatives à la base de données
 *
 * @plugin     configuration_une
 * @copyright  2016
 * @author     samuel
 * @licence    GNU/GPL
 * @package    SPIP\Configune\Pipelines
 */

if (!defined('_ECRIRE_INC_VERSION')) return;


/**
 * Déclaration des alias de tables et filtres automatiques de champs
 *
 * @pipeline declarer_tables_interfaces
 * @param array $interfaces
 *     Déclarations d'interface pour le compilateur
 * @return array
 *     Déclarations d'interface pour le compilateur
 */
function configune_declarer_tables_interfaces($interfaces) {

	$interfaces['table_des_tables']['configunes'] = 'configunes';

	return $interfaces;
}


/**
 * Déclaration des objets éditoriaux
 *
 * @pipeline declarer_tables_objets_sql
 * @param array $tables
 *     Description des tables
 * @return array
 *     Description complétée des tables
 */
function configune_declarer_tables_objets_sql($tables) {

	$tables['spip_configunes'] = array(
		'type' => 'configune',
		'principale' => "oui",
		'field'=> array(
			'id_configune'       => 'bigint(21) NOT NULL',
			'id_rubrique'        => 'bigint(21) NOT NULL DEFAULT 0', 
			'nbr_art'            => 'int(6) NOT NULL DEFAULT 0',
			'nbr_art_diapo'      => 'int(6) NOT NULL DEFAULT 0',
			'maj'                => 'TIMESTAMP'
		),
		'key' => array(
			'PRIMARY KEY'        => 'id_configune',
			'KEY id_rubrique'    => 'id_rubrique', 
		),
		'titre' => '"" AS titre, "" AS lang',
		 #'date' => '',
		'champs_editables'  => array('nbr_art', 'nbr_art_diapo'),
		'champs_versionnes' => array(),
		'rechercher_champs' => array(),
		'tables_jointures'  => array('spip_configunes_liens'),
		

	);

	return $tables;
}


/**
 * Déclaration des tables secondaires (liaisons)
 *
 * @pipeline declarer_tables_auxiliaires
 * @param array $tables
 *     Description des tables
 * @return array
 *     Description complétée des tables
 */
function configune_declarer_tables_auxiliaires($tables) {

	$tables['spip_configunes_liens'] = array(
		'field' => array(
			'id_configune'       => 'bigint(21) DEFAULT "0" NOT NULL',
			'id_objet'           => 'bigint(21) DEFAULT "0" NOT NULL',
			'objet'              => 'VARCHAR(25) DEFAULT "" NOT NULL',
			'vu'                 => 'VARCHAR(6) DEFAULT "non" NOT NULL',
		),
		'key' => array(
			'PRIMARY KEY'        => 'id_configune,id_objet,objet',
			'KEY id_configune'   => 'id_configune',
		)
	);

	return $tables;
}