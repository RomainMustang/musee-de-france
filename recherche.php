<!DOCTYPE html>
<html>
<head>
	<title>Musée de France</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
	</head>
	<body>

	<div id="bgsearch">

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 menu2 "><a href="index.php" id="links">Accueil</a></div>
				<div class="col-md-6 menu1 "><a href="#" id="links">Musées</a></div>
			</div>
		</div>
				<h1 id="title">Musées de France</h1>

			<form id="rmusee">
				<input id="search" class="searchbar" name="q" method="GET" type="search" placeholder="Rechercher un musée">
				<input class="btn btn-success" type="submit" value="Rechercher">
			</form>

			<div class="col-md-10 col-md-offset-1 contour">
			<?php
			try{
				$bdd = new PDO('mysql:host=localhost;dbname=musees;charset=utf8', 'root', '');
			}
			catch (Exception $e){
				die('Erreur : ' . $e->getMessage());
			}
			$donnees = $bdd->query('SELECT * FROM listemusees');
			if(isset($_GET['q']) AND !empty($_GET['q'])){
				$q = htmlspecialchars($_GET['q']);
				$donnees = $bdd->query('SELECT * FROM listemusees WHERE CONCAT(cp, ville, nom_reg, nom_dep, nom_du_musee) LIKE "%'.$q.'%" ORDER BY id DESC');
				if(($donnee = $donnees->fetch()) == false){
					header ("Location: no.php/?q=$q");
					exit();
				}
				else{
					do
					{
						?>

						<div class="col-md-2 col-md-offset-1 forme parent">
							<?php
							$id = $donnee['id'];
							$image = $donnee['lien_image'];
							echo '<img class="images" src="'.$image.'"><br/>';
							?>
							<div class="disposition">
								<strong>Nom du musée</strong> : <?php echo $donnee['nom_du_musee']; ?><br />
								<strong>Adresse</strong> : <?php echo $donnee['adresse']; ?><br />
								<strong>Ville</strong> : <?php echo $donnee['ville']; ?><br />
							</div>

							<button onclick="maps(this.id)" id="a<?php echo $id ?>" type="button" class="btn btn-success place" data-toggle="modal" data-target="<?php echo '#'.$id ?>">En savoir plus</button>

							<div class="modal fade" id="<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myModalLabel"><?php echo $donnee['nom_du_musee']; ?></h4>
										</div>
										<div class="modal-body">
											<p><strong>Code Postal</strong> : <?php echo $donnee['cp']; ?><br /></p>
											<p><strong>Region</strong> : <?php echo $donnee['nom_reg']; ?><br /></p>
											<p><strong>Departement</strong> : <?php echo $donnee['nom_dep']; ?><br /></p>
											<p><strong>Téléphone</strong> : <?php echo $donnee['telephone']; ?><br /></p>
											<p><strong>Site Web</strong> : <?php echo $donnee['site_web']; ?><br /></p>
											<p><strong>Fermeture</strong> : <?php echo $donnee['fermeture_annuelle']; ?><br /></p>
											<p><strong>Horraire d'ouverture</strong> : <?php echo $donnee['periode_ouverture']; ?></p>
											<div id="map<?php echo $id ?>" style="width: 100%; height: 200px;"></div> 
											<!-- <div><img src="css/images/paris.jpg" style="height: 200px; width: 500px;"></div> -->
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-success" data-dismiss="modal">Fermer</button>
										</div>
									</div>
								</div>
							</div>
						</div>

					<?php
				} while($donnee = $donnees->fetch());
			}
		}
	$donnees->closeCursor();
	?>

	</div>
</div>

</body>

<script type="text/javascript">
var map;
function maps(id){
	parseId = id.replace( /^\D+/g, '');
	var getMap = "#map"+parseId;

$(function() {

    $("#map"+parseId).googleMap({
      zoom: 10, // Initial zoom level (optional)
      coords: [48.895651, 2.290569], // Map center (optional)
      type: "ROADMAP" // Map type (optional)
      
    }
    );
  });


};
</script>


<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-wfZxo5JmkbhCwu3g4NGtLnZrVLFZWzk"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.googlemap/1.5/jquery.googlemap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



</html>