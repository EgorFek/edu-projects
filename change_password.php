<?php
session_start();

require_once "admin_check.php";
require_once "database.php";

$query = "SELECT * FROM users WHERE id = '" . $_GET['id'] . "'";
$result = mysqli_query($link, $query);
$user = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация пользователя</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/forms.css">
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

        .btn-line {
            display: flex;
            gap: 20px;
        }

        .btn-form {
            padding: 10px;
            height: auto;
        }

        @media screen and (max-width: 768px) {
            .btn-line {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <?php if (empty($user)) {
        echo "<div class='server_message'>Такого пользователя не существует <a class='btn-link' href='admin.php'>Панель администратора</a></div>";
        exit;
    } ?>
    <form method="post" class="page-form">

        <h1>Смена пароля</h1>

        <div class="line"></div>

        <input type="password" class="input-text" name="password" required minlength="6" maxlength="30" placeholder="Введите новый пароль">

        <input type="password" class="input-text" name="confirm-password" required minlength="6" maxlength="30" placeholder="Подтвердите пароль">

        <div class="btn-line">
            <input type="submit" value="Сменить пароль" class="btn-form">
            <input type="reset" value="Стереть" class="btn-form">
        </div>
    </form>
    <?php

    if (isset($_POST) && !empty($_POST)) {
        if ($_POST['password'] == $_POST['confirm-password']) {
            $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $id = $_GET['id'];
            $query = "UPDATE users SET password = '$hash' WHERE id = '$id'";
            mysqli_query($link, $query);
            $_SESSION['flash'] = 'Пароль успешно изменен';
            header("Location: users.php");
        } else {
            echo "<div class='error'>Пароли не совпадают</div>";
        }
    }
    ?>
</body>

</html>