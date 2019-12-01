<!DOCTYPE HTML>
<head> </head>
<body>
<?php
  include "common/utils.php";
  $conn=getConnection();
  $max_results_no = 20;
  function display_post_preview($title, $summary_text, $author) {
    //Displays a preview containing the title and author on one line, followed by summary text.
    return "<b>$title</b>"
          ."<i> by $author</i>"
          ."<br>"
          ."<p>$summary_text</p>";
  }
  function display_blog($table, &$title, &$author, &$content, $max_no) {
    //Displays the first $max_no results from the blog using display_post_preview
    $number_displayed = 0;
    $length_of_summary = 240; //Random number of characters
    while ($number_displayed <= $max_no) {
      $number_displayed++;
      if ($table->fetch()) {
        //Display each item that exists
        echo display_post_preview($title,
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
  }
  $blogId = (int) $_GET["blogId"];
  //Protect against SQL injection while making query
  $query = $conn->prepare("SELECT title, author, content FROM Posts "
                         ."WHERE blogId = ?");
  $query->bind_param("i",$blogId);
  $query->execute(); //Add safekeeping code
  $query->bind_result($title, $author, $content);
  display_blog($query, $title, $author, $content, $max_results_no);
  //See the following pages for related documentation:
  // https://www.php.net/manual/es/mysqli-stmt.fetch.php
  // https://www.php.net/manual/es/mysqli-stmt.execute.php
?>
</body>
