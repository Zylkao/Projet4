<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function welcome()
{
    $postManager = new \zylkaôme\OC_Projet4\Model\PostManager();
    $posts = $postManager->getPosts();

    require('view\frontend\main_page.php');
}

function post()
{
  $postManager = new \zylkaôme\OC_Projet4\Model\PostManager();
  $commentManager = new \zylkaôme\OC_Projet4\Model\CommentManager();

  $post = $postManager->getPost($_GET['id']);
  $comments = $commentManager->getComments($_GET['id']);

  require('view/frontend/postView.php');
}

function addComment($postid, $author, $comment_content)
{
  $commentManager = new \zylkaôme\OC_Projet4\Model\CommentManager();

  $affectedLines = $commentManager->postComments($postid, $author, $comment_content);

  if ($affectedLines === false) {
    throw new Exception('Impossible d\'ajouter le commentaire !');
  }
  else {
    header('Location: index.php?action=post&id=' . $postid);
  }
}
