<?php
/**
 * Gestion du formulaire de d'édition de configarticle
 *
 * @plugin     configarticle
 * @copyright  2016
 * @author     samuel
 * @licence    GNU/GPL
 * @package    SPIP\Configarticle\Formulaires
 */

if (!defined('_ECRIRE_INC_VERSION')) return;

include_spip('inc/actions');
include_spip('inc/editer');

/**
 * Identifier le formulaire en faisant abstraction des paramètres qui ne représentent pas l'objet edité
 *
 * @param int|string $id_configarticle
 *     Identifiant du configarticle. 'new' pour un nouveau configarticle.
 * @param string $retour
 *     URL de redirection après le traitement
 * @param string $associer_objet
 *     Éventuel `objet|x` indiquant de lier le configarticle créé à cet objet,
 *     tel que `article|3`
 * @param int $lier_trad
 *     Identifiant éventuel d'un configarticle source d'une traduction
 * @param string $config_fonc
 *     Nom de la fonction ajoutant des configurations particulières au formulaire
 * @param array $row
 *     Valeurs de la ligne SQL du configarticle, si connu
 * @param string $hidden
 *     Contenu HTML ajouté en même temps que les champs cachés du formulaire.
 * @return string
 *     Hash du formulaire
 */
function formulaires_editer_configarticle_identifier_dist($id_configarticle='new', $retour='', $associer_objet='', $lier_trad=0, $config_fonc='', $row=array(), $hidden=''){
	return serialize(array(intval($id_configarticle), $associer_objet));
}

/**
 * Chargement du formulaire d'édition de configarticle
 *
 * Déclarer les champs postés et y intégrer les valeurs par défaut
 *
 * @uses formulaires_editer_objet_charger()
 *
 * @param int|string $id_configarticle
 *     Identifiant du configarticle. 'new' pour un nouveau configarticle.
 * @param string $retour
 *     URL de redirection après le traitement
 * @param string $associer_objet
 *     Éventuel `objet|x` indiquant de lier le configarticle créé à cet objet,
 *     tel que `article|3`
 * @param int $lier_trad
 *     Identifiant éventuel d'un configarticle source d'une traduction
 * @param string $config_fonc
 *     Nom de la fonction ajoutant des configurations particulières au formulaire
 * @param array $row
 *     Valeurs de la ligne SQL du configarticle, si connu
 * @param string $hidden
 *     Contenu HTML ajouté en même temps que les champs cachés du formulaire.
 * @return array
 *     Environnement du formulaire
 */
function formulaires_editer_configarticle_charger_dist($id_configarticle='new', $retour='', $associer_objet='', $lier_trad=0, $config_fonc='', $row=array(), $hidden=''){
	$valeurs = formulaires_editer_objet_charger('configarticle', $id_configarticle, '', $lier_trad, $retour, $config_fonc, $row, $hidden);
	
	return $valeurs;
}

/**
 * Vérifications du formulaire d'édition de configarticle
 *
 * Vérifier les champs postés et signaler d'éventuelles erreurs
 *
 * @uses formulaires_editer_objet_verifier()
 *
 * @param int|string $id_configarticle
 *     Identifiant du configarticle. 'new' pour un nouveau configarticle.
 * @param string $retour
 *     URL de redirection après le traitement
 * @param string $associer_objet
 *     Éventuel `objet|x` indiquant de lier le configarticle créé à cet objet,
 *     tel que `article|3`
 * @param int $lier_trad
 *     Identifiant éventuel d'un configarticle source d'une traduction
 * @param string $config_fonc
 *     Nom de la fonction ajoutant des configurations particulières au formulaire
 * @param array $row
 *     Valeurs de la ligne SQL du configarticle, si connu
 * @param string $hidden
 *     Contenu HTML ajouté en même temps que les champs cachés du formulaire.
 * @return array
 *     Tableau des erreurs
 */
function formulaires_editer_configarticle_verifier_dist($id_configarticle='new', $retour='', $associer_objet='', $lier_trad=0, $config_fonc='', $row=array(), $hidden=''){
	$erreurs = array();

	$erreurs = formulaires_editer_objet_verifier('configarticle', $id_configarticle);

	return $erreurs;
}

/**
 * Traitement du formulaire d'édition de configarticle
 *
 * Traiter les champs postés
 *
 * @uses formulaires_editer_objet_traiter()
 *
 * @param int|string $id_configarticle
 *     Identifiant du configarticle. 'new' pour un nouveau configarticle.
 * @param string $retour
 *     URL de redirection après le traitement
 * @param string $associer_objet
 *     Éventuel `objet|x` indiquant de lier le configarticle créé à cet objet,
 *     tel que `article|3`
 * @param int $lier_trad
 *     Identifiant éventuel d'un configarticle source d'une traduction
 * @param string $config_fonc
 *     Nom de la fonction ajoutant des configurations particulières au formulaire
 * @param array $row
 *     Valeurs de la ligne SQL du configarticle, si connu
 * @param string $hidden
 *     Contenu HTML ajouté en même temps que les champs cachés du formulaire.
 * @return array
 *     Retours des traitements
 */
function formulaires_editer_configarticle_traiter_dist($id_configarticle='new', $retour='', $associer_objet='', $lier_trad=0, $config_fonc='', $row=array(), $hidden=''){
	$retours = formulaires_editer_objet_traiter('configarticle', $id_configarticle, '', $lier_trad, $retour, $config_fonc, $row, $hidden);
 
	// Un lien a prendre en compte ?
	if ($associer_objet AND $id_configarticle = $retours['id_configarticle']) {
		list($objet, $id_objet) = explode('|', $associer_objet);

		if ($objet AND $id_objet AND autoriser('modifier', $objet, $id_objet)) {
			include_spip('action/editer_liens');
			
			objet_associer(array('configarticle' => $id_configarticle), array($objet => $id_objet));
			
			if (isset($retours['redirect'])) {
				$retours['redirect'] = parametre_url($retours['redirect'], "id_lien_ajoute", $id_configarticle, '&');
			}
		}
	}

	return $retours;
}