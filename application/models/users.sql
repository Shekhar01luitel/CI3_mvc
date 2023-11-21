CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `photo_path` VARCHAR(255) DEFAULT NULL;
  `password` varchar(255) NOT NULL,
  `role` enum('8', '2', '4') DEFAULT '4',
  `bio` text NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE = InnoDB AUTO_INCREMENT = 12 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

INSERT INTO `users` (`name`, `email`, `password`, `role`, `bio`, `url`, `location`, `username`)
VALUES
  ('John Doe', 'milan@gmail.com', '$2y$10$8jpflaOOa2sgIoU.RqAXyuzWaPMzamHLNpUn/7meLx1I8vHL6oKGy', '4', 'Web developer', 'http://example.com', 'City', 'johndoe'),
