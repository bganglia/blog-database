<?php $PAGE_TITLE="Home" ?>

<head>
    <?php include('../common/head-tags.php') ?>
</head>

<body>
    <?php 
        include('../common/header.php');
        include('../common/sql.php');
    ?>

    <div class="d-flex flex-column ml-auto mr-auto" style="width: 75%;">
        <?php
            if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
              echo '<a href="/blogs/create_blog.php" class="btn btn-primary mr-1 text-white">Create a new blog</a>';
            }

            $blogs = getAllBlogs();

            foreach ($blogs as $row) {
                echo '
                    <div class="card mt-1 mb-1">
                        <div class="card-body">
                            <div class="card-title d-flex flex-row justify-content-between">
                                <h3><a href="/blogs?id='. $row['id'] .'">'. $row['title'] .'</a></h3>
                                <p>Owner: '. $row['ownerName'] .'</p>
                            </div>
                            <p class="card-text">'. $row['description'] .'</p>
                        </div>
                    </div>
                ';
            }
        ?>
    </div>
</body>
