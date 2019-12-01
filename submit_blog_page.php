<!DOCTYPE HTML>
<head> </head>
<body>
<?php
    //Connect to database
    $dbhost = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "Blogs";
    $conn = new mysqli($dbhost, $dbusername, $dbpassword, $dbname);
    if ($conn) {
      echo "working";
    }
    //Create query
    $text='INSERT INTO Posts(blogId, title, content, author) VALUES (?, ?, ?, ?)';
    echo $text;
    $insertion = $conn->prepare($text);
    if ($insertion) {
      echo "working";
    }
    $blogId = (int) $_POST["blogId"];
    $title = $_POST["title"];
    $content = $_POST["content"];
    $author = $_POST["author"];
    echo $blogId;
    echo $title;
    echo $content;
    echo $author;
    //echo $insertion;
    $insertion->bind_param("isss", $blogId, $title, $content, $author);
    echo $insertion->execute();
    $insertion->close();
    //Wrap up
    $conn->close();
    echo "Your post has been recieved";
?>
<body>
