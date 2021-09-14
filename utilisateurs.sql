/* Base de données en ligne: lyceestvincent_vdedomenico*/
CREATE TABLE utilisateurs (
    id_user INT NOT NULL AUTO_INCREMENT,
    nom_user VARCHAR(255) NOT NULL,
    prenom_user VARCHAR(255) NOT NULL,
    email_user VARCHAR(255) NOT NULL,
    tel_user INT NOT NULL,
    message_user VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_user)
);