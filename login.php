<?php
session_start();
require_once "database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-color: #FFB800;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 40px;
        }

        .page-form {
            min-height: 400px;
        }

        .line {
            background-color: #d9d9d9;
            height: 1px;
        }
    </style>
</head>

<body>
    <form method="post" class="page-form">
        <h1>Авторизация</h1>
        <div class="line"></div>
        <input type="text" name="login" class="input-text" placeholder="Логин">
        <input type="password" name="password" class="input-text" placeholder="Пароль">
        <div class="btns-form">
            <div>
                <input type="submit" value="Войти" class="btn-form">
            </div>
            <div>
                <input type="reset" value="Стереть" class="btn-form">
            </div>
        </div>
    </form>
    <?php

    if (isset($_POST) && !empty($_POST)) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        $query = "SELECT users.id, password, name, surname, status FROM users LEFT JOIN status ON users.status_id = status.id WHERE login='$login'";
        $result = mysqli_query($link, $query);
        $user = mysqli_fetch_assoc($result);

        if (empty($user)) {
            echo "<div class='error'>Такого пользователя не существует</div>";
            exit;
        }

        $hash = $user['password'];
        if (!password_verify($password, $hash)) {
            echo "<div class='error'>Неверный логин или пароль</div>";
            exit;
        }

        $_SESSION['auth'] = true;
        $_SESSION['id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['surname'] = $user['surname'];
        $_SESSION['status'] = $user['status'];

        header('Location: index.php');
    }

    ?>
</body>

</html>