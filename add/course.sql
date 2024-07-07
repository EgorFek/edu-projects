-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 08 2023 г., 23:35
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `course`
--

-- --------------------------------------------------------

--
-- Структура таблицы `academic_year`
--

CREATE TABLE `academic_year` (
  `id` int NOT NULL,
  `year` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `academic_year`
--

INSERT INTO `academic_year` (`id`, `year`) VALUES
(1, 5),
(2, 6),
(3, 7),
(4, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `answer`
--

CREATE TABLE `answer` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `question_id` int DEFAULT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `answer`
--

INSERT INTO `answer` (`id`, `user_id`, `question_id`, `answer`) VALUES
(1, 1, 1, 'Нет, не нужно.'),
(2, 1, 2, 'Переустанови его. Если это не поможет спроси у одноклассников.');

-- --------------------------------------------------------

--
-- Структура таблицы `awards`
--

CREATE TABLE `awards` (
  `id` int NOT NULL,
  `year` int NOT NULL,
  `image_path` varchar(35) NOT NULL,
  `award_type_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `awards`
--

INSERT INTO `awards` (`id`, `year`, `image_path`, `award_type_id`) VALUES
(1, 2013, 'files/16854402466475c6f6bf772.jpg', 1),
(2, 2017, 'files/16854404566475c7c821bec.jpg', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `award_types`
--

CREATE TABLE `award_types` (
  `id` int NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `award_types`
--

INSERT INTO `award_types` (`id`, `type`) VALUES
(1, 'Грамота'),
(2, 'Благодарственное письмо');

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id` int NOT NULL,
  `city` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `city`) VALUES
(1, 'Нижний Новгород'),
(2, 'Липецк');

-- --------------------------------------------------------

--
-- Структура таблицы `lesson`
--

CREATE TABLE `lesson` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `academic_year_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `lesson`
--

INSERT INTO `lesson` (`id`, `name`, `text`, `academic_year_id`) VALUES
(1, 'Семья, как экономическая ячейка общества', 'Просмотрите и законспектируйте видео', 1),
(2, 'Потребности семьи', 'Законспектируйте видео', 1),
(3, 'Проверочная работа №1', 'Пройдите тест, доступный по ссылке:\r\nhttps://videouroki.net/tests/shvieinyie-ruchnyie-raboty-3.html', 1),
(4, 'Вязание спицами', 'Законспектируйте презентацию', 2),
(5, 'Проверочная работа №2', 'Пройдите тест, доступный по ссылке:\r\nhttps://videouroki.net/tests/mierki-nieobkhodimyie-dlia-postroieniia-chiertiezha-fartuka-s-naghrudnikom-pravi.html', 1),
(6, 'Проверочная работа №1', 'Пройдите тест', 4),
(7, 'Проверочная работа №1', 'Решите тест', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `lesson_files`
--

CREATE TABLE `lesson_files` (
  `id` int NOT NULL,
  `path` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lesson_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `lesson_files`
--

INSERT INTO `lesson_files` (`id`, `path`, `lesson_id`) VALUES
(1, 'files/01. Семья как экономическая ячейка общества.mp4', 1),
(2, 'files/03. Потребности семьи.mp4', 2),
(3, 'files/Вязание спицами.pptx', 4),
(4, 'files/Тест 8 класс.txt', 6),
(5, 'files/Тест 7 класс.txt', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `methodological_materials`
--

CREATE TABLE `methodological_materials` (
  `id` int NOT NULL,
  `title` varchar(35) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `methodological_materials`
--

INSERT INTO `methodological_materials` (`id`, `title`, `text`) VALUES
(1, 'Как организовать учебный процесс', 'Информация находится в файлах'),
(2, 'Методики работы с детьми', 'Информация в файлах');

-- --------------------------------------------------------

--
-- Структура таблицы `methodological_materials_files`
--

CREATE TABLE `methodological_materials_files` (
  `id` int NOT NULL,
  `path` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mm_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `methodological_materials_files`
--

INSERT INTO `methodological_materials_files` (`id`, `path`, `mm_id`) VALUES
(1, 'files/Как организовать учебный процесс.pptx\r\n', 1),
(2, 'files/mm1.docx', 1),
(3, 'files/Работа с детьми.docx', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE `questions` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `lesson_id` int DEFAULT NULL,
  `question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `user_id`, `lesson_id`, `question`) VALUES
(1, 2, 4, 'А к следующему уроку нужно приносить вязальные принадлежности?'),
(2, 3, 2, 'У меня не открывается файл, что делать?');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int NOT NULL,
  `status` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `training_courses`
--

CREATE TABLE `training_courses` (
  `id` int NOT NULL,
  `year` int NOT NULL,
  `registration_number` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(35) NOT NULL,
  `city_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `training_courses`
--

INSERT INTO `training_courses` (`id`, `year`, `registration_number`, `image`, `city_id`) VALUES
(1, 2017, '5559', 'files/course2017.png', 2),
(2, 2021, '21/132434', 'files/course2021.png', 2),
(3, 2022, '21/3270', 'files/course2022.png', 1),
(4, 2014, '14065', 'files/course2014.jpg', 1),
(5, 2010, '4087', 'files/course2010.jpg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(16) NOT NULL,
  `name` varchar(35) NOT NULL,
  `surname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` int NOT NULL,
  `password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `name`, `surname`, `status_id`, `password`) VALUES
(1, 'admin', 'Анна', 'Феклистова', 2, '$2y$10$NanUgGIzb8kH4F3x4xTeZ.VeZ/vicLBIk4VORofD95FU98DxTK2UG'),
(2, 'test', 'Антонина', 'Ершова', 1, '$2y$10$fDh5LSQiyF6dH.Cr0Bww7Of3TNqAc5aGUGovFVj3GvmCtJg7NGVRG'),
(3, 'test1', 'Юлия', 'Белова', 1, '$2y$10$oZXQD2JxcwrLEws9LsdOyeYQX3rlLKsBF9vIoCBm1pFXjl7ayyfJm'),
(4, 'test2', 'Екатерина', 'Осипова', 1, '$2y$10$5wtmMWvMjpjMpCZPWy/U8OvDYTlkTFf/1U0LfrvniV/k9ZjX3KSDC');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `academic_year`
--
ALTER TABLE `academic_year`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`question_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Индексы таблицы `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `award_type` (`award_type_id`);

--
-- Индексы таблицы `award_types`
--
ALTER TABLE `award_types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id`),
  ADD KEY `academic_year_id` (`academic_year_id`);

--
-- Индексы таблицы `lesson_files`
--
ALTER TABLE `lesson_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lesson_id` (`lesson_id`);

--
-- Индексы таблицы `methodological_materials`
--
ALTER TABLE `methodological_materials`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `methodological_materials_files`
--
ALTER TABLE `methodological_materials_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mm_id` (`mm_id`);

--
-- Индексы таблицы `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`lesson_id`),
  ADD KEY `lesson_id` (`lesson_id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Индексы таблицы `training_courses`
--
ALTER TABLE `training_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `year_id` (`city_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_id` (`status_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `academic_year`
--
ALTER TABLE `academic_year`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `awards`
--
ALTER TABLE `awards`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `award_types`
--
ALTER TABLE `award_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `lesson_files`
--
ALTER TABLE `lesson_files`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `methodological_materials`
--
ALTER TABLE `methodological_materials`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `methodological_materials_files`
--
ALTER TABLE `methodological_materials_files`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `training_courses`
--
ALTER TABLE `training_courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);

--
-- Ограничения внешнего ключа таблицы `awards`
--
ALTER TABLE `awards`
  ADD CONSTRAINT `awards_ibfk_1` FOREIGN KEY (`award_type_id`) REFERENCES `award_types` (`id`);

--
-- Ограничения внешнего ключа таблицы `lesson`
--
ALTER TABLE `lesson`
  ADD CONSTRAINT `lesson_ibfk_1` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`id`);

--
-- Ограничения внешнего ключа таблицы `lesson_files`
--
ALTER TABLE `lesson_files`
  ADD CONSTRAINT `lesson_files_ibfk_1` FOREIGN KEY (`lesson_id`) REFERENCES `lesson` (`id`);

--
-- Ограничения внешнего ключа таблицы `methodological_materials_files`
--
ALTER TABLE `methodological_materials_files`
  ADD CONSTRAINT `methodological_materials_files_ibfk_1` FOREIGN KEY (`mm_id`) REFERENCES `methodological_materials` (`id`);

--
-- Ограничения внешнего ключа таблицы `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`lesson_id`) REFERENCES `lesson` (`id`);

--
-- Ограничения внешнего ключа таблицы `training_courses`
--
ALTER TABLE `training_courses`
  ADD CONSTRAINT `training_courses_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
