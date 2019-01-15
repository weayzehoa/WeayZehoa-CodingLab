-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2019 年 01 月 14 日 17:22
-- 伺服器版本: 10.1.36-MariaDB
-- PHP 版本： 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `codinglab`
--

-- --------------------------------------------------------

--
-- 資料表結構 `class`
--

CREATE TABLE `class` (
  `c_seq` int(10) UNSIGNED NOT NULL,
  `c_date` date NOT NULL COMMENT '日期',
  `c_week` int(1) NOT NULL COMMENT '星期',
  `c_name` int(1) NOT NULL COMMENT '課程名稱',
  `c_teacher` int(1) NOT NULL COMMENT '授課老師',
  `c_num` int(1) NOT NULL COMMENT '節數'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `class`
--

INSERT INTO `class` (`c_seq`, `c_date`, `c_week`, `c_name`, `c_teacher`, `c_num`) VALUES
(1, '2019-01-14', 1, 5, 2, 8),
(2, '2019-01-15', 2, 3, 1, 8),
(3, '2018-09-27', 4, 11, 1, 3),
(4, '2018-09-27', 4, 12, 1, 1),
(5, '2018-09-27', 4, 13, 1, 2),
(6, '2018-09-27', 4, 14, 1, 2),
(7, '2018-09-28', 5, 15, 1, 1),
(8, '2018-09-28', 5, 8, 1, 1),
(9, '2018-09-28', 5, 9, 1, 2),
(10, '2018-09-28', 5, 3, 1, 4),
(11, '2018-10-01', 1, 1, 4, 8),
(12, '2018-10-02', 2, 1, 4, 8),
(13, '2018-10-03', 3, 2, 2, 8),
(14, '2018-10-04', 4, 1, 3, 8),
(15, '2018-10-05', 5, 1, 4, 8),
(16, '2018-10-08', 1, 1, 4, 8),
(17, '2018-10-09', 2, 3, 1, 8),
(18, '2018-10-11', 4, 1, 3, 8),
(19, '2018-10-12', 5, 1, 4, 8),
(20, '2018-10-15', 1, 2, 2, 8),
(21, '2018-10-16', 2, 3, 1, 8),
(22, '2018-10-17', 3, 2, 2, 8),
(23, '2018-10-18', 4, 1, 3, 8),
(24, '2018-10-19', 5, 4, 5, 8),
(25, '2018-10-22', 1, 2, 2, 8),
(26, '2018-10-23', 2, 3, 1, 8),
(27, '2018-10-24', 3, 2, 2, 8),
(28, '2018-10-25', 4, 1, 3, 8),
(29, '2018-10-26', 5, 4, 5, 8),
(30, '2018-10-29', 1, 2, 2, 8),
(31, '2018-10-30', 2, 8, 1, 1),
(32, '2018-10-30', 2, 9, 1, 2),
(33, '2018-10-30', 2, 6, 1, 1),
(34, '2018-10-30', 2, 3, 1, 4),
(35, '2018-10-31', 3, 2, 2, 8),
(36, '2018-11-01', 4, 2, 2, 8),
(37, '2018-11-02', 5, 4, 5, 8),
(38, '2018-11-05', 1, 2, 2, 8),
(39, '2018-11-06', 2, 3, 1, 8),
(40, '2018-11-07', 3, 2, 2, 8),
(41, '2018-11-08', 4, 1, 3, 8),
(42, '2018-11-09', 5, 4, 5, 8),
(43, '2018-11-12', 1, 2, 2, 8),
(44, '2018-11-13', 2, 3, 1, 8),
(45, '2018-11-14', 3, 2, 2, 8),
(46, '2018-11-15', 4, 1, 3, 8),
(47, '2018-11-16', 5, 4, 5, 8),
(48, '2018-11-19', 1, 2, 2, 8),
(49, '2018-11-20', 2, 3, 1, 8),
(50, '2018-11-21', 3, 2, 2, 8),
(51, '2018-11-22', 4, 1, 3, 8),
(52, '2018-11-23', 5, 4, 5, 8),
(53, '2018-11-26', 1, 2, 2, 8),
(54, '2018-11-27', 2, 8, 1, 1),
(55, '2018-11-27', 2, 9, 1, 2),
(56, '2018-11-27', 2, 6, 1, 1),
(57, '2018-11-27', 2, 3, 1, 4),
(58, '2018-11-28', 3, 2, 2, 4),
(59, '2018-11-29', 4, 1, 3, 8),
(60, '2018-11-30', 5, 4, 5, 8),
(61, '2018-12-03', 1, 2, 2, 8),
(62, '2018-12-04', 2, 3, 1, 8),
(63, '2018-12-05', 3, 2, 2, 8),
(64, '2018-12-06', 4, 1, 3, 8),
(65, '2018-12-07', 5, 4, 5, 8),
(66, '2018-12-10', 1, 2, 2, 8),
(67, '2018-12-11', 2, 3, 1, 8),
(68, '2018-12-12', 3, 2, 2, 8),
(69, '2018-12-13', 4, 1, 3, 8),
(70, '2018-12-14', 5, 4, 5, 8),
(71, '2018-12-17', 1, 5, 2, 8),
(72, '2018-12-18', 2, 3, 1, 8),
(73, '2018-12-19', 3, 5, 2, 8),
(74, '2018-12-20', 4, 3, 1, 8),
(75, '2018-12-21', 5, 4, 5, 8),
(76, '2018-12-24', 1, 5, 2, 8),
(77, '2018-12-25', 2, 3, 1, 8),
(78, '2018-12-26', 3, 5, 2, 8),
(79, '2018-12-27', 4, 3, 1, 8),
(80, '2018-12-28', 5, 4, 5, 8),
(81, '2019-01-02', 3, 5, 2, 8),
(82, '2019-01-03', 4, 3, 1, 8),
(83, '2019-01-04', 5, 4, 5, 8),
(84, '2019-01-07', 1, 5, 2, 8),
(85, '2019-01-08', 2, 3, 1, 8),
(86, '2019-01-09', 3, 5, 2, 8),
(87, '2019-01-10', 4, 3, 1, 8),
(88, '2019-01-11', 5, 4, 5, 8),
(89, '2019-01-14', 1, 5, 2, 8),
(90, '2019-01-15', 2, 3, 1, 8),
(91, '2019-01-16', 3, 5, 2, 8),
(92, '2019-01-17', 4, 3, 1, 8),
(93, '2019-01-18', 5, 4, 5, 8),
(94, '2019-01-21', 1, 5, 2, 8),
(95, '2019-01-22', 2, 3, 1, 8),
(96, '2019-01-23', 3, 5, 2, 8),
(97, '2019-01-24', 4, 3, 1, 8),
(98, '2019-01-25', 5, 4, 5, 8),
(99, '2019-01-28', 1, 4, 2, 8),
(100, '2019-01-29', 2, 8, 1, 1),
(101, '2019-01-29', 2, 9, 1, 2),
(102, '2019-01-29', 2, 6, 1, 1),
(103, '2019-01-29', 2, 3, 1, 4),
(104, '2019-01-30', 3, 5, 2, 8),
(105, '2019-01-31', 4, 6, 1, 8),
(106, '2019-02-11', 1, 5, 2, 8),
(107, '2019-02-12', 2, 6, 1, 2),
(108, '2019-02-12', 2, 16, 1, 2),
(109, '2019-02-12', 2, 10, 1, 4),
(110, '2019-02-13', 3, 5, 2, 8),
(111, '2019-02-14', 4, 7, 6, 8),
(112, '2019-02-15', 5, 5, 2, 8),
(113, '2019-02-18', 1, 5, 2, 8),
(114, '2019-02-19', 2, 6, 1, 8),
(115, '2019-02-20', 3, 5, 2, 8),
(116, '2019-02-21', 4, 7, 6, 8),
(117, '2019-02-22', 5, 5, 2, 8),
(118, '2019-02-25', 1, 5, 2, 8),
(119, '2019-02-26', 2, 8, 1, 1),
(120, '2019-02-26', 2, 9, 1, 2),
(121, '2019-02-26', 2, 6, 1, 5),
(122, '2019-02-27', 3, 5, 2, 8),
(123, '2019-03-04', 1, 5, 2, 8),
(124, '2019-03-05', 2, 6, 1, 8),
(125, '2019-03-06', 3, 5, 2, 8),
(126, '2019-03-07', 4, 7, 6, 8),
(127, '2019-03-08', 5, 6, 1, 8),
(128, '2019-03-11', 1, 5, 2, 8),
(129, '2019-03-12', 2, 6, 1, 8),
(130, '2019-03-13', 3, 5, 2, 8),
(131, '2019-03-14', 4, 7, 6, 8),
(132, '2019-03-15', 5, 6, 1, 8),
(133, '2019-03-18', 1, 6, 1, 8),
(134, '2019-03-19', 2, 6, 1, 8),
(135, '2019-03-20', 3, 6, 1, 8),
(136, '2019-03-21', 4, 6, 1, 4),
(137, '2019-03-21', 4, 6, 1, 3),
(138, '2019-03-21', 4, 17, 1, 1),
(141, '2019-03-22', 5, 20, 8, 4),
(142, '2019-03-22', 5, 20, 8, 4),
(143, '2019-03-22', 5, 20, 8, 4);

-- --------------------------------------------------------

--
-- 資料表結構 `class_name`
--

CREATE TABLE `class_name` (
  `c_n_seq` int(10) UNSIGNED NOT NULL,
  `c_n_name` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `class_name`
--

INSERT INTO `class_name` (`c_n_seq`, `c_n_name`) VALUES
(1, '網頁排版編輯'),
(2, '資料庫程式設計'),
(3, '視覺影像設計'),
(4, '網頁動態技術'),
(5, '網頁設計實務'),
(6, '數位媒體應用'),
(7, '資訊網路概論'),
(8, '班會'),
(9, '聯課'),
(10, '就業分析求職技巧'),
(11, '報到'),
(12, '生活津貼'),
(13, '職訓資源'),
(14, '學員輔導'),
(15, '導師時間'),
(16, '職涯規劃'),
(17, '結訓'),
(18, '乙級學科考試'),
(20, '找工作');

-- --------------------------------------------------------

--
-- 資料表結構 `class_teacher`
--

CREATE TABLE `class_teacher` (
  `c_t_seq` int(1) UNSIGNED NOT NULL,
  `c_t_name` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `class_teacher`
--

INSERT INTO `class_teacher` (`c_t_seq`, `c_t_name`) VALUES
(1, '蔡坤炎'),
(2, '胡其田'),
(3, '洪梅君'),
(4, '鄭宇翔'),
(5, '林金露'),
(6, '楊健裕'),
(8, 'Roger');

-- --------------------------------------------------------

--
-- 資料表結構 `class_week`
--

CREATE TABLE `class_week` (
  `c_w_seq` int(10) UNSIGNED NOT NULL,
  `c_w_n` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `class_week`
--

INSERT INTO `class_week` (`c_w_seq`, `c_w_n`) VALUES
(1, '星期一'),
(2, '星期二'),
(3, '星期三'),
(4, '星期四'),
(5, '星期五'),
(6, '星期六'),
(7, '星期日');

-- --------------------------------------------------------

--
-- 資料表結構 `gbuy`
--

CREATE TABLE `gbuy` (
  `g_seq` int(11) NOT NULL,
  `g_p_id` int(11) NOT NULL COMMENT '發起人',
  `g_name` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '名稱',
  `g_pname` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '產品名稱',
  `g_pic` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '圖片檔名',
  `g_con` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '說明',
  `g_oprice` int(11) NOT NULL COMMENT '原價',
  `g_gprice` int(11) NOT NULL COMMENT '團購價',
  `g_sprice` int(11) NOT NULL COMMENT '特惠價',
  `g_onum` int(11) NOT NULL COMMENT '限量',
  `g_rnum` int(11) NOT NULL COMMENT '剩餘數量',
  `g_stime` date NOT NULL COMMENT '開始時間',
  `g_endtime` date NOT NULL COMMENT '結束時間',
  `g_close` int(1) NOT NULL COMMENT '結案否',
  `g_del` int(1) NOT NULL COMMENT '刪除否'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `gbuy`
--

INSERT INTO `gbuy` (`g_seq`, `g_p_id`, `g_name`, `g_pname`, `g_pic`, `g_con`, `g_oprice`, `g_gprice`, `g_sprice`, `g_onum`, `g_rnum`, `g_stime`, `g_endtime`, `g_close`, `g_del`) VALUES
(1, 1, 'INTEL 大放送', '256G SSD硬碟', 'gbuy20190102220702.jpg', 'INTEL 大放送 256G SSD硬碟\nINTEL 大放送 256G SSD硬碟\nINTEL 大放送 256G SSD硬碟\"\"\"\"\"', 1500, 1300, 1000, 30, 19, '2018-12-17', '2019-01-18', 1, 0),
(2, 1, 'MacBook大團購', 'MacBookAir', 'gbuy20181229212321.jpg', 'Apple MacBook Air 大團購\n頂級規格, 高級享受\"\"', 60000, 58000, 55000, 20, 13, '2018-12-12', '2018-12-20', 1, 0),
(3, 1, '團購零食No.1', '黑師傅捲心酥', 'gbuy20181229212553.jpg', '黑師傅巧克力捲心酥, 酥酥脆脆.\n黑師傅巧克力捲心酥, 酥酥脆脆.\n黑師傅巧克力捲心酥, 酥酥脆脆.\"\"123', 350, 300, 250, 30, 4, '2018-12-10', '2019-01-17', 1, 0),
(4, 1, '1dwsfds', 'BBB', 'gbuy20181229213727.jpg', 'asddasdasd1312ds\nadasdqwdwqddsadwew\nddwfewfewfewf\"1232133', 12323, 22353, 1123, 15, 15, '2018-12-12', '2018-12-12', 2, 0),
(5, 1, 'sddasdas', 'asdadw', 'gbuy20181230151204.jpg', 'dsadasdadasd\nsadasdasdas\ndasdadasdsdd\"', 32321, 32321, 23333, 12, 10, '2018-12-12', '2018-12-11', 1, 0),
(6, 1, '1233112311', '1321333221', 'gbuy20181230024009.jpg', '123adadssad\nadsssaddds\n13131312312edesasd\ndfdsfdsfsdfdfs', 1231, 621, 523, 20, 20, '2018-12-04', '2018-12-19', 2, 0),
(7, 16, '無限容量無限流量雲端', '雲端空間1年', 'gbuy20190101153542.png', '無限容量無限流量雲端空間1年期.\n隨你使用...', 3000, 2800, 2500, 10, 110, '2019-01-01', '2019-01-10', 1, 0),
(8, 16, '任天堂搖桿', 'SwitchController', 'gbuy20190103191738.jpg', 'Take your game sessions up a notch with the Nintendo Switch Pro Controller.\nIncludes motion controls, HD rumble, built-in amiibo functionality, and more.\nComes with charging cable (USB-C to USB-A)', 2000, 1800, 1600, 15, 14, '2019-01-10', '2019-01-23', 1, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `gbuy_buyer`
--

CREATE TABLE `gbuy_buyer` (
  `g_b_seq` int(11) NOT NULL,
  `g_b_pno` int(11) NOT NULL COMMENT '團購編號',
  `g_b_buyer` int(11) NOT NULL COMMENT '購買者編號',
  `g_b_num` int(11) NOT NULL COMMENT '數量',
  `g_b_price` int(11) NOT NULL COMMENT '單價',
  `g_b_total` int(11) NOT NULL COMMENT '總計',
  `g_b_time` datetime NOT NULL COMMENT '參加時間',
  `g_b_del` int(1) NOT NULL COMMENT '刪除否'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `gbuy_buyer`
--

INSERT INTO `gbuy_buyer` (`g_b_seq`, `g_b_pno`, `g_b_buyer`, `g_b_num`, `g_b_price`, `g_b_total`, `g_b_time`, `g_b_del`) VALUES
(1, 1, 6, 2, 55000, 110000, '2018-12-30 22:17:02', 1),
(2, 1, 6, 2, 55000, 110000, '2018-12-30 22:53:16', 1),
(3, 1, 6, 2, 55000, 110000, '2018-12-30 23:10:43', 1),
(4, 1, 6, 2, 55000, 110000, '2018-12-30 23:11:39', 1),
(5, 1, 6, 2, 55000, 110000, '2018-12-30 23:13:10', 1),
(6, 1, 6, 3, 55000, 110000, '2018-12-30 23:17:46', 1),
(7, 1, 13, 3, 1000, 3000, '2018-12-30 23:53:28', 0),
(8, 1, 14, 4, 1000, 4000, '2018-12-30 23:53:57', 0),
(9, 3, 6, 5, 250, 1250, '2018-12-31 01:27:39', 0),
(10, 2, 6, 1, 35000, 35000, '2018-12-31 01:27:55', 0),
(11, 2, 14, 2, 55000, 110000, '2018-12-31 01:33:05', 0),
(12, 3, 14, 5, 250, 1250, '2018-12-31 01:33:22', 0),
(13, 2, 13, 1, 55000, 55000, '2018-12-31 01:33:48', 0),
(14, 3, 13, 5, 250, 1250, '2018-12-31 01:34:12', 0),
(15, 1, 6, 4, 1000, 4000, '2018-12-31 16:31:26', 0),
(16, 1, 1, 1, 1000, 0, '2018-12-31 20:58:59', 1),
(17, 1, 1, 3, 1000, 3000, '2018-12-31 20:59:20', 1),
(18, 1, 16, 2, 1000, 2000, '2018-12-31 21:32:50', 0),
(19, 2, 16, 1, 55000, 55000, '2018-12-31 21:33:01', 1),
(20, 3, 16, 6, 250, 1500, '2018-12-31 21:33:12', 0),
(21, 2, 1, 3, 58000, 174000, '2018-12-31 21:51:21', 0),
(22, 3, 1, 5, 250, 1250, '2018-12-31 21:51:32', 0),
(23, 1, 1, 3, 1000, 3000, '2019-01-01 02:04:55', 1),
(24, 1, 1, 3, 1000, 3000, '2019-01-01 02:08:01', 1),
(25, 1, 1, 2, 1000, 2000, '2019-01-01 02:09:02', 1),
(26, 1, 1, 2, 1000, 2000, '2019-01-01 02:27:11', 1),
(27, 7, 16, 1, 2800, 2800, '2019-01-01 20:04:54', 0),
(28, 8, 16, 1, 1800, 1800, '2019-01-03 19:18:37', 0),
(29, 5, 16, 2, 32321, 64642, '2019-01-03 19:22:25', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `msgboard`
--

CREATE TABLE `msgboard` (
  `m_seq` int(10) UNSIGNED NOT NULL COMMENT '索引',
  `m_name` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '發文者',
  `m_email` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '留言者信箱',
  `m_title` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '主題',
  `m_con` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '內容',
  `m_time` datetime NOT NULL COMMENT '發文時間',
  `m_del` int(1) NOT NULL COMMENT '刪除否'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `msgboard`
--

INSERT INTO `msgboard` (`m_seq`, `m_name`, `m_email`, `m_title`, `m_con`, `m_time`, `m_del`) VALUES
(1, 'Roger Wu', 'weayzehoa@gmail.com', '第一筆測試', '第一筆測試\r\n第一筆測試\r\n第一筆測試\r\n第一筆測試', '2019-01-08 22:49:19', 0),
(2, 'Roger Wu', 'weayzehoa@gmail.com', '第二筆留言', '第二筆留言第二筆留言第二筆留言第二筆留言第二筆留言第二筆留言第二筆留言第二筆留言第二筆留言第二筆留言第二筆留言第二筆留言第二筆留言第二筆留言第二筆留言第二筆留言第二筆留言第二筆留言第二筆留言第二筆留言第二筆留言第二筆留言第二筆留言第二筆留言第二筆留言第二筆留言第二筆留言', '2019-01-08 22:52:14', 0),
(3, 'Roger Wu', 'weayzehoa@gmail.com', '第三筆留言', '第三筆留言第三筆留言第三筆留言第三筆留言第三筆留言\r\n第三筆留言第三筆留言第三筆留言第三筆留言第三筆留言\r\n第三筆留言第三筆留言第三筆留言第三筆留言第三筆留言\r\n第三筆留言第三筆留言第三筆留言第三筆留言第三筆留言', '2019-01-08 22:54:10', 0),
(4, 'Roger Wu', 'weayzehoa@gmail.com', '測試勾選同意確認按鈕', '測試勾選同意確認按鈕測試勾選同意確認按鈕\r\n測試勾選同意確認按鈕測試勾選同意確認按鈕\r\n測試勾選同意確認按鈕測試勾選同意確認按鈕', '2019-01-10 19:51:34', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `msgboard_reply`
--

CREATE TABLE `msgboard_reply` (
  `m_r_seq` int(10) UNSIGNED NOT NULL,
  `m_r_no` int(11) NOT NULL COMMENT '留言編號',
  `m_r_name` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '回覆者',
  `m_r_email` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '回覆者mail',
  `m_r_con` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '回覆留言',
  `m_r_time` datetime NOT NULL COMMENT '回覆時間',
  `m_r_del` int(11) NOT NULL COMMENT '刪除否'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `msgboard_reply`
--

INSERT INTO `msgboard_reply` (`m_r_seq`, `m_r_no`, `m_r_name`, `m_r_email`, `m_r_con`, `m_r_time`, `m_r_del`) VALUES
(1, 1, 'Roger Wu', 'weayzehoa@gmail.com', '測試回覆第一筆資料', '2019-01-09 00:33:14', 0),
(2, 2, '管理者', 'admin@localhost', '測試回覆第二筆資料', '2019-01-09 00:33:34', 0),
(3, 3, '管理者', 'admin@admin', '測試勾選同意function', '2019-01-10 19:43:03', 0),
(4, 4, 'admin', 'admin@admin', '測試勾選同意function', '2019-01-10 19:52:22', 0),
(5, 4, 'test', 'test@test', 'test', '2019-01-12 15:14:21', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `player`
--

CREATE TABLE `player` (
  `p_seq` int(10) UNSIGNED NOT NULL COMMENT '索引',
  `p_id` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '帳號',
  `p_pw` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密碼',
  `p_name` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '姓名',
  `p_nick` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '暱稱',
  `p_sex` int(1) NOT NULL COMMENT '性別',
  `p_email` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '電子郵件',
  `p_permit` int(1) NOT NULL COMMENT '權限',
  `p_ctime` datetime NOT NULL COMMENT '創立時間',
  `p_del` int(1) NOT NULL COMMENT '刪除'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `player`
--

INSERT INTO `player` (`p_seq`, `p_id`, `p_pw`, `p_name`, `p_nick`, `p_sex`, `p_email`, `p_permit`, `p_ctime`, `p_del`) VALUES
(1, 'roger', 'cc9af41356661881d6e5c0f9ccfb07ef', '吳偉召', 'Roger Wu', 1, 'weayzehoa@gmail.com', 1, '2018-12-16 10:23:16', 0),
(2, 'guest', '084e0343a0486ff05530df6c705c8bb4', '不告訴你', '訪客', 3, 'unknow', 2, '2018-12-16 10:33:28', 0),
(4, 'tim', 'affb0767ff6d2c38ed839809b9461dd3', '吳小恩', 'Tim Wu', 1, '不能說的秘密', 3, '2018-12-16 14:41:43', 0),
(5, 'vivian', '8711f5afb3f495b129973f135d803df7', '廖小智', '嘟嘟', 2, '不告訴你', 3, '2018-12-16 14:42:50', 0),
(6, 'AAA', '47bce5c74f589f4867dbd57e9ca9f808', 'AAA', 'aaa', 3, 'unknow', 3, '2018-12-16 17:36:28', 0),
(12, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test', 'test', 1, 'test', 2, '2018-12-23 20:42:34', 0),
(13, 'BBB', '08f8e0260c64418510cefb2b06eee5cd', 'BBB', 'BBB', 1, 'bbb@bbb', 3, '2018-12-30 23:41:42', 1),
(14, 'CCC', '9df62e693988eb4e1e1444ece0578579', 'CCC', 'CCC', 3, 'ccc@ccc', 3, '2018-12-30 23:42:00', 0),
(15, 'DDD', '77963b7a931377ad4ab5ad6a9cd718aa', 'DDD', 'DDD', 3, 'ddd@ddd', 3, '2018-12-30 23:42:15', 0),
(16, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '管理者', '管理者', 3, 'admin', 1, '2019-01-01 11:51:18', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `player_permission`
--

CREATE TABLE `player_permission` (
  `p_p_seq` int(10) NOT NULL,
  `p_p_permit` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `player_permission`
--

INSERT INTO `player_permission` (`p_p_seq`, `p_p_permit`) VALUES
(1, '管理者'),
(2, '唯讀'),
(3, '一般會員'),
(4, '修改'),
(5, '刪除');

-- --------------------------------------------------------

--
-- 資料表結構 `player_sex`
--

CREATE TABLE `player_sex` (
  `p_s_seq` int(10) NOT NULL COMMENT '索引',
  `p_s_sex` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '性別'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `player_sex`
--

INSERT INTO `player_sex` (`p_s_seq`, `p_s_sex`) VALUES
(1, '男'),
(2, '女'),
(3, '未知');

-- --------------------------------------------------------

--
-- 資料表結構 `service`
--

CREATE TABLE `service` (
  `s_seq` int(10) UNSIGNED NOT NULL,
  `s_no` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '編號',
  `s_time` datetime NOT NULL COMMENT '最後時間',
  `s_id` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '最後回覆帳號'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `service`
--

INSERT INTO `service` (`s_seq`, `s_no`, `s_time`, `s_id`) VALUES
(29, '201812112036495165818', '2018-12-11 20:37:36', 'admin'),
(30, '201812112140565442430', '2018-12-11 22:45:59', 'admin'),
(31, '201812112252581558319', '2018-12-11 23:06:59', '0'),
(32, '201812112307239131230', '2018-12-11 23:12:10', 'admin'),
(33, '201812112324408163136', '2018-12-11 23:25:04', 'admin'),
(34, '201901121300124702341', '2019-01-12 13:03:30', 'roger'),
(35, '201901121308538759971', '2019-01-12 13:09:21', 'roger'),
(36, '201901121310219543865', '2019-01-12 13:10:31', '0'),
(37, '201901121345264846304', '0000-00-00 00:00:00', '0'),
(38, '201901121349263024049', '0000-00-00 00:00:00', '0'),
(39, '201901121354484708396', '0000-00-00 00:00:00', '0'),
(40, '201901121358072808364', '0000-00-00 00:00:00', '0'),
(41, '201901121358336889923', '0000-00-00 00:00:00', '0'),
(42, '201901121400046124756', '2019-01-12 15:44:08', 'guest'),
(43, '201901121552296031308', '0000-00-00 00:00:00', '0'),
(44, '201901131308104970528', '2019-01-13 13:20:11', 'guest');

-- --------------------------------------------------------

--
-- 資料表結構 `service_log`
--

CREATE TABLE `service_log` (
  `s_l_seq` int(10) UNSIGNED NOT NULL COMMENT '索引鍵',
  `s_l_no` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '案件編號',
  `s_l_to` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '發問者(0)或回覆者(索引鍵)',
  `s_l_con` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '問答內容',
  `s_l_time` datetime NOT NULL COMMENT '時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `service_log`
--

INSERT INTO `service_log` (`s_l_seq`, `s_l_no`, `s_l_to`, `s_l_con`, `s_l_time`) VALUES
(90, '201812112036495165818', '0', '1312dadadsad<br />\nasdasdasdadas<br />\ndasdasdasdasda<br />\ndasdasdsadasd', '2018-12-11 20:36:58'),
(91, '201812112036495165818', 'admin', 'sddasdasdasdkajkdah<br />\nadadjalksjdlasjdka<br />\ndajdakjdkaljdklasd', '2018-12-11 20:37:36'),
(92, '201812112140565442430', '0', '1231223dsada<br />\nasdadasdasdasd', '2018-12-11 21:41:04'),
(93, '201812112140565442430', 'admin', '12312321312<br />\n31231asdaew', '2018-12-11 21:41:21'),
(94, '201812112140565442430', '0', '1312321312<br />\n123123213', '2018-12-11 22:43:26'),
(95, '201812112140565442430', 'admin', 'dsdsfsfds<br />\nsdfsfsfs<br />\nasdfsafsafsd', '2018-12-11 22:45:59'),
(96, '201812112252581558319', '0', 'lkajsdljkakjlsd<br />\nasdjklajdlkaj;ld<br />\nasjldkjlksdjklsd', '2018-12-11 23:03:55'),
(97, '201812112252581558319', 'admin', 'asdasd<br />\nasdadad', '2018-12-11 23:06:48'),
(98, '201812112252581558319', '0', 'ksdlajfkl;s<br />\nsadfasdjlfksd', '2018-12-11 23:06:59'),
(99, '201812112307239131230', '0', 'lksakldjakldjklahdla<br />\nadjklajkdljakld<br />\nadjkladjklajdkaldad', '2018-12-11 23:11:00'),
(100, '201812112307239131230', 'admin', 'asdada<br />\ndadasdasdsd', '2018-12-11 23:11:50'),
(101, '201812112307239131230', '0', 'dsfdsafsd<br />\nsdfsafasd', '2018-12-11 23:12:02'),
(102, '201812112307239131230', 'admin', 'dsafsfsd<br />\nsfsafsafdsa', '2018-12-11 23:12:10'),
(103, '201812112324408163136', '0', '豬頭豬頭豬頭豬頭豬頭豬頭豬頭豬頭豬頭豬頭<br />\n豬頭豬頭豬頭豬頭豬頭豬頭豬頭豬頭', '2018-12-11 23:24:50'),
(104, '201812112324408163136', 'admin', '笨蛋笨蛋笨蛋笨蛋笨蛋笨蛋笨蛋笨蛋笨蛋<br />\n笨蛋笨蛋笨蛋笨蛋笨蛋笨蛋笨蛋笨蛋笨蛋', '2018-12-11 23:25:04'),
(105, '201901121300124702341', '0', '123456<br />\n2365485', '2019-01-12 13:00:44'),
(106, '201901121300124702341', 'roger', 'asdqweqwewqeqwqw<br />\nadasdasdasdsadasdasd', '2019-01-12 13:03:30'),
(107, '201901121308538759971', '0', '21321adqwqwa<br />\ndqwdqwdwqdw<br />\nqdqwdwqwdwqdw', '2019-01-12 13:09:03'),
(108, '201901121308538759971', 'roger', 'dsfdsfdsafs<br />\nfdsafdsfdsaf<br />\ndsfdsfdsfasdfds', '2019-01-12 13:09:21'),
(109, '201901121310219543865', '0', 'dddqwdqwdqwd<br />\nqwdqwdqwdwdwq<br />\ndwqdwqdwq', '2019-01-12 13:10:31'),
(110, '201901121400046124756', '0', '2313123<br />\n3131312321<br />\n32132132', '2019-01-12 15:43:23'),
(111, '201901121400046124756', 'guest', 'ddwqdda<br />\ndklw;jkl;fjalf<br />\nsafkjl;safjksa;ljfdsklafawe', '2019-01-12 15:43:36'),
(112, '201901121400046124756', '0', 'ols_test<br />\nols_test<br />\nols_test', '2019-01-12 15:43:54'),
(113, '201901121400046124756', 'guest', 'TESTETESTSETETESTETESTSETE<br />\nTESTETESTSETE<br />\nTESTETESTSETE<br />\nTESTETESTSETE', '2019-01-12 15:44:08'),
(114, '201901131308104970528', '0', '123245661231<br />\n21j1kldjadsdas<br />\ndadjsalkdsajkl', '2019-01-13 13:19:24'),
(115, '201901131308104970528', 'guest', 'dsfdsafsfsdafjklsa;fjksla<br />\nsdafjksdalfj;klsajf;lsdjfl;ksajfklsja;flsdjkalfsdjaf;dsjkalf<br />\ndsfsdjklfj;sdlajfkls;dajfkldsajfklsd;ajfkldsjfl;dsf<br />\ndsafklsda;jflsjfkl;dsjf;lsjdklf;sjda;lfjskl;fhsd;hfjw;hj;wle', '2019-01-13 13:20:11');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`c_seq`);

--
-- 資料表索引 `class_name`
--
ALTER TABLE `class_name`
  ADD PRIMARY KEY (`c_n_seq`);

--
-- 資料表索引 `class_teacher`
--
ALTER TABLE `class_teacher`
  ADD PRIMARY KEY (`c_t_seq`);

--
-- 資料表索引 `class_week`
--
ALTER TABLE `class_week`
  ADD PRIMARY KEY (`c_w_seq`);

--
-- 資料表索引 `gbuy`
--
ALTER TABLE `gbuy`
  ADD PRIMARY KEY (`g_seq`);

--
-- 資料表索引 `gbuy_buyer`
--
ALTER TABLE `gbuy_buyer`
  ADD PRIMARY KEY (`g_b_seq`);

--
-- 資料表索引 `msgboard`
--
ALTER TABLE `msgboard`
  ADD PRIMARY KEY (`m_seq`);

--
-- 資料表索引 `msgboard_reply`
--
ALTER TABLE `msgboard_reply`
  ADD PRIMARY KEY (`m_r_seq`);

--
-- 資料表索引 `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`p_seq`);

--
-- 資料表索引 `player_permission`
--
ALTER TABLE `player_permission`
  ADD PRIMARY KEY (`p_p_seq`);

--
-- 資料表索引 `player_sex`
--
ALTER TABLE `player_sex`
  ADD PRIMARY KEY (`p_s_seq`);

--
-- 資料表索引 `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`s_seq`);

--
-- 資料表索引 `service_log`
--
ALTER TABLE `service_log`
  ADD PRIMARY KEY (`s_l_seq`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `class`
--
ALTER TABLE `class`
  MODIFY `c_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- 使用資料表 AUTO_INCREMENT `class_name`
--
ALTER TABLE `class_name`
  MODIFY `c_n_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- 使用資料表 AUTO_INCREMENT `class_teacher`
--
ALTER TABLE `class_teacher`
  MODIFY `c_t_seq` int(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表 AUTO_INCREMENT `class_week`
--
ALTER TABLE `class_week`
  MODIFY `c_w_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表 AUTO_INCREMENT `gbuy`
--
ALTER TABLE `gbuy`
  MODIFY `g_seq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表 AUTO_INCREMENT `gbuy_buyer`
--
ALTER TABLE `gbuy_buyer`
  MODIFY `g_b_seq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- 使用資料表 AUTO_INCREMENT `msgboard`
--
ALTER TABLE `msgboard`
  MODIFY `m_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '索引', AUTO_INCREMENT=5;

--
-- 使用資料表 AUTO_INCREMENT `msgboard_reply`
--
ALTER TABLE `msgboard_reply`
  MODIFY `m_r_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表 AUTO_INCREMENT `player`
--
ALTER TABLE `player`
  MODIFY `p_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '索引', AUTO_INCREMENT=17;

--
-- 使用資料表 AUTO_INCREMENT `player_permission`
--
ALTER TABLE `player_permission`
  MODIFY `p_p_seq` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表 AUTO_INCREMENT `player_sex`
--
ALTER TABLE `player_sex`
  MODIFY `p_s_seq` int(10) NOT NULL AUTO_INCREMENT COMMENT '索引', AUTO_INCREMENT=4;

--
-- 使用資料表 AUTO_INCREMENT `service`
--
ALTER TABLE `service`
  MODIFY `s_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- 使用資料表 AUTO_INCREMENT `service_log`
--
ALTER TABLE `service_log`
  MODIFY `s_l_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '索引鍵', AUTO_INCREMENT=116;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
