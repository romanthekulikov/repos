<?php
header("Content-Type: text/plain");

function postPostParameter(string $paremeterName): ?string
{
    return isset($_POST[$paremeterName]) ? $_GET[$paremeterName] : null;
}

$email = postPostParameter("email");
$password = postPostParameter("password");


$ourFile = fopen("$email.txt", 'w');
if ($email != null)
{
    $email
    file_put_contents("$email.txt", "Email: $email\r\n");
}
else
{
    echo "Not found\r\n";
}
if ($password != null)
{
    file_put_contents("$email.txt", "Password: $password\r\n");
}
else
{
    echo "Not found\r\n";
}

//file_put_contents("$email.txt", "First Name: $first_name\r\nLast Name: $last_name\r\nEmail: $email\r\nAge: $age");
fclose($ourFile);
?>