<?php
// Fonction pour générer un tableau avec les pourcentages et les couleurs
function generateCrimeTable($totalInfractions, $highCriminality, $mediumCriminality, $lowCriminality) {
    // Calcul des pourcentages
    $percentageHigh = calculatePercentage($totalInfractions, $highCriminality);
    $percentageMedium = calculatePercentage($totalInfractions, $mediumCriminality);
    $percentageLow = calculatePercentage($totalInfractions, $lowCriminality);

    // Attribution des couleurs
    $colorHigh = determineColor('Haute');
    $colorMedium = determineColor('Moyenne');
    $colorLow = determineColor('Basse');

    // Construction du tableau associatif
    $crimeTable = array(
        'Haute' => array(
            'percentage' => $percentageHigh,
            'color' => $colorHigh
        ),
        'Moyenne' => array(
            'percentage' => $percentageMedium,
            'color' => $colorMedium
        ),
        'Basse' => array(
            'percentage' => $percentageLow,
            'color' => $colorLow
        )
    );

    return $crimeTable;
}

/* Obtenir les infraction pour déterminer une couleur */
function getInfractions($pdo) {
    // Vérifier si userId est défini dans la session
    if(isset($_SESSION["userId"])) {
        $userId = $_SESSION["userId"];

        // Échapper les données pour éviter les injections SQL
        $escapedUserId = $pdo->real_escape_string($userId);
        
        // Construction de la requête SQL
        $query = "SELECT * FROM criminal_record WHERE userId = $escapedUserId";

        // Exécution de la requête
        $result = $pdo->query($query);

        // Vérification s'il y a des résultats
        if ($result->num_rows > 0) {
            // Tableau pour stocker les résultats
            $infractions = array();

            // Récupération des résultats
            while ($row = $result->fetch_assoc()) {
                $infractions[] = $row;
            }

            return $infractions;
        } else {
            // Aucune infraction trouvée
            return array();
        }
    } else {
        // userId n'est pas défini dans la session
        return array();
    }
}

function countAndAssessCriminality($infractions) {
    // Initialisation des compteurs
    $totalInfractions = count($infractions);
    $highCriminality = 0;
    $mediumCriminality = 0;
    $lowCriminality = 0;

    // Parcours des infractions pour évaluer leur degré de criminalité
    foreach ($infractions as $infraction) {
        switch ($infraction['recordDangerousness']) {
            case 'Haute':
                $highCriminality++;
                break;
            case 'Moyenne':
                $mediumCriminality++;
                break;
            case 'Basse':
                $lowCriminality++;
                break;
            default:
                break;
        }
    }

    // Construction du résultat sous forme d'array associatif
    $result = array(
        'totalInfractions' => $totalInfractions,
        'highCriminality' => $highCriminality,
        'mediumCriminality' => $mediumCriminality,
        'lowCriminality' => $lowCriminality
    );

    return $result;
}

function calculatePercentage($total, $part) {
    if ($total == 0) {
        return 0;
    } else {
        return ($part / $total) * 100;
    }
}

// Fonction pour déterminer la couleur en fonction du degré de criminalité
function determineColor($criminalityLevel) {
    switch ($criminalityLevel) {
        case 'Haute':
            return 'red';
        case 'Moyenne':
            return 'orange';
        case 'Basse':
            return 'green';
        default:
            return 'black'; // Couleur par défaut si le niveau n'est pas reconnu
    }
}