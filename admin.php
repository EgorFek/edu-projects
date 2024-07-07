<?php
session_start();
require_once "admin_check.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель администратора</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            padding: 20px;
            font-size: 20px;
        }

        div {
            width: 80%;
            text-align: center;
            margin: 0 auto;
        }

        .btn-link {
            padding: 15px;
            margin-right: 30px;
            margin-top: 30px;
        }

        @media screen and (max-width: 768px) {
            div {
                text-align: left;
            }
        }
    </style>
</head>

<body>
    <a href="index.php">На главную</a>
    <div>
        <a href="users.php" class="btn-link">Ко всем пользователям</a>
        <a href="lessons_hub.php" class="btn-link">Работа с учебным материалом</a>
        <a href="awards_hub.php" class="btn-link">Работа с достижениями</a>
        <a href="methodological_materials_hub.php" class="btn-link">Работа с методическими материалами</a>
        <a href="training_course_hub.php" class="btn-link">Работа с курсами повышения квалификации</a>
    </div>
</body>

</html>