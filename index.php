<?php ////////////////////////////////////////PHP-STA///////////////////////////////////
//Connexion SGBD//////////////////////////////////////////////////////////////////////////////
try {
                $bdd = new PDO('mysql:host=localhost;dbname=tp-minichat', 'root', 'monmotdepasse');
} ///
catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
} //////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////
//Appel du contenu de la SGBD
$reponse = $bdd->query('SELECT utilisateurschat.nomutilisateur, messageschat.message, messageschat.heure
FROM messageschat, utilisateurschat
WHERE messageschat.ID_user = utilisateurschat.ID_user');

/*//////////////////////////////////////PHP-END/////////////////////////////////*/
?>
<!doctype html>
<html lang=fr>
<head>
        <meta charset=utf-8>
        <title>Le petit chat</title>
</head>
<body>
        <header><h1>Le petit chat</h1></header>
        <main>
<?php ////////////////////////////////////////PHP-STA///////////////////////////////////
//On vérifie le pseudo
if (isset($_POST['pseudo'])) {
                $pseudo = htmlspecialchars($_POST['pseudo']);
                /*
                -----Pseudo verifications script part1
                */
                /*====================================================================================
                //==========SECTION1
                Si le pseudo existe afficher Le chat [SECTION1]
                //====================================================================================*/
                ////////////////////////////////////////PHP-END/////////////////////////////////// 
?>
       <p>Bonjour <?php
                echo $pseudo;
?></p>
        <section>
                <?php
                while ($donnees = $reponse->fetch()) {
?>
                       <p><strong> <?php
                                echo $donnees['nomutilisateur'] . " | " . $donnees['heure'];
?></strong><br />
                        <?php
                                echo $donnees['message'];
?></p>
                <?php
                }
?>
       </section>
        <hr/>
        <p><?php
                if (isset($erreur)) {
                                echo $erreur;
                }
?></p>
        <section>
                <form action="chatmachine.php" method="post">
                        <label for="message">Votre message :</label>
                        <textarea type="text" name="message" id="message" required></textarea>            
                        <br/>

                        <input type="hidden" name="datetime" id="datetime" />                
                        <input type="hidden" name="pseudo" id="pseudo" value="<?php
                echo $pseudo;
?>" />                

                        <input type="submit" value="Envoyer message" />
                </form>
        </section>
<?php ////////////////////////////////////////PHP-STA///////////////////////////////////
} else {
                /*
                -----Pseudo verifications script part2
                */
                /*====================================================================================
                //==========SECTION2
                Si le pseudo n'existe pas afficher le formulaire d'inscription [SECTION2]
                //====================================================================================*/
                /*//////////////////////////////////////PHP-END/////////////////////////////////*/
?>
       <p>Entrez votre pseudo !</p>
        <section>
                <form action="index.php" method="post">
                        <label for="pseudo">Votre pseudo :</label>
                        <input type="text" name="pseudo" id="pseudo" required />
                        <br/>
                        <input type="submit" value="Envoyer message" />
                </form>
        </section>

<?php ////////////////////////////////////////PHP-STA///////////////////////////////////
} //END Pseudo verifications


//====================================================================================
//==========SECTION3
//==============================:======================================================


/*//////////////////////////////////////PHP-END/////////////////////////////////*/
?>
       </main>
        <footer><small>&copy; 2017 - Renaud BERNARD</small></footer>
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
                var setTime = js_yyyy_mm_dd_hh_mm_ss();
                var dateForm = document.getElementById("datetime");
                dateForm.setAttribute('value', setTime);
        </script>
</body>
</html>
















Download Formatting took: 238 ms
PHP Formatter made by Spark Labs  
Copyright Gerben van Veenendaal  
