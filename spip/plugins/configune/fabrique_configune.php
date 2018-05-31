<?php

/**
 *  Fichier généré par la Fabrique de plugin v6
 *   le 2016-05-27 14:28:48
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
    'prefixe' => 'configune',
    'nom' => 'configuration_une',
    'slogan' => '',
    'description' => 'Permet de configurer les rubriques pour la une',
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
    'formulaire_config' => '',
    'formulaire_config_titre' => '',
    'fichiers' => 
    array (
      0 => 'pipelines',
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
      'nom' => 'configunes',
      'nom_singulier' => 'configune',
      'genre' => 'feminin',
      'logo' => 
      array (
        0 => '',
        32 => '',
        24 => '',
        16 => '',
        12 => '',
      ),
      'logo_variantes' => '',
      'table' => 'spip_configunes',
      'cle_primaire' => 'id_configune',
      'cle_primaire_sql' => 'bigint(21) NOT NULL',
      'table_type' => 'configune',
      'champs' => 
      array (
        0 => 
        array (
          'nom' => 'Nombre d\'articles en unes',
          'champ' => 'nbr_art',
          'sql' => 'int(6) NOT NULL DEFAULT 0',
          'caracteristiques' => 
          array (
            0 => 'editable',
          ),
          'recherche' => '',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        1 => 
        array (
          'nom' => 'Nombre d\'articles dans le diaporama',
          'champ' => 'nbr_art_diapo',
          'sql' => 'int(6) NOT NULL DEFAULT 0',
          'caracteristiques' => 
          array (
            0 => 'editable',
          ),
          'recherche' => '',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
      ),
      'champ_titre' => '',
      'rubriques' => 
      array (
        0 => 'id_rubrique',
        1 => 'vue_rubrique',
      ),
      'champ_date' => '',
      'statut' => '',
      'chaines' => 
      array (
        'titre_objets' => 'Configunes',
        'titre_objet' => 'Configune',
        'info_aucun_objet' => 'Aucune configune',
        'info_1_objet' => 'Une configune',
        'info_nb_objets' => '@nb@ configunes',
        'icone_creer_objet' => 'Créer une configune',
        'icone_modifier_objet' => 'Modifier cette configune',
        'titre_logo_objet' => 'Logo de cette configune',
        'titre_langue_objet' => 'Langue de cette configune',
        'texte_definir_comme_traduction_objet' => 'Cette configune est une traduction de la configune numéro :',
        'titre_objets_rubrique' => 'Configunes de la rubrique',
        'info_objets_auteur' => 'Les configunes de cet auteur',
        'retirer_lien_objet' => 'Retirer cette configune',
        'retirer_tous_liens_objets' => 'Retirer toutes les configunes',
        'ajouter_lien_objet' => 'Ajouter cette configune',
        'texte_ajouter_objet' => 'Ajouter une configune',
        'texte_creer_associer_objet' => 'Créer et associer une configune',
        'texte_changer_statut_objet' => 'Cette configune est :',
        'supprimer_objet' => 'Supprimer cette configune',
        'confirmer_supprimer_objet' => 'Confirmez-vous la suppression de cette configune ?',
      ),
      'table_liens' => 'on',
      'roles' => '',
      'auteurs_liens' => '',
      'vue_auteurs_liens' => '',
      'fichiers' => 
      array (
        'echafaudages' => 
        array (
          0 => 'prive/squelettes/contenu/objets.html',
          1 => 'prive/objets/infos/objet.html',
        ),
      ),
      'saisies' => 
      array (
        0 => 'objets',
      ),
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