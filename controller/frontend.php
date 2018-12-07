<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');

function welcome()
{
    $postManager = new \zylkaôme\Projet_OC\Projet4\Model\PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/main_page.php');
}

function post()
{
  $postManager = new \zylkaôme\Projet_OC\Projet4\Model\PostManager();
  $commentManager = new \zylkaôme\Projet_OC\Projet4\Model\CommentManager();

  $posts = $postManager->getPosts();
  $post = $postManager->getPost($_GET['id']);
  $comments = $commentManager->getComments($_GET['id']);

  require('view/frontend/postView.php');
}

function addComment($postid, $author, $comment_content)
{
  $commentManager = new \zylkaôme\Projet_OC\Projet4\Model\CommentManager();

  $affectedLines = $commentManager->postComments($postid, $author, $comment_content);

  if ($affectedLines === false) {
    throw new Exception('Impossible d\'ajouter le commentaire !');
  }
  else {
    header('Location: index.php?action=post&id=' . $postid);
  }
}

function signUp()
{
  require('view/frontend/sign_up.php');
}

function newUser($id,$pseudo,$email,$password)
{
  $userManager = new \zylkaôme\Projet_OC\Projet4\Model\UserManager();

  $affectedLines = $userManager->addUser($id,$pseudo,$email,$password);

  if ($affectedLines === false) {
    throw new Exception('Impossible d\'ajouter l\' utilisateur !');
  }
  else {
    header('Location: index.php?action=welcome');
  }
}


function updateUser($id,$pseudo,$email,$password)
{
  $userManager = new \zylkaôme\Projet_OC\Projet4\Model\UserManager();

  $affectedLines = $userManager->modifyUser($id,$pseudo,$email,$password);

  if ($affectedLines === false) {
    throw new Exception('Impossible de modifier l\' utilisateur !');
  }
  else {
    header('Location: index.php');
  }

  require('view/frontend/my_profile');
}

function connexion($pseudo,$password)
{
  $userManager = new \zylkaôme\Projet_OC\Projet4\Model\UserManager();

  $affectedLines = $userManager->signIn($pseudo,$password);

  if ($affectedLines === false) {
    $_SESSION['error'] = 1;
    header("Location: index.php");
  }
  else
  {
  $_SESSION['id'] = $affectedLines['id'];
  $_SESSION['pseudo'] = $pseudo;
  $_SESSION['role'] = $affectedLines['role'];
  header('Location: index.php');
  }
}

function disconnect()
{
  header('Location: index.php');
}
