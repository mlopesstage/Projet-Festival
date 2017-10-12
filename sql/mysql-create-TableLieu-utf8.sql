
DROP TABLE IF EXISTS `Lieu`;

create table Lieu 
(id char(8) not null, 
nomLieu varchar(45) not null,
adresseLieu varchar(128) not null,
capaciteAccueil integer not null, 
constraint pk_Lieu primary key(id))
ENGINE=INNODB;