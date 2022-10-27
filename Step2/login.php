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

    if (isset($message) && strlen($message) > 0) {
        if ($login_suceess) {
            header("Location: todo.php");
        }
    }


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TODO</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        .waves-effect input[type="submit"] {
            color: #fff;
        }
    </style>
</head>
<body class="teal lighten-5">
<div class="container">
    <div class="row">
        <div class="col s12">
            <h1 class="teal-text text-darken-4" style="text-align: center">TODO</h1>
        </div>
    </div>
    <div class="row">
        <div class="card" style="width: 400px; margin: auto">
        <form action="" method="POST" >
            <div class="row" style="margin-bottom: 0px; padding-top: 20px">
                <div class="col s12 red-text text-darken-4" style="text-align: center">
                    <?php if(isset($message) && strlen($message) >0) echo $message; ?>
                </div>
            </div>

            <div class="row" style="margin-bottom: 0px; padding-top: 20px">
                <div class="input-field col s12">
                    <input placeholder="Zadejte email..." id="username" name="username" type="text" class="validate">
                    <label for="username">Email</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Zadejte heslo..." id="password" name="password" type="password" class="validate">
                    <label for="password">Password</label>
                </div>
                <div class="input-field col s12">
                    <input id="login" name="login" type="submit" value="Login" class="waves-effect waves-light btn col s12">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    Pokud nemáš účet, vyrob si ho <a href="registration.php">zde</a>.</br>
                    Zapomněl jsi heslo, obnov si ho <a href="recovery.php">zde</a>.
                </div>
            </div>
        </form>
        </div>
    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
