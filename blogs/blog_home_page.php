<head>
    <?php
      $blogId = $_GET['id'];
      $blog = getBlog($blogId);

      $PAGE_TITLE = $blog['title'];
      include('../common/head-tags.php');
    ?>
</head>

<body>
  <?php include('../common/header.php') ?>

  <div class="w-50 ml-auto mr-auto">
    <?php
      include('blog_utils.php');
      $max_results_no = 20;
      function display_blog_info($row) {
        //Only expects one result
        $blog_title = $row["title"];
        $description = $row["description"];
        $owner = $row["owner"];
        return "<b>$blog_title</b>"
              ."<p>$description</p>"
              ."<p>owned by $owner";
      }

      if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
        echo '
          <a class="btn btn-primary" role="button" href="/posts/create_post.php?blogId='. $blogId .'">Create Post</a>
          <br/><br/>
        ';
      }

      //Display blog title, owner, and description
      echo display_blog_info($blog);
      echo "<br/><br/><br/>";
      //Display posts from blog
      echo display_articles_preview(getPosts($blogId), $max_results_no);

      //See the following pages for related documentation:
      // https://www.php.net/manual/es/mysqli-stmt.fetch.php
      // https://www.php.net/manual/es/mysqli-stmt.execute.php
    ?>
  </div>

</body>
