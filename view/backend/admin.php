<?php $title = "Administration"; ?>

<?php ob_start(); ?>

<a href="index.php"> <i class="fas fa-home"> Accueil</i></a>

<body>
<div id="content">
  <div id="menu">
    <h2 id="menu-title"> Administration </h2>

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

  <div id="read_comments">
    <h2> Derniers commentaires </h2>
    <?php
    while ($comment = $comments->fetch())
    {
      ?>
      <div id="comments_list">
       <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
       <p><?= nl2br(htmlspecialchars($comment['comment_content'])) ?></p>
       <a href="index.php?action=deleteComment&amp;id=<?= $comment['id'] ?>"><i class="fas fa-times"> Supprimer</i></a>
      </div>
      <?php
    }

    ?>
  </div>
</div>
</body>

<footer>
</footer>




<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
