<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function welcome()
{
    $postManager = new \zylkaôme\OC_Projet4\model\PostManager();
    $posts = $postManager->getPosts();

    require('view\frontend\main_page.php');
}
