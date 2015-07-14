<!DOCTYPE html>

    <title>
        Fundamentos de Banco de Dados
    </title>

	<body>
 
		<h1>PARTE 2</h1>
	
        <h2>Questão 1</h2>
        <ol>
            <p>
				Implementar os comandos SQL necessários para criar e popular as relações.
				Incluir as chaves primárias e estrangeira(s). Criar duas restrições de integridade
				para chave estrangeira, sendo uma restrição de exclusão e outra de atualização.
            </p>
        </ol>
        
		<h2>Resposta</h2>
		<blockquote>
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
		</blockquote>
		
		
		<hr>
		
		
		<h2>Questão 2</h2>
        <ol>
            <p>
				Implementar instruções SQL para inserir, excluir e modificar a base de dados. No
				mínimo duas instruções de inserção, duas instruções de modificação (atualização) e
				duas instruções de exclusão.
            </p>
        </ol>
        
		<h2>Resposta</h2>
		<blockquote>
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
		</blockquote>

		<hr>
		
		<h2>Questão 3</h2>
        <ol>
            <p>
				Criar duas visões, e apresentar seu conteúdo.
            </p>
        </ol>
        
		<h2>Resposta</h2>
		<blockquote>
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
		</blockquote>
	</body>

</html>