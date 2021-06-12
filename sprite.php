<?php
$position = [];
//$padding = "100";
function generate_sprite($path, $filename, $padding)
{
    /*$path = tableau chemin fichier png ->my scan.php*/
    $im = array();
    $size = [];
    $height = [];
    $taille = 0;
    $calcul = 0;
    global $position;
//    global $padding;


    for ($i = 0; $i < count($path); $i++) {
        $size[$i] = getimagesize($path[$i]); // 0->width 1->height
        $im[$i] = imagecreatefrompng($path[$i]); //Charger les images
        $calcul += $size[$i][0];
        array_push($height, $size[$i][1]);
        $maxSize = max($height);
    }
    /*nouvelle image sprite*/
    if ($padding > 0) {
        $sprite = imagecreatetruecolor($calcul, $maxSize * 2); // 1-> addition width, 2-> height max img
    }else{
        $sprite = imagecreatetruecolor($calcul, $maxSize); // 1-> addition width, 2-> height max img
    }

    $background = imagecolorallocatealpha($sprite, 255, 255, 255, 127);
    imagefill($sprite, 0, 0, $background);
    imagealphablending($sprite, false);
    imagesavealpha($sprite, true);


    /*fusionner les images*/
    imagecopy($sprite, $im[0], 0, 0, 0, 0, $size[0][0], $size[0][1]);
    array_push($position, 0, 0);

    $a = 0;
    for($i = 1; $i < count($path); $i++) {
        $taille += $size[$i - 1][0] + $padding;
        if($taille > $calcul - $size[$i][0]) {
            imagecopy($sprite, $im[$i], $a , $maxSize, 0, 0, $size[$i][0], $size[$i][1]);
            array_push($position, $a, $maxSize);
            $a += $size[$i][0];
        }else {
            imagecopy($sprite, $im[$i], $taille , 0, 0, 0, $size[$i][0], $size[$i][1]);
            array_push($position, $taille, 0);
        }
    }
    /*création sprite.png*/
  imagepng($sprite, __DIR__ . "\sprite\\" . $filename);
}