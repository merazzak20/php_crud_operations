<?php

$name=$_POST["name"];
$password = $_POST["password"];
// $password=password_hash($_POST["password"],PASSWORD_DEFAULT);

// registered info

$r_name = "Abdur Razzak";
$r_pass = password_hash("1234",PASSWORD_DEFAULT);

if($name==$r_name && password_verify($password,$r_pass)){
    echo"<p>Login Sucessfull</p>";
}else{
    echo"<p>Invalid data</p>";
}

?>