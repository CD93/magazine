<?php

/***************************************************************************\
 *  SPIP, Systeme de publication pour l'internet                           *
 *                                                                         *
 *  Copyright (c) 2001-2016                                                *
 *  Arnaud Martin, Antoine Pitrou, Philippe Riviere, Emmanuel Saint-James  *
 *                                                                         *
 *  Ce programme est un logiciel libre distribue sous licence GNU/GPL.     *
 *  Pour plus de details voir le fichier COPYING.txt ou l'aide en ligne.   *
\***************************************************************************/


if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

function formulaires_voeux2018mail_charger_dist() {
  $valeurs = array(
		'rub95' => '',
		'rub96' => '',
		'rub97' => '',
		'rub98' => '',
		'rub99' => '',
		'mesvoeux' => '',
		'mail_dest' => '',
		'mail_exp' => ''
  );
  return $valeurs;
}
function formulaires_voeux2018mail_verifier_dist() {
  $erreurs = array();
	include_spip('inc/filtres');
	$mail_dest = _request('mail_dest');
	$mail_exp = _request('mail_exp');
	$message = _request('mesvoeux');
	if (!$mail_dest = _request('mail_dest')) {
		$erreurs['mail_dest'] = _T("info_obligatoire");
	} elseif (!email_valide($mail_dest)) {
		$erreurs['mail_dest'] = _T('form_prop_indiquer_email');
	}
	if (!$mail_exp = _request('mail_exp')) {
		$erreurs['mail_exp'] = _T("info_obligatoire");
	} elseif (!email_valide($mail_exp)) {
		$erreurs['mail_exp'] = _T('form_prop_indiquer_email');
	}

	if (!$mesvoeux = _request('mesvoeux')) {
		$erreurs['mesvoeux'] = _T("info_obligatoire");
	} elseif (!(strlen($mesvoeux) > 10)) {
		$erreurs['mesvoeux'] = _T('forum:forum_attention_dix_caracteres');
	}

	if (_request('nobot')) {
		$erreurs['message_erreur'] = _T('pass_rien_a_faire_ici');
	}

	return $erreurs;
}
function formulaires_voeux2018mail_traiter_dist() {
	// Chargement de la fonction
  $envoyer_mail = charger_fonction('envoyer_mail', 'inc/');
	include_spip('classes/facteur');
	$mail_dest = _request('mail_dest');
	$mail_exp = _request('mail_exp');
	$message = _request('mesvoeux');
	$img95 =_request('rub95');
	$img96 =_request('rub96');
	$img97 =_request('rub97');
	$img98 =_request('rub98');
	$img99 =_request('rub99');
	$message = str_replace("œ","oe",$message);
	$message=nl2br($message);
	$subject='Bonjour, vous avez reçu une e-carte !';
	$html ='	<img src="http://lemag.seinesaintdenis.fr/plugins/voeux2018/imagevoeux2018.php?rub99=img1276&rub95=img1158&rub96=img1268&rub97=img1278&rub98=img1274"/><br/>
	<p class="texte" style="font-size:16px;padding:16px;border:2px solid #ddd; width:100%;font-family:\'Arial Black\', Gadget, sans-serif;">'
	.$message.'
	</p><br/><br/><p>Cr&eacute;ez votre carte de vœux sur <a href="http://lemag.seinesaintdenis.fr/?page=voeux2018&utm_campaign=Voeux_2018&utm_medium=e-mail&utm_source=EmailVoeux">ssd.fr/voeux2018</a></p>';
	$texte = Facteur::html2text($html);
	$corps = array(
		'html' => $html,
		'texte' => $texte,
		'nom_envoyeur' => '"'.$mail_exp.'" <information@seinesaintdenis.fr>',
		'repondre_a' => $mail_exp,
		'bcc' => 'concours@seinesaintdenis.fr'
	);
  if ($envoyer_mail($mail_dest, $subject, $corps)){
		$reponse = '</p><strong style="font-size:16px;padding:10px; width:100%;font-family:\'Arial Black\', Gadget, sans-serif; color:#66347D;">Votre e-carte de vœux a bien &eacute;t&eacute; envoy&eacute;e !<p>';
	}
	$subject2='Votre e-carte de vœux 2018 a bien été envoyée !';
	$html2 = 'Votre e-carte de vœux 2018 a bien été envoyée !';
	$texte2 = Facteur::html2text($html2);
	$corps2 = array(
		'html' => $html2,
		'texte' => $texte2,
		'nom_envoyeur' => 'information@seinesaintdenis.fr',
		'repondre_a' => 'pasdereponse@seinesaintdenis.fr'
	);
	$envoyer_mail($mail_exp, $subject2, $corps2, $headers2);
	return array(
        'message_ok' => 'Votre carte de vœux a été envoyée à '.$mail_dest.' !', // ou bien
    );
}

?>
