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

$requete = $bdd->query("SELECT * FROM joueur ORDER BY Pseudo");  

?>
<table border="1">
				<tr>
                    <th>Pseudo</th>
                    <th>Email</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Date de créationt</th>
                    <th>Dernière modification</th>
                    <th>id</th>
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
                    <th><?php echo $resultat['Pseudo'];?></th>
                    <th><?php echo $resultat['Email'];?></th>
                    <th><?php echo $resultat['Nom'];?></th>
                    <th><?php echo $resultat['Prenom'];?></th>
                    <th><?php echo $resultat['Date_naissance'];?></th>
                    <th><?php echo $resultat['Date_creation'];?></th>
                    <th><?php echo $resultat['Date_modif'];?></th>
                    <th><?php echo $resultat['id_user'];?></th>
                    <th><?php echo $resultat['Etat'];?></th>
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
