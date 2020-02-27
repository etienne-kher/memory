<html>
<title>Profil</title>
<head>
	<link rel="stylesheet" href="walloffame.css">
	<link rel="stylesheet" type="text/css" href="memo.css">
</head>
<body>
 
<?php
session_start();
include('header.php');

if(isset($_SESSION['login'])){


?>

<main id="main-profil">
<br>
<!-- TEST VOS PARTIE -->
<?php
// if(isset($_SESSION['login']) and isset($_SESSION['id'])){
//     echo 'id= '.$_SESSION['id'].'<br/>';
//     echo 'login= '.$_SESSION['login'].'<br/>';
// }

date_default_timezone_set('Europe/Paris');


$n=1;
?> 
<section class="section">

<article class="textprofil">
    <h1>Le Jeu</h1>
    <p> Il existe <b>deux modes</b> de jeu : <br><br>
<b>"Chrono"</b> : Vous devez finir la partie le plus vite qu'il vous es possible de faire. <br><br>
<b>"Sans-faute"</b> : Vous devez finir la partie en faisant le moins de coups possible. <br><br>
Prêt à tester votre rapidité et votre mémoire ? <br><br> <a href="index.php?chang=true"><h1>==> Jouer <==</h1></a> 
</p>
</article>

<table class="tableprofil">
        <th class="col1">TOP 5</th>
        <th class="col1"> --- PAR MODE DE JEU --- </th>
            <th>
                <ul id="menu-accordeon">
                    <li><a href="#">** <?php if(!isset($_GET['level'])){ echo 'Level 1';} else{echo 'Level '.$_GET['level'];} ?> **</a>
                        <ul>
                            <li><a
                                    href="profil.php?tab=1&amp;type=time&amp;level=1">Level
                                    1</a></li>
                            <li><a
                                    href="profil.php?tab=1&amp;type=time&amp;level=2">Level
                                    2</a></li>
                            <li><a
                                    href="profil.php?tab=1&amp;type=time&amp;level=3">Level
                                    3</a></li>
                            <li><a
                                    href="profil.php?tab=1&amp;type=time&amp;level=4">Level
                                    4</a></li>
                            <li><a
                                    href="profil.php?tab=1&amp;type=time&amp;level=5">Level
                                    5</a></li>
                        </ul>
                    </li>
            </th>
            <?php ?>
        <?php

        if(isset($_GET['tab'])){

            if($_GET['tab']=='1' and $_GET['type']=="time" and $_GET['level']==1){
                $level=1;
            }
            if($_GET['tab']=='1' and $_GET['type']=="time" and $_GET['level']==2){
                $level=2;
            }
            if($_GET['tab']=='1' and $_GET['type']=="time" and $_GET['level']==3){
                $level=3;
            }
            if($_GET['tab']=='1' and $_GET['type']=="time" and $_GET['level']==4){
                $level=4;
            }
            if($_GET['tab']=='1' and $_GET['type']=="time" and $_GET['level']==5){
                $level=5;
            }
            }
            else{
                $level=1;
            } 
        $connexion=mysqli_connect('localhost','root','','memory');
        $requete="SELECT login,points,temps,date FROM besttime WHERE level='".$level."' and login='".$_SESSION['login']."' ORDER BY points DESC";
        $query=mysqli_query($connexion,$requete);
        $resultatlevel2=mysqli_fetch_all($query);
        // var_dump($resultatlevel2);
        // echo $level.'<br/>';

        // TABLEAU VOS PARTIES 

        $n=1;
        $k=0;
        echo '<tr><td class="thead">'.'<b>#1</b>'.'</td><td class="thead">'.'BEST CHRONO'.'</td><td class="thead">'.'BEST POINTS'.'</td></tr>';

        if(isset($resultatlevel2)){

        while ($n<=5){    
        // $resultatlevel2[0][0];//Login
        // $resultatlevel2[0][1];//points
        while($k<count($resultatlevel2) and $n<=5){
            
            echo '<tr><td  class="num1">'.'N°<b>'.$n.'</b></td><td class="num1"><b> '.ucfirst($resultatlevel2[0][0]).' -- '.$resultatlevel2[$k][2].' secondes : le '.$resultatlevel2[$k][3].' </b></td><td class="num1"><b>'.$resultatlevel2[$k][1].'</b> pts '.'</td></tr>';
            ++$k;
            ++$n;
        }
        if($k==count($resultatlevel2)){
            echo '<tr><td  class="num1bis">'.'N°<b>'.$n.'</b></td><td class="num1bis">'.''.'</td><td class="num1bis">'.''.'</td></tr>';
            ++$n;

                }
            }
        }
        $connexion=mysqli_connect('localhost','root','','memory');
        $requete1="SELECT login,points,nb_tentative,date FROM besttentative WHERE level='".$level."' and login='".$_SESSION['login']."' ORDER BY points DESC";
        $query=mysqli_query($connexion,$requete1);
        $resultat1=mysqli_fetch_all($query);
        //var_dump($resultat1);
        // echo $requete1.'<br/>';
        // echo 'Level = '.$level.'<br/>';

        // TABLEAU VOS PARTIES 
        if(isset($resultat1)){

        $n=1;
        $k=0;
        echo '<tr><td class="thead">'.'<b>#2</b>'.'</td><td class="thead">'.'BEST SANS-FAUTE'.'</td><td class="thead">'.'BEST POINTS'.'</td></tr>';

        while ($n<=5){    
        // $resultatlevel2[0][0];//Login
        // $resultatlevel2[0][1];//points

        while($k<count($resultat1) and $n<=5){
            
            echo '<tr><td  class="num1">'.'N°<b>'.$n.'</b></td><td class="num1"><b> '.ucfirst($resultat1[0][0]).' -- '.$resultat1[$k][2].' coups : le '.$resultat1[$k][3].' </b></td><td class="num1"><b>'.$resultat1[$k][1].'</b> pts '.'</td></tr>';
            ++$n;
            $k++;
        }
        if($k==count($resultat1)){
            echo '<tr><td  class="num1bis">'.'N°<b>'.$n.'</b></td><td class="num1bis">'.''.'</td><td class="num1bis">'.''.'</td></tr>';
            ++$n;

                }
            }
        }

        ?>
</table>

<article class="textprofil">
<h1>Les Points</h1>
<p>
Le <b>calcul des points</b> se fait en fonction du level et du temps/nombre de coups : <br> Plus le level sera grand et plus le temps/nombre de coups sera faible, plus vous pouvez gagnerai de points.<br><br>
Il y a une relation entre le nombre de cartes choisies en début de partie et le level du jeu : 
<ul>
    <li>Pour le <b>level 1</b> => 3 ou 4 cartes choisies.</li>
    <li>Pour le <b>level 2</b> => 5 ou 6 cartes choisies.</li>
    <li>Pour le <b>level 3</b> => 7 ou 8 cartes choisies.</li>
    <li>Pour le <b>level 4</b> => 9 ou 10 cartes choisies.</li>
    <li>Pour le <b>level 5</b> => 11 ou 12 cartes choisies.</li>
</ul>

</p>
</article>

</section>
<?php
}
else{
    echo 'La page profil n\'est accessible que si vous êtes connecté'.'<br/>';
}

?>
</main>
</body>