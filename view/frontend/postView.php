<?php $title="Blog lecture"; ?>

<?php ob_start(); ?>

<section id="content">
    <?php include('menu.php');?>
  <div id="read-area">
    <div id="chapters">
      <h2>
      <?= htmlspecialchars($post['chapter_title']) ?>
      </h2>
      <p id="chapter-content">
        <?= htmlspecialchars_decode(nl2br(html_entity_decode( $post['content']))) ?>
      <br />
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
            <input id="valid" type="submit" />
          </div>
        </form>
      </div>


      <div id="read_comments_view">
        <?php
        while ($comment = $comments->fetch())
        {
          ?>
          <div id="comments_list">
            <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['comment_content'])) ?></p>
            <a href="index.php?action=signalComment&amp;id=<?= $comment['commentid'] ?>"><i class="fas fa-exclamation-triangle">Signaler</i></a>
            <form method="POST" action="index.php?action=signalComment&amp;id=<?= $comment['commentid'] ?>">
              <input type="hidden" value="<?= $comment['commentid'] ?>" name="commentid" />
              <button type="submit">Signaler</button>
            </form>
          </div>
          <?php
        }
        ?>
      </div>
    </div>
  </div>
</section>
</body>



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
