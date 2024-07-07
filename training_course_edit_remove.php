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
    <title>Изменить/Удалить курсы повышения квалификации</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            padding: 20px;
            font-size: 20px;
        }

        table {
            width: 70%;
            width: 100%;
            margin: 0 auto;
            border-radius: 3px;
            background: #fff;
        }


        th,
        td {
            margin: 0;
            padding: 10px;
            border: 1px solid #000;
        }

        /* Скругление углов у таблицы */

        th:nth-of-type(1) {
            border-radius: 5px 0px 0px 0px;
        }

        th:nth-last-of-type(1) {
            border-radius: 0px 5px 0px 0px;
        }

        tr:nth-last-of-type(1) td:nth-of-type(1) {
            border-radius: 0px 0px 0px 5px;
        }

        tr:nth-last-of-type(1) td:nth-last-of-type(1) {
            border-radius: 0px 0px 5px 0px;
        }
    </style>
</head>

<body>
    <a href="admin.php">Панель администратора</a>
    <table>
        <tr>
            <th>id</th>
            <th>Год</th>
            <th>Регистрационный номер</th>
            <th>Изменить</th>
            <th>Удалить</th>
        </tr>
        <?php
        $query = "SELECT id, year, registration_number FROM training_courses";
        $result = mysqli_query($link, $query);
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
        foreach ($data as $training_course) {
            echo "<tr>";
            echo "
                <td>" . $training_course['id'] . "</td>
                <td>" . $training_course['year'] . "</td>
                <td>" . $training_course['registration_number'] . "</td>
                <td><a href='edit_training_course.php?id=" . $training_course['id'] . "'>Изменить</td>
                <td><a href='delete_entry.php?id=" . $training_course['id'] . "&table_name=training_courses'>Удалить</td>
                ";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>