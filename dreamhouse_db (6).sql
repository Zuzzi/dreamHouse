-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Creato il: Mar 04, 2016 alle 17:19
-- Versione del server: 10.1.8-MariaDB
-- Versione PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dreamhouse_db`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` text COLLATE utf8_unicode_ci NOT NULL,
  `answer` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`) VALUES
(1, 'I like one of your houses, how can I visit it?', 'You can get any additional information about the house by directly calling the owner. His/Her phone number is located in the info page of the house, under the price.'),
(2, 'How can I insert my house in your catalog?', 'You need to register, log in, and add the informations about your house in the form.'),
(3, 'Is this real estate service free?', 'Yes, all the process is completely free.');

-- --------------------------------------------------------

--
-- Struttura della tabella `houses`
--

CREATE TABLE `houses` (
  `id` int(11) NOT NULL,
  `location` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `sq_ft` int(11) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `picture1` varchar(50) NOT NULL,
  `picture2` varchar(50) NOT NULL,
  `picture3` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `houses`
--

INSERT INTO `houses` (`id`, `location`, `price`, `sq_ft`, `phone`, `email`, `picture1`, `picture2`, `picture3`, `username`, `description`) VALUES
(1, 'Manchester', 37500000, 5380, '3147483647', 'bush@gmail.com', 'house4.jpg', 'house4-1.jpg', 'house4-2.jpg', 'Jason89', 'Cresswell House embraces classical grace and splendour and is undoubtedly one of the finest luxury family homes to come on to the Chelsea market for many years. \r\n\r\nSituated at the heart of The Boltons conservation area, this beautifully designed and exceptionally spacious house offers an abundance of light, impressive proportions and unrivalled family accommodation.\r\nCresswell House provides the discerning buyer with everything - exquisite, well-proportioned living space over five lateral floors, five fabulous bedroom suites, a generous and beautifully landscaped south west facing garden, a garage with stacker for two large cars, a passenger lift to all floors, state of the art technology, a separate staff area and incredible leisure facilities that include a sumptuous 15m swimming pool, gym and spa. '),
(2, 'London', 425000, 380, '3416785543', 'ren21@hotmail.com', 'house2.jpg', 'house2-1.jpg', 'house2-2.jpg', 'Felix5', 'Located 5 minutes walk from Barnes train station, this second floor flat is offered with share of freehold. Within easy access of the A3 and Richmond Park, the property is within close reach of all the amenities of the surrounding area.It briefly comprises one double bedroom, ensuite bathroom and an open plan kitchen / living room. Further benefits include double glazing throughout, juliette balcony and no onward chain.\r\nSuitable for professional couple or buy to let investor.'),
(3, 'London', 975000, 2690, '3456583513', 'white@gmail.com', 'house1.jpg', 'house1-1.jpg', 'house1-2.jpg', 'BillyTheKid', 'A three bedroom mid-terraced family home situated on White Hart Lane, within walking distance of Barnes Station. This beautiful family home offers a bright reception room which leads to the open plan kitchen/dining area. The fully fitted kitchen has ample storage as well as preparation space along with a useful eat-at island. There is further room for a large dining table with chairs and also storage under the stairs housing the utilities. On the first floor are two bright double bedrooms with built-in storage and a well-presented family bathroom. The master bedroom can be found on the second floor with its own en-suite along with a very useful dressing area. The property further benefits from plenty of light throughout as well as its own private rear garden.'),
(4, 'Glasgow', 2900000, 6460, '3147483647', 'bush@gmail.com', 'house3.jpg', 'house3-1.jpg', 'house3-2.jpg', 'Jason89', 'On the ground floor, the entrance hall, which has a cloakroom off, opens into the main reception hall which doubles as a fabulous dining room with an 18 place dining table. From here double doors lead into the main drawing room which has exposed beams and a large stone fireplace and again double doors open into the library. The heart of this wonderful family home is a stunning kitchen and informal dining area which has a glazed bow end wall overlooking the garden and views towards the Balgray Reservoir. There is a recently added sunroom with direct access to the gardens. From the entrance hall a door leads to a billiard room which houses a full size table and beyond is a large study/play room. Also from the entrance hall a further door leads to the pool complex which includes an indoor heated pool, a gym and two separate changing and shower rooms. Finally on the ground floor is a bedroom with en suite bathroom. \r\n'),
(5, 'Liverpool', 375000, 3230, '3256824543', 'ren21@hotmail.com', 'house5.jpg', 'house5-1.jpg', 'house5-2.jpg', 'Felix5', 'Brought to the market by Jones & Chapman is this stunning and significantly sized six bedroom semi detached home set in the prestigious area of Mossley Hill, L18. If you are looking for a property with character then look no further!! This charming family home breathes character throughout and displays a number of original features which include stained glass windows, fireplaces and covings just to name a few. Welcomed via a vestibule with stained glass window there is an inviting entrance hall providing access to a ground floor WC, three reception rooms and a large breakfast kitchen. To the first floor is a family bathroom with separate WC and four generous bedrooms. To the second floor there is a storage room and two additional double bedrooms.'),
(6, 'London', 355000, 2045, '3339224523', 'white@gmail.com', 'house6.jpg', 'house6-1.jpg', 'house6-2.jpg', 'BillyTheKid', 'Bairstow Eves are excited to present to the market this brilliantly presented TWO bedroom apartment located in the very sought after ''Alwyn Gardens''.\r\n\r\nThis property benefits from, Entrance hall, lounge/diner, kitchen, two bedrooms and a family bathroom.\r\n\r\nFurther benefits include communal gardens and allocated parking.'),
(7, 'Glasgow', 219990, 1400, '3147483647', 'bush@gmail.com', 'house7.jpg', 'house7-1.jpg', 'house7-2.jpg', 'Jason89', 'At over 1400 sq ft, the Whithorn is the perfect home for growing families with 4 large bedrooms, 2 en suites, an abundance of storage and integral garage. \r\n\r\nDownstairs is a large lounge, well equipped kitchen with dining area which has french doors leading out to the rear garden, a separate utility room also with access outdoors and a convenient WC. \r\n\r\nOn the upper floor there are 4 bedrooms, the master having its own en suite and bedrooms 2 and 3 sharing a jack ''n'' jill plus the contemporary family bathroom. ');

-- --------------------------------------------------------

--
-- Struttura della tabella `logfile`
--

CREATE TABLE `logfile` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `object` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `logfile`
--

INSERT INTO `logfile` (`id`, `user`, `action`, `object`, `date`) VALUES
(106, 'Mark90', 'Delete user #8', 'admin', '04/mar/2016 17:14:45'),
(107, 'Mark90', 'Log-out', 'admin', '04/mar/2016 17:14:47'),
(108, 'Anonymous', 'Registration user #9', 'public', '04/mar/2016 17:15:14'),
(109, 'Anonymous', 'Registration user #10', 'public', '04/mar/2016 17:15:50'),
(110, 'Plutino', 'Log-in', 'owner', '04/mar/2016 17:15:59'),
(111, 'Plutino', 'Log-out', 'owner', '04/mar/2016 17:16:03'),
(112, 'Mark90', 'Log-in', 'admin', '04/mar/2016 17:16:09'),
(113, 'Mark90', 'Log-out', 'admin', '04/mar/2016 17:16:22');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) DEFAULT NULL,
  `role` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cell` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `name`, `surname`, `email`, `cell`) VALUES
(1, 'Jason89', '01star', 'owner', 'Jason', 'White', 'bush@gmail.com', '3147483647'),
(2, 'Mark90', '01star', 'admin', 'Mark', 'Black', 'everyday@hotmail.com', '3997473648'),
(10, 'Plutino', '01ciao', 'owner', 'ser', 'hurin', 'serhurin@gmail.com', '3343433234');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `logfile`
--
ALTER TABLE `logfile`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT per la tabella `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT per la tabella `logfile`
--
ALTER TABLE `logfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
