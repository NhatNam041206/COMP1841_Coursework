-- ============================================================
-- DATABASE INITIALIZATION
-- ============================================================
-- Create the database if it doesn't already exist
CREATE DATABASE IF NOT EXISTS `COMP1841_student_forum_GCS250004` 
DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Tell MySQL to use this database for all subsequent table actions
USE `COMP1841_student_forum_GCS250004`;

-- ============================================================
-- 1. DROP TABLES IF THEY EXIST (For clean testing environments)
-- ============================================================
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `Post`;
DROP TABLE IF EXISTS `Module`;
DROP TABLE IF EXISTS `User`;
SET FOREIGN_KEY_CHECKS = 1;

-- ============================================================
-- 2. CREATE TABLES WITH REFERENTIAL INTEGRITY
-- ============================================================

-- A. User Table (Stores identity details)
CREATE TABLE `User` (
    `user_id` INT AUTO_INCREMENT,
    `username` VARCHAR(100) NOT NULL,
    `email` VARCHAR(150) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL, -- Sized for secure password_hash() strings
    PRIMARY KEY (`user_id`)
);

-- B. Module Table (Stores university course modules)
CREATE TABLE `Module` (
    `module_id` INT AUTO_INCREMENT,
    `module_name` VARCHAR(150) NOT NULL UNIQUE,
    PRIMARY KEY (`module_id`)
);

-- C. Post Table (The central question forum entity)
CREATE TABLE `Post` (
    `post_id` INT AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `content` TEXT NOT NULL,
    `image_path` VARCHAR(255) DEFAULT NULL,
    `document_path` VARCHAR(255) DEFAULT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `user_id` INT NOT NULL,
    `module_id` INT NOT NULL,
    PRIMARY KEY (`post_id`),
    -- Enforcing Referential Integrity
    CONSTRAINT `fk_post_user` 
        FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`) 
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk_post_module` 
        FOREIGN KEY (`module_id`) REFERENCES `Module` (`module_id`) 
        ON DELETE CASCADE ON UPDATE CASCADE
);


-- ============================================================
-- 3. INSERT 7 SAMPLES OF DUMMY DATA FOR TESTING
-- ============================================================

-- Insert Users (Passwords are pre-hashed placeholders matching password_hash standards)
INSERT INTO `User` (`username`, `email`, `password`) VALUES
('alice_smith', 'alice@gre.ac.uk', 'abc12345DE'),
('bob_jones', 'bob@gre.ac.uk', 'abc12345DE'),
('charlie_brown', 'charlie@gre.ac.uk', 'abc12345DE'),
('david_k', 'david@gre.ac.uk', 'abc12345DE'),
('emma_w', 'emma@gre.ac.uk', 'abc12345DE');

-- Insert Modules
INSERT INTO `Module` (`module_name`) VALUES
('COMP1841 - Web Programming 1'),
('COMP1649 - Systems Development'),
('COMP1782 - Computer Systems and Networks');

-- Insert 7 Posts (Mapping user_id and module_id accordingly)
INSERT INTO `Post` (`title`, `content`, `image_path`, `document_path`, `user_id`, `module_id`) VALUES
(
    'PDOException: SQLSTATE[HY000] Connection Refused', 
    'I keep getting a connection refused error when using PDO with localhost. My XAMPP MySQL port is default.', 
    NULL, 
    NULL, 
    1, 1
),
(
    'Form data missing inside $_POST superglobal', 
    'When submitting my question creation form, var_dump($_POST) returns an empty array. Why?', 
    NULL, 
    NULL, 
    2, 1
),
(
    'How to draw a 1:Many relationship in Crow Foot Notation?', 
    'Confused about how to show a module connected to posts on my draft ER diagram for the report.', 
    NULL, 
    NULL, 
    3, 2
),
(
    'XAMPP Apache server unexpectedly shutdown', 
    'Error log points to port 80 blocked by another process. How do I fix this?', 
    NULL, 
    NULL, 
    1, 3
),
(
    'SQL injection protection in PHP PDO', 
    'Are prepared statements alone fully safe or do I need additional string sanitization functions?', 
    NULL, 
    NULL, 
    4, 1
),
(
    'System Use Case Diagram vs User Stories context', 
    'Can anyone review my draft system requirements context to see if it matches the assessment rubric parameters?', 
    NULL, 
    NULL, 
    5, 2
),
(
    'Difference between MySQLi and PDO syntax rules', 
    'Why does the brief warn us we will lose up to 40 marks if we use MySQLi extensions?', 
    NULL, 
    NULL, 
    2, 1
);