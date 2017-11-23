<?php
/**
 * Déclarations relatives à la base de données
 *
 * @plugin     voeux2018
 * @copyright  2017
 * @author     Samuel Godo
 * @licence    GNU/GPL
 * @package    SPIP\Voeux2018\Pipelines
 */

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}


/**
 * Déclaration des alias de tables et filtres automatiques de champs
 *
 * @pipeline declarer_tables_interfaces
 * @param array $interfaces
 *     Déclarations d'interface pour le compilateur
 * @return array
 *     Déclarations d'interface pour le compilateur
 */
function voeux2018_declarer_tables_interfaces($interfaces) {

	$interfaces['table_des_tables']['voeux2018'] = 'voeux2018';

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
function voeux2018_declarer_tables_objets_sql($tables) {

	$tables['voeux2018'] = array(
		'type' => 'voeux2018',
		'principale' => 'oui',
		'table_objet_surnoms' => array('voeux2018'), // table_objet('voeux2018') => 'voeux2018' 
		'field'=> array(
			'id_voeux2018'       => 'bigint(21) NOT NULL',
			'md5'                => 'varchar(25) NOT NULL DEFAULT ""',
			'image1'             => 'int(6) NOT NULL DEFAULT 0',
			'image2'             => 'int(6) NOT NULL DEFAULT 0',
			'image3'             => 'int(6) NOT NULL DEFAULT 0',
			'image4'             => 'int(6) NOT NULL DEFAULT 0',
			'image5'             => 'int(6) NOT NULL DEFAULT 0',
			'texte'              => 'mediumtext NOT NULL DEFAULT ""',
			'date'               => 'datetime NOT NULL DEFAULT "0000-00-00 00:00:00"',
			'maj'                => 'TIMESTAMP'
		),
		'key' => array(
			'PRIMARY KEY'        => 'id_voeux2018',
		),
		'titre' => '"" AS titre, "" AS lang',
		'date' => 'date',
		'champs_editables'  => array('md5', 'image1', 'image2', 'image3', 'image4', 'image5', 'texte'),
		'champs_versionnes' => array('md5', 'image1', 'image2', 'image3', 'image4', 'image5', 'texte'),
		'rechercher_champs' => array(),
		'tables_jointures'  => array(),


	);

	return $tables;
}
