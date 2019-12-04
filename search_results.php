<!DOCTYPE HTML>
<head> </head>
<body>
<?php
  include('common/head-tags.php');
  include('common/header.php');
  include('common/string_utils.php');
  include('common/sql.php');
  include('blogs/blog_utils.php');

  function countRows($query) {
    $count = 0;
    while ($row=$query->fetch()) {
      $count++;
    }
    return $count;
  }

  $search_tags = cleanTags($_GET["search"]);
  $max_display_no = 20;
  $postIdsToDisplay = searchResultPostIds($search_tags);
  $postsToDisplay = getPostsById($postIdsToDisplay);
  echo display_articles_preview($postsToDisplay, $max_display_no);
?>
</body>
