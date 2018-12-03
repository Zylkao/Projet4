<?php
namespace zylkaôme\Projet_OC\Projet4\model;

require_once("model/Manager.php");

class PostManager extends Manager
{
  public function getPosts()
  {
    $db = $this -> dbConnect();
    $req = $db->prepare('SELECT id, chapter_title, content, DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%imin%ss\') AS post_date_fr
    FROM post
    ORDER BY id');

    $req -> execute(array());
    return $req;
  }

  public function getPost($postId)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT id, chapter_title, content, DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%imin%ss\') AS post_date_fr
    FROM post
    WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
  }

  public function postContent($id,$chapter_title,$content,$post_date)
  {
    $db = $this -> dbConnect();
    $post = $db->prepare('INSERT INTO post(id,chapter_title,content,post_date)
    VALUES(?,?,?,NOW())');
    $affectedLines = $post->execute(array($id,$chapter_title,$content));

    return $affectedLines;
  }

  public function modifyContent($id,$chapter_title,$content)
  {
    $db = $this -> dbConnect();
    $post = $db->prepare('UPDATE post
      SET chapter_title = "'. $chapter_title .'", content= "'. $content .'"
      WHERE id = "'. $id .'"');
    $affectedLines = $post->execute(array($id,$chapter_title,$content));

    return $affectedLines;
  }

  public function deleteContent($id)
  {
    $db= $this -> dbConnect();
    $post = $db->prepare('DELETE FROM post WHERE id = "'. $id .'"');
    $post->execute(array($id));

    return $post;
  }
}
