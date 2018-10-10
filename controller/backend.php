<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function adminPage()
{
  $postManager = new \zylkaôme\OC_Projet4\Model\PostManager();
  $commentManager = new \zylkaôme\OC_Projet4\Model\CommentManager();

  $posts = $postManager->getPosts();
  $comments = $commentManager->getAllComments();

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

function addContent(){

  require('view/backend/add_content.php');
}
function addPost($id,$chapter_title,$content){

  $postManager = new \zylkaôme\OC_Projet4\Model\PostManager();

  $affectedLines = $postManager->postContent($id,$chapter_title,$content);

  if ($affectedLines === false) {
    throw new Exception('Impossible d\'ajouter la page');
  }
  else {
    header('Location: index.php?action=adminPage');
  }
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
  $commentManager = new \zylkaôme\OC_Projet4\Model\CommentManager();

  $dpost = $postManager->deleteContent($id);
  $dComment = $commentManager->deleteComments($id);

  header('Location: index.php?action=adminPage');
}

function deleteComment($id)
{
  $commentManager = new \zylkaôme\OC_Projet4\Model\CommentManager();

  $dComment = $commentManager->deleteComments($id);

  header('Location: index.php?action=adminPage');
}
