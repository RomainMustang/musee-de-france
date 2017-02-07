<?php

include_once('html/simple_html_dom.php');

$musee="Musée du Château des Rohan SAVERNE";

$musee=str_replace(' ','',$musee);


$lienHTML =file_get_html("https://www.google.fr/search?q=$musee&source=lnms&tbm=isch&sa=X&ved=0ahUKEwjmwoqgm_vRAhXKExoKHaj4BL0Q_AUICSgC&biw=1920&bih=974");
$image = $lienHTML->find('img', 0)->src;
echo '<img src="'.$image.'">';
echo $musee;

?>