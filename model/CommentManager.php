<?php

namespace zylkaôme\OC_Projet4\Model;

require_once("model/Manager.php");

class CommentManager extends Manager
{
  public function getComments($postid)
  {
    $db = $this-> dbConnect();
    $req = $db->prepare('SELECT comments.id, author, comment_content, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr
    FROM comments
    INNER JOIN post
    ON post.id = comments.postid
    ORDER BY comment_date_fr DESC ')

    return $req;
  }

  public function postComments($postid, $author,$comment_content,$comment_date)
  {
    $db = $this -> dbConnect();
    $comments = $db->prepare('INSERT INTO comments(post_id,author,comment_content,comment_date)
    VALUES(?,?,?,NOW())');
    $affectedLines = $comments->execute(array($postid, $author,$comment_content,$comment_date));

    return $affectedLines;
  }
}
