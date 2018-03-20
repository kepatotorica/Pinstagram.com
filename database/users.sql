DROP table users;
DROP table pictures;

CREATE TABLE users (
    user_id    INT(8) NOT NULL AUTO_INCREMENT,
    user_email  VARCHAR(255) NOT NULL,
    user_name   VARCHAR(30) NOT NULL,
    user_pass   VARCHAR(255) NOT NULL,
    user_date   DATETIME DEFAULT CURRENT_TIMESTAMP,
    user_mod    TINYINT(1) DEFAULT 0,
    UNIQUE INDEX user_name_unique (user_name),
    PRIMARY KEY (user_id)
);

INSERT INTO users (user_email, user_name, user_pass)
    VALUES('kepa@kepa.kepa', 'kepa', 'kepa');

CREATE TABLE pictures (
    pic_id     INT(8) NOT NULL AUTO_INCREMENT,
    pic_user   VARCHAR(255) NOT NULL,
    pic_email  VARCHAR(255) NOT NULL,
    pic_date   DATETIME  DEFAULT CURRENT_TIMESTAMP,
    pic_long   INT(8) NOT NULL,
    pic_lat    INT(8) NOT NULL,
    pic_flag   TINYINT(1) DEFAULT 0,
    filename   VARCHAR(255) NOT NULL,
    path       VARCHAR(255) NOT NULL,
    PRIMARY KEY (pic_id)
);

