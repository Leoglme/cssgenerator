<?php
include ('help.php');
class options
{
    public $shortopts = "";
    public $options;
    public $argv;
    public $error;
    public $result;
    public $default = "sprite.png";
    /*filename vérification */
    public $manyName = "Un seul nom d'image est requis ! [-i " . '"nomImage"' . "]" . PHP_EOL;

    public function __construct(){
        echo "\e[1;36;45m" . "BIENVENUE SUR LE GÉNÉRATEUR CSS ! [!help pour afficher le manuel d'aide]" . "\e[0m" . PHP_EOL . PHP_EOL;
    }

    /*recursive vérification */
    public function cmdRecursive()
    {
        global $argv;
        $shortopts = $this->shortopts .= "r";
        $options = getopt($shortopts);
        $this->options = $options;
        if (end($argv) == "-$shortopts"){
            echo "\e[1;31m" . "un dossier est requis !" . "\e[0m" . PHP_EOL;
        } elseif (end($argv) == $argv[0]) {
            echo "\e[1;31m" . "un dossier est requis !" . "\e[0m" . PHP_EOL;
        } elseif (!file_exists(end($argv))) {
            echo "\e[1;31m" . "Le dossier " . end($argv) . " n'existe pas ! [ -r Dossier ]" . "\e[0m" . PHP_EOL;
        } elseif (!empty($options) && file_exists(end($argv))) {
            $this->result = end($argv);
            echo "\e[1;36m" . "Lancement de la récursive du dossier " . $this->result . "\e[0m" . PHP_EOL;
            return $this->error = true;
        } elseif (empty($options) && file_exists(end($argv))) {
            $this->result = end($argv);
            echo "\e[1;36m" . "Lancement de la courante du dossier " . $this->result . "\e[0m" . PHP_EOL;
            return $this->error = true;
        }
    }

    /*filename vérification */
    public function cmd(){
        $shortopts = $this->shortopts .= "i::";
        $longopts = array("output-image::");
        $cmd = "i";
        $long = "output-image";
        $options = getopt($shortopts, $longopts);
        if (isset($options[$long])){
            $options[$cmd] = $options[$long];
        }
        if(empty($options[$cmd])){
            echo "\e[1;36m" . "Le nom de l'image par défaut $this->default est valide !" . "\e[0m" . PHP_EOL;
            return $this->options = true;

       }elseif(is_string($options[$cmd]) && strpos($options[$cmd], "/") != false){
            echo "\e[1;31m" . "le nom de l'image : $options[$cmd] n'est pas correct !" . "\e[0m" . PHP_EOL;
         }
        elseif (is_array($options[$cmd]) && count($options[$cmd]) > 1) {
            return $this->manyName;
        }elseif (is_string($options[$cmd])) {
            $this->options = $options[$cmd];
            echo "\e[1;36m" . "Le nom de l'image $this->options.png est valide !" . "\e[0m" . PHP_EOL;
            return $this->options . ".png";

        }
    }
    /*css vérification */
    public function cmdCss(){
        $shortopts = $this->shortopts .= "s::";
        $longopts = array("output-style::");
        $cmd = "s";
        $long = "output-style";
        $options = getopt($shortopts, $longopts);
        if (isset($options[$long])){
            $options[$cmd] = $options[$long];
        }
        if(empty($options[$cmd])){
            echo "\e[1;36m" . "Le fichier style.css est valide !" . "\e[0m" . PHP_EOL;
            return $this->options = "style.css";

        }else {
            echo "\e[1;36m" . "Le fichier $options[$cmd].css est valide !" . "\e[0m" . PHP_EOL;
            $this->options = $options[$cmd];
            return $this->options . ".css";

        }
    }
    /*commande help*/
    public function openMan(){
        global $argv;
        if(!empty($argv[1]) && $argv[1] == "!help"){
            echo "\033[2J\033[1;1H"; //clean le terminal
            $help = new help();
            $help->helpman();
        }
    }

    /*commande padding*/
    public function padding(){
        global $padding;
        $shortopts = $this->shortopts .= "p::";
        $longopts = array("padding::");
        $cmd = "p";
        $long = "padding";
        $options = getopt($shortopts, $longopts);
        if (isset($options[$long])){
            $options[$cmd] = $options[$long];
        }
        if(!empty($options[$cmd]) && is_numeric($options[$cmd])) {
            echo "\e[1;36m" . "Un padding de $options[$cmd] pixels à été ajouté !" . "\e[0m" . PHP_EOL;
            return $padding = $options[$cmd];
        }elseif(!empty($options[$cmd]) && !is_numeric($options[$cmd])){
            echo "\e[1;31m" . "La valeur du padding doit être numérique !" . "\e[0m" . PHP_EOL;
            return $padding = 0;
        }else {
            return $padding = 0;
        }
    }
}