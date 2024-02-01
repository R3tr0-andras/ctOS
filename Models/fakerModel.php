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
        $query = "insert into user(userName, userFirstName, userPseudo, userPassword, userEmail, userRole, userGenre, userBirthDate, userPhoneNumber, userEthnic, userJobs, userIncome, userIsFaker ) 
        values (:userName,:userFirstName,:userPseudo,:userPassword,:userEmail,:userRole, :userGenre, :userBirthDate, :userPhoneNumber, :userEthnic, :userJobs, :userIncome, :userIsFaker )";

        $createFaker = $pdo->prepare($query);

        $genre = GenderGenerate();
        $ethnic = getRandomEthnicity();
        $jobRandom = getRandomJob();
        $jobRandomWithSalary = getRandomJobWithSalary();
        $phoneNumber = generateRandomPhoneNumber();

        $createFaker->execute([
            'userPseudo' => $faker->lastName() . "-" . $faker->firstName(),
            'userEmail' => $faker->email(),
            'userPassword' => $faker->password(2, 16),
            'userName' =>  $faker->lastName(),
            'userFirstName' => $faker->firstName(),
            'userGenre' => $genre,
            'userBirthDate' => $faker->dateTime(),
            'userPhoneNumber' => $phoneNumber,
            'userEthnic' => $ethnic,
            'userJobs' => $jobRandom,
            'userIncome' => $jobRandomWithSalary,
            'userRole' => 'user',
            'userIsFaker' => '1'
        ]);

        // obtenir le dernier id 
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

    // Lire le contenu du fichier JSON
    $contenuFichier = file_get_contents($cheminFichier);

    // Décoder le JSON en tableau associatif
    $ethnies = json_decode($contenuFichier, true);

    // Extraire une ethnie au hasard
    $ethnic = $ethnies['ethnies'][array_rand($ethnies['ethnies'])];

    return $ethnic;
}

/* Obtenir un emplois depuis une liste en json */
function getRandomJob()
{
    // Chemin vers le fichier JSON contenant les emplois
    $cheminFichier = '../Assets\json\work.json';

    // Lire le contenu du fichier JSON
    $contenuFichier = file_get_contents($cheminFichier);

    // Décoder le JSON en tableau associatif
    $emplois = json_decode($contenuFichier, true);

    // Vérifier si la clé 'emplois' existe dans le tableau
    if (isset($emplois['emplois']) && is_array($emplois['emplois']) && count($emplois['emplois']) > 0) {
        // Choisir un indice au hasard
        $randomIndex = array_rand($emplois['emplois']);

        // Récupérer le nom de l'emploi correspondant à l'indice choisi
        $jobRandom = $emplois['emplois'][$randomIndex]['nom'];

        // Retourner l'emploi au format demandé
        return $jobRandom;
    } else {
        // Retourner une chaîne vide si la clé 'emplois' n'existe pas ou est vide
        return null;
    }
}

/* Obtenir un emplois depuis une liste en json */
function getRandomJobWithSalary()
{
    // Chemin vers le fichier JSON contenant les emplois
    $cheminFichier = '../Assets\json\work.json';

    // Lire le contenu du fichier JSON
    $contenuFichier = file_get_contents($cheminFichier);

    // Décoder le JSON en tableau associatif
    $emplois = json_decode($contenuFichier, true);

    // Vérifier si la clé 'emplois' existe dans le tableau
    if (isset($emplois['emplois']) && is_array($emplois['emplois']) && count($emplois['emplois']) > 0) {
        // Choisir un indice au hasard
        $randomIndex = array_rand($emplois['emplois']);

        // Récupérer les informations sur l'emploi correspondant à l'indice choisi
        $jobInfo = $emplois['emplois'][$randomIndex];

        // Générer un nombre aléatoire dans l'intervalle du salaire minimal et maximal
        $jobRandomWithSalary = rand($jobInfo['salaire_min'], $jobInfo['salaire_max']);

        return $jobRandomWithSalary;
    } else {
        // Retourner une chaîne vide si la clé 'emplois' n'existe pas ou est vide
        return null;
    }
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

    $userId = CreateFaker($userId);

    try {

        // Obtenir un nombre aléatoire entre 0 et 13
        $repeatCount = rand(0, 13);

        for ($$i = 0; $i < $repeatCount; $i++) {
            $query = "insert into criminal_record (userId, recordReason, recordDate, recordWarn, recordDangerousness) 
            values (:userId,:recordReason, :recordDate, :recordWarn, :recordDangerousness";

            $CriminalFaker = $pdo->prepare($query);

            $infraction = getInfraction();
            $severity = $infraction['severity'];
            $warning = getSanction($severity);

            $CriminalFaker->execute([
                'userId' => $userId,
                'recordReason' => $infraction['infraction'],
                'recordDate' => $faker->dateTime(),
                'recordWarn' => $warning,
                'recordDangerousness' => $infraction['severity']
            ]);
        }
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

/* Obtenir une infraction */
function getInfraction()
{
    // Charger le contenu du fichier JSON
    $jsonContent = file_get_contents('../Assets\json\recordReason.json');

    // Décoder le JSON en tableau associatif
    $infractionsData = json_decode($jsonContent, true);

    // Choisir une catégorie d'infraction en fonction de la probabilité
    $randomPercentage = rand(0, 99);
    $selectedCategory = null;

    if ($randomPercentage < 5) {
        $selectedCategory = "Severe";
    } elseif ($randomPercentage < 20) {
        $selectedCategory = "Medium";
    } elseif ($randomPercentage < 60) {
        $selectedCategory = "Low";
    }

    // Si une catégorie a été déterminée, choisir une infraction aléatoire dans cette catégorie
    if ($selectedCategory !== null && isset($infractionsData[$selectedCategory]) && is_array($infractionsData[$selectedCategory])) {
        $selectedInfraction = $infractionsData[$selectedCategory][array_rand($infractionsData[$selectedCategory])];
    }

    return [
        "infraction" => $selectedInfraction['infraction'],
        "severity" => $selectedCategory
    ];
}

/* Obtenir une sanction pour le crime */
function getSanction($severity)
{
    // Charger le contenu du fichier JSON des sanctions
    $jsonContent = file_get_contents('../Assets\json\warn.json');

    // Décoder le JSON en tableau associatif
    $sanctionsData = json_decode($jsonContent, true);

    // Vérifier si la sévérité est présente dans le tableau des sanctions
    if (isset($sanctionsData[$severity]) && is_array($sanctionsData[$severity])) {
        // Choisir une sanction aléatoire dans la catégorie de sévérité
        $selectedSanction = $sanctionsData[$severity][array_rand($sanctionsData[$severity])];

        // Retourner la sanction
        return $selectedSanction['sanction'];
    } else {
        // Retourner une valeur par défaut en cas d'erreur
        return "Sanction non spécifiée";
    }
}

/* 
Lib de fonction pour génération chose récente
---------------------------------------------------
*/

function CreateRecentThing ($pdo, $userId) {

    $faker = Faker\Factory::Create();

    $userId = CreateFaker($userId);

    try {
        $query = "insert into recent(userId, recentDate, recentContent) 
        values (:userId, :recentDate, :recentContent)";

        $createFaker = $pdo->prepare($query);

        $recent = GetRecent();

        $createFaker->execute([
            'userId' => $userId,
            'recentDate' => $faker->dateTime(),
            'recentContent' => $recent
            
        ]);

        // obtenir le dernier id 
        $userId = $pdo->lastInsertId();

        return $userId;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }

}

/* Obtenir un fait récent sur l'utilisateur faker */
function GetRecent () {
    // Charger le contenu du fichier JSON des sanctions
    $jsonContent = file_get_contents('../Assets\json\recent.json');

    // Décoder le JSON en tableau associatif
    $recentData = json_decode($jsonContent, true);

    // Extraire aléatoirement une information du tableau
    $recent = $recentData[array_rand($recentData)];

    return $recent;
}