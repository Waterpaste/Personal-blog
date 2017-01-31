-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: blog
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `think_about`
--

DROP TABLE IF EXISTS `think_about`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `about` text NOT NULL,
  `only` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_about`
--

LOCK TABLES `think_about` WRITE;
/*!40000 ALTER TABLE `think_about` DISABLE KEYS */;
INSERT INTO `think_about` VALUES (1,'&lt;p&gt;本站是作为一个独立博客，博客的内容主要涉及到编程、PHP、WEB开发、数据库等方面。网站是博主用PHP MVC编写的，前端框架采用的是Bootstrap。建立博客的主要目的是为了记录平时遇到的问题，并进行总结归纳和分享。&lt;/p&gt;\r\n\r\n&lt;hr /&gt;\r\n&lt;h3&gt;站长留言&lt;/h3&gt;\r\n\r\n&lt;p&gt;由于个人水平有限，所以博客中的文章难免有错误或者不正确的地方，欢迎在文章下方留言进行讨论。&lt;/p&gt;\r\n\r\n&lt;hr /&gt;\r\n&lt;h3&gt;友情链接互换&lt;/h3&gt;\r\n\r\n&lt;p&gt;互换友链的站长朋友可以联系我邮箱luos_xv@hotmail.com。&lt;/p&gt;\r\n\r\n&lt;hr /&gt;\r\n&lt;h3&gt;联系方式&lt;/h3&gt;\r\n\r\n&lt;p&gt;邮箱：luos_xv@hotmail.com&lt;/p&gt;\r\n\r\n&lt;p&gt;新浪微博：&lt;a href=&quot;http://weibo.com/p/1005055506584935&quot; target=&quot;_blank&quot;&gt;http://weibo.com/p/1005055506584935&lt;/a&gt;（PS：微博比较少上）&lt;/p&gt;\r\n\r\n&lt;hr /&gt;\r\n&lt;h3&gt;一句箴言&lt;/h3&gt;\r\n\r\n&lt;p&gt;一生中你唯一需要回头的时候，是为了看自己到底走了多远。&lt;/p&gt;\r\n','一生中你唯一需要回头的时候，是为了看自己到底走了多远。');
/*!40000 ALTER TABLE `think_about` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_cates`
--

DROP TABLE IF EXISTS `think_cates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_cates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '分类名称',
  `pid` int(11) NOT NULL COMMENT '父级id',
  `path` varchar(255) NOT NULL COMMENT '路径',
  `s_desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_cates`
--

LOCK TABLES `think_cates` WRITE;
/*!40000 ALTER TABLE `think_cates` DISABLE KEYS */;
INSERT INTO `think_cates` VALUES (1,'web',0,'','web');
/*!40000 ALTER TABLE `think_cates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_comments`
--

DROP TABLE IF EXISTS `think_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_url` varchar(50) DEFAULT NULL COMMENT '用户id',
  `author` varchar(30) NOT NULL,
  `content` text NOT NULL COMMENT '评论内容',
  `email` varchar(50) DEFAULT NULL,
  `pid` int(11) NOT NULL COMMENT '父级评论id 0是评论 大于0为回复',
  `post_id` int(11) NOT NULL COMMENT '文章id',
  `date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_comments`
--

LOCK TABLES `think_comments` WRITE;
/*!40000 ALTER TABLE `think_comments` DISABLE KEYS */;
INSERT INTO `think_comments` VALUES (1,'','test',' test1','',0,1,'2017-01-30 21:34:35','0.0.0.0'),(2,'','test',' 123','',1,1,'2017-01-30 21:35:59','0.0.0.0'),(3,'','test',' 123321','',0,1,'2017-01-30 21:36:11','0.0.0.0');
/*!40000 ALTER TABLE `think_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_essay`
--

DROP TABLE IF EXISTS `think_essay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_essay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `url` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `pid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_essay`
--

LOCK TABLES `think_essay` WRITE;
/*!40000 ALTER TABLE `think_essay` DISABLE KEYS */;
INSERT INTO `think_essay` VALUES (13,'admin','adfsdafdas',NULL,NULL,'2017-01-21 18:32:30',0),(14,'admin','231213123',NULL,NULL,'2017-01-21 18:37:24',0);
/*!40000 ALTER TABLE `think_essay` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_friends`
--

DROP TABLE IF EXISTS `think_friends`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `f_title` varchar(50) NOT NULL,
  `f_url` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_friends`
--

LOCK TABLES `think_friends` WRITE;
/*!40000 ALTER TABLE `think_friends` DISABLE KEYS */;
INSERT INTO `think_friends` VALUES (1,'风炫博客|网络安全|WEB渗透|数据安全|算法编程|--大白的博客','http://www.evalshell.com/');
/*!40000 ALTER TABLE `think_friends` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_info`
--

DROP TABLE IF EXISTS `think_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_info` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `stitle` varchar(20) NOT NULL COMMENT '//网站标题',
  `slogo` varchar(255) NOT NULL,
  `surl` varchar(30) DEFAULT NULL COMMENT '//网站域名',
  `skeywords` text COMMENT '//网站关键字',
  `ps` text,
  `sdescription` text COMMENT '//关于本站',
  `s_name` varchar(10) NOT NULL COMMENT '//联系人',
  `s_tel` varchar(20) DEFAULT NULL,
  `s_qq` varchar(25) DEFAULT NULL,
  `s_email` varchar(30) NOT NULL,
  `scopyright` text NOT NULL COMMENT '底部信息：',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_info`
--

LOCK TABLES `think_info` WRITE;
/*!40000 ALTER TABLE `think_info` DISABLE KEYS */;
INSERT INTO `think_info` VALUES (1,'洛书 | blog','/luoshublog/Uploads/2017-01-14/5879e5c65a477.jpg','http://www.localhost.com','','PS:博主是一名PHP程序员（一名IT届的小学森）,','这是一个程序猿的独立博客，主要分享与编程技术有关的内容，包括PHP、数据库、WEB开发等。 这里也是博主学习中遇到的问题及解决方案的地方。\r\nPS:博主是一名PHP程序员（一名IT届的小学森）,','luoshu','1737257007','1737257007','1737257007@qq.com','Copyright © 2016 luoshu | 联系我 :luos_xv@hotmail.com | All Rights Reserved. | 豫ICP备16019396号-1 ');
/*!40000 ALTER TABLE `think_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_posts`
--

DROP TABLE IF EXISTS `think_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_title` varchar(255) NOT NULL COMMENT '//内容',
  `content` text NOT NULL,
  `note` text COMMENT '//文章描述',
  `source` varchar(20) DEFAULT NULL,
  `s_title` varchar(30) NOT NULL COMMENT '//关键字',
  `count` smallint(6) NOT NULL COMMENT '//浏览量',
  `date` datetime NOT NULL COMMENT '//时间',
  `authour` varchar(10) NOT NULL COMMENT '作者',
  `cate_id` int(11) NOT NULL COMMENT '分类id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_posts`
--

LOCK TABLES `think_posts` WRITE;
/*!40000 ALTER TABLE `think_posts` DISABLE KEYS */;
INSERT INTO `think_posts` VALUES (1,'test','&lt;p&gt;test&lt;/p&gt;\r\n','test','test123','test',13,'2017-01-30 21:34:16','admin',1);
/*!40000 ALTER TABLE `think_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `think_users`
--

DROP TABLE IF EXISTS `think_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `think_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL COMMENT '头像',
  `intro` text NOT NULL COMMENT '个人介绍',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `think_users`
--

LOCK TABLES `think_users` WRITE;
/*!40000 ALTER TABLE `think_users` DISABLE KEYS */;
INSERT INTO `think_users` VALUES (1,'admin','88d99fc18434cff65383fcfe175a0e2f','123@123.com','1','1');
/*!40000 ALTER TABLE `think_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-31 13:12:20
