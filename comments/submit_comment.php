<?php
  session_start();
  include("../common/sql.php");

  if (!isset($_GET['postId']) || !isset($_GET['blogId']) || $_SERVER['REQUEST_METHOD'] != 'POST') {
    die();
  } else {
    $comment = array(
      "author"   => $_SESSION['username'],
      "content" => $_POST['content'],
    );

    createComment($_GET['postId'], $comment);

    if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
        $uri = 'https://';
    } else {
        $uri = 'http://';
    }
    $uri .= $_SERVER['HTTP_HOST'];
    header('Location: '.$uri.'/posts/show_post.php?id=' . $_GET['postId'] . '&blogId=' . $_GET['blogId']);
    exit;
  }
?>