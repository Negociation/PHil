-- DROP DATABASE apidb;

CREATE DATABASE IF NOT EXISTS apidb;

USE apidb;

CREATE TABLE IF NOT EXISTS person (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(45) NOT NULL,
    cpf VARCHAR(15),
    rg VARCHAR(15),
    cnpj VARCHAR(45),
    uuid VARCHAR(45) NOT NULL,
    PRIMARY KEY(id)
);

-- INSERTS

INSERT INTO 
    person (name, cpf, rg, uuid)
VALUES
    ("Mariana Analu Marcela Fernandes", "044.192.286-44", "12.375.555-4", "cd990104-bab5-432d-b42b-716872b0daa8"),
    ("José Henrique Campos", "083.736.336-50", "38.489.968-7", "65833f48-1b3d-4e4c-bb79-926738913145"),
    ("Renata Mirella Pires", "070.930.131-63", "32.541.285-6", "afe7c928-8aeb-448c-9fe3-d7599234e56f"),
    ("César Davi Henry Viana", "643.633.652-42", "44.038.584-2", "cef97eed-da89-48e6-a9b6-59f9d7baa4cd");