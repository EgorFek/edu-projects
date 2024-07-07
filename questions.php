<?php
session_start();
if (empty($_GET['id'])) {
    header("Location: index.php");
    exit;
}
require_once 'database.php';
$query = "SELECT questions.id as id, name, surname, question FROM questions JOIN users ON users.id = questions.user_id WHERE lesson_id = '" . $_GET['id'] . "'";
$result = mysqli_query($link, $query);
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

?>

<?php
if (isset($_POST['question']) && !empty($_POST['question'])) {
    $user_id = $_SESSION['id'];
    $lession_id = $_GET['id'];
    $question = $_POST['question'];
    $query = "INSERT INTO questions (user_id, lesson_id, question) VALUES ('$user_id', '$lession_id', '$question')";
    mysqli_query($link, $query);
    header("Refresh: 0");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вопросы к уроку: <?php echo $_GET['t']; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        main {
            min-height: 65vh;
        }

        .questions {
            width: 90%;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .question {
            padding: 20px;
            box-shadow: 1px 1px 4px rgba(0, 0, 0, .25);
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        form {
            align-self: flex-start;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
            gap: 20px;
        }

        textarea {
            background-color: #f1f1f1;
            padding: 10px;
            border-radius: 3px;
            font-size: 16px;
            color: rgba(0, 0, 0, .50);
            border: none;
        }

        .btn-form {
            padding: 5px;
        }
    </style>
</head>

<body>
    <header>
        <?php include "nav.php"; ?>
    </header>
    <main>
        <div class="questions">
            <?php
            if ($_SESSION['auth']) {
                echo '<form method="post">
                <textarea name="question" id="question" cols="30" rows="10" placeholder="Введите свой вопрос"></textarea>
                <input type="submit" value="Отправить" class="btn-form">
            </form>';
            }
            if (empty($data)) {
                echo "На данный урок вопросов нет";
            } else {
                foreach ($data as $question) {
                    $id = $question['id'];
                    $name = $question['name'];
                    $surname = $question['surname'];
                    $question_text = $question['question'];
                    echo "
                    <div class='question'>
                        <div>
                           Имя пользователя: <span style='color:green;'>$surname $name</span>
                        </div>
                        <div>
                            $question_text
                        </div>
                        <div>
                            <a href='answers.php?id=$id'>Ответы</a>
                        </div>
                    ";
                    if ($_SESSION['status'] == "admin") {
                        echo "<div><a href='delete_entry.php?id=$id&table_name=questions'>Удалить</a></div>";
                    }
                    echo "</div>";
                }
            }
            ?>
        </div>
    </main>
    <?php include "footer.php"; ?>
</body>

</html>