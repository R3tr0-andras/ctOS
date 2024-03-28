<style>
    .criminal-records h2 {
    background-color: <?= $couleurBackground; ?>;
}
</style>
<section class="sectionTrack">
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