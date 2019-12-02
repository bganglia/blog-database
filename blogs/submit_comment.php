<?php
  include("../common/sql.php");
  $comment_insertion = $conn->prepare("INSERT INTO Comments (author, content, postId) "
                                     ."VALUES (:author, :content, :postId)");
  $comment_insertion->bindParam(":author",$_POST["author"]);
  $comment_insertion->bindParam(":content",$_POST["comment"]);
  $comment_insertion->bindParam(":postId",$_POST["postId"]);
  echo $_POST["author"] . $_POST["comment"] . $_POST["postId"];
  $comment_insertion->execute();
  echo "all good";
