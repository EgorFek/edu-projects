<?php
require_once "database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Достижения</title>
    <style>
        main {
            min-height: 65vh;
            padding: 20px;
            text-align: center;
        }

        .award {
            display: inline-block;
            width: calc(80%/2);
        }

        .award-inner {
            width: 95%;
            margin: 20px auto;
            height: 300px;
            padding: 30px;
            box-shadow: 1px 1px 4px rgba(0, 0, 0, .25);
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .award-inner div {
            text-align: left;
        }

        .award-inner img {
            width: 200px;
        }

        @media screen and (max-width: 1000px) {
            .award {
                width: 80%;
            }

            .award-inner {
                flex-direction: column;
                height: auto;
            }
        }
    </style>
</head>

<body>
    <header>
        <?php include "nav.php"; ?>
    </header>
    <main>
        <?php
        $query = "SELECT year, image_path, type FROM awards LEFT JOIN award_types ON awards.award_type_id = award_types.id ";
        $result = mysqli_query($link, $query);
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
        foreach ($data as $award) {
            $year = $award['year'];
            $type = $award['type'];
            $image = $award['image_path'];
            echo "<div class='award'>
            <div class='award-inner'>
                <a href='show_image.php?path=$image'><img src='$image' alt='$image'></a>
                <div>
                <p>Год: $year</p>
                <p>Тип награды: $type</p>
                </div>
            </div>
        </div>";
        }
        ?>
    </main>
    <?php
    include "footer.php";
    ?>
</body>