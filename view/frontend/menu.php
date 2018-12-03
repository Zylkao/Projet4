<div id="menu">
<h2 id="menu-title"> Liste des Chapitres </h2>
<div id="navbar">
  <a href="index.php" class="accueil_btn_alt"> <i class="fas fa-home"> Accueil</i></a>

  <div id="dropdown">  <p class="accueil_btn_alt"><i class="fas fa-bars"></i> Chapitres</p>
    <div id="dropdown-content">
      <?php
      while ($data = $posts->fetch())
      {
      ?>
      <a href="index.php?action=post&amp;id=<?= $data['id'] ?>"> <?= htmlspecialchars($data['chapter_title']) ?></a> <br />
      <?php
      }
      $posts->closeCursor();
      ?>
    </div>
  </div>
</div>
</div>
