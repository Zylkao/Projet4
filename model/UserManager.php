<?php
namespace zylkaôme\OC_Projet4\model;

require_once("model/Manager.php");

class UserManager extends Manager
{
    public function addUser($id,$pseudo,$email,$password)
    {

      $db = $this -> dbConnect();
      $user = $db->prepare('INSERT INTO users(id,pseudo,email,password,role,date_user_creation)
      VALUES(?,?,?,?,"User",NOW())');
      $affectedLines = $user->execute(array($id,$pseudo,$email,$password));

      return $affectedLines;
    }

    public function modifyUser($id,$pseudo,$email,$password)
    {
      $db = $this -> dbConnect();
      $user = $db->prepare('UPDATE users
      SET pseudo ="'.$pseudo.'", email="'. $email.'" password= "'. $password.'"
      WHERE id ="'. $id.'"');
      $affectedLines = $user->execute(array($id,$pseudo,$email,$password));

      return $affectedLines;
    }

    public function deleteUsers($id)
    {
      $db= $this -> dbConnect();
      $user = $db->prepare('DELETE FROM users WHERE id = "'. $id .'"');
      $user->execute(array($id));

      return $user;
    }

    public function getUsers()
    {
      $db = $this -> dbConnect();
      $user = $db->prepare('SELECT id,pseudo,email,role,DATE_FORMAT(date_user_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_user_fr
      FROM users
      ORDER BY id');

      $user -> execute(array());
      return $user;
    }

    public function signIn($pseudo,$password)
    {
      $db = $this -> dbConnect();
      $req = $db->prepare('SELECT id,role FROM users WHERE pseudo = :pseudo AND password = :password');
      $req->execute(array(
        'pseudo' => $pseudo,
        'password' => $password));

      $result = $req->fetch();

      return $result;
    }
}
