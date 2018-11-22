<?php $title="Inscription"; ?>

<?php ob_start(); ?>

<div id="sign_up">
  <form action="index.php?action=newUser" method="post">
    <label for="pseudo"> Identifiant </label><br />
    <input type="text" name="pseudo" /><br />

    <label for="email"> E-mail </label><br />
    <input type="email" name="email" /><br />

    <label for="password"> Mot de passe </label><br />
    <input type="password" name="password" /><br />

    <input type="submit" value="Valider" />
    <a href='index.php'/> Annuler </a>
  </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
