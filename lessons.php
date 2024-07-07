<?php
if (empty($_GET['year'])) {
    header("Location: index.php");
    exit;
}
header('Content-Type: text/html; charset= utf-8');
require_once "database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_GET['year'] . " класс"; ?></title>
    <style>
        .lessons_body {
            min-height: 65vh;
            gap: 40px;
            width: 90%;
            margin: 0 auto;
            padding: 20px 0;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .lessons {
            display: flex;
            flex-direction: column;
            height: 100%;
            align-items: center;
            justify-content: flex-start;
            gap: 40px;
        }

        .lesson {
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

            .lessons_body {
                gap: 30px;
            }
        }
    </style>
</head>

<body>
    <header>
        <?php include "nav.php"; ?>
    </header>
    <main class="lessons_body">
        <form method="get">
            <input type="hidden" name="year" value="<?php echo $_GET['year']; ?>">
            <input type="text" name="q">
            <input type="submit" value="Найти" class="btn-form">
        </form>
        <?php
        $q = $_GET['q'];
        $query = "SELECT lesson.id, name FROM lesson LEFT JOIN academic_year ON lesson.academic_year_id = academic_year.id WHERE year = '" . $_GET['year'] . "' and name LIKE '%$q%'";
        $result = mysqli_query($link, $query);
        for ($lessons = []; $row = mysqli_fetch_assoc($result); $lessons[] = $row);

        echo "<div class='lessons'>";

        foreach ($lessons as $lesson) {
            echo "<div class='lesson'><a href='lesson.php?id=" . $lesson['id'] . "'>" . $lesson['name'] . "</a></div>";
        }

        echo "</div>";
        ?>
    </main>
    <?php include "footer.php"; ?>
</body>

</html>