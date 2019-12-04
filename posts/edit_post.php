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
            if (!isset($_GET['blogId']) || !isset($_GET['postId'])) {
                die();
            }

            $blog = getBlog($_GET['blogId']);
            $oldPost = getPost($_GET['postId']);
            echo '<h3>Edit Post in '. $blog['title'] .'</h3>';
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $post = array(
                    "title"   => $_POST['title'],
                    "content" => $_POST['content'],
                    "author"  => $_SESSION['username']
                );

                updatePost($_GET['postId'], $post);
                
                if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
                    $uri = 'https://';
                } else {
                    $uri = 'http://';
                }
                $uri .= $_SERVER['HTTP_HOST'];
                header('Location: '.$uri.'/posts/show_post.php?id=' . $_GET['postId'] . '&blogId=' . $blog['id']);
                exit;
            } else {
                echo '    
                    <form class="w-75 mt-3 mr-auto ml-auto" action="/posts/edit_post.php?blogId='. $_GET['blogId'] .'&postId='. $_GET['postId'] .'" method="post">
                        <div class="form-group">
                            <label for="postTitle">Title</label>
                            <input type="text" class="form-control" id="postTitle" name="title" placeholder="Enter Title" value="'. $oldPost['title'] .'" />
                        </div>

                        <div class="form-group">
                            <label for="postContent">Content</label>
                            <textarea class="form-control" id="postContent" name="content" rows="4">'. $oldPost['content'] .'</textarea>
                        </div>

                        <a class="btn btn-danger" href="/blogs?id='. $blog['id'] .'">Cancel</a>
                        <input class="btn btn-primary float-right" type="submit" value="Submit" />
                    </form>
                ';
            }
        ?>
    </div>
<body>
