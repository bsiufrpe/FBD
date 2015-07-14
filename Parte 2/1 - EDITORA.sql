-- Script do Banco de Dados EDITORA




-- Excluindo o Banco de Dados (Se existir)
DROP SCHEMA IF EXISTS EDITORA;

-- Criando o Banco de Dados
CREATE SCHEMA EDITORA;

-- Selecionando o Banco de Dados
USE EDITORA;




-- Criando as Tabelas
CREATE TABLE Departamento(
	CodDepto integer PRIMARY KEY,
	Nome varchar(100)
);

CREATE TABLE Autor(
	CodAutor integer PRIMARY KEY,
	Nome varchar(100),
	CodDepto integer,
	FOREIGN KEY (CodDepto) REFERENCES Departamento(CodDepto)
	ON DELETE SET NULL
	ON UPDATE CASCADE
);

CREATE TABLE Conferencia(
	CodConf integer PRIMARY KEY,
	Nome varchar(100)
);

CREATE TABLE Publicacao(
	CodPub integer PRIMARY KEY,
	titulo varchar(100),
	ano integer,
	CodConf integer,
	FOREIGN KEY (CodConf) REFERENCES Conferencia(CodConf)
	ON DELETE SET NULL
	ON UPDATE CASCADE
);

CREATE TABLE PublicacaoAutor(
	CodAutor integer,
	CodPub integer,
	FOREIGN KEY (CodAutor) REFERENCES Autor(CodAutor)
	ON DELETE SET NULL
	ON UPDATE CASCADE,
	FOREIGN KEY (CodPub) REFERENCES Publicacao(CodPub)
	ON DELETE SET NULL
	ON UPDATE CASCADE
);




-- Populando as Tabelas do Banco de Dados EDITORA

INSERT INTO Departamento (CodDepto, Nome) VALUES
(1, 'Logística'),
(2, 'Biblioteconomia'),
(3, 'RH'),
(4, 'Marketing'),
(5, 'Direitos Autorais'),
(6, 'Assessoria de Imprensa');

INSERT INTO Autor (CodAutor, nome, CodDepto) VALUES
(1, 'João Guimarães', 4),
(2, 'Márcia Strauss', 1),
(3, 'Kleber Viana', 5),
(4, 'Paola Mendez', 6),
(5, 'Luzitânia Souza', 3),
(6, 'Artemiz Klause', 2),
(7, 'Willian Derik', 5),
(8, 'Cátia Amadeu', 1),
(9, 'Juliana Roset', 4);

INSERT INTO Conferencia (CodConf, Nome) VALUES
(1, 'História do Livro'),
(2, 'Transportando com Qualidade'),
(3, 'Vendas de Sucesso'),
(4, 'Protegendo sua Marca'),
(5, 'Como selecionar bons profissionais');

INSERT INTO Publicacao (CodPub, titulo, ano, CodConf) VALUES
(1, 'A Arte de Vender', 2013, 3),
(2, 'Marca Protegida', 2015, 4),
(3, 'RH Competitivo', 2011, 5),
(4, 'Origem da Vida do Livro', 2012, 1),
(5, 'Logística e Qualidade', 2014, 2),
(6, 'Entrega em Domício - Responsabilidades', 2010, 2);

INSERT INTO PublicacaoAutor (CodAutor, CodPub) VALUES
(1, 1),
(3, 2),
(5, 3),
(6, 4),
(2, 5),
(8, 6);