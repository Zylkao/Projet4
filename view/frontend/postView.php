<?php $title="Blog lecture"; ?>

<?php ob_start(); ?>


<section id="content">
  <a href="index.php"><i class="fa fa-home"> Accueil</i></a>
  <div id="read-area">
    <div id="chapters">
      <h2>
      <?= htmlspecialchars($post['chapter_title']) ?>
      </h2>
      <p id="chapter-content">
        <?= nl2br(htmlspecialchars($post['content'])) ?>
        </br>
        <strong> Posté le <?= htmlspecialchars($post['post_date_fr']) ?></strong>
      </p>
    </div>

    <div id="comments">
      <h2> Commentaires </h2>
      <div id="add_comments">
        <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
          <div>
            <label for="author">Auteur</label><br />
            <input type="text" id="author" name="author" />
          </div>
          <div>
            <label for="comment_content">Commentaire</label><br />
            <textarea id="comment_content" name="comment_content"></textarea>
          </div>
          <div>
            <input type="submit" />
          </div>
        </form>
      </div>


      <div id="read_comments">
        <?php
        while ($comment = $comments->fetch())
        {
          ?>
          <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
          <p><?= nl2br(htmlspecialchars($comment['comment_content'])) ?></p>
          <?php
        }
        ?>
      </div>
    </div>
  </div>
</section>
</body>

<footer>
</footer>



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
