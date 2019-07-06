-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2017 at 01:23 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asiana`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `TempID` int(5) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Phone_Number` int(10) NOT NULL,
  `Email_id` varchar(255) NOT NULL,
  `Message` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`TempID`, `Name`, `Phone_Number`, `Email_id`, `Message`) VALUES
(104, 'fsd gjsgkj gs', 412205541, 'bfdhf@gmail.com', 'this is a test email to test the insertiion of message in the database in database '),
(103, 'bhauadnn', 412205541, 'bfjdfh@mgajflak.com', 'sf ghs fgsfswfg gsgh gdsf  uhh'),
(102, 'buwamdf', 412545124, 'bhuwam@gmail.com', 'gsffh sdk rtsfgsif dsfdiy fsdiyt');

-- --------------------------------------------------------

--
-- Table structure for table `customer_data`
--

CREATE TABLE `customer_data` (
  `CustID` int(8) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Header` mediumtext NOT NULL,
  `Main` longtext NOT NULL,
  `Footer` mediumtext NOT NULL,
  `Images` varchar(255) NOT NULL,
  `template_Used` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `CustID` int(8) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Phone_Number` int(10) NOT NULL,
  `Email_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`CustID`, `Name`, `LastName`, `Phone_Number`, `Email_id`) VALUES
(6, 'Phuong', 'Tran', 431753546, 'mrjohnnytran@icloud.com'),
(8, 'Phuong1', 'Tran', 431753546, 'mrjohnnytran@icloud.com');

-- --------------------------------------------------------

--
-- Table structure for table `login_log`
--

CREATE TABLE `login_log` (
  `ID` int(10) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Last_log` timestamp NOT NULL,
  `Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_log`
--

INSERT INTO `login_log` (`ID`, `Username`, `Last_log`, `Type`) VALUES
(1, '', '2017-08-29 12:09:14', 'abcd'),
(2, '', '2017-08-29 12:09:51', 'abcd'),
(3, '', '2017-08-29 12:13:06', 'admin'),
(4, 'parminder', '2017-09-24 10:37:30', '2'),
(5, 'bhuwam', '2017-09-24 10:37:41', '1'),
(6, 'bhuwam', '2017-09-24 10:39:02', '1'),
(7, 'parminder', '2017-09-24 10:39:09', '2'),
(8, 'bhuwam', '2017-09-24 10:54:50', '1'),
(9, 'parminder', '2017-09-24 10:55:03', '2'),
(10, 'bhuwam', '2017-09-24 11:29:43', '1'),
(11, 'parminder', '2017-09-24 11:29:54', '2'),
(12, 'parminder', '2017-09-24 11:30:58', '2'),
(13, 'bhuwam', '2017-09-24 11:31:06', '1'),
(14, 'parminder', '2017-09-24 11:42:04', '2'),
(15, 'siman', '2017-09-24 11:50:25', '1'),
(16, 'bhuwam', '2017-09-24 12:04:34', '1'),
(17, 'parminder', '2017-09-24 12:10:26', '2'),
(18, 'parminder', '2017-09-24 12:10:35', '2'),
(19, 'bhuwam', '2017-09-24 12:12:40', '1'),
(20, 'bhuwam', '2017-09-24 12:38:32', '1'),
(21, 'parminder', '2017-09-24 12:40:22', '2'),
(22, 'parminder', '2017-09-24 12:41:14', '2'),
(23, 'parminder', '2017-09-24 12:42:32', '2'),
(24, 'parminder', '2017-09-24 12:43:44', '2'),
(25, 'bhuwam', '2017-09-24 23:48:10', '1'),
(26, 'bhuwam', '2017-09-24 23:57:13', '1'),
(27, 'admin', '2017-09-25 00:19:57', '2'),
(28, 'admin', '2017-09-25 01:37:37', '2'),
(29, 'admin', '2017-09-25 03:34:34', '2'),
(30, 'admin', '2017-09-25 03:35:14', '2'),
(31, 'admin', '2017-09-25 04:17:36', '2'),
(32, 'admin', '2017-09-27 15:39:44', '2'),
(33, 'admin', '2017-09-27 16:02:36', '2'),
(34, 'admin', '2017-09-27 19:16:37', '2'),
(35, 'admin', '2017-10-01 01:26:20', '2'),
(36, 'admin', '2017-10-01 02:16:13', '2'),
(37, 'admin', '2017-10-01 07:30:46', '2'),
(38, 'admin', '2017-10-01 07:38:48', '2'),
(39, 'phuong', '2017-10-01 07:47:07', '1'),
(40, 'phuong', '2017-10-01 07:59:31', '1'),
(41, 'admin', '2017-10-01 08:04:36', '2'),
(42, 'admin', '2017-10-01 08:08:50', '2'),
(43, 'admin', '2017-10-01 23:47:49', '2'),
(44, 'phuong', '2017-10-01 23:51:27', '1'),
(45, 'admin', '2017-10-02 00:04:43', '2'),
(46, 'phuong', '2017-10-02 00:22:02', '1'),
(47, 'admin', '2017-10-02 00:46:18', '2'),
(48, 'phuong', '2017-10-02 00:54:06', '1'),
(49, 'admin', '2017-10-02 01:22:16', '2'),
(50, 'phuong', '2017-10-02 01:34:07', '1'),
(51, 'admin', '2017-10-02 02:07:21', '2'),
(52, 'admin', '2017-10-02 02:42:19', '2'),
(53, 'phuong', '2017-10-02 02:43:36', '1'),
(54, 'dfdfhggf', '2017-10-02 02:45:08', '1'),
(55, 'admin', '2017-10-02 02:47:00', '2'),
(56, 'admin', '2017-10-03 13:16:30', '2');

-- --------------------------------------------------------

--
-- Table structure for table `page_detail`
--

CREATE TABLE `page_detail` (
  `ID` int(11) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `Page` varchar(50) NOT NULL,
  `Detail` mediumtext NOT NULL,
  `Picture` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_detail`
--

INSERT INTO `page_detail` (`ID`, `Name`, `Page`, `Detail`, `Picture`) VALUES
(1, 'premium service', 'HOME', 'Best quality solution for customer aaaa', 0),
(3, 'global solution', 'HOME', 'Provides all things that customers need to succeed .', 0),
(4, 'Header', 'HOME', 'images/page-1_slide1.jpg', 1),
(5, 'premium service', 'HOME', 'images/page-1_img1.jpg', 1),
(6, 'About us', 'ABOUT', 'images/page-2_img1.jpg', 1),
(7, 'about us', 'ABOUT', '<p class="lead">\r\n                Asiana Imports\r\n              </p>\r\n              <p>\r\n                Asiana Imports is a Melbourne based consulting company and is a leader in advisory, IT solutions and is also involved in a supporting educational organisations.\r\n                <br /><br />\r\n              	AI works in partnership with industry experts and trade associations to gain the widest possible reach\r\n				<br /><br />\r\n                 Asiana Imports can deliver you unique solutions that produce real results. Our success is built on the success of our clients. Our purpose is to help our clients achieve their vision by working as partners to deliver excellent service with the highest levels of integrity. This will continue to be the foundation of our success, today and into the future\r\n\r\n              </p>', 0),
(8, 'meet our team/inga north', 'ABOUT', 'images/page-2_img2.jpg', 1),
(9, 'meet our team/tom nelson', 'ABOUT', 'images/page-2_img3.jpg', 1),
(10, 'meet our team/ivana wong', 'ABOUT', 'images/page-2_img4.jpg', 1),
(11, 'meet our team/inga north', 'ABOUT', 'With 12+ years if experience in the industry. Inga passion lies in the space of change and transformation of digital and technology world.\r\n', 0),
(12, 'meet our team/richard cox', 'ABOUT', 'images/page-2_img5.jpg', 1),
(13, 'meet our team/richard cox', 'ABOUT', 'Experienced Developer with a demonstrated history of working in the computer software industry. Skilled in PHP, WordPres and Laravel. Strong engineering professional with a Bachelor of Science (B.S.) focused in Computer Engineering from BIHE.', 0),
(14, 'meet our team/tom nelson', 'ABOUT', 'Tom has extensive experience building and leading highly motivated technology teams.', 0),
(15, 'meet our team/ivana wong', 'ABOUT', 'Ivana is a hardworking, highly proficient IT professional with 2.5 years of experience as an Engineer with a real passion for SQL development.\r\n', 0),
(50, 'featured service/consultancy thump', 'SERVICES', 'images/page-3_img1_original.jpg', 1),
(51, 'featured services/IT solutions thump', 'SERVICES', 'images/page-3_img2_original.jpg', 1),
(16, 'our history', 'ABOUT', '<article class=\'media offs2\'>\r\n                <div class="media-left text-center">\r\n                  <time datetime=\'2015\'>2009 -</time>\r\n                </div>\r\n                <div class="media-body">                  \r\n                  <p>\r\n                    History of Asiana Imports\r\n                  </p>\r\n                </div>\r\n              </article>\r\n\r\n              <article class=\'media\'>\r\n                <div class="media-left text-center">\r\n                  <time datetime=\'2015\'>2010 -</time>\r\n                </div>\r\n                <div class="media-body">                  \r\n                  <p>\r\n                    History of Asiana Imports\r\n                  </p>\r\n                </div>\r\n              </article>\r\n              \r\n              <article class=\'media\'>\r\n                <div class="media-left text-center">\r\n                  <time datetime=\'2015\'>2011 -</time>\r\n                </div>\r\n                <div class="media-body">                  \r\n                  <p>\r\n                    History of Asiana Imports\r\n                  </p>\r\n                </div>\r\n              </article>\r\n\r\n              <article class=\'media\'>\r\n                <div class="media-left text-center">\r\n                  <time datetime=\'2015\'>2012 -</time>\r\n                </div>\r\n                <div class="media-body">                  \r\n                  <p>\r\n                    History of Asiana Imports\r\n                  </p>\r\n                </div>\r\n              </article>', 0),
(17, 'jobs', 'ABOUT', '<p class="lead offs2">\r\n                .NET Web Developer\r\n              </p>\r\n\r\n              <p>\r\n                We are looking for a talented .NET web developer who is keen to work on our key clients web projects - both greenfield and enhancing existing web sites/applications.\r\n\r\n              </p>\r\n\r\n              <ul class="marked-list">                \r\n                <li>\r\n                  <a href="#">\r\n                    The opportunity to work with some great brands on some interesting projects\r\n                  </a>\r\n                </li>\r\n                <li>\r\n                  <a href="#">\r\n                    A life outside of work. No pressure to work long hours\r\n                  </a>\r\n                </li>\r\n                <li>\r\n                  <a href="#">\r\n                    Your birthday off every year.\r\n                  </a>\r\n                </li>\r\n                <li>\r\n                  <a href="#">\r\n                    An annual training and personal-development budget\r\n                  </a>\r\n                </li>\r\n                <li>\r\n                  <a href="#">\r\n                    A strong internal support network that encourages personal growth \r\n                  </a>\r\n                </li>\r\n                <li>\r\n                  <a href="#">\r\n                   A competitive salary package\r\n                  </a>\r\n                </li>\r\n              </ul>\r\n\r\n              <p>\r\n                You will be working closely with a team comprising of Project Managers, UX designers and our team of front and back end developers.\r\n              </p>', 0),
(18, 'advantages', 'ABOUT', '<ul class="index-list">\r\n                <li>\r\n                  The main drawback of the sole trade and partnership concerns has been the scarcity of resources. \r\n                </li>\r\n                <li>\r\n                  The liability of members in a company form of organisation is limited to the nominal value of the shares they have acquired\r\n                </li>\r\n                <li>\r\n                  The members of a company may go on changing from time to time but that does not affect the continuity of a company\r\n                </li>\r\n                <li>\r\n                  The availability of large-scale resources enables the company to attract talented persons by offering them higher salaries and better career opportunities\r\n                </li>\r\n              </ul>', 0),
(19, 'purposes', 'ABOUT', '<p class="lead">\r\n                Folor sit amet conse ctetur adipisicing elit\r\n              </p>\r\n\r\n              <p>\r\n                The highest standards of corporate behaviour towards everyone we work with, the communities we touch, and the environment on which we have an impact\r\n              </p>\r\n                <ul class="marked-list offs3">\r\n                  <li>\r\n                    <a href="#">\r\n                      Always working with integrity\r\n                    </a>\r\n                  </li>\r\n                  <li>\r\n                    <a href="#">\r\n                      Positive impact and continuous improvement\r\n                    </a>\r\n                  </li>\r\n                  <li>\r\n                    <a href="#">\r\n                      Setting out our aspirations\r\n                    </a>\r\n                  </li>\r\n                  <li>\r\n                    <a href="#">\r\n                      Working with others\r\n                    </a>\r\n                  </li>\r\n                \r\n                </ul>', 0),
(20, 'testimonial', 'ABOUT', 'images/page-2_img6.jpg', 1),
(21, 'testimonial', 'ABOUT', '<div class="media-body">              \r\n                  <p>\r\n                    <q>\r\n                    "Awesome to work with. Incredibly organized, easy to communicate with, responsive with next iterations, and beautiful work."\r\n                    </q>\r\n                  </p>\r\n                  <cite>\r\n                    Edna Barton,<br />\r\n                    client\r\n                  </cite>\r\n                </div>', 0),
(23, 'featured service/consultancy', 'SERVICES', 'images/page-3_img1.jpg', 1),
(24, 'featured service/consultancy', 'SERVICES', '              <p class="ins767-1">\r\n                The creation of value for organisations, through the application of knowledge, techniques and assets, to improve business performance. This is achieved through the rendering of objective advice and/or the implementation of business solutions\r\n', 0),
(53, 'Footer', 'SERVICES', 'images/parallax2.jpg', 1),
(54, 'Footer', 'SERVICES', '            <strong>\r\n              WE OFFER<br />\r\n              IDEAS THAT RAISE\r\n              <small>\r\n                YOUR BUSINESS\r\n              </small>\r\n            </strong> ', 0),
(25, 'featured services/IT solutions', 'SERVICES', 'images/page-3_img2.jpg', 1),
(26, 'featured services/IT solutions', 'SERVICES', ' <p class="ins767-1">\r\n                IT service discusses as implementation and management of quality service which fulfill our business need and requirement. IT service is performed by IT Service Providers Company or by group of highly skilled people.\r\n              </p>\r\n', 0),
(27, 'featured services/ support academic organisations', 'SERVICES', 'images/page-3_img3.jpg', 1),
(28, 'featured services/ support academic organisations', 'SERVICES', '<p class="ins767-1">\r\n                To provide outreach, professional development, advocacy, and networking opportunities for student and academic affairs professionals interested in learning about and enhancing all aspects of academic support.  We conceptualize academic support to include academic advising; student academic transitions; academic preparedness; and developmental education among other forms of support   <a href="#" class="btn-link l-h1 fa-angle-right"></a>\r\n              </p>', 0),
(29, 'services list', 'SERVICES', '<div class="row offs1">\r\n            <div class="col-md-6 col-sm-12">\r\n              <ul class="link-list wow fadeInLeft" data-wow-duration=\'3s\'>\r\n                <li>\r\n\r\n                  <a href="#">Consultancy IT management services</a>\r\n\r\n                  <a href="#" class="btn-link l-h1 fa-angle-right"></a>\r\n                </li>\r\n                <li>\r\n\r\n                  <a href="#">Advice on imports and exports to South Asia</a>\r\n\r\n                  <a href="#" class="btn-link l-h1 fa-angle-right"></a>\r\n                </li>\r\n                <li>\r\n\r\n                  <a href="#">Imports of Fashion and costume jewellery</a>\r\n\r\n                  <a href="#" class="btn-link l-h1 fa-angle-right"></a>\r\n                </li>\r\n              </ul>\r\n            </div>\r\n            <div class="col-md-6 col-sm-12">\r\n              <p>\r\n                Asiana is a leading provider of IT services, providing IT solutions to a wide range of Customers and industry sectors throughout Australia. We focus on providing services for the small to medium business along with outsourced infrastructure facilities for the larger enterprise. Our business is to deliver high quality IT solutions and maintain a company IT infrastructure. MSP Corporation has offices in Sydney, Melbourne, Brisbane and Perth as well as operations in Canberra, Adelaide and New Zealand.\r\n\r\nOur Team is comprised of Project Management, Technical Consultants from Architects to Field Engineers, Web/Software and Database developers and a Helpdesk Support Team amongst other. We have one goal: To offer IT solutions which are unique and extremely cost effective and establish a long term business relationship with our Customers.\r\n              </p>\r\n            </div>\r\n          </div>', 0),
(30, 'global solution', 'HOME', 'images/page-1_img2.jpg', 1),
(31, 'expertise', 'HOME', 'images/page-1_img3.jpg', 1),
(32, 'expertise', 'HOME', 'Importing from all over the world.', 0),
(33, 'resources', 'HOME', 'images/page-1_img4.jpg', 1),
(34, 'resources', 'HOME', 'Best industry service.', 0),
(35, 'research', 'HOME', 'images/page-1_img5.jpg', 1),
(36, 'research', 'HOME', '', 0),
(37, 'welcome', 'HOME', '<div class="row">\r\n            <div class="col-md-6 col-sm-12">\r\n              <p>Asiana Imports is a Melbourne based consulting company and is a leader in advisory, IT solutions and is also involved in a supporting educational organisations.</p>\r\n              <p>AI works in partnership with industry experts and trade associations to gain the widest possible reach.</p>\r\n            </div>\r\n            <div class="col-md-6 col-sm-12">\r\n              <p>\r\n                 Asiana Imports can deliver you unique solutions that produce real results. Our success is built on the success of our clients. Our purpose is to help our clients achieve their vision by working as partners to deliver excellent service with the highest levels of integrity. This will continue to be the foundation of our success, today and into the future\r\n                <a href="#" class="btn-link l-h1 fa-angle-right"></a>\r\n              </p>\r\n            </div>\r\n          </div>', 0),
(38, 'our services', 'HOME', '<div class="col-md-6 col-sm-12">\r\n              <ul class="link-list wow fadeInLeft" data-wow-duration=\'3s\'>\r\n                <li>\r\n\r\n                  <a href="#">Consultancy IT management services</a>\r\n\r\n                  <a href="#" class="btn-link l-h1 fa-angle-right"></a>\r\n                </li>\r\n                <li>\r\n\r\n                  <a href="#">Advice on imports and exports to South Asia</a>\r\n\r\n                  <a href="#" class="btn-link l-h1 fa-angle-right"></a>\r\n                </li>\r\n                <li>\r\n\r\n                  <a href="#">Imports of Fashion and costume jewellery</a>\r\n\r\n                  <a href="#" class="btn-link l-h1 fa-angle-right"></a>\r\n                </li>\r\n              </ul>\r\n            </div>', 0),
(39, 'our services', 'HOME', 'images/page-1_img6.jpg', 1),
(40, 'Footer', 'HOME', '<strong>\r\n              SAVE TIME,<br />\r\n              SAVE MONEY,\r\n              <small>\r\n                GROW & SUCCEED\r\n              </small>\r\n            </strong>', 0),
(41, 'Footer', 'HOME', 'images/parallax1.jpg', 1),
(42, 'our client', 'HOME', 'images/page-1_img7.jpg', 1),
(43, 'our client', 'HOME', 'images/page-1_img8.jpg', 1),
(44, 'our client', 'HOME', 'images/page-1_img9.jpg', 1),
(45, 'our client', 'HOME', 'images/page-1_img10.jpg', 1),
(46, 'our client', 'HOME', 'images/page-1_img11.jpg', 1),
(47, 'our client', 'HOME', 'images/page-1_img12.jpg', 1),
(48, 'our client', 'HOME', 'images/page-1_img13.jpg', 1),
(49, 'our client', 'HOME', 'images/page-1_img14.jpg', 1),
(52, 'featured services/ support academic organisations thump', 'SERVICES', 'images/page-3_img3_original.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `page_link`
--

CREATE TABLE `page_link` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Link` varchar(50) NOT NULL,
  `Parent` varchar(50) NOT NULL,
  `Level` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_link`
--

INSERT INTO `page_link` (`ID`, `Name`, `Link`, `Parent`, `Level`) VALUES
(1, 'HOME', './', '0', 0),
(2, 'ABOUT', 'index-1.php', '0', 0),
(3, 'SERVICES', 'index-2.php', '0', 0),
(4, 'Consultancy IT management services', '#', 'SERVICES', 1),
(5, 'Smartphone support', '#', 'Consultancy IT management services', 2),
(6, 'Remote Support', '#', 'Consultancy IT management services', 2),
(7, 'Business Continuity and server redundancy', '#', 'Consultancy IT management services', 2),
(8, 'Microsoft Certified IT Professionals', '#', 'Consultancy IT management services', 2),
(9, 'Advice on imports and exports to South Asia', '#', 'SERVICES', 1),
(10, 'Get Advice', 'index-4.php', 'Advice on imports and exports to South Asia', 2),
(11, 'Imports of Fashion and costume jewellery', '#', 'SERVICES', 1),
(12, 'Get Quote', 'index-4.php', 'Imports of Fashion and costume jewellery', 2),
(13, 'CONTACTS', 'index-4.php', '0', 0),
(14, 'LOGIN', 'adminlogin.php', '0', 0),
(15, 'REGISTER', 'registeruser.php', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_information`
--

CREATE TABLE `product_information` (
  `Product_Id` int(6) NOT NULL,
  `Product_Name` varchar(255) NOT NULL,
  `Product_Details` varchar(255) NOT NULL,
  `Product_Price` int(8) NOT NULL,
  `Product_htmlLinks` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Type` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Username`, `Password`, `Type`) VALUES
(4, 'admin', '21232f297a57a5a743894a0e4a801fc3', 2),
(9, 'phuong1', 'e10adc3949ba59abbe56e057f20f883e', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`TempID`);

--
-- Indexes for table `customer_data`
--
ALTER TABLE `customer_data`
  ADD PRIMARY KEY (`CustID`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`CustID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `login_log`
--
ALTER TABLE `login_log`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `page_detail`
--
ALTER TABLE `page_detail`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `page_link`
--
ALTER TABLE `page_link`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product_information`
--
ALTER TABLE `product_information`
  ADD PRIMARY KEY (`Product_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Userame` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `TempID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `CustID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `login_log`
--
ALTER TABLE `login_log`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `page_detail`
--
ALTER TABLE `page_detail`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `page_link`
--
ALTER TABLE `page_link`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `product_information`
--
ALTER TABLE `product_information`
  MODIFY `Product_Id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
