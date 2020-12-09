-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 17, 2020 at 01:50 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `attribute_pro`
--

CREATE TABLE `attribute_pro` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) DEFAULT NULL,
  `size` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attribute_pro`
--

INSERT INTO `attribute_pro` (`id`, `id_product`, `size`, `color`) VALUES
(9, 10, '[\"M\",\"L\",\"S\"]', '[\"xanh\"]'),
(10, 68936, '[null]', '[null]'),
(11, 21, '[\"M\",\"L\"]', '[\"\\u0110o\\u0309\"]'),
(12, 1, '[\"M\",\"L\"]', '[\"\\u0110en\",\"Xa\\u0301m\"]'),
(13, 2, '[\"M\",\"L\"]', '[\"\\u0110en\",\"Tr\\u0103\\u0301ng\"]'),
(14, 3, '[null]', '[null]'),
(15, 4, '[null]', '[null]');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `total` int(10) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) NOT NULL,
  `stt` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `customer`, `total`, `created_at`, `updated_at`, `email`, `address`, `phone`, `stt`) VALUES
(1, 'Nguye n Tuan', 225000, '2020-05-26 03:36:17', '2020-08-15 20:04:24', 'fakernguyen123@gmail.com', 'Quận Tân Phú, Phường Tân Sơn Nhì - 27/14/15/10C Nguyễn Văn Săng', '0388794195', 'Đã giao'),
(6, 'Nguyễn Mạnh Tuấn', 241250, '2020-08-15 23:51:11', '2020-08-15 23:56:32', 'fakernguyen123@gmail.com', '27/14/15/10C Nguyễn Văn Săng', '0388794195', 'Đã giao'),
(7, 'Nguyễn Mạnh Tuấn', 75000, '2020-08-16 00:25:05', '2020-11-14 08:10:56', 'fakernguyen123@gmail.com', '27/14/15/10C Nguyễn Văn Săng', '0388794195', 'Đã xác nhận'),
(8, 'Nguyễn Trung Thật', 75000, '2020-08-17 19:05:15', '2020-08-17 19:19:08', 'nguyentrungthat01@gmail.com', '1245 Trần Đại Nghĩa, Quận Bình Thạnh, TP Hồ Chí Minh', '0246437812', 'Đã xác nhận'),
(9, 'Nguyễn Mạnh Tuấn', 98000, '2020-09-16 03:43:03', '2020-09-16 03:58:48', NULL, '27/14/15/10C Nguyễn Văn Săng', '0388794195', 'Đã xác nhận'),
(10, 'Bùi Nguyễn Quang Duy', 213750, '2020-11-15 00:17:56', '2020-11-15 00:17:56', 'chomeosieuquay@gmail.com', '27/14/15/10C Nguyễn Văn Săng', '0388794195', 'Chờ xác nhận'),
(11, 'Lê Quốc An', 142500, '2020-11-17 01:22:56', '2020-11-17 01:22:56', 'lequocanbuu2001@gmail.com', '27/14/15/10C Nguyễn Văn Săng', '0388794195', 'Chờ xác nhận'),
(12, 'Nguyễn Mạnh Tuấn', 71250, '2020-11-17 02:20:30', '2020-11-17 03:08:43', 'gamerteamht@gmail.com', '27/14/15/10C Nguyễn Văn Săng', '0388794195', 'Đã xác nhận');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `idCategory` int(5) DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(10) UNSIGNED NOT NULL,
  `district` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `district`) VALUES
(1, 'Quận 1'),
(2, 'Quận 2'),
(3, 'Quận 3'),
(4, 'Quận 4'),
(5, 'Quận 5'),
(6, 'Quận 6'),
(7, 'Quận 7'),
(8, 'Quận 8'),
(9, 'Quận 9'),
(10, 'Quận 10'),
(11, 'Quận 11'),
(12, 'Quận 12'),
(13, 'Quận Tân Phú'),
(14, 'Quận Tân Bình'),
(15, 'Quận Bình Tân'),
(16, 'Quận Thủ Đức'),
(17, 'Quận Gò Vấp'),
(18, 'Quận Phú Nhuận'),
(19, 'Quận Bình Thạnh'),
(20, 'Huyện Bình Chánh'),
(21, 'Huyện Hóc Môn'),
(22, 'Huyện Cần Giờ'),
(23, 'Huyện Củ Chi'),
(24, 'Huyện Nhà Bè');

-- --------------------------------------------------------

--
-- Table structure for table `img-pro`
--

CREATE TABLE `img-pro` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL,
  `image` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `img-pro`
--

INSERT INTO `img-pro` (`id`, `id_product`, `id_user`, `image`) VALUES
(9, 10, 1, '[\"Mua hnga2 truc tuyen tai cua hang xanh\",\"Mua hnga2 truc tuyen tai cua hang xanh\"]'),
(10, 68936, 1, '[\"nuochoachannel.jpg\",\"nuochoachannel2.jpg\"]'),
(11, 21, 1, '[\"nuochoachannel.jpg\",\"nuochoachannel2.jpg\"]'),
(12, 1, 1, '[\"https:\\/\\/cf.shopee.vn\\/file\\/68a0d1aa54959a5052a2763353d6456e\",\"https:\\/\\/ann.com.vn\\/wp-content\\/uploads\\/ao-thun-nam-co-co2.jpg\"]'),
(13, 2, 1, '[\"https:\\/\\/media3.scdn.vn\\/img3\\/2019\\/3_23\\/d84OO5_simg_de2fe0_500x500_maxb.jpg\",\"https:\\/\\/cf.shopee.vn\\/file\\/68a0d1aa54959a5052a2763353d6456e\",\"https:\\/\\/dosi-in.com\\/images\\/detailed\\/42\\/CDL3_1.jpg\",\"data:image\\/jpeg;base64,\\/9j\\/4AAQSkZJRgABAQAAAQABAAD\\/2wCEAAkGBw8QEA8PDw8QDw8QDw8PDw8PDw8PDQ8PFREWFhUVFRUYHSggGBolGxUVIT0hJSkrLi4uFx8zPT8tNyktLi0BCgoKDg0OFhAQFS0dFR0tLS0tLTI3LS0tLS0tLS4tLSstLS0tKystLS0tLS0tLS0tLS0tLS0tLi0tLS0tLS0tLf\\/AABEIAOEA4QMBEQACEQEDEQH\\/xAAcAAEAAgMBAQEAAAAAAAAAAAAAAQcCAwYFBAj\\/xABIEAACAQMAAwkNBAgFBQAAAAAAAQIDBBEFByEGEhMxQVFhcYEiIzI0QmJydJGSsbPTFKGywRckQ0RSU3OCM8PR8PFUY2STov\\/EABoBAQADAQEBAAAAAAAAAAAAAAABBAUCAwb\\/xAAyEQEAAQIDBQUIAgMBAAAAAAAAAQIDBBExBSEyQXESUVKh0RMUFSIzYYHBkeFCsfDx\\/9oADAMBAAIRAxEAPwC8QAAAAAAAAAAB8l9pO3oJyr1qdJJZ75OMX7HxnNVUU6zk7ot1VzlTGbHROlaF1T4W3qKrT30o5SaakntTT2r\\/AEaYpriqM4kuW6rc9mqMpfadOAAAA0X15ToU51q01CnTi5Tk+JL830LjIqqimM50dUUTXVFNMZzL5tGabtblJ29xSq58mM1v11xe1dqIprpq0nN1ctV2+KnJ6B08wAAAAAAAAAAAAAAAAAAAPnvr6jQg6lerClBccqk4wj7WRMxGrqmiqucqYzlxOmNadnTzG2hUupLysOlRz6Ull9iK9eKpjTevW9nXKuKcvOXD6X1g6SuMpVVbwfkW63ksf1H3Wepoq14iurnk0bWAtUcs5+7matSUm5TcpSe1ybcpN87b2s8M8963EZRlEbnpaA3QXNhV4W3nseFUpyy6NVLkkufp417T0t3KqJzh5XrFF6nKqFpaF1m2NZJXCna1OJ75OpRb6JxWxdaRdoxVE67mRd2ddp4fmjzdLb7obGoswvLaXVXp59mT2i5ROkwqVWLtOtE\\/wmtugsYLM7y2iumvS\\/1E3KY1kixcnSif4eBpbWRo6imqc53M+SNGLUM9M5YWOrJ5VYmiNJzWbez71WsdmPv6Kw3UbrLnSElwj4OjF5hQg3wcX\\/FJ+VLpfZjaUrt6q5ro1sPhaLMbt897woTaalFtNPKknvWn0PkPJZyzdLond7pK3wuG4eC8i4XC7PT2S+9ntTiK6eeapcwNmv8Axyn7f9k7PRWte3lhXVCpQfLOn36l1tbJL2Ms04umeKMlC5syuOCc\\/J2mitO2l0s21xTq88Yy74uuD7pdqLFNdNWkqNyzct8VOT0Tt5AAAAAAAAAAAAAAPK3QborWxhwlzVUc+BTXdVanoxW19fEjiu5TRG+XtZsXL05UQrHTmtS4rZhZwjbQ5Kk0qlw10J9zH\\/6KVeLmeGMmta2ZRTvrnOfL1\\/04m9u6tefCV6k60\\/4qkpTkurPEuhFaa5q3zOa\\/TbpojKmMoalE5zd5JwRmCGaU47BmIx1fAnMyMdHwYDHR8EAx1fEZmScc5GZkEZiBmIaJzQRympJtSTypJtST6Hxo6iUTETudXoHWDpC2xGdT7XSXkV3maXm1fCz6W+PajFV0\\/eFO7s+1XpHZn7ei1NzG6600gsUp7yslmdvUwqq52v4o9K7cF+3epuaasfEYW5Zn5o3d73z1VgAAAAAAAAAA+TSt\\/TtqNW4qvEKUHOXO+ZLpbwu05qqimJmdId27c3KopjWX5y0vpCtcV6txWk5Tqyb48qKz3MFnyUtiRj11zXOcvqbdum3TFNOkNG8XMsnDsQGRIEAAAIABIACGAAAAAADCnVqRnGVOUoVISU4zi8ShJcTTOqappnOETETGUxnD9Ebk9NxvrSlXWN\\/jeVoryK0fCXVyroaNe1ciumJfMYmzNm5NPLl0ewejwAAAAAAAAAFUa3dP76pCwpvuKeKtxjlqNdxDsT33bHmM\\/GXd\\/Yhs7NsZRN2dZ0\\/auKiyik1kU3sXUBOAJYEASAAEAAJAAQAAkQBKASYGNFbPvA7TVjp\\/7Ld8BN4oXWIPL2Qrfs5du2PauYs4W72auzOkqG0LHtLfajip\\/wBc11mo+fAAAAAAAAPL3TaZhZWtW5lhuEcU4Py6r2Qj7fuyedyuKKZqe1izN25FEPzxcXM6s51aknKdSUpzk+OUpPLZjzMzOcvqKaYpiIjSGCIS10nta5m\\/iJQ3BIwMQBAEiQAAAAIEACQAlAa68sL4CBtSwgNVSul19AiBfOrzdItIWcZyea9F8DXXK5JdzP8AuWH15XIbFmvt0Rnq+bxuH9jcmI4Z3w6g9VQAAAAAABTOtbT\\/ANouVa03mjat77HFK4a7r3V3PW5Gbi7naq7MaQ3tnWOxR251q\\/1\\/bhWio0UJgYxfdy9FMnkN6IEAAIAASQAAAAAgASAEgaa3HD0kTAic5S2IBCguXaxmOp3Aaf8AsN5ByeKFbFKvzJN9zP8Atf3OR7Ye72K9+kqmMse2tTlxRvhfZrPmwAAAAAPB3baeVjZ1Kya4WXe6CfLVktjxypLMuw8r1zsUTPNZwlj21yKeXPo\\/P0pNtttttttt5bb423zmO+m0AIaAxj4bXmL4k8huIEMCABAASAJAgAAEACQAyA1VH3VNed+RMcxmQIbAgC7dV+6D7VacDUlmva4pyy+6nS\\/Zy9i3vXHPKamGudujKdYfP7QsezudqOGr\\/fN2ZZUAAAAAUXrJ3QfbLyUIPNC231Knh7JTz3yftWOqKfKZWJu9uvKNIfRYCx7K3nPFVv8ARyRXXUpgANUZd9a\\/7f5o6y+VHN9JylDAACAJACSBAAASBAEggJQHz3EsTpdLl8EdRG6UNjOUgEAe1uS05Kxu6VwsuGd5XivKoya33atkl0xPWzc7FcTyeGJsxetzTz5dX6FpVIyjGUWpRklKMltTi1lNGw+YmMpylkEAADlNY+6D7FZyUJYuLjNKljjisd3PsT9riV8Rd7FP3lcwNj2tzfwxvn0USZT6QbCBAANFH\\/Gn0U18Tv8Awjqjm+w4SgAAAEASBAEgQCAEgAAkD477wqPptfcd06VInWG84SMCEwJAuDVJug4WhKyqPvlus0s8crdvi\\/tezqcTRwl3tU9mdYYe0rHZr9pGlWvX+1glxmAESkkm28JbW3sSQH583b7oft95Uqp95h3q3WdnBxfhdcnmXU0uQyL9zt158ofTYSx7G3ETrO+f++zw0jxWRoDECQNNBd9m\\/Mh+Z1PDCOb6zlLEAAAkgABIACAAgkAAGSA+W8W2l0VPyZ1Tz6Ink2nKUASkBkB9eg9LTs7mlc09sqcsuOfDg9kovrWfufId265oqiqHnetRdomieb9G2N3Tr0qdalLfU6sIzhLnjJZRsxMTGcPlq6ZoqmmdYbyXLRe2sK1OpRqZcKkJQmoylCTjJYeGtqImM4yl1RVNNUVRrCpd0uq+vR31Syk7inx8DPeq4iuh7FP7n1mfdwkxvo3tuxtKirdc3T38v6cFUpyjJwnGUJxeJRknGcXzNPan1lOYmNWlExMZxoxAxCU84QwoeHP0YfmTOkI5voISgCAAAgSAJAAQIAEgQJJEoDRd+R6a+DJjmhlyEJQwlkEHQuN7Fzt9AHZ7mtW93dYqXGbSi9vdLNxNdEPJ65exlq1haqt9W6FC\\/tC3b3UfNV5f90\\/lb2hNE0rOhC3o7\\/g4Zxv5ucm28t5fS3sWEaNFEURlGjDu3artc11ay+86eYAA8XdDuXtL6OK9Pu8YjWhiNeHVLlXQ8o87lqmvWFixiblmflnd3clT7p9X15Z5qUk7qgtu\\/pRfCwXn0+PtWewz7uFqo3xvhtWMfbu7qvlq8v5cgmntKy6IDGlF75vDw0lvsdznbszz7V7UTyRzb2QlAEMAAAECSQAggAAAkAMkBouItuOxtJ5bS2RWMZfNtaXaTHNDIh0BDo9zO4y8v8ThDgqD\\/eKqag15keOfZs6T3t4euv7Qq38Zas7pnOru9e5bW5ncXZ2KUoQ4Wvy16qTmn5i4oLq287ZoW7FFGmrFxGMuXt0zlT3Q6Q9lQAAAAAABy+6TcLZXu+nveArvbw1JJOT8+PFP49J4XMPRX9pXLGNuWt2tPdKv46sL77TCjJw4BtuV1BrEYLzHt375tq6Sp7pV2suTSnaVrsTVHF3f2+7WloujaUNG0KEN5Tg7nplKWKeZSfLJ851i6IpppiHns+5VcruVVTvnJXpSarFgCAJAgABIkCABAEgQBIyA7PVTbQq3dxSqwU6c7KpGcJLMZRdWnsZbwkRNUxPcztpVTTbpmJymJbdMasbqN1wdrvZ208yjVqTUeBWfBnyt7djSeSa8JV2vl0Ra2lbm3nXxRy73Ybm9XNnbb2df9brLbmpHFGL82nxPrlnsLFvDUUb53yo39oXLm6n5afP+XaJFlQAAAAAAAAAAABWWurisfSuPhTKON0pa2yta\\/wAKwKDZYsAAIAkAAAgCQIAkAAEgd1qe8fq+qT+bTLeD456M3an0o6rjNJhAAAAAAAAAAAAAAKy118Vh6Vx8KZSxulLW2VrX+FX5M9soAAMEASAAgCQIAkAAAAB3ep3x+t6pP5tMt4PjnozdqfSjquM0mEAAAAAAAAAAAAAArLXX4Nj6dx8KZSxulLW2VrX+FXGe2QAgJIEEgAAACAJAgCQAEDu9Tnj1b1SXzaZcwfHPRm7U+lT1\\/S4zSYQAAAAAAAAAAAAACstdfgWXpV\\/hAo43Slr7K1r\\/AAq5FBsAAAQBIgAAAAAJIAkCAJHeamvHa\\/qsvmwLeD456M3an0qev6XEaTCAAAAAAAAAAAAAAVlrq8Gy9Ov+GBRxulLX2VrX+FXFBsIYEgCAZIxAAAADIBMCQAEgd7qb8dr+qy+bAt4LjnozdqfSp6\\/pcJpMIAAAAAAAAAAAAABWWuvwbH06\\/wAIFHG6UtfZWtf4VaUGwAAJAhsDECQAEAMgAJAZAkDvdTfjtf1WXzYFvB8c9GbtT6VPX9LiNJhAAAAAAAAAAAAAAKx12eDY+lcfCmUcbpS19la1\\/hViKDYSAQEgYsBkAAAZAgAmBIACQO91NePVvVZfNgW8Hxz0Zu1PpR1\\/S4zSYQAAAAAAAAAAAAACsddng2Pp3H4aZRxulLW2VrX+FWFBsgEgSBhJgQAAAMgAIyBkAyBIHfamvHa\\/qsvmwLeD456M3an0o6\\/pcZpMIAAAAAAAAAAAAABWWu3wLH06\\/wCGBSxulLW2VrX+FVGe2QCUBIGuQEIJAAAAACEgGwMgO\\/1ML9dr+qv5sC5g+OejN2p9Knr+lxmiwgAAAAAAAAAAAAAFZ67P8Oy\\/qVvwxKWN0pa2yuKvpCqMme2QDJAGBrYShASAAMCEAAkABKYQsLUt45ceq\\/5sC5guKWZtT6dPX9LiNFhgAAAAAAAAAAAAAKy13Pvdl\\/VrfgiU8Zww1tlcVfRU+TObQgMwgYGDQSJAAADAEJAACAASgLC1K+OXPqv+bEu4Pill7U+nT1XGaDDAAAAAAAAAAAAAAVlrxeKNi+Thqqf\\/AK0VMZww1tlcVfRUyZmtpOQJyEGQIyEgAAAAAAIwAAAWJqU8buvVl8yJdwfFLL2r9OnquI0GGAAAAAAAAAAAAAArHXi+82WeWtV+WVMXww1dlcdfRUk0Z8NpnB5X\\/JEpY05ZbEwhk\\/8AewhKO37iRMngIZRewgOQDGMskiO0JSn\\/ALwwInLAiBLezJAxi8kixNSUv1y6X\\/jR+Yi7g43yy9q\\/Tp6rkL7DAAAAAAAAAAAAAAeBuu3J0NJxpQr1K1NUZynF0ZQi22sPO+izzuW4rjKVjD4mqxMzTETn3ucWqOw\\/6i8f99D6Z4+50d8rfxW74Y8\\/VK1SWGGuHvPfofTI9zo75Pit3wx5+pHVHo9ft7z36H0xODo75Pil3wx5+qXqlsP59379D6Y9zo75Pil3wx5+p+iWw\\/n3fv0Ppj3Ojvk+K3fDHn6olqjsH+8Xnv0Ppj3Ojvk+KXfDHn6kdUlgljh7z36H0xODo75Pil3wx5+qXqlsNvf7vb59D6Y9zo75Pil3wx5+rGGqOwX7xee\\/Q+mTOEonnJ8Uu+GPP1ZLVLYfz7v36H0yPc6O+T4pd8MefqLVLYfz7v36H0x7nR3yfFbvhjz9US1R2D\\/b3fv0PpiMHR3yfFLvhjz9T9ElhjHD3nv0Ppj3Ojvk+K3fDHn6n6I7D+fee\\/Q+mPc6O+T4rd8Mefq9ncnuGttG1alahVr1JVKapyVaVOUUlLOzewW09rdqmjRXxGMrvxEVREZd3\\/rqD1VAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAP\\/\\/Z\",\"https:\\/\\/bizweb.dktcdn.net\\/thumb\\/1024x1024\\/100\\/345\\/647\\/products\\/15bf4a055965bc3be574.jpg?v=1555919999720\"]'),
(14, 4, 1, '[\"leuleu\",\"hihih\"]');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_product` int(10) NOT NULL,
  `code_bill` int(10) NOT NULL,
  `attr` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) NOT NULL,
  `qty` int(5) NOT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `customer`, `id_product`, `code_bill`, `attr`, `name`, `price`, `qty`, `updated_at`, `created_at`, `status`) VALUES
(7, 'Nguyễn Mạnh Tuấn', 1, 6, 'M,Mặc định', 'Áo thun nam ngắn tay', 166250, 1, '2020-08-15 23:51:11', '2020-08-15 23:51:11', 1),
(8, 'Nguyễn Mạnh Tuấn', 2, 6, 'M,Mặc định', 'Áo thun nam cao cấp', 75000, 1, '2020-08-15 23:51:11', '2020-08-15 23:51:11', 1),
(9, 'Nguyễn Mạnh Tuấn', 2, 7, 'M,Mặc định', 'Áo thun nam cao cấp', 75000, 1, '2020-11-14 08:10:56', '2020-08-16 00:25:05', 1),
(10, 'Nguyễn Trung Thật', 2, 8, 'M,Mặc định', 'Áo thun nam cao cấp', 75000, 1, '2020-08-17 19:05:15', '2020-08-17 19:05:15', 1),
(11, 'Nguyễn Mạnh Tuấn', 3, 9, 'M,Mặc định', 'ÁO PHÔNG | ÁO THUN NAM NỮ FORM RỘNG TAY LỠ UNISEX HOA CÚC CỰC HOT', 98000, 1, '2020-09-16 03:58:48', '2020-09-16 03:43:03', 1),
(12, 'Bùi Nguyễn Quang Duy', 2, 10, 'L,Đen', 'Áo thun nam cao cấp', 71250, 3, '2020-11-15 00:17:56', '2020-11-15 00:17:56', 0),
(13, 'Lê Quốc An', 2, 11, 'M,Đen', 'Áo thun nam cao cấp', 71250, 2, '2020-11-17 01:22:56', '2020-11-17 01:22:56', 0),
(14, 'Nguyễn Mạnh Tuấn', 2, 12, 'M,Mặc định', 'Áo thun nam cao cấp', 71250, 1, '2020-11-17 03:08:43', '2020-11-17 02:20:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `qty` int(5) NOT NULL,
  `price` int(10) NOT NULL,
  `thumbnail` text CHARACTER SET latin1,
  `_link` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `discount` int(5) NOT NULL,
  `sold` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `content`, `qty`, `price`, `thumbnail`, `_link`, `discount`, `sold`) VALUES
(1, 'Áo thun nam ngắn tay', 'Áo thun nam ngắn tay Áo thun nam ngắn tay Áo thun nam ngắn tay Áo thun nam ngắn tay Áo thun nam ngắn tay Áo thun nam ngắn tay Áo thun nam ngắn tay Áo thun nam ngắn tay Áo thun nam ngắn tay Áo thun nam ngắn tay Áo thun nam ngắn tay Áo thun nam ngắn tay Áo thun nam ngắn tay Áo thun nam ngắn tayÁo thun nam ngắn tay Áo thun nam ngắn tay Áo thun nam ngắn tay Áo thun nam ngắn tay Áo thun nam ngắn tay', 0, 175000, 'https://cf.shopee.vn/file/68a0d1aa54959a5052a2763353d6456e', 'ao-thun-nam-ngan-tay', 5, 2),
(2, 'Áo thun nam cao cấp', 'Áo thun nam cao cấp Áo thun nam cao cấp Áo thun nam cao cấp Áo thun nam cao cấp Áo thun nam cao cấpÁo thun nam cao cấp Áo thun nam cao cấpÁo thun nam cao cấp Áo thun nam cao cấp Áo thun nam cao cấpÁo thun nam cao cấp Áo thun nam cao cấp Áo thun nam cao cấp Áo thun nam cao cấpÁo thun nam cao cấpÁo thun nam cao cấpÁo thun nam cao cấpÁo thun nam cao cấpÁo thun nam cao cấpÁo thun nam cao cấpvvvÁo thun nam cao cấpÁo thun nam cao cấp', 13, 75000, 'https://media3.scdn.vn/img3/2019/3_23/d84OO5_simg_de2fe0_500x500_maxb.jpg', 'ao-thun-nam-cao-cap', 5, 2),
(3, 'ÁO PHÔNG | ÁO THUN NAM NỮ FORM RỘNG TAY LỠ UNISEX HOA CÚC CỰC HOT', '<p>dsfghjd</p>', 11, 98000, 'Mua hnga2 truc tuyen tai cua hang xanh', 'ao-phong-ao-thun-nam-nu-form-rong-tay-lo-unisex-hoa-cuc-cuc-hot', 5, 0),
(4, 'ÁO PHÔNG | ÁO THUN NAM NỮ FORM RỘNG TAY LỠ UNISEX HOA CÚC CỰC HOT', '<p>dsfghjd</p>', 12, 98000, 'leuleu', 'ao-phong-ao-thun-nam-nu-form-rong-tay-lo-unisex-hoa-cuc-cuc-hot', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` int(10) NOT NULL,
  `idUser` int(5) NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `reply` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sex` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` varchar(10) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `password`, `level`, `sex`, `birthday`, `remember_token`, `address`, `phone`) VALUES
(1, 'Nguyễn Mạnh Tuấn', '0193c52f00bc5259b7ef49efa93bc8cb', 'fakernguyen123@gmail.com', '$2y$10$FddICQNzhDJdCKJBUdaYfuyfOK6ada/EVNqQAvqTdzn9jDN2o8TVq', 'Admin', 'Nam', '2001-05-27', '', '27/14/15/10C Nguyễn Văn Săng, P.Tân Sơn Nhì, Quận Tân Phú, Hồ Chí Minh', '0388794195'),
(2, 'Lương Văn B', 'user.jpg', 'gamerteamht@gmail.com', '$2y$10$Axoo8DHCakDl.6V7cWnowejhqkp43Vr4S6WJG3dywWXaVcpm7nzvO', 'Khách hàng', 'Nam', '2020-05-27', NULL, 'Quận Tân Phú, Phường Tân Sơn Nhì - 27/14/15/10C Nguyễn Văn Săng', '0388794195');

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

CREATE TABLE `ward` (
  `id` int(10) UNSIGNED NOT NULL,
  `ward` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `district` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ward`
--

INSERT INTO `ward` (`id`, `ward`, `district`) VALUES
(1, 'Bến Nghé', 1),
(2, 'Bến Thành', 1),
(3, 'Cầu Kho', 1),
(4, 'Cầu Ông Lãnh', 1),
(5, 'Cô Giang', 1),
(6, 'Đa Kao', 1),
(7, 'Nguyễn Cư Trinh', 1),
(8, 'Nguyễn Thái Bình', 1),
(9, 'Phạm Ngũ Lão', 1),
(10, 'Tân Định', 1),
(11, 'An Khánh', 2),
(12, 'An Lợi Đông', 2),
(13, 'An Phú', 2),
(14, 'Bình An', 2),
(15, 'Bình Khánh', 2),
(16, 'Bình Trưng Đông', 2),
(17, 'Bình Trưng Tây', 2),
(18, 'Cát Lái', 2),
(19, 'Thạnh Mỹ Lợi', 2),
(20, 'Thảo Điền', 2),
(21, 'Thủ Thiêm', 2),
(22, '1', 3),
(23, '2', 3),
(24, '3', 3),
(25, '4', 3),
(26, '5', 3),
(27, '6', 3),
(28, '7', 3),
(29, '8', 3),
(30, '9', 3),
(31, '10', 3),
(32, '11', 3),
(33, '12', 3),
(34, '13', 3),
(35, '14', 3),
(36, '1', 4),
(37, '2', 4),
(38, '3', 4),
(39, '4', 4),
(40, '5', 4),
(41, '6', 4),
(42, '8', 4),
(43, '9', 4),
(44, '10', 4),
(45, '12', 4),
(46, '13', 4),
(47, '14', 4),
(48, '15', 4),
(49, '16', 4),
(50, '18', 4),
(51, '1', 5),
(52, '2', 5),
(53, '3', 5),
(54, '4', 5),
(55, '5', 5),
(56, '6', 5),
(57, '7', 5),
(58, '8', 5),
(59, '9', 5),
(60, '10', 5),
(61, '11', 5),
(62, '12', 5),
(63, '13', 5),
(64, '14', 5),
(65, '15', 5),
(66, '1', 6),
(67, '2', 6),
(68, '3', 6),
(69, '4', 6),
(70, '5', 6),
(71, '6', 6),
(72, '7', 6),
(73, '8', 6),
(74, '9', 6),
(75, '10', 6),
(76, '11', 6),
(77, '12', 6),
(78, '13', 6),
(79, '14', 6),
(80, 'Bình Thuận', 7),
(81, 'Phú Mỹ', 7),
(82, 'Phú Thuận', 7),
(83, 'Tân Hưng', 7),
(84, 'Tân Kiểng', 7),
(85, 'Tân Phong', 7),
(86, 'Tân Phú', 7),
(87, 'Tân Quy', 7),
(88, 'Tân Thuận Đông', 7),
(89, 'Tân Thuận Tây', 7),
(90, '1', 8),
(91, '2', 8),
(92, '3', 8),
(93, '4', 8),
(94, '5', 8),
(95, '6', 8),
(96, '7', 8),
(97, '8', 8),
(98, '9', 8),
(99, '10', 8),
(100, '11', 8),
(101, '12', 8),
(102, '13', 8),
(103, '14', 8),
(104, '15', 8),
(105, '16', 8),
(106, 'Hiệp PHú', 9),
(107, 'Long Bình', 9),
(108, 'Long Phước', 9),
(109, 'Long Thạnh Mỹ', 9),
(110, 'Long Trường', 9),
(111, 'Phú Hữu', 9),
(112, 'Phước Bình', 9),
(113, 'Phước Long A', 9),
(114, 'Phước Long B', 9),
(115, 'Tân Phú', 9),
(116, 'Tân Nhơn Phú A', 9),
(117, 'Tân Nhơn Phú B', 9),
(118, 'Trường Thạnh', 9),
(119, '1', 10),
(120, '2', 10),
(121, '3', 10),
(122, '4', 10),
(123, '5', 10),
(124, '6', 10),
(125, '7', 10),
(126, '8', 10),
(127, '9', 10),
(128, '10', 10),
(129, '11', 10),
(130, '12', 10),
(131, '13', 10),
(132, '14', 10),
(133, '15', 10),
(134, '1', 11),
(135, '2', 11),
(136, '3', 11),
(137, '4', 11),
(138, '5', 11),
(139, '6', 11),
(140, '7', 11),
(141, '8', 11),
(142, '9', 11),
(143, '10', 11),
(144, '11', 11),
(145, '12', 11),
(146, '13', 11),
(147, '14', 11),
(148, '15', 11),
(149, '16', 11),
(150, 'An Phú Đông', 12),
(151, 'Đông Hưng Thuận', 12),
(152, 'Hiệp Thành', 12),
(153, 'Tân Chánh Hiệp', 12),
(154, 'Tân Hưng Thuận', 12),
(155, 'Tân Thới Hiệp', 12),
(156, 'Tân Thới Nhất', 12),
(157, 'Thạnh Lộc', 12),
(158, 'Thạnh Xuân', 12),
(159, 'Thới An', 12),
(160, 'Trung Mỹ Tây', 12),
(161, 'An Lạc', 15),
(162, 'An Lạc A', 15),
(163, 'Bình Hưng Hòa', 15),
(164, 'Bình Hưng Hòa A', 15),
(165, 'Bình Hưng Hòa B', 15),
(166, 'Bình Trị Đông', 15),
(167, 'Bình Trị Đông A', 15),
(168, 'Bình Trị Đông B', 15),
(169, 'Tân Tạo', 15),
(170, 'Tân Tạo A', 15),
(171, '1', 19),
(172, '2', 19),
(173, '3', 19),
(174, '5', 19),
(175, '6', 19),
(176, '7', 19),
(177, '11', 19),
(178, '12', 19),
(179, '13', 19),
(180, '14', 19),
(181, '15', 19),
(182, '17', 19),
(183, '19', 19),
(184, '21', 19),
(185, '22', 19),
(186, '24', 19),
(187, '25', 19),
(188, '26', 19),
(189, '27', 19),
(190, '28', 19),
(191, '1', 17),
(192, '3', 17),
(193, '4', 17),
(194, '5', 17),
(195, '6', 17),
(196, '7', 17),
(197, '8', 17),
(198, '9', 17),
(199, '10', 17),
(200, '11', 17),
(201, '12', 17),
(202, '13', 17),
(203, '14', 17),
(204, '15', 17),
(205, '16', 17),
(206, '17', 17),
(207, '1', 18),
(208, '2', 18),
(209, '3', 18),
(210, '4', 18),
(211, '5', 18),
(212, '7', 18),
(213, '8', 18),
(214, '9', 18),
(215, '10', 18),
(216, '11', 18),
(217, '12', 18),
(218, '13', 18),
(219, '14', 18),
(220, '15', 18),
(221, '17', 18),
(222, '1', 14),
(223, '2', 14),
(224, '3', 14),
(225, '4', 14),
(226, '5', 14),
(227, '6', 14),
(228, '7', 14),
(229, '8', 14),
(230, '9', 14),
(231, '10', 14),
(232, '11', 14),
(233, '12', 14),
(234, '13', 14),
(235, '14', 14),
(236, '15', 14),
(237, 'Hiệp Tân', 13),
(238, 'Hòa Thạnh', 13),
(239, 'Phú Thạnh', 13),
(240, 'Phú Thọ Hòa', 13),
(241, 'Phú Trung', 13),
(242, 'Sơn Kỳ', 13),
(243, 'Tân Quý', 13),
(244, 'Tân Sơn Nhì', 13),
(245, 'Tân Thành', 13),
(246, 'Tân Thới Hòa', 13),
(247, 'Tây Thạnh', 13),
(260, 'Bình Chiểu', 16),
(261, 'Bình Thọ', 16),
(262, 'Hiệp Bình Chánh', 16),
(263, 'Hiệp Bình Phước', 16),
(264, 'Linh Chiểu', 16),
(265, 'Linh Đông', 16),
(266, 'Linh Tây', 16),
(267, 'Linh Trung', 16),
(268, 'Linh Xuân', 16),
(269, 'Tam Bình', 16),
(270, 'Tam Phú', 16),
(271, 'Trường Thọ', 16),
(288, 'Thị Trấn Tân Tuất', 20),
(289, 'An Phú Tây', 20),
(290, 'Bình Chánh', 20),
(291, 'Bình Hưng', 20),
(292, 'Bình Lợi', 20),
(293, 'Đa Phước', 20),
(294, 'Hưng Long', 20),
(295, 'Lê Minh Xuân', 20),
(296, 'Phạm Văn Hai', 20),
(297, 'Phong Phú', 20),
(298, 'Quy Đức', 20),
(299, 'Tân Kiên', 20),
(300, 'Tân Nhựt', 20),
(301, 'Tân Quý Tây', 20),
(302, 'Vĩnh Lộc A', 20),
(303, 'Vĩnh Lộc B', 20),
(304, 'Thị Trấn Cần Thạnh', 22),
(305, 'An Thới Đông', 22),
(306, 'Bình Khánh', 22),
(307, 'Long Hòa', 22),
(308, 'Lý Nhơn', 22),
(309, 'Tam Thôn Hiệp', 22),
(310, 'Thạnh An', 22),
(311, 'Thị Trấn Củ Chi', 23),
(312, 'An Nhơn Tây', 23),
(313, 'An Phú', 23),
(314, 'Bình Mỹ', 23),
(315, 'Hòa Phú', 23),
(316, 'Nhuận Đức', 23),
(317, 'Phạm Văn Cọi', 23),
(318, 'Phú Hòa Đông', 23),
(319, 'Phú Mỹ Hưng', 23),
(320, 'Phước Hiệp', 23),
(321, 'Phước Thạnh', 23),
(322, 'Phước Vĩnh An', 23),
(323, 'Tân An Hội', 23),
(324, 'Tân Phú Trung', 23),
(325, 'Tân Thạnh Đông', 23),
(326, 'Tân Thạnh Tây', 23),
(327, 'Tân Thông Hội', 23),
(328, 'Thái Mỹ', 23),
(329, 'Trung An', 23),
(330, 'Trung Lập Hạ', 23),
(331, 'Trung Lập Thượng', 23),
(332, 'Thị Trấn Hóc Môn', 21),
(333, 'Bà Điểm', 21),
(334, 'Đông Thạnh', 21),
(335, 'Nhị Bình', 21),
(336, 'Tân Hiệp', 21),
(337, 'Tân Thới Nhì', 21),
(338, 'Tân Xuân', 21),
(339, 'Thới Tam Thôn', 21),
(340, 'Trung Chánh', 21),
(341, 'Xuân Thới Đông', 21),
(342, 'Xuân Thới Sơn', 21),
(343, 'Xuân Thới Thượng', 21),
(344, 'Thị Trấn Nhà Bè', 24),
(345, 'Hiệp Phước', 24),
(346, 'Long Thới', 24),
(347, 'Nhơn Đức', 24),
(348, 'Phú Xuân', 24),
(349, 'Phước Kiểng', 24),
(350, 'Phước Lộc', 24);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attribute_pro`
--
ALTER TABLE `attribute_pro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `img-pro`
--
ALTER TABLE `img-pro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ward`
--
ALTER TABLE `ward`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attribute_pro`
--
ALTER TABLE `attribute_pro`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `img-pro`
--
ALTER TABLE `img-pro`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ward`
--
ALTER TABLE `ward`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=351;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
