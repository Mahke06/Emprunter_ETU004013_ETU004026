Create database db_s2_ETU004013;
use db_s2_ETU004013;
Create table Emprunter_membre (
    id_membre int auto_increment primary key,
    nom VARCHAR(50),
    date_de_naissance Date,
    genre      ENUM ('M','F')  ,
    email VARCHAR(100),
    ville VARCHAR(50),
    mdp VARCHAR(100),
    image_profil VARCHAR(200)
);

Create table Emprunter_categorie (
    id_categorie int auto_increment primary key,
    nom_categorie VARCHAR(100)
);

Create table Emprunter_objet (
    id_objet int auto_increment primary key,
    nom_objet VARCHAR(150) ,
    id_categorie int ,
    id_membre int ,
    FOREIGN KEY (id_categorie) REFERENCES Emprunter_categorie(id_categorie),
    FOREIGN KEY (id_membre) REFERENCES Emprunter_membre(id_membre)
);

Create table Emprunter_images_objet (
    id_image int auto_increment primary key,
    id_objet int ,
    nom_image VARCHAR(255),
    FOREIGN KEY (id_objet) REFERENCES Emprunter_objet(id_objet)
);

Create table Emprunter_emprunt (
    id_emprunt int auto_increment primary key,
    id_objet int ,
    id_membre int ,
    date_emprunt DATE ,
    date_retour DATE,
    FOREIGN KEY (id_objet) REFERENCES Emprunter_objet(id_objet),
    FOREIGN KEY (id_membre) REFERENCES Emprunter_membre(id_membre)
);


INSERT INTO Emprunter_membre (nom, date_de_naissance, genre, email, ville, mdp, image_profil) VALUES
('Alice Dupont', '1985-06-15', 'F', 'alice@example.com', 'Paris', 'mdpAlice', 'alice.jpg'),
('Bob Martin', '1990-11-20', 'M', 'bob@example.com', 'Lyon', 'mdpBob', 'bob.jpg'),
('Claire Petit', '1978-02-03', 'F', 'claire@example.com', 'Marseille', 'mdpClaire', 'claire.jpg'),
('David Moreau', '1982-09-12', 'M', 'david@example.com', 'Toulouse', 'mdpDavid', 'david.jpg');

INSERT INTO Emprunter_categorie (nom_categorie) VALUES
('Esthetique'),
('Bricolage'),
('Mecanique'),
('Cuisine');

INSERT INTO Emprunter_objet (nom_objet, id_categorie, id_membre) VALUES
('Vernis a ongles', 1, 1),
('Pince a epiler', 1, 1),
('Marteau', 2, 1),
('Tournevis', 2, 1),
('Cle a molette', 3, 1),
('Huile moteur', 3, 1),
('Poele a frire', 4, 1),
('Couteau de chef', 4, 1),
('Fer a lisser', 1, 1),
('Perceuse', 2, 1);

INSERT INTO Emprunter_objet (nom_objet, id_categorie, id_membre) VALUES
('Creme hydratante', 1, 2),
('Scie sauteuse', 2, 2),
('Compresseur', 3, 2),
('Moule a gâteau', 4, 2),
('Peigne', 1, 2),
('Cle dynamometrique', 3, 2),
('Spatule', 4, 2),
('Perceuse sans fil', 2, 2),
('Cire cheveux', 1, 2),
('Cle plate', 3, 2);

INSERT INTO Emprunter_emprunt (id_objet, id_membre, date_emprunt, date_retour) VALUES
(1, 2, '2025-07-01', '2025-07-05'),
(3, 3, '2025-07-02', NULL),
(5, 4, '2025-07-01', '2025-07-10'),
(7, 2, '2025-06-25', '2025-07-03'),
(2, 1, '2025-07-10', NULL),
(9, 3, '2025-07-11', NULL),
(4, 4, '2025-07-05', '2025-07-12'),
(6, 1, '2025-07-01', '2025-07-04'),
(8, 2, '2025-07-03', NULL),
(10, 3, '2025-07-02', '2025-07-08');

