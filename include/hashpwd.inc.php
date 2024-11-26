<?php

$pwdSignup = "kero31$";
$options = [
   'cost' => 12
];

$hashedPwd = password_hash($pwdSignup, PASSWORD_BCRYPT, $options);

$pwdLogin = "kero31$";
password_verify($pwdLogin, $hashedPwd);