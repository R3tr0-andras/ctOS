<form action="" method="post">
    <label for="Nom">Nom</label>
    <input type="text" id="Nom" name="Nom" value="<?= htmlspecialchars($userSearched->userName) ?>" required><br>

    <label for="Prenom">Prénom</label>
    <input type="text" id="Prenom" name="Prenom" value="<?= htmlspecialchars($userSearched->userFirstName) ?>" required><br>

    <label for="Pseudo">Pseudo</label>
    <input type="text" id="Pseudo" name="Pseudo" value="<?= htmlspecialchars($userSearched->userPseudo) ?>" required><br>

    <label for="Password">Mot de passe</label>
    <input type="text" id="Password" name="Password" value="<?= htmlspecialchars($userSearched->userPassword) ?>"<br>

    <label for="Mail">Email</label>
    <input type="email" id="Mail" name="Mail" value="<?= htmlspecialchars($userSearched->userEmail) ?>" required><br>

    <label for="Genre">Genre</label>
    <select id="Genre" name="Genre" required>
        <option value="M" <?= ($userSearched->userGenre === "M") ? "selected" : "" ?>>M</option>
        <option value="F" <?= ($userSearched->userGenre === "F") ? "selected" : "" ?>>F</option>
    </select><br>

    <label for="Date">Date de naissance</label>
    <input type="date" id="Date" name="Date" value="<?= htmlspecialchars($userSearched->userBirthDate) ?>" required><br>

    <label for="Tel">Numéro de téléphone</label>
    <input type="text" id="Tel" name="Tel" value="<?= htmlspecialchars($userSearched->userPhoneNumber) ?>" required><br>

    <label for="Ethnie">Ethnie</label>
    <input type="text" id="Ethnie" name="Ethnie" value="<?= htmlspecialchars($userSearched->userEthnic) ?>" required><br>

    <label for="Job">Emploi</label>
    <input type="text" id="Job" name="Job" value="<?= htmlspecialchars($userSearched->userJobs) ?>"><br>

    <label for="Income">Revenu</label>
    <input type="text" id="Income" name="Income" value="<?= htmlspecialchars($userSearched->userIncome) ?>"><br>

    <label for="ProfileImage">Image de profil</label>
    <input type="file" id="ProfileImage" name="ProfileImage" accept="image/*"><br>

    <button name="modifyBTN">Modifier le profil</button>
</form>
