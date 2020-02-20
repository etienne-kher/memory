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
  public $lvl;//niveau
  private $nbcar;//nb total de carte
  private $tabcar;//le tab
  private $tabcopie;//copie du tab d'avant que le premier coup soit jouer
  private $nbtour=0;// quel tour
  public $nbtentative=0;//nb de tentative
  private $stock;// carte retenu pour deuxieme tour
  public  $refresh=false;//var reactualisation
  private $cartrouve=0;
  public $temp; //retient le temp unix du debut de partie
   public $scorefinal;
  public $point="p"; //nb de point à la fin
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

        $t="<section class=\"jeu\">";
        	for ($j=0; $j < $nb*2 ; $j++)
        	{	$ch=$j;
        		
        		$t=$t."<div class=\"div-carte noturn\" ><a href=\"index.php?jouer=$ch\"><img src=\"img/retourner.png\"></a></div>";//   trouver un moyen de remplire aléatoirment le tab,utiliser un  compteur 
        	}        	
        $t=$t."</section>";
        $this->tabcar=$t;


      if($this->nbfam==3 or $this->nbfam==4)
      {
        $this->lvl=1;
      }
      if($this->nbfam==5 or $this->nbfam==6)
      {
        $this->lvl=2;
      }
      if($this->nbfam==7 or $this->nbfam==8)
      {
        $this->lvl=3;
      }
      if($this->nbfam==9 or $this->nbfam==10)
      {
        $this->lvl=4;
      }
      if($this->nbfam==11 or $this->nbfam==12)
      {
        $this->lvl=5;
      }
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


    if($this->point=="p")
    {	



      $score['tentative']=$this->nbtentative;
      $score['niv']=$this->nbfam;
      $tempwin=time();
      $score['temps']=$tempwin-$this->temp;
      $this->scorefinal=$score;
      //ajout amine
      
     /* if($this->scorefinal['temps']!=0 and $this->scorefinal['tentative']!=0)
      {*/
          $connexion=mysqli_connect('localhost',"root","","memory");
          $requete0="SELECT id FROM utilisateurs WHERE login='".$_SESSION['login']."'";
          $query0=mysqli_query($connexion,$requete0);
          $resultat0=mysqli_fetch_all($query0);

          date_default_timezone_set('Europe/Paris');

         // echo 'Le '.date('d-m-Y \à H:i:s').'<br/>';
          
          $d=date('Y-m-d H:i:s');
          // echo ($requete0).'<br/>';
          // echo 'Id = '.$resultat0[0][0].'<br/>';
          $_SESSION['id_utilisateur']=$resultat0[0][0];

    
          if($_SESSION['defi']=='Chrono' and isset($_SESSION['login']))
          {
           // CALCUL TOTAL POINTS DEFI CHRONO
          $pointstime=(1/$this->scorefinal['temps'])*10*$this->lvl;
 			// $_SESSION['pointstime']=$pointstime;
            $pointstime= number_format($pointstime,1);
            ceil($pointstime);
            $this->point=$pointstime;

            $requete="INSERT INTO besttime (login,temps,points,level,defi,id_utilisateur,date) VALUES ('".$_SESSION['login']."','".$this->scorefinal['temps']."','".$pointstime."','".$this->lvl."','".$_SESSION['defi']."','".$_SESSION['id_utilisateur']."','".$d."') ";
            $query=mysqli_query($connexion,$requete);
            // echo ($requete).'<br/>'; 
            
          }

          if($_SESSION['defi']=='Sans faute' and isset($_SESSION['login']))
          {
			// CALCUL TOTAL POINTS DEFI SANS FAUTE
            if($this->scorefinal['tentative']==0)
            {
              $this->scorefinal['tentative']=1/$this->lvl;
            }

      
          	$pointstentative=(1/$this->scorefinal['tentative'])*10*$this->lvl;
         	  $_SESSION['pointstentative']=$pointstentative;
            $pointstentative= number_format($pointstentative,1);
            ceil($pointstentative);
            $this->point=$pointstentative;

            $connexion=mysqli_connect('localhost',"root","","memory");
            $requete1="INSERT INTO besttentative (login,nb_tentative,points,level,defi,id_utilisateur,date) VALUES ('".$_SESSION['login']."','".$this->scorefinal['tentative']."','".$pointstentative."','".$this->lvl."','".$_SESSION['defi']."','".$_SESSION['id_utilisateur']."','".$d."') ";
            $query1=mysqli_query($connexion,$requete1);
            // echo ($requete1).'<br/>';
  
          }



    //    }
    


    }
    ?> <section > <?php

        /*
        else
        {
          $this->scorefinal['temps']=1;
          $_SESSION['nb_tentative']=1;
        }
        */
        echo '<p class="text-memo">Level ='.$_SESSION['jeu']->lvl.'<br/>';
        echo 'DEFI  = '.$_SESSION['defi'].'<br/>';
        echo ' Nombre d\'erreur : '.$_SESSION['jeu']->nbtentative.'</p>';
      ?> 
      <h1 id="win">Winner</h1> 
      <p><?php
      //=$score['temps']; 
      //ajout amine
      date_default_timezone_set('Europe/Paris');

      if($this->scorefinal['tentative']==0)
      {
      		echo '<br/>';
      		echo 'Félicitation !!! Vous avez fait un sans faute '.ucfirst($_SESSION['login']).' !!'.'<br/>';
      } ?> 
  	  </p>           
      <?php  //lancé ajout score, nouvelle partie

      
      echo 'Votre temps est de '.$this->scorefinal['temps'].' secondes !<br/>'; 
     // echo 'Nombre de coups : '.$this->scorefinal['tentative'].' !'.'<br/>';
      if($_SESSION['defi']=='Chrono')
      {
        echo 'Vous gagnez '.$_SESSION['jeu']->point.' pts <br/><br/>';
      }
      else
      {
        echo 'Vous gagnez '.$_SESSION['jeu']->point.' pts <br/><br/>';

      }
    }
    //fermeture if win et fin modif amine

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
	<title>memory</title>
  <link rel="stylesheet" type="text/css" href="memo.css"> 
	<?php
		if(isset($_GET['chrono'])) //refresh la page toute les 1s
		{    
			?>
				<meta http-equiv="refresh" content="1 ;URL=index.php">
			<?php 
		} 
	?>
</head>
<body class="body-jeu">


<?php 

include('header.php');

if(isset($_SESSION['gamestrart'])&&isset($_SESSION['login']))
{

	if(isset($_GET['jouer']))
	{
    $_SESSION['jeu']->jouer($_GET['jouer']);
	}
	$_SESSION['jeu']->afficher();//affiche le tableaux
  ?>
	<article id="animationfinpartie" class="text-memo">
  	<?php
  	$_SESSION['jeu']->win();
  ?>
  <!-- <p> Nombre d'erreur : <?php echo $_SESSION['jeu']->nbtentative;?>
  </p>      -->
  <!-- VARIABLE NOMBRE DE TENTATIVE A RECUPERER POUR AFFICHAGE WALL OF FAME ******************************************* -->
  <br><a href="index.php?end=true">Ressayer</a>
  <a href="index.php?chang=true">Changer difficulter/Mode de jeu</a>
    </article>
    </section>
    
  <?php
}
else
{
    //formulaire de lancement avec choix et if du post
  ?>
<div id="jeu-div">
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
</div>
  <?php

  if(isset($_POST['envniv']))
  {
  	if(!isset($_SESSION['login']))
  	{ ?>	
  		<p class="err">Vous devez étres <a href="connexion.php">connécté</a> pour jouer et enregistrer vos scores</p>
  	 <?php	
  	}
  	else
  	{
  		$_SESSION['jeu']= new tabcarte($_POST['niv']);
  		header("Location: index.php");
  	}
    
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