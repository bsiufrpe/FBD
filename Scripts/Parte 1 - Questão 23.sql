SELECT pnome AS Nome
FROM empregado, trabalha_em
WHERE ssn = essn
GROUP BY essn
HAVING count(essn) >= 2