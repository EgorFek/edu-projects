<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>К уроку</title>
    <style>
        .lessons {
            min-height: 65vh;
            width: 90%;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 45px;
        }

        .lessons .btn-link {
            font-size: 20px;
            padding: 10px 20px;
        }

        .lesson {
            box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.25);
            padding: 40px 30px;
        }

        @media screen and (max-width: 768px) {
            .lessons {
                text-align: center;
                justify-content: center;
                align-items: center;
                margin-bottom: 30px;
            }
        }
    </style>
</head>

<body>
    <header>
        <?php include "nav.php"; ?>
    </header>
    <main class="lessons">
        <h1>Выберите класс</h1>
        <div><a class='btn-link' href="lessons.php?year=5">5 класс</a></div>
        <div><a class='btn-link' href="lessons.php?year=6">6 класс</a></div>
        <div><a class='btn-link' href="lessons.php?year=7">7 класс</a></div>
        <div><a class='btn-link' href="lessons.php?year=8">8 класс</a></div>
    </main>
    <?php include "footer.php"; ?>
</body>

</html>