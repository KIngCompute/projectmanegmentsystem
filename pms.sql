-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2016 at 12:32 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `last_logged_in` datetime NOT NULL,
  `last_logged_out` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `last_logged_in`, `last_logged_out`) VALUES
(1, 'Shailesh', 'Nikam', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'shaileshnikam381@gmail.com', '2016-08-29 03:54:10', '2016-08-29 04:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `title`, `description`, `url`, `image`, `status`, `created`, `updated`) VALUES
(7, 'banner3', 'banner3', 'banner3', 'banner3.jpg', 1, '2015-03-31 06:12:49', '2015-03-31 07:36:27'),
(8, 'banner4', 'banner4', 'banner4', 'banner4.jpg', 1, '2015-03-31 06:13:08', '2015-03-31 07:36:57'),
(10, 'banner3', 'Banner 3', 'banner 3', 'Project-Management-and-Stratergy.jpg', 0, '2015-04-14 05:39:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `company` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `website` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `last_logged_out` datetime NOT NULL,
  `ip_address` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `name`, `address`, `contact`, `email`, `username`, `password`, `company`, `country`, `state`, `city`, `zipcode`, `website`, `status`, `created`, `last_logged_out`, `ip_address`) VALUES
(20, 'sunil', 'udhna', '8734836900', 'sunil381@gmail.com', 'sunil', '48ccc87cd7afb85704a63e8d5953d326', 'CMS', '-1', '0', 'surat', '394210', 'www.cms.com', 1, '2016-08-29 12:55:14', '0000-00-00 00:00:00', ''),
(21, 'arvind', 'Surat', '8734836900', 'arvind381@gmail.com', 'arvind', '1fc78fa3df2a0f3f83e31b1aea7c5cb4', 'CMS', 'India', 'Gujarat', 'surat', '394210', 'www.cms.com', 0, '2016-08-29 01:05:02', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `phone` double NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `phone`, `email`, `message`) VALUES
(13, 'dhaval gandhi', 9727511400, 'dhaval2007gandhi@yahoo.co.in', 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_image` varchar(200) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `dob` date NOT NULL,
  `designation` varchar(100) NOT NULL,
  `salary` double NOT NULL,
  `doj` date NOT NULL,
  `contact` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `profile_image`, `fullname`, `address`, `email`, `username`, `password`, `dob`, `designation`, `salary`, `doj`, `contact`, `status`) VALUES
(9, 'a-img4.jpg', 'Sunil Suryawanshi', 'Dindoli Surat', 'sunil381@gmail.com', 'sunil', '48ccc87cd7afb85704a63e8d5953d326', '1995-08-04', 'Developer', 50000, '2015-02-15', '8866162689', 1),
(10, 'a-img2.jpg', 'Nikhi Barot', 'Navasari', 'nikhi381@gmail.com', 'nikhil', '874a615557757055fb62712d3b0d0609', '1994-07-19', 'Designer', 25000, '2015-02-25', '9924823404', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `subject`, `description`) VALUES
(1, 'Registration Confirmation', 'Thank you for registring at {site_name}!', '<h3>Dear {customer_name},</h3>\r\n<p>Thanks for registering at {site_name}. Your participation is appreciated. After registering, you should have been logged in automatically. You may access your account by using the email address this notice was sent to, and the password you signed up with. If you forget your password, on the login page, click the "forgot password" link and you can get a new password generated and sent to you.</p>\r\n<p>Thanks,<br /> <strong>{site_name}</strong></p>'),
(2, 'Reset Password', 'Reset your password at {site_name}!', '<h3>Dear {user_name},</h3>\r\n<p><br />Your reset password is : <strong>{new_pass}</strong> <br /> <br />This is a temporary password.<br />After login change your password immediately. <br /><br /><br /> If you have any questions, please contact us at support@kalikundinfotech.com. <br /> <br /> Thanks,<br /> <strong>{site_name}</strong></p>');

-- --------------------------------------------------------

--
-- Table structure for table `page_manager`
--

CREATE TABLE IF NOT EXISTS `page_manager` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(100) NOT NULL,
  `url_key` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `content` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_description` text NOT NULL,
  `created` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `page_manager`
--

INSERT INTO `page_manager` (`page_id`, `page_title`, `url_key`, `status`, `content`, `meta_keywords`, `meta_description`, `created`, `last_modified`) VALUES
(23, 'About', 'about', 1, '<div class="main">\r\n<div class="wrap">\r\n<div class="single-top">\r\n<h4 class="m_2" style="margin-bottom: 0;">&nbsp;</h4>\r\n<h4 class="m_2">About</h4>\r\n<div class="about-desc">\r\n<p>We&rsquo;re one of the world&rsquo;s leading providers of developing and training solutions. Kalikund Infotech helps organizations rapidly transform talent by focusing on Developing for Performance. A global, award-winning learning and training solutions company for nearly 20 years, Kalikund Infotech provides performance improvement strategies, blended learning solutions and managed training programs. At Kalikund Infotech, performance innovation, cutting-edge technology and a talented team are combined to deliver successful workforce solutions and business outcomes. InfoPro Learning is obsessed with helping customers build training capacity, advance their practices and respond effectively to changing learner needs.</p>\r\n<p>A trusted learning and development partner to leading organizations worldwide, Kalikund Infotech offers performance improvement consulting, learning design and development and managed training programs. Leveraging deep industry experience and best practice knowledge, our learning and training experts help our customers achieve workforce performance in areas of leadership development, salesforce effectiveness, customer relationship management, product training, employee onboarding and change management. Kalikund Infotech&rsquo;s custom solutions include engaging e-learning courses, content conversion,blended learning, learning portals, localization and assessment and evaluation tools. Our customers include hundreds of mid-sized organizations to enterprise organizations worldwide, including nearly 35% of the Fortune 500 organizations. We provide extensive industry and developing best practice-based expertise to a diverse set of customers in numerous industries, including healthcare, higher education, learning and development, publishing, technology, telecommunications and more.</p>\r\n<p>Kalikund Infotech, is an IT services provider company which has skills and expertise to facilitate complex business solutions. We offer services of entire web development, Content Management Solutions and Creative Design. Our overall process includes concept, design, development and implementation. We have a experts, who are working on modern technologies and tools with vast experience to carry out web based projects, e-commerce, mobile applications and programming scripting languages like PHP, MySql, JQuery, Ajax, CSS, XHTML, CodeIgnitor, Wordpress standards.</p>\r\n</div>\r\n<div class="clear">&nbsp;</div>\r\n</div>\r\n<div class="about">\r\n<div class="lsidebar span_1_of_about">\r\n<h4 class="m_2">Advantages</h4>\r\n<ul class="about-list">\r\n<li>Ease of use\r\n<p>Running your own business isn''t difficult; submit spreadsheets to your accountant - just like umbrella time-sheets and expenses.</p>\r\n</li>\r\n<li>Dual Relationship\r\n<p>In the company form of organisation it is possible for a company to make a valid effective contract with any of its shareholders/directors.</p>\r\n</li>\r\n<li>Complete Control of your Business\r\n<p>You keep complete control of your financial affairs meaning you do not have to risk your money with any third party administrator or umbrella company.</p>\r\n</li>\r\n</ul>\r\n</div>\r\n<div class="cont span_2_of_about">\r\n<h4 class="m_2">Who We Are?</h4>\r\n<div class="col-md-4 about-left wow bounceIn" data-wow-delay="0.4s">\r\n<div class="lsidebar span_1_of_about"><img style="max-width: 100%;" title="Who We Are?" src="../image/about.png" alt="" /></div>\r\n</div>\r\n<div class="cont span_2_of_about">\r\n<p>Kalikund Infotech is a website development,training and designing that has been on the scene since 2015. Our slogan "The Power of the web" well expresses our mission of providing highly functional and affordable websites &amp; web applications to empower business processes. No matter what stage of development your business, we''ve been there! Kalikund Infotech began as a small start-up. We now have one centers in the India and dedicated team members. Whether your needs are those of a small start-up or a quickly expanding corporation, we have the skills to deliver what you need.</p>\r\n</div>\r\n<div class="clear">&nbsp;</div>\r\n</div>\r\n<div class="clear">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>', 'ABCD', 'ABCD', '2015-03-14 19:45:46', '2015-04-28 14:40:57'),
(24, 'Contact', 'contact', 1, '<div class="map"><iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3720.5969851687973!2d72.83979499999998!3d21.168430999999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04e307810c03d%3A0x84a2270fbe6e3e1!2sKalikund+Infotech!5e0!3m2!1sen!2sin!4v1427790742902" frameborder="0" width="100%" height="400"></iframe></div>\r\n<div class="contact-content">\r\n<div class="address-bar">\r\n<h3><img src="../image/ContactHomeIcon.png" alt="address" width="20px" /> Address</h3>\r\n<div class="header_sep">&nbsp;</div>\r\n<p>302-303, 3rd Floor, Doctor''s House, Opp. Dena Bank, Udhna, Surat. - 394210.</p>\r\n<br /> <br />\r\n<h3>Enquiry</h3>\r\n<div class="header_sep">&nbsp;</div>\r\n<div><strong>Contact no:</strong><br /> <img class="contact-number" src="../image/phone.png" alt="contact" /><span class="header-info sidebar contact">0261-6063344</span></div>\r\n<br />\r\n<h3>Email</h3>\r\n<div class="header_sep">&nbsp;</div>\r\n<div class="mail-address clear"><span class="mail-title">Sales</span>\r\n<div><img src="../image/user-mail-icon.png" alt="mail" /> <span>sales@kalikundinfotech.com</span></div>\r\n</div>\r\n<div class="mail-address clear"><span class="mail-title">Support</span>\r\n<div><img src="../image/user-mail-icon.png" alt="mail" /> <span>support@kalikundinfotech.com</span></div>\r\n</div>\r\n<div class="mail-address clear"><span class="mail-title">Employment</span>\r\n<div><img src="../image/user-mail-icon.png" alt="mail" /> <span>biodata@kalikundinfotech.com</span></div>\r\n</div>\r\n<div class="mail-address clear"><span class="mail-title">contact</span>\r\n<div><img src="../image/user-mail-icon.png" alt="mail" /> <span>contact@kalikundinfotech.com</span></div>\r\n</div>\r\n</div>\r\n</div>', 'contact', 'contact', '2015-04-01 06:45:31', '2015-04-19 15:14:12'),
(25, 'Services', 'services', 1, '<div class="portfolio">\r\n<div class="portfolio-content clear">\r\n<div class="portfolio-title">Our Portfolio</div>\r\n<div class="about-desc">\r\n<h2 class="s_2">Web Application Development</h2>\r\n<p>Web applications turn your website from a passive, informational website to an interactive user experience that lets visitors get even more value from your website. Programming web applications requires a set of highly specialized skills. Our programmers, with experience in various scripts and platforms, can develop the right application for your website!</p>\r\n<h2 class="s_2">What we do ?</h2>\r\n<p>The application development cycle germinates from the shape of your ideas and application where each detail is crafted with finesse. We believe that application development should not just be a reflection of your ideas but also an extension of the needs of your target. We methodically develop engaging web applications that combine beautiful forms with high utility functions. Taking into your each and every requirement, our designers and developers craft custom applications that are tailor made for your business. Of course, our researchers do keep on dropping their market wisdom in the process to tweak things, so that the applications are highly interactive, engaging and optimum for clients.</p>\r\n<h2 class="s_2">Types of Languages and tools</h2>\r\n<p>There are different development platforms, web servers, and databases you can work with.</p>\r\n<ul>\r\n<li>ASP.Net</li>\r\n<li>ASP</li>\r\n<li>PHP</li>\r\n<li>Apache</li>\r\n<li>MySQL</li>\r\n<li>Magento</li>\r\n<li>Codeigniter</li>\r\n</ul>\r\n<p>Different types of languages and tools are appropriate for different projects. Once you fill us in on your project and what you need, we can tell you what type of languages and tools will best suit your projects.</p>\r\n<center>\r\n<h3 class="s_2">Our other services</h3>\r\n</center>\r\n<div class="col-md-4 about-left wow bounceIn" data-wow-delay="0.4s">\r\n<div class="other_service">\r\n<ul>\r\n<li><span> <img src="../image/wp_only.png" alt="Wordpress" /> </span>WordPress</li>\r\n<li><span> <img src="../image/joomla.png" alt="Joomla" /> </span>Joomla</li>\r\n<li><span> <img src="../image/magento.png" alt="Magento" /> </span>Magento</li>\r\n<li><span> <img src="../image/php.png" alt="Php" /> </span>Php</li>\r\n<li><span> <img src="../image/ecommerce.png" alt="Ecommerce" /> </span>Ecommerce</li>\r\n<li><span> <img src="../image/html_5.png" alt="HTML 5" /> </span>HTML 5</li>\r\n<li><span> <img src="../image/seo.png" alt="SEO" /> </span>SEO</li>\r\n<!-- <li>\r\n                <a href="#">\r\n                    <span>\r\n                                            </span>CodeIgniter\r\n                </a>\r\n            </li> -->\r\n<li><span> <img src="../image/hosting.png" alt="Web hosting" /> </span>Web hosting</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 'services', 'services', '2015-04-28 07:30:14', '2015-05-02 14:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `pms_sessions`
--

CREATE TABLE IF NOT EXISTS `pms_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_sessions`
--

INSERT INTO `pms_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('e043348fb41504f5b1992e40e3c9792a', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:48.0) Gecko/20100101 Firefox/48.0', 1472466484, 'a:3:{s:9:"user_data";s:0:"";s:17:"validation_errors";s:0:"";s:12:"admin-detail";s:12:"admin-detail";}');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `types` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `live_url` varchar(200) NOT NULL,
  `test_url` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `allocated_to_client` varchar(50) NOT NULL,
  `allocated_to_emp` varchar(50) NOT NULL,
  `attachment` varchar(200) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `types`, `status`, `name`, `live_url`, `test_url`, `description`, `allocated_to_client`, `allocated_to_emp`, `attachment`, `start_date`, `end_date`) VALUES
(6, '', 'Open', 'Project Management Sysetm', '', '', 'Project', '20', '9,10', '', '2016-08-01', '2016-08-31'),
(7, '', 'Open', 'cms', '', '', 'cms project', '20', '9,10', '', '2016-08-01', '2016-08-31');

-- --------------------------------------------------------

--
-- Table structure for table `project_status`
--

CREATE TABLE IF NOT EXISTS `project_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `project_status`
--

INSERT INTO `project_status` (`id`, `name`, `active`) VALUES
(1, 'Open', 1),
(2, 'Closed', 1),
(3, 'On Hold', 1),
(4, 'Cancelled', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quote`
--

CREATE TABLE IF NOT EXISTS `quote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ptitle` varchar(100) NOT NULL,
  `project_type` varchar(100) NOT NULL,
  `estimate_budget` varchar(100) NOT NULL,
  `priority` varchar(50) NOT NULL,
  `describe_project` text NOT NULL,
  `fname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `quote`
--

INSERT INTO `quote` (`id`, `ptitle`, `project_type`, `estimate_budget`, `priority`, `describe_project`, `fname`, `email`, `phone`) VALUES
(2, 'pms', 'I need Internet marketing', '$301-$500', 'High', 'Project management system', 'Chirag Gandhi', 'chirag2010gandhi@gmail.com', '9924823404'),
(4, 'leo classes', 'I need Content development', '$301-$500', 'High', 'SDSSDG   ', 'Sreenath Chakinala', 'chakinalasreenath@gmail.com', '8866162689');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
