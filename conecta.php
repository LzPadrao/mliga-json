<?php

function conectar()
{
	try 
	{
		$pdo = new PDO("mysql:host=localhost:3306;dbname=megaliga","root","root");	
	} 
	catch (PDOException $e) 
	{
		echo $e->getMessage();	
	}
return $pdo;
}

?>
