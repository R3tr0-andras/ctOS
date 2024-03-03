<?php 
    $couleurBackground = "#000000"; 
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
        /* Partie header Fixe */

        header {
            height: 80px;
            background-color: <?php echo $couleurBackground; ?>;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-left: 1%;
            padding-right: 1%;
        }

        header .logoImg {
            width: 200px;
            height: 45px;
        }

        
    </style>

    <!-- Titre-->
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
</body>

</html>