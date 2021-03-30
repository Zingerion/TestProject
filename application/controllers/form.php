<?php

require_once __DIR__ . '/../../vendor/autoload.php';

/*
if (isset($_POST['email']) and isset($_POST['pass'])) {
    $login = new Login($_POST['email'], $_POST['pass']);
    $user = new User($login->id);
}
*/

use fb\classes\Comment;

if($_GET['name'] && $_GET['email'] && $_GET['text']) {
    $comment = new Comment($_GET['id'], $_GET['email'], $_GET['text']);
    $comment->saveToDB();
}

require_once "../templates/form.php";
//require_once "../templates/form.php";
