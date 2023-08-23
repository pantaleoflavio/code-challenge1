-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Ago 23, 2023 alle 13:59
-- Versione del server: 10.4.27-MariaDB
-- Versione PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-challenge`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `faq_id_item` int(11) NOT NULL,
  `faq_content` text NOT NULL,
  `faq_answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `faq`
--

INSERT INTO `faq` (`faq_id`, `faq_id_item`, `faq_content`, `faq_answer`) VALUES
(1, 1, 'how is the name of this article?', 'this articles name is Doc'),
(2, 1, 'how much costs this article?', 'Too much'),
(3, 2, 'how is the name of this article?', 'this articles name is Grumpy'),
(6, 4, 'Can I throw the article out of window?', 'No'),
(7, 0, 'How much costs the item?', '2 euro'),
(9, 6, 'How big is this Item', '200cm'),
(10, 0, 'How can pay', 'just cash'),
(11, 0, 'Where ist my package?', 'under the sea');

-- --------------------------------------------------------

--
-- Struttura della tabella `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_title` varchar(255) NOT NULL,
  `item_image` varchar(255) DEFAULT NULL,
  `item_description` varchar(255) DEFAULT NULL,
  `item_id_faq` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `items`
--

INSERT INTO `items` (`item_id`, `item_title`, `item_image`, `item_description`, `item_id_faq`) VALUES
(1, 'First', '1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis aliquet dapibus ante, at vestibulum massa rhoncus et. Aenean at purus condimentum,', 1),
(2, 'Second', '2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 2),
(3, 'Third', '3.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis aliquet dapibus ante, at vestibulum massa rhoncus et. ', 1),
(4, 'Fourth', '4.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis aliquet dapibus ante, at vestibulum massa rhoncus et. Aenean at purus condimentum,', 1),
(5, 'Fifth', '5.jpg', 'Lorem ipsum dolor sit amet,', 1),
(6, 'Sixth', '6.jpg', 'Lorem ipsum dolor', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `team`
--

CREATE TABLE `team` (
  `team_id` int(11) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `team_image` varchar(255) DEFAULT NULL,
  `team_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `team`
--

INSERT INTO `team` (`team_id`, `team_name`, `team_image`, `team_description`) VALUES
(1, 'Doc', '1.jpg', 'The leader of the seven dwarfs, Doc wears glasses and often mixes up his words.'),
(2, 'Grumpy', '2.jpg', 'Grumpy initially opposes Snow Whites presence in the dwarfs home, but later warns her of the threat posed by the Queen and eagerly rushes to her aid upon realizing that she is in danger, leading the charge himself. He has the biggest nose of the dwarfs an'),
(3, 'Happy', '3.jpg', 'Happy is the jovial dwarf and is usually portrayed laughing. While the other dwarfs have thin black eyebrows inspired by Walt Disneys eyebrows, his eyebrows are white and thicker.'),
(4, 'Sleepy', '4.jpg', 'Sleepy is always tired and appears lethargic in most situations.'),
(5, 'Sneezy', '5.jpg', 'Sneezys name is earned by his extraordinarily powerful sneezes (caused by hay fever), which are seen blowing even the heaviest of objects across a room.'),
(6, 'Dopey', '6.jpg', 'Dopey is the youngest dwarf, being the only one who does not have a beard and is bald, with the largest ears of the dwarfs. He is accident-prone and mute, with Happy explaining that he has simply \"never tried\" to speak.'),
(8, 'Spiderman', 'download.jpg', 'He is an Avenger');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_email`, `user_password`, `user_role`) VALUES
(1, 'user1', 'user@1.com', '1234', 'customer'),
(2, 'user2', 'user@2.com', '0000', 'admin');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indici per le tabelle `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indici per le tabelle `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT per la tabella `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
