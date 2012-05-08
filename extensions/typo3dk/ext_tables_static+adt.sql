-- MySQL dump 10.13  Distrib 5.1.59, for apple-darwin11.2.0 (i386)
--
-- Host: localhost    Database: typo3dk
-- ------------------------------------------------------
-- Server version	5.1.59

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
-- Table structure for table `tx_templavoila_tmplobj`
--

DROP TABLE IF EXISTS `tx_templavoila_tmplobj`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tx_templavoila_tmplobj` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0',
  `t3ver_oid` int(11) NOT NULL DEFAULT '0',
  `t3ver_id` int(11) NOT NULL DEFAULT '0',
  `t3ver_wsid` int(11) NOT NULL DEFAULT '0',
  `t3ver_label` varchar(30) NOT NULL DEFAULT '',
  `t3ver_state` tinyint(4) NOT NULL DEFAULT '0',
  `t3ver_stage` tinyint(4) NOT NULL DEFAULT '0',
  `t3ver_count` int(11) NOT NULL DEFAULT '0',
  `t3ver_tstamp` int(11) NOT NULL DEFAULT '0',
  `t3_origuid` int(11) NOT NULL DEFAULT '0',
  `tstamp` int(11) unsigned NOT NULL DEFAULT '0',
  `crdate` int(11) unsigned NOT NULL DEFAULT '0',
  `cruser_id` int(11) unsigned NOT NULL DEFAULT '0',
  `fileref_mtime` int(11) unsigned NOT NULL DEFAULT '0',
  `deleted` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `sorting` int(11) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `datastructure` varchar(100) NOT NULL DEFAULT '',
  `fileref` tinytext,
  `templatemapping` mediumblob,
  `previewicon` tinytext,
  `description` tinytext,
  `rendertype` varchar(32) NOT NULL DEFAULT '',
  `sys_language_uid` int(11) unsigned NOT NULL DEFAULT '0',
  `parent` int(11) unsigned NOT NULL DEFAULT '0',
  `rendertype_ref` int(11) unsigned NOT NULL DEFAULT '0',
  `localprocessing` text,
  `fileref_md5` varchar(32) NOT NULL DEFAULT '',
  `belayout` tinytext,
  PRIMARY KEY (`uid`),
  KEY `t3ver_oid` (`t3ver_oid`,`t3ver_wsid`),
  KEY `parent` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tx_templavoila_tmplobj`
--

LOCK TABLES `tx_templavoila_tmplobj` WRITE;
/*!40000 ALTER TABLE `tx_templavoila_tmplobj` DISABLE KEYS */;
INSERT INTO `tx_templavoila_tmplobj` VALUES (1,21,0,0,0,'',0,0,0,0,0,1336032601,1335944393,4,1336031992,0,256,'Frontpage [Template]','fileadmin/templates/common/datastructures/page/Frontpage (page).xml','fileadmin/templates/typo3danmark/html/frontpage.html','a:5:{s:11:\"MappingInfo\";a:1:{s:4:\"ROOT\";a:2:{s:6:\"MAP_EL\";s:13:\"body[1]/INNER\";s:2:\"el\";a:2:{s:6:\"header\";a:1:{s:6:\"MAP_EL\";s:30:\"div.wrapper[1] header[1]/INNER\";}s:7:\"content\";a:1:{s:6:\"MAP_EL\";s:25:\"div.wrapper[1] section[1]\";}}}}s:16:\"MappingInfo_head\";a:2:{s:16:\"headElementPaths\";N;s:10:\"addBodyTag\";i:0;}s:18:\"MappingData_cached\";a:2:{s:6:\"cArray\";a:5:{i:0;s:34:\"\n	<div class=\"wrapper\">\n		<header>\";s:6:\"header\";s:130:\"\n			<nav>\n				<ul>\n					<li>Om TYPO3</li>\n					<li>Forum</li>\n					<li>Know how</li>\n					<li>Showcase</li>\n				</ul>\n			</nav>\n		\";i:2;s:12:\"</header>\n		\";s:7:\"content\";s:77:\"<section>\n			<h2>TYPO3 er det perfekt valg for alle brugere</h2>\n		</section>\";i:4;s:95:\"\n		<footer>\n			(C) TYPO3 Association  |  Om typo3.dk  |  Kontakt webmaster\n		</footer>\n	</div>\n\";}s:3:\"sub\";a:0:{}}s:23:\"MappingData_head_cached\";a:2:{s:6:\"cArray\";a:1:{i:0;s:463:\"\n	<meta charset=\"utf-8\" />\n	<title>TYPO3 Danmark</title>\n	<link rel=\"stylesheet\" href=\"fileadmin/templates/typo3danmark/html/../../common/stylesheets/reset.css\" />\n	<link rel=\"stylesheet\" href=\"fileadmin/templates/typo3danmark/html/../stylesheets/main.css\" />\n	<link rel=\"stylesheet\" href=\"fileadmin/templates/typo3danmark/html/../stylesheets/columns.css\" />\n	<link rel=\"stylesheet\" href=\"fileadmin/templates/typo3danmark/html/../stylesheets/navigation.css\" />\n\n\n\";}s:3:\"sub\";a:0:{}}s:14:\"BodyTag_cached\";s:0:\"\";}',NULL,NULL,'',0,0,0,NULL,'cbe79d0e66443e635048501b6e464005',NULL),(3,21,0,0,0,'',0,0,0,0,0,1336462512,1336426902,4,1336426744,0,64,'Content slider [Template]','fileadmin/templates/common/datastructures/fce/Content slider (fce).xml','fileadmin/templates/common/html/FCE/content-slider.html','a:2:{s:11:\"MappingInfo\";a:1:{s:4:\"ROOT\";a:2:{s:6:\"MAP_EL\";s:24:\"body[1] section[1]/INNER\";s:2:\"el\";a:1:{s:5:\"items\";a:2:{s:6:\"MAP_EL\";s:17:\"ul[1] li[1]/INNER\";s:2:\"el\";a:2:{s:5:\"image\";a:1:{s:6:\"MAP_EL\";s:6:\"img[1]\";}s:6:\"header\";a:1:{s:6:\"MAP_EL\";s:18:\"div[1] h3[1]/INNER\";}}}}}}s:18:\"MappingData_cached\";a:2:{s:6:\"cArray\";a:3:{i:0;s:15:\"\n		<ul>\n			<li>\";s:5:\"items\";s:211:\"\n				<img src=\"fileadmin/templates/common/html/FCE/../../../typo3danmark/images/banner.png\" />\n				<div>\n					<h3>Header</h3>\n					<p>Teaser</p>\n					<p>\n						<a href=\"#\">Link tekst</a>\n					</p>\n				</div>\n			\";i:2;s:15:\"</li>\n		</ul>\n	\";}s:3:\"sub\";a:1:{s:5:\"items\";a:2:{s:6:\"cArray\";a:5:{i:0;s:5:\"\n				\";s:5:\"image\";s:89:\"<img src=\"fileadmin/templates/common/html/FCE/../../../typo3danmark/images/banner.png\" />\";i:2;s:20:\"\n				<div>\n					<h3>\";s:6:\"header\";s:6:\"Header\";i:4;s:91:\"</h3>\n					<p>Teaser</p>\n					<p>\n						<a href=\"#\">Link tekst</a>\n					</p>\n				</div>\n			\";}s:3:\"sub\";a:0:{}}}}}',NULL,NULL,'',0,0,0,NULL,'079c32a5da45d1e7b5fda1811b7e49f8',NULL),(2,21,0,0,0,'',0,0,0,0,0,1336031469,1335971416,4,1336031453,0,128,'Nyheds slider [Template]','fileadmin/templates/common/datastructures/fce/Nyheds slider (fce).xml','fileadmin/templates/common/html/blank.html','a:5:{s:11:\"MappingInfo\";a:1:{s:4:\"ROOT\";a:2:{s:6:\"MAP_EL\";s:7:\"body[1]\";s:2:\"el\";a:1:{s:7:\"content\";a:1:{s:6:\"MAP_EL\";s:7:\"body[1]\";}}}}s:16:\"MappingInfo_head\";a:2:{s:16:\"headElementPaths\";N;s:10:\"addBodyTag\";i:0;}s:18:\"MappingData_cached\";a:2:{s:6:\"cArray\";a:3:{i:0;s:0:\"\";s:7:\"content\";s:17:\"<body>\r\n  </body>\";i:2;s:0:\"\";}s:3:\"sub\";a:0:{}}s:23:\"MappingData_head_cached\";a:2:{s:6:\"cArray\";a:1:{i:0;s:4:\"\r\n  \";}s:3:\"sub\";a:0:{}}s:14:\"BodyTag_cached\";s:0:\"\";}',NULL,NULL,'',0,0,0,NULL,'ec2bc6026881b43d7f56307759aba914',NULL);
/*!40000 ALTER TABLE `tx_templavoila_tmplobj` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-05-08  9:53:01
