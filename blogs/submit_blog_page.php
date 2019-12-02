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
      $tags = explode($tag_text," ");
      return $tags;
    }
    //function
    //Create query
    $insertion=$conn->prepare('INSERT INTO Posts(blogId, title, content, author) '
                             .'VALUES (:blogId, :title, :content, :author)');
    $insertion->bindParam(":blogId",$_POST["blogId"]);
    $insertion->bindParam(":title",$_POST["title"]);
    $insertion->bindParam(":content",$_POST["content"]);
    $insertion->bindParam(":author",$_POST["author"]);
    $insertion->execute();
    $insertion->fetch();
//    $postId = getPostId($blogId, $title, $content, $author);
//    $tags = cleanTags($_POST["tags"]);
//    for ($tags as $tag) {
//      addTag($tag, $postId);
//    }
    echo "Your post has been recieved";
?>
<body>
