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
            $blogs = getAllBlogs();

            for ($i = 0; $i < $blogs->num_rows; $i++) {
                $row = $blogs->fetch_assoc();

                echo '
                    <div class="card">
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