CREATE DATABASE IF NOT EXISTS project_eval;
USE project_eval;

CREATE TABLE evaluations (
id INT AUTO_INCREMENT PRIMARY KEY,
judge_name VARCHAR(50) NOT NULL,
group_number INT NOT NULL,
group_members VARCHAR(255) NOT NULL,
project_title VARCHAR(255) NOT NULL,
total_score INT NOT NULL,
comments TEXT,
evaluation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);