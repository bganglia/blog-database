<div class="mb-5 border-bottom">
  <div class="d-flex flex-row justify-content-between align-items-center mt-2 mb-2 mr-auto ml-auto" style="width: 60%;">
    <h1><a href="/home">Database Blog</a></h1>
    <div class="d-flex flex-row justify-content-between align-items-center">
      <form action="/search_results.php">
        <input type="text" name="search">
        <input class="btn btn-primary float-right" type="submit" value="Search" />
      </form>
      <?php
        if (!isset($_SESSION)) {
          session_start();
        }

        if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
          echo '
            <p class="mb-0">Hello, <i>'. $_SESSION['name'] .'</i></p>
            <a href="/logout.php" class="btn btn-primary ml-3 text-white">Logout</a>
          ';
        } else {
          echo '
            <a href="/login.php" class="btn btn-primary mr-1 text-white">Login</a>
            <a href="/signup.php" class="btn btn-primary text-white">Sign Up</a>
          ';
        }
      ?>
    </div>
  </div>
</div>
