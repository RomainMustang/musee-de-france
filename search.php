<?php
//Connection à la bdd
try{
	$bdd = new PDO('mysql:host=localhost;dbname=musees;charset=utf8', 'root', '');
}

catch (Exception $e){
	die('Erreur : ' . $e->getMessage());
}


if(isset($_GET['search'])){
	$q=$_GET['search'];  
	require "index.php";
	$sql="SELECT * FROM listemusees WHERE cp LIKE '%70000%' ";
	$req=mysql_query($sql) or die (mysql_error());
	while ($d=mysql_fetch_assoc($req)){
		echo "<h1>{$d["cp"]} </h1>";
		echo "<p>{$d["nom_reg"]} </p>";
	}
}

else{
	echo "Pas de recherche";
}

?>
