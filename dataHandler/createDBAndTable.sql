CREATE DATABASE pro_sol;
USE pro_sol;

CREATE TABLE problemRecords(
    attempt_id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    problem_id VARCHAR (4) NOT NULL,
    test_number VARCHAR (19) NOT NULL,
    test_answer VARCHAR (19) NOT NULL,
    exe_time VARCHAR (7) NOT NULL
);
