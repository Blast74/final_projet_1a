<?php
	require "lib.php";
	include "header.php";
?>

<section>


	<!--
	Afficher tous les utilisateurs qui ne sont pas supprimés
	et remplacer le genre et le pays par les valeurs de conf.inc.php -->

	<?php
		$db = dbConnect();
		$query = $db->query("SELECT * FROM joueur ;");
	?>


	<table border="1px">
		<tr>
			<th>id</th>
			<th>Pseudo</th>
			<th>Email</th>
			<th>actions</th>
		</tr>
		<?php
		//while($value = $query->fetch() ){
		//Ajouter une colonne avec un lien vers deleteUser.php
		//Envoyer sur cette page via le GET l'id de l'utilisateur
		//Sur la page en question supprimer de  la base l'utilisateur
		//et rediriger l'internaute ici
		foreach ($db->query("SELECT * FROM joueur WHERE Etat != 'd' ; ") as $value) {
			echo "<tr>
					<td>".$value["id_user"]."</td>
					<td>".$value["Pseudo"]."</td>
					<td>".$value["Email" ]."</td>
					<td>
						<center>
							<a href='modifyUser.php?id=".$value["id_user"]."'
								>&rHar;</a>
							<a href='deleteUser.php?id=".$value["id_user"]."'
								>&cross;</a>
						</center>
					</td>
				</tr>";
		}

		?>


	</table>




</section>

<?php
	include "footer.php";
?>
