<?php
function connexion() {
    
    //Connexion à MySQL
    try
    {   
        $mysqlClient = new PDO('mysql:host=localhost;dbname=artbox;charset=utf8', 'root', 'root');
        return $mysqlClient;
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
}


