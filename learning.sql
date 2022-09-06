-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 06 2022 г., 14:42
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `learning`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `id_person` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id_admin`, `id_person`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `kurs`
--

CREATE TABLE `kurs` (
  `id_kurs` int NOT NULL,
  `kurs_name` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `kurs_task` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `kurs`
--

INSERT INTO `kurs` (`id_kurs`, `kurs_name`, `description`, `kurs_task`) VALUES
(1, 'Информационные технологии', 'Изучи основы информационных технологий', 'Напишите эссе на тему: «Роль информационных технологий в жизни современного человека»‎ и загрузите работу в формате docx, doc или pdf.'),
(2, 'Информационная безопасность', 'Погрузись в анализ практик из области управления рисками', '2 Kurs Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet at, atque, debitis dolorem eius est et, fuga illum impedit mollitia nostrum numquam obcaecati quam quidem ratione soluta totam voluptates voluptatum!');

-- --------------------------------------------------------

--
-- Структура таблицы `kurs_professor`
--

CREATE TABLE `kurs_professor` (
  `id_kurs_professor` int NOT NULL,
  `id_professor` int NOT NULL,
  `id_kurs` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `kurs_professor`
--

INSERT INTO `kurs_professor` (`id_kurs_professor`, `id_professor`, `id_kurs`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `kurs_result`
--

CREATE TABLE `kurs_result` (
  `id_kurs_result` int NOT NULL,
  `id_kurs_student` int NOT NULL,
  `comment_student` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `file` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `id_kurs_professor` int NOT NULL,
  `point` int NOT NULL DEFAULT '0',
  `comment_professor` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status_done` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'none',
  `status_check` varchar(255) NOT NULL DEFAULT 'none',
  `date_result` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `kurs_result`
--

INSERT INTO `kurs_result` (`id_kurs_result`, `id_kurs_student`, `comment_student`, `file`, `id_kurs_professor`, `point`, `comment_professor`, `status_done`, `status_check`, `date_result`) VALUES
(1, 1, 'Текст к работе. Эссе', 'Uploads/1654799373_Лекции. Опорный конспект 2 часть.pdf', 1, 96, 'В рамках спецификации современных стандартов, элементы политического процесса лишь добавляют фракционных разногласий и своевременно верифицированы. В рамках спецификации современных стандартов, предприниматели в сети интернет, вне зависимости от их уровня, должны быть в равной степени предоставлены сами себе. Как принято считать, стремящиеся вытеснить традиционное производство, нанотехнологии призывают нас к новым свершениям, которые, в свою очередь, должны быть рассмотрены исключительно в разрезе маркетинговых и финансовых предпосылок.', 'done', 'check', '2022-06-04'),
(34, 42, 'Комментарий такой вот', 'Uploads/1654516489_1.txt', 1, 80, 'Текст такой', 'done', 'check', '2022-06-06'),
(38, 46, NULL, NULL, 1, 0, NULL, 'none', 'none', NULL),
(40, 48, 'Таблица', 'Uploads/1654517843_ВВС 1 лаб.xlsx', 1, 0, NULL, 'done', 'none', NULL),
(42, 50, 'NTrcncnnd', 'Uploads/1654518250_1.txt', 1, 0, NULL, 'done', 'none', NULL),
(44, 52, 'Комментарий к работе вот такой', 'Uploads/1654518661_1.txt', 1, 68, 'Текст к работе вот такой', 'done', 'check', '2022-06-06'),
(46, 54, 'dsfhjknsgljngagnjkar', 'Uploads/1656335714_Слой 3.png', 1, 100, 'Текст какой-то', 'done', 'check', '2022-06-27');

-- --------------------------------------------------------

--
-- Структура таблицы `kurs_student`
--

CREATE TABLE `kurs_student` (
  `id_kurs_student` int NOT NULL,
  `id_student` int NOT NULL,
  `id_kurs` int NOT NULL,
  `status` varchar(45) NOT NULL,
  `last_page` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'videoPage.php'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `kurs_student`
--

INSERT INTO `kurs_student` (`id_kurs_student`, `id_student`, `id_kurs`, `status`, `last_page`) VALUES
(1, 1, 1, 'unlock', 'resultPage.php'),
(2, 1, 2, 'lock', 'videoPage.php'),
(42, 26, 1, 'unlock', 'resultPage.php'),
(43, 26, 2, 'lock', 'videoPage.php'),
(46, 28, 1, 'unlock', 'videoPage.php'),
(47, 28, 2, 'lock', 'videoPage.php'),
(48, 29, 1, 'unlock', 'resultControlWorkPage.php'),
(49, 29, 2, 'lock', 'videoPage.php'),
(50, 30, 1, 'unlock', 'resultPage.php'),
(51, 30, 2, 'lock', 'videoPage.php'),
(52, 31, 1, 'unlock', 'resultPage.php'),
(53, 31, 2, 'lock', 'videoPage.php'),
(54, 32, 1, 'unlock', 'resultPage.php'),
(55, 32, 2, 'lock', 'videoPage.php');

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--

CREATE TABLE `message` (
  `id_message` int NOT NULL,
  `aria` varchar(255) DEFAULT NULL,
  `theme` varchar(500) DEFAULT NULL,
  `text_student` varchar(1000) DEFAULT NULL,
  `id_from_person` int NOT NULL,
  `answer` varchar(1000) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'none',
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `message`
--

INSERT INTO `message` (`id_message`, `aria`, `theme`, `text_student`, `id_from_person`, `answer`, `status`, `file`) VALUES
(7, 'Учебный', 'Не получается что-то сделать', 'Учитывая ключевые сценарии поведения, укрепление и развитие внутренней структуры обеспечивает актуальность первоочередных требований. Как принято считать, диаграммы связей призывают нас к новым свершениям, которые, в свою очередь, должны быть объединены в целые кластеры себе подобных. Задача организации, в особенности же синтетическое тестирование является качественно новой ступенью стандартных подходов.', 7, '123', 'done', NULL),
(8, 'Технический', 'Не работает что-то', 'Идейные соображения высшего порядка, а также убеждённость некоторых оппонентов способствует подготовке и реализации модели развития. Высокий уровень вовлечения представителей целевой аудитории является четким доказательством простого факта: выбранный нами инновационный путь играет определяющее значение для системы массового участия. Равным образом, высокое качество позиционных исследований позволяет выполнить важные задания по разработке поставленных обществом задач.', 7, 'sdfg', 'done', NULL),
(13, 'Технический', 'Не работает что-то', 'Как уже неоднократно упомянуто, независимые государства разоблачены. Современные технологии достигли такого уровня, что дальнейшее развитие различных форм деятельности требует определения и уточнения системы массового участия. Кстати, активно развивающиеся страны третьего мира являются только методом политического участия и разоблачены!', 8, 'Всё починил, теперь работает', 'done', NULL),
(14, 'Учебный', 'Не получается что-то сделать!', 'Однозначно, стремящиеся вытеснить традиционное производство, нанотехнологии могут быть своевременно верифицированы. Таким образом, сплочённость команды профессионалов требует определения и уточнения стандартных подходов.', 7, '123', 'done', NULL),
(27, 'Технический', 'Вот таблица', '', 8, 'Всё починил, теперь работает', 'done', 'Uploads/1654504504_ВВС 1 лаб.xlsx'),
(28, 'Технический', 'Ничего не рабботаетАаааа', '', 7, 'sdfg', 'done', 'Uploads/1654504630_1.txt'),
(30, 'Учебный', 'Не получается что-то сделать', 'Gjvjubnt', 34, 'Ответ', 'done', 'Uploads/1654516912_ВВС лекции.docx'),
(31, 'Технический', '1245635', 'sdfsgd', 34, 'Ответил', 'done', 'Uploads/1654516912_ВВС лекции.docx'),
(33, 'Учебный', 'Ntvf', 'dsafdsgdhgf', 36, NULL, 'none', 'Uploads/1654517510_1.txt'),
(34, 'Технический', 'Не получается что-то сделать', 'Аааааа, не работает кнопка', 39, 'Всё починили', 'done', 'Uploads/1654518801_ВВС-Лабораторная работа №3.docx'),
(35, 'Учебный', 'Не получается что-то сделать', 'Rjdfsgdsdf', 39, 'Сделай вот так', 'done', 'Uploads/1654518861_Лекции. Опорный конспект 1 часть.pdf'),
(36, 'Технический', 'Ничего не работает', 'Что же делать?', 8, 'Всё починил, теперь работает', 'done', 'Uploads/1654519002_ВВС_Лаб1_Журавлёв_КД.docx'),
(37, 'Технический', 'Не работает что-то', 'Текст того, что не работает', 8, NULL, 'none', 'Uploads/1654800572_1.txt');

-- --------------------------------------------------------

--
-- Структура таблицы `person`
--

CREATE TABLE `person` (
  `id_person` int NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `person`
--

INSERT INTO `person` (`id_person`, `full_name`, `email`, `role`, `password`) VALUES
(3, 'Иванов Иван Иванович', 'admin@admin', 'administrator', '202cb962ac59075b964b07152d234b70'),
(7, 'Медведева Валерия Дмитриевна', '123@1234', 'student', '202cb962ac59075b964b07152d234b70'),
(8, 'Голубев Иван Олегович', '123@12345', 'professor', '202cb962ac59075b964b07152d234b70'),
(34, 'Марков Ираклий Олегович', 'm@m.com', 'student', '202cb962ac59075b964b07152d234b70'),
(36, 'Рогов Юлиан Вячеславович', 'n@n.ru', 'student', '202cb962ac59075b964b07152d234b70'),
(37, 'Мишин Панкратий Еремеевич', 'n@n.com', 'student', '202cb962ac59075b964b07152d234b70'),
(38, 'Давыдов Кондратий Леонидович', 'c@c.ru', 'student', '202cb962ac59075b964b07152d234b70'),
(39, 'Харитонов Сергей Демьянович', 'd@d.com', 'student', '202cb962ac59075b964b07152d234b70'),
(40, 'Марков Ираклий Еленович', 'e@e.com', 'student', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Структура таблицы `professor`
--

CREATE TABLE `professor` (
  `id_professor` int NOT NULL,
  `id_person` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `professor`
--

INSERT INTO `professor` (`id_professor`, `id_person`) VALUES
(1, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `student`
--

CREATE TABLE `student` (
  `id_student` int NOT NULL,
  `id_person` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `student`
--

INSERT INTO `student` (`id_student`, `id_person`) VALUES
(1, 7),
(26, 34),
(28, 36),
(29, 37),
(30, 38),
(31, 39),
(32, 40);

-- --------------------------------------------------------

--
-- Структура таблицы `test_student`
--

CREATE TABLE `test_student` (
  `id_test` int NOT NULL,
  `id_kurs_student` int NOT NULL,
  `number_test` int NOT NULL DEFAULT '1',
  `result_test` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `test_student`
--

INSERT INTO `test_student` (`id_test`, `id_kurs_student`, `number_test`, `result_test`) VALUES
(1, 1, 1, 60),
(32, 42, 1, 60),
(33, 43, 2, NULL),
(36, 46, 1, NULL),
(37, 47, 2, NULL),
(38, 48, 1, 80),
(39, 49, 2, NULL),
(40, 50, 1, 60),
(41, 51, 2, NULL),
(42, 52, 1, 20),
(43, 53, 2, NULL),
(44, 54, 1, 60),
(45, 55, 2, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `admin_ibfk_1` (`id_person`);

--
-- Индексы таблицы `kurs`
--
ALTER TABLE `kurs`
  ADD PRIMARY KEY (`id_kurs`);

--
-- Индексы таблицы `kurs_professor`
--
ALTER TABLE `kurs_professor`
  ADD PRIMARY KEY (`id_kurs_professor`),
  ADD KEY `kurs_professor_ibfk_1` (`id_kurs`),
  ADD KEY `kurs_professor_ibfk_2` (`id_professor`);

--
-- Индексы таблицы `kurs_result`
--
ALTER TABLE `kurs_result`
  ADD PRIMARY KEY (`id_kurs_result`),
  ADD KEY `kurs_result_ibfk_1` (`id_kurs_professor`),
  ADD KEY `kurs_result_ibfk_2` (`id_kurs_student`);

--
-- Индексы таблицы `kurs_student`
--
ALTER TABLE `kurs_student`
  ADD PRIMARY KEY (`id_kurs_student`),
  ADD KEY `id_kurs` (`id_kurs`),
  ADD KEY `id_student` (`id_student`);

--
-- Индексы таблицы `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `id_from_person` (`id_from_person`);

--
-- Индексы таблицы `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id_person`);

--
-- Индексы таблицы `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id_professor`),
  ADD KEY `professor_ibfk_1` (`id_person`);

--
-- Индексы таблицы `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id_student`),
  ADD KEY `student_ibfk_1` (`id_person`);

--
-- Индексы таблицы `test_student`
--
ALTER TABLE `test_student`
  ADD PRIMARY KEY (`id_test`),
  ADD KEY `test_student_ibfk_1` (`id_kurs_student`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `kurs`
--
ALTER TABLE `kurs`
  MODIFY `id_kurs` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `kurs_professor`
--
ALTER TABLE `kurs_professor`
  MODIFY `id_kurs_professor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `kurs_result`
--
ALTER TABLE `kurs_result`
  MODIFY `id_kurs_result` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT для таблицы `kurs_student`
--
ALTER TABLE `kurs_student`
  MODIFY `id_kurs_student` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT для таблицы `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `person`
--
ALTER TABLE `person`
  MODIFY `id_person` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT для таблицы `professor`
--
ALTER TABLE `professor`
  MODIFY `id_professor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `student`
--
ALTER TABLE `student`
  MODIFY `id_student` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `test_student`
--
ALTER TABLE `test_student`
  MODIFY `id_test` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `kurs_professor`
--
ALTER TABLE `kurs_professor`
  ADD CONSTRAINT `kurs_professor_ibfk_1` FOREIGN KEY (`id_kurs`) REFERENCES `kurs` (`id_kurs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kurs_professor_ibfk_2` FOREIGN KEY (`id_professor`) REFERENCES `professor` (`id_professor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `kurs_result`
--
ALTER TABLE `kurs_result`
  ADD CONSTRAINT `kurs_result_ibfk_1` FOREIGN KEY (`id_kurs_professor`) REFERENCES `kurs_professor` (`id_kurs_professor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kurs_result_ibfk_2` FOREIGN KEY (`id_kurs_student`) REFERENCES `kurs_student` (`id_kurs_student`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `kurs_student`
--
ALTER TABLE `kurs_student`
  ADD CONSTRAINT `kurs_student_ibfk_1` FOREIGN KEY (`id_kurs`) REFERENCES `kurs` (`id_kurs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kurs_student_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `student` (`id_student`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`id_from_person`) REFERENCES `person` (`id_person`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `professor_ibfk_1` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `test_student`
--
ALTER TABLE `test_student`
  ADD CONSTRAINT `test_student_ibfk_1` FOREIGN KEY (`id_kurs_student`) REFERENCES `kurs_student` (`id_kurs_student`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
