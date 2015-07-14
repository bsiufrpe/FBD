<!DOCTYPE html>

    <title>
        Fundamentos de Banco de Dados
    </title>
    <style>
        h3 {color: red}
        h4 {color: blue}
    </style>
    
    <body>

    <form method="post">
		<h1>PARTE 1</h1>
		
        <h2>Questão 2</h2>
        <ol>
            <p>Selecione todos os empregados que têm salário maior que 30000 e nasceram após 1960.
                <input type="submit" name="submit1" value="Exibir">
            </p>
        </ol>
        
        <?php
            include "htconfig/conexaoDB.php";
            if(isset($_POST['submit1'])){

                // Get all the data from the "example" table
                $result = mysql_query("SELECT * FROM empregado WHERE salario > 30000 AND datanasc >= '1960-01-01'") 
                or die(mysql_error());  

                echo "<table border='1'>";
                echo "<tr> 
                        <th>Primeiro Nome</th> 
                        <th>Nome do meio</th> 
                        <th>Último Nome</th> 
                        <th>SSN</th>
                        <th>Data de Nascimento</th> 
                        <th>Endereço</th>
                        <th>Sexo</th> 
                        <th>Salário</th>
                        <th>Super SSN</th> 
                        <th>DNO</th>
                     </tr>";
                // keeps getting the next row until there are no more to get
                while($row = mysql_fetch_array( $result )) {
                    // Print out the contents of each row into a table
                    echo "<tr>";
                    echo "<td>".$row['pnome']."</td>"; 
                    echo "<td>".$row['minicial']."</td>"; 
                    echo "<td>".$row['unome']."</td>"; 
                    echo "<td>".$row['ssn']."</td>"; 
                    echo "<td>".$row['datanasc']."</td>"; 
                    echo "<td>".$row['endereco']."</td>"; 
                    echo "<td>".$row['sexo']."</td>"; 
                    echo "<td>".$row['salario']."</td>"; 
                    echo "<td>".$row['superssn']."</td>"; 
                    echo "<td>".$row['dno']."</td>";
                    echo "</tr>";

                } 

                echo "</table>";
                
                echo "<h3>CÓDIGO SQL:</h3>";
                echo "<h4>SELECT * FROM empregado WHERE salario > 30000 AND datanasc >= '1960-01-01'</h4>";
            }     

        ?>
        
		
		<hr>
		
		
        <h2>Questão 3</h2>
        <ol>
            <p>Selecione nome e salário dos empregados que ganham menos do que a média salarial de todos os empregados.
                <input type="submit" name="submit2" value="Exibir">
            </p>
        </ol>
        
        <?php
            include "htconfig/conexaoDB.php";
            if(isset($_POST['submit2'])){

                // Get all the data from the "example" table
                $result = mysql_query("SELECT pnome, salario FROM empregado WHERE salario < (SELECT AVG(salario) FROM empregado) ORDER BY pnome") 
                or die(mysql_error());  

                echo "<table border='1'>";
                echo "<tr> 
                        <th>Nome</th> 
                        <th>Salário</th> 
                     </tr>";
                // keeps getting the next row until there are no more to get
                while($row = mysql_fetch_array( $result )) {
                    // Print out the contents of each row into a table                    
                    echo "<tr>";
                    echo "<td>".$row['pnome']."</td>"; 
                    echo "<td>".$row['salario']."</td>"; 
                    echo "</tr>";
                } 

                echo "</table>";              
                
                echo "<h3>CÓDIGO SQL:</h3>";
                echo "<h4>SELECT pnome AS Nome, salario AS Salário FROM empregado WHERE salario < (SELECT AVG(salario) FROM empregado)</h4>";
            }

        ?>
        
		
		<hr>
		
		
        <h2>Questão 11</h2>
        <ol>
            <p>Selecione o nome e a quantidades de dependentes de todos os funcionários.
                <input type="submit" name="submit3" value="Exibir">
            </p>
        </ol>
        
        <?php
            include "htconfig/conexaoDB.php";
            if(isset($_POST['submit3'])){

                // Get all the data from the "example" table
                $result = mysql_query("SELECT pnome, count(essn) FROM empregado, dependente WHERE ssn = essn GROUP BY pnome") 
                or die(mysql_error());  

                echo "<table border='1'>";
                echo "<tr> 
                        <th>Nome</th> 
                        <th>Número de Dependentes</th> 
                     </tr>";
                // keeps getting the next row until there are no more to get
                while($row = mysql_fetch_array( $result )) {
                    // Print out the contents of each row into a table
                    echo "<tr>";
                    echo "<td>".$row['pnome']."</td>"; 
                    echo "<td>".$row['count(essn)']."</td>"; 
                    echo "</tr>";
                } 

                echo "</table>";
                
                echo "<h3>CÓDIGO SQL:</h3>";
                echo "<h4>SELECT pnome AS Nome, count(essn) AS Dependentes FROM empregado, dependente WHERE ssn = essn
GROUP BY pnome</h4>";
            }

        ?>
        
		
		<hr>
		
		
		
        <h2>Questão 14</h2>
        <ol>
            <p>Selecione o ssn (CPF), o nome dos empregados, o nome do projeto e horas trabalhadas, cujas horas trabalhadas sejam superiores a 20h.
                <input type="submit" name="submit4" value="Exibir">
            </p>
        </ol>
        
        <?php
            include "htconfig/conexaoDB.php";
            if(isset($_POST['submit4'])){

                // Get all the data from the "example" table
                $result = mysql_query("SELECT ssn, pnome, pjnome, horas FROM empregado, projeto, trabalha_em WHERE ssn = essn AND pno = pnumero AND horas > 20 ORDER BY horas") 
                or die(mysql_error());  

                echo "<table border='1'>";
                echo "<tr> 
                        <th>CPF</th> 
                        <th>Nome</th> 
                        <th>Projeto</th> 
                        <th>Horas</th>
                     </tr>";
                // keeps getting the next row until there are no more to get
                while($row = mysql_fetch_array( $result )) {
                    // Print out the contents of each row into a table
                    echo "<tr>";
                    echo "<td>".$row['ssn']."</td>"; 
                    echo utf8_encode("<td>".$row['pnome']."</td>"); 
                    echo utf8_encode("<td>".$row['pjnome']."</td>"); 
                    echo "<td>".$row['horas']."</td>";
                    echo "</tr>";
                } 

                echo "</table>";
                
                echo "<h3>CÓDIGO SQL:</h3>";
                echo "<h4>SELECT ssn AS CPF, pnome AS Nome, pjnome AS Projeto, horas AS Horas FROM empregado, projeto, trabalha_em WHERE ssn = essn AND pno = pnumero AND horas > 20</h4>";
            }

        ?>
        
		
		<hr>
		
		
        <h2>Questão 16</h2>
        <ol>
            <p>Selecione o nome e salário dos empregados, e o nome e salário do supervisor, e a diferença de salários entre eles, para todos os empregados.
                <input type="submit" name="submit5" value="Exibir">
            </p>
        </ol>
        
        <?php
            include "htconfig/conexaoDB.php";
            if(isset($_POST['submit5'])){

                // Get all the data from the "example" table
                $result = mysql_query("SELECT e.pnome AS 'enome', e.salario AS 'esalario', s.pnome AS 'snome', s.salario AS 'ssalario', ABS(SUM(e.salario - s.salario)) AS 'diferenca' FROM empregado as e, empregado as s WHERE e.superssn = s.ssn GROUP BY e.pnome") 
                or die(mysql_error());  

                echo "<table border='1'>";
                echo "<tr> 
                        <th>Empregado</th> 
                        <th>Salário do Empregado</th> 
                        <th>Supervisor</th> 
                        <th>Salário do Supervisor</th>
                        <th>Diferença entre Salários</th> 
                     </tr>";
                // keeps getting the next row until there are no more to get
                while($row = mysql_fetch_array( $result )) {
                    // Print out the contents of each row into a table
                    echo "<tr>";
                    echo utf8_encode("<td>".$row['enome']."</td>"); 
                    echo "<td>".$row['esalario']."</td>"; 
                    echo utf8_encode("<td>".$row['snome']."</td>"); 
                    echo "<td>".$row['ssalario']."</td>";
                    echo "<td>".$row['diferenca']."</td>";
                    echo "</tr>";
                } 

                echo "</table>";
                
                echo "<h3>CÓDIGO SQL:</h3>";
                echo "<h4>SELECT e.pnome AS Empregado, e.salario AS Salário_Empregado, s.pnome AS Supervisor, s.salario AS Salário_Supervisor, ABS(SUM(e.salario - s.salario)) AS Diferença FROM empregado as e, empregado as s WHERE e.superssn = s.ssn GROUP BY e.pnome</h4>";
            }

        ?>
        
        
		<hr>
		
		
        <h2>Questão 23</h2>
        <ol>
            <p>Recuperar os nomes dos empregados que trabalham em dois ou mais projetos.
                <input type="submit" name="submit6" value="Exibir">
            </p>
        </ol>
        
        <?php
            include "htconfig/conexaoDB.php";
            if(isset($_POST['submit6'])){

                // Get all the data from the "example" table
                $result = mysql_query("SELECT pnome FROM empregado, trabalha_em WHERE ssn = essn GROUP BY essn HAVING count(essn) >= 2 ORDER BY pnome") 
                or die(mysql_error());  

                echo "<table border='1'>";
                echo "<tr> 
                        <th>Nome</th>  
                     </tr>";
                // keeps getting the next row until there are no more to get
                while($row = mysql_fetch_array( $result )) {
                    // Print out the contents of each row into a table
                    echo "<tr>";
                    echo utf8_encode("<td>".$row['pnome']."</td>"); 
                    echo "</tr>";
                } 

                echo "</table>";
                
                echo "<h3>CÓDIGO SQL:</h3>";
                echo "<h4>SELECT pnome AS Nome FROM empregado, trabalha_em WHERE ssn = essn GROUP BY essn HAVING count(essn) >= 2</h4>";
            }

        ?>
        
		<hr>
		
		
        <h2>Questão 27</h2>
        <ol>
            <p>Selecionar os nomes dos departamentos que possuem apenas uma localidade.
                <input type="submit" name="submit7" value="Exibir">
            </p>
        </ol>
        
        <?php
            include "htconfig/conexaoDB.php";
            if(isset($_POST['submit7'])){

                // Get all the data from the "example" table
                $result = mysql_query("SELECT dnome FROM departamento d, dept_localizacoes dl WHERE d.dnumero = dl.dnumero
GROUP BY dnome HAVING COUNT(dl.dnumero) = 1 ORDER BY dnome") 
                or die(mysql_error());  

                echo "<table border='1'>";
                echo "<tr> 
                        <th>Departamento</th>  
                     </tr>";
                // keeps getting the next row until there are no more to get
                while($row = mysql_fetch_array( $result )) {
                    // Print out the contents of each row into a table
                    echo "<tr>";
                    echo utf8_encode("<td>".$row['dnome']."</td>"); 
                    echo "</tr>";
                } 

                echo "</table>";
                
                echo "<h3>CÓDIGO SQL:</h3>";
                echo "<h4>SELECT dnome FROM departamento d, dept_localizacoes dl WHERE d.dnumero = dl.dnumero GROUP BY dnome
HAVING COUNT(dl.dnumero) = 1</h4>";
            }

        ?>
        
    </form>
    </body>

</html>