<!DOCTYPE html>
<html>
<head>
	<title>Musée de France</title>
	
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></head>
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<body>

		<form>
			<input id="search" class="searchbar" name="q" method="GET" type="search" placeholder="Rechercher un musée">
			<input class="btn btn-success" type="submit" value="Rechercher">
		</form>

		<?php
		include_once('html/simple_html_dom.php');

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

					<div class="col-md-2 col-md-offset-1 forme">
						<?php 
						$id = $donnee['id'];
						$image = $donnee['lien_image'];
						echo '<img src="'.$image.'"><br/>';
						?>
						<strong>Nom du musée</strong> : <?php echo $donnee['nom_du_musee']; ?><br />
						<strong>Adresse</strong> : <?php echo $donnee['adresse']; ?><br />
						<strong>Ville</strong> : <?php echo $donnee['ville']; ?><br />

						<button onclick="maps(this.id)" id="a<?php echo $id ?>" type="button" class="btn btn-success" data-toggle="modal" data-target="<?php echo '#'.$id ?>">En savoir plus</button>

						<div class="modal fade" id="<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="myModalLabel"><?php echo $donnee['nom_du_musee']; ?></h4>
									</div>
									<div class="modal-body">
										<strong>Code Postal</strong> : <?php echo $donnee['cp']; ?><br />
										<strong>Region</strong> : <?php echo $donnee['nom_reg']; ?><br />
										<strong>Departement</strong> : <?php echo $donnee['nom_dep']; ?><br />
										<strong>Téléphone</strong> : <?php echo $donnee['telephone']; ?><br />
										<strong>Site Web</strong> : <?php echo $donnee['site_web']; ?><br />
										<strong>Fermeture</strong> : <?php echo $donnee['fermeture_annuelle']; ?><br />
										<strong>Horraire d'ouverture</strong> : <?php echo $donnee['periode_ouverture']; ?>
										<div id="map<?php echo $id ?>" style="width: 580px; height: 200px;"></div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
									</div>
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


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript" src="jquery.googlemap.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyY7nlML6uJecGc4aBOGLTtvA_5Y4in0o"></script>



<!-- <script>
function myMap() {
var mapProp= {
    center:new google.maps.LatLng(51.508742,-0.120850),
    zoom:5,
};
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script> -->

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-AIzaSyCyY7nlML6uJecGc4aBOGLTtvA_5Y4in0o&callback=myMap"></script> -->


<script type="text/javascript">
	function maps (id){

		var idParse = id.replace( /^\D+/g, '');

		$(function() {
$("#map"+ idParse ).googleMap({
      zoom: 10, // Initial zoom level (optional)
      /*coords: [48.895651, 2.290569],*/
      center:new google.maps.LatLng(48.895651, 2.290569),
      type: "ROADMAP" // Map type (optional)
  });
		})
	}
</script>





</html>

