<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Pinyon+Script" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Goudy+Bookletter+1911" rel="stylesheet">
        <meta name="Blog lecture" content="Site du Projet 4 D'Openclassroom:Blog lecture" />
    </head>

    <body>
      <header>
        <a href="index.php" id="accueil_btn"> <i class="fas fa-home"> Accueil</i></a>
      <?php include('connexion.php')?>

      </header>
        <?= $content ?>
    </body>

    <footer>
    </footer>
</html>
