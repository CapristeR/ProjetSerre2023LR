<?php    session_start();

	if(isset($_POST['submitlog'])) {
		$username = ($_POST['username']);
		$motdepasse = ($_POST['motdepasse']);
		
    // Connexion à la base de données
    $conn = new mysqli("localhost", "id20161381_lj", "LJserre2023$", "id20161381_serre2023lr");
    if ($conn->connect_error) {
        die("Connexion échouée !" . $conn->connect_error);
    }

		$query = "SELECT * FROM Connexions WHERE username='$username' AND mdp='$motdepasse'";
        $result = mysqli_query($conn, $query);
            
            if (mysqli_num_rows($result) > 0) {  //Les valeurs rentrées existent déjà dans la base de données !
			  $_SESSION['username'] = $username;
			  header("Location: Accueil.php");
			  exit();
            } 
			 else {
                $_SESSION['error'] = "Saise Incorrect !";
                header("Location: connexion.php");
                exit();
		   }
	 }?>


<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Serre 2023</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">

<style>
    body{
	margin: 0;
	padding: 0;
	display: flex;
	justify-content: center;
	align-items: center;
	min-height: 100vh;
	font-family: 'Jost', sans-serif;
	background: linear-gradient(to bottom, #1b3022, #378248, #aef78e);
}

.main{
	width: 350px;
	height: 500px;
	background: #378248;
	overflow: hidden;
	border-radius: 10px;
	box-shadow: 5px 20px 50px #000;
}
#chk{
	display: none;
}
.login{
	position: relative;
	width:100%;
	height: 100%;
}
label{
	color: #1b3022;
	font-size: 2.3em;
	justify-content: center;
	display: flex;
	margin: 60px;
	margin-top: 10px;
	font-weight: bold;
	transition: .5s ease-in-out;
}
input{
	width: 60%;
	height: 20px;
	background: #e0dede;
	justify-content: center;
	display: flex;
	margin: 20px auto;
	padding: 10px;
	border: none;
	outline: none;
	border-radius: 5px;
}
button{
	width: 60%;
	height: 40px;
	margin: 10px auto;
	justify-content: center;
	display: block;
	color: #1b3022;
	background: rgb(238,229,233);
	font-size: 1em;
	font-weight: bold;
	margin-top: 20px;
	outline: none;
	border: none;
	border-radius: 5px;
	transition: .2s ease-in;
	cursor: pointer;
}
button:hover{
	background: #aef78e;
}
.login{
	height: 470px;
	background: #378248;
}
.login label{
	color: #1b3022;
}

.compte{
    background: #aef78e;
    width: 50%;
	height: 35px;
}

.compte:hover{
	background: rgb(238,229,233);
}

p {
    color: red; 
    text-align: center; 
    margin: 0 auto;
}
</style>
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">
			<div class="login">
				<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<label for="chk" aria-hidden="true">Se connecter</label>
					<input type="text" name="username" placeholder="Nom Utilisateur" required="">
					<input type="password" name="motdepasse" placeholder="Mot de passe" required="">
                    <button type="submit" name="submitlog" >Se Connecter</button>
                    <button class="compte" onclick="window.location.href='index.php'">Je n'ai pas de Compte</button>
                        <?php if(isset($_SESSION['error'])): ?>
                        <p><?= $_SESSION['error'] ?></p>
                        <?php unset($_SESSION['error']) ?>
                        <?php endif; ?>
				</form>
			</div>
	</div>
</body>
</html>