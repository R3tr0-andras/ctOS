<style>

        .sectionProfile-info {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url('path/to/your/background-image.jpg');
            background-size: cover;
            padding: 20px;
        }

        #profile-info {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 600px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .white-square {
            width: 100%;
            padding: 10px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
        }

        .flex-container {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-top: 15px;
        }

        .buttonToTracking {
            width: 100%;
            text-align: center;
            margin-top: 20px;
        }

        .buttonToTracking button {
            background-color: #24C1F3;
            padding: 15px;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .buttonToTracking button:hover {
            background-color: #1a90bb;
        }

        .profileImg {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-top: 20px;
        }
    </style>
<section class="sectionProfile-info">
        <!-- User profile information -->
        <div id="profile-info">
            <label for="name">Name</label>
            <div class="white-square"><?= $_SESSION['user']->userName ?> <?= $_SESSION['user']->userFirstName ?></div>

            <div class="flex-container">
                <div>
                    <label for="gender">Gender</label>
                    <div class="white-square"><?= $_SESSION['user']->userGenre ?></div>
                </div>
                <div>
                    <label for="birthday">Birthday date</label>
                    <div class="white-square"><?= $_SESSION['user']->userBirthDate ?></div>
                </div>
            </div>

            <label for="phone">Phone number</label>
            <div class="white-square"><?= $_SESSION['user']->userPhoneNumber ?></div>

            <label for="ethnicity">Ethnicity</label>
            <div class="white-square"><?= $_SESSION['user']->userEthnic ?></div>

            <!-- Button to launch live tracking -->
            <div class="buttonToTracking">
                <button><a href="/tracking">Launch live tracking by ctos</a></button>
            </div>
        </div>
        <!-- User profile image (round) -->
        <div>
            <?php 
                if (isset($_SESSION['user']) && $_SESSION['user']->userIsFaker == 1) {
                    $profileImage = "../Assets/Pictures/fakerProfile/" . $_SESSION['user']->userProfileImage;
                } else {
                    $profileImage = "../Assets/pictures/userProfile/" . $_SESSION['user']->userProfileImage;
                }
            ?>
            <img src="<?= htmlspecialchars($profileImage); ?>" alt="" class="profileImg">
        </div>
    </section>