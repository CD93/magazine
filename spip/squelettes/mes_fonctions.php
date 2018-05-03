<?php
// utilisé par le modele dailymotion
function filtre_issecure() {
	return
		(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
		|| $_SERVER['SERVER_PORT'] == 443;
}
// utilisé par la compostion rubrique-agenda
function filtre_creer_date_liste($date="2014-05") {
	$current_month = substr($date,-2);
	$current_year = substr($date,0,4);
	$value = array();
	$value2=$current_month;
	$value3=$current_year;
	for($i = 0, $m = $current_month, $y = $current_year; $i < 12; $i++, $m++) {
        if($m > 12) {
            $m = 1;
            $y++;
        }
        if(strlen($m) < 2) {
           $value[] = $y."-0".$m;
        } else {
	        $value[] = $y."-".$m;
        }
    }
    return $value;
  }
  
function balise_NEWS_URL($p){
	$var1 = interprete_argument_balise(1,$p);
	$var2 = interprete_argument_balise(2,$p);
	$var3 = interprete_argument_balise(3,$p);
    $p->code = "calculer_balise_NEWS_URL($var1,$var2,$var3)";
	$p->interdire_scripts = false;
	return $p;
}

function calculer_balise_NEWS_URL($url,$id_rubrique,$content) {
	$url = parametre_url($url,utm_source,"newsletter".$id_rubrique);
	$url = parametre_url($url,utm_medium,"email");
	$url = parametre_url($url,utm_campaign,"lemagazine");
	if ($content) $url = parametre_url($url,utm_content,$content);
	$url = url_absolue($url);
	return $url;
}
  
?>