CREATE TABLE membre(
  id_membre int PRIMARY KEY AUTO_INCREMENT,
  pseudo varchar(20) NOT NULL,
  mdp varchar(100) NOT NULL,
  nom varchar(20) NOT NULL,
  prenom varchar(20) NOT NULL,
  email varchar(30) NOT NULL,
  civilte ENUM('femme', 'homme'),
  statut int(2),
  date_enregistrement datetime default CURRENT_TIMESTAMP
 )ENGINE=InnoDB;

CREATE TABLE agence(
  id_agence int PRIMARY KEY AUTO_INCREMENT,
  titre varchar(30) NOT NULL,
  adresse varchar(60) NOT NULL,
  ville varchar(20) NOT NULL,
  cp int(5) NOT NULL,
  description text,
  photo varchar(30) NOT NULL
)ENGINE=InnoDB;


CREATE TABLE vehicule(
  id_vehicule int PRIMARY KEY AUTO_INCREMENT,
  id_agence int(10),
  titre varchar(20) NOT NULL,
  marque varchar(20) NOT NULL,
  modele varchar(20) NOT NULL,
  description text,
  photo varchar(30) NOT NULL,
  prix_journalier float(3),
  FOREIGN KEY (id_agence) REFERENCES agence (id_agence)
)ENGINE=InnoDB;


CREATE TABLE commande(
  id_commande int PRIMARY KEY AUTO_INCREMENT,
  id_membre int (10),
  id_agence int(10),
  id_vehicule int(10),
  date_heure_depart datetime,
  date_heure_fin datetime,
  prix_total float(5),
  date_enregistrement datetime,
  FOREIGN KEY (id_agence) REFERENCES agence (id_agence),
  FOREIGN KEY (id_membre) REFERENCES membre (id_membre),
  FOREIGN KEY (id_vehicule) REFERENCES vehicule (id_vehicule)
)ENGINE=InnoDB;
