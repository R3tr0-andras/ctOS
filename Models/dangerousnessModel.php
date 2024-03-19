<?php

/* Obtenir les infraction pour déterminer une couleur */
function getInfractions($pdo)
{
    try {
        // Récupérer l'ID de l'utilisateur à partir de la session
        $userId = $_GET["userId"];

        // Préparer la requête SQL pour récupérer uniquement la colonne recordDangerousness de l'utilisateur
        $query = "SELECT recordDangerousness FROM criminal_record WHERE userId = :userId";
        $co = $pdo->prepare($query);

        // Lier le paramètre userId à la requête préparée
        $co->bindParam(':userId', $userId, PDO::PARAM_INT);

        // Exécuter la requête préparée
        $co->execute();

        // Récupérer toutes les valeurs de la colonne recordDangerousness
        $dangerousness = $co->fetchAll(PDO::FETCH_COLUMN);

        // Retourner les niveaux de dangerosité récupérés
        return $dangerousness;

    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

/* Fonction pour calculer le pourcentage de criminalité en tenant compte du niveau de dangerosité des infractions */
function calculateCrimePercentage($pdo)
{
    try {
        
        // Récupérer les niveaux de dangerosité des infractions
        $dangerousness = getInfractions($pdo);

        // Compter le nombre total d'infractions
        $totalInfractions = count($dangerousness);

        // Compter le nombre d'infractions dans chaque niveau de dangerosité
        $countPerDangerousness = array_count_values($dangerousness);

        // Poids attribués à chaque niveau de dangerosité
        $weights = array(
            'Low' => 0.20,
            'Medium' => 0.30,
            'Severe' => 0.50
        );

        // Calculer le pourcentage global en tenant compte des poids
        $overallPercentage = 0;
        foreach ($countPerDangerousness as $dangerousness => $count) {
            $percentage = ($count / $totalInfractions) * 100;
            $overallPercentage += $percentage;
        }

        // Retourner le pourcentage global
        return $overallPercentage;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

/* Ceci était très casse pied, plus JAMAIS JE RETOUCHE A CA */
function getColorFromPercentage($pdo) {

    $percentage = calculateCrimePercentage($pdo);

    // Convertir le pourcentage en une valeur entre 0 et 255 pour représenter une composante RVB
    $rgb_value = round(($percentage / 100) * 255);

    // Pourcentage bas, renvoie une teinte de vert à rouge
    if ($percentage < 50) {
        // Valeur verte = maximale
        $green = 255; 
        // Augmente progressivement la valeur en rouge
        $red = $rgb_value * 2; 
    } 
    // Pourcentage haut, renvoie une teinte de rouge à vert
    else { 
        // Valeur en rouge = maximale
        $red = 255; 
        // Diminue progressivement la valeur en verte
        $green = 255 - ($rgb_value - 128) * 2; 
    }

    // Formater les composantes RVB en code hexadécimal
    // Merci la doc w3school, je vous aimes
    $red_hex = str_pad(dechex($red), 2, "0", STR_PAD_LEFT);
    $green_hex = str_pad(dechex($green), 2, "0", STR_PAD_LEFT);
    $blue_hex = "00"; // Pas de bleu

    return "#$red_hex$green_hex$blue_hex";
}