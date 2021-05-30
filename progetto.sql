-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 26, 2021 alle 20:44
-- Versione del server: 10.4.14-MariaDB
-- Versione PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progetto`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `autore`
--

CREATE TABLE `autore` (
  `id_autore` int(11) NOT NULL,
  `nome_darte` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `autore`
--

INSERT INTO `autore` (`id_autore`, `nome_darte`) VALUES
(323, '\"\"'),
(324, '\"  Sue Kim\"'),
(325, '\"  Fu00e8lix Rueda\"'),
(326, '\"  Jesper Juul\"'),
(327, '\"  Scott Adams\"'),
(328, '\"  Sherry Maysonave\"'),
(329, '\"  Murray Lachlan Young\"'),
(330, '\"Aldo Nove\"'),
(331, '\"  Suzanne Eggins\"'),
(332, '\"Diana Slade\"'),
(333, '\"  Ian Hough\"'),
(334, '\"  Sconosciuto\"');

-- --------------------------------------------------------

--
-- Struttura della tabella `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`) VALUES
(118, '\"\"'),
(119, '\"  Crafts \"'),
(120, '\"  Sconosciuto\"'),
(121, '\"  Games \"'),
(122, '\"  Humor\"'),
(123, '\"  Self-Help\"'),
(124, '\"  Poetry\"'),
(125, '\"  Language Arts \"'),
(126, '\"  Biography \"');

-- --------------------------------------------------------

--
-- Struttura della tabella `libro`
--

CREATE TABLE `libro` (
  `isbn` varchar(50) NOT NULL,
  `titolo` varchar(40) NOT NULL,
  `numero_pagine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `libro`
--

INSERT INTO `libro` (`isbn`, `titolo`, `numero_pagine`) VALUES
('0836228995', 'Casual Day Has Gone Too Far', 128),
('1607058669', 'Boutique Casual for Boys', 111),
('1845530462', 'Analysing Casual Conversation', 333),
('1880092484', 'Casual Power', 229),
('8494661159', 'Casual', 130),
('880457559X', 'Diventa stilista. Crea il tuo look casua', 32),
('8845236331', 'Casual sex e altri versi', 210),
('8897257615', 'Perry boys. Manchester', 0),
('9780262285803', 'A Casual Revolution', 264),
('BL:A0022062510', 'The New Pauper Infirmaries and Casual Wa', 19);

-- --------------------------------------------------------

--
-- Struttura della tabella `libro_autori`
--

CREATE TABLE `libro_autori` (
  `id_autore` int(11) NOT NULL,
  `ISBN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `libro_autori`
--

INSERT INTO `libro_autori` (`id_autore`, `ISBN`) VALUES
(324, '1607058669'),
(324, '1607058669'),
(325, '8494661159'),
(325, '8494661159'),
(326, '9780262285803'),
(327, '0836228995'),
(328, '1880092484'),
(330, '8845236331'),
(330, '8845236331'),
(328, '1880092484'),
(332, '1845530462'),
(332, '1845530462'),
(327, '0836228995'),
(333, '8897257615'),
(334, 'BL:A0022062510'),
(334, 'BL:A0022062510'),
(334, 'BL:A0022062510'),
(327, '0836228995'),
(327, '0836228995'),
(327, '0836228995'),
(327, '0836228995'),
(325, '8494661159');

-- --------------------------------------------------------

--
-- Struttura della tabella `libro_categoria`
--

CREATE TABLE `libro_categoria` (
  `isbn` varchar(50) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `libro_categoria`
--

INSERT INTO `libro_categoria` (`isbn`, `id_categoria`) VALUES
('1607058669', 119),
('1607058669', 119),
('8494661159', 120),
('8494661159', 120),
('9780262285803', 121),
('0836228995', 122),
('1880092484', 123),
('8845236331', 124),
('8845236331', 124),
('1880092484', 123),
('1845530462', 125),
('1845530462', 125),
('0836228995', 122),
('8897257615', 126),
('BL:A0022062510', 120),
('BL:A0022062510', 120),
('BL:A0022062510', 120),
('0836228995', 122),
('0836228995', 122),
('0836228995', 122),
('0836228995', 122),
('8494661159', 120);

-- --------------------------------------------------------

--
-- Struttura della tabella `prestito`
--

CREATE TABLE `prestito` (
  `id` int(1) NOT NULL,
  `id_utente` int(1) NOT NULL,
  `ISBN` varchar(50) NOT NULL,
  `data_inizio` date NOT NULL,
  `data_fine` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `prestito`
--

INSERT INTO `prestito` (`id`, `id_utente`, `ISBN`, `data_inizio`, `data_fine`) VALUES
(189, 13, '0836228995', '2021-05-26', '2021-06-15'),
(190, 13, '8494661159', '2021-05-26', '2021-06-15');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `id_tessera` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `psw` varchar(50) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `cognome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`id_tessera`, `email`, `psw`, `nome`, `cognome`) VALUES
(13, 'coppola.nicola15@gmail.com', 'CR/sLc8IN28qc', 'Alex', 'Coppola'),
(63, 'andreascemogay@scemo.it', 'CRHy9qAiYXDSk', 'asd', 'asd'),
(64, 'alex.digiorgi@virgilio.it', 'CR/sLc8IN28qc', 'Alex', 'Di Giorgi'),
(65, 'paolo.pizza@virgilio.it', 'CR/sLc8IN28qc', 'Paolo', 'Pizza'),
(66, '', 'CRzVhKa42gVk6', '', '');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `autore`
--
ALTER TABLE `autore`
  ADD PRIMARY KEY (`id_autore`);

--
-- Indici per le tabelle `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indici per le tabelle `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`isbn`);

--
-- Indici per le tabelle `libro_autori`
--
ALTER TABLE `libro_autori`
  ADD KEY `FK3` (`id_autore`),
  ADD KEY `FK4` (`ISBN`);

--
-- Indici per le tabelle `libro_categoria`
--
ALTER TABLE `libro_categoria`
  ADD KEY `FK5` (`id_categoria`),
  ADD KEY `FK6` (`isbn`);

--
-- Indici per le tabelle `prestito`
--
ALTER TABLE `prestito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK1` (`id_utente`),
  ADD KEY `FK2` (`ISBN`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id_tessera`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `autore`
--
ALTER TABLE `autore`
  MODIFY `id_autore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=335;

--
-- AUTO_INCREMENT per la tabella `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT per la tabella `prestito`
--
ALTER TABLE `prestito`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id_tessera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `libro_autori`
--
ALTER TABLE `libro_autori`
  ADD CONSTRAINT `FK3` FOREIGN KEY (`id_autore`) REFERENCES `autore` (`id_autore`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK4` FOREIGN KEY (`ISBN`) REFERENCES `libro` (`isbn`);

--
-- Limiti per la tabella `libro_categoria`
--
ALTER TABLE `libro_categoria`
  ADD CONSTRAINT `FK5` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `FK6` FOREIGN KEY (`isbn`) REFERENCES `libro` (`isbn`);

--
-- Limiti per la tabella `prestito`
--
ALTER TABLE `prestito`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`id_tessera`),
  ADD CONSTRAINT `FK2` FOREIGN KEY (`ISBN`) REFERENCES `libro` (`isbn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
