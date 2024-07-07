<?php
session_start();
require_once "admin_check.php";
require_once "database.php";
?>

<?php

if (isset($_POST) && !empty($_POST)) {
    $year = (int)$_POST['year'];
    $number = $_POST['number'];
    $path = $_FILES['file']['name'];
    $city = $_POST['city'];
    $query = "INSERT INTO training_courses (year, registration_number, image, city_id) VALUES('$year', '$number', 'files/$path', '$city')";
    mysqli_query($link, $query);

    if ($_FILES['file']['error'] == 0) {
        $from = $_FILES['file']['tmp_name'];
        $filename = $_FILES['file']['name'];
        $to = __DIR__ . '/files/' . $filename;
        if (move_uploaded_file($from, $to)) {
            echo "Загружено успешно";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить курс повышения квалификации</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/add_edit.css">
</head>

<body>
    <header>
        <a href="admin.php">Админ панель</a>
    </header>
    <form method="post" enctype="multipart/form-data">
        <input type="number" name="year" class="input-text" required placeholder="Впишите год">
        <input type="text" name="number" class="input-text" required placeholder="Впишите номер регистрации">
        <select name="city" class="input-text">
            <?php
            $query = "SELECT id, city FROM cities";
            $result = mysqli_query($link, $query);
            for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
            foreach ($data as $city) {
                echo "<option value=" . $city['id'] . ">" . $city['city'] . "</option>";
            }
            ?>
        </select>
        <div>
            <span style="display: inline-block; margin-bottom: 10px;">Вставьте изображение:</span><br>
            <label for="file" class="btn-form" onclick="this.innerHTML = 'Файлы выбраны';">
                Выберите файлы
            </label>
            <input type="file" name="file" id="file">
        </div>
        <div class="btns-form">
            <div>
                <input type="submit" value="Добавить" class="btn-form">
            </div>
            <div>
                <input type="reset" value="Стереть" name="loader" class="btn-form">
            </div>
        </div>
    </form>
</body>

</html>