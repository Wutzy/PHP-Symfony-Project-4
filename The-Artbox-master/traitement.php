<?php

require 'bdd.php';

function sanitize($input){
    return htmlspecialchars(trim(htmlspecialchars($input)));
}

//Sanitized all the incoming data
$postData = array_map('sanitize', $_POST);


if (
    empty($postData['titre']) || 
    empty($postData['artiste']) ||
    strlen($postData['description']) < 3 ||
    empty($postData['image']) ||
    !filter_var($postData['image'], FILTER_VALIDATE_URL)
) {
    header('Location: add.php');
} else {
    //écriture de la requête
    $sqlQuery = 'INSERT INTO oeuvres(title, image, artist, description) VALUES (:titre, :image, :artiste, :description)';

    //préparation
    $insertOeuvre = connexion()->prepare($sqlQuery);

    //execution
    $insertOeuvre->execute([
        'titre' => $postData['titre'],
        'image' => $postData['image'],
        'artiste' => $postData['artiste'],
        'description' => $postData['description']
    ]);

    header('Location: index.php?id=' . connexion()->lastInsertId());
}



     

