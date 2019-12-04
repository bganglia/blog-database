<head>
    <?php 
        $PAGE_TITLE = "Create Post";
        include("../common/head-tags.php");
    ?>
</head>
<body>
    <?php 
        include("../common/header.php");
        include("../common/sql.php"); ?>

    <div class="w-50 mr-auto ml-auto">
        <?php            
            if (!isset($_GET['blogId'])) {
                die();
            }

            $blog = getBlog($_GET['blogId']);
            echo '<h3>Create a Post for '. $blog['title'] .'</h3>';
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $post = array(
                    "title"   => $_POST['title'],
                    "content" => $_POST['content'],
                    "author"  => $_SESSION['username']
                );

                $postId = createPost($_GET['blogId'], $post);
                
                if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
                    $uri = 'https://';
                } else {
                    $uri = 'http://';
                }
                $uri .= $_SERVER['HTTP_HOST'];
                header('Location: '.$uri.'/posts/show_post.php?id=' . $postId . '&blogId=' . $blog['id']);
                exit;
            } else {
                echo '    
                    <form class="w-75 mt-3 mr-auto ml-auto" action="/posts/create_post.php?blogId='. $_GET['blogId'] .'" method="post">
                        <div class="form-group">
                            <label for="postTitle">Title</label>
                            <input type="text" class="form-control" id="postTitle" name="title" placeholder="Enter Title" />
                        </div>

                        <div class="form-group">
                            <label for="postContent">Content</label>
                            <textarea class="form-control" id="postContent" name="content" rows="4"></textarea>
                        </div>

                        <a class="btn btn-danger" href="/blogs?id='. $blog['id'] .'">Cancel</a>
                        <input class="btn btn-primary float-right" type="submit" value="Submit" />
                    </form>
                ';
            }
        ?>
    </div>
<body>
