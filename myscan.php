<?php
$path = array();
$img_tab = array();
include('argv.php');

/*Récursive sous dossier*/
function recursive($chemin)
{
    $filetype = filetype($chemin);
    if (is_dir($chemin)) {
        $me = opendir($chemin);
        while ($child = readdir($me)){
            if ($child != '.' && $child != '..') {

                global $path;
                recursive($chemin . DIRECTORY_SEPARATOR . $child);
                $img = $chemin . DIRECTORY_SEPARATOR . $child;
                array_push($path, $img);
            }
        }
    }
}


/*fonction fichier courant du dossier*/
function noRecursive($chemin)
{
    $filetype = filetype($chemin);
    if (is_dir($chemin)) {
        $me = opendir($chemin);
        while ($child = readdir($me)) {
            if ($child != '.' && $child != '..') {

                global $path;
                $img = $chemin . DIRECTORY_SEPARATOR . $child;
                array_push($path, $img);
            }
        }
    }
}

/*recursive vérification */

$obj = new options();
$obj->cmdRecursive();
if(!empty($obj->options) && $obj->error == 1){
    recursive(realpath($obj->result));
}elseif(empty($obj->options) && $obj->error == 1){
    noRecursive(realpath($obj->result));
}


/*garder que les formats images*/
function img_tab()
{
    global $path;
    global $img_tab;
    for ($i = 0; $i < count($path); $i++) {
        if (substr($path[$i], -3) == "png") {
            array_push($img_tab, $path[$i]);
        }
    }
}

img_tab();