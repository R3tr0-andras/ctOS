<style>
    /* barre de recherche */
#searchForm {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 85%;
    margin: 0 auto;
    margin-bottom: 20px;
}

input[type="text"] {
    flex: 1;
    padding: 8px;
    border-radius: 25px;
    border: 1px solid white;
    margin-bottom: 5px; 
    background-color: transparent;
}

button[name="searchBTN"] {
    width: 50%; 
    margin-top: 5px;
    padding: 8px 12px;
    border: none;
    border-radius: 5px;
    background-color: #24C1F3;
    color: white;
    cursor: pointer;
}

button[name="searchBTN"]:hover {
    background-color: #55EC77;
}
    /* résultat de recherche */

    .user-card {
        width: 500px;
        margin: auto;
        display: flex;
        align-items: center;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        margin: 10px auto;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    .user-image {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .user-info {
        flex-grow: 1;
    }

    .user-info h5 {
        margin-top: 0;
    }

    .user-info p {
        margin: 0;
    }

    .user-info p span {
        font-weight: bold;
        margin-right: 5px;
    }

    .title {
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .results-container {
        display: flex;
        justify-content: center;
        margin: 0 auto;
    }

    /* image au dessus de la barre de recherche */

    .image-container {
        text-align: center;
        margin-bottom: 20px;
    }

    .image-container img {
        display: inline-block;
    }
    
</style>
<section>
    <div class="image-container">
        <img src="Assets\Pictures\ctos_2_0_search.png" alt="">
    </div>
    <div>
        <form id="searchForm" method="POST">
            <input type="text" name="searchText" placeholder="searching a name" value="" class="searchBar">
            <button name="searchBTN">Search</button>
        </form>
    </div>
    <div class="results-container">
        <div class="container">
            <?php if (!empty($results)) : ?>
                <!-- Résultats de la recherche -->
                <h2 class="title">Résultats de la recherche :</h2>
                <div>
                    <?php foreach ($results as $result) : ?>
                        <div>
                            <div class="user-card">
                                <?php
                                    if ($result->userIsFaker == 1) {
                                        $profileImage = "../Assets/Pictures/fakerProfile/" . $result->userProfileImage;
                                    } else {
                                        $profileImage = "../Assets/pictures/userProfile/" . $result->userProfileImage;
                                    }
                                ?>
                                <a href="trackingUser?userId=<?= $result->userId ?>">
                                    <img src="<?= $profileImage; ?>" alt="Image de l'utilisateur" class="user-image">
                                </a>
                                <div class="user-info">
                                    <h5>
                                        <a href="trackingUser?userId=<?= $result->userId ?>">ID Utilisateur: <?= $result->userId; ?></a>
                                    </h5>
                                    <p><span>Nom:</span> <?= $result->userName; ?></p>
                                    <p><span>Prénom:</span> <?= $result->userFirstName; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>