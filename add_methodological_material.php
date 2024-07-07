<?php
session_start();
require_once "admin_check.php";
require_once "database.php";
?>

<?php

if (isset($_POST) && !empty($_POST)) {
    $title = $_POST['title'];
    $text = $_POST['text'];
    $query = "INSERT INTO methodological_materials (title, text) VALUES('$title', '$text')";
    mysqli_query($link, $query);

    $count = count($_FILES['files']['name']);

    if ($count > 0) {
        for ($i = 0; $i < $count; $i++) {
            if ($_FILES['files']['error'][$i] == 0) {
                $from = $_FILES['files']['tmp_name'][$i];
                $filename = $_FILES['files']['name'][$i];
                $query = "SELECT id FROM methodological_materials ORDER BY id DESC LIMIT 1";
                $result = mysqli_query($link, $query);
                $mm_id = mysqli_fetch_assoc($result);
                $mm_id = $mm_id['id'];
                $query = "INSERT INTO methodological_materials_files (path, mm_id) VALUES ('files/$filename', '$mm_id')";
                mysqli_query($link, $query);
                $to = __DIR__ . '/files/' . $filename;
                if (move_uploaded_file($from, $to)) {
                    echo "Загружено успешно";
                }
            }
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
    <title>Добавить методический материал</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/add_edit.css">
</head>

<body>
    <header>
        <a href="admin.php">Админ панель</a>
    </header>
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="title" class="input-text" required placeholder="Введите название">
        <textarea name="text" class="input-text" required placeholder="Введите текст"></textarea>
        <label for="files" class="btn-form" onclick="this.innerHTML = 'Файлы выбраны';">
            Выберите файлы
        </label>
        <input type="file" name="files[]" id="files" multiple>
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