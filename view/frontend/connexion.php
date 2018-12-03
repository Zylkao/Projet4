<?php

if(isset($_SESSION['id']))
{
?>

<div id="connexion_area">
  <div id="btn-menu">
    <p> Bonjour ! <strong> <?php echo $_SESSION['pseudo'] ?></strong> </p>
    <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'Admin'){?>
      <a href='index.php?action=adminPage' id ="admin_btn"> <i class="fas fa-cogs">Administration</i></a>
    <?php } ?>
    <a href='index.php?action=disconnect' id="disconnect_btn"> <i class="fas fa-power-off"> Déconnexion </i></a>
  </div>
<?php
}
else
{
?>
      <div id="connexion_area">
        <form action="index.php?action=connexion" method="post">
          <label for="pseudo"> Identifiant </label><br />
          <input type="text" name="pseudo" /><br />

          <label for="password"> Mot de passe </label><br />
          <input type="password" name="password" /><br />

          <input type="submit" class="button" value="Connexion" />
          <a class="button" href='index.php?action=signUp'/> Inscription </a>
        </form>
        <?php $erreur; ?>
      </div>
<?php
};
?>
