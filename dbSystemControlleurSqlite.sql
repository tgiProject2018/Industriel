PRAGMA foreign_keys=on;
BEGIN TRANSACTION;
CREATE TABLE tblclient (
id integer primary key autoincrement,
prenom text,
nom text,
utilisateur text,
password text);
CREATE TABLE tblmelange (
id integer primary key autoincrement,
temperature real,
quantite real,
niveau real,
dateProduction numeric);
CREATE TABLE tblproduit (
id integer primary key autoincrement,
type text,
quantite integer,
idMelange integer,
foreign key(idMelange) references tblMelange(id));
CREATE TABLE tblassoClientMelange (
id integer primary key autoincrement,
idClient integer,
idMelange integer,
foreign key(idClient) references tblClient(id),
foreign key(idMelange) references tblMelange(id));
DELETE FROM sqlite_sequence;
COMMIT;
