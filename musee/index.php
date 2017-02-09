<!DOCTYPE html>
<html>
<head>
	<title></title>
		
<link rel="stylesheet" href="css/style.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	  <meta name="viewport" content="width=device-width, initial-scale=1">

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
			{?>
                <div class="col-md-2 col-md-offset-1 forme">
                <?php 
                $id = $donnee['id'];
                $web =  $donnee['site_web'];
                $image = $donnee['lien_image'];
                echo '<img id="taille" src="'.$image.'"><br/>';
                ?>
                <!-- Liste des musée -->
                <strong>Nom du musée</strong> : <?php echo $donnee['nom_du_musee']; ?><br />
				<strong>Adresse</strong> : <?php echo $donnee['adresse']; ?><br />
				<strong>Ville</strong> : <?php echo $donnee['ville']; ?><br />
               

                <div class="container">
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="<?php echo "#".$id ?>">En savoir +</button>
                  <!-- Modal -->
                  <div class="modal fade" id="<?php echo "".$id ?>" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title"><?php echo $donnee['nom_du_musee']; ?></h4>
                        </div>
                        <div class="modal-body">
                                    <strong>Code Postal</strong> : <?php echo $donnee['cp']; ?><br />
                                    <strong>Region</strong> : <?php echo $donnee['nom_reg']; ?><br />
                                    <strong>Departement</strong> : <?php echo $donnee['nom_dep']; ?><br />
                                    <strong>Téléphone</strong> : <?php echo $donnee['telephone']; ?><br />
                                    <strong>Site Web</strong> : <?php echo "<a href='".$web."'target='_blank'>$web</a>" ?><br />
                                    <strong>Fermeture</strong> : <?php echo $donnee['fermeture_annuelle']; ?><br />
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


$donnees->closeCursor(); // Termine la requête

?>
<a name="haut" id="haut"></a>   
<div><a id="cRetour" class="cInvisible" href="#haut"></a></div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  window.onscroll = function(ev) {
    document.getElementById("cRetour").className = (window.pageYOffset > 1000) ? "cVisible" : "cInvisible";
  };
});
   
</script>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</html>