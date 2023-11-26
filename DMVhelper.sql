-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 26, 2023 at 10:02 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DMVhelper`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(4) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `context` text NOT NULL,
  `page_id` varchar(4) NOT NULL,
  `user_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `time_stamp`, `context`, `page_id`, `user_email`) VALUES
(3, '2023-11-18 22:10:19', 'This is a comment by null.', 's1', 'Anonymous'),
(4, '2023-11-18 22:10:19', 'I love php and mysql', 's1', 'Anonymous'),
(36, '2023-11-20 23:11:04', 'a new comment about s6_1 by anonymous', 's6_1', 'Anonymous'),
(37, '2023-11-20 23:11:09', 'a new comment about s6_1 by anonymous', 's6_1', 'Anonymous'),
(39, '2023-11-20 23:12:49', 'a new comment about s6_1 by anonymous', 's6_1', 'Anonymous'),
(40, '2023-11-20 23:21:44', 'a new comment about s6_1 by anonymous', 's6_1', 'Anonymous'),
(41, '2023-11-24 06:40:31', '欢迎在此处写评论', 's1', 'Anonymous'),
(42, '2023-11-24 06:53:32', '再写一个评论', 's1', 'Anonymous'),
(43, '2023-11-24 06:53:41', '再写一个评论', 's1', 'Anonymous'),
(44, '2023-11-24 06:55:13', '再再写一个评论', 's1', 'Anonymous'),
(45, '2023-11-24 06:59:34', '你好', 's1', 'Anonymous');

-- --------------------------------------------------------

--
-- Table structure for table `mock_tests`
--

CREATE TABLE `mock_tests` (
  `test_id` int(4) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `test_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mock_tests`
--

INSERT INTO `mock_tests` (`test_id`, `user_email`, `test_time`) VALUES
(4, 'longhaitao', '2023-11-23 09:13:17'),
(5, 'longhaitao', '2023-11-25 04:30:27'),
(7, 'longhaitao', '2023-11-25 04:39:15'),
(8, 'longhaitao', '2023-11-25 04:40:56'),
(9, 'longhaitao', '2023-11-25 04:41:23'),
(10, 'longhaitao', '2023-11-25 04:42:02'),
(11, 'longhaitao', '2023-11-25 04:42:11'),
(12, 'longhaitao', '2023-11-25 04:42:52'),
(13, 'longhaitao', '2023-11-25 04:48:44'),
(14, 'longhaitao', '2023-11-25 04:48:47'),
(15, 'longhaitao', '2023-11-25 04:48:50'),
(16, 'longhaitao', '2023-11-25 04:50:42'),
(19, 'haitao.long@sjsu.edu', '2023-11-25 08:23:55'),
(20, 'haitao.long@sjsu.edu', '2023-11-25 08:24:42'),
(21, 'haitao.long@sjsu.edu', '2023-11-25 08:26:01'),
(22, 'haitao.long@sjsu.edu', '2023-11-25 08:30:08'),
(23, 'haitao.long@sjsu.edu', '2023-11-25 08:30:22'),
(24, 'haitao.long@sjsu.edu', '2023-11-25 08:32:09'),
(25, 'haitao.long@sjsu.edu', '2023-11-25 08:32:20'),
(26, 'haitao.long@sjsu.edu', '2023-11-25 08:32:55'),
(27, 'haitao.long@sjsu.edu', '2023-11-25 08:36:48'),
(47, 'longhaitao', '2023-11-26 00:50:09'),
(48, 'longhaitao', '2023-11-26 00:52:25'),
(49, 'longhaitao', '2023-11-26 01:15:42'),
(50, 'haitao.long@sjsu.edu', '2023-11-26 03:08:38'),
(51, 'haitao.long@sjsu.edu', '2023-11-26 03:16:20'),
(52, 'haitao.long@sjsu.edu', '2023-11-26 03:21:56'),
(53, 'haitao.long@sjsu.edu', '2023-11-26 03:22:28');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` varchar(4) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `name`) VALUES
('null', 'null.html'),
('s1', 's1.html'),
('s10', 's10.html'),
('s11', 's11.html'),
('s12', 's12.html'),
('s13', 's13.html'),
('s14', 's14.html'),
('s2', 's2.html'),
('s3', 's3.html'),
('s4', 's4.html'),
('s5', 's5.html'),
('s6_1', 's6_1.html'),
('s6_2', 's6_2.html'),
('s7_1', 's7_1.html'),
('s7_2', 's7_2.html'),
('s7_3', 's7_3.html'),
('s8_1', 's8_1.html'),
('s8_2', 's8_2.html'),
('s8_3', 's8_3.html'),
('s9', 's9.html');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(4) NOT NULL,
  `stem` varchar(200) NOT NULL,
  `num_of_options` tinyint(1) NOT NULL,
  `option1` varchar(50) NOT NULL,
  `option2` varchar(50) NOT NULL,
  `option3` varchar(50) NOT NULL,
  `option4` varchar(50) NOT NULL,
  `answer` tinyint(1) NOT NULL,
  `page_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `stem`, `num_of_options`, `option1`, `option2`, `option3`, `option4`, `answer`, `page_id`) VALUES
(1, '如果你驾车时经过一片施工区域，应该怎么做才对？', 4, '减速，小心路上的工人。', '鸣笛，引起周围行人和车辆的注意。', '集中精神，小心驾驶即可。', '加速通过，以免影响工人施工。', 3, 's7_2'),
(2, '右转弯时如果遇到自行车专用车道时应该如何处理？', 4, '绝对不能驶入自行车专用车道。', '转弯前先停车，确认安全后再驶入自行车专用车道。', '先提前驶入自行车专用车道，然后再转弯。', ' 先通过鸣笛来提醒路口附近的行人注意，然后再转弯。', 3, 's6_1'),
(5, '如果路口的信号灯失灵了，作为司机应该如何应对？', 4, ' 首先要在到达路口时停车，确认安全后再前进。', ' 如果你的车先到达路口，那么就可以优先通过。', ' 减速即可，不用停车。', ' 绕路行驶，避开该路口。', 1, 's7_1'),
(6, '你在路上正常行驶，此时发现前方有位行人正在穿越车道，不过该行人并没有走人行横道。你该怎么办？', 4, ' 鸣笛，警告行人并继续行驶。', ' 从行人旁边小心驶过。', ' 变换车道，加速从行人前面通过。', ' 停车等待，让行人先过。', 4, 's7_1'),
(7, '什么情况下才应该系好安全带？', 4, ' 路面残破，车辆颠簸的时候。', ' 仅在所驾驶的车辆为5万美元以上的豪华车辆时。', ' 不论何时，只要车上有安全带就要系好它。', ' 仅在附近有警车巡逻的时候。', 3, 's8_2'),
(8, '什么情况下，你需要和大型卡车保持足够大的距离？', 4, ' 当发现有其它车辆想要切换车道时。', ' 当发现卡车即将停车时。', ' 当发现旁边车道的车辆想要超车时。', ' 当发现旁边车道的车辆想要停车时。', 2, 's7_2'),
(9, '雨天时路面湿滑，这种情况下驾驶者应该注意什么？', 4, ' 不时的鸣笛提醒路旁的行人小心。', ' 尽量不要急转弯和急剎车。', ' 注意更换老旧的轮胎，避免抓地力不够。', ' 不要和前车保持太远的距离。', 2, 's8_1'),
(10, '下列哪种情况容易引发车祸？', 4, ' 路上的车辆都以相近的速度行驶。', ' 快车道上的车辆车速较快。', ' 个别车辆的速度太快或太慢。', ' 车流中有多辆大型卡车。', 3, 's6_1'),
(11, '你的车最初停靠在路旁，如果想要开车离开，你应该注意什么？', 4, ' 启动后的最初200米时不要开的太快。', ' 寻找合适的时机和空间，以便自己可以用合适的速度汇入车流。', ' 一定要鸣笛，以提醒其它车辆注意。', ' 将手伸出车窗挥动，以提醒其它车辆注意。', 2, 's6_1'),
(12, '如果你在超车后想要回到原来的车道，如何判定切换车道的操作是安全的？', 4, ' 观察侧镜，如果在镜中看不到被超越的车辆时就表明安全了。', ' 观察后视镜，如果在镜中可以完整看到被超越的车辆的两盏前灯时就表明安全了。', ' 只要在切换车道时打出转向灯就是安全的。', ' 只要在切换车道时加速就是安全的。', 2, 's6_1'),
(13, '下列何种情况下，你应该关闭你的远光灯或减弱你的车头灯：', 4, ' 你跟在一辆车的后面，且与其相距不超过300 feet（约91m）', ' 一辆车跟在你的后面，且与你的车辆相距不超过300 feet（约91m）', ' 你旁边的车道上有其它车辆时。', ' 在市区内的公路上行驶时。', 1, 's6_1'),
(14, '什么情况下你才可以在住宅区的车道上调头？', 4, ' 任何时候都不能在住宅区调头。', ' 只能在单行道上调头。', ' 只要附近没有其它车辆时就可以调头', ' 只能在路面上画有两条黄色实线时才可以调头。', 3, 's6_1'),
(15, '什么情况下你才需要同意接受血液内的酒精含量测试？', 4, ' 当你确实喝过酒时。', ' 任何时候，只要你身在加州境内。', ' 在你卷入交通事故当中时。', ' 夜间遇到警察路口设卡检查时。', 2, 's9'),
(16, '在光线昏暗的路段驾驶时应该注意什么？', 4, ' 打开紧急停车灯，以便其他司机能看到你。', ' 降低车速，这样才能确保在车灯照明的范围内及时停车。', ' 开启远光灯以便看清前方的路况。', ' 打开车内的照明灯，以便其他司机能看到你。', 2, 's8_1'),
(17, '如何为紧急车辆让路？', 4, ' 尽可能将车靠近道路的右侧并停车。', ' 加速前进，在最近的路口转弯离开当前车道。', ' 立即原地停车。', ' 立即减速，直到紧急车辆通过。', 1, 's7_2'),
(18, '在转弯时为什么要格外小心摩托车？', 4, ' 因为它们速度太快。', ' 因为它们享有优先转弯的特权。', ' 因为它们体积小且难以发现。', ' 因为它们经常切换车道。', 3, 's6_1');

-- --------------------------------------------------------

--
-- Table structure for table `tests_contain_questions`
--

CREATE TABLE `tests_contain_questions` (
  `test_id` int(4) NOT NULL,
  `question_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tests_contain_questions`
--

INSERT INTO `tests_contain_questions` (`test_id`, `question_id`) VALUES
(4, 2),
(4, 12),
(5, 11),
(5, 9),
(7, 5),
(8, 5),
(9, 5),
(10, 5),
(11, 16),
(11, 1),
(12, 16),
(12, 1),
(13, 12),
(13, 15),
(14, 12),
(14, 15),
(15, 12),
(15, 15),
(16, 5),
(16, 10),
(19, 14),
(19, 5),
(20, 14),
(20, 5),
(21, 1),
(21, 10),
(22, 1),
(22, 10),
(23, 1),
(23, 10),
(24, 1),
(24, 10),
(25, 1),
(25, 10),
(26, 1),
(26, 10),
(47, 6),
(47, 2),
(48, 8),
(49, 15),
(49, 2),
(50, 2),
(50, 5),
(51, 11),
(51, 2),
(52, 11),
(52, 7),
(53, 11),
(53, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_email` varchar(30) NOT NULL,
  `hashed_password` char(64) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_email`, `hashed_password`, `is_admin`) VALUES
('Anonymous', NULL, 0),
('haitao.long@sjsu.edu', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1),
('longhaitao', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_practice_wrong_questions`
--

CREATE TABLE `users_practice_wrong_questions` (
  `user_email` varchar(30) NOT NULL,
  `question_id` int(4) NOT NULL,
  `wrong_answer` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_practice_wrong_questions`
--

INSERT INTO `users_practice_wrong_questions` (`user_email`, `question_id`, `wrong_answer`) VALUES
('haitao.long@sjsu.edu', 7, 1),
('haitao.long@sjsu.edu', 11, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `page_id` (`page_id`),
  ADD KEY `user_email` (`user_email`);

--
-- Indexes for table `mock_tests`
--
ALTER TABLE `mock_tests`
  ADD PRIMARY KEY (`test_id`),
  ADD KEY `mock_tests_ibfk_1` (`user_email`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `questions_ibfk_1` (`page_id`);

--
-- Indexes for table `tests_contain_questions`
--
ALTER TABLE `tests_contain_questions`
  ADD KEY `test_id` (`test_id`),
  ADD KEY `tests_contain_questions_ibfk_1` (`question_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_email`);

--
-- Indexes for table `users_practice_wrong_questions`
--
ALTER TABLE `users_practice_wrong_questions`
  ADD UNIQUE KEY `user_email_2` (`user_email`,`question_id`),
  ADD KEY `question_ID` (`question_id`),
  ADD KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `mock_tests`
--
ALTER TABLE `mock_tests`
  MODIFY `test_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`page_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_email`) REFERENCES `users` (`user_email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mock_tests`
--
ALTER TABLE `mock_tests`
  ADD CONSTRAINT `mock_tests_ibfk_1` FOREIGN KEY (`user_email`) REFERENCES `users` (`user_email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`page_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tests_contain_questions`
--
ALTER TABLE `tests_contain_questions`
  ADD CONSTRAINT `tests_contain_questions_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tests_contain_questions_ibfk_2` FOREIGN KEY (`test_id`) REFERENCES `mock_tests` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_practice_wrong_questions`
--
ALTER TABLE `users_practice_wrong_questions`
  ADD CONSTRAINT `users_practice_wrong_questions_ibfk_2` FOREIGN KEY (`user_email`) REFERENCES `users` (`user_email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_practice_wrong_questions_ibfk_3` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
