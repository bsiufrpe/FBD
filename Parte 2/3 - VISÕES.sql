-- Selecionando o Banco de Dados
USE EDITORA;




-- Visão que exibe as publicações que farão parte de determinadas conferências por autor.

CREATE VIEW Evento
AS
	SELECT a.Nome AS Autor, c.Nome AS Conferência, p.titulo AS Título
	FROM Autor a, Conferencia c, Publicacao p, PublicacaoAutor pa
	WHERE a.CodAutor = pa.CodAutor 
	AND pa.CodPub = p.CodPub
	AND p.CodConf = c.CodConf
	ORDER BY a.Nome;
	
	
	
-- Visão que exibe os autores que não têm publicação até o presente momento.

CREATE VIEW SemPublicacao
AS
	SELECT a.Nome AS Autor
	FROM Autor AS a LEFT JOIN PublicacaoAutor AS pa
	ON a.codAutor = pa.CodAutor
	WHERE pa.CodPub IS NULL
	ORDER BY a.Nome;