<? session_start(); ?>
<link rel="stylesheet" href="css/style.css">
<style>
    .nav-auth {
        display: flex;
        flex-direction: row;
        gap: 15px;
        align-items: center;
        justify-content: center;
    }

    @media screen and (max-width: 768px) {
        .nav-auth {
            flex-direction: column;
            align-items: flex-end;
        }
    }
</style>
<nav>
    <div class="nav-up">
        <div class="nav-container">
            <div class="logo">Сайт Феклистовой Анны Сергеевны</div>

            <div class="burger">
                <div class="burger-line"></div>
                <div class="burger-line"></div>
                <div class="burger-line"></div>
            </div>
        </div>
        <ul class="nav-links">
            <li><a href="index.php" class="nav-link">Главная</a></li>
            <li><a href="about.php" class="nav-link">О себе</a></li>
            <li><a href="training_course.php" class="nav-link">Курсы повышения квалификации</a></li>
            <li><a href="awards.php" class="nav-link">Достижения</a></li>
            <li><a href="to_the_lesson.php" class="nav-link">К уроку</a></li>
        </ul>
    </div>
    <div class="line"></div>
    <div class="nav-down">
        <div class="profile">
            <?php
            if (!isset($_SESSION['auth'])) {
                echo "<a href='login.php' class='btn-link'>Войти</a>";
            } else {
                echo "<div class='nav-auth'>" . $_SESSION['name'] . " " . $_SESSION['surname'] . " <a href='logout.php' class='btn-link'>Выйти</a>";
                if ($_SESSION["status"] == "admin") {
                    echo "<a href='admin.php' class='btn-link'>Админ</a>";
                }
                echo "</div>";
            }
            ?>
        </div>
    </div>
</nav>

<script src="js/burger.js"></script>