<?php
/*
    Plugin Name: ferhat_beztout
    Description: Plugin de réservation
    Version: 1.0
    Author: Ferhat BEZTOUT
    
*/

include_once __DIR__ . '/query.php';
include_once __DIR__ . '/utilities.php';
include_once __DIR__ . '/view.php';

$visible_msg = false;

if (isset($_POST['name']) && isset($_POST['date'])) {
    
    $visible_msg = true;
    $type_alert = "danger";

    $name = htmlentities($_POST['name']);
    $date = htmlentities($_POST['date']);
    if (!isValidDate($date) && empty($name)) {
        $msg ="Le champ nom est vide et la date est incorrecte";
    } else
    if (!isValidDate($date)) {
        $msg = "La date est incorrecte";
    } else 
        if (empty($name)) {
        $msg = "Le champ nom est vide";
    } else 
        if (exist_booking($name, $date)) {
        $msg = "Réservation déjà existante";
    } else {
        if (insert_booking($name, $date)) {
            $msg = "Réservation validée";
            $type_alert = "success";
        } else {
            $msg = "Erreur lors de la réservation, réessayez";
        }
    }
}

add_shortcode('formulaire_reserv', 'booking_form');
add_shortcode('liste_reserv', 'booking_display');




?>