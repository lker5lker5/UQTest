CREATE DATABASE pro_sol;
USE pro_sol;

CREATE TABLE problemRecords(
    test_number int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    test_answer VARCHAR(20) NOT NULL,
    problem_id int(1) NOT NULL
);
