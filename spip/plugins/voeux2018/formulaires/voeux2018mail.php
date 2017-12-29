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
		'mail_exp' => '',
		'masignature' =>''
  );
  return $valeurs;
}
function formulaires_voeux2018mail_verifier_dist() {
  $erreurs = array();
	include_spip('inc/filtres');
	$mail_dest = _request('mail_dest');
	$mail_exp = _request('mail_exp');
	$message = _request('mesvoeux');
	$masignature = _request('masignature');
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
	} elseif (!(strlen($mesvoeux) > 3)) {
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
	$masignature = _request('masignature');
	$img95 =_request('rub95');
	$img96 =_request('rub96');
	$img97 =_request('rub97');
	$img98 =_request('rub98');
	$img99 =_request('rub99');
	$message = str_replace("œ","oe",$message);
	$message=nl2br($message);
	$subject='Bonjour, vous avez reçu une e-carte !';
	$html ='
	<!doctype html>
	<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
		<head>
			<!-- NAME: 1 COLUMN -->
			<!--[if gte mso 15]>
			<xml>
				<o:OfficeDocumentSettings>
				<o:AllowPNG/>
				<o:PixelsPerInch>96</o:PixelsPerInch>
				</o:OfficeDocumentSettings>
			</xml>
			<![endif]-->
			<meta charset="UTF-8">
	        <meta http-equiv="X-UA-Compatible" content="IE=edge">
	        <meta name="viewport" content="width=device-width, initial-scale=1">
			<title></title>

	    <style type="text/css">
			p{
				margin:10px 0;
				padding:0;
			}
			table{
				border-collapse:collapse;
			}
			h1,h2,h3,h4,h5,h6{
				display:block;
				margin:0;
				padding:0;
			}
			img,a img{
				border:0;
				height:auto;
				outline:none;
				text-decoration:none;
			}
			body,#bodyTable,#bodyCell{
				height:100%;
				margin:0;
				padding:0;
				width:100%;
			}
			.mcnPreviewText{
				display:none !important;
			}
			#outlook a{
				padding:0;
			}
			img{
				-ms-interpolation-mode:bicubic;
			}
			table{
				mso-table-lspace:0pt;
				mso-table-rspace:0pt;
			}
			.ReadMsgBody{
				width:100%;
			}
			.ExternalClass{
				width:100%;
			}
			p,a,li,td,blockquote{
				mso-line-height-rule:exactly;
			}
			a[href^=tel],a[href^=sms]{
				color:inherit;
				cursor:default;
				text-decoration:none;
			}
			p,a,li,td,body,table,blockquote{
				-ms-text-size-adjust:100%;
				-webkit-text-size-adjust:100%;
			}
			.ExternalClass,.ExternalClass p,.ExternalClass td,.ExternalClass div,.ExternalClass span,.ExternalClass font{
				line-height:100%;
			}
			a[x-apple-data-detectors]{
				color:inherit !important;
				text-decoration:none !important;
				font-size:inherit !important;
				font-family:inherit !important;
				font-weight:inherit !important;
				line-height:inherit !important;
			}
			#bodyCell{
				padding:10px;
				padding-top:0;
			}
			.templateContainer{
				max-width:600px !important;
			}
			a.mcnButton{
				display:block;
			}
			.mcnImage{
				vertical-align:bottom;
			}
			.mcnTextContent{
				word-break:break-word;
			}
			.mcnTextContent img{
				height:auto !important;
			}
			.mcnDividerBlock{
				table-layout:fixed !important;
			}
		/*
		@tab Page
		@section Background Style
		@tip Set the background color and top border for your email. You may want to choose colors that match your companys branding.
		*/
			body,#bodyTable{
				/*@editable*/background-color:#ffffff;
			}
		/*
		@tab Page
		@section Background Style
		@tip Set the background color and top border for your email. You may want to choose colors that match your companys branding.
		*/
			#bodyCell{
				/*@editable*/border-top:0;
			}
		/*
		@tab Page
		@section Email Border
		@tip Set the border for your email.
		*/
			.templateContainer{
				/*@editable*/border:0;
			}
		/*
		@tab Page
		@section Heading 1
		@tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.
		@style heading 1
		*/
			h1{
				/*@editable*/color:#202020;
				/*@editable*/font-family:Helvetica;
				/*@editable*/font-size:26px;
				/*@editable*/font-style:normal;
				/*@editable*/font-weight:bold;
				/*@editable*/line-height:125%;
				/*@editable*/letter-spacing:normal;
				/*@editable*/text-align:left;
			}
		/*
		@tab Page
		@section Heading 2
		@tip Set the styling for all second-level headings in your emails.
		@style heading 2
		*/
			h2{
				/*@editable*/color:#202020;
				/*@editable*/font-family:Helvetica;
				/*@editable*/font-size:22px;
				/*@editable*/font-style:normal;
				/*@editable*/font-weight:bold;
				/*@editable*/line-height:125%;
				/*@editable*/letter-spacing:normal;
				/*@editable*/text-align:left;
			}
		/*
		@tab Page
		@section Heading 3
		@tip Set the styling for all third-level headings in your emails.
		@style heading 3
		*/
			h3{
				/*@editable*/color:#202020;
				/*@editable*/font-family:Helvetica;
				/*@editable*/font-size:20px;
				/*@editable*/font-style:normal;
				/*@editable*/font-weight:bold;
				/*@editable*/line-height:125%;
				/*@editable*/letter-spacing:normal;
				/*@editable*/text-align:left;
			}
		/*
		@tab Page
		@section Heading 4
		@tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.
		@style heading 4
		*/
			h4{
				/*@editable*/color:#202020;
				/*@editable*/font-family:Helvetica;
				/*@editable*/font-size:18px;
				/*@editable*/font-style:normal;
				/*@editable*/font-weight:bold;
				/*@editable*/line-height:125%;
				/*@editable*/letter-spacing:normal;
				/*@editable*/text-align:left;
			}
		/*
		@tab Preheader
		@section Preheader Style
		@tip Set the background color and borders for your emails preheader area.
		*/
			#templatePreheader{
				/*@editable*/background-color:#ffffff;
				/*@editable*/background-image:none;
				/*@editable*/background-repeat:no-repeat;
				/*@editable*/background-position:center;
				/*@editable*/background-size:cover;
				/*@editable*/border-top:0;
				/*@editable*/border-bottom:0;
				/*@editable*/padding-top:0px;
				/*@editable*/padding-bottom:0px;
			}
		/*
		@tab Preheader
		@section Preheader Text
		@tip Set the styling for your emails preheader text. Choose a size and color that is easy to read.
		*/
			#templatePreheader .mcnTextContent,#templatePreheader .mcnTextContent p{
				/*@editable*/color:#656565;
				/*@editable*/font-family:Helvetica;
				/*@editable*/font-size:12px;
				/*@editable*/line-height:150%;
				/*@editable*/text-align:left;
			}
		/*
		@tab Preheader
		@section Preheader Link
		@tip Set the styling for your emails preheader links. Choose a color that helps them stand out from your text.
		*/
			#templatePreheader .mcnTextContent a,#templatePreheader .mcnTextContent p a{
				/*@editable*/color:#656565;
				/*@editable*/font-weight:normal;
				/*@editable*/text-decoration:underline;
			}
		/*
		@tab Header
		@section Header Style
		@tip Set the background color and borders for your emails header area.
		*/
			#templateHeader{
				/*@editable*/background-color:#ffffff;
				/*@editable*/background-image:none;
				/*@editable*/background-repeat:no-repeat;
				/*@editable*/background-position:center;
				/*@editable*/background-size:cover;
				/*@editable*/border-top:0;
				/*@editable*/border-bottom:0;
				/*@editable*/padding-top:0px;
				/*@editable*/padding-bottom:0;
			}
		/*
		@tab Header
		@section Header Text
		@tip Set the styling for your emails header text. Choose a size and color that is easy to read.
		*/
			#templateHeader .mcnTextContent,#templateHeader .mcnTextContent p{
				/*@editable*/color:#202020;
				/*@editable*/font-family:Helvetica;
				/*@editable*/font-size:16px;
				/*@editable*/line-height:150%;
				/*@editable*/text-align:left;
			}
		/*
		@tab Header
		@section Header Link
		@tip Set the styling for your emails header links. Choose a color that helps them stand out from your text.
		*/
			#templateHeader .mcnTextContent a,#templateHeader .mcnTextContent p a{
				/*@editable*/color:#2BAADF;
				/*@editable*/font-weight:normal;
				/*@editable*/text-decoration:underline;
			}
		/*
		@tab Body
		@section Body Style
		@tip Set the background color and borders for your emails body area.
		*/
			#templateBody{
				/*@editable*/background-color:#FFFFFF;
				/*@editable*/background-image:none;
				/*@editable*/background-repeat:no-repeat;
				/*@editable*/background-position:center;
				/*@editable*/background-size:cover;
				/*@editable*/border-top:0;
				/*@editable*/border-bottom:2px solid #EAEAEA;
				/*@editable*/padding-top:0;
				/*@editable*/padding-bottom:9px;
			}
		/*
		@tab Body
		@section Body Text
		@tip Set the styling for your emails body text. Choose a size and color that is easy to read.
		*/
			#templateBody .mcnTextContent,#templateBody .mcnTextContent p{
				/*@editable*/color:#202020;
				/*@editable*/font-family:Helvetica;
				/*@editable*/font-size:16px;
				/*@editable*/line-height:150%;
				/*@editable*/text-align:left;
			}
		/*
		@tab Body
		@section Body Link
		@tip Set the styling for your emails body links. Choose a color that helps them stand out from your text.
		*/
			#templateBody .mcnTextContent a,#templateBody .mcnTextContent p a{
				/*@editable*/color:#2BAADF;
				/*@editable*/font-weight:normal;
				/*@editable*/text-decoration:underline;
			}
		/*
		@tab Footer
		@section Footer Style
		@tip Set the background color and borders for your emails footer area.
		*/
			#templateFooter{
				/*@editable*/background-color:#ffffff;
				/*@editable*/background-image:none;
				/*@editable*/background-repeat:no-repeat;
				/*@editable*/background-position:center;
				/*@editable*/background-size:cover;
				/*@editable*/border-top:0;
				/*@editable*/border-bottom:0;
				/*@editable*/padding-top:0px;
				/*@editable*/padding-bottom:9px;
			}
		/*
		@tab Footer
		@section Footer Text
		@tip Set the styling for your emails footer text. Choose a size and color that is easy to read.
		*/
			#templateFooter .mcnTextContent,#templateFooter .mcnTextContent p{
				/*@editable*/color:#656565;
				/*@editable*/font-family:Helvetica;
				/*@editable*/font-size:12px;
				/*@editable*/line-height:150%;
				/*@editable*/text-align:center;
			}
		/*
		@tab Footer
		@section Footer Link
		@tip Set the styling for your emails footer links. Choose a color that helps them stand out from your text.
		*/
			#templateFooter .mcnTextContent a,#templateFooter .mcnTextContent p a{
				/*@editable*/color:#656565;
				/*@editable*/font-weight:normal;
				/*@editable*/text-decoration:underline;
			}
		@media only screen and (min-width:768px){
			.templateContainer{
				width:600px !important;
			}

	}	@media only screen and (max-width: 480px){
			body,table,td,p,a,li,blockquote{
				-webkit-text-size-adjust:none !important;
			}

	}	@media only screen and (max-width: 480px){
			body{
				width:100% !important;
				min-width:100% !important;
			}

	}	@media only screen and (max-width: 480px){
			#bodyCell{
				padding-top:10px !important;
			}

	}	@media only screen and (max-width: 480px){
			.mcnImage{
				width:100% !important;
			}

	}	@media only screen and (max-width: 480px){
			.mcnCartContainer,.mcnCaptionTopContent,.mcnRecContentContainer,.mcnCaptionBottomContent,.mcnTextContentContainer,.mcnBoxedTextContentContainer,.mcnImageGroupContentContainer,.mcnCaptionLeftTextContentContainer,.mcnCaptionRightTextContentContainer,.mcnCaptionLeftImageContentContainer,.mcnCaptionRightImageContentContainer,.mcnImageCardLeftTextContentContainer,.mcnImageCardRightTextContentContainer,.mcnImageCardLeftImageContentContainer,.mcnImageCardRightImageContentContainer{
				max-width:100% !important;
				width:100% !important;
			}

	}	@media only screen and (max-width: 480px){
			.mcnBoxedTextContentContainer{
				min-width:100% !important;
			}

	}	@media only screen and (max-width: 480px){
			.mcnImageGroupContent{
				padding:9px !important;
			}

	}	@media only screen and (max-width: 480px){
			.mcnCaptionLeftContentOuter .mcnTextContent,.mcnCaptionRightContentOuter .mcnTextContent{
				padding-top:9px !important;
			}

	}	@media only screen and (max-width: 480px){
			.mcnImageCardTopImageContent,.mcnCaptionBottomContent:last-child .mcnCaptionBottomImageContent,.mcnCaptionBlockInner .mcnCaptionTopContent:last-child .mcnTextContent{
				padding-top:18px !important;
			}

	}	@media only screen and (max-width: 480px){
			.mcnImageCardBottomImageContent{
				padding-bottom:9px !important;
			}

	}	@media only screen and (max-width: 480px){
			.mcnImageGroupBlockInner{
				padding-top:0 !important;
				padding-bottom:0 !important;
			}

	}	@media only screen and (max-width: 480px){
			.mcnImageGroupBlockOuter{
				padding-top:9px !important;
				padding-bottom:9px !important;
			}

	}	@media only screen and (max-width: 480px){
			.mcnTextContent,.mcnBoxedTextContentColumn{
				padding-right:18px !important;
				padding-left:18px !important;
			}

	}	@media only screen and (max-width: 480px){
			.mcnImageCardLeftImageContent,.mcnImageCardRightImageContent{
				padding-right:18px !important;
				padding-bottom:0 !important;
				padding-left:18px !important;
			}

	}	@media only screen and (max-width: 480px){
			.mcpreview-image-uploader{
				display:none !important;
				width:100% !important;
			}

	}	@media only screen and (max-width: 480px){
		/*
		@tab Mobile Styles
		@section Heading 1
		@tip Make the first-level headings larger in size for better readability on small screens.
		*/
			h1{
				/*@editable*/font-size:22px !important;
				/*@editable*/line-height:125% !important;
			}

	}	@media only screen and (max-width: 480px){
		/*
		@tab Mobile Styles
		@section Heading 2
		@tip Make the second-level headings larger in size for better readability on small screens.
		*/
			h2{
				/*@editable*/font-size:20px !important;
				/*@editable*/line-height:125% !important;
			}

	}	@media only screen and (max-width: 480px){
		/*
		@tab Mobile Styles
		@section Heading 3
		@tip Make the third-level headings larger in size for better readability on small screens.
		*/
			h3{
				/*@editable*/font-size:18px !important;
				/*@editable*/line-height:125% !important;
			}

	}	@media only screen and (max-width: 480px){
		/*
		@tab Mobile Styles
		@section Heading 4
		@tip Make the fourth-level headings larger in size for better readability on small screens.
		*/
			h4{
				/*@editable*/font-size:16px !important;
				/*@editable*/line-height:150% !important;
			}

	}	@media only screen and (max-width: 480px){
		/*
		@tab Mobile Styles
		@section Boxed Text
		@tip Make the boxed text larger in size for better readability on small screens. We recommend a font size of at least 16px.
		*/
			.mcnBoxedTextContentContainer .mcnTextContent,.mcnBoxedTextContentContainer .mcnTextContent p{
				/*@editable*/font-size:14px !important;
				/*@editable*/line-height:150% !important;
			}

	}	@media only screen and (max-width: 480px){
		/*
		@tab Mobile Styles
		@section Preheader Visibility
		@tip Set the visibility of the emails preheader on small screens. You can hide it to save space.
		*/
			#templatePreheader{
				/*@editable*/display:block !important;
			}

	}	@media only screen and (max-width: 480px){
		/*
		@tab Mobile Styles
		@section Preheader Text
		@tip Make the preheader text larger in size for better readability on small screens.
		*/
			#templatePreheader .mcnTextContent,#templatePreheader .mcnTextContent p{
				/*@editable*/font-size:14px !important;
				/*@editable*/line-height:150% !important;
			}

	}	@media only screen and (max-width: 480px){
		/*
		@tab Mobile Styles
		@section Header Text
		@tip Make the header text larger in size for better readability on small screens.
		*/
			#templateHeader .mcnTextContent,#templateHeader .mcnTextContent p{
				/*@editable*/font-size:16px !important;
				/*@editable*/line-height:150% !important;
			}

	}	@media only screen and (max-width: 480px){
		/*
		@tab Mobile Styles
		@section Body Text
		@tip Make the body text larger in size for better readability on small screens. We recommend a font size of at least 16px.
		*/
			#templateBody .mcnTextContent,#templateBody .mcnTextContent p{
				/*@editable*/font-size:16px !important;
				/*@editable*/line-height:150% !important;
			}

	}	@media only screen and (max-width: 480px){
		/*
		@tab Mobile Styles
		@section Footer Text
		@tip Make the footer content text larger in size for better readability on small screens.
		*/
			#templateFooter .mcnTextContent,#templateFooter .mcnTextContent p{
				/*@editable*/font-size:14px !important;
				/*@editable*/line-height:150% !important;
			}

	}</style></head>
	    <body>
			<!--*|IF:MC_PREVIEW_TEXT|*-->
			<!--[if !gte mso 9]><!----><span class="mcnPreviewText" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;"></span><!--<![endif]-->
			<!--*|END:IF|*-->
	        <center>
	            <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
	                <tr>
	                    <td align="center" valign="top" id="bodyCell">
	                        <!-- BEGIN TEMPLATE // -->
							<!--[if (gte mso 9)|(IE)]>
							<table align="center" border="0" cellspacing="0" cellpadding="0" width="600" style="width:600px;">
							<tr>
							<td align="center" valign="top" width="600" style="width:600px;">
							<![endif]-->
	                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">

	                            <tr>
	                                <td valign="top" id="templateHeader"><table class="mcnTextBlock" style="min-width:100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
	    <tbody class="mcnTextBlockOuter">
	        <tr>
	            <td class="mcnTextBlockInner" style="padding-top:9px;" valign="top">
	              	<!--[if mso]>
					<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
					<tr>
					<![endif]-->

					<!--[if mso]>
					<td valign="top" width="600" style="width:600px;">
					<![endif]-->
	                <table style="max-width:100%; min-width:100%;" class="mcnTextContentContainer" width="100%" cellspacing="0" cellpadding="0" border="0" align="left">
	                    <tbody><tr>

	                        <td class="mcnTextContent" style="padding: 0px 18px 9px;color: #DC3854;font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;font-size: 20px;font-style: normal;font-weight: bold;text-align: left;" valign="top">

	                            '.$message.'
	                        </td>
	                    </tr>
	                </tbody></table>
					<!--[if mso]>
					</td>
					<![endif]-->

					<!--[if mso]>
					</tr>
					</table>
					<![endif]-->
	            </td>
	        </tr>
	    </tbody>
	</table><table class="mcnTextBlock" style="min-width:100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
	    <tbody class="mcnTextBlockOuter">
	        <tr>
	            <td class="mcnTextBlockInner" style="padding-top:9px;" valign="top">
	              	<!--[if mso]>
					<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
					<tr>
					<![endif]-->

					<!--[if mso]>
					<td valign="top" width="600" style="width:600px;">
					<![endif]-->
	                <table style="max-width:100%; min-width:100%;" class="mcnTextContentContainer" width="100%" cellspacing="0" cellpadding="0" border="0" align="left">
	                    <tbody><tr>

	                        <td class="mcnTextContent" style="padding: 0px 18px 9px;color: #009CC2;font-family: &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;font-size: 20px;font-style: italic;font-weight: bold;" valign="top">

	                            <div style="text-align: right;">'.$masignature.'</div>

	                        </td>
	                    </tr>
	                </tbody></table>
					<!--[if mso]>
					</td>
					<![endif]-->

					<!--[if mso]>
					</tr>
					</table>
					<![endif]-->
	            </td>
	        </tr>
	    </tbody>
	</table><table class="mcnImageBlock" style="min-width:100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
	    <tbody class="mcnImageBlockOuter">
	            <tr>
	                <td style="padding:9px" class="mcnImageBlockInner" valign="top">
	                    <table class="mcnImageContentContainer" style="min-width:100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="left">
	                        <tbody><tr>
	                            <td class="mcnImageContent" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;" valign="top">


	                                        <img alt="votre carte de voeux" src="http://lemag.seinesaintdenis.fr/plugins/voeux2018/imagevoeux600-2018.php?rub95='.$img95.'&rub96='.$img96.'&rub97='.$img97.'&rub98='.$img98.'&rub99='.$img99.'" style="max-width:600px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage" width="564" align="middle">


	                            </td>
	                        </tr>
	                    </tbody></table>
	                </td>
	            </tr>
	    </tbody>
	</table></td>
	                            </tr>
	                            <tr>
	                                <td valign="top" id="templateBody"><table class="mcnTextBlock" style="min-width:100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
	    <tbody class="mcnTextBlockOuter">
	        <tr>
	            <td class="mcnTextBlockInner" style="padding-top:9px;" valign="top">
	              	<!--[if mso]>
					<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
					<tr>
					<![endif]-->

					<!--[if mso]>
					<td valign="top" width="600" style="width:600px;">
					<![endif]-->
	                <table style="max-width:100%; min-width:100%;" class="mcnTextContentContainer" width="100%" cellspacing="0" cellpadding="0" border="0" align="left">
	                    <tbody><tr>

	                        <td class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;" valign="top">

	                            <div style="background-color:#18A5C9;padding:1em;"><span style="font-size:20px"><strong><span style="font-family:open sans,helvetica neue,helvetica,arial,sans-serif"><span style="color: #FFFFFF;">Et pour vous, la Seine-Saint-Denis, est quoi ?<br>
	Rendez-vous sur&nbsp; </span><a href="http://ssd.fr/voeux2018" moz-do-not-send="true" target="_blank"><span style="color: #FFFFFF;">ssd.fr/voeux2018</span></a></span></strong></span></div>

	                        </td>
	                    </tr>
	                </tbody></table>
					<!--[if mso]>
					</td>
					<![endif]-->

					<!--[if mso]>
					</tr>
					</table>
					<![endif]-->
	            </td>
	        </tr>
	    </tbody>
	</table><table class="mcnFollowBlock" style="min-width:100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
	    <tbody class="mcnFollowBlockOuter">
	        <tr>
	            <td style="padding:9px" class="mcnFollowBlockInner" valign="top" align="center">
	                <table class="mcnFollowContentContainer" style="min-width:100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
	    <tbody><tr>
	        <td style="padding-left:9px;padding-right:9px;" align="center">
	            <table style="min-width:100%;" class="mcnFollowContent" width="100%" cellspacing="0" cellpadding="0" border="0">
	                <tbody><tr>
	                    <td style="padding-top:9px; padding-right:9px; padding-left:9px;" valign="top" align="center">
	                        <table cellspacing="0" cellpadding="0" border="0" align="center">
	                            <tbody><tr>
	                                <td valign="top" align="center">
	                                    <!--[if mso]>
	                                    <table align="center" border="0" cellspacing="0" cellpadding="0">
	                                    <tr>
	                                    <![endif]-->

	                                        <!--[if mso]>
	                                        <td align="center" valign="top">
	                                        <![endif]-->


	                                            <table style="display:inline;" cellspacing="0" cellpadding="0" border="0" align="left">
	                                                <tbody><tr>
	                                                    <td style="padding-right:10px; padding-bottom:9px;" class="mcnFollowContentItemContainer" valign="top">
	                                                        <table class="mcnFollowContentItem" width="100%" cellspacing="0" cellpadding="0" border="0">
	                                                            <tbody><tr>
	                                                                <td style="padding-top:5px; padding-right:10px; padding-bottom:5px; padding-left:9px;" valign="middle" align="left">
	                                                                    <table width="" cellspacing="0" cellpadding="0" border="0" align="left">
	                                                                        <tbody><tr>

	                                                                                <td class="mcnFollowIconContent" width="24" valign="middle" align="center">
	                                                                                    <a href="https://www.facebook.com/seinesaintdenisledepartement/" target="_blank"><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-facebook-48.png" style="display:block;" class="" width="24" height="24"></a>
	                                                                                </td>


	                                                                        </tr>
	                                                                    </tbody></table>
	                                                                </td>
	                                                            </tr>
	                                                        </tbody></table>
	                                                    </td>
	                                                </tr>
	                                            </tbody></table>

	                                        <!--[if mso]>
	                                        </td>
	                                        <![endif]-->

	                                        <!--[if mso]>
	                                        <td align="center" valign="top">
	                                        <![endif]-->


	                                            <table style="display:inline;" cellspacing="0" cellpadding="0" border="0" align="left">
	                                                <tbody><tr>
	                                                    <td style="padding-right:0; padding-bottom:9px;" class="mcnFollowContentItemContainer" valign="top">
	                                                        <table class="mcnFollowContentItem" width="100%" cellspacing="0" cellpadding="0" border="0">
	                                                            <tbody><tr>
	                                                                <td style="padding-top:5px; padding-right:10px; padding-bottom:5px; padding-left:9px;" valign="middle" align="left">
	                                                                    <table width="" cellspacing="0" cellpadding="0" border="0" align="left">
	                                                                        <tbody><tr>

	                                                                                <td class="mcnFollowIconContent" width="24" valign="middle" align="center">
	                                                                                    <a href="https://twitter.com/seinesaintdenis" target="_blank"><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-twitter-48.png" style="display:block;" class="" width="24" height="24"></a>
	                                                                                </td>


	                                                                        </tr>
	                                                                    </tbody></table>
	                                                                </td>
	                                                            </tr>
	                                                        </tbody></table>
	                                                    </td>
	                                                </tr>
	                                            </tbody></table>

	                                        <!--[if mso]>
	                                        </td>
	                                        <![endif]-->

	                                    <!--[if mso]>
	                                    </tr>
	                                    </table>
	                                    <![endif]-->
	                                </td>
	                            </tr>
	                        </tbody></table>
	                    </td>
	                </tr>
	            </tbody></table>
	        </td>
	    </tr>
	</tbody></table>

	            </td>
	        </tr>
	    </tbody>
	</table></td>
	                            </tr>
	                            <tr>
	                                <td valign="top" id="templateFooter"></td>
	                            </tr>
	                        </table>
							<!--[if (gte mso 9)|(IE)]>
							</td>
							</tr>
							</table>
							<![endif]-->
	                        <!-- // END TEMPLATE -->
	                    </td>
	                </tr>
	            </table>
	        </center>
	    </body>
	</html>
	';
	$texte = Facteur::html2text($html);
	$corps = array(
		'html' => $html,
		'texte' => $texte,
		'nom_envoyeur' => $mail_exp,
		'repondre_a' => $mail_exp,
		'bcc' => 'concours@seinesaintdenis.fr'
	);
  if ($envoyer_mail($mail_dest, $subject, $corps)){
		$reponse = '</p><strong style="font-size:16px;padding:10px; width:100%;font-family:\'Arial Black\', Gadget, sans-serif; color:#66347D;">Votre e-carte de vœux a bien &eacute;t&eacute; envoy&eacute;e !<p>';
	}
	$subject2='Votre e-carte de vœux 2018 a bien été envoyée !';
	$html2 = 'Votre e-carte de vœux 2018 a bien été envoyée à '.$mail_dest.' !';
	$texte2 = Facteur::html2text($html2);
	$corps2 = array(
		'html' => $html2,
		'texte' => $texte2,
		'nom_envoyeur' => $mail_exp,
		'repondre_a' => 'pasdereponse@seinesaintdenis.fr'
	);
	$envoyer_mail($mail_exp, $subject2, $corps2, $headers2);
	return array(
        'message_ok' => 'Votre carte de vœux a été envoyée à '.$mail_dest.' !', // ou bien
    );
}

?>
