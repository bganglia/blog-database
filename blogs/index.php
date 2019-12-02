<?php 

include('../common/sql.php');

switch($_SERVER['REQUEST_METHOD']) {
    case "GET":
        include_once("./blog_home_page.php");
        break;
    case "DELETE":
        if ($_GET['id']) {
            deleteBlog($_GET['id']);
            echo "Deleted.";
        }
        break;
}


?>