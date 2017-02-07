<?php

if(isset($_GET['id']))
{
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=musees;charset=utf8', 'root', '');
	}

	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}


	$donnees = $bdd->query("SELECT * FROM listemusees WHERE id='{$_GET['id']}'");
	$donnee = $donnees->fetch();
	?>

	<strong>Nom du musée</strong> : <?php echo $donnee['nom_du_musee']; ?><br />
	<strong>Adresse</strong> : <?php echo $donnee['adresse']; ?><br />
	<strong>Ville</strong> : <?php echo $donnee['ville']; ?><br />

<?php
}

?>