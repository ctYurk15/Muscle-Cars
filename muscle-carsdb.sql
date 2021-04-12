-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Час створення: Квт 12 2021 р., 14:31
-- Версія сервера: 10.1.44-MariaDB
-- Версія PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `muscle-carsdb`
--

-- --------------------------------------------------------

--
-- Структура таблиці `car`
--

CREATE TABLE `car` (
  `ID` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `manufacturer` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `car`
--

INSERT INTO `car` (`ID`, `name`, `year`, `manufacturer`, `img`) VALUES
(1, 'Camaro SS', 1969, 'Chevrolet', 'camaross1969.jpg'),
(2, 'Mustang', 1969, 'Ford', 'mustang1969.jpg'),
(3, 'Charger', 1969, 'Dodge', 'charger1969.jpg'),
(4, 'Challenger', 1970, 'Dodge', 'challenger1970.jpg'),
(5, 'Barracuda', 1971, 'Plymouth', 'barracuda1971.jpg');

-- --------------------------------------------------------

--
-- Структура таблиці `comment`
--

CREATE TABLE `comment` (
  `ID` int(11) NOT NULL,
  `positive` tinyint(4) NOT NULL,
  `commentText` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserID` int(11) NOT NULL,
  `CarID` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `comment`
--

INSERT INTO `comment` (`ID`, `positive`, `commentText`, `UserID`, `CarID`, `date`) VALUES
(1, 1, 'First comment. I hope it would be successful.', 10, 1, '2021-04-12 11:25:17'),
(2, 0, 'Negative comment', 10, 1, '2021-04-12 11:26:28');

-- --------------------------------------------------------

--
-- Структура таблиці `options`
--

CREATE TABLE `options` (
  `ID` int(11) NOT NULL,
  `Color` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Engine` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HP` int(11) NOT NULL,
  `Disk` float NOT NULL,
  `Quantity` tinyint(5) NOT NULL DEFAULT '0',
  `Price` tinyint(10) NOT NULL,
  `car_ID` int(11) NOT NULL,
  `Selling` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `options`
--

INSERT INTO `options` (`ID`, `Color`, `Engine`, `HP`, `Disk`, `Quantity`, `Price`, `car_ID`, `Selling`) VALUES
(1, 'Black', '426 HEMI', 426, 15, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблиці `order`
--

CREATE TABLE `order` (
  `ID` int(11) NOT NULL,
  `car_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `Count` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `order`
--

INSERT INTO `order` (`ID`, `car_ID`, `user_ID`, `Count`) VALUES
(1, 1, 10, 1),
(2, 2, 10, 1),
(3, 3, 10, 1),
(4, 5, 10, 1),
(5, 4, 10, 1);

-- --------------------------------------------------------

--
-- Структура таблиці `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `login` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'Somewhere',
  `avatar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'account.png',
  `orders` int(11) DEFAULT '0',
  `pass` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `user`
--

INSERT INTO `user` (`ID`, `login`, `name`, `email`, `address`, `avatar`, `orders`, `pass`) VALUES
(5, 'johndoe', 'John Doe', 'emaple@ex.com', 'Somewhere', 'account.png', 0, 'password'),
(10, 'ctyurk15', 'Lev Zykol', 'levgenetic@gmail.com', 'Somewhere', 'account.png', 0, 'qwerty'),
(11, 'test1', 'test11', 'test1@gmail.com', 'Somewhere', 'account.png', 0, 'test1pass');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`ID`);

--
-- Індекси таблиці `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_comment_user_idx` (`UserID`),
  ADD KEY `fk_comment_car1_idx` (`CarID`);

--
-- Індекси таблиці `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Options_car1_idx` (`car_ID`);

--
-- Індекси таблиці `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_order_car1_idx` (`car_ID`),
  ADD KEY `fk_order_user1_idx` (`user_ID`);

--
-- Індекси таблиці `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `car`
--
ALTER TABLE `car`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблиці `comment`
--
ALTER TABLE `comment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблиці `options`
--
ALTER TABLE `options`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблиці `order`
--
ALTER TABLE `order`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблиці `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_car1` FOREIGN KEY (`CarID`) REFERENCES `car` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comment_user` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Обмеження зовнішнього ключа таблиці `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `fk_Options_car1` FOREIGN KEY (`car_ID`) REFERENCES `car` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Обмеження зовнішнього ключа таблиці `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_car1` FOREIGN KEY (`car_ID`) REFERENCES `car` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_user1` FOREIGN KEY (`user_ID`) REFERENCES `user` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
