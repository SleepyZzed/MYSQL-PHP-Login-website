<?php
  // To make sure we don't need to create the header section of the website on multiple pages, we instead create the header HTML markup in a separate file which we then attach to the top of every HTML page on our website. In this way if we need to make a small change to our header we just need to do it in one place. This is a VERY cool feature in PHP!
  require "header.php";
?>

    <main>
    <div class="wrapper-main">
      <section class="section-default">
      <?php
       if (isset($_GET["error"])) {
        if ($_GET["error"] == "alreadyverified") {
          echo '<p class="signuperror">This email address is already verified</p>';
        }
        if ($_GET["error"] == "emptyfields") {
          echo '<p class="signuperror">Login fields are empty please input username and password</p>';
        }
        if ($_GET["error"] == "wrongpwd") {
          echo '<p class="signuperror">Password and is incorrect please try again</p>';
        }
      }
      if (isset($_GET["success"])) {
        if ($_GET["success"] == "verifycomplete") {
          echo '<p class="signupsuccess">Your email address has been verified please login to access your account!</p>';
        }
        
      }
      if (isset($_GET["login"])) {
        if ($_GET["login"] == "wronguidpwd") {
          echo '<p class="signuperror">Incorrect username and password</p>';
        }
        
      }
      if(isset($_SESSION['id'])){
        if($_SESSION['verified'] == "0")
        {
          $vrfyMsg = "Your account is not verified please check your emails";
          $classmsg = '<p class="signuperror">';
          echo $classmsg, $vrfyMsg,'<br><br></p>';
          echo '<p class="login-status">You are logged in as:', $_SESSION['uid'], '<br>email address: ', $_SESSION['email'], '</p>';
        }
        else if($_SESSION['verified'] == "1")
        { 
          $vrfyMsg = "Your account is verified thank you for using this service";
          $classmsg = '<p class="signupsuccess">';
          echo $classmsg, $vrfyMsg,'<br><br></p>';
          echo '<p class="login-status">You are logged in as:', $_SESSION['uid'], '<br>email address: ', $_SESSION['email'], '</p>';
        }
       
        
      }
      else{
        echo '<p class="login-status">You are logged out</p>';
      }
      ?>
       
        
      </section>
    </div>
    </main>

<?php
  // And just like we include the header from a separate file, we do the same with the footer.
  require "footer.php";
?>
