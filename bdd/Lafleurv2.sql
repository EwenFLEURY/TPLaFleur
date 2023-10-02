
CREATE TABLE categorie (
  cat_code integer NOT NULL AUTO_INCREMENT,
  cat_libelle varchar(50) NOT NULL ,
  PRIMARY KEY  (cat_code)
) ;

INSERT INTO categorie VALUES (1,'Bulbes');
INSERT INTO categorie VALUES (2,'Plantes à massif');
INSERT INTO categorie VALUES (3,'Rosiers');

CREATE TABLE produit (
  pdt_ref integer NOT NULL AUTO_INCREMENT,
  pdt_designation varchar(50) NOT NULL ,
  pdt_prix decimal(5,2) NOT NULL ,
  pdt_image varchar(50) NOT NULL ,
  pdt_categorie integer NOT NULL ,
  PRIMARY KEY  (pdt_ref) ,
  FOREIGN KEY (pdt_categorie) REFERENCES categorie (cat_code)
) ;

INSERT INTO produit VALUES (1,'3 bulbes de bégonias',5.00,'bulbes_begonia',1);
INSERT INTO produit VALUES (2,'10 bulbes de dahlias',12.00,'bulbes_dahlia',1);
INSERT INTO produit VALUES (3,'50 glaeuls',9.00,'bulbes_glaieul',1);
INSERT INTO produit VALUES (4,'Lot de 3 marguerites',5.00,'massif_marguerite',2);
INSERT INTO produit VALUES (5,'Pour un bouquet de 6 pensées',6.00,'massif_pensee',2);
INSERT INTO produit VALUES (6,'Mélange varié de 10 plantes à massif',15.00,'massif_melange',2);
INSERT INTO produit VALUES (7,'1 pied spécial grandes fleurs',20.00,'rosiers_gdefleur',3);
INSERT INTO produit VALUES (8,'Une variété sélectionnée pour son parfum',9.00,'rosiers_parfum',3);
INSERT INTO produit VALUES (9,'Rosier arbuste',8.00,'rosiers_arbuste',3);
