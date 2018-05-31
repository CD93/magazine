<?php
/**
 * Déclarations relatives à la base de données
 *
 * @plugin     colorrub
 * @copyright  2016
 * @author     samuel
 * @licence    GNU/GPL
 * @package    SPIP\Colorrub\Pipelines
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
function colorrub_declarer_tables_interfaces($interfaces) {

	$interfaces['table_des_tables']['couleurs'] = 'couleurs';

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
function colorrub_declarer_tables_objets_sql($tables) {

	$tables['spip_couleurs'] = array(
		'type' => 'couleur',
		'principale' => "oui",
		'field'=> array(
			'id_couleur'         => 'bigint(21) NOT NULL',
			'id_rubrique'        => 'bigint(21) NOT NULL DEFAULT 0', 
			'couleur'            => 'varchar(40) NOT NULL DEFAULT ""',
			'col'                => 'varchar(7) NOT NULL DEFAULT ""',
			'couleurm'           => 'varchar(50) NOT NULL DEFAULT ""',
			'colm'               => 'varchar(7) NOT NULL DEFAULT ""',
			'page'               => 'varchar(255) NOT NULL DEFAULT ""',
			'couleurmt'          => 'varchar(255) NOT NULL DEFAULT ""',
			'colmt'              => 'varchar(7) NOT NULL DEFAULT ""',
			'bodyclass'          => 'varchar(255) NOT NULL DEFAULT ""',
			'utils'              => 'varchar(255) NOT NULL DEFAULT ""',
			'vendors'            => 'varchar(255) NOT NULL DEFAULT ""',
			'maj'                => 'TIMESTAMP'
		),
		'key' => array(
			'PRIMARY KEY'        => 'id_couleur',
			'KEY id_rubrique'    => 'id_rubrique', 
		),
		'titre' => '"" AS titre, "" AS lang',
		 #'date' => '',
		'champs_editables'  => array('couleur', 'col', 'couleurm', 'colm', 'page', 'couleurmt', 'colmt', 'bodyclass', 'utils', 'vendors'),
		'champs_versionnes' => array('col', 'colm', 'colmt'),
		'rechercher_champs' => array(),
		'tables_jointures'  => array(),
		

	);

	return $tables;
}