<!DOCTYPE html>
<html>
<head>
	<title>Liste des musées de France</title>
	<meta charset="utf-8">
	<!-- <link rel="stylesheet" type="text/css" href="./Bootstrap/css/boostrap.css"> -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>




<!-- <div class="container">
	<div class="row">
        <div class="col-md-6">
    		<h2>Rechercher un musée</h2>
            <div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input action ="search.php" method="GET" type="text" class="form-control input-lg" placeholder="Tapez votre recherhe" />
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-lg">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
	</div>
</div> -->






<form action ="search.php" method="GET">
	<span>Recherche par nom :</span> 
	<input type="text" id="search" name="search"/>
	<input type="submit" value="Envoyer">
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

	while ($donnees = $reponse->fetch()){

		?>

		<!-- Liste des musée -->
		
		<strong>Region</strong> : <?php echo $donnees['nom_reg']; ?><br />
		<strong>Departement</strong> : <?php echo $donnees['nom_dep']; ?><br />
		<strong>Nom du musée</strong> : <?php echo $donnees['nom_du_musee']; ?><br />
		<strong>Adresse</strong> : <?php echo $donnees['adresse']; ?><br />
		<strong>Code Postal</strong> : <?php echo $donnees['cp']; ?><br />
		<strong>Ville</strong> : <?php echo $donnees['ville']; ?><br />
		<strong>Téléphone</strong> : <?php echo $donnees['telephone']; ?><br />
		<strong>Site Web</strong> : <?php echo $donnees['site_web']; ?><br />
		<strong>Fermeture</strong> : <?php echo $donnees['fermeture_annuelle']; ?><br />
		<strong>Horraire d'ouverture</strong> : <?php echo $donnees['periode_ouverture']; ?>
		</div>
		<br/><br/><br/><br/>
		<?php
	}


$reponse->closeCursor(); // Termine la requête

?>



</footer>

</body>
</html>
