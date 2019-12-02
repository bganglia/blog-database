<!DOCTYPE HTML>
<head> </head>
<body>
  <?php
    include "common/sql.php";
    $postId = $_GET["postId"];
    $post = getPost($postId);
    $title_accessor = "p.title";
    $content_accessor = "p.content";
    $title = $post["title"];
    $content = $post["content"];
    echo $title;
    echo "<br><br><br>";
    echo $content;
  ?>
</body>
