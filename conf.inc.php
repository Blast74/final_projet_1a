<?php

define("DB_DRIVER", "mysql");
define("DB_NAME", "zebrol");
define("DB_HOST", "localhost");
define("DB_PORT", 3306);
define("DB_USER", "root");
define("DB_PWD", "");


$listOfGender = [
					"m"=>"Homme",
					"w"=>"Femme",
					"o"=>"Autre"
				];


$listOfCountry = [
					"fr" => "France",
					"pl" => "Pologne",
					"po" => "Portugal",
					"es" => "Espagne"
				];

$msgError = [
	1=>"Votre pseudo doit faire entre 6 et 16 caractères",
	2=>"Votre email n'est pas correct",
	3=>"Votre mot de passe doit faire entre 8 et 16 caractères",
	4=>"Votre mot de passe de confirmation ne correspond pas",
	5=>"Le format de date n'est pas correct",
	6=>"Vous devez avoir entre 10 et 120 ans",
	7=>"Le genre n'est pas correct",
	8=>"Le pays n'est pas correct",
	9=>"Le commentaire doit faire moins de 255 caractères",
	10=>"veuillez accepter les CGUs",
	11=>"Captcha incorrect",
	12=>"Le pseudo existe déjà",
	13=>"L'email existe déjà"
];
