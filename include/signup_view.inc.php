<?php

declare(strict_types=1);

function signup_input(){
   if(isset($_SESSION["signup_data"]["username"]) &&
      !isset($_SESSION["error_signup"]["username_taken"])){
      echo '<input type="text" name="username" placeholder="Username" value= "' . $_SESSION["signup_data"]["username"] . '">';
   } else {
      echo '<input type="text" name="username" placeholder="Username">';
   }

   echo '<input type="password" name="pwd" placeholder="Password">';

   if(isset($_SESSION["signup_data"]["email"]) &&
      !isset($_SESSION["error_signup"]["email_taken"]) &&
      !isset($_SESSION["error_signup"]["invalid_email"])){
      echo '<input type="text" name="email" placeholder="E-mail" value= "' . $_SESSION["signup_data"]["email"] . '">';
   } else {
      echo '<input type="text" name="email" placeholder="E-mail">';
   }
}

function check_signup_errors(){
   if(isset($_SESSION["error_signup"])){
      $errors = $_SESSION["error_signup"];

      echo "<br>";

      foreach($errors as $error){
         echo "<p class='form-error'>" . $error . "</p>";
      }

      unset($_SESSION["error_signup"]);
   }
}