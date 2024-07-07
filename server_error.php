<head>
    <title>Ошибка</title>
</head>
<style>
    body {
        height: 100vh;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }

    .server-error-message {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 20px;
        font-size: 20px;
    }

    .server-error-button {
        display: inline-block;
        background-color: #FFB800;
        padding: 10px;
        border-radius: 3px;
        color: #000;
        text-decoration: none;
    }

    .server-error-button:hover {
        color: #000;
    }
</style>
<?php
function print_server_error_message($message)
{
    echo "<div class='server-error-message'>
                <span>$message</span>
                <a href=index.php class=server-error-button>На главную</a>
            </div>";
    exit;
}
