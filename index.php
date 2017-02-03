<!DOCTYPE html>
<html>
<head>
	<title>Liste des musées de France</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
</head>
<body>

	<div class="navbar-fixed">
		<nav>
			<div class="nav-wrapper">
				<a href="index.php">Components</a>
				<ul class="right hide-on-med-and-down">
					<li><a href="index.php">Components</a></li>
					<div class="row">
						<div class="container">
						</div>
					</div>
				</ul>
			</div>
		</nav>
	</div>

	<h1>Musée de France !</h1>
	<div class="row">
		<div class="container">
			<div class="col s12">
				<nav>
					<div class="nav-wrapper">
						<form method="GET" action="search.php">
							<div class="input-field">
								<input id="search" type="search" placeholder="Rechercher un musé" required>
								<label class="label-icon" for="search"><i class="material-icons"></i></label>
							</div>
						</form>
					</div>
				</nav>
			</div>
		</div>
		
	</button>
</div>


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
	<strong>Horraire d'ouverture</strong> : <?php echo $donnees['periode_ouverture']; ?><br/><br/><br/><br/>

	<?php
}


$reponse->closeCursor(); // Termine la requête

?>


<footer class="page-footer">
	<div class="container">
		<div class="row">
			<div class="col l6 s12">
				<h5 class="white-text">Footer Content</h5>
				<p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
			</div>
			<div class="col l4 offset-l2 s12">
				<h5 class="white-text">Links</h5>
				<ul>
					<li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
					<li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
					<li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
					<li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container">
			© 2017 
			<a class="grey-text text-lighten-4 right" href="#!">More Links</a>
		</div>
	</div>

</footer>

</body>
</html>
