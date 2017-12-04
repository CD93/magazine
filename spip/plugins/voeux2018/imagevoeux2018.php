<?php
// on spécifie le type MIME, c'est à dire que le script php va se faire passer pour un autre type de fichier si vous ne mettez pas ça en accédant à la page vous aurez exactement le même résultat que lorsque voys ouvrez l'image avec bloc note
header('Content-Type: image/jpeg');

$imgrub95 = imagecreatefromjpeg("images/".$_GET["rub95"].".jpg");		// on charge l'image de la rubrique 95
$imgrub96 = imagecreatefromjpeg("images/".$_GET["rub96"].".jpg");		// on charge l'image de la rubrique 95
$imgrub97 = imagecreatefromjpeg("images/".$_GET["rub97"].".jpg");		// on charge l'image de la rubrique 95
$imgrub98 = imagecreatefromjpeg("images/".$_GET["rub98"].".jpg");		// on charge l'image de la rubrique 95
$imgrub99 = imagecreatefromjpeg("images/".$_GET["rub99"].".jpg");		// on charge l'image de la rubrique 95

imagecopy($fondvoeux, $imgrub95, 662, 380, 0, 0, 314, 312);
imagecopy($fondvoeux, $imgrub96, 12, 379, 0, 0, 391, 313);
imagecopy($fondvoeux, $imgrub97, 483, 44, 0, 0, 494, 337);
imagecopy($fondvoeux, $imgrub98, 12, 693, 0, 0, 391, 228);
imagecopy($fondvoeux, $imgrub99, 403, 693, 0, 0, 574, 382);


// on fait le rendu de l'image dans le format MIME
imagejpeg($fondvoeux);

// on supprime les calques que l'on a fait (pour vider la mémoire)
imagedestroy($fondvoeux);

imagedestroy($imgrub95);
imagedestroy($imgrub96);
imagedestroy($imgrub97);
imagedestroy($imgrub98);
imagedestroy($imgrub99);

?>
