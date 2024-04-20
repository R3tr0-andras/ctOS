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
                        <form method="post">
                            <input type="text" value="<?= htmlspecialchars($criminalRecordUser->recordDate); ?>" name="recordDate" placeholder="<?= htmlspecialchars($criminalRecordUser->recordDate); ?>">
                            <input type="text" value="<?= htmlspecialchars($criminalRecordUser->recordReason); ?>" name="recordReason" placeholder="<?= htmlspecialchars($criminalRecordUser->recordReason); ?>">
                            <!--  -->
                            <?php if (isset($_SESSION['user']) && $_SESSION['user']->userRole == "admin") : ?>
                                <button class="buttonTracking" name="ModBTN" value="<?= $criminalRecordUser->recordId ?>">Modifier</button>
                                <button class="buttonTracking" name="DelBTN" value="<?= $criminalRecordUser->recordId ?>">Supprimer</button>
                            <?php endif; ?>
                        </form>
                    </div>
                <?php endforeach; ?>
                <!-- Button to modify who's tracking if you're an andmin -->
                <?php if ($_SESSION['user']->userRole == "admin") : ?>
                    <button class="buttonTracking">
                        <a href="/setCriminalRecord?userId=<?= $userSearched->userId ?>">Ajouter</a>
                    </button>
                <?php endif ?>
            </div>
            <div class="profile-image-container">
                <img src="<?= htmlspecialchars($profileImage); ?>" alt="" class="profile-image">
                <?php if (!empty($crimePourcentage)) : ?>
                    <div class="threat-level"><?= htmlspecialchars($crimePourcentage); ?> %</div>
                <?php endif; ?>
                <div class="recent">
                    <form method="post">
                        <?php if (!empty($userRecentThing) && !empty($userRecentThing->recentContent)) : ?>
                            <?php $recentContent = !empty($userRecentThing->recentContent) ? htmlspecialchars($userRecentThing->recentContent) : ''; ?>
                            <input type="text" value="<?= $recentContent ?>" name="recentContentMod">
                            <button class="buttonTracking" name="RecentModBTN" value="<?= !empty($userRecentThing) ? $userRecentThing->recentId : '' ?>">Modifier</button>
                        <?php else : ?>
                            <input type="text" placeholder="Ajouter du contenu..." name="recentContentAdd">
                            <button class="buttonTracking" name="RecentAddBTN">Ajouter</button>
                        <?php endif; ?>
                        <button class="buttonTracking" name="RecentDelBTN" value="<?= !empty($userRecentThing) ? $userRecentThing->recentId : '' ?>">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>