-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Час створення: Квт 13 2021 р., 14:32
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
  `img` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `car`
--

INSERT INTO `car` (`ID`, `name`, `year`, `manufacturer`, `img`, `Description`) VALUES
(1, 'Camaro SS', 1969, 'Chevrolet', 'camaross1969.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit unde, excepturi tempora ipsum vero quae et corporis sit numquam ab cumque alias fugit, incidunt consequuntur! Voluptas voluptatem, sint, veniam, voluptate suscipit eos aliquam animi aspernatur voluptatibus molestiae vel impedit eius autem perspiciatis nisi! Odit fugit quaerat laboriosam maxime et quo quod molestias cum optio nemo maiores deleniti necessitatibus veniam ipsum totam, minus amet dolor iusto ut similique sit porro repudiandae. Optio corporis rerum autem provident cum veritatis beatae ipsa suscipit, quis. Fugiat totam distinctio, quidem earum esse nam? Sequi repellendus ipsa molestias aspernatur, veritatis, cumque aperiam iusto distinctio corporis voluptates?'),
(2, 'Mustang', 1969, 'Ford', 'mustang1969.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit unde, excepturi tempora ipsum vero quae et corporis sit numquam ab cumque alias fugit, incidunt consequuntur! Voluptas voluptatem, sint, veniam, voluptate suscipit eos aliquam animi aspernatur voluptatibus molestiae vel impedit eius autem perspiciatis nisi! Odit fugit quaerat laboriosam maxime et quo quod molestias cum optio nemo maiores deleniti necessitatibus veniam ipsum totam, minus amet dolor iusto ut similique sit porro repudiandae. Optio corporis rerum autem provident cum veritatis beatae ipsa suscipit, quis. Fugiat totam distinctio, quidem earum esse nam? Sequi repellendus ipsa molestias aspernatur, veritatis, cumque aperiam iusto distinctio corporis voluptates?'),
(3, 'Charger', 1969, 'Dodge', 'charger1969.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit unde, excepturi tempora ipsum vero quae et corporis sit numquam ab cumque alias fugit, incidunt consequuntur! Voluptas voluptatem, sint, veniam, voluptate suscipit eos aliquam animi aspernatur voluptatibus molestiae vel impedit eius autem perspiciatis nisi! Odit fugit quaerat laboriosam maxime et quo quod molestias cum optio nemo maiores deleniti necessitatibus veniam ipsum totam, minus amet dolor iusto ut similique sit porro repudiandae. Optio corporis rerum autem provident cum veritatis beatae ipsa suscipit, quis. Fugiat totam distinctio, quidem earum esse nam? Sequi repellendus ipsa molestias aspernatur, veritatis, cumque aperiam iusto distinctio corporis voluptates?'),
(4, 'Challenger', 1970, 'Dodge', 'challenger1970.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit unde, excepturi tempora ipsum vero quae et corporis sit numquam ab cumque alias fugit, incidunt consequuntur! Voluptas voluptatem, sint, veniam, voluptate suscipit eos aliquam animi aspernatur voluptatibus molestiae vel impedit eius autem perspiciatis nisi! Odit fugit quaerat laboriosam maxime et quo quod molestias cum optio nemo maiores deleniti necessitatibus veniam ipsum totam, minus amet dolor iusto ut similique sit porro repudiandae. Optio corporis rerum autem provident cum veritatis beatae ipsa suscipit, quis. Fugiat totam distinctio, quidem earum esse nam? Sequi repellendus ipsa molestias aspernatur, veritatis, cumque aperiam iusto distinctio corporis voluptates?'),
(5, 'Barracuda', 1971, 'Plymouth', 'barracuda1971.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit unde, excepturi tempora ipsum vero quae et corporis sit numquam ab cumque alias fugit, incidunt consequuntur! Voluptas voluptatem, sint, veniam, voluptate suscipit eos aliquam animi aspernatur voluptatibus molestiae vel impedit eius autem perspiciatis nisi! Odit fugit quaerat laboriosam maxime et quo quod molestias cum optio nemo maiores deleniti necessitatibus veniam ipsum totam, minus amet dolor iusto ut similique sit porro repudiandae. Optio corporis rerum autem provident cum veritatis beatae ipsa suscipit, quis. Fugiat totam distinctio, quidem earum esse nam? Sequi repellendus ipsa molestias aspernatur, veritatis, cumque aperiam iusto distinctio corporis voluptates?');

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
(6, 1, 'Rewrited comment', 11, 2, '2021-04-13 08:57:03');

-- --------------------------------------------------------

--
-- Структура таблиці `gallery`
--

CREATE TABLE `gallery` (
  `ID` int(11) NOT NULL,
  `img1` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img2` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img3` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img4` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img5` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img6` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CarID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `gallery`
--

INSERT INTO `gallery` (`ID`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6`, `CarID`) VALUES
(1, 'camaross1969.jpg', 'camaross1969.jpg', 'camaross1969.jpg', 'camaross1969.jpg', 'camaross1969.jpg', 'camaross1969.jpg', 1);

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
  `Price` int(11) NOT NULL,
  `CarID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `options`
--

INSERT INTO `options` (`ID`, `Color`, `Engine`, `HP`, `Disk`, `Quantity`, `Price`, `CarID`) VALUES
(1, 'black', 'V8B', 426, 15, 10, 45000, 1),
(3, 'blue', 'V8B', 426, 15, 10, 45000, 1),
(4, 'blue', 'V8B', 426, 17, 10, 46000, 1),
(5, 'red', 'V8', 396, 15, 10, 45000, 1),
(6, 'red', 'V6', 396, 16, 10, 45500, 1);

-- --------------------------------------------------------

--
-- Структура таблиці `order`
--

CREATE TABLE `order` (
  `ID` int(11) NOT NULL,
  `OptionID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `order`
--

INSERT INTO `order` (`ID`, `OptionID`, `UserID`, `Count`) VALUES
(1, 1, 11, 1),
(2, 6, 11, 1);

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
-- Індекси таблиці `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CarID` (`CarID`);

--
-- Індекси таблиці `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Options_car1_idx` (`CarID`);

--
-- Індекси таблиці `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `OptionID` (`OptionID`),
  ADD KEY `UserID` (`UserID`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблиці `gallery`
--
ALTER TABLE `gallery`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблиці `options`
--
ALTER TABLE `options`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблиці `order`
--
ALTER TABLE `order`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Обмеження зовнішнього ключа таблиці `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`CarID`) REFERENCES `car` (`ID`);

--
-- Обмеження зовнішнього ключа таблиці `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `fk_Options_car1` FOREIGN KEY (`CarID`) REFERENCES `car` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Обмеження зовнішнього ключа таблиці `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`OptionID`) REFERENCES `options` (`ID`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
