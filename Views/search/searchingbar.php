<style>
    /* Style for the search form */
    #searchForm {
        display: flex;
        flex-direction: row;
        align-items: center; /* Centrer verticalement */
        justify-content: center; /* Centrer horizontalement */
        width: 85%; /* Set width to 85% of the container */
        margin: 0 auto; /* Centrer le formulaire horizontalement */
        margin-bottom: 20px; /* Ajouter un espace en bas du formulaire */
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
        background-color: #007bff; /* Change color as needed */
        color: white;
        cursor: pointer;
    }

    button[name="searchBTN"]:hover {
        background-color: #0056b3; /* Change color as needed */
    }

    .user-card {
        width: 60%; /* Définir la largeur des cartes à 60% */
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
    <!-- Barre de recherche -->
    <h2>Barre de recherche</h2>
    <div>
        <form id="searchForm" method="POST">
            <input type="text" name="searchText" placeholder="searching a name" value="">
            <button name="searchBTN">E</button>
        </form>
    </div>
    <div>
        <!-- Résultats de la recherche -->
        <h2>Résultats de la recherche :</h2>
        <div class="container">
            <?php if (!empty($results)) : ?>
                <div class="row">
                    <?php foreach ($results as $result) : ?>
                        <div class="col-md-4">
                            <a href="voiruser?userId=<?= $result->userId ?>" class="user-card-link">
                                <div class="user-card">
                                    <img src="<?= $result['userProfileImage']; ?>" alt="User Image" class="user-image">
                                    <div class="user-info">
                                        <h5>User ID: <?= $result['userId']; ?></h5>
                                        <p>Name: <?= $result['userName']; ?></p>
                                        <p>First Name: <?= $result['userFirstName']; ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <p>Aucun résultat trouvé.</p>
            <?php endif; ?>
        </div>
    </div>
</section>