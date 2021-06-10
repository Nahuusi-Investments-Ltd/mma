# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.30)
# Database: mma_374
# Generation Time: 2021-06-10 07:55:29 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table tbl_blog
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_blog`;

CREATE TABLE `tbl_blog` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` text,
  `message` text,
  `number_of_views` int(11) DEFAULT NULL,
  `link` text,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tbl_blog` WRITE;
/*!40000 ALTER TABLE `tbl_blog` DISABLE KEYS */;

INSERT INTO `tbl_blog` (`id`, `title`, `message`, `number_of_views`, `link`, `date_created`, `update_on`)
VALUES
	(1,'My thoughts about martial arts','The art itself was created to cultivate the mind and body.  Its primary purpose being that it can be used as a weapon to defend, to survive, to attack, to conquer, and although counter intuitive at first thought, it was also used as a peace keeping tool on many occasions. [...]',374,'my_thoughts_about_mma.jpg','2021-06-05 12:22:24','2021-06-05 12:22:24'),
	(2,'Keep On Rowing','If you can remember a few key points in life, you will find it easier to pick yourself up when circumstances or people you depend on just don’t seem to be on your side. Firstly, in this life no matter what you do, you will always have someone who does not agree with your decision, action or choice. [...]',374,'keep_on_rowing.jpg','2021-06-05 12:23:00','2021-06-05 12:23:00'),
	(3,'A good place to start','Starting from scratch is not necessarily an easy thing to do but it does have a silver lining; the blank canvas with which you can express your creative ability. Starting from scratch is less of a challenge if you know what you want and the direction you are taking. It motivates [...]',374,'a_good_place_to_start.jpg','2021-06-05 12:23:38','2021-06-05 12:23:38');

/*!40000 ALTER TABLE `tbl_blog` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_category`;

CREATE TABLE `tbl_category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` text,
  `description` text,
  `link` text,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tbl_category` WRITE;
/*!40000 ALTER TABLE `tbl_category` DISABLE KEYS */;

INSERT INTO `tbl_category` (`id`, `title`, `description`, `link`, `date_created`, `updated_on`)
VALUES
	(1,'Adult Classes','<p>Our Adult Classes are all inclusive, from novices to experts. All classes will challenge you no matter your skill level.</p>','67dc04d7c59480257d028e74795181e8.png','2021-06-01 19:23:26','2021-06-09 17:28:47'),
	(2,'Youth classes','Youth make up and important part of our 374 family. As with all classes and levels of practice, youth will be challenged to push themselves and achieve more than they thought capable!','youthClasses.png','2021-06-01 19:23:26','2021-06-01 19:23:26'),
	(3,'Kids Classes','<p>Our children train in Self Defense Jiu Jitsu and are taught practical techniques in a fun and welcoming environment. Learning Self Defense skills allows children to feel confident in all situations. Discipline and respect are taught (and shown) and are also a large aspect in our children’s programming. These, along with Self Defense, benefit children far beyond the doors of our facility, extending to home, school, other extra curricular actives and personal interactions.</p>','kidsClasses.png','2021-06-01 19:23:26','2021-06-10 09:30:14');

/*!40000 ALTER TABLE `tbl_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_classes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_classes`;

CREATE TABLE `tbl_classes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` text,
  `sub_title` text,
  `tag` text,
  `content` text,
  `link` text,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tbl_classes` WRITE;
/*!40000 ALTER TABLE `tbl_classes` DISABLE KEYS */;

INSERT INTO `tbl_classes` (`id`, `title`, `sub_title`, `tag`, `content`, `link`, `date_created`, `updated_on`)
VALUES
	(1,'Muay Thai','Get Ready for More','AdultClasses','Muay Thai is a martial art and combat sport that uses stand-up striking along with clinching techniques. \n					        		<br>\n					        		This discipline is known as the \"art of eight limbs\" as it is characterized by the combined use of fists, elbows, knees and shins.  \n					        		<br>\n					        		This class is a calorie burner incorporating self defense that will improve your confidence, mental toughness and will strengthen your entire body, all that and we promise you’ll have fun!','class_muay_thai_basics.png','2021-06-01 21:00:21','2021-06-01 21:00:21'),
	(2,'Adult Self Defence Jiu Jitsu','AA Versatile Tool','AdultClasses','Self Defense Jiu Jitsu is a predominantly (but not strictly) ground-based martial art, using the principals of leverage, angles, pressure and timing in order to achieve a non-violent submission of one’s opponent. Jiu Jitsu focuses on close-contact “grappling” holds and techniques.  Jiu Jitsu was designed so that the smaller person can defend against a larger opponent.  Regardless of size, age, gender and physical limitations anyone can benefit from the practice of Jiu Jitsu.  Practicing will increase strength, cardio, improve muscle tone and increases body awareness.  Finally, jiu jitsu boosts self assurance allowing you to feel confident that you can defend yourself in any situation.','class_muay_thai_basics.png','2021-06-01 21:01:14','2021-06-01 21:01:14'),
	(3,'Boxing','Start Excelling with Hands On Learning','AdultClasses','In boxing class, you are taught the proper ways to throw a jab, cross, hook, upper cut along with slipping, bobbing, blocking, cliches, footwork, pad work and drills.  \n					        		Technique is important and emphasized to prevent injury.  Along with the physical and mental benefits you’ll learn self defense, its a win win!','class_muay_thai_basics.png','2021-06-01 21:02:29','2021-06-01 21:06:47'),
	(4,'Body Weights (not weights)','Functional Fitness for all Levels','AdultClasses','Body Weight class employs strength-training exercises that use the individual\'s own weight to provide resistance against gravity. Bodyweight’s functional training exercises can enhance a range of biomotor abilities including strength, power, endurance, speed, flexibility, coordination and balance.','class_muay_thai_basics.png','2021-06-01 21:03:30','2021-06-01 21:03:30'),
	(5,'Youth Self Defense Jiu Jitsu','Confidence and Discipline','AdultClasses','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','class_muay_thai_basics.png','2021-06-01 21:04:44','2021-06-01 21:04:44'),
	(6,'Kids Self Defence','We Help Make Your Children Life Champions','KidsClasses','Kids Self Defense Jiu Jitsu is an amazing practice for children to learn.  They will grow confident that they are able to defend themselves.  Jiu Jitsu was designed so that the smaller person can defend against a larger opponent.  Unfortunately, children (and adults) are sometimes the target of bullying. We have found that children who practice Jiu Jitsu feel more confident knowing that they can defend themselves if needed.  Often that knowledge is just what they need to deter and deescalate an unpleasant interaction.  Jiu Jitsu also improves discipline, mental focus, body awareness, patience, humility and problem solving.','class_muay_thai_basics.png','2021-06-01 21:06:23','2021-06-01 21:06:23'),
	(7,'Competition','We Help Make Your Children Life Champions','KidsClasses','Competition Class is a high level, two hour, intense class created for those that want to compete.  It combines stand up and grappling and you will be pushed further and harder than you thought possible.  Bring your own puke bucket!','class_muay_thai_basics.png','2021-06-01 21:08:27','2021-06-01 21:08:27'),
	(8,'Wrestling','100% Optional','Others','Wrestling (Freestyle) is a style of martial art wrestling. Along with Greco-Roman, it is one of the two styles of wrestling contested in the Olympic Games.  Freestyle wrestling’s goal is to throw and pin the opponent to the mat.  Freestyle wrestling brings together traditional wrestling, judo, and sambo techniques and is one of the six main forms of amateur competitive wrestling practiced internationally today.  This is a fun class, strict emphasis on technique guaranteed to improve your wrestling game!','class_sparring.png','2021-06-01 21:09:18','2021-06-01 21:09:35'),
	(9,'Body Weight Classes','100% Optional','Others','Body Weight class employs strength-training exercises that use the individual\'s own weight to provide resistance against gravity. Bodyweight’s functional training exercises can enhance a range of biomotor abilities including strength, power, endurance, speed, flexibility, coordination and balance.','class_sparring.png','2021-06-01 21:10:39','2021-06-01 21:10:39'),
	(10,'Sparring','100% Optional','Others','Sparring takes the skill and techniques you’ve learned in your classes and lets you apply them in a safe and fun environment. \n								<br> \n								You’ll need full gear including a mouth guard to spar and of course sparring is optional.','class_sparring.png','2021-06-01 21:12:17','2021-06-01 21:12:17'),
	(11,'Events','Enjoy Affordable Rates','Others','Perfect spot for you! To anyone looking for a location for their next group event (bootcamp, dance class, community event etc) OR to personal trainers, 374 MMA is the place to consider. We offer low and affordable competitive rates. \n					        		<a href=\"contacts.php\" class=\"tooltip-1\" data-placement=\"top\" title=\"\" data-original-title=\"Contact 374 MMA, Biggest Mixed Martial Arts in gym Halifax, NS, Canada\">Contact Us (<b>374 MMA</b>) for more details</a>','class_muay_thai_basics.png','2021-06-01 21:13:29','2021-06-01 21:13:29');

/*!40000 ALTER TABLE `tbl_classes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_enrollments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_enrollments`;

CREATE TABLE `tbl_enrollments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` text,
  `lastname` text,
  `email` text,
  `phone` text,
  `adult_classes` text,
  `youth_classes` text,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table tbl_faq
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_faq`;

CREATE TABLE `tbl_faq` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` text,
  `message` text,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tbl_faq` WRITE;
/*!40000 ALTER TABLE `tbl_faq` DISABLE KEYS */;

INSERT INTO `tbl_faq` (`id`, `title`, `message`, `date_created`, `update_on`)
VALUES
	(1,'What do i need for my first class?','If you have gear, bring it along! Otherwise, just come in comfortable workout clothes (e.g. t-shirt, shorts, a sweater, and/or sweatpants) and we’ll lend you all the gear you need to participate.','2021-06-01 21:43:37','2021-06-01 21:43:37'),
	(2,'Will I have to spar?','Absolutely not! All our beginner classes are minimal contact. We go through body conditioning exercises, technique in the air, and pad drills. Advanced classes have a lot of pad and partner drills. Sparring classes are only available to those who are interested. You never have to spar if you don’t want.','2021-06-01 21:44:02','2021-06-01 21:44:02'),
	(3,'Do you to competitions?','Yes, of course! Just let us know if you would like to compete and we can let you in on the details.','2021-06-01 21:44:29','2021-06-01 21:44:29'),
	(4,'Why does the Coach tell me I suck?','Don\'t worry about it, keep on going. Everybody sucked once upon a time, including the coach. And you suck right now…remember now is not forever!','2021-06-01 21:44:51','2021-06-01 21:44:51'),
	(5,'When do I get a stripe or belt promotion?','Not until you deserve one, but if it will make you feel good, you can go somewhere else like Walmart and get as many stripes and any colour belt you want.','2021-06-01 21:46:51','2021-06-01 21:46:51'),
	(6,'Why do you focus on Self Defense?','Simply put, you have insurance on your car in case something happens so you can replace it or fix it. Doesn’t it then make sense to have “insurance” on your life in case something happens? Learning self defense allows you to protect or save your life or the life of a loved one. After all…you only have one life, protect it.','2021-06-01 21:47:12','2021-06-01 21:47:12');

/*!40000 ALTER TABLE `tbl_faq` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_media
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_media`;

CREATE TABLE `tbl_media` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` text,
  `link` text,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tbl_media` WRITE;
/*!40000 ALTER TABLE `tbl_media` DISABLE KEYS */;

INSERT INTO `tbl_media` (`id`, `title`, `link`, `date_created`, `updated_on`)
VALUES
	(1,'374mma, body weight workout by Josh','https://www.youtube.com/embed/bllq1pkAbyc','2021-06-05 12:11:18','2021-06-05 12:11:18'),
	(2,'Capoeira by Contramestre Comprido','https://www.youtube.com/embed/J9J86SzF8v0','2021-06-05 12:11:39','2021-06-05 12:11:39'),
	(3,'374MMA ,Chris and Susan combined class','https://www.youtube.com/embed/DZBExE_Ur_g','2021-06-05 12:12:19','2021-06-05 12:12:19');

/*!40000 ALTER TABLE `tbl_media` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_partner
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_partner`;

CREATE TABLE `tbl_partner` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` text,
  `link` text,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tbl_partner` WRITE;
/*!40000 ALTER TABLE `tbl_partner` DISABLE KEYS */;

INSERT INTO `tbl_partner` (`id`, `name`, `link`, `date_created`, `updated_on`)
VALUES
	(1,'Birdie On The Fly','birdie_fashion_truck.jpg','2021-06-01 20:42:39','2021-06-01 20:42:39'),
	(2,'Sherry Embroidery','sherry_embroidery.jpg','2021-06-01 20:43:00','2021-06-01 20:43:00');

/*!40000 ALTER TABLE `tbl_partner` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_slides
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_slides`;

CREATE TABLE `tbl_slides` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` text,
  `description` text,
  `link` text,
  `created_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tbl_slides` WRITE;
/*!40000 ALTER TABLE `tbl_slides` DISABLE KEYS */;

INSERT INTO `tbl_slides` (`id`, `title`, `description`, `link`, `created_on`, `updated_on`)
VALUES
	(1,'Keep On Going','#KEEPONGOING / #374MMA / #LargestMMAGymInHalifax','slide_1.jpg','2021-06-01 18:59:39','2021-06-01 18:59:39'),
	(2,'We offer multiple disciplines','#Classes / #Adults / #Youths / Kids','slide_2.jpg','2021-06-01 18:59:39','2021-06-01 18:59:39'),
	(3,'Kids Self Defense Jiu Jitsu','#Confidence / #Discipline / #Respect','slide_3.jpg','2021-06-01 18:59:39','2021-06-10 06:58:00');

/*!40000 ALTER TABLE `tbl_slides` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_subscriptions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_subscriptions`;

CREATE TABLE `tbl_subscriptions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` text,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table tbl_team
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_team`;

CREATE TABLE `tbl_team` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` text,
  `title` text,
  `photo` text,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tbl_team` WRITE;
/*!40000 ALTER TABLE `tbl_team` DISABLE KEYS */;

INSERT INTO `tbl_team` (`id`, `name`, `title`, `photo`, `date_created`, `updated_on`)
VALUES
	(1,'Radafy Rad Ranaivo','Owner & Head Coach','radafyRadRanaivo.jpg','2021-06-01 20:23:39','2021-06-10 09:57:19'),
	(2,'Josh Barkhouse','title coming soon','joshBarkhouse.jpg','2021-06-01 20:25:44','2021-06-01 20:25:44'),
	(3,'Jonas Klippenstein','title coming soon','b07a9359e82868988b9cf56c49c52aab.jpeg','2021-06-01 20:26:24','2021-06-10 08:49:34');

/*!40000 ALTER TABLE `tbl_team` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_testimonials
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_testimonials`;

CREATE TABLE `tbl_testimonials` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` text,
  `message` text,
  `link` text,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tbl_testimonials` WRITE;
/*!40000 ALTER TABLE `tbl_testimonials` DISABLE KEYS */;

INSERT INTO `tbl_testimonials` (`id`, `name`, `message`, `link`, `date_created`, `updated_on`)
VALUES
	(1,'Max Brenna','Amazing training and instruction! You get serious real self-defence instruction and it\'s a great workout. Rad the owner is really great to work with','max_brennan.jpg','2021-06-01 19:43:17','2021-06-01 19:43:28'),
	(2,'Joey','Amazing place to train and learn martial arts and self defence. Currently taking classes in Muay Thai and Brazilian Jiu-jitsu','joey.jpg','2021-06-01 19:43:57','2021-06-01 19:43:57'),
	(3,'Ricky Goodall','374 Performance is an all-emcompassing fitness studio that while having it’s foundations in martial arts, far extends beyond that','ricky_goodall.jpg','2021-06-01 19:44:29','2021-06-01 19:44:29');

/*!40000 ALTER TABLE `tbl_testimonials` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_testimony
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_testimony`;

CREATE TABLE `tbl_testimony` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` text,
  `message` text,
  `rating` int(11) DEFAULT NULL,
  `testimony_type` text,
  `link` text,
  `columns` int(11) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tbl_testimony` WRITE;
/*!40000 ALTER TABLE `tbl_testimony` DISABLE KEYS */;

INSERT INTO `tbl_testimony` (`id`, `name`, `message`, `rating`, `testimony_type`, `link`, `columns`, `date_created`, `updated_on`)
VALUES
	(1,'Rad Ranaivo','Our Head Coach <a href=\"radafyRanaivo.php\">Rad Ranaivo</a> training one of 347 MMA family.',0,'video','imara.mp4',6,'2021-06-02 14:33:20','2021-06-02 14:48:26'),
	(2,'Hand Written Review',NULL,5,'photo','handwritten_review.png',6,'2021-06-02 14:35:39','2021-06-02 14:48:27'),
	(3,'Bob','Rad is definitely true to his word. I found that out personally on just my first day of training with him.\n	        							<br>\n										Just in my first 7 months of Rad”s training, I have achieved so much more physically and mentally as to the years I have worked out at different gyms in different provinces. I certainly thought I was in decent shape. Man, was I wrong.\n										<br>\n										The first day I met with Rad was at his gym and that was just an introduction. I wanted to see what he had to offer and most importantly if I felt comfortable and he was trustworthy. We chatted for about an hour and it was yes on both counts. That is why as I stated earlier that Rad is true to his word and that is very much important in my life.I look forward of continuing both my one on one and team training. It has become a second home to me.\n										<br>\n										I am always 55 years-old ready to challenge myself to train for health!\n										<br>\n										Thanks Rad.',5,NULL,NULL,8,'2021-06-02 14:37:42','2021-06-02 14:48:36'),
	(4,'James','I\'ve been to a few gyms in HRM, but this one by far beats them all. It\'s the atmosphere here that stands out. Classes are serious but he knows how to make them enjoyable. Beginners elsewhere usually get ignored and left to figure things out on their own, but Rad actually puts the time into helping everyone at this gym. We all have to start somewhere and the beginning doesn\'t have to suck. Rad knows his stuff- try him out and see for yourself',5,NULL,NULL,4,'2021-06-02 14:40:01','2021-06-02 14:48:38'),
	(5,'Alanoud','I\'ve been training at the gym for 6 months now my journey started off by just wanting to learn kickboXing but it evolved to so much more. The first time I met Rad, my first impression was that this trainer was tough and knew what he was doing when it comes to martial arts.But as day passed and I came to know him more I found out that he was one of the most caring personal trainers I have ever met.He doesn\'t only push you towards the best but he also takes that extra step of knowing you as a friend. Rad is one of the most professional trainer you will ever come to know, he will help you work on your weakness when it comes to physical activities as well as be the friend you need when you\'re feeling down.Finding that trainer that really helps you become you\'re best is hard to find at days like these when everything is corporate and about money.At 374 MMA you will immediately feel like part of the family and to me that was one of the most important aspects when enrolling in a gym. To any person who is looking for that trainer that will go that extra distance, Rad is that person!',5,NULL,NULL,12,'2021-06-02 14:41:39','2021-06-02 14:48:46'),
	(6,'Jay Paquette','I completed my first month of the Muay Thai Basics at 374 MMA. It has really helped me change and refocus my life in regards to diet, nutrition,respect, and dedication to a successful exercise program. I’ve lost +18 pounds in this short period of time and look forward to continuing this healthy lifestyle thanks to Rad and everyone at 374 MMA.\n										<br>\n										<b>Classes and the Experience </b> - Expect a great, intense (in a good way), positive workout whether it’s your first class or later ones. Variety…I cannot recall a single class being the exact same as any others. Rad provides a good mix of cardio warmup/cool down and technical drills (punching, elbows, knees, kicking etc.) in between.\n										<br>\n										Regardless of class size, Rad is constantly checking up on students to ensure they are following the proper technique as well the expected pace…he certainly wants folks to get the most out of the class. They provide all the required gear or you can bring your own.\n										<br>\n										<b>People and the Community</b> - Everyone there is great and supportive, certainly a refreshing atmosphereunlike some other gyms. Regardless of your fitness level, you are typically paired up with people of the same level as you…”Nobody gets left behind”. After any given class people are giving pats on the back, high fives and you can often here folks saying, “WOW another great class…we all got thru it, this place is so additive”…and it is!!!\n										<br>\n										<b><u>In Summary</u></b>\n										<br>\n										374 MMA is for REAL!!!\n										<br>\n										If I could give 6 out of 5 stars I certainly would. If you want a workout like no other, in a positive, supportive, face-pace environment this place is certainly it.\n										<br>\n										The only “Con/Downside” to 374 MMA is that I didn\'t join sooner.',5,NULL,NULL,12,'2021-06-02 14:41:59','2021-06-02 14:48:53'),
	(7,'Max Brennan','Amazing training and instruction! You get serious real self-defence instruction and it\'s a great workout. Rad the owner is really great to work with. I give it 5 stars!!!',5,NULL,NULL,4,'2021-06-02 14:42:37','2021-06-02 14:49:02'),
	(8,'Joey','Amazing place to train and learn martial arts and self defence. Currently taking classes in Muay Thai and Brazilian Jiu-jitsu. The head coach Rad and the veterans members are fantastic, they\'re always available to assist you whenever you need help on a technique. Family friendly and ego free environment. Highly recommended!',5,NULL,NULL,8,'2021-06-02 14:43:01','2021-06-02 14:50:01'),
	(9,'Ricky Goodall','374 Performance is an all-emcompassing fitness studio that while having it’s foundations in martial arts, far extends beyond that.\n	        							<br>\n										The facility offers opportunities for both members and coaches alike, opening its doors to professionals who are looking to expand their clientele.\n										<br>\n										The gym features a large matted area with heavy bags and padded walls, while also housing a full fitness studio with power racks, weight plates, kettlebells and more.\n										<br>\n										Our gym is suitable for the whole family, with classes for children and adults as well as personal training and nutrition services.\n										<br>\n										<i>I am a Personal Trainer Space Rentee - Certified Nutrition Coach - Meditation Instructor - Elevated Life Coach - Owner of Elevated Wellness.</i>',5,NULL,NULL,12,'2021-06-02 14:43:32','2021-06-02 14:50:04');

/*!40000 ALTER TABLE `tbl_testimony` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_train_reasons
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_train_reasons`;

CREATE TABLE `tbl_train_reasons` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` text,
  `description` text,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tbl_train_reasons` WRITE;
/*!40000 ALTER TABLE `tbl_train_reasons` DISABLE KEYS */;

INSERT INTO `tbl_train_reasons` (`id`, `title`, `description`, `date_created`, `updated_on`)
VALUES
	(1,'We Offer Something Special','At 374 MMA you’ll receive top quality and technically driven instruction. If you have never stepped into an MMA gym before and need to learn the basics or have years of experience, our gym offers the knowledge, space and encouragement needed to help you surpass your goals.','2021-06-01 19:38:16','2021-06-01 19:38:16'),
	(2,'One-on-one Attention for Everyone','Along with having fun, technique and safety are top priorities at 374 MMA. This means that everyone is given one on one attention in each class.','2021-06-01 19:38:41','2021-06-01 19:38:41'),
	(3,'Professional Mixed Martial Arts Facility','We have 4,500 square feet suited for high quality training, including 2 large matted areas, numerous heavy bags, MMA training equipment and a weight room.','2021-06-01 19:39:02','2021-06-01 19:39:02');

/*!40000 ALTER TABLE `tbl_train_reasons` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` text,
  `email` text,
  `password` text,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;

INSERT INTO `tbl_user` (`id`, `name`, `email`, `password`, `date_created`, `updated_on`)
VALUES
	(1,'MMA Admin','admin@mma.com','7a2d9e81009161646c98049566e5c2b2e55e15e1','2021-06-09 09:37:27','2021-06-09 09:37:27');

/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
