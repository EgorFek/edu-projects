<?php
session_start();

require_once "admin_check.php";
require_once "database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация пользователя</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-color: #FFB800;
            min-height: 100vh;
            padding: 30px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 40px;
        }

        .page-form {
            min-height: 80vh;
        }

        .line {
            background-color: #d9d9d9;
            height: 1px;
        }

        .btn-form {
            padding: 10px;
            height: auto;
        }
    </style>
</head>

<body>
    <form method="post" class="page-form">

        <h1>Регистрация</h1>

        <div class="line"></div>

        <input type="text" class="input-text" name="login" required pattern="[A-Za-z0-9.-]+$" minlength="3" maxlength="16" title="username" placeholder="Логин">

        <input type="password" class="input-text" name="password" required minlength="6" maxlength="30" placeholder="Пароль">

        <input type="password" class="input-text" name="confirm-password" required minlength="6" maxlength="30" placeholder="Подтвердите пароль">

        <input type="text" class="input-text" name="name" required pattern="[А-Яа-я\s-]+$" min-length='6' maxlength="35" placeholder="Имя">

        <input type="text" class="input-text" name="surname" required pattern="[А-Яа-я\s-]+$" maxlength="35" placeholder="Фамилия">

        <div class="btns-form">
            <input type="submit" class="btn-form" value="Регистрация">
            <input type="reset" class="btn-form" value="Стереть">
        </div>
    </form>
    <?php

    if (isset($_POST) && !empty($_POST)) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm-password'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];

        if ($password != $confirm_password) {
            echo "<div class='error'>Пароли не совпадают</div>";
            exit;
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "SELECT * FROM users WHERE login='$login'";
        $result = mysqli_query($link, $query);
        $user = mysqli_fetch_assoc($result);
        if (!empty($user)) {
            echo "<div class='error'>Такой пользователь уже сущетвует</div>";
            exit;
        }

        $query = "INSERT INTO users (login, name, surname, status_id, password) VALUES ('$login', '$name', '$surname', '1', '$hashed_password')";
        mysqli_query($link, $query);

        echo "<div class='successfull'>Пользователь успено зарегистирирован</div>";
        echo "<a href='admin.php' class='btn-link'>Админ панель</a>";
    }

    ?>
</body>

</html>