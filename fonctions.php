<?php 
function connecter_db()
{
$adresse=mysqli_connect("localhost", "root", "", "db") or die("erreur de connexion au serveur / bd");
return $adresse;
}

function ajouter($nom="",$prix=0)
{
	//connexion db
$adresse=connecter_db();
	//requete
$sql=sprintf("insert into produit(prix,nom) values('%f','%s') ",$prix,$nom);
	//executer

mysqli_query($adresse, query);
}



 ?>