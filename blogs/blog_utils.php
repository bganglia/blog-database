<?php function display_post_preview($title, $summary_text, $author, $postId) {
        //Displays a preview containing the title and author on one line, followed by summary text.
        $post = '
          <div class="card mt-3 mb-3 ml-auto mr-auto w-75">
            <div class="card-body">
              <div class="d-flex flex-row justify-content-between">
                <div>
                  <a href="/posts/show_post.php?id='. $postId .'&blogId='. $postId .'"><b>'. $title .'</b></a>
                  <i> by '. $author .'</i>
                </div>
                <div>';
        if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
          $post .= '<a class="btn btn-warning" href="/posts/edit_post.php?postId='. $postId .'&blogId='. $_GET['id'] .'"><i style="color: white !important;" class="fa fa-pencil fa-lg"></i></a>
                    <a class="btn btn-danger" href="/posts/delete_post.php?postId='. $postId .'&blogId='. $_GET['id'] .'"><i class="fa fa-trash-o fa-lg"></i></a>';
        }
        $post .= ' 
                </div>
              </div>
              <br/>
              <p>'. $summary_text .'</p>
            </div>
          </div>
        ';

        return $post;
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
            echo $row["title"];
            $articles_preview .= display_post_preview($row["title"],
                                                      //Currently, get the summary by slicing the content
                                                      substr($row["content"],
                                                              0, $length_of_summary) . " ... ",
                                                      $row["authorName"],
                                                      $row["id"]);
          }
          else {
            echo " out"; 
            //Exit the loop if the results have run out early
            break;
          }
        }
        return $articles_preview;
      }

