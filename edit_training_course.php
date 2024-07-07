<?php
session_start();
require_once "admin_check.php";
require_once "database.php";
$query = "SELECT year, registration_number, city FROM training_courses LEFT JOIN cities ON cities.id = training_courses.city_id WHERE training_courses.id = '" . $_GET['id'] . "'";
$result = mysqli_query($link, $query);
$course = mysqli_fetch_assoc($result);
if (empty($course)) {
    include "server_error.php";
    print_server_error_message("Неизвестный материал");
}
?>

<?php

if (isset($_POST) && !empty($_POST)) {
    $year = $_POST['year'];
    $number = $_POST['number'];
    $city = $_POST['city'];
    $query = "UPDATE training_courses SET year='$year',registration_number='$number', city_id='$city' WHERE id = '" . $_GET['id'] . "'";
    mysqli_query($link, $query);

    header("Location: training_course_edit_remove.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Изменить курсы повышения квалификации</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/add_edit.css">
</head>

<body>
    <header>
        <a href="admin.php">Админ панель</a>
    </header>
    <form method="post" enctype="multipart/form-data">
        <input type="number" name="year" value="<?php echo (int) $course['year']; ?>" class="input-text" required placeholder="Впишите год">
        <input type="text" name="number" value="<?php echo $course['registration_number']; ?>" class="input-text" required placeholder="Впишите номер регистрации">
        <select name="city" class="input-text">
            <?php
            $query = "SELECT id, city FROM cities";
            $result = mysqli_query($link, $query);
            for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
            foreach ($data as $city) {
                if ($city['city'] == $course['city'])
                    echo "<option value=" . $city['id'] . " selected>" . $city['city'] . "</option>";
                else {
                    echo "<option value=" . $city['id'] . ">" . $city['city'] . "</option>";
                }
            }
            ?>
        </select>
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