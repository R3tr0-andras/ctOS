<?php

require 'vendor/autoload.php';

/* 
Fonction de création des ustilisateurs faker
--------------------------------------------
But : creer des éléments dans la table user
*/

global $fakeUserIds;

function CreateFaker($pdo)
{
    $faker = Faker\Factory::create();

    try {
        $query = "INSERT INTO user(userName, userFirstName, userPseudo, userPassword, userEmail, userRole, userGenre, userBirthDate, userPhoneNumber, userEthnic, userJobs, userIncome, userIsFaker ) 
            VALUES (:userName, :userFirstName, :userPseudo, :userPassword, :userEmail, :userRole, :userGenre, :userBirthDate, :userPhoneNumber, :userEthnic, :userJobs, :userIncome, :userIsFaker )";

        $createFaker = $pdo->prepare($query);

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
    // Chemin vers le fichier JSON contenant les ethnies
    $cheminFichier = '../Assets/json/ethnicity.json';

    // Vérifier si le fichier existe
    if (!file_exists($cheminFichier)) {
        return null; // ou une valeur par défaut, selon vos besoins
    }

    // Lire le contenu du fichier JSON
    $contenuFichier = file_get_contents($cheminFichier);

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

/* 
Lib de fonction pour génération de casier criminel pour faker 
------------------------------------------------------------
*/

function CreateCriminalFaker($pdo, $userId)
{
    $faker = Faker\Factory::Create();
    //var_dump($userId);

    try {

        $query = "insert into criminal_record (userId, recordReason, recordDate, recordDangerousness) 
            values (:userId, :recordReason, :recordDate, :recordDangerousness)";

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
    var_dump($userId);

    try {
        $query = "insert into recent(userId, recentDate, recentContent) 
        values (:userId, :recentDate, :recentContent)";

        $createFaker = $pdo->prepare($query);

        $recent = GetRecent();

        $createFaker->execute([
            'userId' => $userId,
            'recentDate' => $faker->dateTime()->format('Y-m-d H:i:s'),
            'recentContent' => $recent['data']

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

    // Extraire aléatoirement une information du tableau
    $recent['data'] = $recentData[array_rand($recentData)];
    var_dump($recent);
    return $recent;
}
