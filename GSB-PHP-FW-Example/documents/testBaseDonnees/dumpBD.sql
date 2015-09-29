SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE GSB_Test;
USE GSB_TEST;

CREATE TABLE Personne (
NumP INTEGER AUTO_INCREMENT,
NomP VARCHAR(20),
PrenomP VARCHAR(20),
SexeP VARCHAR(1),
PRIMARY KEY (NumP) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO Personne (NomP, PrenomP, SexeP) VALUES
("Chambon", "Christophe", "M"),
("Sanson", "Michel", "M"),
("Perez", "Geraldine", "F");

