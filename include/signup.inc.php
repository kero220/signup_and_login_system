<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
   $username = $_POST['username'];
   $pwd = $_POST['pwd'];
   $email = $_POST['email'];

   try{
      require_once "connection.php";
      require_once "signup_contr.inc.php";
      require_once "signup_view.inc.php";
      require_once "signup_model.inc.php";
      
      // ERROR HANDELERS
      $errors = [];

      if(is_empty($username, $pwd, $email)){
         $errors["empty_input"] = "Fill in all fields!";
      }
      if(is_valid($email)){
         $errors["invalid_email"] = "Invalid email used!";
      }
      if(is_username_taken($PDO,$username)){
         $errors["username_taken"] = "Username is already used!";
      }
      if(is_email_registered($PDO,$email)){
         $errors["email_taken"] = "Email is already registered!";
      }

      require_once "config.php";
      
      if($errors){
         $_SESSION["error_signup"] = $errors;

         $signupData = [
            "username" => $username,
            "email" => $email
         ];

         $_SESSION["signup_data"] = $signupData;

         header("Location: ../index.php");
         die();
      }

      // NO ERRORS
      create_user($PDO, $username, $pwd, $email);
      
      header("Location: ../index.php?signup=success");
      $PDO = NULL;
      $stmt = NULL;
      die();

   } catch(PDOEXCEPTION $e){
      die("Query Failed: " . $e->getMessage());
   }

} else{
   header("Location: ../index.php");
   die();
}