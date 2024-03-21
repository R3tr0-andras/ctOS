<style>
    /* Style for the search form */
    #searchForm {
        display: flex;
        flex-direction: row;
        align-items: center;
        /* Centrer verticalement */
        justify-content: center;
        /* Centrer horizontalement */
        width: 85%;
        /* Set width to 85% of the container */
        margin: 0 auto;
        /* Centrer le formulaire horizontalement */
        margin-bottom: 20px;
        /* Ajouter un espace en bas du formulaire */
    }

    input[type="text"] {
        flex: 1;
        padding: 8px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-right: 5px;
    }

    button[name="searchBTN"] {
        padding: 8px 12px;
        border: none;
        border-radius: 5px;
        background-color: #007bff;
        /* Change color as needed */
        color: white;
        cursor: pointer;
    }

    button[name="searchBTN"]:hover {
        background-color: #0056b3;
        /* Change color as needed */
    }

    .user-card {
        width: 60%;
        /* Définir la largeur des cartes à 60% */
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        margin: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        display: flex;
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
        margin-bottom: 5px;
    }
</style>
<section>
    <img src="Assets\Pictures\ctos_2_0_search.png" alt="">
    <div>
        <form id="searchForm" method="POST">
            <input type="text" name="searchText" placeholder="searching a name" value="">
            <button name="searchBTN">Search</button>
        </form>
    </div>
    <div>
        <!-- Résultats de la recherche -->
        <h2>Résultats de la recherche :</h2>
        <div class="container">
            <?php if (!empty($results)) : ?>
                <div class="row">
                    <?php var_dump($results) ?>
                    <?php foreach ($results as $result) : ?>
                        <div class="col-md-4">
                            <div class="user-card">
                                <a href="trackingUser?userId=<?= $result->userId ?>">
                                    <img src="<?= $result->userProfileImage; ?>" alt="User Image" class="user-image">
                                </a>
                                <div class="user-info">
                                    <h5>
                                        <a href="trackingUser?userId=<?= $result->userId ?>">User ID: <?= $result->userId; ?></a>
                                    </h5>
                                    <p>Name: <?= $result->userName; ?></p>
                                    <p>First Name: <?= $result->userFirstName; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <p>Aucun résultat trouvé.</p>
            <?php endif; ?>
        </div>
    </div>
</section>