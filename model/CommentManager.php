<?php
namespace zylkaôme\OC_Projet4\model;

require_once("model/Manager.php");

class CommentManager extends Manager
{
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
    $comments = $db->prepare('INSERT INTO comments(postid,author,comment_content,comment_date)
    VALUES(?,?,?,NOW())');
    $affectedLines = $comments->execute(array($postid, $author,$comment_content));

    return $affectedLines;
  }

  public function deleteComments()
  {
    $db = $this -> dbConnect();
    $comments = $db->prepare('DELETE FROM comments WHERE id = "'. $id .'"');
  }
}
