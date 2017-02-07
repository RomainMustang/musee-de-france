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
				$web =$donnee['site_web'];
				$musee=$donnee['nom_du_musee'] . $donnee['ville'];
				$musee=str_replace(' ','+',$musee);
				$lienHTML =file_get_html("https://www.google.fr/search?q=$musee&source=lnms&tbm=isch&sa=X&ved=0ahUKEwjmwoqgm_vRAhXKExoKHaj4BL0Q_AUICSgC&biw=1920&bih=974");
				$image = $lienHTML->find('img', 0)->src;
				echo '<img src="'.$image.'"><br/>';
				?>
				<!-- Liste des musée -->
				
				<strong>Nom du musée</strong> : <?php echo $donnee['nom_du_musee']; ?><br />
				<strong>Adresse</strong> : <?php echo $donnee['adresse']; ?><br />
				<strong>Ville</strong> : <?php echo $donnee['ville']; ?><br />
				<form action="" method="POST">
					<button type="submit">Voir +</button>
				</form>

				</div>
				<br/><br/><br/><br/>
				<?php

			} while($donnee = $donnees->fetch());
		}
    }


$donnees->closeCursor(); // Termine la requête

?>

</body>
</html>