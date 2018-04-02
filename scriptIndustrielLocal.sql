PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
CREATE TABLE tblclient(
id integer primary key autoincrement,
prenom text,
nom text,
adresse text);
CREATE TABLE tblMelange(
id integer primary key autoincrement,
temperature real,
quantite real,
niveau real,
dateProduction numeric,
idClient integer,
foreign key(idClient) references tblClient(id));
CREATE TABLE tblEmploye(
user text primary key,
password text);
DELETE FROM sqlite_sequence;
COMMIT;
