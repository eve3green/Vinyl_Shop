-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Лют 19 2022 р., 10:14
-- Версія сервера: 10.4.11-MariaDB
-- Версія PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `eshop`
--

-- --------------------------------------------------------

--
-- Структура таблиці `genre`
--

CREATE TABLE `genre` (
  `ID` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `genre`
--

INSERT INTO `genre` (`ID`, `Name`) VALUES
(1, 'Rock'),
(2, 'Pop'),
(3, 'Country'),
(4, 'Folk'),
(5, 'Rap'),
(6, 'Jazz');

-- --------------------------------------------------------

--
-- Структура таблиці `internetshop`
--

CREATE TABLE `internetshop` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(400) NOT NULL,
  `Adress` varchar(100) NOT NULL,
  `EMail` varchar(50) NOT NULL,
  `t_number` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `internetshop`
--

INSERT INTO `internetshop` (`ID`, `Name`, `Description`, `Adress`, `EMail`, `t_number`) VALUES
(1, 'The Magic of Vinyl', 'This is where you can find all the kind of stuff `bout vinyl, like records', '999 Roy Alley street, Denver, CO, 80202', 'magicvinyl@gmail.com', '303-507-9486');

-- --------------------------------------------------------

--
-- Структура таблиці `orderinfo`
--

CREATE TABLE `orderinfo` (
  `ID` int(11) NOT NULL,
  `OrderingDate` date NOT NULL,
  `ConfirmationDate` date NOT NULL,
  `DepartureDate` date NOT NULL,
  `PaymentDate` date NOT NULL,
  `ReceiptDate` date NOT NULL,
  `ShippingAdress` varchar(200) NOT NULL,
  `ShippingType` varchar(60) NOT NULL,
  `PaymentType` varchar(60) NOT NULL,
  `Total` int(255) NOT NULL,
  `OrderStatus` int(10) NOT NULL,
  `InternetShop` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблиці `orderstatus`
--

CREATE TABLE `orderstatus` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `orderstatus`
--

INSERT INTO `orderstatus` (`ID`, `Name`) VALUES
(1, 'Ordered'),
(2, 'Review'),
(3, 'Confirmed'),
(4, 'Shipping'),
(5, 'Delivered');

-- --------------------------------------------------------

--
-- Структура таблиці `records`
--

CREATE TABLE `records` (
  `ID` int(11) NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `artist` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `paperback` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `recordyear` date NOT NULL,
  `releaseyear` date NOT NULL,
  `appearencedate` timestamp NOT NULL DEFAULT current_timestamp(),
  `aviability` int(11) NOT NULL,
  `genre` int(11) UNSIGNED NOT NULL,
  `price` float NOT NULL,
  `recordstype` int(11) UNSIGNED NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `records`
--

INSERT INTO `records` (`ID`, `name`, `artist`, `description`, `paperback`, `recordyear`, `releaseyear`, `appearencedate`, `aviability`, `genre`, `price`, `recordstype`, `duration`) VALUES
(1, 'Queen', 'Queen', 'first album of the famous band', 'folder1', '1986-11-11', '1986-12-12', '2022-01-25 15:50:01', 5, 3, 250.99, 1, 250),
(3, 'A Night At The Opera', 'Queen', 'lalala', 'folder', '1975-01-02', '1975-01-11', '2022-01-25 16:06:26', 3, 5, 11.64, 3, 245),
(4, 'Dom', 'Somebody', 'panel athem', 'panel', '2022-01-12', '2022-01-21', '2022-01-25 20:50:01', 4, 2, 199.45, 3, 150),
(7, 'Admin Song', 'Unsigned', 'added from admin`s cabinet', 'admin', '2021-12-30', '2022-01-06', '2022-01-30 20:24:03', 1, 5, 198.99, 3, 220),
(8, 'Against the Wind', 'Bob Seger', 'Seger`s Illinois Ill', 'bobseger', '1998-01-06', '1998-02-11', '2022-02-02 07:36:09', 10, 4, 179.99, 1, 489);

-- --------------------------------------------------------

--
-- Структура таблиці `recordsordered`
--

CREATE TABLE `recordsordered` (
  `ID` int(10) NOT NULL,
  `OrderStatus` int(5) NOT NULL,
  `Records` int(5) NOT NULL,
  `Total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблиці `recordstype`
--

CREATE TABLE `recordstype` (
  `ID` int(10) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `recordstype`
--

INSERT INTO `recordstype` (`ID`, `Name`) VALUES
(1, 'LP'),
(2, 'EP'),
(3, 'Single');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Login` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tnumber` int(250) NOT NULL,
  `Surname` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `FName` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Avatar` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `UsersType` int(11) UNSIGNED NOT NULL,
  `RegistrationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `DeletionDate` date NOT NULL,
  `ShippingAdress` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ShippingType` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sex` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`ID`, `Login`, `Password`, `Email`, `tnumber`, `Surname`, `Name`, `FName`, `Avatar`, `UsersType`, `RegistrationDate`, `DeletionDate`, `ShippingAdress`, `ShippingType`, `Sex`) VALUES
(1, 'v0va', '12345', 'gnailFail@gmail.com', 983062893, 'Grabovsky', 'Vova-Anton', 'father Luke', 'f', 2, '2022-01-28 14:36:45', '9999-12-30', 'gth', 'Home Shipping', 'f'),
(2, 'good', '345', 'newman12345@gog', 1, 'Newman', 'f', 'f', 'f', 1, '2022-01-29 08:56:18', '9999-12-30', 'f', 'Home Shipping', 'f'),
(4, 'test', '1234', 'test111@gmail.com', 983028942, 'Ivanovich', 'Ivan', 'f', 'f', 2, '2022-02-02 08:24:28', '9999-12-30', 'none', 'Local Post Office', 'f');

-- --------------------------------------------------------

--
-- Структура таблиці `userstype`
--

CREATE TABLE `userstype` (
  `ID` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `userstype`
--

INSERT INTO `userstype` (`ID`, `Name`) VALUES
(1, 'Standart'),
(2, 'Admin');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`ID`);

--
-- Індекси таблиці `internetshop`
--
ALTER TABLE `internetshop`
  ADD PRIMARY KEY (`ID`);

--
-- Індекси таблиці `orderinfo`
--
ALTER TABLE `orderinfo`
  ADD PRIMARY KEY (`ID`);

--
-- Індекси таблиці `orderstatus`
--
ALTER TABLE `orderstatus`
  ADD PRIMARY KEY (`ID`);

--
-- Індекси таблиці `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`ID`);

--
-- Індекси таблиці `recordsordered`
--
ALTER TABLE `recordsordered`
  ADD PRIMARY KEY (`ID`);

--
-- Індекси таблиці `recordstype`
--
ALTER TABLE `recordstype`
  ADD PRIMARY KEY (`ID`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Індекси таблиці `userstype`
--
ALTER TABLE `userstype`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `genre`
--
ALTER TABLE `genre`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблиці `internetshop`
--
ALTER TABLE `internetshop`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблиці `orderstatus`
--
ALTER TABLE `orderstatus`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблиці `records`
--
ALTER TABLE `records`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблиці `recordsordered`
--
ALTER TABLE `recordsordered`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `recordstype`
--
ALTER TABLE `recordstype`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `userstype`
--
ALTER TABLE `userstype`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
