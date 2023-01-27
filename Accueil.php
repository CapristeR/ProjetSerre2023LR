<?php
session_start();
$username = $_SESSION['username'];
echo    "<div class='titre'>
        <h1 class='centered-element'>Bonjour, " . $username ." !</h1>
        </div>";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Raleway:500,800" rel="stylesheet">
  <title>Votre Serre</title>
  
  <style>
@import url(//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);
@import url(https://fonts.googleapis.com/css?family=Titillium+Web:300);

  .titre {
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    bottom:250;
}
  
  
.r-link{
  display: var(--rLinkDisplay, inline-flex) !important;
}

.r-link[href]{
  color: var(--rLinkColor) !important;
  text-decoration: var(--rLinkTextDecoration, none) !important;
}

.r-list{
  padding-left: var(--rListPaddingLeft, 0) !important;
  margin-top: var(--rListMarginTop, 0) !important;
  list-style: var(--rListListStyle, none) !important;
}

.menu{
  --rLinkColor: var(--menuLinkColor, currentColor);
}

.menu__link{
  display: var(--menuLinkDisplay, block);
}

.menu__link:focus{
  outline: var(--menuLinkOutlineWidth, 2px) solid var(--menuLinkOutlineColor, currentColor);
  outline-offset: var(--menuLinkOutlineOffset);
}

.menu:hover .menu__link:not(:hover){
  --rLinkColor: var(--menuLinkColorUnactive, rgba(22, 22, 22, .35));
}

.menu{
  background-color: var(--menuBackgroundColor, #f0f0f0);
  box-shadow: var(--menuBoxShadow, 0 1px 3px 0 rgba(0, 0, 0, .12), 0 1px 2px 0 rgba(0, 0, 0, .24));
}

.menu__list{
  display: flex;  
}

.menu__link{
  padding: var(--menuLinkPadding, 1.5rem 2.5rem);
  font-weight: 700;
  text-transform: uppercase;
}

.text-underlined{
  position: relative;
  overflow: hidden;

  will-change: color;
  transition: color .25s ease-out;  
}

.text-underlined::before, 
.text-underlined::after{
  content: "";
  width: 0;
  height: 3px;
  background-color: var(--textUnderlinedLineColor, currentColor);

  will-change: width;
  transition: width .1s ease-out;

  position: absolute;
  bottom: 0;
}

.text-underlined::before{
  left: 50%;
  transform: translateX(-50%); 
}

.text-underlined::after{
  right: 50%;
  transform: translateX(50%); 
}

.text-underlined:hover::before, 
.text-underlined:hover::after{
  width: 100%;
  transition-duration: .2s;
}

.page__custom-settings{
  --menuBackgroundColor: rgb(27, 48, 34);
  --menuLinkColor: #fff;
  --menuLinkColorUnactive: rgb( 174, 247, 142);
  --menuLinkOutlineOffset: -.5rem; 
}

body{
  font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Open Sans, Ubuntu, Fira Sans, Helvetica Neue, sans-serif;
  margin: 0;
  min-height: 100vh;
  display: flex;  
  flex-direction: column;
  justify-content: center;
  align-items: center;
  background: linear-gradient(to bottom, #f9fd50, #00bd56);
}

.page{
  box-sizing: border-box;
  max-width: 640px;
  padding-left: .75rem;
  padding-right: .75rem;
}

.page__menu:nth-child(n+2){
  margin-top: 3rem;
}


.substack{
  border:1px solid #EEE; 
  background-color: #fff;
  width: 100%;
  max-width: 480px;
  height: 280px;
}

.linktr{
  display: flex;
  justify-content: flex-end;
  padding: 2rem;
  text-align: center;
}

.linktr__goal{
  background-color: rgb(27, 48, 34);
  color: rgb(8, 49, 112);
  box-shadow: rgb(8 49 112 / 24%) 0px 2px 8px 0px;
  border-radius: 2rem;
  padding: .75rem 1.5rem;
}

.r-link{
    --uirLinkDisplay: var(--rLinkDisplay, inline-flex);
    --uirLinkTextColor: var(--rLinkTextColor);
    --uirLinkTextDecoration: var(--rLinkTextDecoration, none);

    display: var(--uirLinkDisplay) !important;
    color: var(--uirLinkTextColor) !important;
    text-decoration: var(--uirLinkTextDecoration) !important;
}</style>
    <!-- MENU --> 
    <div class="page" style="position:absolute; top:50px;">
    <nav class="page__menu page__custom-settings menu">
    <ul class="menu__list r-list">
      <li class="menu__group"><a href="#0" onclick="window.location.href = 'Accueil.php';" class="menu__link r-link text-underlined">Accueil</a></li>
      <li class="menu__group"><a href="#0" onclick="window.location.href = 'courbes.php';" class="menu__link r-link text-underlined">Courbes</a></li>
      <li class="menu__group"><a href="#0" onclick="window.location.href = 'index.php';" class="menu__link r-link text-underlined">Déconnexion</a></li>
    </ul>
  </nav>
  </div>
  <!--FIN MENU -->
  </head>
 <body>
   <!--PAGE-->
    <div class="infos">
        <?php   
	        $MYSQL['host'] = "localhost";
	        $MYSQL['user'] = "id20161381_lj";
	        $MYSQL['password'] = "LJserre2023$";
	        $MYSQL['database'] = "id20161381_serre2023lr";

	        $mysqli = mysqli_connect($MYSQL['host'],$MYSQL['user'],$MYSQL['password'],$MYSQL['database']);
	        
	        $resulttemp = $mysqli->query("SELECT temperature FROM Mesures WHERE id_capteur = MAX");
            $resulthum = $mysqli->query("SELECT humidity FROM Mesures WHERE id_capteur = MAX");
            
            echo "<a>La température est de : ". $resulttemp ." et l'humidité de : ". $resulthum ."</a>";
            
            $sql = "SELECT temperature FROM Mesures WHERE id_capteur = MAX";
            $result = mysqli_query($mysqli, $sql);
        ?>
    </div>
 
 </body>
</html>

