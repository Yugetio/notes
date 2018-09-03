CREATE DATABASE IF NOT EXISTS `notes` COLLATE 'utf8_general_ci' ;
GRANT ALL ON `notes`.* TO 'notes'@'%' ;

FLUSH PRIVILEGES ;