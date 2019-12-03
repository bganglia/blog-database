<head>
    <?php
      include('../common/sql.php');

      $postId = $_GET['id'];
      $post = getPost($postId);

      $PAGE_TITLE = $post['title'];
      include('../common/head-tags.php');
    ?>
</head>
<body>
  <?php include('../common/header.php') ?>

  <div class="w-50 mr-auto ml-auto">
    <?php
      $blog = getBlog($_GET['blogId']);

      echo "<h3 class=\"text-center\"><a href=\"/blogs?id=". $blog['id'] ."\">". $blog['title'] ."</a>: ". $post['title'] ."</h3>";
      echo "<p class=\"text-center\"><i>by ". $post['authorName'] ."</i></p>";

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
    ?>
    
    <div class="border-bottom border-top pb-4 pt-4 mb-4">
      <?php
        $content = $post["content"];
        echo $content;
      ?>
    </div>
    
    <div>
      <p style="font-size: 20px;">Comments</h4>
      <?php 
        echo showComments(getComments($postId));
      ?>
    </div>

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
