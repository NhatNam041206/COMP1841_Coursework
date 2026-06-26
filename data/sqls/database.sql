CREATE DATABASE IF NOT EXISTS `COMP1841_student_forum_GCS250004`
DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE `COMP1841_student_forum_GCS250004`;

SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `Question`;
DROP TABLE IF EXISTS `Module`;
DROP TABLE IF EXISTS `User`;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `User` (`id`, `name`, `email`) VALUES
(1, 'Alice Smith', 'alice@gre.ac.uk'),
(2, 'Bob Jones', 'bob@gre.ac.uk'),
(3, 'Charlie Brown', 'charlie@gre.ac.uk');

CREATE TABLE `Module` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Module` (`id`, `name`) VALUES
(1, 'COMP1841 - Web Programming 1'),
(2, 'COMP1649 - Systems Development'),
(3, 'COMP1782 - Computer Systems and Networks');

CREATE TABLE `Question` (
  `id` int(11) NOT NULL,
  `questiontext` text DEFAULT NULL,
  `questiondate` date NOT NULL,
  `questionimage` varchar(255) NOT NULL,
  `questiondocument` varchar(255) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `moduleid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `Question` (`id`, `questiontext`, `questiondate`, `questionimage`, `questiondocument`, `userid`, `moduleid`) VALUES
(1, 'PDOException: SQLSTATE[HY000] Connection refused when using PDO with localhost.', '2026-06-19', '1.jpg', 'pdo-notes.pdf', 1, 1),
(2, 'My form submits but $_POST is empty. What should I check first?', '2026-06-20', '2.jpg', NULL, 2, 1),
(3, 'How do I show a one-to-many relationship between Module and Question in an ERD?', '2026-06-21', '3.jpg', 'erd-draft.docx', 3, 2);

ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `Module`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `Question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `moduleid` (`moduleid`);

ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `Module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `Question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `Question`
  ADD CONSTRAINT `fk_question_module` FOREIGN KEY (`moduleid`) REFERENCES `Module` (`id`),
  ADD CONSTRAINT `fk_question_user` FOREIGN KEY (`userid`) REFERENCES `User` (`id`);
