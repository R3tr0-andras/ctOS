<style>
    .criminal-records h2 {
        background-color: <?= $couleurBackground; ?>;
    }
</style>
<?php
if (isset($_SESSION['user']) && $userSearched->userIsFaker == 1) {
    $profileImage = "../Assets/Pictures/fakerProfile/" . $userSearched->userProfileImage;
} else {
    $profileImage = "../Assets/pictures/userProfile/" . $userSearched->userProfileImage;
}
?>
<!-- si est vide -->
<?= var_dump($criminalRecordUsers); ?>
<?php if (empty($criminalRecordUsers)) : ?>
    <section class="">
        <div>
            <h2>Le casier judiciaire est vierge</h2>
        </div>
        <!-- Button to modify who's tracking if you're an andmin -->
        <?php if ($_SESSION['user']->userRole == "admin") : ?>
            <button class="buttonTracking">
                <a href="/setCriminalRecord?userId=<?= $userSearched->userId ?>">Ajouter</a>
            </button>
        <?php endif ?>
    </section>
    <!-- si n'est pas vide -->
<?php else : ?>
    <section class="sectionTrack">
        <div class="containerRecords">
            <div class="criminal-records">
                <h2>Casier judiciaire</h2>
                <?php foreach ($criminalRecordUsers as $key => $criminalRecordUser) : ?>
                    <div style="background-color: <?= $key % 2 == 0 ? '#464646' : '#6A6A6A'; ?>">
                        <input type="text" value="<?= htmlspecialchars($criminalRecordUser->recordDate); ?>" placeholder="<?= htmlspecialchars($criminalRecordUser->recordDate); ?>" disabled>
                        <input type="text" value="<?= htmlspecialchars($criminalRecordUser->recordReason); ?>" placeholder="<?= htmlspecialchars($criminalRecordUser->recordReason); ?>" disabled>
                        <!-- Button to modify who's tracking if you're an admin -->
                        <?php if (isset($_SESSION['user']) && $_SESSION['user']->userRole == "admin") : ?>
                            <button class="">Modifier</button>
                            <button class="" value="DeleteCriminalRecord" onclick="DeleteCriminalRecord($criminalRecordUser)">Supprimer</button>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="profile-image-container">
                <img src="<?= htmlspecialchars($profileImage); ?>" alt="" class="profile-image">
                <div class="threat-level"><?= htmlspecialchars($crimePourcentage); ?> %</div>
                <div class="recent">
                    <p><?= htmlspecialchars($userRecentThing->recentContent); ?></p>
                </div>
            </div>
        </div>

    </section>
<?php endif; ?>