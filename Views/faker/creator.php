<form method="post" action="">
    <!-- Ajouter un bouton et un champ caché pour indiquer que le formulaire a été soumis -->
    <input type="hidden" name="startFaker" value="1">
    <button name="btnEnvoi">Démarrer la création</button>
</form>

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