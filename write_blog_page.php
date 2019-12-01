<!DOCTYPE HTML>
<head> </head>
<body>
  <!-- TODO: Limit input length -->
  <form action="submit_blog_page.php" method="post">
    blogId
    <br>
    <input type="number" name="blogId">
    <br>
    Title
    <br>
    <input type="text" name="title">
    <br>
    Author
    <br>
    <input type="text" name="author">
    <br>
    Content
    <br>
    <textarea name="content"> </textarea>
    <br>
    <input type="submit" name="submission" value="Submit">
  </form>

<!--
references:
Multi-line text area
http://www.learningaboutelectronics.com/Articles/How-to-create-a-multi-line-text-input-text-area-in-HTML.php
http://www.learningaboutelectronics.com/Articles/How-to-retrieve-data-from-a-textarea-with-PHP.php
-->

</body>
