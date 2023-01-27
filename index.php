<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Serre 2023</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styleindex.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<label for="chk" aria-hidden="true">Serre 2023</label>
					<input type="text" name="username" placeholder="Nom Utilisateur" required="">
					
					<input type="email" name="email" placeholder="Email" required="@">
					
					<input type="password" name="motdepasse" placeholder="Mot de passe" required="">
					
					<button type="submit" name="submit" >Créer un compte</button>
					
					<button class="compte" onclick="window.location.href='connexion.php'">J'ai déjà un Compte</button>
					
					<p id='hidden' style='display : none;' >L'adresse Email saise existe déjà !</p>
				</form>
			</div>
	</div>
</body>
</html>

<!--onclick="window.location.href = 'Accueil.php';"-->

<?php
    // Connexion à la base de données
    $conn = new mysqli("localhost", "id20161381_lj", "LJserre2023$", "id20161381_serre2023lr");
    if ($conn->connect_error) {
        die("Connexion échouée !" . $conn->connect_error);
    }

	//Bouton CREER UN COMPTE
	if(isset($_POST['submit'])) {

    // Récupération des données à partir d'un formulaire
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['motdepasse'];
    
    // Vérifie si les valeurs entrées existent déjà dans la base de données
    $sql = "SELECT * FROM Connexions WHERE username='$name' AND email='$email' AND mdp='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {  //Les valeurs rentrées existent déjà dans la base de données !
        echo '<script>document.getElementById("hidden").style.display = "block";</script>';
    } 
    else {
    //Saisie différente de BDD --> Execution de la suite
    // Préparation de la requête
    $sql = "INSERT INTO Connexions (username, email, mdp)
    VALUES ('$name', '$email', '$password')";
    }
    // Exécution de la requête
    if ($conn->query($sql) === TRUE) {
      echo '<meta http-equiv="refresh" content="1;url=connexion.php"/>';
    }
}
?>