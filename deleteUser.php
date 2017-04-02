<?php

echo $_GET;

require "lib.php";

$db = dbConnect();
$query = $db->prepare("UPDATE joueur SET Etat='d' WHERE id_user =:id ;");
$query->execute($_GET);

header("Location: index.php");

