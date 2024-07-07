<?php
session_start();
require_once "admin_check.php";
require_once "database.php";
$query = "SELECT year, type FROM awards LEFT JOIN award_types ON awards.award_type_id = award_types.id WHERE awards.id = '" . $_GET['id'] . "'";
$result = mysqli_query($link, $query);
$course = mysqli_fetch_assoc($result);
if (empty($course)) {
    include "server_error.php";
    print_server_error_message("Неизвестное достижение");
}
?>

<?php

if (isset($_POST) && !empty($_POST)) {
    $year = $_POST['year'];
    $type = $_POST['type'];
    $query = "UPDATE awards SET year='$year', award_type_id='$type' WHERE id = '" . $_GET['id'] . "'";
    mysqli_query($link, $query);

    header("Location: awards_edit_remove.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Изменить достижение</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/add_edit.css">
</head>

<body>
    <header>
        <a href="admin.php">Админ панель</a>
    </header>
    <form method="post" enctype="multipart/form-data">
        <input type="number" name="year" value="<?php echo (int) $course['year']; ?>" class="input-text" required placeholder="Впишите год">
        <div>
            <label for="type">Выберите тип награды</label>
            <select name="type" id='type' class="input-text">
                <?php
                $query = "SELECT id, type FROM award_types";
                $result = mysqli_query($link, $query);
                for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
                foreach ($data as $type) {
                    if ($type['type'] == $course['type'])
                        echo "<option value=" . $type['id'] . " selected>" . $type['type'] . "</option>";
                    else {
                        echo "<option value=" . $type['id'] . ">" . $type['type'] . "</option>";
                    }
                }
                ?>
            </select>
        </div>
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