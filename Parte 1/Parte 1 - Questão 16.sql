SELECT e.pnome AS Empregado, e.salario AS Salário_Empregado, 
	   s.pnome AS Supervisor, s.salario AS Salário_Supervisor,
	   ABS(SUM(e.salario - s.salario)) AS Diferença
FROM empregado as e, empregado as s
WHERE e.superssn = s.ssn
GROUP BY e.pnome
