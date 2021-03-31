<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use fb\classes\base;
use fb\classes\comment;

$path = '../usersImg/';

if (!is_dir($path)) {
    mkdir($path, 0777, true);
}

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['text'])) {
    if (isset($_FILES['picture'])) {
        $uploadfile = $path . basename($_FILES['picture']['name']);
        move_uploaded_file($_FILES['picture']['tmp_name'], $uploadfile);
        $comment = new comment($_POST['name'], $_POST['email'], $_POST['text'], $uploadfile);
    } else {
        $comment = new comment($_POST['name'], $_POST['email'], $_POST['text']);
    }
    $comment->saveToDB();
    unset($comment);

    if (!isset($_SESSION)) {
        session_start();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['postdata'] = $_POST;
        unset($_POST);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

$bd = new base();
$comments = $bd->select('*', 'comment', '1');
$comments = array_reverse($comments);

require_once "../templates/form.php";
