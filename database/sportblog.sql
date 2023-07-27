-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: sportblog
-- ------------------------------------------------------
-- Server version	8.0.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'Football Basics','Learn the basics of football and its rules.','Sports','2023-07-20 09:00:00'),(2,'Basketball Techniques','Improve your basketball skills with these techniques.','Sports','2023-07-20 10:30:00'),(3,'Tennis Tips and Tricks','Master your tennis game with these useful tips.','Sports','2023-07-20 11:45:00'),(4,'Running for Beginners','Get started with running and stay fit!','Fitness','2023-07-20 12:15:00'),(5,'Healthy Eating Habits','Discover the benefits of healthy eating and its impact on your body.','Health','2023-07-20 13:30:00'),(6,'Yoga for Stress Relief','Learn yoga poses to reduce stress and improve relaxation.','Health','2023-07-20 14:45:00'),(7,'Cycling Adventures','Explore beautiful cycling routes and destinations.','Outdoor','2023-07-20 15:20:00'),(8,'Swimming Techniques','Improve your swimming skills with these helpful techniques.','Sports','2023-07-21 09:30:00'),(9,'Gym Workouts for Beginners','Start your fitness journey with these effective gym workouts.','Fitness','2023-07-21 10:45:00'),(10,'Soccer Tips for Goalkeepers','Enhance your goalkeeping skills with these soccer tips.','Sports','2023-07-21 11:15:00'),(11,'Benefits of Outdoor Activities','Discover the advantages of outdoor activities for your health and well-being.','Outdoor','2023-07-21 12:30:00'),(12,'Healthy Smoothie Recipes','Try these delicious and nutritious smoothie recipes for a healthy boost.','Health','2023-07-21 13:45:00'),(13,'Mindfulness Meditation','Practice mindfulness meditation to reduce stress and improve focus.','Health','2023-07-21 14:20:00'),(14,'Climbing Essentials','Essential gear and tips for rock climbing enthusiasts.','Outdoor','2023-07-21 15:35:00'),(15,'Basic Rules of Cricket','Learn the rules and terminology of cricket.','Sports','2023-07-22 09:50:00'),(16,'Indoor Cycling Benefits','Discover the benefits of indoor cycling and how it can improve your fitness.','Fitness','2023-07-22 10:15:00'),(17,'Mental Health Awareness','Raise awareness about mental health and its importance in daily life.','Health','2023-07-22 11:30:00'),(18,'Hiking Trails to Explore','Explore these beautiful hiking trails for nature lovers.','Outdoor','2023-07-22 12:45:00'),(19,'Weightlifting Techniques','Master proper weightlifting techniques to avoid injuries.','Fitness','2023-07-22 13:15:00'),(20,'Importance of Hydration','Understand the importance of staying hydrated for overall health.','Health','2023-07-22 14:30:00'),(21,'Camping Essentials','Essential items and tips for a successful camping trip.','Outdoor','2023-07-22 15:20:00'),(22,'Golf Swing Basics','Learn the basics of the golf swing for beginners.','Sports','2023-07-23 09:40:00'),(23,'Yoga for Flexibility','Improve your flexibility with specific yoga poses.','Fitness','2023-07-23 10:10:00'),(24,'Nutrition for Endurance Athletes 54','Discover the ideal nutrition for endurance athletes.','Health','2023-07-23 11:25:00'),(25,'Rock Climbing Safety Tips','Ensure safety while rock climbing with these tips.','Outdoor','2023-07-23 12:50:00'),(26,'Table Tennis Techniques','Improve your table tennis skills with these techniques.','Sports','2023-07-23 13:30:00'),(27,'Healthy Snack Ideas a','Explore healthy snack options for guilt-free munching.','Health','2023-07-23 14:40:00'),(32,'as','aa','Sports','2023-07-25 21:33:24'),(33,'asd','asdas','Sports','2023-07-26 16:38:24'),(37,'asds','Looping Constructs\r\nLoops In Java\r\nThere may be a situation when you need to execute a block of code several number of times. In general, statements are executed sequentially: The first statement in a function is executed first, followed by the second, and so on.\r\nProgramming languages provide various control structures that allow for more complicated execution paths.\r\nA loop statement allows us to execute a statement or group of statements multiple times and following is the general form of a loop statement in most of the programming languages.\r\nTypes Of Loops : \r\nJava programming language provides the following types of loop to handle looping requirements : \r\n\r\nWhile loop\r\nFor loop\r\nDo..While loop\r\n\r\nWhile Loop\r\nA while loop statement in Java programming language repeatedly executes a target statement as long as a given condition is true. \r\n\r\nSyntax : \r\nwhile(Boolean_expression) {\r\n   // Statements\r\n}\r\nHere, statement(s) may be a single statement or a block of statements. The condition may be any expression, and true is any non zero value. \r\n\r\nWhen executing, if the boolean_expression result is true, then the actions inside the loop will be executed. This will continue as long as the expression result is true.\r\n\r\nWhen the condition becomes false, program control passes to the line immediately following the loop.\r\n\r\nExample \r\npublic class Test {\r\n\r\n   public static void main(String args[]) {\r\n      int x = 10;\r\n\r\n      while( x < 20 ) {\r\n         System.out.print(\"value of x : \" + x );\r\n         x++;\r\n         System.out.print(\"\n\");\r\n      }\r\n   }\r\n}\r\n\r\nFor Loop\r\nA for loop is a repetition control structure that allows you to efficiently write a loop that needs to be executed a specific number of times.\r\nA for loop is useful when you know how many times a task is to be repeated.\r\nSyntax : \r\nfor(initialization; Boolean_expression; update) {\r\n   // Statements\r\n}\r\nThis is how it works : \r\n\r\nThe initialization step is executed first, and only once. This step allows you to declare and initialize any loop control variables and this step ends with a semi colon (;).\r\nNext, the Boolean expression is evaluated.  If it is true, the body of the loop is executed. If it is false, the body of the loop will not be executed and control jumps to the next statement past the for loop.\r\nAfter the body of the for loop gets executed, the control jumps back up to the update statement. This statement allows you to update any loop control variables. This statement can be left blank with a semicolon at the end.\r\nThe Boolean expression is now evaluated again. If it is true, the loop executes and the process repeats (body of loop, then update step, then Boolean expression).  After the Boolean expression is false, the for loop terminates.\r\nExample\r\npublic class Test {\r\n\r\n   public static void main(String args[]) {\r\n\r\n      for(int x = 10; x < 20; x = x + 1) {\r\n         System.out.print(\"value of x : \" + x );\r\n         System.out.print(\"\n\");\r\n      }\r\n   }\r\n}\r\n\r\nDo..While Loop\r\nA do...while loop is similar to a while loop, except that a do...while loop is guaranteed to execute at least one time. \r\n\r\nSyntax : \r\ndo {\r\n   // Statements\r\n}while(Boolean_expression);\r\nNotice that the Boolean expression appears at the end of the loop, so the statements in the loop execute once before the Boolean is tested.\r\n\r\nIf the Boolean expression is true, the control jumps back up to do statement, and the statements in the loop execute again. This process repeats until the Boolean expression is false.\r\n\r\nExample\r\npublic class Test {\r\n\r\n   public static void main(String args[]) {\r\n      int x = 10;\r\n\r\n      do {\r\n         System.out.print(\"value of x : \" + x );\r\n         x++;\r\n         System.out.print(\"\n\");\r\n      }while( x < 20 );\r\n   }\r\n}\r\n\r\nEnhanced For Loop\r\nAs of Java 5, the enhanced for loop was introduced. This is mainly used to traverse collection of elements including arrays. \r\n\r\nSyntax : \r\nfor(declaration : expression) {\r\n   // Statements\r\n}\r\nDeclaration − The newly declared block variable, is of a type compatible with the elements of the array you are accessing. The variable will be available within the for block and its value would be the same as the current array element.\r\nExpression − This evaluates to the array you need to loop through. The expression can be an array variable or method call that returns an array.\r\nExample\r\npublic class Test {\r\n\r\n   public static void main(String args[]) {\r\n      int [] numbers = {10, 20, 30, 40, 50};\r\n\r\n      for(int x : numbers ) {\r\n         System.out.print( x );\r\n         System.out.print(\",\");\r\n      }\r\n      System.out.print(\"\n\");\r\n      String [] names = {\"James\", \"Larry\", \"Tom\", \"Lacy\"};\r\n\r\n      for( String name : names ) {\r\n         System.out.print( name );\r\n         System.out.print(\",\");\r\n      }\r\n   }\r\n}','Sports','2023-07-27 04:02:41');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `upvotes`
--

DROP TABLE IF EXISTS `upvotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `upvotes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `post_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `upvotes_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  CONSTRAINT `upvotes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upvotes`
--

LOCK TABLES `upvotes` WRITE;
/*!40000 ALTER TABLE `upvotes` DISABLE KEYS */;
INSERT INTO `upvotes` VALUES (1,37,2,'2023-07-26 22:42:40'),(2,37,2,'2023-07-26 22:42:40'),(3,33,2,'2023-07-26 22:44:25'),(4,33,2,'2023-07-26 22:44:25'),(5,32,2,'2023-07-26 22:44:33'),(6,32,2,'2023-07-26 22:44:33'),(7,27,2,'2023-07-26 22:44:39'),(8,27,2,'2023-07-26 22:44:39'),(9,26,2,'2023-07-26 22:44:43'),(10,26,2,'2023-07-26 22:44:43');
/*!40000 ALTER TABLE `upvotes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin'),(2,'jack','$2y$10$qT//aERh1CQohfmKqUHPseqWcdjofs8tu36H3au3bkLbgPFryZsnC'),(6,'admin2','$2y$10$lUGFeIUMStFdC6vWV22Vyen1uZTgxGitN/KTj./WQELkb4XBkoJgG');
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

-- Dump completed on 2023-07-26 23:16:29
