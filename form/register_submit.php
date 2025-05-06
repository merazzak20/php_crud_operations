<?php

$name = $_POST['name'];
$password = password_hash($_POST['password'],PASSWORD_DEFAULT);
echo "Registered by <b>$name</b>.";

?>
<a href="login.php">login please</a>