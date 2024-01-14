CREATE TABLE tags ( id_tag INT, name_tag VARCHAR(255) );


CREATE TABLE categorie ( id_categorie INT, name_categorie VARCHAR(255) );

CREATE TABLE users (id_user INT, name_user VARCHAR(255), email_user VARCHAR(255), password_user VARCHAR(255), id_role INT);

CREATE TABLE wikis ( id_wiki int AUTO_INCREMENT, name_wiki varchar(255), description_wiki varchar(255), id_category INT, id_tag INT, status INT, image VARCHAR(255), date INT, PRIMARY KEY(id_wiki), FOREIGN KEY (id_category) REFERENCES categorie(id_category), FOREIGN KEY (id_tag) REFERENCES tags(id_tag) );

ALTER TABLE `wikis` CHANGE `date` `date` DATETIME NULL DEFAULT NULL;

