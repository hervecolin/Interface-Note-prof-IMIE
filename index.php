<!--
Theme Name: Interface note prof
Theme URI: https://hervcolin@yahoo.fr
Author: H.COLIN
Author URI: https://H.COLIN
Use it to make something cool, have fun, and share what you've learned with others.
-->
<html>
    <head>
	    <title> formulaire</title>
	    <meta charset="utf-8"/>
	    <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
      <img src="logotrib.jpg" class="logotrib"/>
      <h1>Formulaire de note profs "IMIE DL19" MDR !</h1>
       <div class="container">
         <form method="post" action="cible.php" class="formulaire">
                <div class="btn">
                    <p><label name="nom"> Nom du prof</label></p>
                    <p><input type="text" name="nom" class="btn"/></p>
                    <p><label name="nom"> Prénom du prof</label></p>
                    <input type="text" name="prenom" class="btn"/>
                    <p><label name="nom">Nom du module</label></p>
                    <input type="text" name="matiere" class="btn"/>
                    <p><label name="nom"> Votre Note !</label></p>
                    <input type="text" name="note"class="btn"/>
                    <p><label name="nom">Votre commentaire...</label></p>
                    <input type="text" name="image"class="btn"/>
                    <p><input type="submit" value="valider" class="btn2"/></p>
                  </div>
                </form>
        <img src="inf.jpg" class="image"/>
              </div>
  </body>
  <footer>
    <div class="footer">
      <br/>
      &copy; <?=date ("d.m.Y") ?>  - H.COLIN <!--  en php voir synt affichage dynamique de l'heure & copy copyright !-->
    </div>
  </footer>
  <html>
