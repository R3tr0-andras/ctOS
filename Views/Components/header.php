<a href="/index.php">
    <img src="Assets\Pictures\ctos_logo_bgRemoved.png" alt="Logo" class="logoImg">
</a>
<nav>
    <div class="menu">
        <!-- si $_SESSION est connecté alors afficher-->
        <?php if (isset($_SESSION['user'])) : ?>
            <a href="/logout" class="menuItem">Log out</a>
        <?php else : ?> <!-- sinon alors afficher-->
            <a href="/login" class="menuItem">Log in</a>
            <!-- et -->
            <a href="/register" class="menuItem">Register</a>
        <?php endif ?>
        <!-- si $_SESSION est connecté alors afficher-->
        <?php if (isset($_SESSION['user'])) : ?>
            <!-- <a href="/profil">Profile</a> -->
            <!-- et -->
            <a href="/searching" class="menuItem">Search</a>
        <?php endif ?>
        <?php if (isset($_SESSION['user'])) : ?>
            <!-- Faker -->
            <a href="/fakerCreator" class="menuItem">Faker</a>
        <?php endif ?>
    </div>

    <button class="hamburger">
        <!-- material icons https://material.io/resources/icons/ -->
        <i class="menuIcon material-icons">menu</i>
        <i class="closeIcon material-icons">close</i>
    </button>
</nav>