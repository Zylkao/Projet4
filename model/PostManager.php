<?php

namespace zylkaôme\OC_Projet4\Model;

require_once("model/Manager.php");

class PostManager extends Manager
{
  public function getPosts()
  {
    $db = $this -> dbConnect();
    $req = $db->prepare('SELECT postid, chapter_title, content, DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%imin%ss\') AS post_date_fr
    FROM post
    ORDER BY id')

    return $req;
  }

  public function postContent($chapter_title,$content,$post_date)
  {
    $db = $this -> dbConnect();
    $post = $db->prepare('INSERT INTO post(chapter_title,content,post_date)
    VALUES(?,?,NOW())');
    $affectedLines = $post->execute(array($chapter_title,$content,$post_date));

    return $affectedLines;
  }
}
