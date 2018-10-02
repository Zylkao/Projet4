<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function adminPage()
{
  $postManager = new \zylkaôme\OC_Projet4\Model\PostManager();
  $commentManager = new \zylkaôme\OC_Projet4\Model\CommentManager();

  $posts = $postManager->getPosts();

  require('view/backend/admin.php');
}

function adminPost()
{
  $postManager = new \zylkaôme\OC_Projet4\Model\PostManager();
  $commentManager = new \zylkaôme\OC_Projet4\Model\CommentManager();

  $post = $postManager->getPost($_GET['id']);
  $comments = $commentManager->getComments($_GET['id']);

  require('view/backend/post_admin.php');
}

function modifyPost($id,$chapter_title,$content)
{
  $postManager = new \zylkaôme\OC_Projet4\Model\PostManager();

  $affectedLines = $postManager->modifyContent($id,$chapter_title,$content);

  if ($affectedLines === false) {
    throw new Exception('Impossible de modifié le contenu !');
  }
  else {
    header('Location: index.php?action=adminPage');
  }
}

function deletePost($id)
{
  $postManager = new \zylkaôme\OC_Projet4\Model\PostManager();

  $dpost = $postManager->deleteContent($id);
  header('Location: index.php?action=adminPage');
}
