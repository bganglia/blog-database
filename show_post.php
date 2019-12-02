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
  <br>
  <br>
  <form action="submit_comment.php" method="post">
    Comment
    <br>
    Author
    <br>
    <input type="text" name="author">
    <br>
    Text
    <br>
    <textarea name="comment"> </textarea>
    <br>
    Post commented on
    <br>
    <input type="number" name="postId">
    <br>
    <input type="submit" name="submit" value="Comment">
    <br>
  </form>
</body>
