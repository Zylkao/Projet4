<?php $title = "Administration"; ?>

<?php ob_start(); ?>

<a href="index.php"> Accueil</a>

<body>

  <div id="menu">
    <h2 id="menu-title"> Administration </h2>

    <ul>
      <?php
      while ($data = $posts->fetch())
      {
      ?>
      <li> <?= htmlspecialchars($data['chapter_title']) ?></a>
          <a href="index.php?action=adminPost&amp;id=<?= $data['id'] ?>" class='button' >Modifié</a>
          <a href="index.php?action=deletePost&amp;id=<?= $data['id'] ?>" class='button' >Supprimer</a>
      </li>
      <?php
      }
      $posts->closeCursor();
      ?>
    </ul>
  </div>
</body>

<footer>
</footer>




<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
