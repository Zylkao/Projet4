<?php
namespace zylkaôme\OC_Projet4\model;

require_once("model/Manager.php");

class CommentManager extends Manager
{
  public function getAllComments(){
    $db = $this-> dbConnect();
    $comments = $db->prepare('SELECT id, postid, author, comment_content, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr
    FROM comments
    ORDER BY comment_date_fr DESC');
    $comments->execute(array());

    return $comments;
  }
  public function getComments($postid)
  {
    $db = $this-> dbConnect();
    $comments = $db->prepare('SELECT comments.id, comments.postid, post.id, author, comment_content, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr
    FROM comments
    INNER JOIN post
    ON post.id = comments.postid
    WHERE comments.postid = ?
    ORDER BY comment_date_fr DESC');
    $comments->execute(array($postid));

    return $comments;
  }

  public function postComments($postid, $author,$comment_content)
  {
    $db = $this -> dbConnect();
    $comments = $db->prepare('INSERT INTO comments(postid,author,comment_content,comment_date,valid)
    VALUES(?,?,?,NOW(), 0)');
    $affectedLines = $comments->execute(array($postid, $author,$comment_content));

    return $affectedLines;
  }

  public function deleteComments($id)
  {
    $db = $this -> dbConnect();
    $comments = $db->prepare('DELETE comments
      FROM comments
      WHERE id = "'. $id .'"');
    $comments->execute(array($id));

    return $comments;
  }
}
