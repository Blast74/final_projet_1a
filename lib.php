<?php
require_once "conf.inc.php";

function helloWorld(){
	echo "Hello World !<br>";
}

function helloYou($surname, $name = "Dupont"){
	global $age;
	echo "Bonjour ". cleanWord($surname) ." ".cleanWord($name, true)."<br>";
	echo "Vous avez ".$age."ans<br>";
}

function cleanWord($word, $allUpper=false){
	mb_internal_encoding("UTF-8");

	$word = trim($word);

	if( $allUpper ){
		$word = str_replace(
							["é","è","à"], 
							["e","e","a"], 
							$word);

		$word = strtoupper($word);

	}else{
		//on prend le premier caractère du mot 
		//dans une variable (substr)
		$firstChar = mb_substr($word, 0, 1);
		//On remplace les caractères spéciaux dans
		//cette variable (str_replace)
		$firstChar = str_replace(
							["é","è","à"], 
							["e","e","a"], 
							$firstChar);

		//on remplace le premier caractère du mot
		//par le nouveau caractère 
		//(substr + concaténation)
		$word = $firstChar.mb_substr($word, 1);

		$word = strtolower($word);
		$word = ucfirst($word);
	}

	return $word;
}



function dbConnect(){
	//Se connecter a la bdd
	try{

		$db = new PDO(
			DB_DRIVER.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT ,
			DB_USER , 
			DB_PWD);

	}catch(Exception $e){
		die("Erreur SQL " .$e->getMessage());
	}

	return $db;
}








