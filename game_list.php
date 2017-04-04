<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<!--		<select name="job" value="$tri">
  			<option selected="Nom">Nom</option>
 			<option value="Job">Job</option>
 			<option value="Date">Date</option>
 			<option value="ID">ID</option>
		</select>
<input type="submit" name=""> -->

<?php

$bdd = new PDO("mysql:host=127.0.0.1;dbname=zebrol; charset=utf8", "root", "");

$requete = $bdd->query("SELECT * FROM partie");  

?>
<table border="1">
				<tr>
                    <th>ID</th>
                    <th>J1</th>
                    <th>Score J1</th>
                    <th>J2</th>
                    <th>Score J2</th>
                    <th>Joueur du début</th>
                    <th>Nb pièces jouées</th>
                    <th>ID_plateau</th>
                    <th>Etat</th>
                </tr>
                <?php
while ($resultat = $requete->fetch())
{
	?>
	

                
            <?php//On affiche les lignes du tableau une à une à l'aide d'une boucle
            while($donnees = mysql_fetch_array($reponse))
            {
            ?>
                <tr>
                    <th><?php echo $resultat['id'];?></th>
                    <th><?php echo $resultat['J1'];?></th>
                    <th><?php echo $resultat['score_J1'];?></th>
                    <th><?php echo $resultat['J2'];?></th>
                    <th><?php echo $resultat['score_J2'];?></th>
                    <th><?php echo $resultat['joueur_debut'];?></th>
                    <th><?php echo $resultat['nb_piece_jouees'];?></th>
                    <th><?php echo $resultat['id_plateau'];?></th>
                    <th><?php echo $resultat['etat'];?></th>
                </tr>







<?php
	/*?>

	<tr>
<br>		<td><?php echo $resultat['ID']; ?></td> 
<br>		<td><?php echo $resultat['Nom']." ".$resultat['Prenom']; ?></td>
<br>		<td><?php echo "Date :".$resultat['Datedonnee']; ?></td>
<br>		<td><?php echo $resultat['Job']." pour ".$resultat['Client']; ?></td>
<br><td><?php echo "De ".$resultat['Heure de debut']."à ".$resultat['Heure de fin']."avec ".$resultat['Temps de pause']." de pause, donc ".$resultat['Total des heures']." d'heure total" ?></td>

<br>		<td><?php echo "Frais : ".$resultat['Nombre KM']."€ de KM, ".$resultat['Frais de restauration']."€ de restauration, ".$resultat['Puissance fiscal'].
			"€ de puissance fiscal et ".$resultat['Autres frais']."€ de frais divers"; ?></td>
<br><br><br><br>

	</tr>

	<?php */
}





?>	

</body>
</html>
