<!DOCTYPE HTML>
<head> </head>
<body>
<?php
    //Connect to database
    include "common/utils.php";
    $conn = getConnection();
    if ($conn) {
      echo "working";
    }
    //Create query
    $text='INSERT INTO Posts(blogId, title, content, author, date) VALUES (?, ?, ?, ?, ?)';
    echo $text;
    $insertion = $conn->prepare($text);
    if ($insertion) {
      echo "working";
    }
    $blogId = (int) $_POST["blogId"];
    $title = $_POST["title"];
    $content = $_POST["content"];
    $author = $_POST["author"];
    $time = time();
    //echo $insertion;
    $insertion->bind_param("isssi", $blogId, $title, $content, $author, $time);
    echo $insertion->execute();
    $insertion->close();
    //Wrap up
    $conn->close();
    echo "Your post has been recieved";
?>
<body>
