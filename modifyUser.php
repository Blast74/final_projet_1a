<?php
	session_start();
	require "conf.inc.php";
	require "lib.php";
	include "header.php";

	if(!empty($_GET["id"])){
		//Récupérer l'id en GET
		$db = dbConnect();
		//Récupérer l'utilisateur en BDD
		$query = $db->prepare("SELECT * FROM joueur WHERE id_user=:id" );
		$query->execute($_GET);
		$result = $query->fetch();

		//Remplir la variable $form avec les données de la base
		if(!empty($result)){
			//$form = $result;
			$form = [
				"id"=>$result["id_user"],
				"Pseudo"=>$result["Pseudo"],
				"Email"=>$result["Email"],
				"Date_naissance"=>$result["Date_naissance"]
			];
		}
	}

?>

<section>

<?php
	if(isset($_SESSION['error_form'])){
		//?errors=1,2,3,4,6
		$listOfErrors = explode(",", $_SESSION['error_form']);
		foreach ($listOfErrors as $error) {
			echo "<li>".$msgError[$error];
		}


		$form = $_SESSION['data_form'];

		unset($_SESSION['data_form']);
		unset($_SESSION['error_form']);

	}


?>

	<form method="POST" action="saveUser.php?id=<?php echo (isset($form["id"]))?$form["id"]:""; ?>">

		<input type="text" name="Pseudo" placeholder="Votre Pseudo" required="requried" 
		value="<?php echo (isset($form["Pseudo"]))?$form["Pseudo"]:""; ?>">
		<br>
		<input type="email" name="Email" placeholder="Votre Email" required="requried" value="<?php echo (isset($form["Email"]))?$form["Email"]:""; ?>">

		<br>
		<input type="password" name="Mdp" placeholder="Votre mot de passe" required="requried">
		<input type="password" name="Mdp2" placeholder="Confirmation" required="requried">
		<br>
		<input type="date" name="Date_naissance"
		value="<?php echo (isset($form["Date_naissance"]))?$form["Date_naissance"]:""; ?>">
		<br>
<!-- 
		
		<?php
			//$listOfGender
			foreach ($listOfGender as $key => $value) {
				echo '<label><input type="radio" '.
				(( isset($form["gender"]) && $form["gender"] == $key)?"checked='checked'":"")
				.' name="gender" value="'.$key.'">'.$value.'</label>';
			}
		?>


		<br>
		<select name="country">
			<?php
				foreach ($listOfCountry as $key => $value) {
					echo '<option value="'.$key.'"'.
					(( isset($form["country"]) && $form["country"] == $key)?"selected='selected'":"")
				.'>'.$value.'</option>';
				}
			?>
		</select>
		<br> -->
		<!-- <textarea name="comment" placeholder="Votre commentaire"><?php echo (isset($form["comment"]))?$form["comment"]:""; ?></textarea>
		 -->
		<br>
		<input type="image" src="img/enter-arrow.png" width="20px">


	</form>

</section>


<?php
	include "footer.php";
?>