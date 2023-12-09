CREATE TABLE category (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE contact (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(64) NOT NULL,
    last_name VARCHAR(64) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    address VARCHAR(32) NOT NULL,
    email VARCHAR(32) NOT NULL,
    category_id INT,
    CONSTRAINT fk_contact_category FOREIGN KEY (category_id) REFERENCES category(id)
);

INSERT INTO `category`( `name`) VALUES ('Client');
INSERT INTO `category`( `name`) VALUES ('Companie');
INSERT INTO `category`( `name`) VALUES ('Amis');
INSERT INTO `category`( `name`) VALUES ('Personels');
INSERT INTO `category`( `name`) VALUES ('Collegues');
INSERT INTO `category`( `name`) VALUES ('Autres');