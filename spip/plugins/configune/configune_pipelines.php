<?php
/**
 * Utilisations de pipelines par configuration_une
 *
 * @plugin     configuration_une
 * @copyright  2016
 * @author     samuel
 * @licence    GNU/GPL
 * @package    SPIP\Configune\Pipelines
 */

if (!defined('_ECRIRE_INC_VERSION')) return;


/**
 * Ajouter les objets sur les vues de rubriques
 *
 * @pipeline affiche_enfants
 * @param  array $flux Données du pipeline
 * @return array       Données du pipeline
**/
function configune_affiche_milieu($flux) {
	if ($e = trouver_objet_exec($flux['args']['exec'])
		AND $e['type'] == 'rubrique'
		AND $e['edition'] == false) {
		$id_rubrique = $flux['args']['id_rubrique'];
		$contexte = array('id_rubrique'=>$id_rubrique);
		$ret= '<div id="gestionune">';
		$ret .= recuperer_fond("configure_une", $contexte);
		$ret .= '</div>';
	if (($p = strpos($flux['data'],'<!--affiche_milieu-->'))!==false)
		$flux['data'] = substr_replace($flux['data'],$ret,$p,0);
	else
		$flux['data'] .= $ret;
	}
	return $flux;
}



/**
 * Optimiser la base de données 
 * 
 * Supprime les liens orphelins de l'objet vers quelqu'un et de quelqu'un vers l'objet.
 *
 * @pipeline optimiser_base_disparus
 * @param  array $flux Données du pipeline
 * @return array       Données du pipeline
 */
function configune_optimiser_base_disparus($flux){

	include_spip('action/editer_liens');
	$flux['data'] += objet_optimiser_liens(array('configune'=>'*'),'*');

	return $flux;
}