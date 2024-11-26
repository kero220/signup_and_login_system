<?php
declare(strict_types=1);

function output_username(){
   if(isset($_SESSION["user_id"])){
      echo "Hello " . $_SESSION["username"] . "<br>"
      ."You logged as " . $_SESSION["user_id"];
   } else {
      echo "You are not logged in";
   }
}

function check_login_errors(){
   if(isset($_SESSION["error_login"])){
      $errors = $_SESSION["error_login"];

      echo "<br>";
      
      foreach($errors as $error){
         echo "<p class='form-error'>" . $error . "</p>";
      }

      unset($_SESSION["error_login"]);
      
   }
}