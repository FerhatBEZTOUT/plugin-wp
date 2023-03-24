<?php
    include_once __DIR__.'/config/db.ini.php';
    
        try {
            $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
             // PDO error mode en exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch (PDOException $e) {
            echo "Connexion échouée : " . $e->getMessage();
           
        }
        

?>