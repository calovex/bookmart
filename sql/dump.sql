-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.16 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table bookmart.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table bookmart.categories: ~6 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`category_id`, `name`) VALUES
  (1, 'Hot Deals'),
  (2, 'Education'),
  (3, 'Magazines'),
  (4, 'Gift'),
  (5, 'Reading Accessories'),
  (6, 'Bulk Sales');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Dumping structure for table bookmart.countries
CREATE TABLE IF NOT EXISTS `countries` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=240 DEFAULT CHARSET=utf8;

-- Dumping data for table bookmart.countries: ~239 rows (approximately)
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` (`country_id`, `name`) VALUES
  (1, 'Afghanistan'),
  (2, 'Albania'),
  (3, 'Algeria'),
  (4, 'American Samoa'),
  (5, 'Andorra'),
  (6, 'Angola'),
  (7, 'Anguilla'),
  (8, 'Antarctica'),
  (9, 'Antigua and Barbuda'),
  (10, 'Argentina'),
  (11, 'Armenia'),
  (12, 'Aruba'),
  (13, 'Australia'),
  (14, 'Austria'),
  (15, 'Azerbaijan'),
  (16, 'Bahamas'),
  (17, 'Bahrain'),
  (18, 'Bangladesh'),
  (19, 'Barbados'),
  (20, 'Belarus'),
  (21, 'Belgium'),
  (22, 'Belize'),
  (23, 'Benin'),
  (24, 'Bermuda'),
  (25, 'Bhutan'),
  (26, 'Bolivia'),
  (27, 'Bosnia and Herzegovina'),
  (28, 'Botswana'),
  (29, 'Bouvet Island'),
  (30, 'Brazil'),
  (31, 'British Indian Ocean Territory'),
  (32, 'Brunei Darussalam'),
  (33, 'Bulgaria'),
  (34, 'Burkina Faso'),
  (35, 'Burundi'),
  (36, 'Cambodia'),
  (37, 'Cameroon'),
  (38, 'Canada'),
  (39, 'Cape Verde'),
  (40, 'Cayman Islands'),
  (41, 'Central African Republic'),
  (42, 'Chad'),
  (43, 'Chile'),
  (44, 'China'),
  (45, 'Christmas Island'),
  (46, 'Cocos (Keeling) Islands'),
  (47, 'Colombia'),
  (48, 'Comoros'),
  (49, 'Congo'),
  (50, 'Congo, The Democratic Republic of The'),
  (51, 'Cook Islands'),
  (52, 'Costa Rica'),
  (53, 'Cote D\'ivoire'),
  (54, 'Croatia'),
  (55, 'Cuba'),
  (56, 'Cyprus'),
  (57, 'Czech Republic'),
  (58, 'Denmark'),
  (59, 'Djibouti'),
  (60, 'Dominica'),
  (61, 'Dominican Republic'),
  (62, 'Ecuador'),
  (63, 'Egypt'),
  (64, 'El Salvador'),
  (65, 'Equatorial Guinea'),
  (66, 'Eritrea'),
  (67, 'Estonia'),
  (68, 'Ethiopia'),
  (69, 'Falkland Islands (Malvinas)'),
  (70, 'Faroe Islands'),
  (71, 'Fiji'),
  (72, 'Finland'),
  (73, 'France'),
  (74, 'French Guiana'),
  (75, 'French Polynesia'),
  (76, 'French Southern Territories'),
  (77, 'Gabon'),
  (78, 'Gambia'),
  (79, 'Georgia'),
  (80, 'Germany'),
  (81, 'Ghana'),
  (82, 'Gibraltar'),
  (83, 'Greece'),
  (84, 'Greenland'),
  (85, 'Grenada'),
  (86, 'Guadeloupe'),
  (87, 'Guam'),
  (88, 'Guatemala'),
  (89, 'Guinea'),
  (90, 'Guinea-bissau'),
  (91, 'Guyana'),
  (92, 'Haiti'),
  (93, 'Heard Island and Mcdonald Islands'),
  (94, 'Holy See (Vatican City State)'),
  (95, 'Honduras'),
  (96, 'Hong Kong'),
  (97, 'Hungary'),
  (98, 'Iceland'),
  (99, 'India'),
  (100, 'Indonesia'),
  (101, 'Iran, Islamic Republic of'),
  (102, 'Iraq'),
  (103, 'Ireland'),
  (104, 'Israel'),
  (105, 'Italy'),
  (106, 'Jamaica'),
  (107, 'Japan'),
  (108, 'Jordan'),
  (109, 'Kazakhstan'),
  (110, 'Kenya'),
  (111, 'Kiribati'),
  (112, 'Korea, Democratic People\'s Republic of'),
  (113, 'Korea, Republic of'),
  (114, 'Kuwait'),
  (115, 'Kyrgyzstan'),
  (116, 'Lao People\'s Democratic Republic'),
  (117, 'Latvia'),
  (118, 'Lebanon'),
  (119, 'Lesotho'),
  (120, 'Liberia'),
  (121, 'Libyan Arab Jamahiriya'),
  (122, 'Liechtenstein'),
  (123, 'Lithuania'),
  (124, 'Luxembourg'),
  (125, 'Macao'),
  (126, 'Macedonia, The Former Yugoslav Republic '),
  (127, 'Madagascar'),
  (128, 'Malawi'),
  (129, 'Malaysia'),
  (130, 'Maldives'),
  (131, 'Mali'),
  (132, 'Malta'),
  (133, 'Marshall Islands'),
  (134, 'Martinique'),
  (135, 'Mauritania'),
  (136, 'Mauritius'),
  (137, 'Mayotte'),
  (138, 'Mexico'),
  (139, 'Micronesia, Federated States of'),
  (140, 'Moldova, Republic of'),
  (141, 'Monaco'),
  (142, 'Mongolia'),
  (143, 'Montserrat'),
  (144, 'Morocco'),
  (145, 'Mozambique'),
  (146, 'Myanmar'),
  (147, 'Namibia'),
  (148, 'Nauru'),
  (149, 'Nepal'),
  (150, 'Netherlands'),
  (151, 'Netherlands Antilles'),
  (152, 'New Caledonia'),
  (153, 'New Zealand'),
  (154, 'Nicaragua'),
  (155, 'Niger'),
  (156, 'Nigeria'),
  (157, 'Niue'),
  (158, 'Norfolk Island'),
  (159, 'Northern Mariana Islands'),
  (160, 'Norway'),
  (161, 'Oman'),
  (162, 'Pakistan'),
  (163, 'Palau'),
  (164, 'Palestinian Territory, Occupied'),
  (165, 'Panama'),
  (166, 'Papua New Guinea'),
  (167, 'Paraguay'),
  (168, 'Peru'),
  (169, 'Philippines'),
  (170, 'Pitcairn'),
  (171, 'Poland'),
  (172, 'Portugal'),
  (173, 'Puerto Rico'),
  (174, 'Qatar'),
  (175, 'Reunion'),
  (176, 'Romania'),
  (177, 'Russian Federation'),
  (178, 'Rwanda'),
  (179, 'Saint Helena'),
  (180, 'Saint Kitts and Nevis'),
  (181, 'Saint Lucia'),
  (182, 'Saint Pierre and Miquelon'),
  (183, 'Saint Vincent and The Grenadines'),
  (184, 'Samoa'),
  (185, 'San Marino'),
  (186, 'Sao Tome and Principe'),
  (187, 'Saudi Arabia'),
  (188, 'Senegal'),
  (189, 'Serbia and Montenegro'),
  (190, 'Seychelles'),
  (191, 'Sierra Leone'),
  (192, 'Singapore'),
  (193, 'Slovakia'),
  (194, 'Slovenia'),
  (195, 'Solomon Islands'),
  (196, 'Somalia'),
  (197, 'South Africa'),
  (198, 'South Georgia and The South Sandwich '),
  (199, 'Spain'),
  (200, 'Sri Lanka'),
  (201, 'Sudan'),
  (202, 'Suriname'),
  (203, 'Svalbard and Jan Mayen'),
  (204, 'Swaziland'),
  (205, 'Sweden'),
  (206, 'Switzerland'),
  (207, 'Syrian Arab Republic'),
  (208, 'Taiwan, Province of China'),
  (209, 'Tajikistan'),
  (210, 'Tanzania, United Republic of'),
  (211, 'Thailand'),
  (212, 'Timor-leste'),
  (213, 'Togo'),
  (214, 'Tokelau'),
  (215, 'Tonga'),
  (216, 'Trinidad and Tobago'),
  (217, 'Tunisia'),
  (218, 'Turkey'),
  (219, 'Turkmenistan'),
  (220, 'Turks and Caicos Islands'),
  (221, 'Tuvalu'),
  (222, 'Uganda'),
  (223, 'Ukraine'),
  (224, 'United Arab Emirates'),
  (225, 'United Kingdom'),
  (226, 'United States'),
  (227, 'United States Minor Outlying Islands'),
  (228, 'Uruguay'),
  (229, 'Uzbekistan'),
  (230, 'Vanuatu'),
  (231, 'Venezuela'),
  (232, 'Viet Nam'),
  (233, 'Virgin Islands, British'),
  (234, 'Virgin Islands, U.S.'),
  (235, 'Wallis and Futuna'),
  (236, 'Western Sahara'),
  (237, 'Yemen'),
  (238, 'Zambia'),
  (239, 'Zimbabwe');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;


-- Dumping structure for table bookmart.products
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `type` enum('Shipped','Downloadable') NOT NULL,
  `original_price` float NOT NULL,
  `sale_price` float NOT NULL,
  `shipping_costs` float NOT NULL,
  `weightage` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `meta_desc` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `desc` text NOT NULL,
  `views` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`product_id`),
  FULLTEXT KEY `title_author_meta_keywords_meta_desc_summary_desc` (`title`,`author`,`meta_keywords`,`meta_desc`,`summary`,`desc`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table bookmart.products: 1 rows
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`product_id`, `title`, `author`, `type`, `original_price`, `sale_price`, `shipping_costs`, `weightage`, `slug`, `meta_keywords`, `meta_desc`, `image1`, `image2`, `image3`, `summary`, `desc`, `views`, `created_at`, `updated_at`) VALUES
  (1, 'A Study in Scarlet', 'Arthur Conan Doyle', 'Downloadable', 15, 10, 0, 300, 'a-study-in-scarlet', 'A Study in Scarlet by Arthur Conan Doyle', 'A Study in Scarlet by Arthur Conan Doyle', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, voluptate.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad nam at architecto non culpa fugiat pariatur quia odio libero, nihil illo qui, quidem, laborum! Voluptate ipsum rerum, aliquam magnam eveniet suscipit qui odit eum, est dolorem accusantium, corporis velit praesentium ut. Voluptatum sint, aut quasi, non esse reprehenderit soluta facere ducimus iure officia, repellendus quae unde. Officiis, esse, ut! Quis necessitatibus, non. Aut consectetur necessitatibus iste consequuntur eaque facilis voluptate!', 0, '2014-09-16 17:54:37', '2014-09-16 17:54:37');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;


-- Dumping structure for table bookmart.products_categories
CREATE TABLE IF NOT EXISTS `products_categories` (
  `products_categories_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`products_categories_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table bookmart.products_categories: ~2 rows (approximately)
/*!40000 ALTER TABLE `products_categories` DISABLE KEYS */;
INSERT INTO `products_categories` (`products_categories_id`, `product_id`, `category_id`) VALUES
  (1, 1, 1),
  (2, 1, 6);
/*!40000 ALTER TABLE `products_categories` ENABLE KEYS */;


-- Dumping structure for table bookmart.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `user_type` enum('normal_user','admin') NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `reset_code` varchar(32) DEFAULT NULL,
  `phone` varchar(64) NOT NULL,
  `city` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `profile_desc` text NOT NULL,
  `blocked` tinyint(4) NOT NULL DEFAULT '0',
  `joined` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `reset_code` (`reset_code`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table bookmart.users: 4 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `country_id`, `user_type`, `first_name`, `last_name`, `dob`, `email`, `password`, `reset_code`, `phone`, `city`, `avatar`, `profile_desc`, `blocked`, `joined`) VALUES
  (1, 99, 'normal_user', 'Nivin', 'CP', '0000-00-00', 'nivincp@gmail.com', '32250170a0dca92d53ec9624f336ca24', NULL, '', 'Kochi', '', '', 0, 1410716666),
  (2, 225, 'normal_user', 'Alex', 'Garrett', '0000-00-00', 'alex@gmail.com', '32250170a0dca92d53ec9624f336ca24', NULL, '', 'London', '', '', 0, 1410717003),
  (3, 225, 'normal_user', 'Billy', 'Garrett', '0000-00-00', 'billy@gmail.com', 'd4f71ce1ff9e9536a877eaf8f9cb6e98', NULL, '', 'London', '', '', 0, 1410717646),
  (4, 0, 'admin', 'Admin', '', '0000-00-00', 'admin@bookmart.com', '32250170a0dca92d53ec9624f336ca24', NULL, '', '', '', '', 0, 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
