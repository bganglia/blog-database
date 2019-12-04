<?php $PAGE_TITLE="Home" ?>

<head>
    <?php include('../common/head-tags.php') ?>
</head>

<body>
    <?php
        include('../common/header.php');
        include('../common/sql.php');
        include('../blogs/blog_utils.php');
    ?>

    <div class="d-flex flex-column ml-auto mr-auto" style="width: 75%;">
        <?php
            if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
              echo '<a href="/blogs/create_blog.php" class="btn btn-primary mr-1 text-white">Create a new blog</a>';
            }

            $blogs = getAllBlogs();

            foreach ($blogs as $row) {
                echo blogPreview($row['id'], $row['title'], $row['ownerName'], $row['description']);
            }
        ?>
    </div>
</body>
