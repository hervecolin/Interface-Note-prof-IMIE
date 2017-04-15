<!--
Theme Name: Interface des profs de l'IMIE
Theme URI: https://interfaceProf
Author: H.COLIN
Author URI: https://hervcolin@yahoo.fr
Use it to make something cool, have fun, and share what you've learned with others.
-->
<!DOCTYPE html>
<html lang="fr">
<head>
         <meta charset="utf-8"/>
		       <meta name="viewport" content"width=device-width, initial-scale=1">
		         <link rel="stylesheet" style="text/css" href="style.css"/> <!--link css-->
			          <title>Interface Prof IMIE MDR !</title>
</head>
<body>

<p><a href="index.php" class="return" >Retour formulaire</a></p>  <!--balise de retour formulaire-->
  <img src="inf2.jpg" class="image2"/>
</body>
<h2>Résultat des notes des profs "IMIE DL19" MDR !</h2>      <!--Mon titre-->

<?php
                                     // CONNEXION A LA BASE DE DONNEES OK "RUNCATE TABLE `table`"pour vider les id lors des tests !
    try{
    $user = 'root';
    $pass= '';
    $connect = new PDO ('mysql:host=localhost;dbname=interfacimie',$user,$pass);  //new pour initialiser et mes variables de connection $connect!!
    	 echo ' La base de données est bien connecté.<br/>';

  	$nom = $_POST['nom'];
  	$prenom = $_POST['prenom'];
  	$matiere = $_POST['matiere'];
  	$note= $_POST['note'];
  	$image = $_POST['image'];

//var_dump($_POST); //I like to see what I push !
    }
    catch (PDOException $e){                           //mon catch pour les erreurs de connection
	    echo "probléme : ".$e;
    }
    try {
        $connect-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);//appel de ma DB
    	  $connect->beginTransaction();
    	//requete pour entrer les données dans la base insert into !
       $requete= "INSERT INTO prof ( nom, prenom, matiere, note, image) VALUES ('".$nom."','".$prenom."', '".$matiere."', '".$note."', '".$image."' )";                                 //syntaxe tordue('".$x----."') !
       $connect->exec($requete);
       $connect->commit();                     //pour excécuter la requète
         echo  'Saisie enregistrée dans la base de données.<br/>';
       }
    catch (PDOException $e){                              //mon exception avec rollback
	     $connect->rollback();
	    echo "erreur :".$e->getmessage();
	    }
		    if ((isset($_POST['nom']) && !empty($_POST['nom'])) && (isset($_POST['prenom']) && !empty($_POST['prenom']))&&(isset($_POST['matiere'])&& !empty($_POST['matiere']))&&(isset($_POST['note'])&& !empty($_POST['note'])) )
	       {
      	echo'Test de validation formulaire ok le programme continue...'."<br/>";
          }
    	 else{
      	echo '<a href="index".php">Vous devez renseigner le formulaire de note ! cliquer sur ce lien SVP</a><br/>'; //sinon retour au formulaire !
          }
                                           // ma syntaxe pour valider mes nouvelles variables encours !

	     $tableau = $_POST['nom'].$_POST['prenom'].$_POST['matiere'].$_POST['note'];
       $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);   //rappel de new ma DB
       $connect->beginTransaction();                          //choix beginTransation();
       $requete2 ="SELECT * FROM prof";                      // ma select de requete sur l'ensemble de ma db utilisateur
       $connect->commit();
       $resultat =$connect->query($requete2);

       echo "<table>";
       echo "<tr><th>Nom</th><th>Prenom</th><th>Matière</th><th>Note</th><th>Commentaire</th></tr>"; //le tableau pour récupérer mes données

       while ($r=$resultat->fetch(PDO::FETCH_ASSOC)){
       //mon while qui recherche mes index de table et affiche mes nom, prenom, ville avec fletch_ASSOC pour un tableau  associatif ! $r pour créer une nouvelle variable sinon boucle infinie de $resultat !
        echo "<tr><td>". $r['nom']."</td><td>".$r['prenom']."</td><td>".$r['matiere']."</td><td>".$r['note']
        ."</td><td>".$r['image']."</td></tr>";   //je demande d'afficher nom,prenom,  ville et dtad'inscription ds un tableau
       }
       echo "</table>";                          //mon echo fin de tableau
?>
<footer><br/>
<div class="footer">
&copy; <?=date ("d.m.Y") ?>  - H.COLIN          <!--  en php voir synt affichage dynamique de l'heure & copy copyright !-->
</div>
</footer>

<html>
