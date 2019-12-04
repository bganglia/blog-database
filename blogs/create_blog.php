<head>
    <?php 
        $PAGE_TITLE = "Create Post";
        include("../common/head-tags.php");
    ?>
</head>
<body>
    <?php 
        include("../common/string_utils.php");
        include("../common/header.php");
        include("../common/sql.php"); ?>
    <div class="w-50 mr-auto ml-auto">
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $blogId = createBlog($_POST["title"],$_POST["description"],$_SESSION["username"]);
                if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
                    $uri = 'https://';
                } else {
                    $uri = 'http://';
                }
                $uri .= $_SERVER['HTTP_HOST'];
                header('Location: '.$uri.'/blogs?id=' . $blogId);
                exit;
           }
           else {
                echo '<form action=create_blog.php method="post">' .
                     '  <input type="text" name="title" />' .
                     '  <textarea name="description"></textarea>' .
                     '  <input type="submit" name="submit" value="Create" />' .
                     '</form>';
           }
        ?> 
    </div>
</body>
