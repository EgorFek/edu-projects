<?php
require_once "database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Методические материалы</title>
    <style>
        .material_body {
            min-height: 65vh;
            gap: 40px;
            width: 90%;
            margin: 0 auto;
            padding: 20px 0;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .materials {
            display: flex;
            flex-direction: column;
            height: 100%;
            align-items: center;
            justify-content: flex-start;
            gap: 40px;
        }

        .material {
            width: 100%;
            box-shadow: 1px 1px 4px rgba(0, 0, 0, .25);
            padding: 30px 40px;
        }

        input[type=text] {
            height: 30px;
            width: 30%;
            background-color: #e0e0e0;
            color: rgba(0, 0, 0, .50);
            border-radius: 3px;
            border: none;
            padding-left: 20px;
            font-size: 20px;
        }

        .btn-link {
            display: inline-block;
            border: none;
            padding: 30px;
        }

        @media screen and (max-width: 768px) {
            input[type=text] {
                height: 55px;
                width: 60%;
                background-color: #e0e0e0;
                color: rgba(0, 0, 0, .50);
                border-radius: 3px;
                border: none;
            }

            .material_body {
                gap: 30px;
            }
        }
    </style>
</head>

<body>
    <header>
        <?php include "nav.php"; ?>
    </header>
    <main class="material_body">
        <form method="get">
            <input type="hidden" name="year" value="<?php echo $_GET['year']; ?>">
            <input type="text" name="q">
            <input type="submit" value="Найти" class="btn-form">
        </form>
        <?php
        $q = $_GET['q'];
        $query = "SELECT id, title FROM methodological_materials WHERE title LIKE '%$q%'";
        $result = mysqli_query($link, $query);
        for ($materails = []; $row = mysqli_fetch_assoc($result); $materails[] = $row);

        echo "<div class='materials'>";


        foreach ($materails as $material) {
            echo "<div class='material'><a href='methodological_material.php?id=" . $material['id'] . "'>" . $material['title'] . "</a></div>";
        }

        echo "</div>";
        ?>
    </main>
    <?php include "footer.php"; ?>
</body>

</html>