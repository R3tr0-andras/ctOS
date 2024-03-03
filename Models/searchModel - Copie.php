<?php

//Connecter un utilisateur
function searching($pdo)
{
    try {
        if(isset($_POST['search']) and !empty($_POST['search'])){
            $searcher = htmlspecialchars($_POST['search']);

            $query = 'Select * from user where userName like "%'.$searcher.'%" order by userId desc';

            $searchUser = $pdo->prepare($query);

            $searchUser->execute();
        }
        $user = $searchUser->fetch();
        var_dump($user);

        if (!$user) {
            return false;
        } else {
            // Récupérer l'utilisateur trouvé
            return $user;
        }
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}