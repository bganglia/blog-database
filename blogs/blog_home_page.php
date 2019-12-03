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
      $max_results_no = 20;
      function display_post_preview($title, $summary_text, $author, $postId) {
        //Displays a preview containing the title and author on one line, followed by summary text.
        return '
          <div class="card mt-3 mb-3 ml-auto mr-auto w-75">
            <div class="card-body">
              <div class="d-flex flex-row justify-content-between">
                <div>
                  <a href="/posts/show_post.php?id='. $postId .'&blogId='. $_GET['id'] .'"><b>'. $title .'</b></a>
                  <i> by '. $author .'</i>
                </div>
                <a class="btn btn-danger" href="/posts/delete_post.php?postId='. $postId .'&blogId='. $_GET['id'] .'"><i class="fa fa-trash-o fa-lg"></i></a>
              </div>
              <br/>
              <p>'. $summary_text .'</p>
            </div>
          </div>
        ';
      }
      function display_articles_preview($table, $max_no) {
        //Displays the first $max_no results from the blog using display_post_preview
        $number_displayed = 0;
        $length_of_summary = 180; //Random number of characters
        $articles_preview = "";
        while ($number_displayed <= $max_no) {
          $number_displayed++;
          if ($row=$table->fetch()) {
            //Display each item that exists
            $articles_preview .= display_post_preview($row["title"],
                                                      //Currently, get the summary by slicing the content
                                                      substr($row["content"],
                                                              0, $length_of_summary) . " ... ",
                                                      $row["authorName"],
                                                      $row["id"]);
          }
          else {
            //Exit the loop if the results have run out early
            break;
          }
        }
        return $articles_preview;
      }
      function display_blog_info($row) {
        //Only expects one result
        $blog_title = $row["title"];
        $description = $row["description"];
        $owner = $row["owner"];
        return "<b>$blog_title</b>"
              ."<p>$description</p>"
              ."<p>owned by $owner";
      }

      echo '
        <a class="btn btn-primary" role="button" href="/posts/create_post.php?blogId='. $blogId .'">Create Post</a>
        <br/><br/>
      ';

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
