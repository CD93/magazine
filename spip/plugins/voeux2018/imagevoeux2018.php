<?php
// on spécifie le type MIME, c'est à dire que le script php va se faire passer pour un autre type de fichier si vous ne mettez pas ça en accédant à la page vous aurez exactement le même résultat que lorsque voys ouvrez l'image avec bloc note
header('Content-Type: image/jpeg');
//$fondvoeux = imagecreate(1000, 1165);
$fondvoeux = imagecreatefromjpeg("images/fond_voeux_2018.jpg");
$fond_jaune = imagecreatefromjpeg("images/fond_orange.jpg");
$fond_bleu = imagecreatefromjpeg("images/fond_bleu.jpg");
$imgrub95 = imagecreatefromjpeg("images/".$_GET["rub95"].".jpg");		// on charge l'image de la rubrique 95
$imgrub96 = imagecreatefromjpeg("images/".$_GET["rub96"].".jpg");		// on charge l'image de la rubrique 95
$imgrub97 = imagecreatefromjpeg("images/".$_GET["rub97"].".jpg");		// on charge l'image de la rubrique 95
$imgrub98 = imagecreatefromjpeg("images/".$_GET["rub98"].".jpg");		// on charge l'image de la rubrique 95
$imgrub99 = imagecreatefromjpeg("images/".$_GET["rub99"].".jpg");		// on charge l'image de la rubrique 95

imagecopy($fondvoeux, $fond_jaune, 0, 0, 0, 0, 483, 380);
imagecopy($fondvoeux, $imgrub95, 483, 0, 0, 0, 517, 380);
imagecopy($fondvoeux, $imgrub96, 0, 380, 0, 0, 403, 312);
imagecopy($fondvoeux, $fond_bleu, 403, 380, 0, 0, 260, 312);
imagecopy($fondvoeux, $imgrub97, 663, 380, 0, 0, 337, 312);
imagecopy($fondvoeux, $imgrub98, 0, 692, 0, 0, 403, 473);
imagecopy($fondvoeux, $imgrub99, 403, 692, 0, 0, 597, 473);


// on fait le rendu de l'image dans le format MIME
imagejpeg($fondvoeux);

// on supprime les calques que l'on a fait (pour vider la mémoire)
imagedestroy($fondvoeux);
imagedestroy($fond_jaune);
imagedestroy($fond_bleu);
imagedestroy($imgrub95);
imagedestroy($imgrub95);
imagedestroy($imgrub96);
imagedestroy($imgrub97);
imagedestroy($imgrub98);
imagedestroy($imgrub99);

?>
