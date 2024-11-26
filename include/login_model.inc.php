<?php

declare(strict_types=1);

function get_user(object $PDO, string $username){
   $query = "SELECT * FROM users WHERE username = :user;";
   $stmt = $PDO->prepare($query);
   $stmt->bindParam(":user", $username);
   $stmt->execute();

   $result = $stmt->fetch(PDO::FETCH_ASSOC);
   return $result;
}