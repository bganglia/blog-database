<?php
    include('./common/sql.php');
    session_start();

    unset($_SESSION['username']);
    unset($_SESSION['loggedIn']);
    unset($_SESSION['name']);

    if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
        $uri = 'https://';
    } else {
        $uri = 'http://';
    }
    $uri .= $_SERVER['HTTP_HOST'];
    header('Location: '.$uri.'/home');
    exit;
?>