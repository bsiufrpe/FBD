SELECT pnome AS Nome, count(essn) AS Dependentes 
FROM empregado, dependente
WHERE ssn = essn
GROUP BY pnome