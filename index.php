<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>


	<form type="search" method="GET">
		<input type="text" id="search" name="q"/>
		<input type="submit" value="valider">
	</form></br>
	<?php
	include_once('html/simple_html_dom.php');
	//Connection à la bdd
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=musees;charset=utf8', 'root', '');
	}

	catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
	}


	$donnees = $bdd->query('SELECT * FROM listemusees');

	if(isset($_GET['q']) AND !empty($_GET['q']))
	{
		$q = htmlspecialchars($_GET['q']);
		$donnees = $bdd->query('SELECT * FROM listemusees WHERE CONCAT(cp, ville, nom_reg, nom_dep, nom_du_musee) LIKE "%'.$q.'%" ORDER BY id DESC');


		if(($donnee = $donnees->fetch()) == false)
		{
			echo "Aucun résultat trouvé";
		}
		else
		{
			do
			{
				$id = $donnee['id']
				$image = $donnee['lien_image'];
				echo "<img src=$image><br/>";
				?>
				<!-- Liste des musée -->
				
				<strong>Nom du musée</strong> : <?php echo $donnee['nom_du_musee']; ?><br />
				<strong>Adresse</strong> : <?php echo $donnee['adresse']; ?><br />
				<strong>Ville</strong> : <?php echo $donnee['ville']; ?><br />
				<strong>Region</strong> : <?php echo $donnee['nom_reg']; ?><br />
				<strong>Departement</strong> : <?php echo $donnee['nom_dep']; ?><br />
				
				<button type="button" class="btn btn-info" data-toggle="collapse" data-target="<?php echo "#".$id ?>">En savoir plus sur le musée</button>
				<div id="<?php echo "".$id ?>" class="collapse ">

				<strong>Code Postal</strong> : <?php echo $donnee['cp']; ?><br />
				<strong>Téléphone</strong> : <?php echo $donnee['telephone']; ?><br />
				<strong>Site Web</strong> : <?php echo $donnee['site_web']; ?><br />
				<strong>Fermeture</strong> : <?php echo $donnee['fermeture_annuelle']; ?><br />
				<strong>Horraire d'ouverture</strong> : <?php echo $donnee['periode_ouverture']; ?>
				</div>
			</div>
		</div>
		<br/><br/><br/><br/>
		<?php
	} while($donnee = $donnees->fetch());
}
}
$donnees->closeCursor();

?>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>
