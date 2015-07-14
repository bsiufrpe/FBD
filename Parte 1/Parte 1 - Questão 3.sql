SELECT pnome AS Nome, salario AS Salário
FROM empregado 
WHERE salario < 
	(SELECT AVG(salario) FROM empregado)