<!DOCTYPE HTML>
<head> </head>
<body>
<?php
    //Connect to database
    include "../common/sql.php";
    if ($conn) {
      echo "working";
    }
    function cleanTags ($tag_text) {
      //Currently only supports space delimiter
      $tags = explode(" ",$tag_text);
      return $tags;
    }
    //function
    //Create query
    //Check: is this solution thread-safe for our purposes? https://stackoverflow.com/questions/30959678/thread-safety-of-mysqls-select-last-insert-id
    $insertion=$conn->prepare('INSERT INTO Posts(blogId, title, content, author) '
                             .'VALUES (:blogId, :title, :content, :author); ');
    $insertion->bindParam(":blogId",$_POST["blogId"]);
    $insertion->bindParam(":title",$_POST["title"]);
    $insertion->bindParam(":content",$_POST["content"]);
    $insertion->bindParam(":author",$_POST["author"]);
    $insertion->execute();
    $postId = $conn->lastInsertId();
    $tags = cleanTags($_POST["tags"]);
    foreach ($tags as $tag) {
      echo $tag;
      echo "id";
      echo $postId;
      echo "/id";
      addTag($tag, $postId);
    }
    echo "Your post has been recieved";
?>
<body>
