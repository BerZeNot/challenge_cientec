CREATE TABLE Cidadao (
    id INTEGER PRIMARY KEY NOT NULL,
    nome TEXT NOT NULL,
    nis NUMERIC NOT NULL
);

CREATE TABLE NextNIS(
    nis NUMERIC NOT NULL
);

INSERT INTO NextNIS values(10000000000);