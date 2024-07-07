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
    <title>Изменить/Удалить методический материал</title>
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
            <th>Название</th>
            <th>Изменить</th>
            <th>Удалить</th>
        </tr>
        <?php
        $query = "SELECT id, title FROM methodological_materials";
        $result = mysqli_query($link, $query);
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
        foreach ($data as $mm) {
            echo "<tr>";
            echo "
                <td>" . $mm['id'] . "</td>
                <td>" . $mm['title'] . "</td>
                <td><a href='edit_mm.php?id=" . $mm['id'] . "'>Изменить</td>
                <td><a href='delete_mm.php?id=" . $mm['id'] . "'>Удалить</td>
                ";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>