<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $username = $_POST['username'];
   $pwd = $_POST['pwd'];

   try {
      require_once "connection.php";
      require_once "login_model.inc.php";
      require_once "login_cntr.inc.php";

      // ERROR HANDELERS
      $errors = [];

      if(is_empty($username, $pwd)){
         $errors["empty_input"] = "Fill in all fields!";
      }

      $result = get_user($PDO, $username);
      
      if (is_user_wrong($result) ||
         is_password_wrong($pwd, $result["pwd"])){
            $errors["login_incorrect"] = "Incorrect login info";
      }

      require_once "config.php";
      
      if ($errors) {
         $_SESSION["error_login"] = $errors;

         header("Location: ../index.php");
         die();
      }

      $newSessionId = session_create_id(). "_" . $reault["id"];
      session_id($newSessionId);

      $_SESSION["user_id"] = $result["id"];
      $_SESSION["username"] = htmlspecialchars($result["username"]);
      $_SESSION['last_regeneration'] = time();

      header("Location: ../index.php?login=success");
      $PDO = NULL;
      $stmt = NULL;
      die();
   
   } catch (PDOEXCEPTION $e) {
      die("Query Failed: " . $e->getMessage());
   }
}
else{
   header("Location: ../index.php");
   die();
}