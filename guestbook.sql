CREATE TABLE entries (id INTEGER AUTO_INCREMENT PRIMARY KEY,
                      user VARCHAR (64),
                      comment VARCHAR (128),
                      date_posted DATETIME);

INSERT INTO entries (id, user, comment, date_posted) VALUES (1, "tom", "Fine comment",NOW());
INSERT INTO entries (id, user, comment, date_posted) VALUES (2, "dick", "Cool comment",NOW());
INSERT INTO entries (id, user, comment, date_posted) VALUES (3, "harry", "Lovely comment",NOW());