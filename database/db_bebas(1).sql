-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 06, 2017 at 07:52 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bebas`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachment_bebas`
--

CREATE TABLE `attachment_bebas` (
  `attach_id` int(11) NOT NULL,
  `attach_title` text NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attachment_bebas`
--

INSERT INTO `attachment_bebas` (`attach_id`, `attach_title`, `job_id`, `created_at`, `updated_at`) VALUES
(1, 'https _cdn.evbuc.com_images_35127077_86279001729_1_original.jpg', NULL, '2017-12-06 04:04:41', '2017-12-06 04:04:41'),
(2, 'https _cdn.evbuc.com_images_38214067_236755757916_1_original.jpg', NULL, '2017-12-06 04:06:13', '2017-12-06 04:06:13'),
(3, 'https _cdn.evbuc.com_images_33089074_194700776415_1_original.jpg', NULL, '2017-12-06 04:07:25', '2017-12-06 04:07:25'),
(4, 'https _cdn.evbuc.com_images_37796227_216959803494_1_original.jpg', NULL, '2017-12-06 04:09:12', '2017-12-06 04:09:12'),
(5, 'https _cdn.evbuc.com_images_38253968_229384394055_1_original.jpg', NULL, '2017-12-06 04:11:25', '2017-12-06 04:11:25'),
(6, 'https _cdn.evbuc.com_images_37191845_233540257880_1_original.jpg', NULL, '2017-12-06 04:14:58', '2017-12-06 04:14:58'),
(7, 'https _cdn.evbuc.com_images_37844455_205890988390_1_original.jpg', NULL, '2017-12-06 04:18:05', '2017-12-06 04:18:05'),
(8, 'eee.jpg', NULL, '2017-12-06 04:19:17', '2017-12-06 04:19:17'),
(9, 'https _cdn.evbuc.com_images_38067539_150333801460_1_original.jpg', NULL, '2017-12-06 04:30:06', '2017-12-06 04:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `bebas_message`
--

CREATE TABLE `bebas_message` (
  `msg_id` int(11) NOT NULL,
  `recipient` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `msg_subject` text NOT NULL,
  `msg_content` longtext NOT NULL,
  `msg_status` int(11) NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bebas_message`
--

INSERT INTO `bebas_message` (`msg_id`, `recipient`, `sender`, `msg_subject`, `msg_content`, `msg_status`, `msg_date`) VALUES
(1, 2, 0, 'BEBAS : Job Application', '<h4>Hi, dear Sivarajan Prashan</h4><br><br><p>We are glad to inform you that your application for job titled <b><em>Badan Warisan: Walk Through (Videographer Needed)</em></b>,has been submitted to our system. We will always make sure that you are informed on any updates<br>from our side.</p><br><br>Go to MyJob tab to check either your application is accepted or not. Once accepted,<br>you can expect to see that job showed up within your taken job section.<br><br><br>Thank you<br><br>', 0, '2017-12-06 15:11:25'),
(2, 2, 0, 'BEBAS Job Application', '<h4>Hi, dear Sivarajan Prashan</h4><br><br><p>We are glad to inform you that your application for job titled <b><em>Sunday Boozy Brunch</em></b>,has been submitted to our system. We will always make sure that you are informed on any updates<br>from our side.</p><br><br>Go to MyJob tab to check either your application is accepted or not. Once accepted,<br>you can expect to see that job showed up within your taken job section.<br><br><br>Thank you<br><br>', 1, '2017-12-06 14:25:11'),
(3, 2, 0, 'BEBAS Job Application', '<h4>Hi, dear Sivarajan Prashan</h4><br><br><p>We are glad to inform you that your application for job titled <b><em>Mastering Your Wealth (Animation Team)</em></b>,has been submitted to our system. We will always make sure that you are informed on any updates<br>from our side.</p><br><br>Go to MyJob tab to check either your application is accepted or not. Once accepted,<br>you can expect to see that job showed up within your taken job section.<br><br><br>Thank you<br><br>', 0, '2017-12-06 16:40:20'),
(4, 2, 0, 'BEBAS Job Application', '<h4>Hi, dear Sivarajan Prashan</h4><br><br><p>We are glad to inform you that your application for job titled <b><em>i-Proclaim Annual Research Award (ARA 2017) Meet</em></b>,has been submitted to our system. We will always make sure that you are informed on any updates<br>from our side.</p><br><br>Go to MyJob tab to check either your application is accepted or not. Once accepted,<br>you can expect to see that job showed up within your taken job section.<br><br><br>Thank you<br><br>', 1, '2017-12-06 14:30:00'),
(5, 2, 0, 'BEBAS Job Application', '<h4>Hi, dear Sivarajan Prashan</h4><br><br><p>We are glad to inform you that your application for job titled <b><em>Sunday Boozy Brunch</em></b>,has been submitted to our system. We will always make sure that you are informed on any updates<br>from our side.</p><br><br>Go to MyJob tab to check either your application is accepted or not. Once accepted,<br>you can expect to see that job showed up within your taken job section.<br><br><br>Thank you<br><br>', 0, '2017-12-06 15:13:40'),
(6, 2, 0, 'BEBAS Job Application', '<h4>Hi, dear Sivarajan Prashan</h4><br><br><p>We are glad to inform you that your application for job titled <b><em>i-Proclaim Annual Research Award (ARA 2017) Meet</em></b>,has been submitted to our system. We will always make sure that you are informed on any updates<br>from our side.</p><br><br>Go to MyJob tab to check either your application is accepted or not. Once accepted,<br>you can expect to see that job showed up within your taken job section.<br><br><br>Thank you<br><br>', 1, '2017-12-06 14:34:29'),
(7, 2, 0, 'BEBAS Job Application', '<h4>Hi, dear Sivarajan Prashan</h4><br><br><p>We are glad to inform you that your application for job titled <b><em>Mastering Your Wealth (Animation Team)</em></b>,has been submitted to our system. We will always make sure that you are informed on any updates<br>from our side.</p><br><br>Go to MyJob tab to check either your application is accepted or not. Once accepted,<br>you can expect to see that job showed up within your taken job section.<br><br><br>Thank you<br><br>', 1, '2017-12-06 14:35:31'),
(8, 2, 0, 'BEBAS Job Application', '<h4>Hi, dear Sivarajan Prashan</h4><br><br><p>We are glad to inform you that your application for job titled <b><em>Badan Warisan: Walk Through (Videographer Needed)</em></b>,has been submitted to our system. We will always make sure that you are informed on any updates<br>from our side.</p><p><br>Go to MyJob tab to check either your application is accepted or not. Once accepted,<br>you can expect to see that job showed up within your taken job section.</p><br><br><br><p>Thank you</p><br><br>', 0, '2017-12-06 15:12:15'),
(9, 2, 0, 'BEBAS Job Application', '<h4>Hi, dear Sivarajan Prashan</h4><br><br><p>We are glad to inform you that your application for job titled <b><em>i-Proclaim Annual Research Award (ARA 2017) Meet</em></b>,has been submitted to our system. We will always make sure that you are informed on any updates<br>from our side.</p><p><br>Go to MyJob tab to check either your application is accepted or not. Once accepted,<br>you can expect to see that job showed up within your taken job section.</p><br><br><br><p>Thank you</p><br><br>', 1, '2017-12-06 14:40:31'),
(10, 2, 0, 'BEBAS Job Application', '<h4>Hi, dear Sivarajan Prashan</h4><br><br><p>We are glad to inform you that your application for job titled <b><em>Web Development for Absolute Beginners</em></b>,has been submitted to our system. We will always make sure that you are informed on any updates<br>from our side.</p><p><br>Go to MyJob tab to check either your application is accepted or not. Once accepted,<br>you can expect to see that job showed up within your taken job section.</p><br><br><br><p>Thank you</p><br><br>', 1, '2017-12-06 14:42:45'),
(11, 1, 0, 'BEBAS Completed Job', '<h4>Hi, dear Yap Siew Yang</h4><br><br><p>We are glad to inform you that your job titled <b><em>The Launch of EVERYTHING KRISTANG - The Malaccan-Portuguese Cookbook</em></b>,has been completed by the the client.</p><p><br>Go to MyJob tab to check <br><p>Thank you</p><br><br>', 1, '2017-12-06 15:37:45'),
(12, 1, 0, 'BEBAS Completed Job', '<h4>Hi, dear Yap Siew Yang</h4><br><br><p>We are glad to inform you that your job titled <b><em>The Launch of EVERYTHING KRISTANG - The Malaccan-Portuguese Cookbook</em></b>,has been completed by the the client.</p><p><br>Go to MyJob tab to check <br><p>Thank you</p><br><br>', 1, '2017-12-06 15:39:17'),
(13, 2, 0, 'BEBAS Completed Job', '<h4>Hi, dear Sivarajan Prashan</h4><br><br><p>We are glad to inform you that your job titled <b><em>Machine Learning Essentials (MLE) Certification, Kuala Lumpur, Malaysia</em></b>,has been completed by the the client.</p><p><br>Go to MyJob tab to check <br><p>Thank you</p><br><br>', 0, '2017-12-06 15:41:39');

-- --------------------------------------------------------

--
-- Table structure for table `job_application`
--

CREATE TABLE `job_application` (
  `application_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `application_status` int(11) NOT NULL,
  `application_remark` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_application`
--

INSERT INTO `job_application` (`application_id`, `job_id`, `user_id`, `application_status`, `application_remark`, `created_at`, `updated_at`) VALUES
(1, 6, 3, 2, 'Take me. I will sure release the finish product by earliest expected date possible', '2017-12-06 07:44:14', '2017-12-06 07:53:45'),
(2, 4, 3, 2, 'Love eating job', '2017-12-06 11:45:12', '2017-12-06 11:46:08'),
(3, 7, 2, 1, 'Yes i agree to take this job', '2017-12-06 14:13:51', '2017-12-06 14:13:51'),
(4, 7, 2, 1, 'Yes i agree to take this job', '2017-12-06 14:14:04', '2017-12-06 14:14:04'),
(5, 7, 2, 1, 'Yes i agree to take this job', '2017-12-06 14:14:48', '2017-12-06 14:14:48'),
(6, 2, 2, 1, 'OOO', '2017-12-06 14:22:02', '2017-12-06 14:22:02'),
(7, 2, 2, 1, 'OOO', '2017-12-06 14:22:44', '2017-12-06 14:22:44'),
(8, 3, 2, 1, 'Hahahaa', '2017-12-06 14:25:10', '2017-12-06 14:25:10'),
(9, 5, 2, 1, 'kokoko', '2017-12-06 14:28:09', '2017-12-06 14:28:09'),
(10, 1, 2, 1, 'Haram', '2017-12-06 14:30:00', '2017-12-06 14:30:00'),
(11, 3, 2, 1, 'frfrr', '2017-12-06 14:33:05', '2017-12-06 14:33:05'),
(12, 1, 2, 1, 'jijij', '2017-12-06 14:34:29', '2017-12-06 14:34:29'),
(13, 5, 2, 1, 'efefew', '2017-12-06 14:35:31', '2017-12-06 14:35:31'),
(14, 2, 2, 1, 'fwefwef', '2017-12-06 14:39:11', '2017-12-06 14:39:11'),
(15, 1, 2, 1, 'DEffef', '2017-12-06 14:40:31', '2017-12-06 14:40:31'),
(16, 7, 2, 1, 'fwefeqw', '2017-12-06 14:42:44', '2017-12-06 14:42:44');

-- --------------------------------------------------------

--
-- Table structure for table `job_bebas`
--

CREATE TABLE `job_bebas` (
  `job_id` int(11) NOT NULL,
  `job_name` text CHARACTER SET latin1 NOT NULL,
  `job_creator` int(11) NOT NULL,
  `job_client` int(11) DEFAULT NULL,
  `client_rated` int(11) NOT NULL DEFAULT '0',
  `type_id` int(11) NOT NULL,
  `pay_id` int(11) NOT NULL,
  `js_id` int(11) NOT NULL,
  `job_details` longtext NOT NULL,
  `job_due` date NOT NULL,
  `job_attach_id` int(11) DEFAULT NULL,
  `job_final_attach_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job_bebas`
--

INSERT INTO `job_bebas` (`job_id`, `job_name`, `job_creator`, `job_client`, `client_rated`, `type_id`, `pay_id`, `js_id`, `job_details`, `job_due`, `job_attach_id`, `job_final_attach_id`, `created_at`, `updated_at`) VALUES
(1, 'i-Proclaim Annual Research Award (ARA 2017) Meet', 1, NULL, 0, 1, 1, 1, '<p><br></p><div class=\"label-primary\">Registrations are closed</div><p>\n								<br></p><div class=\"l-mar-top-1\" data-automation=\"sales-ended-message\">All tickets are sold</div><p>\n							\n						\n						\n							\n							\n									<br></p><h3 class=\"label-primary\">Description</h3><p>\n								\n									\n										\n											<br></p><p><span>The i-Proclaim Annual Research Awards (ARA), a prestigious Research Awards program organized by </span><a href=\"http://abcmalaysia.com.my/\" target=\"_blank\" rel=\"noopener noreferrer nofollow\">ABC Malaysia</a><span>,\n seeks to recognize and reward the outstanding performance, talent and \neffort of the best research contributors, PhD holders and agencies dealt\n with research and publication in the Asia and global context.</span></p><p>\n<br></p><p><span><span>Registration Deadline: </span><strong>November 05, 2017</strong><br><br><strong>Registration includes:</strong></span></p><p>\n<br></p><ul><li>Access to all ARC sessions and invited speakers</li><li>Participation to ARA award Trophy and Certificate</li><li>ARA session One Buffet Lunch Coupon</li><li>High tea</li><li>The fee excludes <strong>travel</strong> and <strong>accomodation</strong> cost of the participants</li></ul><p>\n<br></p><p><strong>Websites</strong></p><p>\n<br></p><ul><li><strong>i-Proclaim: <a href=\"http://i-proclaim.my/\" target=\"_blank\" rel=\"noopener noreferrer nofollow\">http://i-proclaim.my/</a></strong></li><li><strong>ABC Malaysia: <a href=\"http://abcmalaysia.com.my/\" target=\"_blank\" rel=\"noopener noreferrer nofollow\">http://abcmalaysia.com.my/</a></strong></li><li><strong>Event: <a href=\"http://i-proclaim.weebly.com/ara-17.html\" target=\"_blank\" rel=\"noopener noreferrer nofollow\">http://i-proclaim.weebly.com/ara-17.html</a></strong></li><li><strong>Contact [<strong>support@i-proclaim.my</strong>] for another payment methods except online</strong></li></ul><p><br></p>', '2017-12-20', 1, NULL, '2017-12-06 04:05:20', '2017-12-06 09:46:46'),
(2, 'Badan Warisan: Walk Through (Videographer Needed)', 1, NULL, 0, 1, 2, 1, '<p><br></p><p>Badan Warisan, in conjunction with Gallery Weekend Kuala Lumpur are \noffering a FREE tour of their current exhibition (etchings by Isle \nNoor), as well as the heritage site itself. </p><p>\n<br></p><p><span class=\"style2\">Badan Warisan Malaysia (The Heritage of Malaysia\n Trust) is the leading national heritage NGO with a reputation for \nexcellence services spanning nearly 30 years. </span><span class=\"style2\">As\n an independent registered charity our role is to raise awareness of \nheritage issues and advocate for a conversation-friendly environment in \nMalaysia. The origins and purpose of this NGO as well as the building \nitself will be explained during the tour. </span></p><p>\n<br></p>', '2017-12-29', 2, NULL, '2017-12-06 04:06:51', '2017-12-06 04:06:51'),
(3, 'Sunday Boozy Brunch', 1, NULL, 0, 1, 3, 1, '<p><br></p><div class=\"js-xd-read-more-toggle-view read-more__toggle-view\">\n										<div class=\"js-xd-read-more-contents l-mar-top-3\" data-automation=\"listing-event-description\">\n											<p><span>Join us on another EPIC Sunday Boozy Brunch for the \nfirst Sunday of August! Follow your hangover or start your day fresh as a\n daisy for an ultimate Sunday Funday. </span><br><br><span>What? Boozy Sunday Brunch </span><br><span>When? Sunday 6th August </span><br><span>Time? 12pm to 4pm </span><br><span>Where? Drift Dining and Bar</span><br><span>Price? RM250++ Food&amp;Freeflow or RM 120++ Food Only</span><br><br><span>The AMAZING MENU:</span><br><span>Freshly Shucked Oysters, Champagne, Vinegar</span><br><br><span>Selection of Cured Meats</span><span class=\"text_exposed_show\"><br><br>Turkish Poached Eggs, Hummus, Alfalfa Sprouts <br><br>Smoked Salmon, Goats Cheese, Capers<br><br>Moroccan Spiced Chicken Salad<br><br>Braised Baby Pork Ribs Apple Fennel Mint Salad<br><br>Portabello Mushrooms, anchovy butter<br><br>Crispy Chat Potatoes<br><br>Cinnamon Spiced Doughnuts Caramel Drift Strawberry Jam<br><br><br>RM 250++ food &amp; freeflow<br>RM 120 ++ food only<br>**champagne free flow option available <br><br><br>Email events@driftdining.com, book online at <a href=\"https://l.facebook.com/l.php?u=http%3A%2F%2Fbit.ly%2F2oyUJVf&amp;h=ATMs714h3BDlcz7rBCG2OaX_u3ivm5vSIcA-TkHyml3Tc-16UahTJ-KeOGlX-Y1PdamITlgnJa64pvwbhlb0WTqWKmroUAw2cgE7WI8O6M9rp6yWaYYDEYiFDGoBtYun1LjGVgqAX279&amp;enc=AZMDjcheowohMQY42t4_gQw3UHpjAL7HIFBbEBjWq1deV4lGV4T_pVenY8oqXMIkEjg&amp;s=1\" target=\"_blank\" rel=\"noopener noreferrer nofollow\">http://bit.ly/2oyUJVf</a>, send a FB message, call 0321102079 to RSVP your table. We book out on our Sunday brunches! BOOK NOW.</span></p>\n										</div>\n									</div><p><br></p>', '2017-12-27', 3, NULL, '2017-12-06 04:07:44', '2017-12-06 04:07:44'),
(4, 'The Launch of EVERYTHING KRISTANG - The Malaccan-Portuguese Cookbook', 1, 3, 0, 2, 4, 3, '<div class=\"js-xd-read-more-toggle-view read-more__toggle-view\">\n										<div class=\"js-xd-read-more-contents l-mar-top-3\" data-automation=\"listing-event-description\">\n											<p class=\"MsoNormal\"><span>Following the success of her award-winning cookbook, <strong><em>A Kristang Family Cookbook<span>?</span></em></strong>which won the Best in the World Women Chef Cookbook Award <span>at the Gourmand World Cookbook Awards (GWCA) 2016<span>?</span>Chef</span> Melba Nunis releases <a href=\"http://www.mphonline.com/books/nsearchdetails.aspx?&amp;pcode=9789674154240\" target=\"_blank\" rel=\"noopener noreferrer nofollow\"><strong>EVERYTHING KRISTANG</strong></a>\n to share her delightful heritage with a much wider audience. She is an \nauthority on the cuisine of her native Malaccan-Portuguese heritage \n(colloquially known as Kristang) and adamantly insists on the \nauthenticity of its ingredients and cooking methods, which you will \ndiscover in this book.</span></p>\n<p class=\"MsoNormal\"><span>This unique cuisine encompasses a style of \ncooking that finds its roots in a 500-year-old legacy of early \nPortuguese and Dutch settlers in 15th-century Malacca. There are recipes\n for appetisers, sambals, curries, sweet desserts and many other \ntraditional dishes, written in an accessible manner. </span></p>\n<p class=\"MsoNormal\"><span>Kristang cooking is very much suited to the \nMalaysian palate as it draws influences from Malay, Chinese and Indian \ncuisines. Rest assured that each recipe in this collection has been \nspecially handpicked by Melba for a complete Kristang experience!</span></p>\n<p class=\"MsoNormal\"><span>Join us at the launch to find out more! \nGuests will get to sample a few dishes from the book, prepared by \naward-winning Chef Melba herself. </span></p>\n<hr>\n<p class=\"MsoNormal\"><span></span></p>\n<p class=\"MsoNormal\"><strong>About the Author:</strong></p>\n<p class=\"MsoNormal\"><span>Born and raised in Garden City, Ujong Pasir, \nMalacca, Chef Melba Nunis was, at a very young age, exposed to a style \nof cooking that finds its roots in a 500 year-old legacy left behind by \nthe early Portuguese and Dutch Settlers in 15th century Malacca. This \nrare and unique cuisine fuses a plethora of indigenous cultural and \ntraditional influences that resulted in the birth of a flavourful \nMalaccan-Portuguese masterpiece called the \'Kristang\' cuisine. </span></p>\n<p class=\"MsoNormal\">Chef Melba currently heads and runs <a href=\"http://www.majesticmalacca.com/pages/dining.html\" target=\"_blank\" rel=\"noopener noreferrer nofollow\">Melba at The Mansion</a>, one of the premium restaurants located atThe Majestic, Malacca that serves Kristang cuisine. She is also the author of <em><strong>A Kristang Family Cookbook</strong></em>,\n her first book that was published by Marshall Cavendish which won the \nBest in the World Women Chef Cookbook Award at the Gourmand World \nCookbook Awards (GWCA) 2016.</p>\n										</div>\n									</div>', '2018-01-02', 4, NULL, '2017-12-06 04:09:33', '2017-12-06 15:37:45'),
(5, 'Mastering Your Wealth (Animation Team)', 2, NULL, 0, 1, 5, 1, '<p><br></p><p><strong>Become the Top 4% Investors By Unfolding The Secrets On How To Turn Properties Into Your ATM Machines</strong></p><p>\n<br></p><p>Are you ready for a life-altering event designed by THE ASIA\'S MOST TRANSFORMATIONAL COACH OF ALL-TIME ?</p><p>\n<br></p><p><span>This 2 days workshop is solely design to to teach you how you \ncan be the master of your on wealth - revealing the main reason why 99% \nof the people never become rich &amp; how you can breakthrough your \nfinancial walls !</span></p><p>\n<br></p><p><img src=\"https://s.evbuc.com/https_proxy?url=http%3A%2F%2Fmasteringyourwealth.asia%2Fwp-content%2Fuploads%2F2017%2F07%2FIMG_7107.jpg&amp;sig=ADR2i79McB9zmloo8yevEeG4LlglZvigcA\" style=\"width: 50%;\"></p><p><br></p><h3><span><span>Michael Tan</span></span></h3><p>\n<br></p><p><span><span><em>Asia?s #1 Property Guru &amp; Self-Made Millionaire Entrepreneur</em></span>  </span></p><p>\n<br></p><p><span>I want to share with you about myself.</span></p><p>\n<br></p><p><span>I fought hard and made my first million by 28, lost it all by \n30 and nearly went bankrupt that time. Fast forward today I\'m not only a\n property tycoon, I\'m also the founder of Freemen &amp; owners to \nmultiple businesses across Asia like Malaysia, Thailand &amp; Hong Kong.</span></p><p>\n<br></p><p><span>Ever since my down-time, I have discovered my purpose is to \nhelp people to achieve financial freedom and pursue their passions \nthrough properties because i believed everyone deserved to be wealthy. I\n am honored to be featured for my revolutionary ?No-Money-Down? \nstrategy, which has helped thousands of people to get their properties \nwith no money down.</span></p><p>\n<br></p><p><span>I\'m thankful and honored to be featured for my revolutionary \n?No-Money-Down? strategy, which has helped thousands of people to get \ntheir properties with no money down.</span></p><p>\n<br></p><p><span>The average track record is 83% success rate! That means 8.3 \npeople out of every 10 successfully buy properties with No Money Down!</span></p><p>\n</p><h2><span><span>JENSON LIEW</span></span></h2><p>\n</p><p><strong><img src=\"https://cdn.evbuc.com/eventlogos/227789865/capture-2.png\"></strong></p><p>\n</p><p><strong>Featured Speaker </strong></p><p><span><br></span></p><h5><em><span><span>FOUNDER OF DREAMS NATION,</span></span><span>PROPERTY MILLIONAIRE INVESTOR &amp; ENTREPRENEUR</span></em></h5><p><span><br></span></p><p><br></p><p><br></p>', '2017-12-22', 5, NULL, '2017-12-06 04:12:29', '2017-12-06 04:12:29'),
(6, 'Machine Learning Essentials (MLE) Certification, Kuala Lumpur, Malaysia', 2, 3, 3, 1, 6, 3, '<p><strong>Machine Learning Essentials</strong><br><br><span>Machine \nLearning is revolutionizing the world by allowing computers to learn as \nthey progress forward with large data sets, overwriting overcoming all \nprogramming pitfalls and impasses. Machine Learning builds algorithms, \nwhich when exposed to high volumes of data, can self-teach and evolve.</span><br><span>When\n this technology powers Artificial Intelligence (AI) applications, the \ncombination can be powerful. Smart robots can already be found around us\n doing all our jobs with more speed and accuracy, and continuously \nimproving themselves at every step.</span><br><br><span>COURSE DURATION</span><br><span>* 1 Days</span><br><br><span>COURSE OBJECTIVE</span><br><span>* Machine Learning Essentials is designed </span><span class=\"text_exposed_show\">to allow participants acquire all essential knowledge on Machine Learning.<br><br>COURSE OUTLINE<br>* Introduction to Machine Learning<br>* What is Machine Learning and its importance?<br>* How Businesses Can Take Advantage of Machine Learning<br>* Different Techniques in Machine Learning<br>* Regression Method<br>* Case Study on regression methods<br>* Application of Regression Method<br>* Hands-On on the Application of Regression Method<br>* Logistic Regression<br><br>* Case Study on Logistic Regression<br>* Application of Logistic Regression<br>* Hands-On on the Application of Logistic Regression<br><br>Prerequisites<br>* NA<br><br>Examination<br>*\n Participants are required to pass an examination upon completion. This \nexam tests a candidate?s knowledge and skills related to Machine \nLearning based on the syllabus covered in the course<br><br>Certification<br>*\n Participants will be awarded a Certificate of Competency in Machine \nLearning Essentials upon meeting the requirements of the course and \npassing the examination.<br><br>WHO WILL BENEFIT FROM THIS COURSE?<br>* \nMachine Learning Essentials is designed for anyone who have little or no\n understanding, knowledge of, or experience in Machine Learning and \nwould like the opportunity to learn in a supportive and encouraging \nenvironment.<br>Topics<br><br>* Class is limited to 20 participants as hands-on sessions and real-time demonstration is expected.<br><br>COURSE OUTCOMES<br>*\n On completion of Machine Learning Essentials, participants will have \nacquired all the essential knowledge and skills on Machine Learning</span><br></p>', '2017-12-30', 6, NULL, '2017-12-06 04:15:19', '2017-12-06 15:39:36'),
(7, 'Web Development for Absolute Beginners', 3, NULL, 0, 1, 23, 1, '<p>Websites are being used everywhere today, across every kind of \nindustry and niche, and users expect a lot out of a web page: fast load \ntimes, nice designs, great user journeys in order to to procure specific\n services or products, cross-device responsiveness, and the list goes \non!</p>\n<p>In this introductory hands-on workshop, we will run students through \nall the basic tools that every web page coder needs to know, understand \nand utlize. We will start by introducing learners to the three \ncomponents of building a modern web page, including: HTML for structure,\n CSS for designing and styling, and finally JQuery for making the \nwebsite interactive.</p>\n<p>By the end of the course, each participant will be a able to create a\n functioning website that is ready to be uploaded and deployed to the \nweb hosting server.</p>\n<p><br><br><strong>CLASS DETAILS:<br><em>There are 2 batches to choose from, please pick ONE.</em></strong><br><br><strong>Batch 1 : 13-15 December (Wed, Thurs, Fri)</strong><br><strong>Batch 2 : 18-20 December  (Mon, Tues, Wed)</strong><br><strong><br>9-5pm<br>@ Asia Developer Academy</strong><br></p>\n<p><strong>Price/pax: RM500 + 6% GST</strong></p>\n<p><br><strong>Target​ ​audience:</strong><br> School leaver who would like to discover and have an overview of web development. <br><br></p>', '2017-12-14', 8, NULL, '2017-12-06 04:27:42', '2017-12-06 04:27:42'),
(8, 'Tech Moment Developer', 3, NULL, 0, 1, 24, 1, '<p><br></p><div class=\"js-xd-read-more-toggle-view read-more__toggle-view\">\n										<div class=\"js-xd-read-more-contents l-mar-top-3\" data-automation=\"listing-event-description\">\n											<p><em>How will the technologies in the future look like?How \nwill the jobs in the future look like? How will the platform of job \napplication looks like in the future?</em></p>\n<p><strong>Tech Moment</strong>, a forum that involved experts from \nBinary.com, Fusionex and SEEK Asia, acts as a platform that gives you an\n opportunity to expose yourself with technologies in real world. Themed \nas Futuristic Technology, we wish to give you a vision on how \ntechnologies <span>nowadays</span> such as blockchain, artificial intelligence will look like in the future and how will these technologies shape our future.</p>\n<p>Join our <strong>Tech Moment</strong> to get your doubts and worries answered!</p>\n<p><br></p>\n<hr>\n<p><br></p>\n<p><strong>List of Participating Employers:</strong></p>\n<p>1. <a href=\"https://www.binary.com/en/home.html\" target=\"_blank\" rel=\"noopener noreferrer nofollow\">Binary.com</a><span> - MY</span></p>\n<p>2. <a href=\"https://www.fusionex-international.com/\" target=\"_blank\" rel=\"noopener noreferrer nofollow\">Fusionex International</a> - MY</p>\n<p>3. <a href=\"https://www.seekasia.com/\" target=\"_blank\" rel=\"noopener noreferrer nofollow\">SEEK Asia</a> - MY</p>\n										</div>\n									</div><p><br></p>', '2017-12-18', 9, NULL, '2017-12-06 04:30:54', '2017-12-06 04:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `job_issue`
--

CREATE TABLE `job_issue` (
  `issue_id` int(11) NOT NULL,
  `issue_content` longtext CHARACTER SET utf8 NOT NULL,
  `job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_issue`
--

INSERT INTO `job_issue` (`issue_id`, `issue_content`, `job_id`, `user_id`, `created_at`) VALUES
(1, '<p><span>Machine \nLearning is revolutionizing the world by allowing computers to learn as \nthey progress forward with large data sets, overwriting overcoming all \nprogramming pitfalls and impasses. Machine Learning builds algorithms</span><br></p>', 6, 3, '2017-12-06 09:12:36'),
(2, '<p>Issue solved actually<br></p>', 6, 3, '2017-12-06 09:33:07'),
(3, '<p>Thanks<br></p>', 6, 2, '2017-12-06 10:52:01'),
(4, '<p>I dont receive any order yet. Is this post valid?<br></p>', 4, 3, '2017-12-06 12:17:24');

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
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `recipient_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `notifications_link` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `notifications_subject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pay_bebas`
--

CREATE TABLE `pay_bebas` (
  `pay_id` int(11) NOT NULL,
  `pay_amount` int(11) NOT NULL,
  `pay_currency` text NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `ps_id` int(11) NOT NULL,
  `job_creator` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pay_bebas`
--

INSERT INTO `pay_bebas` (`pay_id`, `pay_amount`, `pay_currency`, `client_id`, `ps_id`, `job_creator`, `created_at`, `updated_at`) VALUES
(1, 1500, 'RM', NULL, 1, 1, '2017-12-06 04:05:19', '2017-12-06 04:05:19'),
(2, 1000, 'RM', NULL, 1, 1, '2017-12-06 04:06:51', '2017-12-06 04:06:51'),
(3, 500, 'RM', NULL, 1, 1, '2017-12-06 04:07:44', '2017-12-06 04:07:44'),
(4, 2000, 'RM', 3, 1, 1, '2017-12-06 04:09:33', '2017-12-06 11:46:08'),
(5, 3000, 'RM', NULL, 1, 2, '2017-12-06 04:12:29', '2017-12-06 04:12:29'),
(6, 2200, 'RM', 3, 2, 2, '2017-12-06 04:15:19', '2017-12-06 09:32:24'),
(7, 3400, 'RM', NULL, 1, 3, '2017-12-06 04:18:37', '2017-12-06 04:18:37'),
(8, 3400, 'RM', NULL, 1, 3, '2017-12-06 04:18:40', '2017-12-06 04:18:40'),
(9, 3400, 'RM', NULL, 1, 3, '2017-12-06 04:18:46', '2017-12-06 04:18:46'),
(10, 3400, 'RM', NULL, 1, 3, '2017-12-06 04:18:46', '2017-12-06 04:18:46'),
(11, 3400, 'RM', NULL, 1, 3, '2017-12-06 04:18:46', '2017-12-06 04:18:46'),
(12, 3400, 'RM', NULL, 1, 3, '2017-12-06 04:18:47', '2017-12-06 04:18:47'),
(13, 3400, 'RM', NULL, 1, 3, '2017-12-06 04:18:47', '2017-12-06 04:18:47'),
(14, 3400, 'RM', NULL, 1, 3, '2017-12-06 04:18:47', '2017-12-06 04:18:47'),
(15, 3400, 'RM', NULL, 1, 3, '2017-12-06 04:18:47', '2017-12-06 04:18:47'),
(16, 3400, 'RM', NULL, 1, 3, '2017-12-06 04:19:35', '2017-12-06 04:19:35'),
(17, 3400, 'RM', NULL, 1, 3, '2017-12-06 04:19:42', '2017-12-06 04:19:42'),
(18, 3400, 'RM', NULL, 1, 3, '2017-12-06 04:20:21', '2017-12-06 04:20:21'),
(19, 3400, 'RM', NULL, 1, 3, '2017-12-06 04:22:45', '2017-12-06 04:22:45'),
(20, 3400, 'RM', NULL, 1, 3, '2017-12-06 04:22:53', '2017-12-06 04:22:53'),
(21, 3400, 'RM', NULL, 1, 3, '2017-12-06 04:22:55', '2017-12-06 04:22:55'),
(22, 3400, 'RM', NULL, 1, 3, '2017-12-06 04:26:04', '2017-12-06 04:26:04'),
(23, 3400, 'RM', NULL, 1, 3, '2017-12-06 04:27:42', '2017-12-06 04:27:42'),
(24, 3500, 'RM', NULL, 1, 3, '2017-12-06 04:30:54', '2017-12-06 04:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_user_bebas`
--

CREATE TABLE `portfolio_user_bebas` (
  `port_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(12) DEFAULT NULL,
  `portfolio_name` text,
  `port_description` longtext,
  `port_attach_title` text,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfolio_user_bebas`
--

INSERT INTO `portfolio_user_bebas` (`port_id`, `created_at`, `updated_at`, `user_id`, `portfolio_name`, `port_description`, `port_attach_title`, `img`) VALUES
(1, '2017-12-05 13:39:23', '2017-12-06 17:42:49', 1, 'My Portfolio 1', '<p>This is my new Portfolio. Click to view or nothing happened otherwise you do somethung <br></p>', '5129300-hd-wallpapers-for-pc.jpg', NULL),
(2, '2017-12-05 13:48:52', '2017-12-06 17:43:00', 2, 'My Portfolio 2', '<p>Somewhere Over The Rainbow<br></p>', 'Abstract_Wallpapers_00054.jpg', NULL),
(3, '2017-12-05 13:50:15', '2017-12-06 17:42:56', 1, 'My Portfolio 3', '<p>This car is designed using Adobe Premiere Class 3. feel free to mail me at</p><h3><u>adeeb@gmail.com</u><br></h3>', 'viper-wallpaper.jpg', NULL),
(4, '2017-12-05 13:51:11', '2017-12-06 17:42:53', 1, 'Beatles', '<p>Old black and White Photo Editing<br></p>', 'beatles-9220250468.jpeg', NULL),
(5, '2017-12-06 04:38:06', '2017-12-06 04:38:08', 3, 'Portfolio Razor 1', '<p>With the introduction of (i|android|windows)phones, things have \nchanged, and to get a correct and complete solution that works on any \ndevice is really time-consuming.</p>\n\n<p>You can have a peek at <a href=\"https://realfavicongenerator.net/favicon_compatibility\" rel=\"noreferrer\">https://realfavicongenerator.net/favicon_compatibility</a> or <a href=\"http://caniuse.com/#search=favicon\" rel=\"noreferrer\">http://caniuse.com/#search=favicon</a> to get an idea on the best way to get something that works on any device.</p>', 'create-awesome-music-wallpaper.jpg', NULL),
(6, '2017-12-06 07:43:32', '2017-12-06 07:43:34', 3, 'My Portfolio Razor 2', '<p>optimized for learning, testing, and training. Examples might be \nsimplified to improve reading and basic understanding.\nTutorials, references, and examples are constantly reviewed to avoid \nerrors, but we cannot warrant full correctness of all content.<br></p>', 'apple-vintage-colorful-wallpaper.jpg', NULL),
(7, '2017-12-06 17:24:08', '2017-12-06 17:24:10', 3, 'Portfolio Zara', '<p>ZARA Production<br></p>', 'Abby-Blog-Laptop-Pic.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status_job_bebas`
--

CREATE TABLE `status_job_bebas` (
  `js_id` int(11) NOT NULL,
  `js_title` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_job_bebas`
--

INSERT INTO `status_job_bebas` (`js_id`, `js_title`) VALUES
(1, 'waiting'),
(2, 'in progress'),
(3, 'completed'),
(4, 'declined'),
(5, 'waiting for approval'),
(6, 'approved'),
(7, 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `status_pay_bebas`
--

CREATE TABLE `status_pay_bebas` (
  `ps_id` int(11) NOT NULL,
  `ps_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_pay_bebas`
--

INSERT INTO `status_pay_bebas` (`ps_id`, `ps_title`) VALUES
(1, 'unpaid'),
(2, 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `status_user_bebas`
--

CREATE TABLE `status_user_bebas` (
  `us_id` int(11) NOT NULL,
  `us_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_user_bebas`
--

INSERT INTO `status_user_bebas` (`us_id`, `us_title`) VALUES
(1, 'active'),
(2, 'inactive'),
(3, 'banned');

-- --------------------------------------------------------

--
-- Table structure for table `type_job_bebas`
--

CREATE TABLE `type_job_bebas` (
  `type_id` int(11) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_job_bebas`
--

INSERT INTO `type_job_bebas` (`type_id`, `title`) VALUES
(1, 'Visual Arts'),
(2, 'Performing Arts');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `matric_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `portfolio_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `matric_no`, `role_id`, `img`, `status`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `details`, `portfolio_img`, `rating`) VALUES
(1, 'Yap Siew Yang', '0123464434', '1415813', '2', 'He-Zi-1.jpg', '1', 'yapsiew@gmail.com', '$2y$10$iCcJWgQvcUcVc81MlWfdF.BH1.2ITKBHzlh5LRr4O4LxhaM3rPbeK', 'c9VegVyHOaR7n98pOIFuX9qxZ0AQMaCpPv7Q5AU75DEDodpd1zzf4AHxqcHc', '2017-12-05 20:02:58', '2017-12-05 20:02:58', 'Web Designer', NULL, 0),
(2, 'Sivarajan Prashan', '0134556631', '1227655', '2', 'terror19n-4-web.jpg', '1', 'prashan@yahoo.com', '$2y$10$3J9UfAsf/XrIUT42GFs3JesTscse5G6k2htkCslEvSqBRua7/ttwC', 'aDzVlRe5KGGz2RkBWXJkXXXEe5pBIUd1OfzrHb5o9QqlyToXsISLDdppqHVt', '2017-12-05 20:10:39', '2017-12-05 20:10:39', 'Videographer', NULL, 0),
(3, 'Ahmad Syahrul Ridzwan', '0117621346', '1415224', '2', '1391828816_1533493466.jpg', '1', 'syarulzacky@gmail.com', '$2y$10$5hVduSG4ZNrDFr2nh9o90.3wXUYIt8eLL4O4GW0Rxlv2lVVlnMiXS', 'U6egV3e6aEDJB8fI5yvPMqrEY0fAgwGLu187nwclChcJ4Jvt2f3VIae309lE', '2017-12-05 20:16:25', '2017-12-05 20:16:25', 'Web Designer', NULL, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachment_bebas`
--
ALTER TABLE `attachment_bebas`
  ADD PRIMARY KEY (`attach_id`);

--
-- Indexes for table `bebas_message`
--
ALTER TABLE `bebas_message`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `job_application`
--
ALTER TABLE `job_application`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `job_bebas`
--
ALTER TABLE `job_bebas`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `job_issue`
--
ALTER TABLE `job_issue`
  ADD PRIMARY KEY (`issue_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`recipient_id`);

--
-- Indexes for table `pay_bebas`
--
ALTER TABLE `pay_bebas`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `portfolio_user_bebas`
--
ALTER TABLE `portfolio_user_bebas`
  ADD PRIMARY KEY (`port_id`);

--
-- Indexes for table `status_job_bebas`
--
ALTER TABLE `status_job_bebas`
  ADD PRIMARY KEY (`js_id`);

--
-- Indexes for table `status_pay_bebas`
--
ALTER TABLE `status_pay_bebas`
  ADD PRIMARY KEY (`ps_id`);

--
-- Indexes for table `status_user_bebas`
--
ALTER TABLE `status_user_bebas`
  ADD PRIMARY KEY (`us_id`);

--
-- Indexes for table `type_job_bebas`
--
ALTER TABLE `type_job_bebas`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachment_bebas`
--
ALTER TABLE `attachment_bebas`
  MODIFY `attach_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `bebas_message`
--
ALTER TABLE `bebas_message`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `job_application`
--
ALTER TABLE `job_application`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `job_bebas`
--
ALTER TABLE `job_bebas`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `job_issue`
--
ALTER TABLE `job_issue`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `recipient_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pay_bebas`
--
ALTER TABLE `pay_bebas`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `portfolio_user_bebas`
--
ALTER TABLE `portfolio_user_bebas`
  MODIFY `port_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `status_job_bebas`
--
ALTER TABLE `status_job_bebas`
  MODIFY `js_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `status_pay_bebas`
--
ALTER TABLE `status_pay_bebas`
  MODIFY `ps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status_user_bebas`
--
ALTER TABLE `status_user_bebas`
  MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `type_job_bebas`
--
ALTER TABLE `type_job_bebas`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
