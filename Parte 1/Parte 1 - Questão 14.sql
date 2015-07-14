SELECT ssn AS CPF, pnome AS Nome, pjnome AS Projeto, horas AS Horas
FROM empregado, projeto, trabalha_em
WHERE ssn = essn 
AND pno = pnumero
AND horas > 20