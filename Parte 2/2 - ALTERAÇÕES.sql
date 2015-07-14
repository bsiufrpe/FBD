-- Selecionando o Banco de Dados
USE EDITORA;



-- Uso do comando de inserção (INSERT)

INSERT INTO Conferencia (CodConf, Nome) VALUES (6, 'Assessorando Equipes'); 

INSERT INTO Publicacao (CodPub, titulo, ano, CodConf) VALUES (7, 'Organização de Pessoal', 2015, 6);


-- Uso do comando de atualização (UPDATE)

UPDATE Departamento SET Nome = "Pessoal" WHERE CodDepto = 3;

UPDATE Autor SET nome = "Paolla Mendez" WHERE CodAutor = 4;


-- Uso do comando de atualização (UPDATE)

DELETE FROM Departamento WHERE CodDepto = 6;

DELETE FROM Publicacao WHERE CodPub = 6;