<?php

declare(strict_types=1);

function get_username(object $PDO, string $username){
   $query = "SELECT username FROM users WHERE username = :user;";
   $stmt = $PDO->prepare($query);
   $stmt->bindParam(":user", $username);
   $stmt->execute();

   $result = $stmt->fetch(PDO::FETCH_ASSOC);
   return $result;
}

function get_email(object $PDO, string $email){
   $query = "SELECT email FROM users WHERE email = :email;";
   $stmt = $PDO->prepare($query);
   $stmt->bindParam(":email", $email);
   $stmt->execute();

   $result = $stmt->fetch(PDO::FETCH_ASSOC);
   return $result;
}

function set_user(object $PDO, string $username, string $pwd, string $email){
   $query = "INSERT INTO users (username, pwd, email) VALUES (:username, :pwd, :email)";
   $stmt = $PDO->prepare($query);

   $options = [
      'cost' => 12
   ];

   $hashPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

   $stmt->bindParam(":username", $username);
   $stmt->bindParam(":pwd", $hashPwd);
   $stmt->bindParam(":email", $email);
   $stmt->execute();
}