<?php
	session_start();
	if(isset($_GET['deco']))
  {
    session_destroy();
    header("Location: index.php");
  } 
class tabcarte
{
  public $nbfam;//nombre de famille de carte a retrouver
  private $nbcar;//nb total de carte
  private $tabcar;//le tab
  private $tabcopie;//copie du tab d'avant que le premier coup soit jouer
  private $nbtour=0;// quel tour
  public $nbtentative=0;//nb de tentative
  private $stock;// carte retenu pour deuxieme tour
  public  $refresh=false;//var reactualisation
  private $cartrouve=0;
  public $temp; //retient le temp unix du debut de partie
 function __construct($nb)
    {
    	if($nb>12)
    	{
    		$nb=12;
    	}
    	if($nb<3)
    	{
    		$nb=3;
    	}
        $this->nbfam = $nb;//nombre de famille de carte a retrouver
        $this->nbcar = $nb*2;//nb total de carte //crée un tab random chiffre
        $arr=array();
		for($i=0; $i < $this->nbfam ; $i++) 
		{
			$arr[$i] = $i; 
		}
		$arr = array_merge($arr,$arr);
		shuffle($arr);
		$this->arr=$arr; //affichage du tableau       
        $t="<section>";
        	for ($j=0; $j < $nb*2 ; $j++)
        	{	$ch=$j;
        		
        		$t=$t."<div class=\"div-carte noturn\" ><a href=\"index.php?jouer=$ch\"><img src=\"img/retourner.png\"></a></div>";//   trouver un moyen de remplire aléatoirment le tab,utiliser un  compteur 
        	}        	
        $t=$t."</section>";
        $this->tabcar=$t;
        $_SESSION['gamestrart']=true;
        $this->temp = time();
    }
  public function afficher()
  {
    echo $this->tabcar;// afficher le tab 
  }
  public function jouer($coup)
  {	
  	if($this->nbtour%2==0)
  	{
  		$this->stock=$coup;//modifier tabcar //crée une variable de copy du dernier tab $tabcopie
  		$this->tabcopie=$this->tabcar; //quand carte retourer ne pas pouvoir jouer (sup lien )
  		$cherche = "<div class=\"div-carte noturn\" ><a href=\"index.php?jouer=$coup\"><img src=\"img/retourner.png\"></a></div>";
		  $remplace ="<div class=\"div-carte turn\" ><img src=\"img/".$this->arr[$coup].".png\"></div>";
		  $this->tabcar = str_replace($cherche,$remplace,$this->tabcar);
      //mise a jour corec bug
      header("Location: index.php");
 
  		
  	}
  	else
  	{	
  		
  	$cherche = "<div class=\"div-carte noturn\" ><a href=\"index.php?jouer=$coup\"><img src=\"img/retourner.png\"></a></div>";
		$remplace ="<div class=\"div-carte turn\" ><img src=\"img/".$this->arr[$coup].".png\"></div>";
		$this->tabcar = str_replace($cherche,$remplace,$this->tabcar);
  		if ($this->arr[$this->stock]==$this->arr[$coup]) 
  		{
  			 $this->cartrouve++;
          //mise a jour corec bug
         header("Location: index.php");
  		}
  		else
  		{
  			$this->nbtentative++;		
        header('Location: index.php?chrono=t');//annuler les changement
  			
  		}  	//comparaison et modification du tableau
  	}
  	$this->nbtour++;

  	//afficher le coup (trouver un moyen de modiffier le table tabcar ) foreach //tour doit etres un tab qui indique si 1er ou deuxieme coup si deuxiem coup valeur du premeir coup 	//empecher de piocher deux fois de suitte la meme carte
  }
  public function tabprecedent()
  {
  	$this->tabcar=$this->tabcopie;
  }
  public function win()
  {
    if($this->cartrouve==$this->nbfam)
    {
      $score['tentative']=$this->nbtentative;
      $score['niv']=$this->nbfam;
      $tempwin=time();
      $score['temps']=$tempwin-$this->temp;
      $_SESSION['score']=$score;
      
      $_SESSION['temps']= $score['temps']=$tempwin-$this->temp; //chrono
      $_SESSION['level']=$score['niv']=$this->nbfam; // level
      $_SESSION['nb_tentative']=$score['tentative']=$this->nbtentative; // nb-tentative

      if($_SESSION['level']==3 or $_SESSION['level']==4){
        $_SESSION['level']=1;
      }
      if($_SESSION['level']==5 or $_SESSION['level']==6){
        $_SESSION['level']=2;
      }
      if($_SESSION['level']==7 or $_SESSION['level']==8){
        $_SESSION['level']=3;
      }
      if($_SESSION['level']==9 or $_SESSION['level']==10){
        $_SESSION['level']=4;
      }
      if($_SESSION['level']==11 or $_SESSION['level']==12){
        $_SESSION['level']=5;
      }
      
      echo 'DEFI  = '.$_SESSION['defi'].'<br/>';
      echo 'Level = '.$_SESSION['level'].'<br/>';


      if($_SESSION['temps']!=0 and $_SESSION['nb_tentative']!=0){

        // CALCUL TOTAL POINTS DEFI CHRONO
          $pointstime=(1/$_SESSION['temps'])*10*$_SESSION['level'];
          $_SESSION['pointstime']=$pointstime;
    
    
          // CALCUL TOTAL POINTS DEFI SANS FAUTE
          $pointstentative=(1/$_SESSION['nb_tentative'])*10*$_SESSION['level'];
          $_SESSION['pointstentative']=$pointstentative;

          $connexion=mysqli_connect('localhost',"root","","memory");
          $requete0="SELECT id FROM utilisateurs WHERE login='".$_SESSION['login']."'";
          $query0=mysqli_query($connexion,$requete0);
          $resultat0=mysqli_fetch_all($query0);

          date_default_timezone_set('Europe/Paris');

          echo 'date = '.date('Y-m-d H:i:s').'<br/>';
          
          $_SESSION['date']=date('Y-m-d H:i:s');
          // echo ($requete0).'<br/>';
          // echo 'Id = '.$resultat0[0][0].'<br/>';
          $_SESSION['id_utilisateur']=$resultat0[0][0];

    
          if($_SESSION['defi']=='Chrono' and isset($_SESSION['login'])){

            $_SESSION['pointstime']= number_format($_SESSION['pointstime'],1);
            ceil($_SESSION['pointstime']);

            $requete="INSERT INTO besttime (login,temps,points,level,defi,id_utilisateur,date) VALUES ('".$_SESSION['login']."','".$_SESSION['temps']."','".$_SESSION['pointstime']."','".$_SESSION['level']."','".$_SESSION['defi']."','".$_SESSION['id_utilisateur']."','".$_SESSION['date']."') ";
            $query=mysqli_query($connexion,$requete);
            echo ($requete).'<br/>'; 
          }

          if($_SESSION['defi']=='Sans faute' and isset($_SESSION['login'])){

            $_SESSION['pointstentative']= number_format($_SESSION['pointstentative'],1);
            ceil($_SESSION['pointstentative']);

            $connexion=mysqli_connect('localhost',"root","","memory");
            $requete1="INSERT INTO besttentative (login,nb_tentative,points,level,defi,id_utilisateur,date) VALUES ('".$_SESSION['login']."','".$_SESSION['nb_tentative']."','".$_SESSION['pointstentative']."','".$_SESSION['level']."','".$_SESSION['defi']."','".$_SESSION['id_utilisateur']."','".$_SESSION['date']."') ";
            $query1=mysqli_query($connexion,$requete1);
            // echo ($requete1).'<br/>';
  
          }
        }
        else{
          $_SESSION['temps']=1;
          $_SESSION['nb_tentative']=1;
        }

      ?> 
      <h1 id="win">Winner</h1> 
      <a href="partage.php">Partager mon score</a>
      <p><?=$score['temps']; if($_SESSION['nb_tentative']==0){echo '<br/>';echo 'Félicitation !!! Vous avez fait un sans faute '.ucfirst($_SESSION['login']).' !!'.'<br/>';} ?> secondes</p>            <!--  /* VARIABLE TEMPS A RECUPERER POUR WALL OF FAME*/k ****************************************** -->
      <?php  //lancé ajout score, nouvelle partie
      
      echo 'Votre temps est de '.$_SESSION['temps'].' secondes !<br/>'; 
      echo 'Nombre de coups : '.$_SESSION['nb_tentative'].' !'.'<br/>';
      if($_SESSION['defi']=='Chrono'){
        echo 'Vous gagné '.$_SESSION['pointstime'].' pts <br/>';
      }
      else{
        echo 'Vous gagné '.$_SESSION['pointstentative'].' pts <br/>';

      }
    }
  }
}
		       
/*
	crée un tableau aléatoir qui sert de bd
	afficher un tab qui sert uniqument a cliquer
	trouver un moyen de les comparer
	retourner carte {si premier carte->tirer deuxieme; si deuxieme carte->(si juste ->laisser carte tourné ,si faux -> chrono + reactalisation des 2 cartes)}
*/
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php
		if(isset($_GET['chrono'])) //refresh la page toute les 1s
		{    
			?>
				<meta http-equiv="refresh" content="1 ;URL=index.php">
			<?php 
		} 
	?>
</head>
<body>


<?php 

include('header.php');

if(isset($_SESSION['gamestrart']))
{
	if(isset($_GET['jouer']))
	{
		$_SESSION['jeu']->jouer($_GET['jouer']);
	}
	$_SESSION['jeu']->afficher();//affiche nb fammille a trouver et nb carte total
  $_SESSION['jeu']->win();
  ?><p> Nombre d'erreur : <?php echo $_SESSION['jeu']->nbtentative; $_SESSION['nb_tentative']=$_SESSION['jeu']->nbtentative;
  if($_SESSION['nb_tentative']=0){echo 'Félicitation '.$_SESSION['login'].', vous avez réussi à faire un sans faute !!'.'<br/>';}
  ?></p>     <!-- VARIABLE NOMBRE DE TENTATIVE A RECUPERER POUR AFFICHAGE WALL OF FAME ******************************************* -->
  <a href="index.php?end=true">Ressayer</a>
  <a href="index.php?chang=true">Changer difficulter/mode de jeu</a>

  <?php
}
else
{
    //formulaire de lancement avec choix et if du post
  ?>
  <form method="post" action="index.php">
    <label>Mode de jeu</label>
    <select name="defi" id="">
        <option type="text" name="time">Chrono<br>
        <option type="text" name="tentative">Sans faute<br>
    </select><br>
    <label>Nombre de carte</label>
    <input type="number"  name="niv" placeholder="3" step="1" min="3" max="12" ><br>
    <input type="submit" name="envniv" value="jouer">
  </form>
  <?php
  if(isset($_POST['envniv']))
  {
    $_SESSION['jeu']= new tabcarte($_POST['niv']);
    header("Location: index.php");
  }
    
}
if(isset($_POST['defi'])=='time'){
    $_SESSION['defi']=$_POST['defi'];
}

if(isset($_POST['defi'])=='tentative'){
  $_SESSION['defi']=$_POST['defi'];
}



	
?>

</body>
</html>
<?php
if(isset($_GET['chrono']))
    {    
      $_SESSION['jeu']->tabprecedent();
    }
if(isset($_GET['end']))
  {
    $niv=$_SESSION['jeu']->nbfam;
    unset($_SESSION['jeu']);
    $_SESSION['jeu']= new tabcarte($niv);
    header("Location: index.php");
  }
if(isset($_GET['chang']))
  {
    unset($_SESSION['gamestrart']);
    header("Location: index.php");
  }  

?>


<style type="text/css">
  section
  {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    height: 70vh;
    align-items: center;
  }
  .div-carte
  {
    border-radius: 10%;
    margin: 1%;
    width: 10%;
    height: 30%;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color:#ce8484;
    box-shadow: 3px 3px 20px #6a4040;
    transition: transform;
    transition-duration: 0.8s;

  }
  .noturn:hover
  {
    transform:  rotateX(-65deg) rotateY(-47deg) rotateZ(-22deg) scale(1.1);
  }
  .turn:hover
  {
    transform: scale(1.1);
  }
  img
  {
    width: 80%;
    margin: auto;
  }
  a
  {
    align-items: center;
    display: flex;
    width: 80%;
  }
</style>