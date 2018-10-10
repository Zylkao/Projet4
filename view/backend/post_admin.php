<?php $title="Modification"; ?>

<?php ob_start(); ?>

<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=843ek0ws7rct4eii7488xofwwb06qptx990gi2hc0o62hr89"></script>

<script>
tinymce.init({
selector: '#mytextarea',
language: 'fr_FR',
plugins: "preview",
menubar: "view",
toolbar: "preview"
});
</script>

  <div id="read-area">
    <div id="chapters">
      <form action="index.php?action=modifyPost&amp;id=<?= $post['id'] ?>" method="post">
        <div>
          <label for="chapter_title"> Titre du chapitre </label><br />
          <input type="text" name="chapter_title" value=<?= htmlspecialchars($post['chapter_title']) ?> />
        </div>
        <div>
          <label for="content"> Contenu du chapitre </label><br />
          <textarea id="mytextarea" name="content"><?= nl2br(htmlspecialchars($post['content'])) ?></textarea>
        </div>
        <div>
          <input type="submit" value="Valider" />
          <a id="button" href='index.php?action=adminPage'/> Annuler </a>
        </div>
      </form>
    </div>
  </div>

  <div id="read_comments">

    <?php
    while ($comment = $comments->fetch())
    {
      ?>
      <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
      <p><?= nl2br(htmlspecialchars($comment['comment_content'])) ?></p>
      <a href="index.php?action=deleteComment&amp;id=<?= $comment['id'] ?>"><i class="fas fa-times"></i></a>
      <?php
    }

    ?>
  </div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
