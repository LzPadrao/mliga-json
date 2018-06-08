<?php

function conectar()
{
	try 
	{
		$pdo = new PDO("mysql:host=localhost:3307;dbname=futebol","root","6u574v0");	
	} 
	catch (PDOException $e) 
	{
		echo $e->getMessage();	
	}
return $pdo;
}

?>