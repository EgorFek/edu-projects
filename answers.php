<?php
session_start();
if (empty($_GET['id'])) {
    header("Location: index.php");
    exit;
}
require_once 'database.php';
$query = "SELECT answer.id as id, name, surname, answer FROM answer JOIN users ON users.id = answer.user_id WHERE question_id = '" . $_GET['id'] . "'";
$result = mysqli_query($link, $query);
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
?>

<?php
if (isset($_POST['answer']) && !empty($_POST['answer'])) {
    $user_id = $_SESSION['id'];
    $question_id = $_GET['id'];
    $answer = $_POST['answer'];
    $query = "INSERT INTO answer (user_id, question_id, answer) VALUES ('$user_id', '$question_id', '$answer')";
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
    <title>Ответы</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        main {
            min-height: 65vh;
        }

        .answers {
            width: 90%;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .answer {
            padding: 20px;
            width: 100%;
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
        <div class="answers">
            <?php
            if ($_SESSION['auth']) {
                echo '<form method="post">
                <textarea name="answer" id="answer" cols="30" rows="10" placeholder="Введите свой ответ"></textarea>
                <input type="submit" value="Отправить" class="btn-form">
            </form>';
            }
            foreach ($data as $answer) {
                $id = $answer['id'];
                $name = $answer['name'];
                $surname = $answer['surname'];
                $answer_text = $answer['answer'];
                echo "
                    <div class='answer'>
                        <div>
                           Имя пользователя: <span style='color:green;'>$surname $name</span>
                        </div>
                        <div>
                            $answer_text
                        </div>
                    ";
                if ($_SESSION['status'] == "admin") {
                    echo "<div><a href='delete_entry.php?id=$id&table_name=answer'>Удалить</a></div>";
                }

                echo "</div>";
            }
            ?>
        </div>
    </main>
    <?php include "footer.php"; ?>
</body>

</html>