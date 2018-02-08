<?php
/*
 * Plugin Name: Fête du jour
 * Description: Ce plugin crée un shortcode avec comme valeur, le nom de la fête du jour. Utilisez simplement ce shortcode dans votre page : [fete_du_jour]
 * Version: 1.0.0
 * Author: Adrien Martineau
 * Author URI: http://adrien-martineau.fr/
 */

/*
 * Source du fichier 'saint' : http://www.webtolosa.com/2008/05/03/ephemeride-ajoutez-le-saint-du-jour-sur-votre-site/
 * Je l'ai converti en CSV et j'ai apporté quelques modifications au fichier,
 * notamment sur le changement de certaines fêtes (NOËL, Armistice...)
 */

function getFete() {
    $date = date('d/m');
    $handle = fopen(__DIR__ . "/saint.csv", "r");

    while (($data = fgetcsv($handle)) !== FALSE) {
        if ($date == $data[4]) {
            return $data[1];
        }
    }
    fclose($handle);
}
add_shortcode('fete_du_jour', 'getFete');