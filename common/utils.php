<?php
    //Connect to database
    function getConnection() {
      $dbhost = "localhost";
      $dbusername = "root";
      $dbpassword = "";
      $dbname = "Blogs";
      $conn = new mysqli($dbhost, $dbusername, $dbpassword, $dbname);
      return $conn;
    }
