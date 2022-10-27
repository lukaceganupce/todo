<?php

if (isset($_POST['registration'])) {

    $registration_suceess = false;
    $message = '';

    if (isset($_POST['username'])) {
        if (!filter_var($_POST['username'], FILTER_VALIDATE_EMAIL)) {
            $message = "Špatný formát emailu.";
        }
    }

    if (strlen($message) == 0) {
        require 'db.php';

        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "INSERT INTO users (id_user,username,password,recovery_code,recovery_date)
VALUES (null, '" . $username . "', '" . $password . "', null, null)";

        if ($conn->query($sql) === TRUE) {
            $registration_suceess = true;
            $message = 'Registrace OK, můžete se přihlásit. <a href="login.php">Login</a>';
        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TODO</title>
</head>
<body>
<h1>TODO</h1>
<h2>Registrace uživatele</h2>
<?php
if(isset($message) && strlen($message) >0) {
    if ($registration_suceess) {
        echo '<h3>'.$message.'</h3>';
        echo '</body></html>';
        exit();
    }
    echo '<h3 style="color:red">'.$message.'</h3>';
} ?>
<form action="" method="POST">
    <input name="username" type="text">
    <input name="password" type="password">
    <input name="registration" type="submit" value="Registruj">
</form>
</body>
</html>
