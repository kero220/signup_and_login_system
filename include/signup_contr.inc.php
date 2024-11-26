<?php

declare(strict_types=1);
function is_empty(string $username, string $pwd, string $email){
   if(empty($username) || empty($pwd) || empty($email)){
      return true;
   } else{
      return false;
   }
}

function is_valid(string $email){
   if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      return true;
   } else{
      return false;
   }
}

function is_username_taken(object $PDO, string $username){
   if(get_username($PDO, $username)){
      return true;
   } else{
      return false;
   }
}

function is_email_registered(object $PDO, string $email){
   if(get_email($PDO,$email)){
      return true;
   } else{
      return false;
   }
}

function create_user(object $PDO, string $username, string $pwd, string $email){
   set_user($PDO, $username, $pwd, $email);
}