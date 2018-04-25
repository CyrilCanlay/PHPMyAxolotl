CREATE TABLE l_joueur (
	id_joueur INT PRIMARY KEY NOT NULL,
	pseudonyme VARCHAR(100),
	email VARCHAR(100),
	mot_de_passe VARCHAR(100),
	prenom VARCHAR(100),
	nom VARCHAR(100),
	sexe VARCHAR(100),
	date_de_naissance DATE,
	telephone INT,
	adresse_postal VARCHAR(100),
	avatar VARCHAR(100),
	description VARCHAR(100),
	adresse_de_site_web VARCHAR(100),
	adresse_ip VARCHAR(100),
	date_inscription DATE,
	date_connexion DATE,
	argent INT,
	id_banque INT,
	id_planning INT
);

CREATE TABLE l_ecurie (
	id_ecurie INT PRIMARY KEY NOT NULL,
	capacite INT,
	id_proprietaire INT
);

CREATE TABLE l_club_hippique (
	id_club INT PRIMARY KEY NOT NULL,
	capacite INT,
	id_gerant INT
);

CREATE TABLE l_infrastructure (
	id_infra INT PRIMARY KEY NOT NULL,
	type VARCHAR(100),
	niveau INT,
	description VARCHAR(100),
	famille VARCHAR(100),
	prix INT,
	consommation VARCHAR(100),
	capacite_licorne INT,
	capacite_objet INT
);

CREATE TABLE l_licorne (
	id_licorne INT PRIMARY KEY NOT NULL,
	nom VARCHAR(100),
	race VARCHAR(100),
	description VARCHAR(100),
	resistance VARCHAR(100),
	endurance VARCHAR(100),
	detente VARCHAR(100),
	vitesse INT,
	sociabilite VARCHAR(100),
	intelligence INT,
	temperament VARCHAR(100),
	sante INT,
	moral INT,
	stress INT,
	fatique INT,
	faim INT,
	proprete INT,
	experience INT,
	niveau INT,
	etat VARCHAR(100)
);

CREATE TABLE l_equipement (
	id_equip INT PRIMARY KEY NOT NULL,
	type VARCHAR(100),
	niveau INT,
	description VARCHAR(100),
	prix INT,
	id_famille INT
);

CREATE TABLE l_maladie (
	id_maladie INT PRIMARY KEY NOT NULL,
	nom VARCHAR(100)
);

CREATE TABLE l_blessure (
	id_blessure INT PRIMARY KEY NOT NULL,
	nom VARCHAR(100)
);

CREATE TABLE l_parasite (
	id_parasite INT PRIMARY KEY NOT NULL,
	nom VARCHAR(100)
);

CREATE TABLE l_concours (
	id_concours INT PRIMARY KEY NOT NULL,
	date_debut DATE,
	date_fin DATE
);

CREATE TABLE l_journal (
	date_du_jour DATE,
	meteo_du_jour VARCHAR(100)
);

CREATE TABLE l_compte_banque (
	id INT PRIMARY KEY NOT NULL,
	argent INT
);

CREATE TABLE l_article (
	id_article INT PRIMARY KEY NOT NULL,
	titre VARCHAR(100),
	texte VARCHAR(100),
	image VARCHAR(100)
);

CREATE TABLE l_famille (
	id_famille INT PRIMARY KEY NOT NULL
);

CREATE TABLE l_taches_automatisees (
	id_planning INT PRIMARY KEY NOT NULL,
	id_equip INT,
	action VARCHAR(100),
	frequence VARCHAR(100)
);
