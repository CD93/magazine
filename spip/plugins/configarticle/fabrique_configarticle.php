<?php

/**
 *  Fichier généré par la Fabrique de plugin v6
 *   le 2016-06-01 15:43:22
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

if (!defined("_ECRIRE_INC_VERSION")) return;

$data = array (
  'fabrique' => 
  array (
    'version' => 6,
  ),
  'paquet' => 
  array (
    'prefixe' => 'configarticle',
    'nom' => 'configarticle',
    'slogan' => '',
    'description' => 'Permet de configurer les articles .',
    'logo' => 
    array (
      0 => '',
    ),
    'version' => '1.0.0',
    'auteur' => 'samuel',
    'auteur_lien' => '',
    'licence' => 'GNU/GPL',
    'categorie' => 'maintenance',
    'etat' => 'dev',
    'compatibilite' => '[3.1.1;3.1.*]',
    'documentation' => '',
    'administrations' => 'on',
    'schema' => '1.0.0',
    'formulaire_config' => 'on',
    'formulaire_config_titre' => '',
    'fichiers' => 
    array (
      0 => 'fonctions',
      1 => 'options',
      2 => 'pipelines',
    ),
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
      'nom' => 'medias',
      'nom_singulier' => 'media',
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
      'table' => 'spip_configarticles',
      'cle_primaire' => 'id_configarticle',
      'cle_primaire_sql' => 'bigint(21) NOT NULL',
      'table_type' => 'configarticle',
      'champs' => 
      array (
        0 => 
        array (
          'nom' => 'type',
          'champ' => 'type',
          'sql' => 'varchar(40) NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
          ),
          'recherche' => '',
          'saisie' => 'selection',
          'explication' => '',
          'saisie_options' => '',
        ),
      ),
      'champ_titre' => '',
      'champ_date' => '',
      'statut' => '',
      'chaines' => 
      array (
        'titre_objets' => 'médias',
        'titre_objet' => 'média',
        'info_aucun_objet' => 'Aucun média',
        'info_1_objet' => 'Un média',
        'info_nb_objets' => '@nb@ médias',
        'icone_creer_objet' => 'Créer un média',
        'icone_modifier_objet' => 'Modifier ce média',
        'titre_logo_objet' => 'Logo de ce média',
        'titre_langue_objet' => 'Langue de ce configarticle',
        'texte_definir_comme_traduction_objet' => 'Ce configarticle est une traduction du configarticle numéro :',
        'titre_objets_rubrique' => 'Configarticles de la rubrique',
        'info_objets_auteur' => 'Les médias de cet auteur',
        'retirer_lien_objet' => 'Retirer ce médias',
        'retirer_tous_liens_objets' => 'Retirer tous les médias',
        'ajouter_lien_objet' => 'Ajouter ce médias',
        'texte_ajouter_objet' => 'Ajouter un média',
        'texte_creer_associer_objet' => 'Créer et associer un média',
        'texte_changer_statut_objet' => 'Ce média est :',
        'supprimer_objet' => 'Supprimer ce média',
        'confirmer_supprimer_objet' => 'Confirmez-vous la suppression de ce média ?',
      ),
      'table_liens' => 'on',
      'vue_liens' => 
      array (
        0 => 'spip_articles',
      ),
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
      'boutons' => 
      array (
        0 => 'menu_edition',
        1 => 'outils_rapides',
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