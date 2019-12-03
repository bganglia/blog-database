<?php
    include("../common/sql.php");

    if (!isset($_GET['postId']) || !isset($_GET['blogId'])) {
        die();
    } else {
        deletePost($_GET['postId']);
        
        if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
            $uri = 'https://';
        } else {
            $uri = 'http://';
        }
        $uri .= $_SERVER['HTTP_HOST'];
        header('Location: '.$uri.'/blogs?id=' . $_GET['blogId']);
	    exit;
    }
?>