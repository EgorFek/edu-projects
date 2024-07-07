<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сайт Феклистовой Анны Сергеевны</title>
</head>

<body>
    <header>
        <?php include "nav.php"; ?>
    </header>
    <main>
        <div class="slider-container">
            <div class="slider">
                <img src="files/slide1.png" alt="slide1" class="slide">
                <img src="files/slide2.png" alt="slide2" class="slide">
                <img src="files/slide3.png" alt="slide3" class="slide">
                <style>
                    .slide {
                        width: 100%;
                        height: 40vw;
                    }
                </style>
            </div>
            <div class="slider-btns">
                <div class="prev" onclick="changeSlide(-1)">&#10094;</div>
                <div class="next" onclick="changeSlide(1)">&#10095;</div>
            </div>
        </div>
        <script src="js/slider.js"></script>
        <div class="teacher-info">
            <h1>Феклистова Анна Сергеевна</h1>
            <p>Преподаватель технологии с опытом работы более 25 лет. Имеет высшее техническое образование и дополнительную квалификацию по методике преподавания.</p>
        </div>
        <div class="useful">
            <h2>Что вы можете найти для себя</h2>
            <div class="for-teachers">
                <h3>Для учителей</h3>
                <p>Здесь вы можете найти различные учебные материалы.</p>
            </div>

            <div class="for-students">
                <h3>Для учеников</h3>
                <p>Вы можете просмотреть все лекции, а также задать вопрос под уроком</p>
            </div>

        </div>
    </main>
    <?php
    include "footer.php";
    ?>
</body>

</html>