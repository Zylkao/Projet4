<?php
namespace zylkaôme\OC_Projet4\Model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=OC_Projet4;charset=utf8', 'root', '');
        return $db;
    }
}
