<?php

if(isset($_SESSION['id']))
{
?>

<div id="connexion_area">
    <p> Bonjour ! <strong> <?php echo $_SESSION['pseudo'] ?></strong> </p>
    <a href='index.php?action=disconnect'> Déconnexion </a>
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

          <input type="submit" value="Connexion" />
          <a class="button" href='index.php?action=signUp'/> Inscription </a>
        </form>
      </div>
<?php
};
?>
