<?php
class help
{
    public function helpman()
    {
        /* Message bienvenue */
        echo "\e[1;36;45m" . "BIENVENUE DANS LE MANUEL D'AIDE !" . "\e[0m" . PHP_EOL . PHP_EOL;
        echo "\e[1;35;1m" . "*Le dossier contenant vos images doit apparaitre à la fin de la commande." . "\e[0m" . PHP_EOL . PHP_EOL;
        /* help récursive */
        echo "\e[1;35;44m" . "Commandes pour lancer le mode récursif du dossier : " . "\e[0m" . PHP_EOL;
        echo "\e[1;35;44m" . "    (Par défaut le mode récursif est désactivé)" . "\e[0m" . PHP_EOL . PHP_EOL;
        echo "\e[1;36m" . "-r" . "\e[0m" . PHP_EOL;
        echo "\e[1;36m" . "--recursive" . "\e[0m" . PHP_EOL . PHP_EOL;
        /* help sprite name*/
        echo "\e[1;35;44m" . "Commandes pour modifier le nom de votre image sprite : " . "\e[0m" . PHP_EOL;
        echo "\e[1;35;44m" . "   (Par défaut le nom de la sprite est sprite.png)" . "\e[0m" . PHP_EOL . PHP_EOL;
        echo "\e[1;36m" . "-i" . "\e[0m" . "\e[1;35m" . " (exemple : -i=maSprite)" . "\e[0m" . PHP_EOL;
        echo "\e[1;36m" . "--output-image" . "\e[0m" . "\e[1;35m" . " (exemple : --output-image=maSprite)" . "\e[0m" . PHP_EOL . PHP_EOL;
        /* help css file name */
        echo "\e[1;35;44m" . "Commandes pour modifier le nom de votre image sprite : " . "\e[0m" . PHP_EOL;
        echo "\e[1;35;44m" . "   (Par défaut le nom de la sprite est sprite.png)" . "\e[0m" . PHP_EOL . PHP_EOL;
        echo "\e[1;36m" . "-s" . "\e[0m" . "\e[1;35m" . " (exemple : -s=monCss)" . "\e[0m" . PHP_EOL;
        echo "\e[1;36m" . "--output-style" . "\e[0m" . "\e[1;35m" . " (exemple : --output-style=monCss)" . "\e[0m" . PHP_EOL . PHP_EOL;
        /* help css file name */
        echo "\e[1;35;44m" . "Commandes pour ajouter un padding : " . "\e[0m" . PHP_EOL;
        echo "\e[1;35;44m" . "(Par défaut le padding est de 0 pixels)" . "\e[0m" . PHP_EOL . PHP_EOL;
        echo "\e[1;36m" . "-p" . "\e[0m" . "\e[1;35m" . " (exemple : -p=200)" . "\e[0m" . PHP_EOL;
        echo "\e[1;36m" . "--padding" . "\e[0m" . "\e[1;35m" . " (exemple : --padding=200)" . "\e[0m" . PHP_EOL . PHP_EOL;
    }
}