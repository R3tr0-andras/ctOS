<style>
    section {
        display: flex;
        align-items: center;
 
        justify-content: center;
     
        height: 100%;
       
        padding: 20px;
       
    }

    .container {
        display: flex;
        align-items: center;
        /* Centrage vertical */
        justify-content: space-around;
        /* Espace autour des éléments */
        max-width: 800px;
        /* Largeur maximale de la section */
        width: 100%;
        /* Largeur de la section */
    }

    .criminal-records {
        flex: 1;
        /* Laisser cette partie s'étirer */
        display: flex;
        flex-direction: column;
    }

    .profile-image-container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .profile-image {
        width: 250px;
        /* Largeur de l'image */
        height: 250px;
        /* Hauteur de l'image */
        border-radius: 50%;
        /* Rendre l'image ronde */
        object-fit: cover;
        /* Remplir l'espace tout en conservant le rapport hauteur/largeur */
        margin-bottom: 20px;
        /* Marge en bas de l'image */
    }

    .threat-level {
        width: 100px;
        /* Largeur du rectangle */
        height: 50px;
        /* Hauteur du rectangle */
        background-color: #FF0000;
        /* Couleur de fond du rectangle */
        color: #FFF;
        /* Couleur du texte */
        text-align: center;
        /* Centrage du texte */
        line-height: 50px;
        /* Centrage vertical du texte */
    }

    /* Style pour les enregistrements criminels */
    .criminal-records div {
        padding: 10px;
        /* Marge intérieure pour chaque enregistrement */
        display: flex;
        /* Utilisation de flexbox pour les éléments internes */
        align-items: center;
        /* Centrage vertical des éléments internes */
    }

    .criminal-records div:nth-child(odd) {
        background-color: #464646;
        /* impair */
    }

    .criminal-records div:nth-child(even) {
        background-color: #6A6A6A;
        /* pair */
    }

    .criminal-records div p {
        margin: 0;
        /* Supprimer les marges par défaut */
        padding-right: 10px;
        /* Ajouter un espacement entre la date et l'enregistrement */
        color: white;
    }

    /* Style pour la dernière ligne des enregistrements */
    .criminal-records div:last-child {
        margin-bottom: 0;
        /* Supprimer la marge basse pour le dernier enregistrement */
    }

    .criminal-records h2 {
        background-color: <?= $couleurBackground; ?>;
        color: white;
        padding: 10px;
        /* Marge intérieure pour chaque enregistrement */
        display: flex;
        /* Utilisation de flexbox pour les éléments internes */
        align-items: center;
        /* Centrage vertical des éléments internes */
        margin-bottom: 0;
    }
</style>

<section>
    <div class="container">
        <div class="criminal-records">
            <h2>Casier judiciaire</h2>
            <?php foreach ($criminalRecordUsers as $key => $criminalRecordUser) : ?>
                <div style="background-color: <?= $key % 2 == 0 ? '#464646' : '#6A6A6A'; ?>">
                    <p><?= $criminalRecordUser->recordDate; ?></p>
                    <p><?= $criminalRecordUser->recordReason; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="profile-image-container">
            <?php
            if (isset($_SESSION['user']) && $userSearched->userIsFaker == 1) {
                $profileImage = "../Assets/Pictures/fakerProfile/" . $userSearched->userProfileImage;
            } else {
                $profileImage = "../Assets/pictures/userProfile/" . $userSearched->userProfileImage;
            }
            ?>
            <img src="<?= htmlspecialchars($profileImage); ?>" alt="" class="profile-image">
            <div class="threat-level"><?= $crimePourcentage; ?> %</div>
        </div>
    </div>
</section>

<section>
    <p><?=$userRecentThing->recentContent; ?></p>
</section>