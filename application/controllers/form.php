<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use fb\classes\base;
use fb\classes\comment;

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['text'])) {
    if (isset($_POST['file'])) {
        $comment = new comment($_POST['name'], $_POST['email'], $_POST['text'], $_POST['file']);
    }
    else {
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
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
    }
}

$bd = new base();
$comments = $bd->select('*', 'comment', '1');

require_once "../templates/form.php";
