USE db_codequestoria;

DELETE FROM prog_language;
INSERT INTO prog_language (Language) VALUES ('JavaScript');
INSERT INTO prog_language (Language) VALUES ('PHP');
INSERT INTO prog_language (Language) VALUES ('Java');
INSERT INTO prog_language (Language) VALUES ('Python');
INSERT INTO prog_language (Language) VALUES ('C++');

DELETE FROM assign;
INSERT INTO assign (ID_prog_language, assign_img_url, assign_title, optA, optB, optC, optD, correctOpt) VALUES
(1, 'js1.PNG', 'What will be logged to the console?', 'number', 'string', 'undefined', 'object', 'A');

INSERT INTO assign (ID_prog_language, assign_img_url, assign_title, optA, optB, optC, optD, correctOpt) VALUES
(2, 'php1.PNG', 'What is the output of the following code?', '1', '2', 'Error', 'None', 'B');

INSERT INTO assign (ID_prog_language, assign_img_url, assign_title, optA, optB, optC, optD, correctOpt) VALUES
(3, 'java1.PNG', 'What is the output of the following code?', 'Hello23', 'Hello5', 'Hello 2 3', 'Error', 'A');

INSERT INTO assign (ID_prog_language, assign_img_url, assign_title, optA, optB, optC, optD, correctOpt) VALUES
(4, 'python1.PNG', 'What is the output of the following code?', '8', '64', '512', 'None', 'C');

INSERT INTO assign (ID_prog_language, assign_img_url, assign_title, optA, optB, optC, optD, correctOpt) VALUES
(5, 'cpp1.PNG', 'What is the output of the following code?', '4', '5', '6', 'Error', 'C');