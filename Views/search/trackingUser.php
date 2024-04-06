<style>
    section {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-image: url('path/to/your/background-image.jpg');
        background-size: cover;
    }

    .divBasic {
        flex: 1;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    #profile-info {
        background-color: rgba(255, 255, 255, 0.8);
        padding: 20px;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    .white-square {
        width: 350px;
        height: 50px;
        background-color: white;
        margin: 0 auto;
        border: 1px solid black;
    }

    .flex-container {
        display: flex;
        justify-content: space-around;
        width: 100%;
        margin-top: 10px;
    }

    .buttonTracking {
        margin-top: 10px;
    }

    .profileImg {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        margin-right: 20px;
    }

    .buttonTracking {
        margin-top: 10px;
        background-color: #24C1F3;
        width: 800px;
        height: 125px;
        border: none;
        color: white;
        font-size: 24px;
        font-weight: bold;
        cursor: pointer;
    }

    .buttonTracking a {
        text-decoration: none;
        color: inherit;
        display: block;
        height: 100%;
        width: 100%;
        padding: 50px;
    }
</style>

<section>
    <!-- User profile information -->
    <div id="profile-info">
        <label for="name">Name</label>
        <div><?= $userSearched->userName ?> <?= $userSearched->userFirstName ?></div>

        <div>
            <div>
                <label for="gender">Gender</label>
                <div><?= $userSearched->userGenre ?></div>
            </div>
            <div>
                <label for="birthday">Birthday date</label>
                <div class="white-square"><?= $userSearched->userBirthDate ?></div>
            </div>
        </div>

        <label for="phone">Phone number</label>
        <div><?= $userSearched->userPhoneNumber ?></div>

        <label for="ethnicity">Ethnicity</label>
        <div><?= $userSearched->userEthnic ?></div>
        <div>
            <!-- Button to launch live tracking -->
            <button class="buttonTracking">
                <a href="/trackingLive?userId=<?= $userSearched->userId ?>">Launch live tracking by ctos</a>
            </button>
            <!-- Button to modify who's tracking if you're an andmin -->
            <?php if ($_SESSION['user'] -> userRole == "admin") : ?>
                <button class="buttonTracking">
                    <a href="/modifyProfil?userId=<?= $userSearched->userId ?>">Modify</a>
                </button>
            <?php endif ?>
        </div>
    </div>
    <!-- User profile image (round) -->
    <div>
        <?php 
            if (isset($_SESSION['user']) && $userSearched->userIsFaker == 1) {
                $profileImage = "../Assets/Pictures/fakerProfile/" . $userSearched->userProfileImage;
            } else {
                $profileImage = "../Assets/pictures/userProfile/" . $userSearched->userProfileImage;
            }
        ?>
        <img src="<?= htmlspecialchars($profileImage); ?>" alt="image de profil">
    </div>
</section>