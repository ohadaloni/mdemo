DROP TABLE IF EXISTS authors;
CREATE TABLE `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first` varchar(255) DEFAULT NULL,
  `last` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);
INSERT INTO authors (id, first, last) VALUES (1,'Isaac','Asimov');
INSERT INTO authors (id, first, last) VALUES (2,'Robert ','Heinlein');
INSERT INTO authors (id, first, last) VALUES (3,'Stanisław','Lem');
INSERT INTO authors (id, first, last) VALUES (4,'Charles','Dickens');
INSERT INTO authors (id, first, last) VALUES (5,'J. R. R. ','Tolkien');
INSERT INTO authors (id, first, last) VALUES (6,'Roald','Dahl');
INSERT INTO authors (id, first, last) VALUES (7,'Douglas','Adams');

DROP TABLE IF EXISTS books;
CREATE TABLE books (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  authorId int(11) DEFAULT NULL,
  title varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);
INSERT INTO books (id, authorId, title) VALUES (1,1,'Foundation & Empire');
INSERT INTO books (id, authorId, title) VALUES (2,1,'Foundation');
INSERT INTO books (id, authorId, title) VALUES (3,2,'Starship Troopers');
INSERT INTO books (id, authorId, title) VALUES (4,3,'Solaris');
INSERT INTO books (id, authorId, title) VALUES (5,1,'Second Foundation');
INSERT INTO books (id, authorId, title) VALUES (9,4,'David Copperfield');
INSERT INTO books (id, authorId, title) VALUES (11,4,'Nicholas Nickleby');
INSERT INTO books (id, authorId, title) VALUES (13,4,'Oliver Twist');
INSERT INTO books (id, authorId, title) VALUES (14,1,'I, Robot');
INSERT INTO books (id, authorId, title) VALUES (15,2,'The Number of the Beast ');
INSERT INTO books (id, authorId, title) VALUES (20,6,'James and the Giant Peach');
INSERT INTO books (id, authorId, title) VALUES (23,6,'Tales of the Unexpected');
INSERT INTO books (id, authorId, title) VALUES (24,5,'The Fellowship of the Ring');
INSERT INTO books (id, authorId, title) VALUES (25,5,'The Hobbit');
INSERT INTO books (id, authorId, title) VALUES (28,7,'The Hitchhiker\'s Guide to the Galaxy');
INSERT INTO books (id, authorId, title) VALUES (31,7,'So Long, and Thanks for All the Fish');
INSERT INTO books (id, authorId, title) VALUES (34,3,'Return from the Stars ');
INSERT INTO books (id, authorId, title) VALUES (35,4,'A Tale of Two Cities ');
