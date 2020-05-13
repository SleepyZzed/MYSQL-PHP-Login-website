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
      }
      if (isset($_GET["success"])) {
        if ($_GET["success"] == "verifycomplete") {
          echo '<p class="signupsuccess">Your email address has been verified!</p>';
        }
      }
      if(isset($_SESSION['id'])){
        echo '<p class="login-status">You are logged in as:', $_SESSION['uid'], '<br>email address: ', $_SESSION['email'], '</p>';
        
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
