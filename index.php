<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Coustard" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <title>Musée de france - Accueil</title>
  </head>
  <body id="bgaccueil">
    <?php
    try{
  		$bdd = new PDO('mysql:host=localhost;dbname=musees;charset=utf8', 'root', '');
  	}

  	catch (Exception $e){
  		die('Erreur : ' . $e->getMessage());
  	}


     ?>
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-6 menu1 "><a href="#" id="liens">Accueil</a></div>
        <div class="col-md-6 menu2 "><a href="recherche.php" id="liens">Musées</a></div>
      </div>
      <div id="myCarousel" class="carousel slide">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="item active">
            <img src="css/images/m1.jpg">
            <div class="container">
              <div class="carousel-caption">
                <h1>Musées de France</h1>
                <br>
                <p>Vous recherchez un musée a visiter pendant vos prochaines vacances? Trouvez le ici!</p>
              </div>
            </div>
          </div>
          <div class="item">
            <img src="css/images/m2.jpg">
            <div class="container">
              <div class="carousel-caption">
                <h1>Musées de France</h1>
                <p>trouvez ici le musée de votre prochaine sortie! Chateau, personnage célèbre, objets particulier...</p>
              </div>
           </div>
         </div>
         <div class="item">
          <img src="css/images/m3.jpg">
          <div class="container">
            <div class="carousel-caption">
              <h1>Musées de France</h1>
              <p>Avec plus de 1000 musées repertoriés sur ce site, ne pas trouver son bonheur est impossible!</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12" id="searchForm">
        <div class="form-group col-sm-4 col-sm-offset-5">
          <div class = "input-group">

            <form action="recherche.php" method="get">
			           <input id="search" type="text" class="searchbar" name="q"  placeholder="Rechercher un musée">
			           <!-- <?php echo '<a type="submit" class="btn btn-success">Recherche</a>'; ?> -->
		      </form>


          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <i class="glyphicon glyphicon-chevron-left"></i>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <i class="glyphicon glyphicon-chevron-right"></i>
      </a>
      </div>
    </div>
    <footer>
    <div class="footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-3 col-sm-4 col-xs-6 ">
                    <h3><a id="liensf" href="mailto:sarah.p@codeur.online"> Py Sarah </a></h3>
                    <ul>
                        <li> <a id="liensf" href="https://twitter.com/SarahConnor700"> <i class="fa fa-twitter">   </i> </a> </li>
                      </ul>
                </div>
                <div class="col-lg-3  col-md-3 col-sm-4 col-xs-6">
                    <h3><a id="liensf" href="mailto:vincent.g@codeur.online"> Gerard Vincent </a></h3>
                    <ul>
                      <li> <a id="liensf" href="https://twitter.com/VincentTime0"> <i class="fa fa-twitter">   </i> </a> </li>

                    </ul>
                </div>
                <div class="col-lg-3  col-md-3 col-sm-4 col-xs-6">
                    <h3><a id="liensf" href="mailto:romain.g@codeur.online"> Grandjean Romain </a></h3>
                    <ul>
                      <li> <a id="liensf" href="https://twitter.com/RomainMustang"> <i class="fa fa-twitter">   </i> </a> </li>

                    </ul>
                </div>
                <div class="col-lg-3  col-md-3 col-sm-4 col-xs-6">
                    <h3><a id="liensf" href="mailto:kevin.b@codeur.online"> Bourlier Kevin </a></h3>
                    <ul>
                      <li> <a id="liensf" href="https://twitter.com/dantikevin"> <i class="fa fa-twitter">   </i> </a> </li>
                    </ul>
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </div>
    <!--/.footer-->

    <div class="footer-bottom">

            <p class="pull-left"> Copyright Ministère de la Culture © le logo "musée de France" est une marque déposé son utilisation et sa mise à disposition est autorisée dans la limite des droits accordés par l'article L713-6 alinéa b du Code de la propriété intellectuelle et est reproduite ici en vertu de ces droits. </p>
            <p>les droits des photos utilisé sur ce site reviennent à leur propriétaire respectif,si toutefois vous désirez retirer une photo vous appartenant, veuillez nous contacter et nous la retirerons immédiatement.</p>
            </div>

    </div>
    <!--/.footer-bottom-->
</footer>
  </body>
</html>
