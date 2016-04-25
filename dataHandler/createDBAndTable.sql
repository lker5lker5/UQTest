CREATE DATABASE pro_sol;
USE pro_sol;

CREATE TABLE problemRecords(
    attempt_id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    problem_id INT(4) NOT NULL,
    test_number VARCHAR (19) NOT NULL,
    test_answer INT (19) NOT NULL,
    exe_time FLOAT (8,5) NOT NULL
);
