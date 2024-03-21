<a href="/index.php">
    <img src="Assets\Pictures\ctos_logo_bgRemoved.png" alt="Logo" class="logoImg">
</a>
<nav>
    <!-- si $_SESSION est connecté alors afficher-->
    <?php if (isset($_SESSION['user'])) : ?>
        <a href="/logout">Log out</a>
    <?php else : ?> <!-- sinon alors afficher-->
        <a href="/login">Log in</a>
        <!-- et -->
        <a href="/register">Register</a>
    <?php endif ?>
    <!-- si $_SESSION est connecté alors afficher-->
    <?php if (isset($_SESSION['user'])) : ?>
        <!-- <a href="/profil">Profile</a> -->
        <!-- et -->
        <a href="/searching">Search</a>
    <?php endif ?>
    <?php if (isset($_SESSION['user'])) : ?>
        <!-- Faker -->
        <a href="/fakerCreator">Faker</a>
    <?php endif ?>
    <?php if (isset($_SESSION['user']) && isset($_SESSION['userIsFaker']) && $_SESSION['userIsFaker'] == 1) : ?>
        <!-- Faker -->
        <li>is faker</li>
    <?php endif ?>
    <?php if (isset($_SESSION['user']) && isset($_SESSION['userIsFaker']) && $_SESSION['userIsFaker'] == 0) : ?>
        <!-- Faker -->
        <li>is not faker</li>
    <?php endif ?>
</nav>