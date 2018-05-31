<?php

/**
 *  Fichier généré par la Fabrique de plugin v6
 *   le 2016-07-04 17:15:02
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
    'prefixe' => 'colorrub',
    'nom' => 'colorrub',
    'slogan' => '',
    'description' => 'Permet de donner une couleur et pleins d\'autres paramètres à une rubrique',
    'logo' => 
    array (
      0 => '',
    ),
    'version' => '1.0.4',
    'auteur' => 'samuel',
    'auteur_lien' => '',
    'licence' => 'GNU/GPL',
    'categorie' => 'navigation',
    'etat' => 'dev',
    'compatibilite' => '[3.1.1;3.1.*]',
    'documentation' => '',
    'administrations' => 'on',
    'schema' => '1.0.2',
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
      'nom' => 'couleurs',
      'nom_singulier' => 'couleur',
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
      'table' => 'spip_couleurs',
      'cle_primaire' => 'id_couleur',
      'cle_primaire_sql' => 'bigint(21) NOT NULL',
      'table_type' => 'couleur',
      'champs' => 
      array (
        0 => 
        array (
          'nom' => 'couleur',
          'champ' => 'couleur',
          'sql' => 'varchar(40) NOT NULL DEFAULT \'\'',
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
          'nom' => 'col',
          'champ' => 'col',
          'sql' => 'varchar(7) NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        2 => 
        array (
          'nom' => 'couleur mobile',
          'champ' => 'couleurm',
          'sql' => 'varchar(50) NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
          ),
          'recherche' => '',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        3 => 
        array (
          'nom' => 'colm',
          'champ' => 'colm',
          'sql' => 'varchar(7) NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        4 => 
        array (
          'nom' => 'page',
          'champ' => 'page',
          'sql' => 'varchar(255) NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
          ),
          'recherche' => '',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        5 => 
        array (
          'nom' => 'couleurmt',
          'champ' => 'couleurmt',
          'sql' => 'varchar(255) NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
          ),
          'recherche' => '',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        6 => 
        array (
          'nom' => 'colmt',
          'champ' => 'colmt',
          'sql' => 'varchar(7) NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        7 => 
        array (
          'nom' => 'bodyclass',
          'champ' => 'bodyclass',
          'sql' => 'varchar(255) NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
          ),
          'recherche' => '',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        8 => 
        array (
          'nom' => 'utils',
          'champ' => 'utils',
          'sql' => 'varchar(255) NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
          ),
          'recherche' => '',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        9 => 
        array (
          'nom' => 'vendors',
          'champ' => 'vendors',
          'sql' => 'varchar(255) NOT NULL DEFAULT \'\'',
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
      ),
      'champ_date' => '',
      'statut' => '',
      'chaines' => 
      array (
        'titre_objets' => 'Couleurs',
        'titre_objet' => 'Couleur',
        'info_aucun_objet' => 'Aucune couleur',
        'info_1_objet' => 'Une couleur',
        'info_nb_objets' => '@nb@ couleurs',
        'icone_creer_objet' => 'Créer une couleur',
        'icone_modifier_objet' => 'Modifier cette couleur',
        'titre_logo_objet' => 'Logo de cette couleur',
        'titre_langue_objet' => 'Langue de cette couleur',
        'texte_definir_comme_traduction_objet' => 'Cette couleur est une traduction de la couleur numéro :',
        'titre_objets_rubrique' => 'Couleurs de la rubrique',
        'info_objets_auteur' => 'Les couleurs de cet auteur',
        'retirer_lien_objet' => 'Retirer cette couleur',
        'retirer_tous_liens_objets' => 'Retirer toutes les couleurs',
        'ajouter_lien_objet' => 'Ajouter cette couleur',
        'texte_ajouter_objet' => 'Ajouter une couleur',
        'texte_creer_associer_objet' => 'Créer et associer une couleur',
        'texte_changer_statut_objet' => 'Cette couleur est :',
        'supprimer_objet' => 'Supprimer cette couleur',
        'confirmer_supprimer_objet' => 'Confirmez-vous la suppression de cette couleur ?',
      ),
      'table_liens' => '',
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