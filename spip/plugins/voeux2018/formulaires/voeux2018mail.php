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
  return $erreurs;
}
function formulaires_voeux2018_traiter_dist() {
	$mail_dest = _request('mail_dest');
	$mail_exp = _request('mail_exp');
	$message = _request('mesvoeux');
	$img95 =_request('rub95');
	$img96 =_request('rub96');
	$img97 =_request('rub97');
	$img98 =_request('rub98');
	$img99 =_request('rub99');
	$message = str_replace("œ","oe",$message);
	//spip_log($message,_LOG_ERREUR);
	$message=utf8_decode($message);
	$message=nl2br($message);
	$subject='Bonjour, vous avez reçu une e-carte !';
	$subject=utf8_decode($subject);
	$corp ='
	<img src="http://lemag.seinesaintdenis.fr/plugins/voeux2018/imagevoeux2018.php?rub99=img1276&rub95=img1158&rub96=img1268&rub97=img1278&rub98=img1274"/><br/>
	<p class="texte" style="font-size:14px;padding:10px;border:2px solid #ddd; width:522px;font-family:\'Arial Black\', Gadget, sans-serif; color:#66347D;">'
	.$message.'
	</p><br/><br/><p>Créez votre carte sur <a href="http://lemag.seinesaintdenis.fr/?page=voeux2018&utm_campaign=Voeux_2018&utm_medium=e-mail&utm_source=EmailVoeux">ssd.fr/voeux2018</a></p>';

			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			//$headers .= 'To: '.$mail_dest."\r\n";
			$headers .= 'From: '.$mail_exp."\r\n";
			$headers .= 'Reply-To: '.$mail_exp.'' . "\r\n";
			$headers .= 'Bcc: concours@cg93.fr \r\n';
		    if (mail($mail_dest, $subject, $corp, $headers)){
		   	 $reponse = '</p><strong style="font-size:16px;padding:10px; width:522px;font-family:\'Arial Black\', Gadget, sans-serif; color:#66347D;">Votre e-carte &agrave; bien &eacute;t&eacute; envoy&eacute;e !<p>';
			}
	$headers2  = 'MIME-Version: 1.0' . "\r\n";
	$headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers2 .= 'From: '.$mail_dest."\r\n";
	$headers2 .= 'Reply-To: '.$mail_dest.'' . "\r\n";
	$accu="Votre e-carte a bien été envoyée";
	$accu=utf8_decode($accu);
	mail($mail_exp, $accu, $corp, $headers2);
	return array(
        'message_ok' => 'Excellent !', // ou bien
    );
}

?>
