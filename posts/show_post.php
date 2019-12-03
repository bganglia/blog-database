<head>
    <?php 
      $PAGE_TITLE = "A Post";
      include('../common/head-tags.php');
    ?>
</head>
<body>
  <?php
    include('../common/header.php');
    include('../common/sql.php');
  ?>

  <div class="w-50 mr-auto ml-auto">
  <?php
    $blog = getBlog($_GET['blogId']);

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

    $postId = $_GET["id"];
    $post = getPost($postId);
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
      <input type="submit" name="submit" value="Comment">
      <br>
    </form>
  </div>
</body>
