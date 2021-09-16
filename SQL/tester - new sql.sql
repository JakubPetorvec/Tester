-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Čtv 16. zář 2021, 11:04
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
  `value` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `answer`, `value`) VALUES
(337, 242, 'Ano je ', 0),
(338, 242, 'ne', 1),
(339, 242, 'ano', 0),
(340, 243, 'jo', 0),
(341, 243, 'ne', 0),
(342, 243, 'ano', 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `exams`
--

CREATE TABLE `exams` (
  `id` int(10) NOT NULL,
  `exams_answers_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabulky `exams_answers`
--

CREATE TABLE `exams_answers` (
  `id` int(10) NOT NULL,
  `exam_id` int(10) NOT NULL,
  `question_id` int(10) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabulky `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `test_id` int(5) NOT NULL,
  `question` varchar(255) NOT NULL,
  `type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `questions`
--

INSERT INTO `questions` (`id`, `test_id`, `question`, `type`) VALUES
(242, 8, 'Je nebe modré', 1),
(243, 8, 'Je dneska Čtvrtek', 1),
(244, 8, 'asd', 0);

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
(8, 'SQL', 80);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `exams_answers`
--
ALTER TABLE `exams_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exams_id` (`exam_id`),
  ADD KEY `question_id` (`question_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=343;

--
-- AUTO_INCREMENT pro tabulku `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `exams_answers`
--
ALTER TABLE `exams_answers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT pro tabulku `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Omezení pro tabulku `exams_answers`
--
ALTER TABLE `exams_answers`
  ADD CONSTRAINT `exams_answers_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exams_answers_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Omezení pro tabulku `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
