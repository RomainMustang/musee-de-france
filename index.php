<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<form type="search" method="GET">
		<input type="text" id="search" name="q"/>
		<input type="submit" value="valider">
	</form></br>
	<?php
//Connection à la bdd
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=musees;charset=utf8', 'root', '');
	}

	catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
	}


	$reponse = $bdd->query('SELECT * FROM listemusees');

	if(isset($_GET['q']) AND !empty($_GET['q']))
	{
		$q = htmlspecialchars($_GET['q']);

		$reponse = $bdd->query('SELECT * FROM listemusees WHERE CONCAT(cp, ville, nom_reg, nom_dep, nom_du_musee) LIKE "%'.$q.'%" ORDER BY id DESC');
    }

	else
	{
		echo "Aucune recherche"."<br>";
	}

	while ($donnees = $reponse->fetch())
	{
		if($donnees['nom_du_musee'] == '')
		{
			echo "Il n'y aucun résultat pour votre recherche. Veuillez faire une recherche valide";
		}

		$web =$donnees['site_web'];

		include_once('html/simple_html_dom.php');
		$musee=$donnees['nom_du_musee'] . $donnees['ville'];
		$musee=str_replace(' ','+',$musee);
		$lienHTML =file_get_html("https://www.google.fr/search?q=$musee&source=lnms&tbm=isch&sa=X&ved=0ahUKEwjmwoqgm_vRAhXKExoKHaj4BL0Q_AUICSgC&biw=1920&bih=974");
		$image = $lienHTML->find('img', 0)->src;
		echo '<img src="'.$image.'">';

		?>
		<!-- Liste des musée -->
		<strong>Region</strong> : <?php echo $donnees['nom_reg']; ?><br />
		<strong>Departement</strong> : <?php echo $donnees['nom_dep']; ?><br />
		<strong>Nom du musée</strong> : <?php echo $donnees['nom_du_musee']; ?><br />
		<strong>Adresse</strong> : <?php echo $donnees['adresse']; ?><br />
		<strong>Code Postal</strong> : <?php echo $donnees['cp']; ?><br />
		<strong>Ville</strong> : <?php echo $donnees['ville']; ?><br />
		<strong>Téléphone</strong> : <?php echo $donnees['telephone']; ?><br />
		<strong>Site Web</strong> : <?php echo "<a href='http://$web'>$web</a>"; ?><br />
		<strong>Fermeture</strong> : <?php echo $donnees['fermeture_annuelle']; ?><br />
		<strong>Horraire d'ouverture</strong> : <?php echo $donnees['periode_ouverture']; ?>



		</div>
		<br/><br/><br/><br/>
		<?php
	}

$reponse->closeCursor(); // Termine la requête

?>

</body>
</html>