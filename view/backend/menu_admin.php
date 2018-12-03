<div id="menu">
  <h2 id="menu-title"> Administration </h2>
  <div id="navbar">
    <a href="index.php" class="accueil_btn_alt"> <i class="fas fa-home"> Accueil</i></a>
    <div id="dropdown"> <p class="accueil_btn_alt"><i class="fas fa-bars"></i> Administration des chapitres</p>
      <div id="dropdown-content">
        <ul>
          <?php
          while ($data = $posts->fetch())
          {
          ?>
            <li class='chapter_font'> <?= htmlspecialchars($data['chapter_title']) ?>
                <a href="index.php?action=adminPost&amp;id=<?= $data['id'] ?>" ><i class="fas fa-cog"></i></a>
                <a href="index.php?action=deletePost&amp;id=<?= $data['id'] ?>"><i class="fas fa-times"></i></a>
            </li>
          <?php
          }
          $posts->closeCursor();
          ?>
        </ul>
      <a href="index.php?action=addContent" class='button'> Ajout de Chapitre</a>
    </div>
    </div>
  </div>
</div>
