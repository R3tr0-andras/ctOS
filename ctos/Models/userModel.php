<?php

/* 
Fonction de sélection des ustilisateurs 
---------------------------------------
But : récupérer toutes les infos de la table user
*/

function SelectAllUsers($pdo)
{

   
}

function SelectUsersBySearch($pdo, $searchTerm)
{
    
}

//Créer un utilisateur
function CreateUser($pdo)
{
    
}


//Connecter un utilisateur
function connexionUser($pdo)
{
    try {
        $query = "select * from user where userPseudo=:userPseudo and userEmail=:userEmail and userPassword=:userPassword";
        $connectUser = $pdo->prepare($query);
        $connectUser->execute([
            'userPseudo' => $_POST['pseudo'],
            'userEmail' => $_POST['email'],
            'userPassword' => $_POST['password'],
        ]);
        $user = $connectUser->fetch();
        //var_dump($user);
        if (!$user) {
            // L'utilisateur n'existe pas
            return false;
        } else {
            // Vérifier le mot de passe
            if (password_verify($_POST['password'], $user['userPassword'])) {
                // Mot de passe correct, connecter l'utilisateur
                $_SESSION['user'] = $user;
                return true;
            } else {
                // Mot de passe incorrect
                return false;
            }
        }

    } catch (PDOException $e) {
        $message = $e->getmessage();
        die($message);
    }
}



//Modifier un utilisateur
function modifyUser($pdo, $userId)
{
    
}


//Supprimer un utilisateur
function deleteUser($pdo, $userId)
{
    
}
