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
  `slug` varchar(255) NOT NULL,
  `weightage` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`category_id`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table bookmart.categories: ~7 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`category_id`, `name`, `slug`, `weightage`, `status`, `created_at`, `updated_at`) VALUES
    (1, 'Hot Deals', 'hot-deals', 10, 1, '0000-00-00 00:00:00', '2014-09-22 21:56:15'),
    (2, 'Education', 'education', 9, 1, '0000-00-00 00:00:00', '2014-09-21 17:40:32'),
    (3, 'Magazines', 'magazines', 6, 1, '0000-00-00 00:00:00', '2014-09-22 00:45:37'),
    (4, 'Gift', 'gift', 7, 1, '0000-00-00 00:00:00', '2014-09-21 17:40:35'),
    (5, 'Reading Accessories', 'reading-accessories', 5, 0, '0000-00-00 00:00:00', '2014-09-22 00:45:25'),
    (6, 'New Releases', 'new-releases', 4, 1, '0000-00-00 00:00:00', '2014-09-25 15:39:36'),
    (9, 'Featured', 'featured', 8, 1, '2014-09-20 21:53:09', '2014-09-25 15:38:56');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Dumping structure for table bookmart.ci_sessions
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table bookmart.ci_sessions: ~4 rows (approximately)
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
    ('0afcd1b4f99d3fd5d200b9de716e413e', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:32.0) Gecko/20100101 Firefox/32.0', 1411758441, ''),
    ('281d6fc608ae8fc5cc6379119e9e97cb', '::1', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .N', 1411765114, ''),
    ('286eb58634505cff9610e371120d8b0a', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36', 1411764945, 'a:8:{s:9:"user_data";s:0:"";s:7:"user_id";s:1:"4";s:9:"user_type";s:5:"admin";s:10:"country_id";s:1:"0";s:10:"first_name";s:5:"Admin";s:9:"last_name";s:0:"";s:5:"email";s:18:"admin@bookmart.com";s:9:"logged_in";b:1;}'),
    ('6d1fb6e763483d08392d83d39320a2ad', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:32.0) Gecko/20100101 Firefox/32.0', 1411765035, '');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;


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


-- Dumping structure for table bookmart.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_ids` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_amount` float NOT NULL,
  `paid_amount` float NOT NULL,
  `payment_currency` varchar(50) NOT NULL,
  `status` enum('Pending','Confirmed') NOT NULL DEFAULT 'Pending',
  `created_at` datetime NOT NULL,
  `paid_at` datetime NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table bookmart.orders: ~0 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;


-- Dumping structure for table bookmart.orders_logs
CREATE TABLE IF NOT EXISTS `orders_logs` (
  `orders_logs_id` int(11) NOT NULL AUTO_INCREMENT,
  `gateway` enum('Paypal') NOT NULL DEFAULT 'Paypal',
  `txn_id` varchar(255) NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `receiver_email` varchar(255) NOT NULL,
  `order_id_received` int(11) NOT NULL,
  `ipn_request` text NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`orders_logs_id`),
  KEY `txn_id` (`txn_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table bookmart.orders_logs: ~0 rows (approximately)
/*!40000 ALTER TABLE `orders_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders_logs` ENABLE KEYS */;


-- Dumping structure for table bookmart.pages
CREATE TABLE IF NOT EXISTS `pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `meta_desc` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `views` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Dumping data for table bookmart.pages: ~12 rows (approximately)
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` (`page_id`, `title`, `slug`, `meta_keywords`, `meta_desc`, `desc`, `views`, `created_at`, `updated_at`) VALUES
    (1, 'About us', 'about-us', 'about us', 'about bookmart', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa expedita quod sequi corporis soluta suscipit vel quam ad voluptatibus doloribus tenetur, earum quasi, omnis dolor porro! Molestias officiis placeat velit vero, hic necessitatibus animi deserunt, possimus quisquam ab, officia fugit cumque, obcaecati repellendus iste minima! Reprehenderit officia facere, dolores enim reiciendis totam eos ab sit nulla voluptates, iure maiores ullam aut qui nisi tenetur minus rem molestiae, nam in et. Fugit sit cum aliquam recusandae alias, reprehenderit atque sed ex esse, repellat, corporis impedit qui culpa velit voluptatum. Doloribus, molestias error provident esse ducimus sit magni nisi voluptate vel, illo.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae adipisci culpa hic, rem fuga quasi repellat dicta soluta ab, ipsam expedita. Est eius ab debitis soluta, impedit laudantium delectus, ipsum! Delectus officia est aspernatur! Delectus fugit obcaecati et, ipsa voluptatum velit ea. Sit assumenda asperiores quas aperiam atque, facere repellat maiores voluptate voluptatum quam tempore pariatur error labore non id obcaecati ipsa deserunt enim iste harum! Reprehenderit ex ipsam sapiente beatae vel modi nesciunt quaerat ea cupiditate at possimus sequi ab atque nemo, magni deserunt ducimus cum. Ipsum totam ipsam dignissimos ducimus magnam, sint reprehenderit dolorem in, incidunt dolore ad, odit eum consequuntur quas inventore optio! Pariatur nemo aperiam porro, ut, molestiae ex quasi itaque veniam illum eius? Magni quo molestias blanditiis repudiandae sit esse id amet numquam architecto error quis voluptatem molestiae ratione quam, praesentium doloremque, cum illum accusamus, dolorum eius velit aliquid saepe dolorem non soluta. Aspernatur beatae reprehenderit veritatis perspiciatis molestiae libero magnam repellendus vel. Alias, dolore magnam tenetur tempore nihil, veritatis natus magni harum incidunt unde ducimus. Sapiente vero quibusdam earum a deserunt praesentium ut blanditiis doloremque excepturi. Esse commodi hic similique, illum repellendus maiores aperiam dolorum quasi, architecto molestias officia ut quas, odit voluptates cumque.', 4, '0000-00-00 00:00:00', '2014-09-20 19:40:18'),
    (2, 'User Agreement', 'user-agreement', 'user agreement', 'bookmart user agreement', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora adipisci, pariatur quaerat et enim a quia magnam? Deserunt saepe, quia sit quas odio culpa error dignissimos ipsum magni, voluptatum, alias corporis adipisci ex minus veritatis consectetur qui quasi sint et sed tempore ut iste necessitatibus. Sint eligendi dicta suscipit sit molestias. Nulla facere itaque officiis eveniet, molestiae nam vero, fuga temporibus voluptatum, ipsum quas expedita? Animi alias veritatis soluta aperiam nulla harum dignissimos dolorum sed maxime quasi iure at temporibus quo omnis, ipsa esse veniam dolorem commodi? Consectetur officiis omnis eveniet iure fuga commodi, nihil numquam, iste, aliquam magnam excepturi eum consequatur magni quam quo vel culpa mollitia labore soluta! Quas dolores excepturi dolore quaerat, id explicabo quod repudiandae distinctio debitis illo ut, voluptatibus ea. Repellat sed, labore perferendis dolorem eum ipsam, mollitia ducimus dicta quasi iste delectus eaque amet accusamus. \r\n\r\nAperiam repudiandae impedit, illum eligendi dignissimos earum perferendis quisquam voluptatum voluptate. Dignissimos harum, commodi fugit? Earum aspernatur, necessitatibus saepe, tempore dolore fuga laborum iure omnis dolorem id similique ea laudantium ullam asperiores reprehenderit quas odio. Vero saepe modi obcaecati alias rerum dolorem voluptates, sed, ab eius, quaerat assumenda amet! Eius facere voluptatibus magni, praesentium tempora architecto autem iusto vero, libero delectus corporis minima, asperiores nisi est blanditiis quis non neque officiis! Hic laudantium illum consectetur ab ducimus odit, maxime magnam? Aperiam repellat unde voluptates magnam perspiciatis. At tenetur animi, quasi deleniti suscipit, culpa aperiam cum excepturi libero placeat voluptates sequi. Nisi natus, unde, quasi architecto eaque suscipit numquam, omnis quo molestiae, hic reiciendis nostrum adipisci corporis itaque quaerat. Adipisci optio minima rem, non. Praesentium placeat laboriosam, doloribus incidunt sed ullam recusandae excepturi. Adipisci excepturi saepe cum rerum, quaerat ea molestiae assumenda accusamus? Accusantium eveniet aliquid vitae necessitatibus, est ratione, quis voluptatum soluta animi perspiciatis, voluptas? Quis optio enim aliquam!', 20, '0000-00-00 00:00:00', '2014-09-20 20:26:32'),
    (3, 'Privacy', 'privacy', 'privacy', 'bookmart privacy policy', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque nam veniam excepturi maxime pariatur quos, minima fuga aliquid voluptatibus laudantium, soluta, minus tempora velit. Sequi deleniti animi nam rerum laboriosam voluptas, nulla dolorum. Iste voluptatem magnam, tenetur praesentium, vitae, voluptatum architecto vel perspiciatis ipsa sequi saepe voluptatibus. Esse id reprehenderit quibusdam totam pariatur et non! Quidem doloribus quo ex totam incidunt consequatur quis, nemo facere molestias repellat aliquid similique consectetur, ipsa ratione temporibus neque, asperiores quas magni aspernatur! Illum voluptatum nemo, a quibusdam, architecto nam dicta distinctio iure repudiandae voluptate iusto quo. Consequuntur ea delectus illum quidem, repudiandae. Eveniet facere distinctio repellendus sit! Et nulla deserunt quae ut laborum blanditiis, sapiente consectetur libero sint, qui veniam repellendus sequi cupiditate debitis hic vero obcaecati excepturi. \r\n\r\nAutem rem non similique illo necessitatibus unde, veniam corporis eum doloremque a eveniet sit. Sapiente, ipsum. Harum, accusamus modi eligendi neque repudiandae voluptates voluptas cumque nesciunt quae animi repellat commodi at, tempore nihil consectetur recusandae sapiente! Suscipit asperiores officiis facilis. Eius modi, repellendus optio accusantium sint recusandae praesentium id earum sunt voluptas consequuntur quam delectus cum nobis vitae, et ullam nostrum, natus. Quia error eaque omnis magni, deserunt deleniti molestias odio, itaque ab in fuga ut facilis, optio voluptates maiores magnam quidem quasi. Recusandae ducimus explicabo fugit quos aliquam dolorem id, molestias dolore quas repellat ut.', 9, '0000-00-00 00:00:00', '2014-09-20 20:26:39'),
    (4, 'Contact us', 'contact-us', 'contact us', 'bookmart contact details', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur voluptatum, expedita eius explicabo rem itaque, blanditiis dolorem eos incidunt officia minus laborum corporis debitis est officiis quaerat commodi ipsum nobis.\r\n\r\n2962 Adams Drive\r\nSan Angelo, TX 76903\r\n\r\nPhone: 402-885-7741\r\nEmail Address: info@bookmart.com', 8, '0000-00-00 00:00:00', '2014-09-20 19:48:26'),
    (5, 'Customer service', 'customer-service', 'customer service', 'bookmart customer service', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, natus eaque dignissimos dolorum suscipit culpa similique, voluptatibus ducimus molestias, inventore laudantium nobis a, modi. Modi, reprehenderit! Pariatur facere, repudiandae consectetur officiis praesentium, laboriosam ea fuga et tempore quo doloribus iure quod ducimus, totam? At, porro veniam quis nostrum, dicta officia dolor sunt reprehenderit totam sint molestias repudiandae, id quae possimus a cupiditate eaque maiores exercitationem obcaecati voluptatibus pariatur. Nisi eos sequi, enim placeat, perspiciatis reprehenderit voluptatibus cum ipsam soluta mollitia nesciunt, fugiat quibusdam minus nostrum ex! Hic repellendus illum, magnam minus iusto alias soluta adipisci molestiae libero ipsa optio. Sed necessitatibus dolorum qui minus nam atque velit tempore illum consequuntur, quas, ab reiciendis quo. Nihil, pariatur sapiente minima, quam nesciunt inventore officia eius ab adipisci dolore! Laboriosam ipsam natus esse provident, tempore voluptas magni quis fugiat nulla amet quae fuga ipsum assumenda quos, beatae dolor optio! Tempore doloremque accusamus, quaerat iusto natus nesciunt in explicabo ad assumenda aliquam animi error, culpa corporis atque saepe fugit earum odit deserunt. Delectus, voluptate.', 6, '0000-00-00 00:00:00', '2014-09-20 19:48:23'),
    (6, 'Product recalls', 'product-recalls', 'product recalls', 'bookmart product recalls', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque eveniet nemo odit non quod a similique magni, ut magnam esse totam commodi quibusdam reprehenderit culpa saepe quas debitis, labore neque modi aliquam cum assumenda. Praesentium fugit soluta mollitia deleniti quae delectus sit laudantium, cumque fugiat ullam, suscipit earum commodi atque repellendus vel non minima autem omnis aut accusantium perspiciatis ad quam enim nulla sapiente. Necessitatibus expedita culpa error odio vero ab provident corporis placeat porro magni consequatur officiis ut molestiae quaerat nostrum veniam, dolorum omnis reiciendis, facere fugit et neque blanditiis. Tempore, praesentium! Eos voluptate sequi veritatis itaque, ipsam modi!\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Esse doloremque, nisi voluptatibus recusandae aliquam est harum excepturi delectus quasi ullam porro vitae, voluptatum, illum beatae fuga natus dolorem eveniet enim dolore unde maiores quas asperiores pariatur laborum. Magni esse nemo, voluptatem, tempora ipsa laborum incidunt modi voluptas enim eaque dolorum!\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Odit aliquam nobis quia a inventore, numquam? Necessitatibus consequatur, quis dicta accusamus reiciendis veniam possimus, voluptas maiores praesentium pariatur. Eius nostrum, adipisci ipsam ipsum quos repudiandae ut incidunt laborum quo provident, cupiditate fuga praesentium earum. Tenetur, assumenda, repellendus? Ut nisi cum expedita alias praesentium quis, molestiae repudiandae atque, debitis autem, ex error ipsa ad. In itaque cumque id nulla quaerat suscipit aliquid quos consequuntur ipsa provident culpa nemo odio rem eum asperiores ducimus quam ipsam quisquam, quia quae doloremque, nihil expedita quas similique facilis? Non magnam pariatur, necessitatibus itaque aut, illum magni iusto fuga optio totam maiores ullam recusandae, quasi nesciunt qui! Eveniet harum, repellat, beatae enim pariatur laborum dicta atque! Pariatur incidunt sunt perspiciatis vitae. Quis veniam unde odio magnam saepe blanditiis commodi iste quos, corrupti, architecto quaerat consequuntur.', 4, '0000-00-00 00:00:00', '2014-09-20 19:48:21'),
    (7, 'Order status tracking', 'order-status-tracking', 'order status tracking', 'bookmart order status tracking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio, quia. Nisi quae molestias voluptatem reprehenderit velit! Tempore sed corporis rem ipsam quo corrupti consectetur pariatur, provident iusto nostrum incidunt totam.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae harum fugit, natus dicta autem at! Odio recusandae expedita possimus totam eum, quo, reiciendis velit veniam repudiandae architecto minus rerum aperiam aliquam! Temporibus dolorum inventore eum sunt odio quos pariatur sit.', 12, '0000-00-00 00:00:00', '2014-09-20 21:34:31'),
    (8, 'Shipping Policy', 'shipping-policy', 'shipping policy', 'bookmart shipping policy', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quas voluptate accusantium officiis recusandae sequi voluptatum eligendi quos, commodi qui voluptatem enim illum dicta minima quod nemo quasi obcaecati doloremque perferendis quia repudiandae hic nihil! Est at ipsam dolores libero quisquam atque expedita, iusto velit fuga temporibus repellat, in modi quaerat voluptatum, odit! Perspiciatis aspernatur esse assumenda itaque aut vitae expedita quos eaque enim voluptates. Dignissimos iure eius a, reiciendis tenetur odio, officiis ex laborum ducimus expedita labore autem provident. \r\n\r\nDelectus architecto laborum obcaecati incidunt vero et magnam, blanditiis nesciunt sequi ex quisquam sunt iusto vitae, deleniti facilis odio eos dicta inventore nisi explicabo, ratione illum. Doloremque et veritatis optio ab consectetur quia facere, eligendi at voluptatem tempore eius reiciendis dolores, veniam repellat mollitia. Exercitationem dolor, nesciunt voluptate omnis vero laudantium repudiandae sint veritatis illo minima ipsa porro laborum inventore amet quidem atque qui libero soluta aliquam corporis dicta sequi, dolorem et hic maxime. \r\n\r\n\r\nBlanditiis saepe obcaecati cum labore earum fugiat ipsam delectus fugit iste, ea quod explicabo unde asperiores voluptatum adipisci assumenda enim natus doloribus quo ab et consectetur accusantium quia. Ex vero laboriosam ut, doloremque sed necessitatibus modi mollitia hic, optio quae minus illo deleniti repellat aliquid sint veritatis labore a facilis at molestias libero! Sunt itaque labore quo perferendis eaque veniam, voluptatum cum temporibus officiis cumque delectus soluta eius id quos consequuntur veritatis quae? Doloremque laborum quam, ducimus sed itaque, commodi repellat beatae consequuntur nesciunt nisi, ab odit dolores pariatur ratione veniam debitis! Eaque error nesciunt repellat dolores fuga molestias incidunt, maiores enim veniam. \r\n\r\nMagnam vel accusamus unde earum dolores, itaque expedita soluta ab ipsam quis nisi maxime, commodi rem exercitationem incidunt perspiciatis optio vero labore temporibus assumenda et, provident, laborum eveniet quae ullam. Tempora illo doloribus accusamus adipisci quam, quaerat, officia ex maiores. Earum iste voluptatibus magnam explicabo sed nobis recusandae vitae accusamus quam illum doloremque beatae hic, magni quaerat, iure, fuga asperiores quae. Minima explicabo sint ratione doloremque soluta excepturi hic, id nesciunt aperiam, rem at vero cumque voluptatibus consequatur earum modi unde vel magnam quod mollitia. Nobis labore modi delectus odit sint voluptate dicta?', 4, '0000-00-00 00:00:00', '2014-09-20 19:47:56'),
    (9, 'Warranty', 'warranty', 'warranty', 'bookmart warranty', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo atque, vel cumque, nisi rerum ab et doloremque voluptatem voluptas necessitatibus. Est libero facere debitis minima quis sint quidem laborum alias repellat velit doloribus ex, distinctio pariatur rem optio amet aperiam assumenda impedit cum quisquam voluptas quo fuga tenetur. \r\n\r\nHic ex et quas officiis officia dolores suscipit, consequatur, quod rem aspernatur ad iusto esse, praesentium pariatur consectetur culpa voluptatum quasi ipsa provident labore! Nemo rerum odio sint similique dolorem? Nam praesentium natus itaque eaque nisi perferendis dolore quia reiciendis vitae eveniet tenetur doloremque veniam quas nostrum assumenda voluptate accusamus dolorem, temporibus tempora repellat atque molestiae est sit sint eum. Ullam iste vitae magni alias eveniet expedita, eos voluptas, porro quidem illum nemo, sunt, corporis. Debitis ipsa facilis dignissimos pariatur, optio autem saepe esse laboriosam, similique at ipsum inventore minima tenetur illo expedita. Voluptate nisi reprehenderit sed obcaecati repudiandae dicta quaerat praesentium perspiciatis molestiae autem sunt voluptas, quae deserunt velit aut. Ut cum eum cumque facere beatae sunt. \r\n\r\nMolestias consequuntur ratione veritatis quas quidem quis, error iure, ut veniam perspiciatis, quo expedita reprehenderit est accusamus harum ipsum aspernatur nam numquam beatae vero! Accusamus a veniam dolor pariatur asperiores dolore minima quaerat vel, error. Eaque velit sapiente sed deserunt provident fugit modi non officia est aperiam. Blanditiis quam maiores sequi nobis repellat natus, laborum ab quisquam esse, rem quidem mollitia incidunt cumque nam, sit aliquam dignissimos deleniti quaerat adipisci! Obcaecati officiis libero recusandae dolorum nisi, beatae aliquam. \r\n\r\nAdipisci, ab ipsam, magni nostrum assumenda ullam. Ad illum dolores tempora laborum aut quos numquam ipsam optio commodi corporis, in modi unde rerum repudiandae fugit cupiditate, odio facere nesciunt iste suscipit. Similique iste deserunt ad officia eligendi blanditiis ipsam est alias dolorem recusandae, numquam quaerat corrupti dignissimos non. \r\n\r\nIn non ducimus cumque aspernatur, quisquam sed nulla, illum minima laboriosam repellat deserunt mollitia officia? Vel, dolor, tempore? Ex sequi quod unde libero, magnam atque necessitatibus ullam officia neque animi culpa veniam reprehenderit obcaecati harum accusantium fugit ducimus ipsam facere, nesciunt et consectetur mollitia delectus. \r\n\r\nIncidunt consequuntur pariatur et est totam temporibus harum iusto velit soluta magnam sint quibusdam labore animi minima molestias id veritatis, reprehenderit commodi aliquid excepturi quidem sunt iste. \r\n\r\nMollitia, repudiandae ex! Quis officia sed cumque ad est ratione labore id, similique, vero ducimus molestias ab, impedit incidunt laudantium dolorem iure sapiente! Aperiam quidem porro obcaecati iure architecto culpa, quo velit ipsum, nihil, est soluta.', 3, '0000-00-00 00:00:00', '2014-09-20 19:49:26'),
    (10, 'Tips advice', 'tips-advice', 'tips advice', 'bookmart tips advice', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio delectus nostrum autem omnis voluptate quidem quae voluptatem eligendi blanditiis itaque, mollitia, odit qui nam placeat, ad facere. Sunt, inventore sint.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus culpa vel, quaerat repudiandae reprehenderit recusandae cumque corrupti deserunt atque delectus magnam consequatur nobis ullam possimus velit veritatis maxime laboriosam cupiditate veniam quod nulla molestias saepe. Soluta voluptatem ullam, magni illum facere delectus fugit perspiciatis blanditiis repellendus tenetur veritatis suscipit quae placeat, eveniet illo harum provident beatae cumque odit, inventore aut corporis, reiciendis molestias non. Voluptates natus perferendis ad quam minus.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores beatae modi aliquid animi, molestiae incidunt quisquam totam eaque eum! Reprehenderit totam, dolorem iste vitae mollitia rem est voluptas eaque minus. Veniam, possimus, explicabo. Doloribus facilis sapiente eos, adipisci a expedita quidem odit, repellendus esse! Mollitia sit, dolorum earum molestias numquam repudiandae quidem blanditiis enim voluptate, sed, quo quis doloremque optio consequatur impedit facilis. Illum voluptatibus, commodi minus officia dolorem consequatur veniam laborum, porro atque saepe quas. Rem, magnam quaerat eum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia corporis aspernatur dolores ad, sequi, facilis magni non modi quaerat, quis enim quasi ea cum itaque fugit, deleniti molestias blanditiis voluptate reiciendis dignissimos possimus ipsam quae doloribus placeat. A ea nulla eius cum fuga eaque deleniti, officia asperiores, ducimus enim eligendi voluptatibus voluptate debitis reiciendis esse, aperiam dolor quae nobis. Similique, corrupti optio beatae impedit consectetur explicabo laudantium itaque voluptatibus architecto! Accusamus, quasi reprehenderit, quidem saepe, tempora totam debitis fuga autem facilis corrupti repellendus placeat quisquam veniam qui, consequuntur! Provident quae, possimus temporibus ex pariatur nemo facilis laboriosam? Iste quasi, fugit est voluptate pariatur, sed. Nobis iusto, assumenda dolorum unde beatae, minima cumque nesciunt, eius maxime numquam vitae qui. Assumenda architecto nemo eum provident labore, voluptas eos repellendus similique explicabo natus ullam amet aperiam eligendi laboriosam dolore nesciunt dicta aut voluptates, tempore nisi. Magnam nostrum, vel soluta consequatur dolorem maiores doloribus similique dolore eaque fugiat debitis repellat. Accusantium quasi, recusandae nemo voluptate similique iusto assumenda ex, accusamus! Nisi vero voluptas mollitia natus, explicabo accusantium incidunt saepe quam vel ab odit ratione vitae esse sapiente perspiciatis culpa, reiciendis aperiam a suscipit sunt. Voluptatum, dolores. Modi rem accusamus ipsam tempora harum, obcaecati unde!', 4, '0000-00-00 00:00:00', '2014-09-20 19:50:17'),
    (11, 'Read Instantly on your Web Browser', 'read-instantly-on-your-web-browser', 'Read Instantly on your Web Browser', 'Read Instantly on your Web Browser', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure voluptatem quia, quas asperiores, voluptatibus est, sint at facere recusandae delectus ducimus voluptatum, optio eius harum nostrum quisquam incidunt esse dolore.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus magnam beatae ipsum illum. Molestias molestiae quidem inventore eius illo, quaerat, eveniet sed. Dolorem accusantium reprehenderit modi ipsum nesciunt aliquam illo consequatur assumenda veritatis, explicabo unde nostrum officiis nisi eligendi facilis deleniti cumque rerum nam velit aut iure soluta quae sequi.', 8, '0000-00-00 00:00:00', '2014-09-24 13:40:00'),
    (12, 'Also read on iOS, Android and WindowsPhone', 'also-read-on-ios-android-and-windowsphone', 'Also read on iOS, Android and WindowsPhone', 'Also read on iOS, Android and WindowsPhone', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem eligendi ratione sequi magnam illum non tempore qui iusto reiciendis, assumenda! Ex quo accusamus quas facere, totam delectus est placeat odio odit doloremque ab similique iusto labore veritatis ullam et minima.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis facilis amet beatae, maxime blanditiis saepe, deleniti sunt explicabo accusamus aperiam!\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque fugiat, saepe nulla aspernatur repellat inventore quibusdam perferendis quae repellendus, rerum beatae! Quod animi aliquid cupiditate, ut a dignissimos, repudiandae voluptate. Totam voluptatum, at labore iure ut! Voluptatum voluptatem temporibus nesciunt esse voluptate animi est repudiandae non, tempore, nostrum reprehenderit molestias rem deserunt alias labore natus quam assumenda soluta culpa incidunt.', 8, '0000-00-00 00:00:00', '2014-09-24 13:41:42');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;


-- Dumping structure for table bookmart.products
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `our_product` tinyint(1) NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `service_type` enum('Paid','Free') NOT NULL,
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
  FULLTEXT KEY `bookmart_search` (`title`,`tags`,`author`,`meta_keywords`,`meta_desc`,`summary`,`desc`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- Dumping data for table bookmart.products: 25 rows
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`product_id`, `title`, `tags`, `author`, `published`, `our_product`, `cover_image`, `service_type`, `type`, `original_price`, `sale_price`, `shipping_costs`, `weightage`, `slug`, `meta_keywords`, `meta_desc`, `image1`, `image2`, `image3`, `summary`, `desc`, `views`, `created_at`, `updated_at`) VALUES
    (1, 'A Study in Scarlet', 'Detective, Action, Adventure', 'Arthur Conan Doyle', 1, 1, 'ArthurConanDoyle_AStudyInScarlet_annual.jpg', 'Free', 'Downloadable', 15, 10, 0, 300, 'a-study-in-scarlet', 'A Study in Scarlet by Arthur Conan Doyle', 'A Study in Scarlet by Arthur Conan Doyle', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, voluptate.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad nam at architecto non culpa fugiat pariatur quia odio libero, nihil illo qui, quidem, laborum! Voluptate ipsum rerum, aliquam magnam eveniet suscipit qui odit eum, est dolorem accusantium, corporis velit praesentium ut. Voluptatum sint, aut quasi, non esse reprehenderit soluta facere ducimus iure officia, repellendus quae unde. Officiis, esse, ut! Quis necessitatibus, non. Aut consectetur necessitatibus iste consequuntur eaque facilis voluptate!', 7, '2014-09-16 17:54:37', '2014-09-25 16:08:34'),
    (2, 'Three Men in a Boat', 'Fiction, Children\'s literature', 'Jerome K. Jerome', 1, 0, 'A008727.jpg', 'Paid', 'Downloadable', 20, 12, 0, 20, 'three-men-in-a-boat', 'Three Men in a Boat', 'Three Men in a Boat', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam, quasi fugiat exercitationem reiciendis saepe impedit eum quas, ad delectus magni.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim soluta dolores unde voluptatibus, harum veniam modi culpa quis qui alias dicta debitis illum amet labore nihil fuga, suscipit ea, explicabo eligendi iure quam sequi. Aperiam unde ab iste, nemo dolorem.', 4, '2014-09-18 22:50:21', '2014-09-25 16:30:51'),
    (6, 'Beyond Good and Evil', 'Philosophy', 'Friedrich Wilhelm Nietzsche', 1, 1, '57999781775411499237491Pic.jpg', 'Paid', 'Downloadable', 30, 20, 0, 0, 'beyond-good-and-evil', 'Friedrich Wilhelm Nietzsche', 'Friedrich Wilhelm Nietzsche', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo, laudantium?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis quod laudantium, vel corrupti esse consequatur pariatur architecto, aliquam nesciunt odio exercitationem itaque voluptatum, odit reiciendis enim consequuntur impedit laboriosam laborum possimus, explicabo fugit repudiandae facere? Facere deleniti eaque at illum saepe rerum, quibusdam dolorum eligendi earum vel soluta corrupti est, sequi ipsum dolor. Quos, neque temporibus ullam repellendus voluptate placeat eius totam soluta ab quam mollitia cupiditate. Tempora, laboriosam tempore expedita, nam, ipsam libero a quibusdam placeat enim et odit. Unde doloremque sed magni. Quia placeat recusandae veniam, quam dolore molestiae at tenetur quidem, est quis totam iusto ratione ab provident praesentium, a sequi iure perspiciatis dignissimos aspernatur et aliquam hic ipsum maiores? Architecto rem eius recusandae ipsa quia sint qui saepe odio harum necessitatibus, magnam doloribus explicabo omnis natus alias nisi dolorum ea ab unde minus nostrum facere veniam. Molestias ipsum nihil eum et doloribus maiores explicabo animi laudantium tempora? Reiciendis fugiat, repellat quod iusto voluptates ab earum explicabo! Molestias temporibus tempore, consequatur nam blanditiis quibusdam sit minima, laboriosam.', 7, '2014-09-21 17:50:07', '2014-09-25 16:08:40'),
    (7, 'Treasure Island', 'Adventure', 'Robert Louis Stevenson', 1, 1, '295.jpg', 'Paid', 'Downloadable', 15, 10, 0, 0, 'treasure-island', 'Treasure Island', 'Treasure Island', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae ipsam fugiat autem numquam sed nostrum corrupti! Rem autem rerum similique aspernatur, placeat eveniet. Perferendis laborum inventore eum quos dolores laudantium vero consectetur, sit reprehenderit a ducimus, numquam consequatur ipsum hic. Voluptas ipsum rem eius accusamus dicta nam soluta ullam quos quaerat, quis distinctio dolor sequi porro, consectetur. At inventore et officia similique error, architecto aliquid, expedita culpa quam hic incidunt.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Eius doloremque, et culpa possimus odio aperiam, nulla maiores tenetur quisquam quidem omnis dignissimos repudiandae. Quis reprehenderit, cupiditate! Minima, fugiat. Id, culpa?', 19, '2014-09-21 17:57:14', '2014-09-25 16:08:44'),
    (8, 'Twelve Years a Slave', 'Historical drama', 'Solomon Northup', 1, 1, '12-years-slave.jpg', 'Paid', 'Downloadable', 10, 7, 0, 0, 'twelve-years-a-slave', 'Twelve Years a Slave', 'Twelve Years a Slave', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, facere.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse odit, reprehenderit accusantium quod facere adipisci alias inventore officiis ipsam nesciunt quas voluptas saepe repellat. Dolorum, doloremque minus saepe dolorem pariatur, ducimus neque nihil et atque voluptatum fugit qui voluptates. Nostrum vitae sunt alias excepturi fugit aspernatur voluptates odit eos neque, odio optio, quisquam beatae nesciunt voluptatibus. Fugiat assumenda dolorum laboriosam quae earum, ipsum quas officia rem. Placeat veritatis deserunt earum qui, excepturi, ducimus magni deleniti obcaecati quae temporibus cumque, error eveniet repudiandae culpa sequi voluptate autem consectetur itaque. Eveniet tempore saepe consequuntur in minima beatae, sint excepturi ducimus magni odio.', 24, '2014-09-21 17:59:30', '2014-09-25 16:08:50'),
    (9, 'Emma', 'Fiction, Novel, Novel of manners, Comedy, Romance novel, Children\'s literature, Reference, Comedy of manners', 'Jane Austen', 1, 1, 'emma.jpg', 'Paid', 'Downloadable', 7, 5, 0, 0, 'emma', 'Emma', 'Emma', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex optio saepe perferendis sed alias itaque dolorum, illum architecto ullam unde. Sequi quae animi cum dolorum explicabo repellendus itaque laborum, possimus aspernatur, facere provident magni expedita quas sapiente dolores cumque suscipit!\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus adipisci, quisquam velit magni atque in rerum at aliquid repudiandae amet delectus voluptatum quis recusandae qui officiis fugit non deleniti reprehenderit.', 29, '2014-09-21 18:04:22', '2014-09-25 16:08:54'),
    (10, 'The Mysterious Affair at Styles', 'detective, adventure', 'Agatha Christie', 1, 0, 'mysteriousaffairatstyles.jpg', 'Paid', 'Downloadable', 12, 10, 0, 0, 'the-mysterious-affair-at-styles', 'The Mysterious Affair at Styles', 'The Mysterious Affair at Styles', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi quos, placeat fugit.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At labore praesentium porro, ab libero! Sequi saepe quos explicabo eos cum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Quas sapiente asperiores consectetur quo ad inventore, ut numquam impedit sit, consequatur, adipisci voluptas minima ratione tempore at doloremque laborum error architecto est. Expedita, tempore, sequi reiciendis laudantium velit obcaecati? Numquam minus facere, quaerat doloribus blanditiis soluta eveniet quidem cupiditate sit vero?', 10, '2014-09-21 18:26:47', '2014-09-25 16:31:41'),
    (11, 'Beowulf', 'Adventure, Epic', 'J. Lesslie Hall', 1, 1, '9788866611189.225x225-75__.jpg', 'Paid', 'Downloadable', 10, 7, 0, 0, 'beowulf', 'Beowulf', 'Beowulf', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur officia vero quaerat, debitis incidunt nam. Ad, necessitatibus, assumenda. Voluptate optio minima, beatae minus rerum, sint in. Dolore provident nemo tempore!\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam, inventore.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Est architecto error provident sint harum aliquid minus nisi eaque nobis expedita dolorem, sequi repudiandae. Blanditiis cumque, possimus placeat nihil! Necessitatibus nesciunt magnam, similique. Animi, nobis, perspiciatis! Corporis placeat illo voluptates minus saepe, voluptatem aliquam eaque repellat optio architecto dolores quia atque voluptas aut nisi sed! Quis maiores deleniti voluptate repellat, iure adipisci maxime consequatur deserunt dolores eligendi saepe, a asperiores accusantium.', 16, '2014-09-21 18:29:05', '2014-09-25 16:22:02'),
    (12, 'Dracula', 'Adventure, Romance', 'Bram Stoker', 1, 1, 'Dracpos.jpg', 'Paid', 'Downloadable', 25, 20, 0, 0, 'dracula', 'Dracula', 'Dracula', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui fugit iusto non consequuntur aliquid eligendi, facilis ipsam est, beatae voluptates ex enim illum consectetur sit, ipsa quasi illo autem provident expedita sed esse sapiente. Cumque repellat, sapiente porro autem perferendis. Consectetur fuga, ut quia rerum. Ex porro eaque possimus unde pariatur vel veniam ad dolorem aspernatur dolore iure beatae expedita, natus eum, in quia ipsa. Id ullam eius, accusantium eos.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur soluta, ex ab modi labore cum aspernatur atque maxime mollitia itaque porro praesentium natus dolorum, aliquam neque minus odit debitis libero?\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Quas dolor autem totam, dolorem, repellendus consectetur! Alias illum quae, id nulla.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Porro aut aliquid quod, provident vitae? Aspernatur veniam sunt ipsa maiores perspiciatis enim commodi quidem maxime aut.', 6, '2014-09-21 18:30:56', '2014-09-25 16:22:07'),
    (13, 'Wuthering Heights', 'Fiction, Novel, Gothic fiction', 'Emily Brontë', 1, 0, 'emily-bronte-wuthering-heights-cover-detail.jpg', 'Paid', 'Downloadable', 7, 5, 0, 0, 'wuthering-heights', 'Wuthering Heights', 'Wuthering Heights', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, deserunt.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, officia sequi odio cupiditate eaque animi rem eos nesciunt eum, laudantium, et perferendis doloribus rerum distinctio nulla alias commodi obcaecati. Velit repellat odio perspiciatis minus saepe numquam accusamus neque corporis natus delectus consequuntur cupiditate, excepturi illo nostrum, quisquam reprehenderit adipisci deleniti sint? Cumque aspernatur ipsum quos minus fuga. Fugiat, eos? Sit distinctio modi, doloribus vel, nobis doloremque suscipit harum et atque!', 20, '2014-09-21 18:32:42', '2014-09-25 16:24:39'),
    (14, 'Peter Pan', 'Adventure', 'J. M. Barrie', 1, 1, 'J-M-Barrie-s-Peter-Pan-peter-pan-8795389-292-450.jpg', 'Paid', 'Downloadable', 10, 10, 0, 0, 'peter-pan', 'Peter Pan', 'Peter Pan', '', '', '', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, doloribus? Consequatur laborum corporis reprehenderit tenetur aliquid amet at eum deleniti non, dicta a cupiditate iusto labore aut architecto omnis quidem asperiores? Dolore repudiandae iusto, tenetur, tempora perspiciatis impedit consequatur omnis!\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, quo odio consequuntur expedita velit, magnam!', 9, '2014-09-21 18:34:51', '2014-09-25 16:22:14'),
    (15, 'The Yellow Wallpaper', 'Sociology, Fiction, Biography', 'Charlotte Perkins Gilman', 1, 0, '200px-Yellowwp_med.jpg', 'Paid', 'Downloadable', 10, 8, 0, 0, 'the-yellow-wallpaper', 'The Yellow Wallpaper', 'The Yellow Wallpaper', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos excepturi pariatur molestias.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas tempora consequuntur veniam, eos voluptatum libero, labore sed nam, quia minus odio numquam, facere nobis iusto.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos cumque perspiciatis fuga ut mollitia aut, ullam, pariatur accusantium esse, expedita fugiat saepe a quis iste nesciunt optio culpa molestiae quam.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi quidem, tempora quaerat quos odio id, eveniet consectetur eum ut, iste nam maiores soluta earum vero quasi ipsam rem nulla iure eligendi facilis. Repellat error aliquid distinctio laboriosam dolore quis incidunt!', 3, '2014-09-21 18:36:40', '2014-09-25 16:30:56'),
    (16, 'The Importance of Being Earnest', 'Trivial Comedy', 'Oscar Wilde', 1, 1, 'importance-being-earnest-a-trivial-comedy-for-serious-oscar-wilde-paperback-cover-art.jpg', 'Paid', 'Downloadable', 20, 19, 0, 0, 'the-importance-of-being-earnest', 'The Importance of Being Earnest - A Trivial Comedy for Serious People', 'The Importance of Being Earnest - A Trivial Comedy for Serious People', '', '', '', 'The Importance of Being Earnest - A Trivial Comedy for Serious People', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia tempora quaerat similique veniam, nisi, suscipit rerum? Alias quas, autem aperiam obcaecati dolor earum voluptatum, harum nobis praesentium veniam reiciendis minus quasi tenetur blanditiis velit sunt totam deserunt voluptatem fuga! Rem facere aspernatur ullam, placeat autem consequatur provident aliquid cum ipsam possimus dolore dolorem cumque velit eos impedit fuga quasi. Deserunt numquam et porro corrupti enim excepturi nihil iure omnis neque.', 10, '2014-09-21 18:38:10', '2014-09-25 16:28:22'),
    (17, 'The Divine Comedy', 'Epic poetry', 'Dante Illustrated by Dante Alighieri', 1, 1, 'Divine-Comedy-Dante-Alighieri.jpg', 'Paid', 'Downloadable', 25, 20, 0, 0, 'the-divine-comedy', 'The Divine Comedy', 'The Divine Comedy', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus, minima.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores labore esse voluptas ex dolorem, doloribus omnis ab dolores atque vero.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam impedit quae, mollitia voluptatum nihil esse. Modi, iste atque vero. Obcaecati error iste cumque consequatur labore unde perspiciatis, incidunt sequi maiores, a quasi. Eaque eveniet, enim distinctio veniam molestiae eius. Voluptate.', 7, '2014-09-21 18:40:45', '2014-09-27 02:09:45'),
    (18, 'Siddhartha', 'Fiction, Speculative', 'Hermann Hesse', 1, 0, 'hermann_Hesse_Siddhartha-500x500.jpg', 'Paid', 'Downloadable', 12, 11, 0, 0, 'siddhartha', 'Siddhartha', 'Siddhartha', '', '', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto placeat, eius similique, incidunt quisquam nostrum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores accusamus doloremque, in!\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, animi vel nostrum illo qui. Vero, molestiae, similique. Illo inventore itaque quam voluptates, dolorum eos minima tenetur libero possimus cupiditate. Optio debitis quis adipisci corporis nobis repudiandae minima, quaerat voluptatibus veritatis doloribus amet. Sed pariatur amet, modi commodi debitis quos hic?', 2, '2014-09-21 18:43:04', '2014-09-25 16:31:05'),
    (19, 'Metamorphosis', 'Fiction', 'Franz Kafka', 1, 0, '7513729.jpg', 'Paid', 'Downloadable', 5, 4, 0, 0, 'metamorphosis', 'Metamorphosis', 'Metamorphosis', '', '', '', 'Metamorphosis by Franz Kafka', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo numquam voluptatibus quos quibusdam voluptatem illum, libero eveniet nihil incidunt pariatur expedita esse, minus laborum ipsum molestias cumque earum eos. Dignissimos cumque quae nemo eveniet beatae magni natus, soluta qui nam asperiores necessitatibus, non explicabo voluptas alias. Recusandae suscipit corporis totam.', 1, '2014-09-21 18:45:17', '2014-09-25 16:31:08'),
    (20, 'The Picture of Dorian Gray', 'Philosophical, Fiction', 'Oscar Wilde', 1, 0, 'thepictureofdoriangray.jpg', 'Paid', 'Downloadable', 7, 6, 0, 0, 'the-picture-of-dorian-gray', 'The Picture of Dorian Gray by Oscar Wilde', 'The Picture of Dorian Gray by Oscar Wilde', '', '', '', 'The Picture of Dorian Gray by Oscar Wilde', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime provident est magnam itaque iste, atque aliquam vero vitae, aspernatur sed!\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet reprehenderit beatae odio tenetur adipisci non optio nam, ipsum cumque. Vitae provident accusantium sit, ad distinctio eum cupiditate? Cupiditate perferendis sint accusantium voluptatum inventore, asperiores consectetur ut nobis fugiat voluptates, ex?', 3, '2014-09-21 18:47:21', '2014-09-25 16:31:11'),
    (21, 'Leaves of Grass', 'poetry', 'Walt Whitman', 1, 0, 'leaves-grass-classic-collection-walt-whitman-cd-cover-art.jpg', 'Paid', 'Downloadable', 12, 12, 0, 0, 'leaves-of-grass', 'Leaves of Grass by Walt Whitman', 'Leaves of Grass by Walt Whitman', '', '', '', 'Grab a copy of Walt Whitman’s global best seller LEAVES OF GRASS before its movie adaption hits the theaters worldwide.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, tempora illo ab, commodi, laboriosam laborum consectetur possimus aperiam iusto sint eos enim quis similique. Iure cum aut nisi consequuntur, atque, praesentium quas odit et ad repellat, dolorum! Necessitatibus nesciunt vel adipisci quibusdam libero, quaerat perspiciatis voluptas fugiat? Blanditiis corporis temporibus quos eveniet nostrum adipisci, sapiente dolor architecto laudantium, fuga autem repellat quis facilis, perspiciatis explicabo quisquam amet quia! Repellendus nam eligendi ut dicta, obcaecati tempora exercitationem fugiat eaque distinctio commodi.', 42, '2014-09-21 18:49:03', '2014-09-25 17:38:50'),
    (22, 'The Adventures of Tom Sawyer', 'Adventure, Action', 'Mark Twain', 1, 0, '72.jpg', 'Paid', 'Downloadable', 5, 4, 0, 0, 'the-adventures-of-tom-sawyer', 'The Adventures of Tom Sawyer by Mark Twain', 'The Adventures of Tom Sawyer by Mark Twain', '', '', '', 'The Adventures of Tom Sawyer by Mark Twain', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio quas porro earum vero facilis asperiores voluptatem maiores harum repellendus, velit necessitatibus nostrum illum commodi ipsam quos dolor eius, iste unde!\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Odit, ab laudantium libero. Modi pariatur autem molestiae maiores iure aspernatur similique.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, necessitatibus.', 2, '2014-09-21 18:50:57', '2014-09-25 16:31:15'),
    (23, 'The Prince', 'Adventure', 'Niccolò Machiavelli', 1, 0, 'machiavelli.jpg', 'Paid', 'Downloadable', 15, 10, 0, 0, 'the-prince', 'The Prince by Niccolò Machiavelli', 'The Prince by Niccolò Machiavelli', '', '', '', 'The Prince by Niccolò Machiavelli', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia eligendi cumque, sunt quam aliquid consectetur quibusdam, commodi nostrum deleniti laboriosam asperiores optio! Eaque reiciendis incidunt obcaecati unde atque minima et repudiandae odio officia at voluptatum tempore vero nihil, est eligendi repellat sapiente voluptatem ad optio ex nobis aperiam quo porro deserunt explicabo! Doloribus odio minus eos, quaerat laudantium! Neque culpa at, veniam voluptatibus recusandae eum aperiam dolor ipsum, dolore doloremque.', 21, '2014-09-21 18:52:47', '2014-09-25 16:31:18'),
    (24, 'The Girl Next Door', 'Romance, Teen', 'Augusta Huiell Seaman', 1, 0, 'girl_next_door.jpg', 'Paid', 'Downloadable', 7, 7, 0, 0, 'the-girl-next-door', 'The Girl Next Door by Augusta Huiell Seaman', 'The Girl Next Door by Augusta Huiell Seaman', '', '', '', 'The Girl Next Door by Augusta Huiell Seaman', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab voluptas adipisci eligendi, ex quos est aspernatur veniam impedit hic quas animi debitis a, soluta magnam facilis, fuga ipsa! Nihil quia nobis eligendi sequi, ea aspernatur adipisci architecto deserunt a aut, eos sapiente accusamus tenetur hic nulla enim consequatur deleniti temporibus.', 5, '2014-09-21 18:54:38', '2014-09-25 16:31:21'),
    (25, 'Grimms - Fairy Tales', 'German fairy tales', 'Jacob Grimm and Wilhelm Grimm', 1, 0, '709306_w185.png', 'Paid', 'Downloadable', 4, 4, 0, 0, 'grimms-fairy-tales', 'Grimms - Fairy Tales by Jacob Grimm and Wilhelm Grimm', 'Grimms_ Fairy Tales by Jacob Grimm and Wilhelm Grimm', '', '', '', 'Grimms - Fairy Tales by Jacob Grimm and Wilhelm Grimm', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora quisquam praesentium, voluptatem error laudantium ex soluta cumque suscipit neque ab, harum reiciendis! Rerum itaque amet eaque iure at fugit cumque quos doloremque, a ut. Adipisci, sint cupiditate, labore ad veritatis hic laborum, vitae quo tenetur blanditiis nesciunt error. Sapiente, excepturi.', 2, '2014-09-21 18:56:35', '2014-09-25 16:31:30'),
    (26, 'Alice\'s Adventures  in Wonderland', 'Fiction, Fantasy, Children\'s literature', 'Lewis Carroll', 1, 1, '22.jpg', 'Paid', 'Downloadable', 12, 10, 0, 0, 'alices-adventures-in-wonderland', 'Alice\'s Adventures in Wonderland by Lewis Carroll', 'Alice\'s Adventures in Wonderland by Lewis Carroll', '', '', '', 'Alice\'s Adventures in Wonderland by Lewis Carroll', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur aliquam natus veritatis, dolorum libero voluptates non temporibus itaque hic aspernatur.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, architecto quibusdam iure alias, sapiente, consequatur mollitia voluptates hic dolore repellat corporis vitae aut amet saepe id. Rem necessitatibus ullam dolor magnam! Vitae blanditiis veritatis, ut eos facere enim at sed incidunt quae ducimus laboriosam, dicta tempore deleniti, delectus sunt! Dolore.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur ab non doloremque nam officia explicabo illo ex consequuntur earum. Quisquam numquam, repellat voluptatum aliquam iste illum, iure. Architecto, culpa, saepe!', 5, '2014-09-21 18:58:53', '2014-09-25 16:02:41'),
    (27, 'The Adventures of Sherlock Holmes', 'detective, adventure, action', 'Arthur Conan Doyle', 1, 1, 'eBook_601_32587.jpg', 'Paid', 'Downloadable', 5, 4, 0, 0, 'the-adventures-of-sherlock-holmes', 'The Adventures of Sherlock Holmes by Arthur Conan Doyle', 'The Adventures of Sherlock Holmes by Arthur Conan Doyle', '', '', '', 'The Adventures of Sherlock Holmes by Arthur Conan Doyle', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste aperiam suscipit quia sunt unde dolores laboriosam nihil fuga perspiciatis molestias.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat autem doloremque beatae quibusdam a praesentium sapiente laborum aliquid. Quibusdam repellendus, facere, omnis quaerat molestiae esse, laboriosam officia laborum, veniam dolores veritatis. Molestiae illum magnam assumenda, inventore saepe esse, sed cum?\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate, nihil.', 5, '2014-09-21 19:00:56', '2014-09-25 16:31:35'),
    (28, 'Pride and Prejudice', 'manners', 'Jane Austen', 1, 0, 'pride-and-prejudice.jpg', 'Paid', 'Downloadable', 4, 3.5, 0, 0, 'pride-and-prejudice', 'Pride and Prejudice by Jane Austen', 'Pride and Prejudice by Jane Austen', '', '', '', 'Pride and Prejudice by Jane Austen', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, maiores.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Facere quisquam minus sint, cupiditate sed itaque eaque ut architecto, veritatis veniam!\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. In nostrum fuga dolorem incidunt nulla hic ducimus, itaque veniam assumenda. Fugiat sequi harum alias delectus deleniti perferendis ad exercitationem dolores voluptas.', 9, '2014-09-21 19:02:51', '2014-09-25 16:31:38');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;


-- Dumping structure for table bookmart.products_categories
CREATE TABLE IF NOT EXISTS `products_categories` (
  `products_categories_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`products_categories_id`)
) ENGINE=InnoDB AUTO_INCREMENT=372 DEFAULT CHARSET=utf8;

-- Dumping data for table bookmart.products_categories: ~86 rows (approximately)
/*!40000 ALTER TABLE `products_categories` DISABLE KEYS */;
INSERT INTO `products_categories` (`products_categories_id`, `product_id`, `category_id`) VALUES
    (267, 26, 1),
    (268, 26, 2),
    (269, 26, 3),
    (270, 26, 6),
    (271, 1, 6),
    (272, 6, 1),
    (273, 6, 2),
    (274, 6, 3),
    (275, 7, 3),
    (276, 7, 4),
    (277, 7, 5),
    (278, 7, 9),
    (279, 8, 2),
    (280, 8, 3),
    (281, 8, 6),
    (282, 9, 1),
    (283, 9, 2),
    (284, 9, 6),
    (285, 11, 1),
    (286, 11, 2),
    (287, 11, 3),
    (288, 12, 1),
    (289, 12, 2),
    (290, 12, 3),
    (291, 12, 4),
    (297, 14, 2),
    (298, 14, 3),
    (299, 14, 6),
    (300, 13, 2),
    (301, 13, 4),
    (302, 13, 5),
    (303, 13, 6),
    (304, 13, 9),
    (308, 16, 2),
    (309, 16, 4),
    (310, 16, 6),
    (311, 2, 1),
    (312, 2, 6),
    (313, 15, 1),
    (314, 15, 2),
    (315, 15, 4),
    (316, 15, 6),
    (320, 18, 1),
    (321, 18, 2),
    (322, 18, 4),
    (323, 18, 6),
    (324, 19, 1),
    (325, 19, 2),
    (326, 19, 3),
    (327, 19, 6),
    (328, 20, 1),
    (329, 20, 4),
    (330, 20, 6),
    (331, 22, 1),
    (332, 22, 2),
    (333, 22, 4),
    (334, 23, 1),
    (335, 23, 2),
    (336, 23, 3),
    (337, 23, 6),
    (338, 23, 9),
    (339, 24, 1),
    (340, 24, 2),
    (341, 24, 3),
    (342, 24, 5),
    (343, 24, 6),
    (344, 25, 1),
    (345, 25, 2),
    (346, 25, 4),
    (347, 27, 1),
    (348, 27, 2),
    (349, 27, 3),
    (350, 27, 6),
    (351, 28, 1),
    (352, 28, 2),
    (353, 10, 1),
    (354, 10, 2),
    (355, 10, 3),
    (356, 10, 6),
    (365, 21, 1),
    (366, 21, 2),
    (367, 21, 4),
    (368, 21, 5),
    (369, 17, 1),
    (370, 17, 2),
    (371, 17, 6);
/*!40000 ALTER TABLE `products_categories` ENABLE KEYS */;


-- Dumping structure for table bookmart.products_ebooks
CREATE TABLE IF NOT EXISTS `products_ebooks` (
  `products_ebooks_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`products_ebooks_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- Dumping data for table bookmart.products_ebooks: ~25 rows (approximately)
/*!40000 ALTER TABLE `products_ebooks` DISABLE KEYS */;
INSERT INTO `products_ebooks` (`products_ebooks_id`, `product_id`, `name`) VALUES
    (7, 1, 'A_Study_in_Scarlet_by_Arthur_Conan_Doyle.epub'),
    (8, 2, 'Three_Men_in_a_Boat_by_Jerome_K._Jerome_.epub'),
    (9, 6, 'Beyond_Good_and_Evil_by_Friedrich_Wilhelm_Nietzsche.epub'),
    (10, 7, 'Treasure_Island_by_Robert_Louis_Stevenson.epub'),
    (11, 8, 'Twelve_Years_a_Slave_by_Solomon_Northup.epub'),
    (12, 9, 'Emma_by_Jane_Austen.epub'),
    (13, 10, 'The_Mysterious_Affair_at_Styles_by_Agatha_Christie.epub'),
    (14, 11, 'Beowulf_by_J._Lesslie_Hall_.epub'),
    (15, 12, 'Dracula_by_Bram_Stoker.epub'),
    (16, 13, 'Wuthering_Heights_by_Emily_Bronta.epub'),
    (17, 14, 'Peter_Pan_by_J._M_._Barrie_.epub'),
    (18, 15, 'The_Yellow_Wallpaper_by_Charlotte_Perkins_Gilman.epub'),
    (19, 16, 'The_Importance_of_Being_Earnest__A_Trivial_Comedy_for_Serious_People_by_Oscar_Wilde.epub'),
    (20, 17, 'The_Divine_Comedy_by_Dante__Illustrated_by_Dante_Alighieri.epub'),
    (21, 18, 'Siddhartha_by_Hermann_Hesse.epub'),
    (22, 19, 'Metamorphosis_by_Franz_Kafka.epub'),
    (23, 20, 'The_Picture_of_Dorian_Gray_by_Oscar_Wilde.epub'),
    (24, 21, 'Leaves_of_Grass_by_Walt_Whitman.epub'),
    (25, 22, 'The_Adventures_of_Tom_Sawyer_by_Mark_Twain.epub'),
    (26, 23, 'The_Prince_by_Niccola_Machiavelli.epub'),
    (27, 24, 'The_Girl_Next_Door_by_Augusta_Huiell_Seaman.epub'),
    (28, 25, 'Grimms__Fairy_Tales_by_Jacob_Grimm_and_Wilhelm_Grimm.epub'),
    (29, 26, 'Alice_s_Adventures_in_Wonderland_by_Lewis_Carroll.epub'),
    (30, 27, 'The_Adventures_of_Sherlock_Holmes_by_Arthur_Conan_Doyle.epub'),
    (31, 28, 'Pride_and_Prejudice_by_Jane_Austen.epub');
/*!40000 ALTER TABLE `products_ebooks` ENABLE KEYS */;


-- Dumping structure for table bookmart.products_images
CREATE TABLE IF NOT EXISTS `products_images` (
  `products_images_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `is_cover` tinyint(1) NOT NULL,
  `is_promotion` tinyint(1) NOT NULL,
  `is_slider` tinyint(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`products_images_id`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8;

-- Dumping data for table bookmart.products_images: ~58 rows (approximately)
/*!40000 ALTER TABLE `products_images` DISABLE KEYS */;
INSERT INTO `products_images` (`products_images_id`, `product_id`, `is_cover`, `is_promotion`, `is_slider`, `name`, `updated_at`) VALUES
    (77, 28, 1, 0, 0, 'pride-and-prejudice.jpg', '0000-00-00 00:00:00'),
    (78, 28, 0, 0, 0, 'pride-prejudice-jane-austen-paperback-cover-art.jpg', '0000-00-00 00:00:00'),
    (79, 27, 1, 0, 0, 'eBook_601_32587.jpg', '0000-00-00 00:00:00'),
    (80, 27, 0, 0, 0, 'collins-classics.jpg', '0000-00-00 00:00:00'),
    (81, 26, 1, 0, 0, '22.jpg', '0000-00-00 00:00:00'),
    (82, 26, 0, 0, 0, 'alice06.jpg', '0000-00-00 00:00:00'),
    (83, 25, 1, 0, 0, '709306_w185.png', '0000-00-00 00:00:00'),
    (84, 25, 0, 0, 0, 'Grimms_Fairy_Stories.jpg', '0000-00-00 00:00:00'),
    (85, 25, 0, 0, 0, 'images.jpg', '0000-00-00 00:00:00'),
    (87, 24, 1, 0, 0, 'girl_next_door.jpg', '2014-09-25 19:39:42'),
    (88, 24, 0, 0, 0, 'ill_001.jpg', '0000-00-00 00:00:00'),
    (89, 23, 1, 0, 0, 'machiavelli.jpg', '0000-00-00 00:00:00'),
    (90, 23, 0, 0, 0, 'Prince_0.jpg', '0000-00-00 00:00:00'),
    (91, 22, 1, 0, 0, '72.jpg', '0000-00-00 00:00:00'),
    (92, 22, 0, 0, 0, 'Mark-Twain.jpg', '0000-00-00 00:00:00'),
    (93, 22, 0, 0, 0, 'tom.jpg', '0000-00-00 00:00:00'),
    (94, 21, 1, 1, 0, 'leaves-grass-classic-collection-walt-whitman-cd-cover-art.jpg', '2014-09-25 19:40:12'),
    (95, 21, 0, 1, 0, 'Why-did-wlat-whitman-write-Leaves-of-Grass.jpg', '2014-09-25 19:40:37'),
    (96, 20, 1, 0, 0, 'thepictureofdoriangray.jpg', '0000-00-00 00:00:00'),
    (97, 20, 0, 0, 0, 'the-picture-of-dorian-gray-7.jpg', '0000-00-00 00:00:00'),
    (98, 19, 1, 0, 0, '7513729.jpg', '0000-00-00 00:00:00'),
    (99, 19, 0, 0, 0, 'metamorphosis.jpg', '0000-00-00 00:00:00'),
    (100, 18, 1, 0, 0, 'hermann_Hesse_Siddhartha-500x500.jpg', '0000-00-00 00:00:00'),
    (101, 18, 0, 0, 0, 'siddhartha.jpg', '0000-00-00 00:00:00'),
    (102, 17, 1, 0, 0, 'Divine-Comedy-Dante-Alighieri.jpg', '0000-00-00 00:00:00'),
    (103, 17, 0, 0, 0, 'inferno.jpg', '0000-00-00 00:00:00'),
    (104, 16, 1, 0, 0, 'importance-being-earnest-a-trivial-comedy-for-serious-oscar-wilde-paperback-cover-art.jpg', '0000-00-00 00:00:00'),
    (105, 16, 0, 0, 0, 'the_importance_of_being_earnest-1.480x480-75__.jpg', '0000-00-00 00:00:00'),
    (106, 15, 1, 0, 0, '200px-Yellowwp_med.jpg', '0000-00-00 00:00:00'),
    (107, 15, 0, 0, 0, 'yellow-wallpaper.jpg', '0000-00-00 00:00:00'),
    (108, 14, 1, 0, 0, 'J-M-Barrie-s-Peter-Pan-peter-pan-8795389-292-450.jpg', '0000-00-00 00:00:00'),
    (109, 14, 0, 0, 0, 'PeterPan9.jpg', '0000-00-00 00:00:00'),
    (110, 13, 1, 0, 0, 'emily-bronte-wuthering-heights-cover-detail.jpg', '0000-00-00 00:00:00'),
    (111, 13, 0, 0, 0, 'wuthering-heights.jpg', '0000-00-00 00:00:00'),
    (112, 12, 1, 0, 0, 'Dracpos.jpg', '0000-00-00 00:00:00'),
    (113, 12, 0, 0, 0, 'dracula_book_cover_1902_doubleday_89.jpg', '0000-00-00 00:00:00'),
    (114, 11, 1, 0, 0, '9788866611189.225x225-75__.jpg', '0000-00-00 00:00:00'),
    (115, 11, 0, 0, 0, 'beowulf-j-lesslie-hall-21672257.jpg', '0000-00-00 00:00:00'),
    (116, 10, 1, 0, 0, 'mysteriousaffairatstyles.jpg', '0000-00-00 00:00:00'),
    (117, 10, 0, 0, 0, 'the-mysterious-affair-at-styles.jpg', '0000-00-00 00:00:00'),
    (118, 9, 1, 0, 0, 'emma.jpg', '0000-00-00 00:00:00'),
    (119, 9, 0, 0, 0, 'emmabk.jpg', '0000-00-00 00:00:00'),
    (120, 8, 1, 0, 0, '12-years-slave.jpg', '0000-00-00 00:00:00'),
    (121, 8, 0, 0, 0, 'r3rd.jpg', '0000-00-00 00:00:00'),
    (122, 7, 1, 0, 0, '295.jpg', '0000-00-00 00:00:00'),
    (123, 7, 0, 0, 0, 'treasure-island.jpg', '0000-00-00 00:00:00'),
    (124, 6, 1, 0, 0, '57999781775411499237491Pic.jpg', '0000-00-00 00:00:00'),
    (125, 6, 0, 0, 0, 'beyond-good-evil-friedrich-wilhelm-nietzsche-paperback-cover-art.jpg', '0000-00-00 00:00:00'),
    (126, 1, 1, 0, 0, 'ArthurConanDoyle_AStudyInScarlet_annual.jpg', '0000-00-00 00:00:00'),
    (127, 1, 0, 0, 0, 'cover.jpg', '0000-00-00 00:00:00'),
    (128, 1, 0, 0, 0, 'study_in_scarlet_sherlock4.jpg', '0000-00-00 00:00:00'),
    (129, 2, 1, 0, 0, 'A008727.jpg', '0000-00-00 00:00:00'),
    (130, 2, 0, 0, 0, 'three_man_in_a_boat.jpg', '0000-00-00 00:00:00'),
    (131, 21, 0, 1, 0, 'Leaves_Of_Grass_web_text1.jpg', '2014-09-25 19:50:04'),
    (132, 27, 0, 0, 1, 'adventures-of-sherlock-holmes-1.jpg', '2014-09-25 19:44:07'),
    (133, 28, 0, 0, 1, 'pride-prejudice-01-4x6.jpg', '2014-09-25 19:46:53'),
    (134, 11, 0, 0, 1, 'be-intro.jpg', '2014-09-25 19:49:17'),
    (135, 8, 0, 0, 1, '12_Years_a_Slave_1.jpg', '2014-09-25 19:53:35');
/*!40000 ALTER TABLE `products_images` ENABLE KEYS */;


-- Dumping structure for table bookmart.promotions
CREATE TABLE IF NOT EXISTS `promotions` (
  `promotion_id` int(11) NOT NULL AUTO_INCREMENT,
  `image` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`promotion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table bookmart.promotions: ~0 rows (approximately)
/*!40000 ALTER TABLE `promotions` DISABLE KEYS */;
/*!40000 ALTER TABLE `promotions` ENABLE KEYS */;


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
  `joined` datetime NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `reset_code` (`reset_code`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table bookmart.users: 4 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `country_id`, `user_type`, `first_name`, `last_name`, `dob`, `email`, `password`, `reset_code`, `phone`, `city`, `avatar`, `profile_desc`, `blocked`, `joined`) VALUES
    (1, 99, 'normal_user', 'Nivin', 'CP', '0000-00-00', 'nivincp@gmail.com', '32250170a0dca92d53ec9624f336ca24', NULL, '', 'Kochi', '', '', 0, '0000-00-00 00:00:00'),
    (2, 225, 'normal_user', 'Alex', 'G', '0000-00-00', 'alex@gmail.com', '32250170a0dca92d53ec9624f336ca24', NULL, '', 'London', '', '', 1, '0000-00-00 00:00:00'),
    (4, 0, 'admin', 'Admin', '', '0000-00-00', 'admin@bookmart.com', '32250170a0dca92d53ec9624f336ca24', NULL, '', '', '', '', 0, '0000-00-00 00:00:00'),
    (9, 225, 'normal_user', 'Sam', 'Peter', '0000-00-00', 'sam@gmail.com', '32250170a0dca92d53ec9624f336ca24', NULL, '', 'London', '', '', 0, '2014-09-26 17:00:41');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
