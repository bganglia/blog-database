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
          $authorName = $row["authorName"];
          $comment_text = $row["content"];
          $out .= '
            <i>'. $authorName .'</i>
            <br/>
            <p>'. $comment_text .'</p>
            <br/>
          ';
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
      <p class="mb-2" style="font-size: 20px;">Comments</p>
      <?php 
        echo showComments(getComments($postId));
      ?>
    </div>

    <br>

    <?php
      echo '
        <form action="/comments/submit_comment.php?blogId='. $blog['id'] .'&postId='. $postId .'" method="post">
          Comment
          <br>
          Author
          <br>
          <input type="text" name="author">
          <br>
          Text
          <br>
          <textarea name="content"> </textarea>
          <br>
          <input type="submit" name="submit" value="Comment">
          <br>
        </form>
      ';
    ?>
  </div>
</body>
