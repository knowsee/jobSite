-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2024-11-06 15:36:11
-- 服务器版本： 10.11.4-MariaDB-log
-- PHP 版本： 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `job`
--

-- --------------------------------------------------------

--
-- 表的结构 `applyjob`
--

CREATE TABLE `applyjob` (
  `appId` int(10) UNSIGNED NOT NULL,
  `appType` varchar(12) NOT NULL DEFAULT 'seeker',
  `companyId` int(10) UNSIGNED NOT NULL,
  `companyName` varchar(200) NOT NULL,
  `jobId` int(10) UNSIGNED NOT NULL,
  `jobName` varchar(200) NOT NULL,
  `userId` int(10) UNSIGNED NOT NULL,
  `applyTime` int(10) UNSIGNED NOT NULL,
  `applyStatus` int(1) UNSIGNED NOT NULL DEFAULT 0,
  `applyInterviewTime` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `evaluateMessage` mediumtext DEFAULT NULL,
  `evaluateOntime` int(1) UNSIGNED DEFAULT 0,
  `employeeMessage` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- 转存表中的数据 `applyjob`
--

INSERT INTO `applyjob` (`appId`, `appType`, `companyId`, `companyName`, `jobId`, `jobName`, `userId`, `applyTime`, `applyStatus`, `applyInterviewTime`, `evaluateMessage`, `evaluateOntime`, `employeeMessage`) VALUES
(25, 'seeker', 3, 'PCCW Solutions Limited', 4, 'Database Administrator', 11, 1527829804, 0, 0, NULL, 0, NULL),
(26, 'seeker', 3, 'PCCW Solutions Limited', 5, 'Project Operation Assistant (e-Commerce)', 11, 1527831890, 2, 1527868800, NULL, 0, NULL),
(27, 'seeker', 1, 'Mtel Ltd', 1, 'Analyst Programmer/Programmer (Java)', 11, 1527834313, 0, 0, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `catetory`
--

CREATE TABLE `catetory` (
  `cid` int(10) UNSIGNED NOT NULL,
  `jobNum` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `cateName` varchar(120) NOT NULL,
  `cateIcon` varchar(20) DEFAULT NULL,
  `cateIndex` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- 转存表中的数据 `catetory`
--

INSERT INTO `catetory` (`cid`, `jobNum`, `cateName`, `cateIcon`, `cateIndex`) VALUES
(1, 2, 'Engineer', 'home', 0),
(2, 1, 'IT Support', 'desktop', 0),
(3, 1, 'Database Administrator', 'book', 0),
(4, 2, 'Network Engineer', 'world', 0),
(5, 0, 'Admin & HR', 'user', 0),
(7, 0, 'Accounting', 'money', 0),
(8, 1, 'Sales, CS & Business Devpt', 'headphone-alt', 0),
(9, 0, 'Marketing / Public Relations', 'user', 0),
(10, 0, 'Education', 'blackboard', 0),
(11, 0, 'Insurance', 'wheelchair', 0),
(12, 0, 'Engineering', 'write', 0),
(13, 0, 'Design', 'ruler-pencil', 0);

-- --------------------------------------------------------

--
-- 表的结构 `catetorycompany`
--

CREATE TABLE `catetorycompany` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- 转存表中的数据 `catetorycompany`
--

INSERT INTO `catetorycompany` (`id`, `name`) VALUES
(1, 'Computer'),
(2, 'Education'),
(3, 'Film making'),
(4, 'Insurance'),
(5, 'Legal'),
(6, 'News Agencies'),
(7, 'Technical / Analysis'),
(8, 'Social Work'),
(10, 'Banking / Finance'),
(11, 'Accounting / Audit / Tax Services'),
(12, 'Sales, CS & Business Devpt'),
(13, 'Travel');

-- --------------------------------------------------------

--
-- 表的结构 `companydetail`
--

CREATE TABLE `companydetail` (
  `cid` int(10) UNSIGNED NOT NULL COMMENT 'auto id',
  `userId` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `logo` varchar(300) NOT NULL,
  `type` int(10) UNSIGNED NOT NULL,
  `people` int(10) UNSIGNED NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `identification` int(1) UNSIGNED NOT NULL DEFAULT 0,
  `identificationImg` varchar(200) DEFAULT NULL,
  `website` varchar(300) DEFAULT NULL,
  `userLike` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `location` int(10) UNSIGNED NOT NULL,
  `address` varchar(300) DEFAULT NULL,
  `createtime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- 转存表中的数据 `companydetail`
--

INSERT INTO `companydetail` (`cid`, `userId`, `title`, `logo`, `type`, `people`, `description`, `identification`, `identificationImg`, `website`, `userLike`, `location`, `address`, `createtime`) VALUES
(1, 12, 'Mtel Ltd', '0675ee6c52825fdf0f6519bfad2fd942.jpg', 1, 2, '<p>Mtel is one of the leading digital solution provider in Hong Kong and nearby regions, headquartered in Hong Kong, with branch offices in Macau, Guangzhou and Taipei. With over hundred talents, providing myriad services, including design and development of mobile, web, and social applications, campaigns, digital installations, and cloud platform. We serve leading corporations in myriad industries, including retail, finance, insurance, telecommunications, advertising, and public utilities.</p>', 1, NULL, 'https://www.mtelnet.com', 5, 4, 'Kwun Tong', '2018-03-21 06:45:17'),
(2, 17, 'MTR Hong Kong', '24a43dd2a6d5a83cbbb8d3ff441bea93.png', 12, 4, '<p>A main Hong Kong Railway Company</p>', 1, NULL, 'www.mtr.com.hk', 1, 4, 'Kowloon Bay', '2018-06-01 04:01:42'),
(3, 18, 'PCCW Solutions Limited', 'd7bf517fac3cc7e411124eb9af6afac8.gif', 7, 4, '<p>PCCW Solutions is the IT and business process outsourcing solutions flagship of PCCW Limited, which also holds interests in telecommunications, media, &nbsp;property development and investment, and other businesses.&nbsp;</p><p>Responsible for a growing number of large-scale IT projects in the public and private sectors, PCCW Solutions holds a wealth of experience and expertise and is viewed as a major industry player in Greater China. To learn more about PCCW Solutions, please visit <a href=\"http://www.pccwsolutions.com/\" rel=\"noopener noreferrer\" target=\"_blank\">www.pccwsolutions.com</a></p>', 1, NULL, 'www.pccwsolutions.com', 0, 2, 'Level 2, The Long Beach Commercial Podium, 8 Hoi Fai Road, Kowloon', '2018-06-01 04:42:45'),
(4, 19, '', '', 0, 0, NULL, 0, NULL, NULL, 0, 0, NULL, '2018-06-01 05:53:02');

-- --------------------------------------------------------

--
-- 表的结构 `jobdetail`
--

CREATE TABLE `jobdetail` (
  `jobId` int(10) UNSIGNED NOT NULL COMMENT 'auto id',
  `jobTitle` varchar(180) NOT NULL COMMENT 'Job title',
  `jobType` int(10) UNSIGNED NOT NULL COMMENT 'Category',
  `jobLocation` int(10) UNSIGNED NOT NULL COMMENT 'Location',
  `jobAward` int(10) UNSIGNED NOT NULL COMMENT 'Award',
  `jobProfessor` int(10) UNSIGNED NOT NULL COMMENT 'Professor',
  `jobTags` mediumtext NOT NULL COMMENT 'Tags',
  `jobDescription` mediumtext NOT NULL COMMENT 'Description',
  `endDay` int(10) UNSIGNED NOT NULL COMMENT 'Job close day',
  `salary` varchar(100) NOT NULL COMMENT 'Job salary',
  `experience` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Job experience',
  `createtime` date NOT NULL,
  `companyId` int(10) UNSIGNED NOT NULL COMMENT 'publisher id',
  `view` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `apply` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- 转存表中的数据 `jobdetail`
--

INSERT INTO `jobdetail` (`jobId`, `jobTitle`, `jobType`, `jobLocation`, `jobAward`, `jobProfessor`, `jobTags`, `jobDescription`, `endDay`, `salary`, `experience`, `createtime`, `companyId`, `view`, `apply`) VALUES
(1, 'Analyst Programmer/Programmer (Java)', 1, 4, 3, 2, 'Java,Programmer,ux', '<p><strong>Responsibilities:</strong></p><ul><li>Develop web-based/API-based applications with Java and web technologies</li><li>Collaborate with project managers, UX designers, mobile app developers and quality assurance to deliver projects for clients in various industries</li></ul><p><strong>Requirements:</strong></p><ul><li>Degree / Higher Diploma in Computer Science, Information Technology&nbsp;or related disciplines</li><li>Strongly interested in software development</li><li>Strong sense of responsibility and eager to learn</li><li>Good team player</li><li>Fresh graduates are welcome</li></ul>', 1524153600, '3', 1, '2018-03-21', 1, 196, 23),
(2, 'Assistant Project Manager/Senior Project Executive', 4, 4, 3, 2, 'Project,Manager,PMP', '<p><strong>Responsibilities:</strong></p><ul><li>Responsible for day-to-day project management and serve as key personbetween client, multi-function teams and internal work counterparts</li><li>Presentable and posses good communication skills</li><li>Provide consultation and recommendations for the customers in differentdigital solutions</li><li>Must be detail-minded, efficient and able to work under pressure</li><li>Responsibilities include briefing, project management, time and cost&nbsp;control, market landscape analysis and understanding of client&rsquo;s business&nbsp;and needs</li><li>Good team player who is at ease in a multi-cultural environment</li></ul><p><br><strong>Requirements:</strong></p><ul><li>Degree holder, preferably in IT or&nbsp;related discipline</li><li>A minimum of 2-3 years experience of account servicing / project management&nbsp;(Less experience will be considered as Project Executive)</li><li>Experience in digital agency / consulting company will be an advantage</li><li>Holder of Project Management Professional (PMP) will be an advantage</li><li>Strong analytical, time management and people skills</li><li>Fluent written and spoken English and Chinese is a must</li></ul>', 1524153600, '4', 1, '2018-03-21', 1, 296, 2),
(3, 'Train Captain (列車車長)', 8, 2, 2, 1, 'MTR,Train', '<p>You will perform pre-service check to ensure the system and equipment to function properly before operating the train on running line.&nbsp;</p><p>You will operate a passenger train (heavy rail or light rail) or an engineering train in accordance with timetables or special schedules in conformance to rules and procedures.&nbsp;</p><p>You will also perform the role of Train-In-Charge and coordinate with the Operations Control Centre to handle train defects or incidents to ensure safe and efficient train operations and provide high quality customer service.&nbsp;</p><p>You are required to perform shift duties on irregular patterns of hours.</p>', 1530374400, '4', 1, '2018-06-01', 2, 251, 0),
(4, 'Database Administrator', 3, 2, 5, 1, 'DBA,database', '<ul><li>Responsible for providing technical support for Oracle / MSSQL / DB2 / MySQL databases</li><li>Work on database design, installation, configuration, performance tuning and on-going maintenance</li><li><strong>Perform night emergency call support when necessary</strong></li><li>Bachelor&rsquo;s Degree in Information Technology, Engineering or related disciplines</li><li>2 - 4 years&rsquo; experience in Oracle / MSSQL / DB2 / MySQL database administration</li><li>Holder of OCA / OCP / IBM DB2 certification is preferred</li><li>Hands-on experience in database installation, backup &amp; recovery and performance monitoring &amp; tuning</li><li>Knowledge of database HA / DR solutions (RAC / Dataguard / HADR) or system administration and backup tools administration (IBM Tivoli Storage Manager, Symantec Netbackup, etc) &nbsp;is an advantage</li><li>A good team player with analytical &amp; problem-solving skills, self-motivation and good interpersonal skills</li><li>Good command of spoken and written English and Chinese</li><li><strong>Candidates with less experience will also be considered</strong>&nbsp;</li></ul>', 1530374400, '4', 2, '2018-06-01', 3, 225, 1),
(5, 'Project Operation Assistant (e-Commerce)', 2, 5, 5, 2, 'Marketing', '<ul><li><br>Assist in daily online orders processing (e.g. prepare order list, check payment, prepare refund documents, etc.)</li><li>Liaise with various counterparties like e-business development, operation and warehouse teams on information flow, business process and organizational planning</li><li>Assist merchandising team&rsquo;s operation on e-Commerce project</li><li>Perform administration duties and ensure smooth execution of sales and promotional activities&nbsp;</li><li>Perform other ad hoc duties when necessary</li></ul>', 1530374400, '3', 1, '2018-06-01', 3, 336, 1),
(6, 'Network engineer', 4, 3, 5, 1, 'networking', '<p>testing</p>', 1530374400, '3', 1, '2018-06-01', 3, 119, 0),
(7, 'Programmer', 1, 3, 2, 1, 'programming', '<p>programming C</p>', 1530374400, '3', 1, '2018-06-01', 4, 160, 0);

-- --------------------------------------------------------

--
-- 表的结构 `jobdetail_search`
--

CREATE TABLE `jobdetail_search` (
  `cacheId` int(10) UNSIGNED NOT NULL,
  `jobId` int(10) UNSIGNED NOT NULL,
  `cacheVal` mediumtext DEFAULT NULL,
  `cacheTime` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- 表的结构 `jobdetail_tag`
--

CREATE TABLE `jobdetail_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `jobId` int(10) UNSIGNED NOT NULL,
  `type` varchar(60) NOT NULL,
  `value` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- 转存表中的数据 `jobdetail_tag`
--

INSERT INTO `jobdetail_tag` (`id`, `jobId`, `type`, `value`) VALUES
(1, 1, 'info', '有色士風'),
(2, 1, 'info', '單簧管'),
(3, 1, 'info', '笛子'),
(4, 1, 'info', '小號'),
(5, 1, 'info', '長號'),
(6, 1, 'info', '法國號'),
(33, 3, 'info', 'php'),
(34, 3, 'info', 'mysql'),
(41, 2, 'info', '有色士風'),
(42, 2, 'info', '單簧管'),
(43, 2, 'info', '笛子'),
(44, 2, 'info', '小號'),
(45, 2, 'info', '長號'),
(46, 2, 'info', '法國號'),
(47, 1, 'info', 'Java'),
(48, 1, 'info', 'Programmer'),
(49, 1, 'info', 'ux'),
(50, 2, 'info', 'Project'),
(51, 2, 'info', 'Manager'),
(52, 2, 'info', 'PMP'),
(53, 3, 'info', 'MTR'),
(54, 3, 'info', 'Train'),
(55, 4, 'info', 'DBA'),
(56, 4, 'info', 'database'),
(57, 5, 'info', 'Marketing'),
(58, 6, 'info', 'networking'),
(59, 7, 'info', 'programming');

-- --------------------------------------------------------

--
-- 表的结构 `resumedetail`
--

CREATE TABLE `resumedetail` (
  `rid` int(10) UNSIGNED NOT NULL,
  `userId` int(10) UNSIGNED NOT NULL,
  `realName` varchar(80) NOT NULL,
  `birthday` int(10) UNSIGNED NOT NULL,
  `salary` int(10) UNSIGNED NOT NULL,
  `award` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `jobTitle` varchar(120) NOT NULL,
  `jobLocation` int(10) UNSIGNED NOT NULL,
  `jobProfessor` int(10) UNSIGNED NOT NULL,
  `jobCategory` int(10) UNSIGNED NOT NULL,
  `jobExperience` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `coverFile` varchar(200) NOT NULL,
  `skillJson` mediumtext DEFAULT NULL,
  `resumeJson` mediumtext DEFAULT NULL,
  `createTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateTime` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- 转存表中的数据 `resumedetail`
--

INSERT INTO `resumedetail` (`rid`, `userId`, `realName`, `birthday`, `salary`, `award`, `email`, `phone`, `jobTitle`, `jobLocation`, `jobProfessor`, `jobCategory`, `jobExperience`, `coverFile`, `skillJson`, `resumeJson`, `createTime`, `updateTime`) VALUES
(4, 11, 'Chris WONG', 825609600, 3, 3, 'job@outlook.com', '97777777', '', 4, 2, 4, 1, '', '{\"1\":{\"name\":\"project\",\"value\":\"2\"},\"2\":{\"name\":\"CCNA\",\"value\":\"2\"},\"3\":{\"name\":\"HTML\",\"value\":\"3\"},\"4\":{\"name\":\"PMP\",\"value\":\"2\"}}', '{\"edu\":[{\"award\":\"3\",\"fieldname\":\"Programmer\",\"school\":\"The University of Hong Kong (HKU)\",\"from\":\"2012\",\"end\":\"2015\"}],\"wd\":[{\"type\":\"All Categories\",\"company\":\"Oursky Ltd.\",\"from\":2014,\"end\":2018,\"desc\":\"<ul><li>Responsible for day-to-day project management and serve as key personbetween client, multi-function teams and internal work counterparts<\\/li><li>Presentable and posses good communication skills<\\/li><li>Provide consultation and recommendations for the customers in differentdigital solutions<\\/li><li>Must be detail-minded, efficient and able to work under pressure<\\/li><li>Responsibilities include briefing, project management, time and cost&nbsp;control, market landscape analysis and understanding of client\\u2019s business&nbsp;and needs<\\/li><li>Good team player who is at ease in a multi-cultural environment<\\/li><\\/ul>\"}]}', '2018-03-20 01:35:04', 1527829784),
(5, 16, '', 0, 0, 0, '', '', '', 0, 0, 0, 0, '', NULL, NULL, '2018-05-21 17:16:39', 0),
(6, 20, '', 0, 0, 0, '', '', '', 0, 0, 0, 0, '', NULL, NULL, '2019-09-10 08:19:16', 0);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `userId` int(10) NOT NULL,
  `userName` varchar(120) NOT NULL,
  `userEmail` varchar(200) DEFAULT NULL,
  `userType` int(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1: appt; 2: interview',
  `companyId` int(10) UNSIGNED NOT NULL,
  `userPassword` char(32) DEFAULT NULL,
  `userClientToken` varchar(300) DEFAULT NULL,
  `userRegTime` timestamp NULL DEFAULT current_timestamp(),
  `isAdmin` int(1) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`userId`, `userName`, `userEmail`, `userType`, `companyId`, `userPassword`, `userClientToken`, `userRegTime`, `isAdmin`) VALUES
(1, 'Mytag', 'admin@job.com', 1, 0, 'c299e4920cc1c5cf0ad330c230775498', NULL, '2017-10-09 16:00:00', 0),
(3, 'mmmmmmmmm', 'mm@job.com', 1, 0, '9d11762aa19cb7e761b5b26c9b9542e0', NULL, '2018-02-05 03:05:00', 0),
(4, 'HSBC_HONGKONG', 'hsbc@job.com', 1, 0, '9d11762aa19cb7e761b5b26c9b9542e0', NULL, '2018-02-05 03:05:32', 0),
(5, 'xxxtest', 'magic@qq.com', 1, 0, '9d11762aa19cb7e761b5b26c9b9542e0', NULL, '2018-02-05 05:20:22', 0),
(6, 'chankc', 'ckc@ckc.im', 1, 0, '149cac90bcaadd8dd167c2ba9503a17c', NULL, '2018-02-06 07:38:16', 0),
(7, 'company', 'company@outlook.com', 2, 6, '9d11762aa19cb7e761b5b26c9b9542e0', NULL, '2018-02-11 06:59:47', 0),
(8, 'company2010', 'company2010@outlook.com', 2, 0, '9d11762aa19cb7e761b5b26c9b9542e0', NULL, '2018-02-11 07:01:18', 0),
(9, 'company2012', 'company2012@outlook.com', 2, 6, '25d55ad283aa400af464c76d713c07ad', NULL, '2018-02-11 07:01:43', 0),
(11, 'demouser', 'ks2012@qq.com', 1, 0, '91017d590a69dc49807671a51f10ab7f', 'channel-92b0f6dd-b018-430e-f7a7-dd4ad5ee5567', '2018-03-20 01:35:04', 1),
(12, 'democompany', 'democompany@democompany.com', 2, 1, '4233fa127a2d7faaa971456c984b114e', 'channel-016b4799-0f66-4b25-1ac8-c7f4a9e8f2c4', '2018-03-21 06:45:17', 0),
(15, 'demoadmin', 'demoadmin@demoadmin.com', 1, 0, '61152c80d1514e22fba66002597d0104', NULL, '2018-04-01 04:47:58', 1),
(16, 'magiclook', '328905418@qq.com', 1, 0, 'd2883cc21428e523fff0e72f8c0fc7b6', 'channel-2af1fec3-487f-4fec-c277-bc302c4ed73e', '2018-05-21 17:16:39', 0),
(17, 'mtrhk', 'hr@mtr.com.hk', 2, 2, '25d55ad283aa400af464c76d713c07ad', 'channel-fc418c12-5c1d-4e4c-ede8-638bc432a0f6', '2018-06-01 04:01:42', 0),
(18, 'pccws', 'hr@pccw.com', 2, 3, '4233fa127a2d7faaa971456c984b114e', 'channel-fc418c12-5c1d-4e4c-ede8-638bc432a0f6', '2018-06-01 04:42:45', 0),
(19, 'demo06', 'demo@test.com', 2, 4, '8149907d30440d77bc85377fb223cb85', 'channel-fc418c12-5c1d-4e4c-ede8-638bc432a0f6', '2018-06-01 05:53:02', 0),
(20, 'tengyuanye', '123213@121.com', 1, 0, '25d55ad283aa400af464c76d713c07ad', 'channel-89e672b7-a86f-4159-5bcf-04194c7e51b9', '2019-09-10 08:19:16', 0);

-- --------------------------------------------------------

--
-- 表的结构 `user_recommoned`
--

CREATE TABLE `user_recommoned` (
  `id` int(10) UNSIGNED NOT NULL,
  `userId` int(10) UNSIGNED NOT NULL,
  `companyId` int(10) UNSIGNED NOT NULL,
  `jobId` int(10) UNSIGNED NOT NULL,
  `status` int(1) UNSIGNED NOT NULL DEFAULT 0,
  `createTime` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- 转储表的索引
--

--
-- 表的索引 `applyjob`
--
ALTER TABLE `applyjob`
  ADD PRIMARY KEY (`appId`),
  ADD KEY `companyId` (`companyId`),
  ADD KEY `jobId` (`jobId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `appType` (`appType`);

--
-- 表的索引 `catetory`
--
ALTER TABLE `catetory`
  ADD PRIMARY KEY (`cid`);

--
-- 表的索引 `catetorycompany`
--
ALTER TABLE `catetorycompany`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `companydetail`
--
ALTER TABLE `companydetail`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `location` (`location`),
  ADD KEY `people` (`people`),
  ADD KEY `type` (`type`),
  ADD KEY `userId` (`userId`),
  ADD KEY `identification` (`identification`);

--
-- 表的索引 `jobdetail`
--
ALTER TABLE `jobdetail`
  ADD PRIMARY KEY (`jobId`),
  ADD KEY `jobType` (`jobType`),
  ADD KEY `endDay` (`endDay`),
  ADD KEY `experience` (`experience`),
  ADD KEY `salary` (`salary`),
  ADD KEY `jobAward` (`jobAward`),
  ADD KEY `jobProfessor` (`jobProfessor`),
  ADD KEY `jobLocation` (`jobLocation`),
  ADD KEY `companyId` (`companyId`);

--
-- 表的索引 `jobdetail_search`
--
ALTER TABLE `jobdetail_search`
  ADD PRIMARY KEY (`cacheId`),
  ADD KEY `jobId` (`jobId`),
  ADD KEY `cacheTime` (`cacheTime`);

--
-- 表的索引 `jobdetail_tag`
--
ALTER TABLE `jobdetail_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`),
  ADD KEY `value` (`value`);

--
-- 表的索引 `resumedetail`
--
ALTER TABLE `resumedetail`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `userId` (`userId`),
  ADD KEY `jobLocation` (`jobLocation`),
  ADD KEY `jobProfessor` (`jobProfessor`),
  ADD KEY `jobCategory` (`jobCategory`),
  ADD KEY `award` (`award`),
  ADD KEY `salary` (`salary`),
  ADD KEY `jobExperience` (`jobExperience`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`),
  ADD KEY `userEmail` (`userEmail`),
  ADD KEY `isAdmin` (`isAdmin`);

--
-- 表的索引 `user_recommoned`
--
ALTER TABLE `user_recommoned`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `userId` (`userId`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `applyjob`
--
ALTER TABLE `applyjob`
  MODIFY `appId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- 使用表AUTO_INCREMENT `catetory`
--
ALTER TABLE `catetory`
  MODIFY `cid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用表AUTO_INCREMENT `catetorycompany`
--
ALTER TABLE `catetorycompany`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用表AUTO_INCREMENT `companydetail`
--
ALTER TABLE `companydetail`
  MODIFY `cid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'auto id', AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `jobdetail`
--
ALTER TABLE `jobdetail`
  MODIFY `jobId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'auto id', AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `jobdetail_search`
--
ALTER TABLE `jobdetail_search`
  MODIFY `cacheId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `jobdetail_tag`
--
ALTER TABLE `jobdetail_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- 使用表AUTO_INCREMENT `resumedetail`
--
ALTER TABLE `resumedetail`
  MODIFY `rid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- 使用表AUTO_INCREMENT `user_recommoned`
--
ALTER TABLE `user_recommoned`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
