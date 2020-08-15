 CREATE TABLE `books` (
  `id` int(11) NOT NULL auto_increment,
  `authorId` int(11) default NULL,
  `title` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
)
