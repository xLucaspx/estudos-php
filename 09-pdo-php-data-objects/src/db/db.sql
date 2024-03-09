CREATE SCHEMA IF NOT EXISTS php_pdo;
USE php_pdo;

CREATE TABLE IF NOT EXISTS `students` (
	`id` INT AUTO_INCREMENT PRIMARY KEY,
	`name` VARCHAR(50) NOT NULL,
	birth_date DATE NOT NULL
);

CREATE TABLE IF NOT EXISTS `phones` (
	`id` INT AUTO_INCREMENT PRIMARY KEY,
	`area_code` VARCHAR(2) NOT NULL,
	`number` VARCHAR(11) NOT NULL,
	`student_id` INT,
	CONSTRAINT fk_phones_students
		FOREIGN KEY (`student_id`) REFERENCES `students` (`id`)
);
