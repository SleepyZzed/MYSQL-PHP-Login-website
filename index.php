<?php
  // To make it so the header does not need to be recreated for each page a require is used, this allows for changes to be made from one page which will then show on each page the require is inserted into
  require "header.php";
?>
<!-- main wrapper for content of the page -->
    <main>
    <div class="wrapper-main">
      <section class="section-default">
      <?php
      //error handeling to check if user is verified or for field error handling
       if (isset($_GET["error"])) {
        if ($_GET["error"] == "alreadyverified") {
          echo '<p class="signuperror">This email address is already verified</p>';
        }
        //error handeling to check if user is verified or for field error handling
        if ($_GET["error"] == "emptyfields") {
          echo '<p class="signuperror">Login fields are empty please input username and password</p>';
        }
        //error handeling to check if user is verified or for field error handling
        if ($_GET["error"] == "wrongpwd") {
          echo '<p class="signuperror">Password and is incorrect please try again</p>';
        }
      }
      //error handeling to check if user is verified or for field error handling
      if (isset($_GET["success"])) {
        if ($_GET["success"] == "verifycomplete") {
          echo '<p class="signupsuccess">Your email address has been verified please login to access your account!</p>';
        }
        
      }
      //error handeling to check if user is verified or for field error handling
      if (isset($_GET["login"])) {
        if ($_GET["login"] == "wronguidpwd") {
          echo '<p class="signuperror">Incorrect username and password</p>';
        }
        
      }
      //checks if user is verified or not to display message on when logged in
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
