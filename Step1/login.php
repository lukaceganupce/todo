<?php
session_start();
if(isset($_SESSION['user'])) {
    header("Location: todo.php");
};


if (isset($_POST['login'])) {

    $login_suceess = false;
    $message = '';

    require 'db.php';

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $user = null;

    $sql = "SELECT id_user from users WHERE username = '" . $username . "' AND password ='" . $password . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $message = "Login OK.";
            $login_suceess = true;
            $_SESSION['user'] =$row["id_user"];
        }
    } else {
        $message = "Chybné přihlášení.";
    }
    $conn->close();

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
<h2>Přihlášení</h2>
<?php
if(isset($message) && strlen($message) >0) {
    if ($login_suceess) {
        header("Location: todo.php");
    }
    echo '<h3 style="color:red">'.$message.'</h3>';
} ?>
<form action="" method="POST">
    <input name="username" type="text">
    <input name="password" type="password">
    <input name="login" type="submit" value="Login">
    <p>Pokud nemáš účet, vyrob si ho <a href="registration.php">zde</a>.</p>
    <p>Zapomněl jsi heslo, obnov si ho <a href="recovery.php">zde</a>.</p>
</form>
</body>
</html>
