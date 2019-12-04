<head>
    <?php 
        include('./common/sql.php');

        $PAGE_TITLE = "Login";
        include('./common/head-tags.php');
    ?>
</head>
<body>
    <?php include('./common/header.php') ?>

    <div class="w-50 mr-auto ml-auto">
        <h3>Login</h3>
        <?php            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $user = array(
                    "username" => $_POST['username'],
                    "password" => $_POST['password']
                );

                $found = checkUser($user);

                if (isset($found['username'])) {
                    session_start();
                    $_SESSION['username'] = $found['username'];
                    $_SESSION['loggedIn'] = true;
                    $_SESSION['name'] = $found['name'];

                    if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
                        $uri = 'https://';
                    } else {
                        $uri = 'http://';
                    }
                    $uri .= $_SERVER['HTTP_HOST'];
                    header('Location: '.$uri.'/home');
                    exit;
                }
            }
        ?>
        <form class="w-75 mt-3 mr-auto ml-auto" action="/login.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" />
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
            </div>

            <input class="btn btn-primary float-right" type="submit" value="Login" />
        </form>
    </div>
</body>