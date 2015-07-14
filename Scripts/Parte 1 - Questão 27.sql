SELECT dnome
FROM departamento d, dept_localizacoes dl
WHERE d.dnumero = dl.dnumero
GROUP BY dnome
HAVING COUNT(dl.dnumero) = 1