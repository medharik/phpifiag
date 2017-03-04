
<?php

//crud
function connecter_db()
{
$adresse=mysqli_connect("localhost", "root", "", "db") or die("erreur de connexion au serveur / bd");
return $adresse;
}

function ajouter($nom="",$prix=0)
{$adresse=connecter_db();

	//requete
$sql=sprintf("insert into produit(prix,nom) values('%f','%s') ",(double)$prix,e($nom));
	//executer
//echo $sql;
mysqli_query($adresse, $sql) or die("Erreur d'ajout "+mysqli_error($adresse));
}

function supprimer($id)
{
	$adresse=connecter_db();
	//requete
$sql=sprintf("delete from produit where id=%d ",$id);
	//executer

mysqli_query($adresse, $sql);
}

function modifier($id,$new_nom,$new_prix)
{
	//requete
$sql=sprintf("update produit set

 nom='%s', 
 prix=%f 
where id=%d

 ",$nom,$prix,$id);
	//executer

mysqli_query($adresse, $sql);
}



function get_all()
{$adresse=connecter_db();
	//requete
$sql=sprintf("select * from produit order by id asc");
	//executer

$resultat=mysqli_query($adresse, $sql);
return $resultat;
}


function get_by_id($id)
{$adresse=connecter_db();
	//requete
$sql=sprintf("select * from produit where id=%d",intval($id));
	//executer

$resultat=mysqli_query($adresse, $sql);
$ligne=mysqli_fetch_assoc($resultat);
return $ligne;
}

function e($valeur)
{
	$adresse=connecter_db();	
	return mysqli_real_escape_string($adresse, $valeur);
}
function xss($value)
{
	return strip_tags($value);
}

function creer_insert($table='produit',$data=array('nom'=>'hp','prix'=>5000)){
$keys=array();
$values=array();
foreach ($data as $key => $value) {
	$keys[]=$key;//array_push
	if(!is_numeric($value))
$values[]="'".$value."'";
else
$values[]=$value;

}
$chainecle=implode(',', $keys);
$chainevaleur=implode(',', $values);

$insert="insert into $table ($chainecle) values ($chainevaleur)";
return $insert;
}
 ?>
