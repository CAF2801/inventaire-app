DROP TABLE IF EXISTS antibody;
CREATE TABLE antibody (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    NomAnticorps VARCHAR (100) NOT NULL,
    Fluorophore VARCHAR (10),
    NuméroCatalogue VARCHAR (25),
    Fournisseur VARCHAR (25),
    VolumeInitial INT
);