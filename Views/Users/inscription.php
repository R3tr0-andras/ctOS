<form method="post" action="">
    <h1>page d'Inscription aux serveurs du CtOS 2.0</h1>

    <legend>Inscription</legend>
    <!-- Prénom -->
    <div class="">
        <label for="FirstName" class="">First Name</label>
        <input type="text" placeholder="First Name" class="" id="FName" name="Prenom" maxlength="30" value="">
        <!-- Message d'error -->
        <?php if (isset($messageErreur["Prenom"])) : ?>
            <small><?= $messageErreur["Prenom"] ?></small>
        <?php endif ?>
    </div>
    <!-- Nom de famille -->
    <div class="">
        <label for="Nom" class="">Last Name</label>
        <input type="text" placeholder="Last Name" class="" id="LName" name="Nom" maxlength="30" value="">
        <!-- Message d'error -->
        <?php if (isset($messageErreur["Nom"])) : ?>
            <small><?= $messageErreur["Nom"] ?></small>
        <?php endif ?>
    </div>
    <!-- Pseudo en ligne -->
    <div class="pseudo">
        <label for="" class="">Nickname</label>
        <input type="text" placeholder="Nickname" class="" id="NName" name="Pseudo" maxlength="30" value="">
        <!-- Message d'error -->
        <?php if (isset($messageErreur["Pseudo"])) : ?>
            <small><?= $messageErreur["Pseudo"] ?></small>
        <?php endif ?>
    </div>
    <!-- Mail de l'utilisateur -->
    <div class="">
        <label for="Mail" class="">Email Address</label>
        <input type="email" placeholder="Email" class="" id="EMail" name="Mail" maxlength="100" value="">
        <!-- Message d'error -->
        <?php if (isset($messageErreur["Mail"])) : ?>
            <small><?= $messageErreur["Mail"] ?></small>
        <?php endif ?>
    </div>
    <!-- Mot de passe -->
    <div class="">
        <label for="mot-de-passe" class="">Password</label>
        <input type="password" placeholder="Password" class="" id="Password" name="Password" minlength="8" maxlength="64" value="">
        <!-- Message d'error -->
        <?php if (isset($messageErreur["Password"])) : ?>
            <small><?= $messageErreur["Password"] ?></small>
        <?php endif ?>
    </div>
    <!-- Genre -->
    <div class="">
        <label for="Genre" class="">Gender</label>
        <select name="Genre" id="Genre">
            <option value="M">M</option>
            <option value="F">F</option>
        </select>
        <!-- Message d'error -->
        <?php if (isset($messageErreur["Genre"])) : ?>
            <small><?= $messageErreur["Genre"] ?></small>
        <?php endif ?>
    </div>
    <!-- Date de Naissance-->
    <div class="">
        <label for="Date-de-naissance" class="">Birthday Date</label>
        <input type="date" placeholder="Birthday Date" class="" id="Date" name="Date" value="">
        <!-- Message d'error -->
        <?php if (isset($messageErreur["Date"])) : ?>
            <small><?= $messageErreur["Date"] ?></small>
        <?php endif ?>
    </div>
    <!-- Travail -->
    <div class="">
        <label for="Travail" class="">Job</label>
        <input type="text" placeholder="Job" class="" id="Job" name="Job" value="">
        <!-- Message d'error -->
        <?php if (isset($messageErreur["Job"])) : ?>
            <small><?= $messageErreur["Job"] ?></small>
        <?php endif ?>
    </div>
    <!-- Salaire -->
    <div class="">
        <label for="Salaire" class="">Income</label>
        <input type="number" placeholder="Income" class="" id="Income" name="Income" value="">
        <!-- Message d'error -->
        <?php if (isset($messageErreur["Income"])) : ?>
            <small><?= $messageErreur["Income"] ?></small>
        <?php endif ?>
    </div>
    <!-- Etnie -->
    <div class="">
        <label for="Etnie" class="">Ethnic Group</label>
        <input type="text" placeholder="Ethnic Group" class="" id="Ethnie" name="Ethnie" value="">
        <!-- Message d'error -->
        <?php if (isset($messageErreur["Ethnie"])) : ?>
            <small><?= $messageErreur["Ethnie"] ?></small>
        <?php endif ?>
    </div>
    <!-- Numéro de téléphone -->
    <div class="">
        <label for="Numero-de-telephone" class="">Phone Number</label>
        <input type="tel" placeholder="Ethnic Group" class="" id="Phone" name="Tel" value="">
        <!-- Message d'error -->
        <?php if (isset($messageErreur["Tel"])) : ?>
            <small><?= $messageErreur["Tel"] ?></small>
        <?php endif ?>
    </div>
    <!-- Bouton d'envoi du formulaire-->
    <div>
        <button name="btnEnvoi">Submit</button>
    </div>
</form>