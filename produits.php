<?php 
include 'fonctions.php';

//echo creer_insert("personne",array('nom'=>'med','salaire'=>8000,'age'=>10	));
//echo creer_insert("produit",$_POST);

$adresse=connecter_db();
extract($_POST);
extract($_GET);

$message="";
// $nom ;   //<=>$_POST['nom']	
if(isset($prix) && isset($nom)){
ajouter($nom,$prix);
$message="produit $nom est ajouté avec succès";
}


// s'il y ids dans le lien alors on supprime
if (isset($ids)) {
	supprimer($ids);
	$message="produit supprimé avec succès";
}
if (isset($idc)) {
	$produit=get_by_id($idc);
	$message="produit consulté avec succès";
}
$resultat=get_all();

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>crud</title>
</head>
<body >
	<h3><?php echo $message; ?></h3>
<form action="<?= basename(__FILE__);?>" method="post" >
	<table align="center" oncontextmenu="return false">
		<tr> 
			<td><label for="nom">Nom : </label></td>
			<td><input type="text" name="nom" id="nom" value="<?php if(isset($produit['nom']))echo $produit['nom']; ?>"></td>
		</tr>
		<tr> 
			<td><label for="prix">Prix : </label></td>
			<td><input type="text" name="prix" id="prix" value=""></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit"  value="valider"></td>
		</tr>
	</table>
</form>




<hr>


<table border="1" align="center" width="500">
	<tr>
		<td>id</td>
		<td>nom</td>
		<td>prix</td>
		<td>opérations</td>
	</tr>

<?php while($ligne=mysqli_fetch_assoc($resultat)) {?>
	<tr>
		<td><?php echo $ligne['id']; ?></td>
		<td><?php echo xss($ligne['nom']); ?></td>
		<td><?php echo $ligne['prix']; ?></td>
		<td><a href="<?= basename(__FILE__);?>?ids=<?php echo $ligne['id']; ?>"  onclick="return confirm('supprimer ?')">supprimer</a> <a href="<?= basename(__FILE__);?>?idc=<?php echo $ligne['id']; ?>">consulter</a></td>
	</tr>
<?php } ?>
</table>
&lt;p&gt;
</body>
</html>