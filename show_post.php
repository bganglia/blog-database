<!DOCTYPE HTML>
<head> </head>
<body>
  <?php
    function showComments($comment_query) {
      $out = "";
      while ($row = $comment_query->fetch()) {
        $username = $row["author"];
        $comment_text = $row["content"];
        $out .= "<br>"
               ."<i>$username</i>"
               ."<br>"
               ."$comment_text";
      }
      return $out;
    }
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
    echo "<br><br><br>";
    echo "Comments";
    echo "<br><br><br>";
    echo showComments(getComments($postId));
  ?>
  <br><br><br>
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
