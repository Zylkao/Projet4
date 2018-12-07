<?php
namespace zylkaôme\Projet_OC\Projet4\model;

require_once("model/Manager.php");

class CommentManager extends Manager
{
  public function getAllComments(){
    $db = $this-> dbConnect();
    $comments = $db->prepare('SELECT commentid, postid, author, comment_content,valid,comment_signal, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr
    FROM comments
    WHERE comments.comment_signal = 1 OR comments.valid = 0
    ORDER BY comment_date_fr DESC');
    $comments->execute(array());

    return $comments;
  }
  public function getComments($postid)
  {
    $db = $this-> dbConnect();
    $comments = $db->prepare('SELECT commentid, comments.postid, post.id, author, comment_content, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr
    FROM comments
    INNER JOIN post
    ON post.id = comments.postid
    WHERE comments.postid = ? AND comments.valid = 1
    ORDER BY comment_date_fr DESC');
    $comments->execute(array($postid));

    return $comments;
  }

  public function postComments($postid, $author,$comment_content)
  {
    $db = $this -> dbConnect();
    $comments = $db->prepare('INSERT INTO comments(postid,author,comment_content,comment_date,valid,comment_signal)
    VALUES(?,?,?,NOW(), 0,0)');
    $affectedLines = $comments->execute(array($postid, $author,$comment_content));

    return $affectedLines;
  }

  public function deleteComments($commentid)
  {
    $db = $this -> dbConnect();
    $comments = $db->prepare('DELETE comments
      FROM comments
      WHERE commentid = "'. $commentid .'"');
    $comments->execute(array($commentid));

    return $comments;
  }

  public function validateComments($commentid)
  {
    $db = $this -> dbConnect();
    $comments = $db->prepare('UPDATE comments
      SET comment_signal = 0, valid = 1
      WHERE commentid = "'. $commentid .'"');
    $comments->execute(array($commentid));

    return $comments;
  }

  public function signalComments($commentid)
  {
    $db = $this -> dbConnect();
    $comments = $db->prepare('UPDATE comments
      SET comment_signal = 1, valid = 0
      WHERE commentid = "'. $commentid .'"');
    $comments->execute(array($commentid));

    return $comments;
  }

}
