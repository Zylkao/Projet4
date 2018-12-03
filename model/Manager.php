<?php
namespace zylkaôme\Projet_OC\Projet4\model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=OC_Projet4;charset=utf8', 'root', '');
        return $db;
    }
}
