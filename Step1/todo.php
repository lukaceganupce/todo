<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
};

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<a href="add_todo.php">+</a>
<a href="logout.php">Odhlasit</a>

<table>
    <thead>
        <tr>
            <th>TODO</th>
            <th>Priorita</th>
            <th>Štítky</th>
            <th>Termín</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Úkol A</td>
            <td>Velká</td>
            <td>studium, deadline</td>
            <td>25. 10. 2022</td>
            <td>
                <a href="edit_todo.php">upravit</a>
                <a href="delete_todo.php">smazat</a>
            </td>
        </tr>
        <tr>
            <td>Úkol B</td>
            <td>Malá</td>
            <td>nákup, párty</td>
            <td>21. 10. 2022</td>
            <td>
                <a href="edit_todo.php">upravit</a>
                <a href="delete_todo.php">smazat</a>
            </td>
        </tr>
    </tbody>

</table>
</body>
</html>
