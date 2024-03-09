<?php 
    $imageBackground;
 if (isset($_SESSION['user'])) {
    $couleurBackground = "#0080FF"; 
 }

 else {
    $couleurBackground = "#000000"; 
 }
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Liens-->
    <link rel="stylesheet" href="../Assets\Css\styles.css">
    <link rel="stylesheet" href="../Assets\Css\fonts.css">
    <link rel="stylesheet" href="../Assets\Css\flex.css">
    <link rel="stylesheet" href="../Assets\Css\keyframes.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        /* Partie de couleur Fixe */

        header {
            background-color: <?= $couleurBackground; ?>;
        }

        body {
            background-image: <?= $imageBackground; ?>;
        }

        footer {
            background-color: <?= $couleurBackground; ?>;
        }

    </style>

    <!-- Titre et icon-->
    <link rel="icon" href="../Assets\Pictures\Blume_black.png" type="image/x-icon">
    <title><?= $title ?></title>
</head>
<body>
    <!-- header -->
    <header>
        <?php require_once("Views\Components\header.php"); ?>
    </header>
    <!-- main -->
    <main>
        <?php require_once($template); ?>
    </main>
    <!-- footer -->
    <div class="footer-clean">
        <footer>
            <?php require_once("Views\Components/footer.php"); ?>
        </footer>
    </div>
    <!-- menu script -->
    <script src=""> </script>
    <!-- footer script -->
    <script src=""> </script>
</body>
</html>