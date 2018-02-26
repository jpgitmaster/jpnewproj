-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2018 at 11:58 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jpnewproj`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_type`
--

CREATE TABLE `activity_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `color` varchar(10) NOT NULL,
  `textColor` varchar(10) NOT NULL,
  `description` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_type`
--

INSERT INTO `activity_type` (`id`, `name`, `color`, `textColor`, `description`) VALUES
(1, 'Reserved', '#0091ff', '#ffffff', 'Lorem ipsum reserved');

-- --------------------------------------------------------

--
-- Table structure for table `avatars`
--

CREATE TABLE `avatars` (
  `id` int(11) NOT NULL,
  `genid` varchar(20) NOT NULL,
  `imgname` varchar(50) NOT NULL,
  `imgext` varchar(10) NOT NULL,
  `imgfolder` varchar(100) NOT NULL,
  `imgadded` datetime DEFAULT NULL,
  `imgchanged` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `avatars`
--

INSERT INTO `avatars` (`id`, `genid`, `imgname`, `imgext`, `imgfolder`, `imgadded`, `imgchanged`) VALUES
(1, 'ilxaCixvdx1BuUBFR4cD', 'ilxaCixvdx1BuUBFR4cD022318.png', 'png', 'avatars', '2018-02-23 13:48:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `calendar_schedules`
--

CREATE TABLE `calendar_schedules` (
  `genid` varchar(20) NOT NULL,
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `textColor` varchar(7) NOT NULL,
  `color` varchar(7) NOT NULL,
  `activity_type` int(1) NOT NULL,
  `room_type` int(1) NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar_schedules`
--

INSERT INTO `calendar_schedules` (`genid`, `id`, `title`, `start`, `end`, `textColor`, `color`, `activity_type`, `room_type`, `reason`) VALUES
('fLh8HFEGtppZ8WZFeY6q', 1, 'First Activity', '2018-02-01', '2018-02-03', '#ffffff', '#0091ff', 1, 2, 'First activity of the year');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country` varchar(52) DEFAULT NULL,
  `nationality` varchar(39) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`, `nationality`) VALUES
(1, 'Afghanistan', 'Afghan'),
(2, 'Albania', 'Albanian'),
(3, 'Antarctica', 'Antarctic'),
(4, 'Algeria', 'Algerian'),
(5, 'American Samoa', 'American Samoan'),
(6, 'Andorra', 'Andorran'),
(7, 'Angola', 'Angolan'),
(8, 'Antigua and Barbuda', 'Antiguan or Barbudan'),
(9, 'Azerbaijan', 'Azerbaijani, Azeri'),
(10, 'Argentina', 'Argentine'),
(11, 'Australia', 'Australian'),
(12, 'Austria', 'Austrian'),
(13, 'Bahamas', 'Bahamian'),
(14, 'Bahrain', 'Bahraini'),
(15, 'Bangladesh', 'Bangladeshi'),
(16, 'Armenia', 'Armenian'),
(17, 'Barbados', 'Barbadian'),
(18, 'Belgium', 'Belgian'),
(19, 'Bermuda', 'Bermudian, Bermudan'),
(20, 'Bhutan', 'Bhutanese'),
(21, 'Bolivia (Plurinational State of)', 'Bolivian'),
(22, 'Bosnia and Herzegovina', 'Bosnian or Herzegovinian'),
(23, 'Botswana', 'Motswana, Botswanan'),
(24, 'Bouvet Island', 'Bouvet Island'),
(25, 'Brazil', 'Brazilian'),
(26, 'Belize', 'Belizean'),
(27, 'British Indian Ocean Territory', 'BIOT'),
(28, 'Solomon Islands', 'Solomon Island'),
(29, 'Virgin Islands (British)', 'British Virgin Island'),
(30, 'Brunei Darussalam', 'Bruneian'),
(31, 'Bulgaria', 'Bulgarian'),
(32, 'Myanmar', 'Burmese'),
(33, 'Burundi', 'Burundian'),
(34, 'Belarus', 'Belarusian'),
(35, 'Cambodia', 'Cambodian'),
(36, 'Cameroon', 'Cameroonian'),
(37, 'Canada', 'Canadian'),
(38, 'Cabo Verde', 'Cabo Verdean'),
(39, 'Cayman Islands', 'Caymanian'),
(40, 'Central African Republic', 'Central African'),
(41, 'Sri Lanka', 'Sri Lankan'),
(42, 'Chad', 'Chadian'),
(43, 'Chile', 'Chilean'),
(44, 'China', 'Chinese'),
(45, 'Taiwan, Province of China', 'Chinese, Taiwanese'),
(46, 'Christmas Island', 'Christmas Island'),
(47, 'Cocos (Keeling) Islands', 'Cocos Island'),
(48, 'Colombia', 'Colombian'),
(49, 'Comoros', 'Comoran, Comorian'),
(50, 'Mayotte', 'Mahoran'),
(51, 'Congo (Republic of the)', 'Congolese'),
(52, 'Congo (Democratic Republic of the)', 'Congolese'),
(53, 'Cook Islands', 'Cook Island'),
(54, 'Costa Rica', 'Costa Rican'),
(55, 'Croatia', 'Croatian'),
(56, 'Cuba', 'Cuban'),
(57, 'Cyprus', 'Cypriot'),
(58, 'Czech Republic', 'Czech'),
(59, 'Benin', 'Beninese, Beninois'),
(60, 'Denmark', 'Danish'),
(61, 'Dominica', 'Dominican'),
(62, 'Dominican Republic', 'Dominican'),
(63, 'Ecuador', 'Ecuadorian'),
(64, 'El Salvador', 'Salvadoran'),
(65, 'Equatorial Guinea', 'Equatorial Guinean, Equatoguinean'),
(66, 'Ethiopia', 'Ethiopian'),
(67, 'Eritrea', 'Eritrean'),
(68, 'Estonia', 'Estonian'),
(69, 'Faroe Islands', 'Faroese'),
(70, 'Falkland Islands (Malvinas)', 'Falkland Island'),
(71, 'South Georgia and the South Sandwich Islands', 'South Georgia or South Sandwich Islands'),
(72, 'Fiji', 'Fijian'),
(73, 'Finland', 'Finnish'),
(74, 'Åland Islands', 'Åland Island'),
(75, 'France', 'French'),
(76, 'French Guiana', 'French Guianese'),
(77, 'French Polynesia', 'French Polynesian'),
(78, 'French Southern Territories', 'French Southern Territories'),
(79, 'Djibouti', 'Djiboutian'),
(80, 'Gabon', 'Gabonese'),
(81, 'Georgia', 'Georgian'),
(82, 'Gambia', 'Gambian'),
(83, 'Palestine, State of', 'Palestinian'),
(84, 'Germany', 'German'),
(85, 'Ghana', 'Ghanaian'),
(86, 'Gibraltar', 'Gibraltar'),
(87, 'Kiribati', 'I-Kiribati'),
(88, 'Greece', 'Greek, Hellenic'),
(89, 'Greenland', 'Greenlandic'),
(90, 'Grenada', 'Grenadian'),
(91, 'Guadeloupe', 'Guadeloupe'),
(92, 'Guam', 'Guamanian, Guambat'),
(93, 'Guatemala', 'Guatemalan'),
(94, 'Guinea', 'Guinean'),
(95, 'Guyana', 'Guyanese'),
(96, 'Haiti', 'Haitian'),
(97, 'Heard Island and McDonald Islands', 'Heard Island or McDonald Islands'),
(98, 'Vatican City State', 'Vatican'),
(99, 'Honduras', 'Honduran'),
(100, 'Hong Kong', 'Hong Kong, Hong Kongese'),
(101, 'Hungary', 'Hungarian, Magyar'),
(102, 'Iceland', 'Icelandic'),
(103, 'India', 'Indian'),
(104, 'Indonesia', 'Indonesian'),
(105, 'Iran', 'Iranian, Persian'),
(106, 'Iraq', 'Iraqi'),
(107, 'Ireland', 'Irish'),
(108, 'Israel', 'Israeli'),
(109, 'Italy', 'Italian'),
(110, 'Côte d\'Ivoire', 'Ivorian'),
(111, 'Jamaica', 'Jamaican'),
(112, 'Japan', 'Japanese'),
(113, 'Kazakhstan', 'Kazakhstani, Kazakh'),
(114, 'Jordan', 'Jordanian'),
(115, 'Kenya', 'Kenyan'),
(116, 'Korea (Democratic People\'s Republic of)', 'North Korean'),
(117, 'Korea (Republic of)', 'South Korean'),
(118, 'Kuwait', 'Kuwaiti'),
(119, 'Kyrgyzstan', 'Kyrgyzstani, Kyrgyz, Kirgiz, Kirghiz'),
(120, 'Lao People\'s Democratic Republic', 'Lao, Laotian'),
(121, 'Lebanon', 'Lebanese'),
(122, 'Lesotho', 'Basotho'),
(123, 'Latvia', 'Latvian'),
(124, 'Liberia', 'Liberian'),
(125, 'Libya', 'Libyan'),
(126, 'Liechtenstein', 'Liechtenstein'),
(127, 'Lithuania', 'Lithuanian'),
(128, 'Luxembourg', 'Luxembourg, Luxembourgish'),
(129, 'Macao', 'Macanese, Chinese'),
(130, 'Madagascar', 'Malagasy'),
(131, 'Malawi', 'Malawian'),
(132, 'Malaysia', 'Malaysian'),
(133, 'Maldives', 'Maldivian'),
(134, 'Mali', 'Malian, Malinese'),
(135, 'Malta', 'Maltese'),
(136, 'Martinique', 'Martiniquais, Martinican'),
(137, 'Mauritania', 'Mauritanian'),
(138, 'Mauritius', 'Mauritian'),
(139, 'Mexico', 'Mexican'),
(140, 'Monaco', 'Monégasque, Monacan'),
(141, 'Mongolia', 'Mongolian'),
(142, 'Moldova (Republic of)', 'Moldovan'),
(143, 'Montenegro', 'Montenegrin'),
(144, 'Montserrat', 'Montserratian'),
(145, 'Morocco', 'Moroccan'),
(146, 'Mozambique', 'Mozambican'),
(147, 'Oman', 'Omani'),
(148, 'Namibia', 'Namibian'),
(149, 'Nauru', 'Nauruan'),
(150, 'Nepal', 'Nepali, Nepalese'),
(151, 'Netherlands', 'Dutch, Netherlandic'),
(152, 'Curaçao', 'Curaçaoan'),
(153, 'Aruba', 'Aruban'),
(154, 'Sint Maarten (Dutch part)', 'Sint Maarten'),
(155, 'Bonaire, Sint Eustatius and Saba', 'Bonaire'),
(156, 'New Caledonia', 'New Caledonian'),
(157, 'Vanuatu', 'Ni-Vanuatu, Vanuatuan'),
(158, 'New Zealand', 'New Zealand, NZ'),
(159, 'Nicaragua', 'Nicaraguan'),
(160, 'Niger', 'Nigerien'),
(161, 'Nigeria', 'Nigerian'),
(162, 'Niue', 'Niuean'),
(163, 'Norfolk Island', 'Norfolk Island'),
(164, 'Norway', 'Norwegian'),
(165, 'Northern Mariana Islands', 'Northern Marianan'),
(166, 'United States Minor Outlying Islands', 'American'),
(167, 'Micronesia (Federated States of)', 'Micronesian'),
(168, 'Marshall Islands', 'Marshallese'),
(169, 'Palau', 'Palauan'),
(170, 'Pakistan', 'Pakistani'),
(171, 'Panama', 'Panamanian'),
(172, 'Papua New Guinea', 'Papua New Guinean, Papuan'),
(173, 'Paraguay', 'Paraguayan'),
(174, 'Peru', 'Peruvian'),
(175, 'Philippines', 'Filipino'),
(176, 'Pitcairn', 'Pitcairn Island'),
(177, 'Poland', 'Polish'),
(178, 'Portugal', 'Portuguese'),
(179, 'Guinea-Bissau', 'Bissau-Guinean'),
(180, 'Timor-Leste', 'Timorese'),
(181, 'Puerto Rico', 'Puerto Rican'),
(182, 'Qatar', 'Qatari'),
(183, 'Réunion', 'Réunionese, Réunionnais'),
(184, 'Romania', 'Romanian'),
(185, 'Russian Federation', 'Russian'),
(186, 'Rwanda', 'Rwandan'),
(187, 'Saint Barthélemy', 'Barthélemois'),
(188, 'Saint Helena, Ascension and Tristan da Cunha', 'Saint Helenian'),
(189, 'Saint Kitts and Nevis', 'Kittitian or Nevisian'),
(190, 'Anguilla', 'Anguillan'),
(191, 'Saint Lucia', 'Saint Lucian'),
(192, 'Saint Martin (French part)', 'Saint-Martinoise'),
(193, 'Saint Pierre and Miquelon', 'Saint-Pierrais or Miquelonnais'),
(194, 'Saint Vincent and the Grenadines', 'Saint Vincentian, Vincentian'),
(195, 'San Marino', 'Sammarinese'),
(196, 'Sao Tome and Principe', 'São Toméan'),
(197, 'Saudi Arabia', 'Saudi, Saudi Arabian'),
(198, 'Senegal', 'Senegalese'),
(199, 'Serbia', 'Serbian'),
(200, 'Seychelles', 'Seychellois'),
(201, 'Sierra Leone', 'Sierra Leonean'),
(202, 'Singapore', 'Singaporean'),
(203, 'Slovakia', 'Slovak'),
(204, 'Vietnam', 'Vietnamese'),
(205, 'Slovenia', 'Slovenian, Slovene'),
(206, 'Somalia', 'Somali, Somalian'),
(207, 'South Africa', 'South African'),
(208, 'Zimbabwe', 'Zimbabwean'),
(209, 'Spain', 'Spanish'),
(210, 'South Sudan', 'South Sudanese'),
(211, 'Sudan', 'Sudanese'),
(212, 'Western Sahara', 'Sahrawi, Sahrawian, Sahraouian'),
(213, 'Suriname', 'Surinamese'),
(214, 'Svalbard and Jan Mayen', 'Svalbard'),
(215, 'Swaziland', 'Swazi'),
(216, 'Sweden', 'Swedish'),
(217, 'Switzerland', 'Swiss'),
(218, 'Syrian Arab Republic', 'Syrian'),
(219, 'Tajikistan', 'Tajikistani'),
(220, 'Thailand', 'Thai'),
(221, 'Togo', 'Togolese'),
(222, 'Tokelau', 'Tokelauan'),
(223, 'Tonga', 'Tongan'),
(224, 'Trinidad and Tobago', 'Trinidadian or Tobagonian'),
(225, 'United Arab Emirates', 'Emirati, Emirian, Emiri'),
(226, 'Tunisia', 'Tunisian'),
(227, 'Turkey', 'Turkish'),
(228, 'Turkmenistan', 'Turkmen'),
(229, 'Turks and Caicos Islands', 'Turks and Caicos Island'),
(230, 'Tuvalu', 'Tuvaluan'),
(231, 'Uganda', 'Ugandan'),
(232, 'Ukraine', 'Ukrainian'),
(233, 'Macedonia (the former Yugoslav Republic of)', 'Macedonian'),
(234, 'Egypt', 'Egyptian'),
(235, 'United Kingdom of Great Britain and Northern Ireland', 'British, UK'),
(236, 'Guernsey', 'Channel Island'),
(237, 'Jersey', 'Channel Island'),
(238, 'Isle of Man', 'Manx'),
(239, 'Tanzania, United Republic of', 'Tanzanian'),
(240, 'United States of America', 'American'),
(241, 'Virgin Islands (U.S.)', 'U.S. Virgin Island'),
(242, 'Burkina Faso', 'Burkinabé'),
(243, 'Uruguay', 'Uruguayan'),
(244, 'Uzbekistan', 'Uzbekistani, Uzbek'),
(245, 'Venezuela (Bolivarian Republic of)', 'Venezuelan'),
(246, 'Wallis and Futuna', 'Wallis and Futuna, Wallisian or Futunan'),
(247, 'Samoa', 'Samoan'),
(248, 'Yemen', 'Yemeni'),
(249, 'Zambia', 'Zambian');

-- --------------------------------------------------------

--
-- Table structure for table `educational_background`
--

CREATE TABLE `educational_background` (
  `id` int(11) NOT NULL,
  `genid` varchar(20) NOT NULL,
  `school` varchar(150) NOT NULL,
  `course` varchar(150) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `awardsrecognition` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `educational_background`
--

INSERT INTO `educational_background` (`id`, `genid`, `school`, `course`, `sdate`, `edate`, `awardsrecognition`) VALUES
(2, 'ilxaCixvdx1BuUBFR4cD', 'Technological Institute of the Philippines', 'Bachelor of Science in Computer Engineering', '2018-02-23', '2018-02-23', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `employment_history`
--

CREATE TABLE `employment_history` (
  `id` int(11) NOT NULL,
  `genid` varchar(20) NOT NULL,
  `company` varchar(250) NOT NULL,
  `position` varchar(150) NOT NULL,
  `currency` tinyint(2) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date DEFAULT NULL,
  `ispresent` tinyint(1) DEFAULT NULL,
  `jbdescription` text NOT NULL,
  `reasonforleaving` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personal_information`
--

CREATE TABLE `personal_information` (
  `id` int(11) NOT NULL,
  `genid` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `present_address` tinytext NOT NULL,
  `permanent_address` tinytext NOT NULL,
  `bday` date NOT NULL,
  `bplace` varchar(150) NOT NULL,
  `age` tinyint(3) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `cstatus` tinyint(1) NOT NULL,
  `country` smallint(4) NOT NULL,
  `nationality` smallint(4) NOT NULL,
  `objectives` text NOT NULL,
  `wrkexperience` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_information`
--

INSERT INTO `personal_information` (`id`, `genid`, `mobile`, `phone`, `present_address`, `permanent_address`, `bday`, `bplace`, `age`, `gender`, `cstatus`, `country`, `nationality`, `objectives`, `wrkexperience`) VALUES
(1, 'ilxaCixvdx1BuUBFR4cD', '09261234567', '(02) 123-4567', 'Bagong Silang Caloocan City', 'Bagong Silang Caloocan City', '1987-05-14', 'Valenzuela', 30, 2, 2, 175, 175, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile_forms`
--

CREATE TABLE `profile_forms` (
  `id` int(11) NOT NULL,
  `genid` varchar(20) NOT NULL,
  `personalinfo` tinyint(1) NOT NULL,
  `educationalbg` tinyint(1) NOT NULL,
  `emphistory` tinyint(1) NOT NULL,
  `charreference` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_forms`
--

INSERT INTO `profile_forms` (`id`, `genid`, `personalinfo`, `educationalbg`, `emphistory`, `charreference`) VALUES
(1, 'ilxaCixvdx1BuUBFR4cD', 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

CREATE TABLE `resumes` (
  `id` int(11) NOT NULL,
  `genid` varchar(20) NOT NULL,
  `rsmname` varchar(50) NOT NULL,
  `rsmext` varchar(10) NOT NULL,
  `rsmsize` varchar(15) NOT NULL,
  `rsmfolder` varchar(100) NOT NULL,
  `rsmadded` datetime DEFAULT NULL,
  `rsmchanged` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `genid` varchar(20) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember` tinyint(1) NOT NULL,
  `remember_token` varchar(100) NOT NULL,
  `activated` tinyint(1) NOT NULL,
  `act_updated` datetime NOT NULL,
  `act_created` datetime NOT NULL,
  `act_activated` datetime DEFAULT NULL,
  `role` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `genid`, `fname`, `mname`, `lname`, `email`, `password`, `remember`, `remember_token`, `activated`, `act_updated`, `act_created`, `act_activated`, `role`) VALUES
(1, 'ilxaCixvdx1BuUBFR4cD', 'JP', 'Lascano', 'Vasquez', 'vasquezjp14@gmail.com', '$2y$10$MiqgBdQaRH9kwZkMV2Iu4uIs4.QpckgA3fdbaNPRnF79qS6lv9VpS', 0, 'hQetwiuNQ0B1N7w5eBSD2wK98XKar8Xlcge2Krq9', 1, '2018-02-23 13:40:00', '2018-02-23 13:38:57', '2018-02-23 13:40:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_type`
--
ALTER TABLE `activity_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `avatars`
--
ALTER TABLE `avatars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `genid` (`genid`),
  ADD UNIQUE KEY `name` (`imgname`);

--
-- Indexes for table `calendar_schedules`
--
ALTER TABLE `calendar_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educational_background`
--
ALTER TABLE `educational_background`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employment_history`
--
ALTER TABLE `employment_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_information`
--
ALTER TABLE `personal_information`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `genid` (`genid`);

--
-- Indexes for table `profile_forms`
--
ALTER TABLE `profile_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resumes`
--
ALTER TABLE `resumes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `genid` (`genid`),
  ADD UNIQUE KEY `filename` (`rsmname`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `genid` (`genid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_type`
--
ALTER TABLE `activity_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `avatars`
--
ALTER TABLE `avatars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `calendar_schedules`
--
ALTER TABLE `calendar_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;
--
-- AUTO_INCREMENT for table `educational_background`
--
ALTER TABLE `educational_background`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employment_history`
--
ALTER TABLE `employment_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personal_information`
--
ALTER TABLE `personal_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `profile_forms`
--
ALTER TABLE `profile_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `resumes`
--
ALTER TABLE `resumes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
