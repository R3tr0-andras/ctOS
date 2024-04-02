<style>
    .hamburger {
        position: fixed;
        z-index: 100;
        top: 1rem;
        right: 1rem;
        padding: 4px;
        border: black solid 1px;
        cursor: pointer;
    }

    .closeIcon {
        display: none;
    }

    .menu {
        position: fixed;
        transform: translateY(-100%);
        transition: transform 0.2s;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 99;
        background: black;
        color: white;
        list-style: none;
        padding-top: 4rem;
    }

    .showMenu {
        transform: translateY(0);
    }
</style>
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