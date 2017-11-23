<?php

/**
 *  Fichier généré par la Fabrique de plugin v6
 *   le 2017-11-23 12:34:10
 *
 *  Ce fichier de sauvegarde peut servir à recréer
 *  votre plugin avec le plugin «Fabrique» qui a servi à le créer.
 *
 *  Bien évidemment, les modifications apportées ultérieurement
 *  par vos soins dans le code de ce plugin généré
 *  NE SERONT PAS connues du plugin «Fabrique» et ne pourront pas
 *  être recréées par lui !
 *
 *  La «Fabrique» ne pourra que régénerer le code de base du plugin
 *  avec les informations dont il dispose.
 *
**/

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

$data = array (
  'fabrique' => 
  array (
    'version' => 6,
  ),
  'paquet' => 
  array (
    'prefixe' => 'voeux2018',
    'nom' => 'voeux2018',
    'slogan' => '',
    'description' => '',
    'logo' => 
    array (
      0 => '',
    ),
    'version' => '1.0.0',
    'auteur' => 'Samuel Godo',
    'auteur_lien' => '',
    'licence' => 'GNU/GPL',
    'categorie' => 'communication',
    'etat' => 'dev',
    'compatibilite' => '[3.1.*;3.*]',
    'documentation' => '',
    'administrations' => '',
    'schema' => '1.0.0',
    'formulaire_config' => '',
    'formulaire_config_titre' => '',
    'inserer' => 
    array (
      'paquet' => '',
      'administrations' => 
      array (
        'maj' => '',
        'desinstallation' => '',
        'fin' => '',
      ),
      'base' => 
      array (
        'tables' => 
        array (
          'fin' => '',
        ),
      ),
    ),
    'scripts' => 
    array (
      'pre_copie' => '',
      'post_creation' => '',
    ),
    'exemples' => '',
  ),
  'objets' => 
  array (
    0 => 
    array (
      'nom' => 'voeux2018',
      'nom_singulier' => 'voeux2018',
      'genre' => 'masculin',
      'logo' => 
      array (
        0 => '',
        32 => '',
        24 => '',
        16 => '',
        12 => '',
      ),
      'logo_variantes' => '',
      'table' => 'voeux2018',
      'cle_primaire' => 'id_voeux2018',
      'cle_primaire_sql' => 'bigint(21) NOT NULL',
      'table_type' => 'voeux2018',
      'champs' => 
      array (
        0 => 
        array (
          'nom' => 'md5',
          'champ' => 'md5',
          'sql' => 'varchar(25) NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '',
          'saisie' => '',
          'explication' => '',
          'saisie_options' => '',
        ),
        1 => 
        array (
          'nom' => 'Image1',
          'champ' => 'image1',
          'sql' => 'int(6) NOT NULL DEFAULT 0',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '',
          'saisie' => '',
          'explication' => '',
          'saisie_options' => '',
        ),
        2 => 
        array (
          'nom' => 'image2',
          'champ' => 'image2',
          'sql' => 'int(6) NOT NULL DEFAULT 0',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '',
          'saisie' => '',
          'explication' => '',
          'saisie_options' => '',
        ),
        3 => 
        array (
          'nom' => 'image3',
          'champ' => 'image3',
          'sql' => 'int(6) NOT NULL DEFAULT 0',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '',
          'saisie' => '',
          'explication' => '',
          'saisie_options' => '',
        ),
        4 => 
        array (
          'nom' => 'image4',
          'champ' => 'image4',
          'sql' => 'int(6) NOT NULL DEFAULT 0',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '',
          'saisie' => '',
          'explication' => '',
          'saisie_options' => '',
        ),
        5 => 
        array (
          'nom' => 'image5',
          'champ' => 'image5',
          'sql' => 'int(6) NOT NULL DEFAULT 0',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '',
          'saisie' => '',
          'explication' => '',
          'saisie_options' => '',
        ),
        6 => 
        array (
          'nom' => 'texte',
          'champ' => 'texte',
          'sql' => 'mediumtext NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '',
          'saisie' => '',
          'explication' => '',
          'saisie_options' => '',
        ),
      ),
      'champ_titre' => '',
      'champ_date' => 'date',
      'statut' => '',
      'chaines' => 
      array (
        'titre_objets' => 'Voeux2018',
        'titre_objet' => 'Voeux2018',
        'info_aucun_objet' => 'Aucun voeux2018',
        'info_1_objet' => 'Un voeux2018',
        'info_nb_objets' => '@nb@ voeux2018',
        'icone_creer_objet' => 'Créer un voeux2018',
        'icone_modifier_objet' => 'Modifier ce voeux2018',
        'titre_logo_objet' => 'Logo de ce voeux2018',
        'titre_langue_objet' => 'Langue de ce voeux2018',
        'texte_definir_comme_traduction_objet' => 'Ce voeux2018 est une traduction du voeux2018 numéro :',
        'titre_\\objets_lies_objet' => 'Liés à ce voeux2018',
        'titre_objets_rubrique' => 'Voeux2018 de la rubrique',
        'info_objets_auteur' => 'Les voeux2018 de cet auteur',
        'retirer_lien_objet' => 'Retirer ce voeux2018',
        'retirer_tous_liens_objets' => 'Retirer tous les voeux2018',
        'ajouter_lien_objet' => 'Ajouter ce voeux2018',
        'texte_ajouter_objet' => 'Ajouter un voeux2018',
        'texte_creer_associer_objet' => 'Créer et associer un voeux2018',
        'texte_changer_statut_objet' => 'Ce voeux2018 est :',
        'supprimer_objet' => 'Supprimer cet voeux2018',
        'confirmer_supprimer_objet' => 'Confirmez-vous la suppression de cet voeux2018 ?',
      ),
      'liaison_directe' => '',
      'table_liens' => '',
      'afficher_liens' => '',
      'roles' => '',
      'auteurs_liens' => '',
      'vue_auteurs_liens' => '',
      'autorisations' => 
      array (
        'objet_creer' => '',
        'objet_voir' => '',
        'objet_modifier' => '',
        'objet_supprimer' => '',
        'associerobjet' => '',
      ),
    ),
  ),
  'images' => 
  array (
    'paquet' => 
    array (
      'logo' => 
      array (
        0 => 
        array (
          'extension' => '',
          'contenu' => '',
        ),
      ),
    ),
    'objets' => 
    array (
      0 => 
      array (
      ),
    ),
  ),
);
