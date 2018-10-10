<?php
require('controller/frontend.php');
require('controller/backend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'welcome') {
            welcome();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment_content'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment_content']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif(isset($_GET['action'])){
          if ($_GET['action'] == 'adminPage'){
              adminPage();
          }
          elseif ($_GET['action'] == 'adminPost') {
              if (isset($_GET['id']) && $_GET['id'] > 0) {
                  adminPost();
              }
              else {
                  throw new Exception('Aucun identifiant de billet envoyé(Admin)');
              }
          }
          elseif ($_GET['action'] == 'addContent'){
                addContent();
          }
          elseif ($_GET['action'] == 'addPost') {
                  if (!empty($_POST['chapter_title']) && !empty($_POST['content'])) {
                      addPost($_GET['id'], $_POST['chapter_title'], $_POST['content']);
                  }
                  else {
                      throw new Exception('Tous les champs ne sont pas remplis !(Ajout de chapitre)');
                  }
          }
          elseif ($_GET['action'] == 'modifyPost') {
              if (isset($_GET['id']) && $_GET['id'] > 0) {
                  if (!empty($_POST['chapter_title']) && !empty($_POST['content'])) {
                      modifyPost($_GET['id'], $_POST['chapter_title'], $_POST['content']);
                  }
                  else {
                      throw new Exception('Tous les champs ne sont pas remplis (admin)!');
                  }
              }
              else {
                  throw new Exception('Aucun identifiant de billet envoyé');
              }
          }
          elseif ($_GET['action'] == 'deletePost') {
              if (isset($_GET['id']) && $_GET['id'] > 0) {
                deletePost($_GET['id']);
              }
              else {
                throw new Exception ('Suppression refusé');
              }
          }
          elseif ($_GET['action'] == 'deleteComment') {
              if (isset($_GET['id']) && $_GET['id'] > 0) {
                deleteComment($_GET['id']);
              }
              else {
                throw new Exception ('Suppression de commentaire refusé');
              }
          }
          else {
              throw new Exception('Accèes Admin Refusé');
          }
        }

    }
    else {
        welcome();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
