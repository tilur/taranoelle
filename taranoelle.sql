-- MySQL dump 10.11
--
-- Host: ambry01.daxiangroup.com    Database: tara
-- ------------------------------------------------------
-- Server version	5.1.52

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `backgrounds`
--

DROP TABLE IF EXISTS `backgrounds`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `backgrounds` (
  `b_background_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `b_path` varchar(100) NOT NULL DEFAULT '',
  `b_title` varchar(30) NOT NULL DEFAULT '',
  `b_filename` varchar(50) NOT NULL DEFAULT '',
  `b_date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`b_background_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `backgrounds`
--

LOCK TABLES `backgrounds` WRITE;
/*!40000 ALTER TABLE `backgrounds` DISABLE KEYS */;
INSERT INTO `backgrounds` VALUES (15,'contact','Contact Page','bg-contact','2011-11-30 04:18:34'),(16,'details','Details Page','bg-details','2011-11-30 04:20:38'),(17,'about','About Page','bg-about','2011-11-30 04:22:15'),(18,'links','Links Page','bg-links','2011-11-30 04:24:22'),(19,'login','Login Page','bg-login','2011-11-30 04:26:00');
/*!40000 ALTER TABLE `backgrounds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `blogs` (
  `b_blog_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `b_path` varchar(100) NOT NULL,
  `b_title` varchar(100) NOT NULL,
  `b_body` longtext NOT NULL,
  `b_date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`b_blog_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES (11,'blog/test-blog','Test blog!','<p>\r\n	This is a test blog to see how it goes!</p>\r\n<h1>\r\n	Yea!</h1>\r\n','2011-11-19 20:03:21'),(12,'blog/third-blog','third blog','<div id=\"lipsum\">\r\n	<p>\r\n		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam posuere varius magna eu malesuada. Praesent at quam ut libero hendrerit ornare. Donec in euismod erat. Nulla sagittis tincidunt sapien, at blandit lorem mollis ut. Pellentesque posuere odio ac elit lobortis vel iaculis nulla consequat. Nulla vehicula sem libero, sit amet laoreet felis. Proin turpis lectus, tempor ut dapibus vel, consectetur sed orci. Aliquam vestibulum nunc nec velit rutrum volutpat. Nam ac venenatis lectus. Phasellus euismod blandit enim, a fermentum magna auctor ut. Aliquam feugiat elit eget purus commodo sed sodales elit mattis. Curabitur condimentum, elit vitae consectetur dignissim, metus justo dictum odio, sed porta quam lectus in quam. Aliquam nisi eros, venenatis sit amet venenatis ac, sollicitudin eu lorem. Suspendisse potenti. Donec aliquam pharetra mi nec euismod.</p>\r\n	<p>\r\n		Phasellus blandit turpis et metus laoreet consequat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque tincidunt tristique enim at mollis. Aenean a erat metus. Nam in dolor nisl. Integer ultricies dapibus nisi ut elementum. Pellentesque nulla magna, vehicula sit amet dignissim ut, cursus ac est. Morbi congue velit in orci condimentum sed tincidunt orci molestie. Nullam molestie faucibus quam, at facilisis augue euismod sit amet.</p>\r\n	<p>\r\n		Mauris iaculis ante sed urna tempor ac eleifend metus facilisis. Nulla venenatis, nisi sed pulvinar pellentesque, ligula ante semper eros, vitae tristique dui ipsum sit amet dui. Maecenas eu euismod massa. Donec aliquet neque vitae arcu consequat placerat. Phasellus neque nulla, fringilla vel hendrerit quis, sollicitudin eget nunc. Praesent commodo, justo suscipit dapibus vulputate, dolor urna egestas lectus, quis porttitor leo ante sit amet orci. Maecenas elementum euismod diam in malesuada. Mauris quis sem vel nibh tempus ornare et tristique orci. Quisque molestie neque sed dolor adipiscing tincidunt. Aenean vehicula venenatis accumsan. Nulla non venenatis purus.</p>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n','2011-11-19 23:57:17'),(3,'blog/another-tester','another tester ONE MORE TEST','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ullamcorper posuere nunc ut porta. Sed eleifend, lectus ac hendrerit convallis, odio elit pharetra neque, quis dapibus neque mauris a eros. Ut tincidunt nisi vel odio ullamcorper lacinia. In et massa lorem, vel blandit ligula. Nulla tortor nibh, luctus at iaculis a, dictum nec eros. Suspendisse cursus mauris sed arcu vulputate lacinia eget sit amet felis. Sed quis dui interdum neque facilisis sollicitudin sit amet quis diam. Vestibulum vehicula pellentesque risus sed tincidunt. Maecenas at augue aliquam ipsum rutrum laoreet. Aliquam eget sem sed tortor rhoncus posuere vel dapibus libero. Suspendisse quis ornare sapien. Suspendisse pretium, erat eget viverra feugiat, nulla diam tincidunt arcu, et interdum nisl nibh a nulla. Mauris laoreet augue vitae arcu porta facilisis at in nisi. Maecenas eleifend accumsan ipsum, sodales fringilla nisi varius ut.\r<br>\r<br>Morbi hendrerit dictum urna eu ultricies. Morbi non massa a tellus bibendum facilisis. Aenean id nisl eros, a consectetur urna. Ut ultrices neque quis augue tincidunt a posuere nibh ullamcorper. Etiam scelerisque luctus pharetra. Maecenas eros lectus, condimentum ac tempor mattis, pellentesque lobortis dui. Aliquam facilisis accumsan orci, eu pharetra arcu ullamcorper id. Suspendisse potenti. Pellentesque dignissim libero rhoncus ante sagittis faucibus.\r<br>\r<br>Aenean eu elementum mauris. Nullam non quam elit. Praesent semper tortor nec risus lacinia vel imperdiet magna aliquam. Fusce ac sem risus, et pulvinar neque. Vestibulum sed blandit orci. Sed et ligula mi. Curabitur adipiscing, diam non dictum aliquet, leo nibh aliquam dolor, vitae dignissim erat nisi sit amet tellus. Integer a sapien nisl. Morbi euismod venenatis pharetra. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nec elit a velit dignissim vestibulum. Nullam posuere, magna in hendrerit scelerisque, lacus eros pharetra odio, eget tristique dui lorem non mi. Etiam lacinia, metus vitae dictum accumsan, leo turpis tristique massa, ac venenatis mi tortor eget purus. Fusce lorem erat, laoreet a mattis lobortis, semper ac ante. Pellentesque ligula erat, faucibus vel tincidunt vitae, ultrices quis arcu. Ut ultrices dapibus tortor, ac mattis turpis hendrerit non.\r<br>\r<br>Nulla id libero a justo laoreet ornare vitae in lectus. Pellentesque metus lectus, sollicitudin a sagittis vel, mollis vel odio. Etiam sagittis nibh sollicitudin urna cursus tincidunt. Aliquam sed sem elit, eu convallis eros. Praesent eu nibh sit amet ipsum hendrerit egestas. Phasellus rhoncus quam ut odio volutpat vehicula. Quisque tincidunt eleifend tempor. Phasellus quis enim id leo fringilla volutpat. Maecenas ut magna sapien, sit amet hendrerit dui. Praesent aliquam hendrerit augue, in tempus purus bibendum quis. Donec quis sapien ac est consectetur lobortis. Nunc a convallis ligula. In hac habitasse platea dictumst. In pellentesque magna euismod nisi vestibulum rutrum. Vestibulum iaculis tristique nibh, id luctus nunc dapibus sit amet. Sed varius ullamcorper malesuada.\r<br>\r<br>Donec venenatis, odio et convallis tempor, elit ligula mattis quam, eget commodo elit sem sed nunc. Sed pellentesque urna quis nibh venenatis ultricies. Aliquam quis sem arcu, nec venenatis nibh. Aenean sed sapien eu erat sollicitudin suscipit ut at augue. Praesent vulputate tempus lectus, non elementum tortor molestie quis. Ut eget lorem in nisl iaculis pretium a vitae ante. Nullam condimentum elit vulputate nisl interdum pellentesque. In arcu lacus, venenatis non tempus ornare, ultrices non sem. Sed quam risus, fringilla ac varius sed, congue sed metus. Aliquam erat volutpat. Nam vel rhoncus libero. Sed pretium tincidunt nisl a consectetur. Fusce imperdiet, velit sit amet pretium consequat, ligula erat euismod turpis, ac viverra augue tellus gravida lacus. Nullam aliquet rutrum viverra.\r<br>\r<br>Nulla metus sem, pretium at pretium non, auctor quis felis. Nunc fringilla suscipit ultricies. Praesent bibendum, justo vel ultricies ullamcorper, nunc nibh sodales lacus, nec ornare velit ipsum non diam. Sed sed neque ac nunc mattis adipiscing. Sed vulputate mauris et ligula imperdiet iaculis. Aliquam tincidunt blandit velit in malesuada. Vivamus congue felis vitae mi tempor nec iaculis purus commodo. Curabitur faucibus scelerisque ligula sit amet euismod. Sed a tellus nisi. Aenean nec nisl quam. Phasellus volutpat elit ac purus ullamcorper bibendum. Sed mollis cursus dictum.\r<br>\r<br>Donec aliquet cursus nunc, eget posuere lorem gravida et. Sed vitae elit ac massa fringilla lobortis. Nunc non purus ut ante pretium posuere sed in quam. Proin et dui velit, sit amet viverra nisl. Etiam sollicitudin laoreet ipsum, at posuere ipsum viverra quis. Fusce vel risus in lectus adipiscing aliquet sit amet vel nisi. Duis eu diam massa. Aliquam erat volutpat. Aenean ante tellus, adipiscing non adipiscing vitae, molestie ac dolor. Aliquam erat volutpat. Sed tortor metus, adipiscing in volutpat ac, ornare id dui. Phasellus sollicitudin elit nec tellus porttitor facilisis. Quisque ante justo, bibendum vel condimentum id, dignissim at ligula. Suspendisse laoreet, nunc at bibendum dapibus, ipsum lacus varius nunc, non venenatis tortor nunc in lacus.\r<br>\r<br>Aenean ut felis sit amet velit dapibus ultrices ut in turpis. Nam posuere, ante non congue condimentum, ipsum tortor rhoncus risus, ac sodales arcu purus ac lorem. Mauris sapien risus, lobortis id vestibulum a, malesuada vel nibh. Curabitur adipiscing varius luctus. Ut sed dignissim sapien. Maecenas eget libero diam. Aliquam quis erat at neque rhoncus euismod sed eu nisi. Phasellus fermentum felis sed tellus facilisis volutpat. Sed laoreet venenatis tellus in tincidunt. Integer accumsan libero in libero iaculis vulputate et vel erat. Donec nibh leo, dignissim in rhoncus sed, auctor et augue. Suspendisse id tincidunt dolor.\r<br>\r<br>Praesent tincidunt risus ut lorem accumsan nec interdum nunc pellentesque. Pellentesque tellus lectus, condimentum eu commodo in, interdum id orci. Suspendisse eu nulla a augue elementum facilisis id in enim. Nullam varius auctor elementum. Duis vitae nisi magna, sed suscipit purus. Pellentesque imperdiet lacus eu justo malesuada ultricies. Praesent in elementum metus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed gravida congue magna, nec tristique dui dapibus eget. Duis sit amet tortor nec quam fringilla condimentum sagittis at diam. Nam dignissim vehicula fringilla. Morbi ultrices lobortis arcu, non dictum nulla tincidunt laoreet. Sed ultrices, arcu vitae consectetur placerat, metus odio faucibus lectus, ultrices hendrerit sapien tellus a ipsum. Maecenas turpis nisl, fringilla ac tempus eu, ornare et orci. Maecenas egestas tortor sit amet orci venenatis luctus. ','2011-11-11 04:12:11'),(13,'blog/fourth-blog','fourth blog','<div id=\"lipsum\">\r\n	<p>\r\n		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam posuere varius magna eu malesuada. Praesent at quam ut libero hendrerit ornare. Donec in euismod erat. Nulla sagittis tincidunt sapien, at blandit lorem mollis ut. Pellentesque posuere odio ac elit lobortis vel iaculis nulla consequat. Nulla vehicula sem libero, sit amet laoreet felis. Proin turpis lectus, tempor ut dapibus vel, consectetur sed orci. Aliquam vestibulum nunc nec velit rutrum volutpat. Nam ac venenatis lectus. Phasellus euismod blandit enim, a fermentum magna auctor ut. Aliquam feugiat elit eget purus commodo sed sodales elit mattis. Curabitur condimentum, elit vitae consectetur dignissim, metus justo dictum odio, sed porta quam lectus in quam. Aliquam nisi eros, venenatis sit amet venenatis ac, sollicitudin eu lorem. Suspendisse potenti. Donec aliquam pharetra mi nec euismod.</p>\r\n	<p>\r\n		Phasellus blandit turpis et metus laoreet consequat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque tincidunt tristique enim at mollis. Aenean a erat metus. Nam in dolor nisl. Integer ultricies dapibus nisi ut elementum. Pellentesque nulla magna, vehicula sit amet dignissim ut, cursus ac est. Morbi congue velit in orci condimentum sed tincidunt orci molestie. Nullam molestie faucibus quam, at facilisis augue euismod sit amet.</p>\r\n	<p>\r\n		Mauris iaculis ante sed urna tempor ac eleifend metus facilisis. Nulla venenatis, nisi sed pulvinar pellentesque, ligula ante semper eros, vitae tristique dui ipsum sit amet dui. Maecenas eu euismod massa. Donec aliquet neque vitae arcu consequat placerat. Phasellus neque nulla, fringilla vel hendrerit quis, sollicitudin eget nunc. Praesent commodo, justo suscipit dapibus vulputate, dolor urna egestas lectus, quis porttitor leo ante sit amet orci. Maecenas elementum euismod diam in malesuada. Mauris quis sem vel nibh tempus ornare et tristique orci. Quisque molestie neque sed dolor adipiscing tincidunt. Aenean vehicula venenatis accumsan. Nulla non venenatis purus.</p>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n','2011-11-19 23:57:28');
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `content` (
  `c_content_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `c_path` varchar(100) NOT NULL DEFAULT '',
  `c_title` varchar(100) NOT NULL DEFAULT '',
  `c_body` longtext NOT NULL,
  PRIMARY KEY (`c_content_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `content`
--

LOCK TABLES `content` WRITE;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
INSERT INTO `content` VALUES (2,'about','About The Photog','<div class=\"about-quote\">\"Time is made up of moments. \r<br>Moments are seconds that turn into memories that I adore to capture for my clients.\"</div>\r<br>\r<br>What drives me is to create and capture real life images that evoke emotions and I believe the  best photographs are the ones that suggest many emotions regardless of their subject.\r<br>\r<br>I started taking photos, learning on my Minolta 35mm in my mid teens, while heavily studying in the fine arts. Much of work was based around abstract photomontage especially as I finished my degree at the Ontario College of Art & Design. I rekindled my love for photography when I made the transition over to digital in 2009 and so glad I did!\r<br>\r<br>My style is natural, fun and stylish. I love what I do!\r<br>\r<br><span class=\"about-quote\">xo Tara Noelle</span>\r<br>\r<br>Specializing in:\r<br>\r<br><span class=\"bold\">Love</span>: Weddings, Engagements & Showers\r<br><span class=\"bold\">Lifestyle</span>: Families, Babies, Friendly Animals & Musicians\r<br><span class=\"bold\">Style</span>: Fashion & Street\r<br><span class=\"bold\">Interior</span>: Design & Propping\r<br><span class=\"bold\">Events</span>: Corporate & Special \r<br><span class=\"bold\">Conceptual</span>: Experimental & Collaborative\r<br>'),(4,'details','Details','<span class=\"section-header bold\">Investments</span>\r<br><div class=\"pl-8\">\r<br><span class=\"highlight\">Basic Wedding Coverage</span> begins at $900.00\r<br><span class=\"highlight\">Event Coverage</span> begins at $250.00 per hour\r<br><span class=\"highlight\">Lifestyle Photos</span> begin at $225.00 per hour\r<br>\r<br>All pricing and packages are customizable to fit your needs and special occasion. \r<br>\r<br>Please <a href=\"/contact\">contact</a> me for a complimentary consult and quote.\r<br></div>\r<br>\r<br><hr>\r<br>\r<br><span class=\"section-header bold\">Giving Back</span>\r<br><div class=\"pl-8\">\r<br><span class=\"highlight\">One Lovely Deserving Couple</span> - Once a year, I am offering one wedding free of charge to a deserving couple. If you know of a couple in a special situation that is having a difficult time and is in need of securing a photographer, send me a note explaining their predicament.\r<br>\r<br>What this entails is 8 hours of wedding day photo coverage. I will then give you the CD of your images for your own personal printing. The couple must be in and around the Toronto/GTA location. \r<br>\r<br>I want to share this gift with others that may not be able to afford it, but totally deserve it!');
/*!40000 ALTER TABLE `content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `galleries` (
  `g_gallery_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `g_path` varchar(30) NOT NULL DEFAULT '',
  `g_category` varchar(30) NOT NULL DEFAULT '',
  `g_name` varchar(40) NOT NULL DEFAULT '',
  `g_description` text,
  `g_allowed_users` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`g_gallery_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `galleries`
--

LOCK TABLES `galleries` WRITE;
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
INSERT INTO `galleries` VALUES (1,'galleries/the-love-gallery','Love','The Love Gallery','This is a gallery of love',NULL),(2,'galleries/weddings','Lifestyle','Some Weddings','Wedding Gallery',NULL),(3,'galleries/out-and-about','Interior','Around The City','Some shots from around the city we live in',NULL),(4,'galleries/style','Style','My Style!','What\'s your style?','3,4'),(10,'galleries/another','New Galleries','Another One','one more test',NULL),(9,'galleries/test-gallery','New Gallery','Test Gallery','Just a test of the adding stuff...','3,2');
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galleries_images`
--

DROP TABLE IF EXISTS `galleries_images`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `galleries_images` (
  `gi_gallery_image_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gi_gallery_id` int(10) unsigned NOT NULL,
  `gi_filename` varchar(40) NOT NULL DEFAULT '',
  `gi_date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`gi_gallery_image_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `galleries_images`
--

LOCK TABLES `galleries_images` WRITE;
/*!40000 ALTER TABLE `galleries_images` DISABLE KEYS */;
INSERT INTO `galleries_images` VALUES (1,10,'DSC02262','0000-00-00 00:00:00'),(2,10,'DSC02089','0000-00-00 00:00:00'),(7,4,'DSC02101','0000-00-00 00:00:00'),(8,10,'DSC02263','0000-00-00 00:00:00'),(9,10,'DSC02361','0000-00-00 00:00:00'),(10,10,'DSC02368','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `galleries_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `links`
--

DROP TABLE IF EXISTS `links`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `links` (
  `l_link_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `l_category` varchar(30) NOT NULL DEFAULT '',
  `l_url` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`l_link_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `links`
--

LOCK TABLES `links` WRITE;
/*!40000 ALTER TABLE `links` DISABLE KEYS */;
INSERT INTO `links` VALUES (1,'Make Up/Styling','www.dyanecampbell.com'),(2,'Music','www.rayna.ca'),(3,'Follow Photogs','www.robertha.ca'),(4,'Follow Photogs','www.bofoto.ca'),(5,'Event Entertainment','www.qentertainment.ca'),(6,'Interior Designers','www.cromadesign.com'),(7,'Interior Designers','www.raddesign.ca');
/*!40000 ALTER TABLE `links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `users` (
  `u_user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `u_username` varchar(20) NOT NULL DEFAULT '',
  `u_fullname` varchar(40) NOT NULL DEFAULT '',
  `u_password` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`u_user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'tara','Tara Noelle','blarg'),(2,'tyler','Tyler Schwartz','blarg'),(3,'jimmy','Jimmy-Bob','blarg'),(4,'paul','Paul Martin','blarg');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-11-30 21:59:04
