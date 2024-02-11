<form method="post" action="">
    <H1> <?php if (isset($_SESSION["user"])) : ?> page de modification du profil <?php else : ?>page d'Inscription<?php endif ?></H1>

    <legend><?php if (isset($_SESSION["user"])) : ?> modifier profil <?php else : ?>Inscription<?php endif ?></legend>
    <!-- -->
    <div class="m">
        <label for="Nom" class="form-label">Nom</label>
        <input type="text" placeholder="Nom" class="form-control" id="Nom" name="nom" value="<?php if (isset($_SESSION["user"])) : ?><?= $_SESSION["user"]->userName ?><?php endif ?>">
        <?php if (isset($messageErreur["nom"])) : ?> <small><?= $messageErreur["Nom"] ?></small><?php endif ?>
    </div>
    <!-- -->
    <div class="">
        <label for="Prenom" class="form-label">Prenom</label>
        <input type="text" placeholder="Prenom" class="form-control" id="Prenom" name="Prenom" value="<?php if (isset($_SESSION["user"])) : ?><?= $_SESSION["user"]->userFname ?><?php endif ?>">
        <?php if (isset($messageErreur["Prenom"])) : ?> <small><?= $messageErreur["Prenom"] ?></small><?php endif ?>
    </div>
    <!-- -->
    <div class="">
        <label for="" class="form-label">Pseudo</label>
        <input type="text" placeholder="Pseudo" class="form-control" id="Pseudo" name="Pseudo" value="<?php if (isset($_SESSION["user"])) : ?><?= $_SESSION["user"]->userPseudo ?><?php endif ?>">
        <?php if (isset($messageErreur["Pseudo"])) : ?> <small><?= $messageErreur["Pseudo"] ?></small><?php endif ?>
    </div>
    <!-- -->
    <div class="">
        <label for="Mail" class="form-label">Mail</label>
        <input type="email" placeholder="Mail" class="form-control" id="Mail" name="Mail" value="<?php if (isset($_SESSION["user"])) : ?><?= $_SESSION["user"]->userEmail ?><?php endif ?>">
        <?php if (isset($messageErreur["Mail"])) : ?> <small><?= $messageErreur["Mail"] ?></small><?php endif ?>
    </div>
    <!-- -->
    <div class="">
        <label for="Password" class="form-label">mot de passe</label>
        <input type="<?php if (isset($_SESSION["user"])) : ?>text <?php else : ?>password <?php endif ?>" placeholder="Password" class="form-control" id="Password" name="Password" value="<?php if (isset($_SESSION["user"])) : ?><?= $_SESSION["user"]->userPassword ?><?php endif ?>">
        <?php if (isset($messageErreur["Password"])) : ?> <small><?= $messageErreur["Password"] ?></small><?php endif ?>
    </div>
    <!-- -->
    <div class="">
        <label for="" class="form-label">Genre</label>
        <select name="Genre" id="Genre">
            <option value="<?php if (isset($_SESSION["user"])) : ?><?= $_SESSION["user"]->userGenre ?><?php endif ?>">M</option>
            <option value="<?php if (isset($_SESSION["user"])) : ?><?= $_SESSION["user"]->userGenre ?><?php endif ?>">F</option>
        </select>
        <?php if (isset($messageErreur["Genre"])) : ?> <small><?= $messageErreur["Genre"] ?></small><?php endif ?>
    </div>
    <!-- -->
    <div class="">
        <label for="" class="form-label">Birthday Date</label>
        <input type="date" placeholder="Birthday Date" class="form-control" id="Date" name="Datee" value="<?php if (isset($_SESSION["user"])) : ?><?= $_SESSION["user"]->userBirthDate ?><?php endif ?>">
        <?php if (isset($messageErreur["BirthdayDate"])) : ?> <small><?= $messageErreur["Date"] ?></small><?php endif ?>
    </div>
    <!-- -->
    <div class="">
        <label for="" class="form-label">Jobs</label>
        <input type="text" placeholder="Jobs" class="form-control" id="Jobs" name="Jobs" value="<?php if (isset($_SESSION["user"])) : ?><?= $_SESSION["user"]->userJobs ?><?php endif ?>">
        <?php if (isset($messageErreur["Jobs"])) : ?> <small><?= $messageErreur["Jobs"] ?></small><?php endif ?>
    </div>
    <!-- -->
    <div class="">
        <label for="" class="form-label">Income</label>
        <input type="number" placeholder="Income" class="form-control" id="Income" name="Income" value="<?php if (isset($_SESSION["user"])) : ?><?= $_SESSION["user"]->userIncome ?><?php endif ?>">
        <?php if (isset($messageErreur["Income"])) : ?> <small><?= $messageErreur["Income"] ?></small><?php endif ?>
    </div>
    <!-- -->
    <div class="">
        <select name="Ethnie" id="Ethnie" class="select2">
            <optgroup label="Blanc">
                <option value="">Blanc, européen, Belge (Europe)</option>
                <option value="">Blanc, européen, Français (Europe)</option>
                <option value="">Blanc, européen, Allemand (Europe)</option>
                <option value="">Blanc, européen, Britannique (Europe)</option>
                <option value="">Blanc, européen, Italien (Europe)</option>
                <option value="">Blanc, européen, Espagnol (Europe)</option>
                <option value="">Blanc, européen, Portugais (Europe)</option>
                <option value="">Blanc, européen, Suédois (Europe)</option>
                <option value="">Blanc, européen, Norvégien (Europe)</option>
                <option value="">Blanc, européen, Danois (Europe)</option>
                <option value="">Blanc, européen, Néerlandais (Europe)</option>
                <option value="">Blanc, européen, Suisse (Europe)</option>
                <option value="">Blanc, européen, Autrichien (Europe)</option>
                <option value="">Blanc, européen, Hongrois (Europe)</option>
                <option value="">Blanc, européen, Polonais (Europe)</option>
                <option value="">Blanc, européen, Tchèque (Europe)</option>
                <option value="">Blanc, européen, Slovaque (Europe)</option>
                <option value="">Blanc, européen, Slovène (Europe)</option>
                <option value="">Blanc, européen, Croate (Europe)</option>
                <option value="">Blanc, européen, Serbe (Europe)</option>
                <option value="">Blanc, européen, Bosniaque (Europe)</option>
                <option value="">Blanc, européen, Monténégrin (Europe)</option>
                <option value="">Blanc, européen, Macédonien (Europe)</option>
                <option value="">Blanc, européen, Bulgare (Europe)</option>
                <option value="">Blanc, européen, Grec (Europe)</option>
                <option value="">Blanc, européen, Ukrainien (Europe)</option>
                <option value="">Blanc, européen, Biélorusse (Europe)</option>
                <option value="">Blanc, européen, Letton (Europe)</option>
                <option value="">Blanc, européen, Estonien (Europe)</option>
                <option value="">Blanc, européen, Finlandais (Europe)</option>
                <option value="">Blanc, européen, Islandais (Europe)</option>
                <option value="">Blanc, européen, Irlandais (Europe)</option>
                <option value="">Blanc, européen, Écossais (Europe)</option>
                <option value="">Blanc, européen, Gallois (Europe)</option> 
                <option value="">Blanc, Asiatique/Européen, Turc (Europe/Asie)</option>
                <option value="">Blanc, Européen/Asiatique, Russe (Europe/Asie)</option>
                <option value="">Blanc, Américain, Nord-Américain (Amérique du Nord)</option>
                <option value="">Blanc, Américain, Latino-Américain (Amérique latine)</option>
                <option value="">Blanc, océanien, Australien (Océanie)</option>
                <option value="">Blanc, océanien, Néo-Zélandais (Océanie)</option>
            </optgroup>
            <optgroup label="Noir">
                <!-- Afrique -->
                <option value="">Noir, Africain, Nigérian (Afrique)</option>
                <option value="">Noir, Africain, Sud-Africain (Afrique)</option>
                <option value="">Noir, Africain, Kenyan (Afrique)</option>
                <option value="">Noir, Africain, Éthiopien (Afrique)</option>
                <option value="">Noir, Africain, Ghanéen (Afrique)</option>
                <option value="">Noir, Africain, Tanzanien (Afrique)</option>
                <option value="">Noir, Africain, Ougandais (Afrique)</option>
                <option value="">Noir, Africain, Rwandais (Afrique)</option>
                <option value="">Noir, Africain, Burundais (Afrique)</option>
                <option value="">Noir, Africain, Congolais (Afrique)</option>
                <option value="">Noir, Africain, Camerounais (Afrique)</option>
                <option value="">Noir, Africain, Sénégalais (Afrique)</option>
                <option value="">Noir, Africain, Malien (Afrique)</option>
                <option value="">Noir, Africain, Ivoirien (Afrique)</option>
                <option value="">Noir, Africain, Guinéen (Afrique)</option>
                <option value="">Noir, Africain, Sierra-Léonais (Afrique)</option>
                <option value="">Noir, Africain, Libérien (Afrique)</option>
                <option value="">Noir, Africain, Gambien (Afrique)</option>
                <option value="">Noir, Africain, Soudanais (Afrique)</option>
                <option value="">Noir, Africain, Sud-Soudanais (Afrique)</option>
                <option value="">Noir, Africain, Somali (Afrique)</option>
                <option value="">Noir, Africain, Djiboutien (Afrique)</option>
                <option value="">Noir, Africain, Érythréen (Afrique)</option>
                <option value="">Noir, Africain, Malgache (Afrique)</option>
                <!-- Amérique -->
                <option value="">Noir, Américain, Afro-Caribéen (Amérique)</option>
                <option value="">Noir, Américain, Afro-Américain (Amérique du Nord)</option>
                <option value="">Noir, Américain, Afro-Brésilien (Amérique du Sud)</option>
                <option value="">Noir, Américain, Afro-Cubain (Amérique du Nord)</option>
                <option value="">Noir, Américain, Afro-Colombien (Amérique du Sud)</option>
                <option value="">Noir, Américain, Afro-Vénézuélien (Amérique du Sud)</option>
            </optgroup>
        </select>

    </div>
    <!-- -->
    <div>
        <button name="btnEnvoi">Envoyer</button>
    </div>
</form>