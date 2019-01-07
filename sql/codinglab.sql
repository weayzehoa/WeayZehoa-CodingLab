-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2019-01-03 08:28:29
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
(1, 1, 'INTEL 大放送', '256G SSD硬碟', 'gbuy20190103074509.jpg', 'INTEL 大放送 256G SSD硬碟\nINTEL 大放送 256G SSD硬碟\nINTEL 大放送 256G SSD硬碟\"', 1500, 1300, 1000, 30, 15, '2018-12-17', '2019-01-18', 1, 0),
(2, 1, 'MacBook大團購', 'MacBookAir', 'gbuy20181229212321.jpg', 'Apple MacBook Air 大團購\n頂級規格, 高級享受\"\"', 60000, 58000, 55000, 20, 12, '2018-12-12', '2018-12-20', 1, 0),
(3, 1, '團購零食No.1', '黑師傅捲心酥', 'gbuy20181229212553.jpg', '黑師傅巧克力捲心酥, 酥酥脆脆.\n黑師傅巧克力捲心酥, 酥酥脆脆.\n黑師傅巧克力捲心酥, 酥酥脆脆.', 350, 300, 250, 30, 4, '2018-12-10', '2019-01-17', 1, 0),
(4, 1, '1dwsfds', 'BBB', 'gbuy20181229213727.jpg', 'asddasdasd\nadasdqwdwqd\nddwfewfewfewf', 12323, 22353, 1123, 15, 15, '2018-12-12', '2018-12-12', 2, 0),
(5, 1, 'sddasdas', 'asdadw', 'gbuy20181230151204.jpg', 'dsadasdadasd\nsadasdasdas\ndasdadasdsdd\"', 32321, 32321, 23333, 12, 12, '2018-12-12', '2018-12-11', 2, 0),
(6, 1, '1233112311', '1321333221', 'gbuy20181230024009.jpg', '123adadssad\nadsssaddds\n13131312312edesasd\ndfdsfdsfsdfdfs', 1231, 621, 523, 20, 20, '2018-12-04', '2018-12-19', 2, 0),
(7, 16, '無限容量無限流量雲端', '雲端空間1年', 'gbuy20190101153542.png', '無限容量無限流量雲端空間1年期.\n隨你使用...', 3000, 2800, 2500, 10, 110, '2019-01-01', '2019-01-10', 1, 0);

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
(11, 2, 14, 1, 55000, 55000, '2018-12-31 01:33:05', 0),
(12, 3, 14, 5, 250, 1250, '2018-12-31 01:33:22', 0),
(13, 2, 13, 1, 55000, 55000, '2018-12-31 01:33:48', 0),
(14, 3, 13, 5, 250, 1250, '2018-12-31 01:34:12', 0),
(15, 1, 6, 4, 1000, 4000, '2018-12-31 16:31:26', 0),
(16, 1, 1, 1, 1000, 0, '2018-12-31 20:58:59', 1),
(17, 1, 1, 3, 1000, 3000, '2018-12-31 20:59:20', 1),
(18, 1, 11, 2, 1000, 2000, '2018-12-31 21:32:50', 0),
(19, 2, 11, 2, 55000, 110000, '2018-12-31 21:33:01', 0),
(20, 3, 11, 6, 250, 1500, '2018-12-31 21:33:12', 0),
(21, 2, 1, 3, 58000, 174000, '2018-12-31 21:51:21', 0),
(22, 3, 1, 5, 250, 1250, '2018-12-31 21:51:32', 0),
(23, 1, 1, 3, 1000, 3000, '2019-01-01 02:04:55', 1),
(24, 1, 1, 3, 1000, 3000, '2019-01-01 02:08:01', 1),
(25, 1, 1, 2, 1000, 2000, '2019-01-01 02:09:02', 1),
(26, 1, 1, 2, 1000, 2000, '2019-01-01 02:27:11', 1),
(27, 7, 16, 1, 2800, 2800, '2019-01-01 20:04:54', 0),
(28, 1, 16, 2, 1000, 2000, '2019-01-02 07:54:00', 0),
(29, 1, 1, 2, 1000, 2000, '2019-01-02 07:54:40', 0),
(30, 2, 16, 0, 55000, 0, '2019-01-02 15:04:47', 1);

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
(13, 'BBB', '08f8e0260c64418510cefb2b06eee5cd', 'BBB', 'BBB', 1, 'bbb@bbb', 3, '2018-12-30 23:41:42', 0),
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

--
-- 已匯出資料表的索引
--

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
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `gbuy`
--
ALTER TABLE `gbuy`
  MODIFY `g_seq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表 AUTO_INCREMENT `gbuy_buyer`
--
ALTER TABLE `gbuy_buyer`
  MODIFY `g_b_seq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
