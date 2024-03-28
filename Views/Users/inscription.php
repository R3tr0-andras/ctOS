<form class="formCoAndIn" method="post" action="">
    <h1 class="titreForm">Page d'inscription aux serveurs du CtOS 2.0</h1>
    <!-- Prénom, Nom de famille et Pseudo en ligne -->
    <div class="form-row">
        <div>
            <label class="labelFormCoAndIn" for="FirstName">First Name</label>
            <input type="text" placeholder="First Name" id="FName" name="Prenom" maxlength="30" value="">
            <?php if (isset($messageErreur["Prenom"])) : ?>
                <small><?= $messageErreur["Prenom"] ?></small>
            <?php endif ?>
        </div>
        <div>
            <label class="labelFormCoAndIn" for="Nom">Last Name</label>
            <input type="text" placeholder="Last Name" id="LName" name="Nom" maxlength="30" value="">
            <?php if (isset($messageErreur["Nom"])) : ?>
                <small><?= $messageErreur["Nom"] ?></small>
            <?php endif ?>
        </div>
        <div>
            <label class="labelFormCoAndIn" for="Pseudo">Nickname</label>
            <input type="text" placeholder="Nickname" id="NName" name="Pseudo" maxlength="30" value="">
            <?php if (isset($messageErreur["Pseudo"])) : ?>
                <small><?= $messageErreur["Pseudo"] ?></small>
            <?php endif ?>
        </div>
    </div>
    <!-- Email et Mot de passe -->
    <div class="form-row">
        <div>
            <label class="labelFormCoAndIn" for="Mail">Email Address</label>
            <input type="email" placeholder="Email" id="EMail" name="Mail" maxlength="100" value="">
            <?php if (isset($messageErreur["Mail"])) : ?>
                <small><?= $messageErreur["Mail"] ?></small>
            <?php endif ?>
        </div>
        <div>
            <label class="labelFormCoAndIn" for="mot-de-passe">Password</label>
            <input type="password" placeholder="Password" id="Password" name="Password" minlength="8" maxlength="64" value="">
            <?php if (isset($messageErreur["Password"])) : ?>
                <small><?= $messageErreur["Password"] ?></small>
            <?php endif ?>
        </div>
    </div>
    <!-- Genre et Date de Naissance-->
    <div class="form-row">
        <div>
            <label class="labelFormCoAndIn" for="Genre">Gender</label>
            <select name="Genre" id="Genre">
                <option value="M">M</option>
                <option value="F">F</option>
            </select>
            <?php if (isset($messageErreur["Genre"])) : ?>
                <small><?= $messageErreur["Genre"] ?></small>
            <?php endif ?>
        </div>
        <div>
            <label class="labelFormCoAndIn" for="Date-de-naissance">Birthday Date</label>
            <input type="date" placeholder="Birthday Date" id="Date" name="Date" value="">
            <?php if (isset($messageErreur["Date"])) : ?>
                <small><?= $messageErreur["Date"] ?></small>
            <?php endif ?>
        </div>
    </div>
    <!-- Job et Salaire -->
    <div class="form-row">
        <div>
            <label class="labelFormCoAndIn" for="Travail">Job</label>
            <input type="text" placeholder="Job" id="Job" name="Job" value="">
            <?php if (isset($messageErreur["Job"])) : ?>
                <small><?= $messageErreur["Job"] ?></small>
            <?php endif ?>
        </div>
        <div>
            <label class="labelFormCoAndIn" for="Salaire">Income</label>
            <input type="number" placeholder="Income" id="Income" name="Income" value="">
            <?php if (isset($messageErreur["Income"])) : ?>
                <small><?= $messageErreur["Income"] ?></small>
            <?php endif ?>
        </div>
    </div>
    <!-- Etnie et Numéro de téléphone -->
    <div class="form-row">
        <div>
            <label class="labelFormCoAndIn" for="Etnie">Ethnic Group</label>
            <input type="text" placeholder="Ethnic Group" id="Ethnie" name="Ethnie" value="">
            <?php if (isset($messageErreur["Ethnie"])) : ?>
                <small><?= $messageErreur["Ethnie"] ?></small>
            <?php endif ?>
        </div>
        <div>
            <label class="labelFormCoAndIn" for="Numero-de-telephone">Phone Number</label>
            <input type="tel" placeholder="Phone Number" id="Phone" name="Tel" value="">
            <?php if (isset($messageErreur["Tel"])) : ?>
                <small><?= $messageErreur["Tel"] ?></small>
            <?php endif ?>
        </div>
    </div>
    <!-- Bouton d'envoi du formulaire-->
    <div>
        <button class="buttonForm" name="btnEnvoi">Submit</button>
    </div>
    <p class="lienVersConnexion">Déjà un compte ? <a href="/login"> Connection</a></p>
</form>