<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('./style.css'); ?>
    <title>Federal Department of Justice</title>
</head>
<body>
    <?php require './templates/header.php'?>

    <h1>Login page</h1>

    <form action="#" method="post">
        <label for="loginName">Login Name:</label>
        <input id="loginName" type="text" name="loginName">
        <label for="pswd">Password:</label>
        <input id="pswd" type="text" name="pswd">

        <input type="radio" name="employee" id="admin" value="Admin" checked>
        <label for="admin">Administrator</label>
        <input type="radio" name="employee" id="guard" value="Guard">
        <label for="guard">Guard</label>

        <input id="loginButton" name="submit" type="submit" value="Login">
    </form>

    <?php require './templates/footer.php'?>

</body>
</html>


<?php
$login = false;
if(isset($_POST['submit'])) {
    $employee = $_POST['employee'];
    if ($employee == "Guard");
        header("Location: ./Guard/guard.php?login=true");
    if ($employee == "Admin")
        header("Location: ./Administrator/admin.php?login=true");
    $login = true;
}


?>