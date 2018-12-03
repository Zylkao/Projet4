<?php $title="Ajouter un Chapitre"; ?>

<?php ob_start(); ?>

<section id="content">

  <div id="read-area">
    <div id="chapters">
      <form action="index.php?action=addPost" method="post">
        <div>
          <label for="chapter_title"> Titre du chapitre </label><br />
          <input type="text" name="chapter_title" />
        </div>
        <div>
          <label for="content"> Contenu du chapitre </label><br />
          <textarea id="mytextarea" name="content"></textarea>
        </div>
        <div>
          <input class="button" type="submit" value="Valider" />
          <a class="button" href='index.php?action=adminPage'/> Annuler </a>
        </div>
      </form>
    </div>
  </div>
  </section>

  <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=843ek0ws7rct4eii7488xofwwb06qptx990gi2hc0o62hr89"></script>

  <script type="text/javascript" src="public/js/tinyMCE.js" ></script>

  <?php $content = ob_get_clean(); ?>

  <?php require('view/frontend/template.php'); ?>
