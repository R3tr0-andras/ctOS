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
    <link rel="stylesheet" href="../Assets\Css\flex.css">
    <!-- Titre-->
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
    <footer>
        <?php require_once("Views\Components/footer.php"); ?>
    </footer>
    <!-- menu script -->
    <script src=""> </script>
    <!-- footer script -->
    <script src=""> </script>
</body>
</html>