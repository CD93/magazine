<?php
// on spécifie le type MIME, c'est à dire que le script php va se faire passer pour un autre type de fichier si vous ne mettez pas ça en accédant à la page vous aurez exactement le même résultat que lorsque voys ouvrez l'image avec bloc note
header('Content-Type: image/png');
$fondvoeux = imagecreatefrompng("images/fond_voeux_2018.png");	// on charge l'image de fond des voeux

$imgrub95 = imagecreatefrompng("images/rub95.png");		// on charge l'image de la rubrique 95
$imgrub96 = imagecreatefrompng("images/rub96.png");		// on charge l'image de la rubrique 95
$imgrub97 = imagecreatefrompng("images/rub97.png");		// on charge l'image de la rubrique 95
$imgrub98 = imagecreatefrompng("images/rub98.png");		// on charge l'image de la rubrique 95
$imgrub99 = imagecreatefrompng("images/rub99.png");		// on charge l'image de la rubrique 95
$img2018 = imagecreatefrompng("images/calque2018.png");		// on charge l'image du calque2018
// on copie l'image de chaque rubrique et on la colle sur le  fond des voeux avec la position relative

imagecopy($fondvoeux, $imgrub95, 662, 380, 0, 0, 314, 312);
imagecopy($fondvoeux, $imgrub96, 12, 379, 0, 0, 391, 313);
imagecopy($fondvoeux, $imgrub97, 483, 44, 0, 0, 494, 337);
imagecopy($fondvoeux, $imgrub98, 12, 693, 0, 0, 391, 228);
imagecopy($fondvoeux, $imgrub99, 403, 693, 0, 0, 574, 382);
imagecopy($fondvoeux, $img2018, 0, 0, 0, 0, 1000, 1166);

// on conserve le canal alpha, c'est à dire la transparence
imagealphablending($fondvoeux, false);
imagesavealpha($fondvoeux, true);

// on fait le rendu de l'image dans le format MIME
imagepng($fondvoeux);

// on supprime les calques que l'on a fait (pour vider la mémoire)
imagedestroy($fondvoeux);

imagedestroy($imgrub95);
imagedestroy($imgrub96);
imagedestroy($imgrub97);
imagedestroy($imgrub98);
imagedestroy($imgrub99);
imagedestroy($img2018);

?>
