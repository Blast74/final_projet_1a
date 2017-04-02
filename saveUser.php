<?php
session_start();
require "conf.inc.php";
require "lib.php";

//Vérifier que les champs Pseudo, Email, Mdp, Mdp2, Date_naissance, gender, 
//country et comment existent
if(
	!empty($_POST["Pseudo"]) && 
	!empty($_POST["Email"]) && 
	!empty($_POST["Mdp"]) && 
	!empty($_POST["Mdp2"]) && 
	isset($_POST["Date_naissance"]) && 
	/*!empty($_POST["gender"]) && 
	!empty($_POST["country"]) && 
	isset($_POST["comment"]) && */
	(!empty($_POST["captcha"]) || !empty($_GET["id"]))
	){

	$error = false;
	$listOfErrors;

	$_POST["Pseudo"] = trim($_POST["Pseudo"]);
	$_POST["Email"] = trim($_POST["Email"]);
	/*$_POST["comment"] = trim($_POST["comment"]);*/


	//Pseudo : nb de caractère 6 min et 16 max
	if(  strlen($_POST["Pseudo"])<6 || strlen($_POST["Pseudo"])>16  ){
		$error = true;
		$listOfErrors[]=1;
	}

	//Email : fonction native à php pour vérifier le format
	if( !filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL) ){
		$error = true;
		$listOfErrors[]=2;
	}

	//Mdp : nb de caractère 8 min et 16 max et différent de Pseudo
	if( strlen($_POST["Mdp"])<8 || strlen($_POST["Mdp"])>16 || $_POST["Mdp"]==$_POST["Pseudo"]  ){
		$error = true;
		$listOfErrors[]=3;
	}

	//Mdp2 : identique à Mdp
	if($_POST["Mdp"] != $_POST["Mdp2"]){
		$error = true;
		$listOfErrors[]=4;
	}

	//Date_naissance : si il n'est pas vide vérifier que la date est correcte
	//est doit avoir entre 10 et 120 ans
	//$_POST["Date_naissance"] = 2016-11-02
	$explodeDate = explode("-", $_POST["Date_naissance"]);
	//$explodeDate = [2016, 11, 02 ];

	if(count($explodeDate)!=3 || !checkdate($explodeDate[1], $explodeDate[2], $explodeDate[0])  ){
		$error = true;
		$listOfErrors[]=5;
	}else{

		$ilYA120ans = time() - (31536000*120);
		$ilYA10ans = time() - (31536000*10);
		if( strtotime($_POST["Date_naissance"])<$ilYA120ans || 
			strtotime($_POST["Date_naissance"])>$ilYA10ans) {
			$error = true;
			$listOfErrors[]=6;
		}

	}

/*	//gender : je vérifie que $_POST["gender"] existe dans le
	//table $listOfGender
	if( !array_key_exists($_POST["gender"], $listOfGender) ){
		$error = true;
		$listOfErrors[]=7;
	}

	//country : soit fr, pl ou ru
	if(!array_key_exists($_POST["country"], $listOfCountry)){
		$error = true;
		$listOfErrors[]=8;
	}

	//comment : si comment n'est pas vide il doit etre inferieur à 255 caractères
	if(strlen($_POST["comment"])>255 ){
		$listOfErrors[]=9;
		$error = true;
	}
*/
	//A ne faire que si c'est un insert
	//Donc il n'y a pas d'id dans l'url
	if( !isset($_GET["id"])){

		echo "okey3";

		//Vérification du captcha
		if( $_POST["captcha"] != $_SESSION["captcha"]){
			$listOfErrors[]=11;
			$error = true;
		}
		//cgu : doit exister
		if( !isset($_POST["cgu"]) ){
			$listOfErrors[]=10;
			$error = true;
		}
	}

	echo $error;

	if(!$error){

		echo "okey2";

		$db = dbConnect();



		//Est ce que le Pseudo est unique
		$query = $db->prepare(
			"SELECT id_user FROM joueur WHERE Pseudo=:Pseudo"
			);
		
		$query->execute(  [ "Pseudo"=> $_POST["Pseudo"] ]  );


		$resultat = $query->fetch();
		if( !empty($resultat) ){
			$listOfErrors[]=12;
			$error = true;
		}







		//Est ce que l'Email est unique
		$query = $db->prepare(
			"SELECT id_user FROM joueur WHERE Email=:Email"
			);
		$query->execute(  [ "Email"=> $_POST["Email"] ]  );
		$resultat = $query->fetch();
		if( !empty($resultat) ){
			$listOfErrors[]=13;
			$error = true;
		}
	}

    echo $error;

	if(!$error){

		echo "okey 1";
		//Je vais rediriger l'utilisateur vers index
		$Mdp = password_hash($_POST["Mdp"], PASSWORD_DEFAULT);

		//Préparer une requête
		$query = $db->prepare(
			"INSERT INTO joueur (Pseudo, Email, Mdp, Date_naissance) VALUES (:Pseudo,:Email,:Mdp,:Date_naissance);"
			);

		//Executer la requête
		$query->execute([
				"Pseudo"=>$_POST["Pseudo"],
				"Email"=>$_POST["Email"],
				"Mdp"=>$Mdp,
				"Date_naissance"=>$_POST["Date_naissance"]
			]);


		header("Location: index.php");
		
	}else{
		//Sinon je vais rediriger l'utilisateur vers createUser
		//Array ( 1,2,3,4,6 )
		$_SESSION['error_form'] = implode(',', $listOfErrors);
		$_SESSION['data_form'] = $_POST;

		header('Location: createUser.php');
		exit();
	}

}else{

	die("Bien essayé !!!");

}




