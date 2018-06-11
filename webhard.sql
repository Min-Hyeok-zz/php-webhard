-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 18-06-11 15:41
-- 서버 버전: 10.1.21-MariaDB
-- PHP 버전: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `webhard`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `file`
--

CREATE TABLE `file` (
  `idx` int(11) NOT NULL,
  `midx` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `change_name` varchar(255) NOT NULL,
  `file_size` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `change_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `file`
--

INSERT INTO `file` (`idx`, `midx`, `parent`, `file_name`, `change_name`, `file_size`, `type`, `date`, `change_date`) VALUES
(2, 1, 0, 'AutoClick', '152871832194', 104448, 'exe', '2018-06-11', '2018-06-11'),
(3, 1, 0, 'mountains-1412683', '152872354854754', 1068020, 'png', '2018-06-11', '2018-06-11'),
(4, 1, 0, 'htdocs', '152872424071734', 1570702, 'zip', '2018-06-11', '2018-06-11'),
(5, 1, 0, '폴더입니다', '', 0, 'folder', '2018-06-11', '2018-06-11');

-- --------------------------------------------------------

--
-- 테이블 구조 `member`
--

CREATE TABLE `member` (
  `idx` int(11) NOT NULL,
  `id` varchar(100) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `member`
--

INSERT INTO `member` (`idx`, `id`, `pw`, `name`, `level`) VALUES
(1, 'admin', 'dbe9787aaf4002c6662e490b3f1f7512807459b6dee2e1c2e56738e1cbbd993c', '관리자', 10),
(2, 'user1', '2fc577149080578c983f969a6ce84146fb79b5e17c0447d4e0718e039d62da19', '유저1', 1),
(3, 'user2', '7a9f58a002c9682fceda675a74759336805785d34c0f10ce1cee6e8315a17711', '유저2', 1),
(4, 'user3', 'd9f593bb452232b6a85b46816ee33292a4776a22c09973cbc138e4e91242c96c', '유저3', 1);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`idx`,`midx`);

--
-- 테이블의 인덱스 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idx`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `file`
--
ALTER TABLE `file`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 테이블의 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
