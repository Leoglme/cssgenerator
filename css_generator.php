<?php
include('myscan.php');
include('sprite.php');
include('crea-style.php');
global $img_tab;
global $obj;
$importToCss = $obj->cmdCss();



class create_sprite
{
    public function __construct($array, $filename = "sprite.png", $padding = "0")
    {
        generate_sprite($array, $filename, $padding);
    }
}

/*valeur du padding*/
$padding =  $obj->padding();

/*vérification de $filename*/
$a = $obj->cmd();
if($obj->options == 1) {
    $spriteName = "sprite";
}else {
    $spriteName = $obj->options;
}

if (isset($a) && $a != $obj->manyName && $obj->error == 1){ // $a -> newName.png et 0 erreur
    $newSprite = new create_sprite($img_tab, $a, $padding);
}elseif($a == 1 && $obj->error == 1){ // $a par default -> sprite.png et 0 erreur
    $defaultSprite = new create_sprite($img_tab, "sprite.png", $padding);
}elseif($a != 1){
    echo $a . PHP_EOL;
}

/*vérification de fichier css*/
if($obj->error == 1){
    $css = new css();
    $css->cssParam();
}

/*méthode pour afficher le man help*/
$obj->openMan();