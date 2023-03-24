<?php 
include_once __DIR__.'/connexionDB.php';

    
    /**
     * insert_booking
     * description : ajouter une nouvelle reservation avec un nom et une date (une date de création est automatiquement ajoutée côté BD)
     * @param  mixed $name
     * @param  mixed $date
     * @return void
     */
    function insert_booking($name, $date) {
        global $pdo;
        try {
            $query = $pdo->prepare("INSERT INTO testdev_booking(name, date) VALUES (?,?)");

            // Vrai si l'insertion a été faite, faux sinon
            return $query->execute(array($name,$date));  
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    
    /**
     * get_bookings
     * descrption : recupére toutes les reservations
     * @return void
     */
    function get_bookings() {
        global $pdo;
        try {
            $query = $pdo->prepare("SELECT * FROM testdev_booking");
            $query->execute();
            $resultat = $query->fetchAll(PDO::FETCH_ASSOC); 

            if (count($resultat)) {
                return $resultat; 
            } else {
                return false;
            }
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    
    /**
     * exist_booking
     * description : vérifie si une reservation du même nom à la même date a déjà été faite
     * @param  mixed $name
     * @param  mixed $date
     * @return void
     */
    function exist_booking($name, $date) {
        global $pdo;
        try {
            $query = $pdo->prepare("SELECT COUNT(*) as booking_count FROM testdev_booking WHERE name=? AND date=?");
            $query->execute(array($name,$date));
            $resultat = $query->fetch();

            // Retourne vrai si une reservation existe, faux sinon
            return $resultat['booking_count']!=0; 

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }





?>