<?php
	session_start();
	require "conf.inc.php";
	require "lib.php";
	include "header.php";
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

	<form method="POST" action="saveUser.php">

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

		
<!-- 		<?php
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
		<br>
		<textarea name="comment" placeholder="Votre commentaire"><?php echo (isset($form["comment"]))?$form["comment"]:""; ?></textarea>
		<br> -->

		<img src="captcha.php">
		<br>
		<input type="text" name="captcha" required="required">
		<br>

		<label>J'accèpte les CGU <input type="checkbox" name="cgu" required></label>
		<br>
		<input type="image" src="img/enter-arrow.png" width="20px">


	</form>

</section>


<?php
	include "footer.php";
?>