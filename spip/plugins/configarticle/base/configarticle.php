<?php
/**
 * Déclarations relatives à la base de données
 *
 * @plugin     configarticle
 * @copyright  2016
 * @author     samuel
 * @licence    GNU/GPL
 * @package    SPIP\Configarticle\Pipelines
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
function configarticle_declarer_tables_interfaces($interfaces) {

	$interfaces['table_des_tables']['configarticles'] = 'configarticles';

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
function configarticle_declarer_tables_objets_sql($tables) {

	$tables['spip_configarticles'] = array(
		'type' => 'configarticle',
		'principale' => "oui",
		'field'=> array(
			'id_configarticle'   => 'bigint(21) NOT NULL',
			'type'               => 'varchar(40) NOT NULL DEFAULT ""',
			'maj'                => 'TIMESTAMP'
		),
		'key' => array(
			'PRIMARY KEY'        => 'id_configarticle',
		),
		'titre' => '"" AS titre, "" AS lang',
		 #'date' => '',
		'champs_editables'  => array('type'),
		'champs_versionnes' => array(),
		'rechercher_champs' => array(),
		'tables_jointures'  => array('spip_configarticles_liens'),
		

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
function configarticle_declarer_tables_auxiliaires($tables) {

	$tables['spip_configarticles_liens'] = array(
		'field' => array(
			'id_configarticle'   => 'bigint(21) DEFAULT "0" NOT NULL',
			'id_objet'           => 'bigint(21) DEFAULT "0" NOT NULL',
			'objet'              => 'VARCHAR(25) DEFAULT "" NOT NULL',
			'vu'                 => 'VARCHAR(6) DEFAULT "non" NOT NULL',
		),
		'key' => array(
			'PRIMARY KEY'        => 'id_configarticle,id_objet,objet',
			'KEY id_configarticle' => 'id_configarticle',
		)
	);

	return $tables;
}