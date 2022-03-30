-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: May 13, 2021 at 07:00 PM
-- Server version: 10.5.9-MariaDB-1:10.5.9+maria~focal
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `database_name`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `contact`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_czech_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_czech_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_czech_ci DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8_czech_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=1 ;

--
-- Vypisuji data pro tabulku `contact`
--

INSERT INTO `contacts` (`id`, `name`, `surname`, `email`, `phone`, `mobile`, `address`) VALUES
(1, 'Radek', 'Vala', 'vala@fai.utb.cz', '777111222', '737111222', 'Nova 5, Zlín'),
(2, 'Josef', 'Novak', 'novak@example.com', '777111333', '737111444', 'Lucni 7, Brno');