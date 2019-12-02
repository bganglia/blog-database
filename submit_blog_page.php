<!DOCTYPE HTML>
<head> </head>
<body>
<?php
    //Connect to database
    include "common/sql.php";
    if ($conn) {
      echo "working";
    }
    //Create query
    $insertion=$conn->prepare('INSERT INTO Posts(blogId, title, content, author) '
                             .'VALUES (:blogId, :title, :content, :author)');
    $insertion->bindParam(":blogId",$_POST["blogId"]);
    $insertion->bindParam(":title",$_POST["title"]);
    $insertion->bindParam(":content",$_POST["content"]);
    $insertion->bindParam(":author",$_POST["author"]);
    $insertion->execute();
    echo "Your post has been recieved";
?>
<body>
