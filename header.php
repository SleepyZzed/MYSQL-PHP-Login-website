<?php
session_start();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="This is an example of a meta description. This will often show up in search results.">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css?version=51">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
   

  
  </head>
  <body>

    <!-- Here is the header where I decided to include the login form -->
    <header>
      <nav class="nav-header-main">
        <a class="header-logo" href="index.php">
          <img src="img/log1o.png" alt="logo">
        </a>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="#">Profile</a></li>
          <li><a href="#">About us</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </nav>
      <div class="header-login">
    <!-- Post is used instead of get because it is more secure and does not show the contents of the form when sent -->
    <?php
    if(isset($_SESSION['id'])){
     echo '<form action="includes/logout.inc.php" method="post">
      <button type="submit" name="logout-submit">Logout</button>
    </form>';
    }
    else{
      echo '<form action="includes/login.inc.php" method="post">
      <input type="text" name="mailuid" autocomplete="off" placeholder="E-Mail..">
      <input type="password" name="pwd" autocomplete="off" placeholder="Password..">
      <button type="submit" name="login-submit">Login</button>
    </form>
    <div class="header-signup">
    <a href="signup.php">Signup</a>
    </div>';
    }
    ?>
    
    
    </div>
    </nav>
      
    </header>
