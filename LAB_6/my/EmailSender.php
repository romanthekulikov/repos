<?php

function getGetParameter(string $paremeterName): ?string
{
    return isset($_GET[$paremeterName]) ? $_GET[$paremeterName] : null;
}

$email = getGetParameter("email");
$password = getGetParameter("password");
$name = getGetParameter("name");

if (($email == null) or ($password == null) or ($name == null))
{
  echo "ERROR";
}
else
{
  $ourFile = fopen("users/$email.txt", 'w');
  file_put_contents("users/$email.txt", "Email: $email\r\nPassword: $password\r\nName: $name");
  $ourFile = fclose($ourFile);
}

header('Location: http://localhost:4000/link.html');
exit;

?>