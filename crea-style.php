<?php
/*Class qui génère le css !*/
class css
{
    public $nameClass = [];

    /*importation du tableau png*/
    function import(){
        global $img_tab;
        for($i = 0; $i < count($img_tab); $i++) {
            $base =  substr(str_replace(".", "", basename($img_tab[$i])),0, -3);
            array_push($this->nameClass, $base);
        }
        return $this->nameClass;
    }
     /*création et écriture du fichier css*/
    function cssParam(){
        global $img_tab;
        global $importToCss;
        global $spriteName;
        global $position;

        $contents = ".defaultSprite \n { 
        background-image: url(" . $spriteName . ".png"  . ");
        background-repeat: no-repeat;
        display: block; \n }" . PHP_EOL;

        $count = count($this->import()) - 1;

        $i = 0;
        $a = 0;
        while($i < count($position) / 2) {
            $positionx = -$position[$i + $a];
            $positiony = -$position[$i + 1 + $a];

        $contents .= "." . $this->nameClass[$i] . " \n {
        width: " . getimagesize($img_tab[$i])[0] . "px;
        height: " . getimagesize($img_tab[$i])[1] . "px;
        padding: 0px;
        background-position:" . $positionx . "px " . $positiony . "px; \n }" . PHP_EOL;
        $i++;
        $a++;
     }//
        $name = "sprite/" . substr($importToCss, 0, -4) . ".css";
        fopen($name, "w+");
        file_put_contents($name, $contents);
    }

    public function test(){
        global $position;
        $i = 0;
        $a = 0;
        while($i < count($position) / 2) {
            echo "background-position:" . -$position[$i + $a] . "px -" . $position[$i + 1 + $a] ."px; \n }" . PHP_EOL;
            $i++;
            $a++;
        }


    }
}