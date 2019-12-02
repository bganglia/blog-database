<head>
    <?php include('../common/head-tags.php') ?>
</head>

<body>
<?php
  include('../common/header.php');

  $max_results_no = 20;
  function display_post_preview($title, $summary_text, $author) {
    //Displays a preview containing the title and author on one line, followed by summary text.
    return "<b>$title</b>"
          ."<i> by $author</i>"
          ."<br>"
          ."<p>$summary_text</p>";
  }
  function display_articles_preview($table, &$title, &$author, &$content, $max_no) {
    //Displays the first $max_no results from the blog using display_post_preview
    $number_displayed = 0;
    $length_of_summary = 240; //Random number of characters
    $articles_preview = "";
    while ($number_displayed <= $max_no) {
      $number_displayed++;
      if ($table->fetch()) {
        //Display each item that exists
        $articles_preview .= display_post_preview($title,
                                                  //Currently, get the summary by slicing the content
                                                  substr($content,
                                                          0, $length_of_summary) . " ... ",
                                                  $author);
      }
      else {
        //Exit the loop if the results have run out early
        break;
      }
    }
    return $articles_preview;
  }
  function display_blog_info($table, &$blog_title, &$description, &$owner) {
    //Only expects one result
    $table->fetch();
    $blog_title = $table["title"];
    $
    return "<b>$blog_title</b>"
          ."<p>$description</p>"
          ."<p>owned by $owner";
  }
  $blogId = (int) $_GET["id"];
  //Display blog title, owner, and description

  $blog_info = $conn->prepare("SELECT title, description, owner "
                             ."FROM Blogs "
                             ."WHERE id = :id");
  $blog_info->execute(array(":id" => $blogId));
  echo display_blog_info($blog_info, $blog_title, $description, $owner);
  $blog_info->close();

  echo "<br><br><br>";

  //Display posts from blog

  $post_summaries = $conn->prepare("SELECT title, author, content "
                         ."FROM Posts "
                         ."WHERE blogId = :blogId");
  $post_summaries->execute(array(":blogId" => $blogId)); //Add safekeeping code
  echo display_articles_preview($post_summaries, $post_title, $author, $content, $max_results_no);


  //See the following pages for related documentation:
  // https://www.php.net/manual/es/mysqli-stmt.fetch.php
  // https://www.php.net/manual/es/mysqli-stmt.execute.php
?>
</body>
