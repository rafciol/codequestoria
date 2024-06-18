CREATE DATABASE db_codequestoria;
USE db_codequestoria;

CREATE TABLE IF NOT EXISTS prog_language (
    ID_prog_language INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Language VARCHAR(20) NOT NULL
);

CREATE TABLE IF NOT EXISTS assign (
    ID_assign INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ID_prog_language INT UNSIGNED NOT NULL,
    assign_img_url VARCHAR(20) NOT NULL,
    assign_title VARCHAR(255) NOT NULL,
    optA VARCHAR(255) NOT NULL,
    optB VARCHAR(255) NOT NULL,
    optC VARCHAR(255) NOT NULL,
    optD VARCHAR(255) NOT NULL,
    correctOpt CHAR(1) NOT NULL,
    FOREIGN KEY(ID_prog_language) REFERENCES prog_language(ID_prog_language) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS usr_choices (
    ID_usr_choices INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ID_assign INT UNSIGNED NOT NULL,
    usr_opt CHAR(1) NOT NULL,
    FOREIGN KEY(ID_assign) REFERENCES assign(ID_assign) ON DELETE CASCADE ON UPDATE CASCADE
);