-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Stř 29. zář 2021, 12:01
-- Verze serveru: 10.4.21-MariaDB
-- Verze PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `tester`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `value` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `answer`, `value`) VALUES
(378, 280, 'Ans 1', 1),
(379, 280, 'Ans 2', 0),
(380, 280, 'Ans 3', 0),
(381, 282, 'Answer 1', 1),
(382, 282, 'Answer 2', 0),
(383, 282, 'Answer 3', 0),
(384, 283, 'Answer 1', 1),
(385, 283, 'Answer 2', 0),
(386, 283, 'Answer 3', 1),
(387, 284, 'Answer 1', 1),
(388, 284, 'Answer 2', 0),
(389, 284, 'Answer 3', 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `exams`
--

CREATE TABLE `exams` (
  `id` int(10) NOT NULL,
  `test_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `start` varchar(30) NOT NULL,
  `finish` varchar(30) NOT NULL,
  `percentage` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `exams`
--

INSERT INTO `exams` (`id`, `test_id`, `name`, `start`, `finish`, `percentage`) VALUES
(348, 29, 'subata', '29.09.2021 12:00:14', '29.09.2021 12:00:26', 50);

-- --------------------------------------------------------

--
-- Struktura tabulky `exams_answers`
--

CREATE TABLE `exams_answers` (
  `id` int(10) NOT NULL,
  `exam_id` int(10) NOT NULL,
  `test_id` int(11) NOT NULL,
  `question_id` int(10) NOT NULL,
  `buttonAnswer` int(10) DEFAULT NULL,
  `textboxAnswer` varchar(255) DEFAULT NULL,
  `isRight` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `exams_answers`
--

INSERT INTO `exams_answers` (`id`, `exam_id`, `test_id`, `question_id`, `buttonAnswer`, `textboxAnswer`, `isRight`) VALUES
(474, 348, 29, 280, 378, '', 1),
(475, 348, 29, 286, NULL, 'Answer 2', 0),
(476, 348, 29, 282, 381, '', 1),
(477, 348, 29, 287, NULL, 'Answer 2', 0),
(478, 348, 29, 283, 384, '', 1),
(479, 348, 29, 284, 387, '', 1),
(480, 348, 29, 281, NULL, 'asdasd', 0),
(481, 348, 29, 285, NULL, 'Answer 2', 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `test_id` int(5) NOT NULL,
  `question` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `questions`
--

INSERT INTO `questions` (`id`, `test_id`, `question`, `type`) VALUES
(280, 29, 'Question 1', 'button'),
(281, 29, 'Question 2', 'textbox'),
(282, 29, 'Question 3', 'button'),
(283, 29, 'Question 4', 'button'),
(284, 29, 'Question 5', 'button'),
(285, 29, 'Question 6', 'textbox'),
(286, 29, 'Question 7', 'textbox'),
(287, 29, 'Question 8', 'textbox');

-- --------------------------------------------------------

--
-- Struktura tabulky `tests`
--

CREATE TABLE `tests` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `percentage` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `tests`
--

INSERT INTO `tests` (`id`, `name`, `percentage`) VALUES
(29, 'MVC', 80);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`question_id`);

--
-- Indexy pro tabulku `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexy pro tabulku `exams_answers`
--
ALTER TABLE `exams_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_id` (`exam_id`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `buttonAnswer` (`buttonAnswer`);

--
-- Indexy pro tabulku `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexy pro tabulku `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=390;

--
-- AUTO_INCREMENT pro tabulku `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=349;

--
-- AUTO_INCREMENT pro tabulku `exams_answers`
--
ALTER TABLE `exams_answers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=482;

--
-- AUTO_INCREMENT pro tabulku `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=288;

--
-- AUTO_INCREMENT pro tabulku `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Omezení pro tabulku `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Omezení pro tabulku `exams_answers`
--
ALTER TABLE `exams_answers`
  ADD CONSTRAINT `exams_answers_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exams_answers_ibfk_2` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exams_answers_ibfk_3` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exams_answers_ibfk_4` FOREIGN KEY (`buttonAnswer`) REFERENCES `answers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Omezení pro tabulku `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
