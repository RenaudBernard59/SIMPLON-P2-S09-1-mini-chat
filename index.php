<!doctype html>
<html lang=fr>
<head>
	<meta charset=utf-8>
	<title>Le petit chat</title>
</head>
<body>
	<header><h1>Le petit chat</h1></header>
	<main>
<?php
if (isset($_POST['pseudo'])) {
/*====================================================================================
//==========SECTION1
Si le pseudo existe afficher Le chat [SECTION1]
//====================================================================================*/
?>
	<p>Bonjour <?php echo $_POST['pseudo'];  ?></p>
	<section>
<?php
while (i machin) {
	echo "<p>" . [SQL] . "</p>";

}
?>
	</section>
	<hr/>
	<section>
		<form action="cible.php" method="post">
			<label for="message">Votre message :</label>
			<textarea type="text" name="message" id="message"></textarea>			
			<br/>
			<input type="submit" value="Envoyer message" />
		</form>
	</section>
	</main>
	<footer><small>&copy; 2017 - Renaud BERNARD</small></footer>
</body>
</html>
<?php


} else  {
/*====================================================================================
//==========SECTION1
Si le pseudo n'existe pas afficher le formulaire d'inscription
//====================================================================================*/
?>
	<p>Entrez votre pseudo !</p>
	<section>
		<form action="index.php" method="post">
			<label for="pseudo">Votre pseudo :</label>
			<input type="text" name="pseudo" id="psudo" />
			<br/>
			<input type="submit" value="Envoyer message" />
		</form>
	</section>
	</main>
	<footer><small>&copy; 2017 - Renaud BERNARD</small></footer>
</body>
</html>
<?php
}//END Conditionnal


//====================================================================================
//==========SECTION3
//==============================:======================================================


?>


















