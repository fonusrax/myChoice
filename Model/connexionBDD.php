<?php

try
{      
	$bdd = new PDO('mysql:host=localhost;dbname=orientation','root','');
}
catch (PDOException $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
