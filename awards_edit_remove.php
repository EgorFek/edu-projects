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
    <title>Изменить/Удалить достижения</title>
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
            <th>Тип</th>
            <th>Изображение</th>
            <th>Изменить</th>
            <th>Удалить</th>
        </tr>
        <?php
        $query = "SELECT awards.id, year, type, image_path FROM awards LEFT JOIN award_types ON awards.award_type_id = award_types.id";
        $result = mysqli_query($link, $query);
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
        foreach ($data as $award) {
            echo "<tr>";
            echo "
                <td>" . $award['id'] . "</td>
                <td>" . $award['year'] . "</td>
                <td>" . $award['type'] . "</td>
                <td style='text-align:center;'><img src='" . $award['image_path'] . "' alt='award' style='max-width: 150px;'></td>
                <td><a href='edit_award.php?id=" . $award['id'] . "'>Изменить</td>
                <td><a href='delete_entry.php?id=" . $award['id'] . "&table_name=awards'>Удалить</td>
                ";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>