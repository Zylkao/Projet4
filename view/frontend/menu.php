<div id="menu">
  <h2 id="menu-title"> Liste des Chapitres </h2>

  <ul>
    <?php
    while ($data = $posts->fetch())
    {
    ?>
    <li><a href="index.php?action=post&amp;id=<?= $data['id'] ?>"> <?= htmlspecialchars($data['chapter_title']) ?></a></li>
    <?php
    }
    $posts->closeCursor();
    ?>
  </ul>
</div>
