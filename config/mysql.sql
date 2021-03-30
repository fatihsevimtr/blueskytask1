CREATE TABLE `users` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `fname` varchar(256) NOT NULL,
  `lname` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL
)

INSERT INTO `users` (fname, lname, email) VALUES ("Fatih","Sevim","fatihsevimtr@gmail.com");
INSERT INTO `users` (fname, lname, email) VALUES ("Mike","Brown","mikt@gmail.com");
INSERT INTO `users` (fname, lname, email) VALUES ("John","Doe","john@outlook.com");
INSERT INTO `users` (fname, lname, email) VALUES ("Emmy","Pearson","emm12@gmail.com");
INSERT INTO `users` (fname, lname, email) VALUES ("Karen","Tyson","karent@gmail.com");
INSERT INTO `users` (fname, lname, email) VALUES ("Eymen","Sevim","eymenbey@gmail.com");

SELECT * FROM `users`;

SELECT * FROM `users` WHERE id = 5;

SELECT * FROM `users` WHERE email  like '%bey%';
