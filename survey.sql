CREATE DATABASE survey;

DROP TABLE IF EXISTS `questions`;

CREATE TABLE `questions` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL DEFAULT '',
  `total_vote` INT(11) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` DATETIME,
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

INSERT  INTO `questions`(`id`,`name`,`total_vote`,`created_at`) 
VALUES (1,'How many years experience about PHP?',10,'2014-03-03 00:00:00'),
(2,'How much do you expect to be paid',10,'2014-03-03 00:00:00');

DROP TABLE IF EXISTS `results`;

CREATE TABLE `results` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` TEXT NOT NULL,
  `question_id` INT(11) UNSIGNED NOT NULL DEFAULT '0',
  `total_vote` INT(11) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_Question` (`question_id`),
  CONSTRAINT `FK_Question` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`)
) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/*Data for the table `answers` */

INSERT  INTO `results`(`id`,`name`,`question_id`,`total_vote`) 
VALUES (1,'1',1,1),
(2,'2',1,0),
(3,'3',1,0),
(4,'4',1,0),
(5,'5',1,1),
(6,'800$',2,0),
(7,'900$',2,0),
(8,'1000$',2,1);




