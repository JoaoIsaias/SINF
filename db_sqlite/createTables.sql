--PRAGMA foreign_keys = ON;
.mode columns
.headers on
.nullvalue NULL
.bail on

--Drops
DROP TABLE IF EXISTS ListaDeDesejos;
DROP TABLE IF EXISTS CarrinhoDeCompras;

--Creates
CREATE TABLE ListaDeDesejos(
idCliente text,
idArtigo text,
PRIMARY KEY (idCliente, idArtigo)
);

CREATE TABLE CarrinhoDeCompras(
idCliente TEXT,
idArtigo TEXT,
quantidade INT,
idArmazem TEXT,
PRIMARY KEY (idCliente, idArtigo)
);

--Inserts
INSERT INTO ListaDeDesejos VALUES ('cli1', 'art1');
INSERT INTO CarrinhoDeCompras VALUES ('cli1', 'art1', 5, 'A1');

--Deletes
DELETE FROM ListaDeDesejos WHERE idCliente = 'cli1' AND idArtigo = 'art1';
DELETE FROM CarrinhoDeCompras WHERE idCliente = 'cli1' AND idArtigo = 'art1';