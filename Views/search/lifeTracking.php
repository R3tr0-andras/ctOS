<style>
    section {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        padding: 20px;

    }

    .containerRecords {
        display: flex;
        align-items: center;
        justify-content: space-around;
        max-width: 1000px;
        width: 100%;
    }

    .criminal-records {
        flex: 1;
        display: flex;
        flex-direction: column;
        margin-right: 5%;
    }

    .profile-image-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-left: 5%;
    }

    .profile-image {
        width: 250px;
        height: 250px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 20px;
    }

    .threat-level {
        width: 100px;
        height: 50px;
        background-color: #FF0000;
        color: #FFF;
        text-align: center;
        line-height: 50px;
    }

    /* Style pour les enregistrements criminels */
    .criminal-records div {
        padding: 10px;
        display: flex;
        align-items: center;
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
        padding-right: 10px;
        color: white;
    }

    /* Style pour la dernière ligne des enregistrements */
    .criminal-records div:last-child {
        margin-bottom: 0;
    }

    .criminal-records h2 {
        background-color: <?= $couleurBackground; ?>;
        color: white;
        padding: 10px;
        display: flex;
        margin-bottom: 0;
    }

    .recent {
        background-color: #24C1F3;
        padding: 5px;
        margin: 5%;
    }

    .recent p {
        color: white;
    }
</style>
<section>
    <div class="containerRecords">
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
            <div class="recent">
                <p><?= $userRecentThing->recentContent; ?></p>
            </div>
        </div>
    </div>
</section>