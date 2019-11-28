<!DOCTYPE HTML>
<head> </head>
<body>
<!-- Code projects against SQL injection, perhaps unnecessarily. -->
<!-- FYI you must add the host and password yourself. They come from the code examples given out in class. -->
<!-- Currently, this code simply creates a post without actually linking it to any blog. This will have to be fixed. -->
<?php
    //Connect to database
    $dbhost = "localhost";
    $dbusername = "root";
    $dbpassword = ""; // not sure if I should be committing thiS
    $dbname = "blogs";
    $conn = new mysqli($dbhost, $dbusername, $dbpassword, $dbname);
    //Create query
    $insertion = $conn->prepare("INSERT INTO Post(pid, postTitle, subTitle, shortTitle, summary, text_content)".
                                "VALUES(?, ?, ?, ?, ?, ?)")
    //Extract and bind values
    function columnFromTable($table, $column) {
      // ... still has to be written ...
    }
    function getBlogPID() {
     // ... still has to be written ...
     // current plan is to take the maximum pid + 1.
     // this is not scaleable but will get the page on its feet.
    }
    $pid = getBlogPID();
    $postTitle = $_POST("title");
    $subTitle = $_POST("subtitle");
    $shortTitle = $_POST("short_title");
    $summary = $_POST("summary");
    $text_content = $_POST("content");
    $insertion->bind_param("ssssss", $pid, $postTitle, $subTitle, $shortTitle, $summary, $text_content);
    //Wrap up
    $conn->close()
    echo "Your post has been recieved"
?>
<!-- It might be nice to redirect to the actual post. -->
</body>

