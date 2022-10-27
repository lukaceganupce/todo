<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TODO</title>
</head>
<body>
<h1>TODO</h1>
<h2>Přidat záznam</h2>
<form action="" method="POST">
    <textarea name="todo"></textarea>
    <select name="priority">
        <option value="S">Malá</option>
        <option value="M">Střední</option>
        <option value="L">Velká</option>
    </select>

    Štítek A <input name="label_a" type="checkbox">
    Štítek B <input name="label_b" type="checkbox">
    Štítek C <input name="label_c" type="checkbox">

    <input name="deadline" type="date">
    <input type="submit" value="Uložit">
</form>
</body>
</html>
