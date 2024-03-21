<style>

</style>

<section>
    <div>
        <div></div>
        <?php foreach ($criminalRecordUsers as $criminalRecordUser) : ?>
            <div>
                <p><?= $criminalRecordUser->recordDate; ?></p>
                <p><?= $criminalRecordUser->recordReason; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <div>
        <?php
        if (isset($_SESSION['user']) && $userSearched->userIsFaker == 1) {
            $profileImage = "../Assets/Pictures/fakerProfile/" . $userSearched->userProfileImage;
        } else {
            $profileImage = "../Assets/pictures/userProfile/" . $userSearched->userProfileImage;
        }
        ?>
        <img src="<?= htmlspecialchars($profileImage); ?>" alt="" class="profileImg">
    </div>
</section>