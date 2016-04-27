CREATE DATABASE pro_sol;
USE pro_sol;

CREATE TABLE problemRecords(
    attempt_id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    problem_id INT(4) NOT NULL,
    test_number VARCHAR(50) NOT NULL,
    test_answer INT (19) NOT NULL,
    exe_time FLOAT (8,5) NOT NULL
);

CREATE TABLE users(
    username VARCHAR(10) NOT NULL PRIMARY KEY,
    password VARCHAR(32) NOT NULL,
    userrole int(1) NOT NULL
);
INSERT INTO users VALUES ('admin','21232f297a57a5a743894a0e4a801fc3', 1);