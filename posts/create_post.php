<!DOCTYPE HTML>
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
        <h3>Create a Post</h3>
        <?php            
            if (!isset($_GET['blogId'])) {
                die();
            }

            $blog = getBlog($_GET['blogId']);
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $post = array(
                    "title"   => $_POST['title'],
                    "content" => $_POST['content'],
                    "author"  => $_POST['author']
                );

                createPost($_GET['blogId'], $post);
                echo 'Post created. <a href="/blogs?id='. $_GET['blogId'] .'">Click here to return to blog.</a>';
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

                        <div class="form-group">
                            <label for="postAuthor">Author\'s Username</label>
                            <input type="text" class="form-control" id="postAuthor" name="author" placeholder="Enter Author" />
                        </div>

                        <input class="btn btn-primary float-right" type="submit" value="Submit" />
                    </form>
                ';
            }
        ?>
    </div>
<body>
