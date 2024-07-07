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
    <title>Работа с курсами повышения квалификации</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/hubs.css">
</head>

<body>
    <header>
        <a href="admin.php">Панель администратора</a>
    </header>
    <main>
        <div>
            <h2>Добавить курс повышения квалификации</h2>
            <a href="add_course.php" class="btn-link">Добавить</a>
        </div>
        <div>
            <h2>Изменить/Удалить курс повышения квалификации</h2>
            <a href="training_course_edit_remove.php" class="btn-link">Изменить/Удалить</a>
        </div>
    </main>
</body>

</html>