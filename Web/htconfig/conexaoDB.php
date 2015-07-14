<?php
/*
*	Nome do Arquivo: conexaoDB.php
*	Desenvolvedor:   Lucas Ferreira da Silva
*	Data de Criação: 05 de Maio de 2015
*
*	Este arquivo verifica as informações e conecta ao servidor de Banco de Dados
*
*================================================================================
*/


	// PARA COMENTAR UM DOS DOIS É SÓ USAR /* CÓDIGO */
{	//  Informações do Banco de Dados Localhost (Teste)
		
		
		
		$db = array(
		'hostname' => 'localhost',
		'username' => 'root',
		'password' => '',
		'database' => 'empresa',
		); 
		
	
}
{   //  Script de Conexão Segura
		$dbSucesso = false;
		$dbConectado = mysql_connect($db['hostname'],$db['username'],$db['password']) or die(mysql_error());
		
		if ($dbConectado) {		
			$dbSelecionado = mysql_select_db($db['database'],$dbConectado);
			if ($dbSelecionado) {
				$dbSucesso = true;
			} else {
				echo "FALHA: A seleção do banco de dados não obteve sucesso.";
			}
		} else {
				echo "FALHA: A conexão com o banco de dados MySQL não obteve sucesso.";
		}
	
	//  Script Seguro contra SQL Injection 1' or '1' = '1
}
?>