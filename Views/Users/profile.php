<style>
    section {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-image: url('path/to/your/background-image.jpg');
        background-size: cover;
    }

    div {
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

    button {
        margin-top: 10px;
    }

    .profileImg {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        margin-right: 20px;
    }

    button {
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

    button a {
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
        <button><a href="/tracking">Launch live tracking by ctos</a></button>
    </div>

    <!-- User profile image (round) -->
    <div>
        <img src="Assets\Pictures\fakerProfile\<?php echo $_SESSION['user']->userProfileImage; ?>" alt="" class="profileImg">
    </div>
</section>
