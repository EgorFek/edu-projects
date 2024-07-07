<?php
require_once "database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Курсы повышения квалификации</title>
    <style>
        main {
            min-height: 65vh;
            padding: 20px;
            text-align: center;
        }

        .course {
            display: inline-block;
            width: calc(80%/2);
        }

        .course-inner {
            width: 95%;
            margin: 20px auto;
            height: 300px;
            padding: 30px;
            box-shadow: 1px 1px 4px rgba(0, 0, 0, .25);
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .course-inner div {
            text-align: left;
        }

        .course-inner img {
            width: 200px;
        }

        @media screen and (max-width: 1000px) {
            .course {
                width: 80%;
            }

            .course-inner {
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
        $query = "SELECT year, registration_number, image, city FROM training_courses LEFT JOIN cities ON training_courses.city_id = cities.id";
        $result = mysqli_query($link, $query);
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
        foreach ($data as $course) {
            $year = $course['year'];
            $registration_number = $course['registration_number'];
            $image = $course['image'];
            $city = $course['city'];
            echo "<div class='course'>
            <div class='course-inner'>
                <a href='show_image.php?path=$image'><img src='$image' alt='$image'></a>
                <div>
                    <p>Год: $year</p>
                    <p>Номер регистрации: $registration_number</p>
                    <p>Город: $city</p>
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