<?php

require 'vendor/autoload.php';

/* 
Fonction de création des ustilisateurs faker
--------------------------------------------
But : creer des éléments dans la table user
*/

function CreateFaker($pdo)
{
    $faker = Faker\Factory::Create();

    try {
        $query = "insert into user(userName, userFirstName, userPseudo, userPassword, userEmail, userRole, userGenre, userBirthDate, userPhoneNumber, userEthnic, userJobs, userIncome ) 
        values (:userName,:userFirstName,:userPseudo,:userPassword,:userEmail,:userRole, :userGenre, :userBirthDate, :userPhoneNumber, :userEthnic, :userJobs, :userIncome )";

        $createFaker = $pdo->prepare($query);

        $genre = GenderGenerate();

        $createFaker->execute([
            'userPseudo' => $faker->lastName() . "-". $faker->firstName(),
            'userEmail' => $faker->email(),
            'userPassword' => $faker->password(2,16),
            'userName' =>  $faker->lastName(),
            'userFirstName' => $faker->firstName(),
            'userGenre' => $genre,
            'userBirthDate' => $faker->dateTime(),
            'userPhoneNumber' => $_POST['Tel'],
            'userEthnic' => $_POST['Ethnie'],
            'userJobs' => $_POST['Job'],
            'userIncome' => $_POST['Income'],
            'userRole' => 'user'
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

/* 
Lib de fonction pour génération de faker 
----------------------------------------
*/

function GenderGenerate() {
    // Génère un nombre aléatoire (0 ou 1)
    $nombreAleatoire = rand(0, 1);

    // Utilise le nombre aléatoire pour déterminer le genre
    $genre = ($nombreAleatoire == 0) ? 'M' : 'F';

    return $genre;
}