<?php

require_once "include/config.php";
require_once "include/signup_view.inc.php";
require_once "include/login_view.inc.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="test/main.css">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body>

   <!-- LOHIN FORM -->

   <?php
   if(isset($_SESSION["user_id"])){ // LOGGED IN SUCCESS
      echo "<h3>";
      echo "Hello " . $_SESSION["username"] . "<br>"
      ."You logged as " . $_SESSION["user_id"];
      echo "</h3>";

      echo "<style>";
      echo ".container.signup{display: none;}";
      echo "</style>";
   }
   else {   // DID NOT LOGIN ?>
   <div class="container">
      <h3>Login</h3>

      <form action="include/login.inc.php" method="POST">
         <input type="text" name="username" placeholder="Username">
         <input type="password" name="pwd" placeholder="Password">
         <button>Login</button>
      </form>
      <?php }?>

      <?php
      check_login_errors();
      ?>
   </div>

   <!-- ================================================================ -->
   <!-- SIGNUP FORM -->

   <?php

   if(isset($_GET["signup"]) && $_GET["signup"] === "success"){  /* <= SECURITY ISSUES*/
      echo "<h3 class='form-success'>";
      echo "Signup success!"; // SIGNUP SUCCESS
      echo "</h3>";
   } else { // DID NOT SIGNUP ?>

   <div class="container signup">
      <h3>Signup</h3>

      <form action="include/signup.inc.php" method="POST">
         <?php
            signup_input();
            ?>
         <button>Signup</button>
      </form>
      <?php }?>

      <?php
         check_signup_errors();
         ?>
   </div>

   <!-- ================================================================ -->
   <!-- lOGOUT FORM -->

   <div class="container">
      <form action="include/logout.inc.php" method="POST">
         <button>Logout</button>
      </form>
   </div>
</body>

</html>