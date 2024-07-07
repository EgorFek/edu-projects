<?php
session_start();
require_once "admin_check.php";
require_once "database.php";
$query = "SELECT name, text, year FROM lesson LEFT JOIN academic_year ON lesson.academic_year_id = academic_year.id WHERE lesson.id = '" . $_GET['id'] . "'";
$result = mysqli_query($link, $query);
$lesson = mysqli_fetch_assoc($result);
if (empty($lesson)) {
    include "server_error.php";
    print_server_error_message("Неизвестный материал");
}
?>

<?php

if (isset($_POST) && !empty($_POST)) {
    $name = $_POST['name'];
    $text = $_POST['text'];
    $year = $_POST['year'];
    $query = "UPDATE lesson SET name='$name', text='$text' WHERE id='" . $_GET['id'] . "'";
    mysqli_query($link, $query);

    $count = count($_FILES['files']['name']);

    if ($count > 0) {
        for ($i = 0; $i < $count; $i++) {
            if ($_FILES['files']['error'][$i] == 0) {
                $from = $_FILES['files']['tmp_name'][$i];
                $filename = $_FILES['files']['name'][$i];
                $lesson_id = $_GET['id'];
                $query = "INSERT INTO lesson_files (path, lesson_id) VALUES ('files/$filename', '$lesson_id')";
                mysqli_query($link, $query);
                $to = __DIR__ . '/files/' . $filename;
                if (move_uploaded_file($from, $to)) {
                    echo "Загружено успешно";
                }
            }
        }
    }

    header("Location: lesson_edit_remove.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Изменить учебный материал</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/add_edit.css">
</head>

<body>
    <header>
        <a href="admin.php">Админ панель</a>
    </header>
    <form method="post" enctype="multipart/form-data">
        <p><?php echo $lesson['year'] . " класс"; ?></p>
        <input type="text" name="name" class="input-text" value="<?php echo $lesson['name'] ?>" required placeholder="Введите название">
        <textarea name="text" class="input-text" required placeholder="Введите текст"><?php echo $lesson['text'] ?></textarea>
        <?php
        $query = "SELECT id, path FROM lesson_files WHERE lesson_id = '" . $_GET['id'] . "'";
        $result = mysqli_query($link, $query);
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

        if (!empty($data)) {
            foreach ($data as $file) {
                echo "<div>";
                $file_name = explode('/', $file['path']);
                $file_name = $file_name[count($file_name) - 1];
                echo $file_name . " <a href=delete_entry.php?id=" . $file['id'] . "&table_name=lesson_files>Удалить</a>";
                echo "</div>";
            }
        }
        ?>
        <label for="files" class="btn-form" onclick="this.innerHTML = 'Файлы выбраны';">
            Выберите файлы
        </label>
        <input type="file" name="files[]" id="files" multiple>
        <div class="btns-form">
            <div>
                <input type="submit" value="Изменить" class="btn-form">
            </div>
            <div>
                <input type="reset" value="Стереть" name="loader" class="btn-form">
            </div>
        </div>
    </form>
</body>

</html>