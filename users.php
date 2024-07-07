<?php
require_once "admin_check.php";
require_once "database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пользователи</title>
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
    <a href="admin.php" class="nav-admin">Админ панель</a>
    <div>
        <?php
        if (isset($_SESSION['flash'])) {
            echo "<div>" . $_SESSION['flash'] . "</div>";
            $_SESSION['flash'] = NULL;
        }
        ?>
        <table>
            <tr>
                <th>id</th>
                <th>Логин</th>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Статус</th>
                <th>Сменить пароль</th>
            </tr>
            <?php
            $query = "SELECT users.id, login, name, surname, status FROM users LEFT JOIN status ON users.status_id = status.id";
            $result = mysqli_query($link, $query);
            for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
            foreach ($data as $user) {
                echo "<tr>
                <td style='text-align:center;'>" . $user['id'] . "</td>
                <td>" . $user['login'] . "</td>
                <td>" . $user['surname'] . "</td>
                <td>" . $user['name'] . "</td>
                <td>" . $user['status'] . "</td>
                <td style='text-align:center;'><a href='change_password.php?id=" . $user['id'] . "'>Поменять пароль</a></td>
                </tr>";
            }
            ?>
        </table>
    </div>
</body>
<?php mysqli_close($link); ?>

</html>