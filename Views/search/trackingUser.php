<section class="trackSect">
    <!-- User profile information -->
    <div id="profile-info">
        <!-- Profile information content -->
        <label for="name">Name</label>
        <div class="user-data"><?= $userSearched->userName ?> <?= $userSearched->userFirstName ?></div>

        <div>
            <div>
                <label for="gender">Gender</label>
                <div class="user-data"><?= $userSearched->userGenre ?></div>
            </div>
            <div>
                <label for="birthday">Birthday date</label>
                <div class="user-data"><?= $userSearched->userBirthDate ?></div>
            </div>
        </div>

        <label for="phone">Phone number</label>
        <div class="user-data"><?= $userSearched->userPhoneNumber ?></div>

        <label for="ethnicity">Ethnicity</label>
        <div class="user-data"><?= $userSearched->userEthnic ?></div>
        <div>
            <!-- Button to launch live tracking -->
            <button class="buttonTracking">
                <a href="/trackingLive?userId=<?= $userSearched->userId ?>">Launch live tracking by ctos</a>
            </button>
            <!-- Button to modify who's tracking if you're an admin -->
            <?php if ($_SESSION['user']->userRole == "admin") : ?>
                <button class="buttonTracking">
                    <a href="/modifyProfil?userId=<?= $userSearched->userId ?>">Modify</a>
                </button>
            <?php endif ?>
        </div>
    </div>
    <!-- User profile image  -->
    <div class="imageP-container">
        <?php 
            if (isset($_SESSION['user']) && $userSearched->userIsFaker == 1) {
                $profileImage = "../Assets/Pictures/fakerProfile/" . $userSearched->userProfileImage;
            } else {
                $profileImage = "../Assets/pictures/userProfile/" . $userSearched->userProfileImage;
            }
        ?>
        <img src="<?= htmlspecialchars($profileImage); ?>" alt="image de profil" class="imgProfil">
    </div>
</section>