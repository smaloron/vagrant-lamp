USE bibliotheque;

CREATE TABLE IF NOT EXISTS roles (
    id TINYINT UNSIGNED AUTO_INCREMENT,
    nom VARCHAR (30) NOT NULL,
    PRIMARY KEY (id) 
);

CREATE TABLE IF NOT EXISTS utilisateurs (
    id MEDIUMINT UNSIGNED AUTO_INCREMENT,
    pseudo VARCHAR (30) NOT NULL UNIQUE,
    email VARCHAR (30) NOT NULL UNIQUE,
    mot_de_passe VARCHAR (255) NOT NULL,
    role_id TINYINT UNSIGNED NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT  utilisateurs_to_roles
        FOREIGN KEY (role_id)
        REFERENCES roles(id)
 );

 INSERT INTO roles (nom) VALUES
 ('admin'), ('user');