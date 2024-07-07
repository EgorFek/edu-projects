<?php
session_start();
require_once "admin_check.php";
require_once "database.php";
?>

<?php

if (isset($_POST) && !empty($_POST)) {
    $exp = $_FILES['file']['name'];
    $exp = explode('.', $exp);
    $exp = $exp[count($exp) - 1];
    if ($_FILES['file']['error'] == 0) {
        $from = $_FILES['file']['tmp_name'];
        $filename = uniqid(time());
        $to = __DIR__ . '/files/' . $filename . ".$exp";
        if (move_uploaded_file($from, $to)) {
            echo "Загружено успешно";
        }
    }

    $year = (int)$_POST['year'];
    $type = $_POST['type'];
    $path = $filename . ".$exp";
    $query = "INSERT INTO awards(year, image_path, award_type_id) VALUES ('$year','files/$path','$type')";
    mysqli_query($link, $query);
    header("Refresh: 0");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить достижение</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/add_edit.css">
</head>

<body>
    <header>
        <a href="admin.php">Админ панель</a>
    </header>
    <form method="post" enctype="multipart/form-data">
        <input type="number" name="year" class="input-text" required placeholder="Впишите год">
        <div>
            <span style="display: inline-block; margin-bottom: 10px;">Вставьте изображение:</span><br>
            <label for="file" class="btn-form" onclick="this.innerHTML = 'Файлы выбраны';">
                Выберите файлы
            </label>
            <input type="file" name="file" id="file">
        </div>
        <div>
            <label for="type">Выберите тип награды:</label>
            <select name="type" id='type' class="input-text">
                <?php
                $query = "SELECT id, type FROM award_types";
                $result = mysqli_query($link, $query);
                for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
                foreach ($data as $type) {
                    echo "<option value=" . $type['id'] . ">" . $type['type'] . "</option>";
                }
                ?>
            </select>
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