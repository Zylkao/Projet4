<?php $title = "Administration"; ?>

<?php ob_start(); ?>



<body>
<div id="content">

  <?php include('menu_admin.php');?>

  <div id="read_comments">
    <h2> Derniers commentaires </h2>
    <?php
    while ($comment = $comments->fetch())
    {
      ?>
      <div id="comments_list">
       <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
       <p><?= nl2br(htmlspecialchars($comment['comment_content'])) ?></p>
       <a href="index.php?action=deleteComment&amp;id=<?= $comment['commentid'] ?>"><i class="fas fa-times"> Supprimer</i></a>
       <a href="index.php?action=validateComment&amp;id=<?= $comment['commentid'] ?>"> <i class="fas fa-check">Valider</i></a>
       <?php if($comment['comment_signal'] == 1){
       echo "<span style='color:orange; margin-left:10px;'> Commentaire Signalé</span>";
       }
       ?>
      </div>
      <?php
    }

    ?>
  </div>
</div>
</body>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
