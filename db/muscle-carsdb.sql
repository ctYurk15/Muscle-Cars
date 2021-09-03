-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Час створення: Вер 03 2021 р., 22:01
-- Версія сервера: 10.4.12-MariaDB
-- Версія PHP: 7.4.14

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
  `img` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ManufacturerID` int(11) NOT NULL,
  `ShortDescription` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `car`
--

INSERT INTO `car` (`ID`, `name`, `year`, `img`, `Description`, `ManufacturerID`, `ShortDescription`) VALUES
(1, 'Camaro SS', 1969, 'camaross1969.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit unde, excepturi tempora ipsum vero quae et corporis sit numquam ab cumque alias fugit, incidunt consequuntur! Voluptas voluptatem, sint, veniam, voluptate suscipit eos aliquam animi aspernatur voluptatibus molestiae vel impedit eius autem perspiciatis nisi! Odit fugit quaerat laboriosam maxime et quo quod molestias cum optio nemo maiores deleniti necessitatibus veniam ipsum totam, minus amet dolor iusto ut similique sit porro repudiandae. Optio corporis rerum autem provident cum veritatis beatae ipsa suscipit, quis. Fugiat totam distinctio, quidem earum esse nam? Sequi repellendus ipsa molestias aspernatur, veritatis, cumque aperiam iusto distinctio corporis voluptates?', 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad ex, ut labore dicta, itaque modi beatae rerum, perspiciatis molestias iusto ea fugit sequi voluptates laboriosam sed deleniti consequatur, harum corporis. Pariatur ex cupiditate consequatur architecto, recusandae libero, debitis autem magni perspiciatis, rerum et dignissimos ea laboriosam officia repellat beatae dicta obcaecati deserunt inventore ut. '),
(2, 'Mustang', 1969, 'mustang1969.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit unde, excepturi tempora ipsum vero quae et corporis sit numquam ab cumque alias fugit, incidunt consequuntur! Voluptas voluptatem, sint, veniam, voluptate suscipit eos aliquam animi aspernatur voluptatibus molestiae vel impedit eius autem perspiciatis nisi! Odit fugit quaerat laboriosam maxime et quo quod molestias cum optio nemo maiores deleniti necessitatibus veniam ipsum totam, minus amet dolor iusto ut similique sit porro repudiandae. Optio corporis rerum autem provident cum veritatis beatae ipsa suscipit, quis. Fugiat totam distinctio, quidem earum esse nam? Sequi repellendus ipsa molestias aspernatur, veritatis, cumque aperiam iusto distinctio corporis voluptates?', 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad ex, ut labore dicta, itaque modi beatae rerum, perspiciatis molestias iusto ea fugit sequi voluptates laboriosam sed deleniti consequatur, harum corporis. Pariatur ex cupiditate consequatur architecto, recusandae libero, debitis autem magni perspiciatis, rerum et dignissimos ea laboriosam officia repellat beatae dicta obcaecati deserunt inventore ut. '),
(3, 'Charger', 1969, 'charger1969.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit unde, excepturi tempora ipsum vero quae et corporis sit numquam ab cumque alias fugit, incidunt consequuntur! Voluptas voluptatem, sint, veniam, voluptate suscipit eos aliquam animi aspernatur voluptatibus molestiae vel impedit eius autem perspiciatis nisi! Odit fugit quaerat laboriosam maxime et quo quod molestias cum optio nemo maiores deleniti necessitatibus veniam ipsum totam, minus amet dolor iusto ut similique sit porro repudiandae. Optio corporis rerum autem provident cum veritatis beatae ipsa suscipit, quis. Fugiat totam distinctio, quidem earum esse nam? Sequi repellendus ipsa molestias aspernatur, veritatis, cumque aperiam iusto distinctio corporis voluptates?', 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad ex, ut labore dicta, itaque modi beatae rerum, perspiciatis molestias iusto ea fugit sequi voluptates laboriosam sed deleniti consequatur, harum corporis. Pariatur ex cupiditate consequatur architecto, recusandae libero, debitis autem magni perspiciatis, rerum et dignissimos ea laboriosam officia repellat beatae dicta obcaecati deserunt inventore ut. '),
(4, 'Challenger', 1972, 'challenger1970.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit unde, excepturi tempora ipsum vero quae et corporis sit numquam ab cumque alias fugit, incidunt consequuntur! Voluptas voluptatem, sint, veniam, voluptate suscipit eos aliquam animi aspernatur voluptatibus molestiae vel impedit eius autem perspiciatis nisi! Odit fugit quaerat laboriosam maxime et quo quod molestias cum optio nemo maiores deleniti necessitatibus veniam ipsum totam, minus amet dolor iusto ut similique sit porro repudiandae. Optio corporis rerum autem provident cum veritatis beatae ipsa suscipit, quis. Fugiat totam distinctio, quidem earum esse nam? Sequi repellendus ipsa molestias aspernatur, veritatis, cumque aperiam iusto distinctio corporis voluptates?', 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad ex, ut labore dicta, itaque modi beatae rerum, perspiciatis molestias iusto ea fugit sequi voluptates laboriosam sed deleniti consequatur, harum corporis. Pariatur ex cupiditate consequatur architecto, recusandae libero, debitis autem magni perspiciatis, rerum et dignissimos ea laboriosam officia repellat beatae dicta obcaecati deserunt inventore ut. '),
(5, 'Barracuda', 1971, 'barracuda1971.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit unde, excepturi tempora ipsum vero quae et corporis sit numquam ab cumque alias fugit, incidunt consequuntur! Voluptas voluptatem, sint, veniam, voluptate suscipit eos aliquam animi aspernatur voluptatibus molestiae vel impedit eius autem perspiciatis nisi! Odit fugit quaerat laboriosam maxime et quo quod molestias cum optio nemo maiores deleniti necessitatibus veniam ipsum totam, minus amet dolor iusto ut similique sit porro repudiandae. Optio corporis rerum autem provident cum veritatis beatae ipsa suscipit, quis. Fugiat totam distinctio, quidem earum esse nam? Sequi repellendus ipsa molestias aspernatur, veritatis, cumque aperiam iusto distinctio corporis voluptates?', 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad ex, ut labore dicta, itaque modi beatae rerum, perspiciatis molestias iusto ea fugit sequi voluptates laboriosam sed deleniti consequatur, harum corporis. Pariatur ex cupiditate consequatur architecto, recusandae libero, debitis autem magni perspiciatis, rerum et dignissimos ea laboriosam officia repellat beatae dicta obcaecati deserunt inventore ut. '),
(6, 'Charger Daytona', 1969, 'chargerdaytona1969.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit unde, excepturi tempora ipsum vero quae et corporis sit numquam ab cumque alias fugit, incidunt consequuntur! Voluptas voluptatem, sint, veniam, voluptate suscipit eos aliquam animi aspernatur voluptatibus molestiae vel impedit eius autem perspiciatis nisi! Odit fugit quaerat laboriosam maxime et quo quod molestias cum optio nemo maiores deleniti necessitatibus veniam ipsum totam, minus amet dolor iusto ut similique sit porro repudiandae. Optio corporis rerum autem provident cum veritatis beatae ipsa suscipit, quis. Fugiat totam distinctio, quidem earum esse nam? Sequi repellendus ipsa molestias aspernatur, veritatis, cumque aperiam iusto distinctio corporis voluptates?', 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad ex, ut labore dicta, itaque modi beatae rerum, perspiciatis molestias iusto ea fugit sequi voluptates laboriosam sed deleniti consequatur, harum corporis. Pariatur ex cupiditate consequatur architecto, recusandae libero, debitis autem magni perspiciatis, rerum et dignissimos ea laboriosam officia repellat beatae dicta obcaecati deserunt inventore ut. '),
(7, 'Firebird', 1968, 'firebird1968.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit unde, excepturi tempora ipsum vero quae et corporis sit numquam ab cumque alias fugit, incidunt consequuntur! Voluptas voluptatem, sint, veniam, voluptate suscipit eos aliquam animi aspernatur voluptatibus molestiae vel impedit eius autem perspiciatis nisi! Odit fugit quaerat laboriosam maxime et quo quod molestias cum optio nemo maiores deleniti necessitatibus veniam ipsum totam, minus amet dolor iusto ut similique sit porro repudiandae. Optio corporis rerum autem provident cum veritatis beatae ipsa suscipit, quis. Fugiat totam distinctio, quidem earum esse nam? Sequi repellendus ipsa molestias aspernatur, veritatis, cumque aperiam iusto distinctio corporis voluptates?', 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad ex, ut labore dicta, itaque modi beatae rerum, perspiciatis molestias iusto ea fugit sequi voluptates laboriosam sed deleniti consequatur, harum corporis. Pariatur ex cupiditate consequatur architecto, recusandae libero, debitis autem magni perspiciatis, rerum et dignissimos ea laboriosam officia repellat beatae dicta obcaecati deserunt inventore ut. '),
(8, 'Rebel Machine', 1970, 'rebelmachine1970.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit unde, excepturi tempora ipsum vero quae et corporis sit numquam ab cumque alias fugit, incidunt consequuntur! Voluptas voluptatem, sint, veniam, voluptate suscipit eos aliquam animi aspernatur voluptatibus molestiae vel impedit eius autem perspiciatis nisi! Odit fugit quaerat laboriosam maxime et quo quod molestias cum optio nemo maiores deleniti necessitatibus veniam ipsum totam, minus amet dolor iusto ut similique sit porro repudiandae. Optio corporis rerum autem provident cum veritatis beatae ipsa suscipit, quis. Fugiat totam distinctio, quidem earum esse nam? Sequi repellendus ipsa molestias aspernatur, veritatis, cumque aperiam iusto distinctio corporis voluptates?', 6, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad ex, ut labore dicta, itaque modi beatae rerum, perspiciatis molestias iusto ea fugit sequi voluptates laboriosam sed deleniti consequatur, harum corporis. Pariatur ex cupiditate consequatur architecto, recusandae libero, debitis autem magni perspiciatis, rerum et dignissimos ea laboriosam officia repellat beatae dicta obcaecati deserunt inventore ut. '),
(9, 'Impala SS', 1967, 'impalass1967.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit unde, excepturi tempora ipsum vero quae et corporis sit numquam ab cumque alias fugit, incidunt consequuntur! Voluptas voluptatem, sint, veniam, voluptate suscipit eos aliquam animi aspernatur voluptatibus molestiae vel impedit eius autem perspiciatis nisi! Odit fugit quaerat laboriosam maxime et quo quod molestias cum optio nemo maiores deleniti necessitatibus veniam ipsum totam, minus amet dolor iusto ut similique sit porro repudiandae. Optio corporis rerum autem provident cum veritatis beatae ipsa suscipit, quis. Fugiat totam distinctio, quidem earum esse nam? Sequi repellendus ipsa molestias aspernatur, veritatis, cumque aperiam iusto distinctio corporis voluptates?', 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad ex, ut labore dicta, itaque modi beatae rerum, perspiciatis molestias iusto ea fugit sequi voluptates laboriosam sed deleniti consequatur, harum corporis. Pariatur ex cupiditate consequatur architecto, recusandae libero, debitis autem magni perspiciatis, rerum et dignissimos ea laboriosam officia repellat beatae dicta obcaecati deserunt inventore ut. '),
(10, 'Roadrunner', 1969, 'roadrunner1969.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit unde, excepturi tempora ipsum vero quae et corporis sit numquam ab cumque alias fugit, incidunt consequuntur! Voluptas voluptatem, sint, veniam, voluptate suscipit eos aliquam animi aspernatur voluptatibus molestiae vel impedit eius autem perspiciatis nisi! Odit fugit quaerat laboriosam maxime et quo quod molestias cum optio nemo maiores deleniti necessitatibus veniam ipsum totam, minus amet dolor iusto ut similique sit porro repudiandae. Optio corporis rerum autem provident cum veritatis beatae ipsa suscipit, quis. Fugiat totam distinctio, quidem earum esse nam? Sequi repellendus ipsa molestias aspernatur, veritatis, cumque aperiam iusto distinctio corporis voluptates?', 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad ex, ut labore dicta, itaque modi beatae rerum, perspiciatis molestias iusto ea fugit sequi voluptates laboriosam sed deleniti consequatur, harum corporis. Pariatur ex cupiditate consequatur architecto, recusandae libero, debitis autem magni perspiciatis, rerum et dignissimos ea laboriosam officia repellat beatae dicta obcaecati deserunt inventore ut. '),
(13, 'test car', 2004, 'testcar.jpg', 'long test description', 9, 'test description');

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
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `comment`
--

INSERT INTO `comment` (`ID`, `positive`, `commentText`, `UserID`, `CarID`, `date`) VALUES
(1, 1, 'First comment. I hope it would be successful.', 10, 1, '2021-04-12 11:25:17'),
(6, 1, 'Rewrited comment', 11, 2, '2021-04-13 08:57:03'),
(13, 0, 'Nah, it`s not so good', 10, 2, '2021-04-30 11:16:49'),
(25, 1, 'AJAX rewriting\n', 11, 1, '2021-04-30 18:36:59'),
(35, 1, 'Realy cool car', 10, 4, '2021-05-25 16:18:26'),
(36, 1, 'Wow!', 10, 9, '2021-06-02 14:31:06'),
(37, 1, 'Просто відгук', 10, 5, '2021-08-20 18:43:00');

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
  `CarID` int(11) NOT NULL,
  `img7` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `gallery`
--

INSERT INTO `gallery` (`ID`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6`, `CarID`, `img7`) VALUES
(1, 'camaross1969.jpg', 'camaross1969.jpg', 'camaross1969.jpg', 'camaross1969.jpg', 'camaross1969.jpg', 'camaross1969.jpg', 1, 'camaross1969.jpg'),
(2, 'mustang1969.jpg', 'mustang1969.jpg', 'mustang1969.jpg', 'mustang1969.jpg', 'mustang1969.jpg', 'mustang1969.jpg', 2, 'mustang1969.jpg'),
(3, 'charger1969.jpg', 'charger1969.jpg', 'charger1969.jpg', 'charger1969.jpg', 'charger1969.jpg', 'charger1969.jpg', 3, 'charger1969.jpg'),
(4, 'challenger1970.jpg', 'challenger1970.jpg', 'challenger1970.jpg', 'challenger1970.jpg', 'challenger1970.jpg', 'challenger1970.jpg', 4, 'challenger1970.jpg'),
(5, 'barracuda1971.jpg', 'barracuda1971.jpg', 'barracuda1971.jpg', 'barracuda1971.jpg', 'barracuda1971.jpg', 'barracuda1971.jpg', 5, 'barracuda1971.jpg'),
(6, 'chargerdaytona1969.jpg', 'chargerdaytona1969.jpg', 'chargerdaytona1969.jpg', 'chargerdaytona1969.jpg', 'chargerdaytona1969.jpg', 'chargerdaytona1969.jpg', 6, 'chargerdaytona1969.jpg'),
(7, 'firebird1968.jpg', 'firebird1968.jpg', 'firebird1968.jpg', 'firebird1968.jpg', 'firebird1968.jpg', 'firebird1968.jpg', 7, 'firebird1968.jpg'),
(8, 'rebelmachine1970.jpg', 'rebelmachine1970.jpg', 'rebelmachine1970.jpg', 'rebelmachine1970.jpg', 'rebelmachine1970.jpg', 'rebelmachine1970.jpg', 8, 'rebelmachine1970.jpg'),
(9, 'impalass1967.jpg', 'impalass1967.jpg', 'impalass1967.jpg', 'impalass1967.jpg', 'impalass1967.jpg', 'impalass1967.jpg', 9, 'impalass1967.jpg'),
(10, 'roadrunner1969.jpg', 'roadrunner1969.jpg', 'roadrunner1969.jpg', 'roadrunner1969.jpg', 'roadrunner1969.jpg', 'roadrunner1969.jpg', 10, 'roadrunner1969.jpg'),
(12, 'testcar.jpg', 'testcar.jpg', 'testcar.jpg', 'testcar.jpg', 'testcar.jpg', 'testcar.jpg', 13, 'testcar.jpg');

-- --------------------------------------------------------

--
-- Структура таблиці `manufacturer`
--

CREATE TABLE `manufacturer` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `manufacturer`
--

INSERT INTO `manufacturer` (`ID`, `Name`) VALUES
(1, 'Chevrolet'),
(2, 'Ford'),
(3, 'Dodge'),
(4, 'Plymouth'),
(5, 'Pontiac'),
(6, 'AMC'),
(9, 'Testm');

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
  `Quantity` tinyint(5) NOT NULL DEFAULT 0,
  `Price` int(11) NOT NULL,
  `CarID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `options`
--

INSERT INTO `options` (`ID`, `Color`, `Engine`, `HP`, `Disk`, `Quantity`, `Price`, `CarID`) VALUES
(1, 'black', 'V8B', 426, 15, 60, 45000, 1),
(3, 'blue', 'V8B', 426, 15, 67, 45000, 1),
(4, 'blue', 'V8B', 426, 17, 10, 46000, 1),
(5, 'red', 'V8', 396, 15, 10, 40000, 1),
(6, 'red', 'V6', 240, 16, 10, 35500, 1),
(7, 'red', 'V6', 120, 15, 3, 20000, 2),
(8, 'blue', 'V8B', 375, 16, 4, 30000, 2),
(9, 'red', 'V8', 335, 16, 10, 35500, 2),
(10, 'green', 'V6', 145, 15, 10, 28000, 3),
(11, 'red', 'V8', 290, 15, 4, 35000, 3),
(12, 'black', 'V8B', 425, 15, 7, 46500, 3),
(13, 'red', 'V6', 125, 15, 9, 29500, 4),
(14, 'red', 'V8', 300, 16, 10, 36000, 4),
(15, 'green', 'V8B', 390, 16, 5, 48000, 4),
(16, 'blue', 'V6', 125, 15, 10, 20000, 5),
(17, 'blue', 'V8', 216, 15, 10, 35000, 5),
(18, 'blue', 'V8', 380, 15, 10, 39000, 5),
(19, 'black', 'V8B', 425, 15, 10, 50000, 6),
(20, 'blue', 'V6', 165, 15, 10, 18000, 7),
(21, 'black', 'V8', 325, 15, 10, 34000, 7),
(22, 'red', 'V8', 325, 16, 10, 35000, 7),
(23, 'green', 'V8', 146, 16, 10, 19000, 8),
(24, 'blue', 'V8', 284, 15, 9, 31000, 8),
(25, 'blue', 'V8', 319, 15, 10, 33700, 8),
(26, 'green', 'V8B', 425, 15, 0, 46500, 9),
(27, 'red', 'V8', 335, 15, 10, 32000, 10),
(33, 'black', 'V8B', 390, 16, 15, 54000, 13);

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

-- --------------------------------------------------------

--
-- Структура таблиці `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `login` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'account.png',
  `orders` int(11) DEFAULT 0,
  `pass` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT 0,
  `totalWasted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `user`
--

INSERT INTO `user` (`ID`, `login`, `name`, `email`, `address`, `avatar`, `orders`, `pass`, `admin`, `totalWasted`) VALUES
(5, 'johndoe', 'John Doe', 'emaple@ex.com', NULL, 'account.png', 0, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 0, 0),
(10, 'ctyurk15', 'Lev Zykol', 'levgenetic@gmail.com', 'Address 12', 'account.png', 31, '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414', 1, 580000),
(11, 'test1', 'test123', 'test1@gmail.com', 'Вулиця Пулюя', 'account.png', 23, 'd55f661526b004d3a9cc4e7bc9542fc624da3784285b262960cd4605324e03e5', 1, 360000),
(17, 'test2', 'test12', 'test12@meta.ua', NULL, 'account.png', 0, '4482f0426db6c035ed599d0411f2681b6bb77d2301b16c002eb6e4da4c06afa5', 0, 0),
(18, 'test3', 'test13', 'test13@meta.ua', NULL, 'account.png', 0, 'cf08b3cc8b625f88d6acf7b95fa1ff669ad65375dd83d095ac2d90ddfda889b2', 0, 0),
(20, 'test1_ad', 'test11_ad', 'test11@gmail.com', NULL, 'account.png', 0, '6c17004db55047077802b2b69295342196c3f066ced24e4deceb7c8749539c94', 1, 0),
(23, 'test2_ad', 'test12_ad', 'test12_ad@gmail.com', NULL, 'account.png', 0, 'f8f7ce106751d088f9876334d15f53eb6a55ebd2f5124450763e2891d8d76607', 1, 0),
(26, 'PGS', 'PGS', 'prostogamesstudio@gmail.com', '123', 'account.png', 9, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 0, 399500),
(28, 'ctyurk151', 'Lev Zykol', 'levgenetic123@gmail.com', NULL, 'account.png', 0, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 0, 0),
(29, 'test_user_al', 'Lev1 Zykol', 'levgenetic1@gmail.com', 'address', 'account.png', 3, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 0, 60000),
(30, 'test_user_1', 'Test User1', 'testmail@email.com', NULL, 'account.png', 0, '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5', 0, 0);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ManufacturerID` (`ManufacturerID`);

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
-- Індекси таблиці `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`ID`);

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
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `car`
--
ALTER TABLE `car`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблиці `comment`
--
ALTER TABLE `comment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблиці `gallery`
--
ALTER TABLE `gallery`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблиці `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблиці `options`
--
ALTER TABLE `options`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблиці `order`
--
ALTER TABLE `order`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблиці `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`ManufacturerID`) REFERENCES `manufacturer` (`ID`);

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
