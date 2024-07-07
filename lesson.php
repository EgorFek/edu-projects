<?php
session_start();
if (empty($_GET['id'])) {
    header("Location: index.php");
    exit;
}
require_once 'database.php';
$query = "SELECT name, text FROM lesson WHERE id = '" . $_GET['id'] . "'";
$result = mysqli_query($link, $query);
$lesson = mysqli_fetch_assoc($result);

if (empty($lesson)) {
    require_once "server_error.php";
    print_server_error_message("Данный урок не найден");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><? echo $lesson['name']; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        main {
            display: flex;
            flex-direction: column;
            gap: 30px;
            padding: 20px;
            min-height: 65vh;
        }

        .lesson_text,
        .lesson_materials {
            padding: 20px;
            box-shadow: 1px 1px 4px rgba(0, 0, 0, .25);
        }

        .lesson_materials a {
            display: block;
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <header>
        <?php include 'nav.php'; ?>
    </header>
    <main>
        <h2>
            <?php echo $lesson['name']; ?>
        </h2>
        <div class="lesson_text">
            <?php echo $lesson['text']; ?>
        </div>
        <?php
        $query = "SELECT path FROM lesson_files WHERE lesson_id = '" . $_GET['id'] . "'";
        $result = mysqli_query($link, $query);
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
        if (!empty($data)) {
            include "path.php";
            echo "<div class='lesson_materials'>";
            foreach ($data as $file) {
                path_to_interface($file['path']);
            }
            echo "</div>";
        }
        ?>
        <a href="questions.php?id=<?php echo $_GET['id']; ?>&t=<?php echo $lesson['name'] ?>">Вопросы</a>
    </main>
    <?php include "footer.php"; ?>
</body>
<?php mysqli_close($link); ?>

</html>