<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Material Icon CDN -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Liens css -->
    <link rel="stylesheet" href="../Assets/Css/scrollBar.css">
    <link rel="stylesheet" href="../Assets/Css/form.css">
    <link rel="stylesheet" href="../Assets/Css/tracking.css">
    <link rel="stylesheet" href="../Assets/Css/styles.css">
    <link rel="stylesheet" href="../Assets/Css/fonts.css">
    <link rel="stylesheet" href="../Assets/Css/flex.css">
    <link rel="stylesheet" href="../Assets/Css/keyframes.css">
    <link rel="stylesheet" href="../Assets/Css/searchBar.css">
    <style>
        header {
            background-color: <?= $couleurBackground; ?>;
        }

        body::-webkit-scrollbar-track {
            background: <?= $couleurBackground; ?>;
        }

        footer {
            background-color: <?= $couleurBackground; ?>;
        }
    </style>
    <!-- Titre et icon-->
    <link rel="icon" href="Assets/Pictures/Blume_black.png" type="icon">
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
    <script src="Assets\Scripts\menuHeader.js"></script>
</body>
</html>