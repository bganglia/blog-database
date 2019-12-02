<?php 

include('../common/sql.php');

switch($_SERVER['REQUEST_METHOD']) {
    case "GET":
        echo $_SERVER['REQUEST_METHOD'].' '.$_GET['id'];
        // include_once("./blog-page.php");
        break;
    case "DELETE":
        if ($_GET['id']) {
            deleteBlog($_GET['id']);
            echo "Deleted.";
        }
        break;
}


?>