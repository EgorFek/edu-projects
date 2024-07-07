<?php

$link = mysqli_connect('localhost', 'root', '', 'course');

if ($link == false) {
    echo "Ошибка подключения к БД";
    exit;
}
