<?php
//Connexion SGBD//////////////////////////////////////////////////////////////////////////////
try {
                $bdd = new PDO('mysql:host=localhost;dbname=tp-minichat', 'root', 'monmotdepasse');
} ///
catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
} //////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////

//Récupération des variables/fonctions
$erreur  = "";
$pseudo  = htmlspecialchars($_POST['pseudo']);
$message = htmlspecialchars($_POST['message']);
$date    = htmlspecialchars($_POST['datetime']);
function newUser($pseudo)
{
                $req = $bdd->prepare('INSERT INTO utilisateurschat(nomutilisateur) VALUES(:pseudo)');
                $req->execute(array(
                                'pseudo' => $pseudo
                ));
} //END newUser

function addMessage($pseudo, $message, $date)
{
                $req = $bdd->prepare('INSERT INTO messageschat(ID_user, message, heure) VALUES( (SELECT ID_user FROM utilisateurschat WHERE nomutilisateur=:pseudo), :message, :date)');
                $req->execute(array(
                                'pseudo' => $pseudo,
                                'message' => $message,
                                'date' => $date
                ));
} //END addUser

//Vérification du formulaire
if (!empty($_POST['pseudo']) AND !empty($_POST['message']) AND !empty($_POST['datetime'])) {
                /*
                -----Form verifications script part1
                */
                //Il n'y a pas de données nulles
                $pseudolength = strlen($pseudo);
                if ($pseudolength <= 100) {
                                /*
                                -----pseudolength script part1
                                */
                                //Rechercher si le pseudo existe
                                $reqpseudo = $bdd->prepare("SELECT utilisateurschat.nomutilisateur FROM utilisateurschat WHERE nomutilisateur = ?");
                                $reqpseudo->execute(array(
                                                $pseudo
                                ));
                                $pseudoexist = $reqpseudo->rowcount();
                                if ($pseudoexist == 0) {
                                                /*
                                                -----pseudoexist script part1
                                                */
                                                // Le pseudo n'existe pas > on en crée un.
                                                /////////////SCRIPT:::::::::::::::::
                                                echo $pseudo . " | " . $pseudoexist . " | " . $date . " | " . $message;
                                } else {
                                                /*
                                                -----pseudoexist script part2
                                                */
                                                // Le pseudo existe > on l'utilise + pas de nouvelle entrée.
                                                /////////////SCRIPT:::::::::::::::::
                                                echo $pseudo . " | " . $pseudoexist . " | " . $date . " | " . $message;
                                } //END pseudoexistden
                } else {
                                /*
                                -----pseudolength script part2
                                */
                                
                                $erreur = $erreur . " | Too long pseudo | ";
                } // END pseudolength
                
} else {
                /*
                -----Form verifications script part2
                */
                
                if (empty($_POST['pseudo'])) {
                                $erreur = $erreur . " | empty(pseudo)| ";
                } ////
                if (empty($_POST['message'])) {
                                $erreur = $erreur . " | empty(message) | ";
                } ////
                if ($_POST['datetime']) {
                                $erreur = $erreur . " | empty(date) | ";
                } ////
} // END Form verifications





//Return index
header('Location:index.php');

///////////////////////////////////////////////////////////////////////////////////
