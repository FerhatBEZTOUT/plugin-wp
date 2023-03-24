<?php 


/**
 * isValidDate
 * description : vérifie si la date est du format YYYY-MM-DD (exemple : 2023-01-01)
 * @param  mixed $dateString
 * @return void
 */
function isValidDate($dateString)
{
    // Création d'un objet DateTime
    $date = DateTime::createFromFormat('Y-m-d', $dateString);

    // Retourne vrai si la date est bon format, faux sinon
    return ($date && $date->format('Y-m-d') == $dateString);
}


?>