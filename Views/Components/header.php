<img src="Assets\Pictures\ctos_logo_bgRemoved.png" alt="Logo" class="logoImg">
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
        <a href="/profil">Profile</a>
        <!-- et -->
        <a href="/searching">Search</a>
    <?php endif ?>
    <?php if (isset($_SESSION['user'])) : ?>
        <!-- Faker -->
        <a href="/fakerCreator">Faker</a>
    <?php endif ?>
</nav>