<?php
try
{
	$bdd = new PDO ('mysql:host=localhost;dbname=tp-minichat', 'root', 'monmotdepasse');
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}



?>
<!doctype html>
<html lang=fr>
<head>
	<meta charset=utf-8>
	<title>Le petit chat</title>
	<script>

		function js_yyyy_mm_dd_hh_mm_ss() {
		  now = new Date();
		  year = "" + now.getFullYear();
		  month = "" + (now.getMonth() + 1); if (month.length == 1) { month = "0" + month; }
		  day = "" + now.getDate(); if (day.length == 1) { day = "0" + day; }
		  hour = "" + now.getHours(); if (hour.length == 1) { hour = "0" + hour; }
		  minute = "" + now.getMinutes(); if (minute.length == 1) { minute = "0" + minute; }
		  second = "" + now.getSeconds(); if (second.length == 1) { second = "0" + second; }
		  return year + "-" + month + "-" + day + " " + hour + ":" + minute + ":" + second;
		}

		document.getElementById("datetime").value = js_yyyy_mm_dd_hh_mm_ss();

	</script>
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

$chatMessages = $bdd->query(SELECT utilisateurschat.nomutilisateur, messageschat.message, messageschat.heure
FROM messageschat, utilisateurschat 
WHERE messageschat.ID_user = utilisateurschat.ID_user);

while ($donnees = $reponse->fetch()) {
	echo "<p><strong>" . $donnees['pseudo'] . " | " . $donnees['heure'] . "</strong><br /> " . $donnees['message'] . "</p>";



	/*
	Requette SQL pour tout enregistrer
	[SELECT utilisateurschat.nomutilisateur, messageschat.message FROM messageschat, utilisateurschat WHERE messageschat.ID_user = utilisateurschat.ID_user ]


	*/
}
?>
	</section>
	<hr/>
	<section>
		<form action="cible.php" method="post">
			<label for="message">Votre message :</label>
			<textarea type="text" name="message" id="message required"></textarea>			
			<br/>

			<input type="hidden " id="datetime" value="yyyy_mm_dd_hh_mm_ss()" />				

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
			<input type="text" name="pseudo" id="psudo" required />
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


















