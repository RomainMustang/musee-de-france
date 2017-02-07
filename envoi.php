<?php

	include_once('html/simple_html_dom.php');
	//Connection à la bdd
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=musees;charset=utf8', 'root', '');
	}

	catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
	}
	$donnees = $bdd->query('SELECT * FROM listemusees WHERE id > 1149');

	while($donnee = $donnees->fetch())
	{

		$web =$donnee['site_web'];
		$musee=$donnee['nom_du_musee'] . $donnee['ville'];
		$musee=str_replace(' ','+',$musee);
		$lienHTML =file_get_html("https://www.google.fr/search?q=$musee&source=lnms&tbm=isch&sa=X&ved=0ahUKEwjmwoqgm_vRAhXKExoKHaj4BL0Q_AUICSgC&biw=1920&bih=974");
		$image = $lienHTML->find('img', 0)->src;

		$bdd->query("UPDATE listemusees set lien_image='{$image}' WHERE id='{$donnee['id']}'");

	}
	echo "Fichiers transfèrés";

?>