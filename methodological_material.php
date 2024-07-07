<?php
session_start();
if (empty($_GET['id'])) {
    header("Location: index.php");
    exit;
}
require_once 'database.php';
$query = "SELECT title, text FROM methodological_materials WHERE id = '1'";
$result = mysqli_query($link, $query);
$material = mysqli_fetch_assoc($result);

if (empty($material)) {
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
    <title><? echo $material['title']; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        main {
            display: flex;
            flex-direction: column;
            gap: 30px;
            padding: 20px;
            min-height: 65vh;
        }

        .material_text,
        .mm_materials {
            padding: 20px;
            box-shadow: 1px 1px 4px rgba(0, 0, 0, .25);
        }

        .mm_materials a {
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
            <?php echo $material['title']; ?>
        </h2>
        <div class="material_text">
            <?php echo $material['text']; ?>
        </div>
        <?php
        $query = "SELECT path FROM methodological_materials_files WHERE mm_id = '" . $_GET['id'] . "'";
        $result = mysqli_query($link, $query);
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
        if (!empty($data)) {
            include "path.php";
            echo "<div class='mm_materials'>";
            foreach ($data as $file) {
                path_to_interface($file['path']);
            }
            echo "</div>";
        }
        ?>
    </main>
    <?php include "footer.php"; ?>
</body>
<?php mysqli_close($link); ?>

</html>