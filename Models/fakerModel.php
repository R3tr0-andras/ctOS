<?php

require 'vendor/autoload.php';

global $fakeUserIds;
global $directory;

/* 
Fonction de création des ustilisateurs faker
--------------------------------------------
But : creer des éléments dans la table user
*/

/* Générer un utilisateur fictif */
function CreateFaker($pdo)
{
    $directory = "Assets/Pictures/fakerProfile";

    $faker = Faker\Factory::create();

    try {
        $query = "INSERT INTO user(userName, userFirstName, userPseudo, userPassword, userEmail, userRole, userGenre, userBirthDate, userPhoneNumber, userEthnic, userProfileImage, userJobs, userIncome, userIsFaker ) 
            VALUES (:userName, :userFirstName, :userPseudo, :userPassword, :userEmail, :userRole, :userGenre, :userBirthDate, :userPhoneNumber, :userEthnic, :userProfileImage, :userJobs, :userIncome, :userIsFaker )";

        $createFaker = $pdo->prepare($query);

        $randomImage = chooseRandomImage($directory);

        $genre = GenderGenerate();
        $ethnic = getRandomEthnicity();
        $phoneNumber = generateRandomPhoneNumber();
        $infosEmploi = getRandomJobAndSalary();

        $createFaker->execute([
            'userPseudo' => $faker->lastName() . "-" . $faker->firstName(),
            'userEmail' => $faker->email(),
            'userPassword' => $faker->password(2, 16),
            'userName' => $faker->lastName(),
            'userFirstName' => $faker->firstName(),
            'userGenre' => $genre,
            'userBirthDate' => $faker->dateTime()->format('Y-m-d H:i:s'),
            'userPhoneNumber' => $phoneNumber,
            'userEthnic' => $ethnic,
            'userProfileImage' => $randomImage,
            'userJobs' => $infosEmploi['emploi'],
            'userIncome' => $infosEmploi['moyenne_salaire'],
            'userRole' => 'user',
            'userIsFaker' => '1'
        ]);

        $userId = $pdo->lastInsertId();
        return $userId;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

/* 
Lib de fonction pour génération de faker 
----------------------------------------
*/

/* Générer un genre */
function GenderGenerate()
{
    // Génère un nombre aléatoire (0 ou 1)
    $nombreAleatoire = rand(0, 1);

    // Utilise le nombre aléatoire pour déterminer le genre
    $genre = ($nombreAleatoire == 0) ? 'M' : 'F';

    return $genre;
}

/* Obtenir une éthnie depuis une liste en json */
function getRandomEthnicity()
{
    // Lire le contenu du fichier JSON
    $contenuFichier = file_get_contents('Assets/json/ethnicity.json');

    // Vérifier si la lecture du fichier s'est bien passée
    if ($contenuFichier === false) {
        return null; // ou une valeur par défaut
    }

    // Décoder le JSON en tableau associatif
    $ethnies = json_decode($contenuFichier, true);

    // Vérifier si le décodage s'est bien passé
    if ($ethnies === null) {
        return null; // ou une valeur par défaut
    }

    // Extraire une ethnie au hasard
    $ethnic = $ethnies['ethnies'][array_rand($ethnies['ethnies'])];

    return $ethnic;
}

//Obtenir un travail et un salaire
function getRandomJobAndSalary()
{
    // Lire le contenu du fichier JSON en tant que chaîne
    $contenuJson = file_get_contents('Assets\json\work.json');

    // Décoder la chaîne JSON en un tableau PHP associatif
    $tableauJson = json_decode($contenuJson, true);

    // Vérifier si le décodage JSON s'est bien passé
    if ($tableauJson === null) {
        // Gérer les erreurs de décodage JSON ici
        die('Erreur de décodage JSON.');
    }

    // Extraire le tableau des emplois
    $emplois = $tableauJson['emplois'];

    // Choisir un emploi aléatoire du tableau
    $emploiAleatoire = $emplois[array_rand($emplois)];

    // Récupérer les salaires min et max
    $salaireMin = $emploiAleatoire['salaire_min'];
    $salaireMax = $emploiAleatoire['salaire_max'];

    // Calculer la moyenne des salaires
    $moyenneSalaire = ($salaireMin + $salaireMax) / 2;

    // Créer un tableau associatif avec les informations
    $resultat = [
        'emploi' => $emploiAleatoire['nom'],
        'secteur' => $emploiAleatoire['secteur'],
        'salaire_min' => $salaireMin,
        'salaire_max' => $salaireMax,
        'moyenne_salaire' => $moyenneSalaire,
    ];

    // Retourner le résultat
    return $resultat;
}

/* Générer un numéro de téléphone */
function generateRandomPhoneNumber()
{
    $isEuropean = (bool) rand(0, 1);

    if ($isEuropean) {
        // Format du numéro européen (par exemple, France)
        $format = '+33 (0)6 ## ## ## ##';
    } else {
        // Format du numéro américain
        $format = '+1 (555) 555-####';
    }

    $phoneNumber = '';

    for ($i = 0; $i < strlen($format); $i++) {
        switch ($format[$i]) {
            case '#':
                $phoneNumber .= rand(0, 9);
                break;
            default:
                $phoneNumber .= $format[$i];
                break;
        }
    }

    return $phoneNumber;
}

/* choisir une image de profil aux fakers de manière random */
function chooseRandomImage($directory) {
    $count = 0;
    
    // Scanner le dossier
    $files = scandir($directory);
    
    // Filtrer les fichiers images et compter leur nombre
    foreach ($files as $file) {
        // Vérifier si c'est un fichier image
        if (preg_match('/\.(jpg|jpeg|png|gif)$/i', $file)) {
            $count++;
            $images[] = $file; // Stocker le nom du fichier dans un tableau
        }
    }
    
    // Vérifier si des images ont été trouvées
    if ($count == 0) {
        return "Aucune image trouvée dans le dossier.";
    }
    
    // Choisir aléatoirement un fichier image
    $randomImage = $images[array_rand($images)];
    
    return $randomImage;
}

/* 
Lib de fonction pour génération de casier criminel pour faker 
------------------------------------------------------------
*/

function CreateCriminalFaker($pdo, $userId)
{
    $faker = Faker\Factory::Create();
    //var_dump($userId);

    try {

        $query = "INSERT INTO criminal_record (userId, recordReason, recordDate, recordDangerousness) 
            VALUES (:userId, :recordReason, :recordDate, :recordDangerousness)";

        $CriminalFaker = $pdo->prepare($query);

        $repeatCount = rand(0, 13);

        for ($j = 0; $j < $repeatCount; $j++) {

            $resultat = getInfraction();

            $CriminalFaker->execute([
                'userId' => $userId,
                'recordReason' => $resultat['infraction'],
                'recordDate' => $faker->dateTime()->format('Y-m-d H:i:s'),
                'recordDangerousness' => $resultat['categorie']
            ]);
        }
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function getInfraction()
{
    // Lire le contenu du fichier JSON en tant que chaîne
    $contenuJson = file_get_contents('Assets/json/recordReason.json');

    // Décoder la chaîne JSON en un tableau PHP associatif
    $tableauJson = json_decode($contenuJson, true);

    // Vérifier si le décodage JSON s'est bien passé
    if ($tableauJson === null) {
        // Gérer les erreurs de décodage JSON ici
        die('Erreur de décodage JSON.');
    }

    // Choisir aléatoirement une catégorie (Low, Medium, Severe)
    $categorieAleatoire = array_rand($tableauJson);

    // Choisir aléatoirement une infraction dans la catégorie sélectionnée
    $infractionAleatoire = $tableauJson[$categorieAleatoire][array_rand($tableauJson[$categorieAleatoire])];

    // Retourner la catégorie et l'infraction choisies
    return array(
        'categorie' => $categorieAleatoire,
        'infraction' => $infractionAleatoire['infraction']
    );
}

/* 
Lib de fonction pour génération chose récente
---------------------------------------------------
*/

function CreateRecentThing($pdo, $userId)
{
    $faker = Faker\Factory::Create();

    try {
        $query = "INSERT INTO recent(userId, recentDate, recentContent) 
        values (:userId, :recentDate, :recentContent)";

        $createFaker = $pdo->prepare($query);

        $recentContent = GetRecent();

        $createFaker->execute([
            'userId' => $userId,
            'recentDate' => $faker->dateTime()->format('Y-m-d H:i:s'),
            'recentContent' => $recentContent

        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

/* Obtenir un fait récent sur l'utilisateur faker */
function GetRecent()
{
    // Charger le contenu du fichier JSON des sanctions
    $jsonContent = file_get_contents('Assets\json\recent.json');

    // Vérifier si le chargement du fichier a réussi
    if ($jsonContent === false) {
        // Gérer l'erreur, par exemple en affichant un message ou en lançant une exception
        die('Erreur lors du chargement du fichier JSON');
    }

    // Décoder le JSON en tableau associatif
    $recentData = json_decode($jsonContent, true);

    // Vérifier si le décodage JSON a réussi
    if ($recentData === null) {
        // Gérer l'erreur, par exemple en affichant un message ou en lançant une exception
        die('Erreur lors du décodage du JSON');
    }

    // Extraire aléatoirement une information du tableau "recent"
    $recent = $recentData['recent'][array_rand($recentData['recent'])];

    // Retourner la valeur de la clé "thing"
    return $recent['thing'];
}

/* Obtenir le dernier faker crée */
function GetLastFaker($pdo, $userId) {
try {
        $query = "SELECT * FROM user WHERE userId = " . $userId;

        $selectFakerToSee = $pdo->prepare($query);

        $selectFakerToSee->execute([
            'userId' => $userId // récupération du paramètre
        ]);

        $fakerToSee = $selectFakerToSee->fetchAll(); // récupération d'un enregistrement

        return $fakerToSee;
    } catch (PDOException $e) {
        $message = $e->getmessage();
        die($message);
    }
}

function GetFakerCriminalRecordUser($pdo ,$userId) {
    try {
        $query = "SELECT * FROM criminal_record WHERE userId = " . $userId;

        $selectUserToTracking = $pdo->prepare($query);

        $selectUserToTracking->execute([
            'userId' => $userId // récupération du paramètre
        ]);

        $userCriminalRecord = $selectUserToTracking->fetchAll(); // récupération d'un enregistrement

        return $userCriminalRecord;
    } catch (PDOException $e) {
        $message = $e->getmessage();
        die($message);
    }
}

function GetFakerRecent($pdo ,$userId) {
    try {
        $query = "SELECT * FROM recent WHERE userId = " . $userId;

        $selectUserToTracking = $pdo->prepare($query);

        $selectUserToTracking->execute([
            'userId' => $userId // récupération du paramètre
        ]);

        $userRecentThing = $selectUserToTracking->fetch(); // récupération d'un enregistrement

        return $userRecentThing;
    } catch (PDOException $e) {
        $message = $e->getmessage();
        die($message);
    }
}