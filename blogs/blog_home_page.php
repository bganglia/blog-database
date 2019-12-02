<head>
    <?php include('../common/head-tags.php') ?>
</head>

<body>
<?php
  include('../common/header.php');
  include('../common/sql.php');

  $max_results_no = 20;
  function display_post_preview($title, $summary_text, $author) {
    //Displays a preview containing the title and author on one line, followed by summary text.
    return "<b>$title</b>"
          ."<i> by $author</i>"
          ."<br>"
          ."<p>$summary_text</p>";
  }
  function display_articles_preview($table, $max_no) {
    //Displays the first $max_no results from the blog using display_post_preview
    $number_displayed = 0;
    $length_of_summary = 240; //Random number of characters
    $articles_preview = "";
    while ($number_displayed <= $max_no) {
      $number_displayed++;
      if ($row=$table->fetch()) {
        //Display each item that exists
        $articles_preview .= display_post_preview($row["title"],
                                                  //Currently, get the summary by slicing the content
                                                  substr($row["content"],
                                                          0, $length_of_summary) . " ... ",
                                                  $row["author"]);
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
  $blogId = (int) $_GET["blogId"];

  //Display blog title, owner, and description
  echo display_blog_info(getBlog($blogId));
  echo "<br><br><br>";
  //Display posts from blog
  echo display_articles_preview(getPosts($blogId), $max_results_no);

  //See the following pages for related documentation:
  // https://www.php.net/manual/es/mysqli-stmt.fetch.php
  // https://www.php.net/manual/es/mysqli-stmt.execute.php
?>
</body>
