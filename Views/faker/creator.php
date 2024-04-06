<form method="post" action="">
    <!-- Ajouter un bouton et un champ caché pour indiquer que le formulaire a été soumis -->
    <input type="hidden" name="startFaker" value="1">
    <button name="btnEnvoi">Démarrer la création</button>
</form>

<?php if (!empty($newfakerResult)) : ?>
    <!-- Résultats de la recherche -->
    <h2 class="title">Résultats de la recherche :</h2>
    <div>
        <div>
            <div class="user-card">
                <?php
                if ($newfakerResult->userIsFaker == 1) {
                    $profileImage = "../Assets/Pictures/fakerProfile/" . $newfakerResult->userProfileImage;
                } else {
                    $profileImage = "../Assets/pictures/userProfile/" . $newfakerResult->userProfileImage;
                }
                ?>
                <a href="trackingUser?userId=<?= $result->userId ?>">
                    <img src="<?= $profileImage; ?>" alt="Image de l'utilisateur" class="user-image">
                </a>
                <div class="user-info">
                    <h5>
                        <a href="trackingUser?userId=<?= $newfakerResult->userId ?>">ID Utilisateur: <?= $newfakerResult->userId; ?></a>
                    </h5>
                    <p><span>Nom:</span> <?= $newfakerResult->userName; ?></p>
                    <p><span>Prénom:</span> <?= $newfakerResult->userFirstName; ?></p>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>