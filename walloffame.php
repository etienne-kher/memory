<?php


class TotalScore{

    public $tentative="";
    public $niveau="";
    public $temps="";
    public $login="";
    public $pasword="";
    public $connexion="";
    public $password="";


    public function inscription($login,$password){
        
        $connexion=mysqli_connect("Localhost","root","","memory");
        $requete0="SELECT * FROM utilisateurs WHERE login='".$login."'";
        $query=mysqli_query($connexion,$requete0);
        $resultat=mysqli_fetch_row($query);
        $this->connexion=$connexion;
        $this->password=$password;

        if($resultat==0){
            $requete="INSERT INTO utilisateurs (login,password) VALUES ('".$login."','".$password."')";
            $query=mysqli_query($connexion,$requete);
            echo '<br/>'.'VOUS VOUS ETES BIEN INSCRIT'.'<br/>';
        }
        else{
            echo '<br/>'.'LOGIN DEJA EXISTANT'.'<br/>';
        }
    }


    public function connexion($login,$password){

        $connexion=mysqli_connect("Localhost","root","","memory");
        $requete1="SELECT login,password FROM utilisateurs WHERE login='".$login."'";
        $query=mysqli_query($connexion,$requete1);
        $resultat=mysqli_fetch_all($query);

        if($resultat[0][0]==$login and $resultat[0][1]==$password){
            session_start();
            $this->login=$login;
            echo '<br/>'.'VOUS ETES BIEN CONNECTEE'.'<br/>';
        }
        else{
            echo '<br/>'.'LOGIN OU MOT DE PASSE INCORRECT'.'<br/>';
        }
    }

    public function deconnecte(){
        session_destroy();

    }


    Public function scoretemps($tentative,$niveau,$temps) {

        if(isset($tentative) and isset($niveau) and isset($temps)){
            $this->tentative=$tentative;
            $this->niveau=$niveau;
            $this->temps=$temps;

            echo 'niveau = '.$niveau.'<br>';
            echo 'tentative = '.$tentative.'<br>';
            echo 'temps = '.$temps.'s'.'<br/>';
        }
    } 


}









?>

<html>

<title>Wall of Fame</title>
<link rel="stylesheet" href="walloffame.css">

<?php
$memory=new Totalscore;
if(isset($_POST['valider'])){
    $memory->scoretemps($_POST['tentative'],$_POST['niveau'],$_POST['temps']);
}

// INSCRIPTION
if(isset($_POST['valider1'])){
    $memory->inscription($_POST['login'],$_POST['password']);
}

// CONNEXION
if(isset($_POST['valider2'])){
    $memory->connexion($_POST['login'],$_POST['password']);
}



?>

<section class="aligntab">
    <div class="form">
        <br>
        <!-- INSCRIPTION -->
        Inscription
        <form action="" method="post">
            <input type="text" name="login"><br>
            <input type="text" name="password"><br>
            <input type="submit" name="valider1">
        </form>
    </div>

    <div class="form">
        <br>
        <!-- CONNEXION -->
        Connexion
        <form action="" method="post">
            <input type="text" name="login"><br>
            <input type="text" name="password"><br>
            <input type="submit" name="valider2">
        </form>
    </div>
    <?php 
if(!empty($memory->login)){

    echo '<div class="form">
        <br><br><br>
        <!-- DECONNEXION -->
        <form action="" method="post">
            <input type="submit" name="valider3" value="Deconnexion">
        </form>
    </div>';
}

?>
    <div class="form">
        <br>
        <!-- TEST -->
        Test
        <form action="" method="post">
            <input type="text" name="tentative"><br>
            <input type="text" name="niveau"><br>
            <input type="text" name="temps"><br>
            <input type="submit" name="valider">
        </form>
    </div>
</section>


<!-- TEST PRINCIPALE TIME -->
<?php
if(!isset($levelbis)){
    $levelbis=$_GET['levelbis'];
}

if(!isset($level)){
    $level=0;
}
else{
    $level=$_GET['level'];
}
$n=1;
?>
<section class="aligntab"> <table>
    <th>TOP 10</th>
    <th>---TIME---</th>
    <th>
        <ul id="menu-accordeon">
            <li><a href="#">Level</a>
                <ul>
                    <li><a href="walloffame.php?tab=1&amp;type=time&amp;level=1&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=<?php echo urlencode($levelbis); ?>">Level 1</a></li>
                    <li><a href="walloffame.php?tab=1&amp;type=time&amp;level=2&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=<?php echo urlencode($levelbis); ?>">Level 2</a></li>
                    <li><a href="walloffame.php?tab=1&amp;type=time&amp;level=3&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=<?php echo urlencode($levelbis); ?>">Level 3</a></li>
                    <li><a href="walloffame.php?tab=1&amp;type=time&amp;level=4&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=<?php echo urlencode($levelbis); ?>">Level 4</a></li>
                    <li><a href="walloffame.php?tab=1&amp;type=time&amp;level=5&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=<?php echo urlencode($levelbis); ?>">Level 5</a></li>


                </ul>
            </li>
    </th>
    <?php
while ($n<=10){
    echo '<tr><td>'.'N°'.$n.'</td><td>'.'$login'.'</td><td>'.'$temps'.'</td></tr>';
    ++$n;
}?>
</table>
<br><br><br><br><br>
<?php


if($_GET['tab']=='1'){

    if($_GET['type']=="time"){
        echo 'TYPE '.$_GET['type'].'<br/>';
        if($_GET['level']<=5){
            echo 'LEVEL '.$_GET['level'].'<br/>';
        }
    }
}
?>
<br><br>
<?php
if($_GET['tabbis']=='2'){
    if($_GET['typebis']=="tentative"){
        echo 'TYPE '.$_GET['typebis'].'<br/>';
        if($levelbis<=5){
            echo 'LEVEL '.$levelbis.'<br/>';
            if(!isset($levelbis)){
                $levelbis=0;
            }
        }
    }
}

?>

<br>
<!-- TEST PRINCIPALE TENTATIVE -->
<?php

$n=1;
?> <table>
    <th>TOP 10</th>
    <th>---TENTATIVE---</th>
    <th>
        <ul id="menu-accordeon">
            <li><a href="#">Level</a>
                <ul>
                    <li><a href="walloffame.php?tab=1&amp;type=time&amp;level=<?php echo urlencode($_GET['level']); ?>&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=1">Level 1</a></li>
                    <li><a href="walloffame.php?tab=1&amp;type=time&amp;level=<?php echo urlencode($_GET['level']); ?>&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=2">Level 2</a></li>
                    <li><a href="walloffame.php?tab=1&amp;type=time&amp;level=<?php echo urlencode($_GET['level']); ?>&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=3">Level 3</a></li>
                    <li><a href="walloffame.php?tab=1&amp;type=time&amp;level=<?php echo urlencode($_GET['level']); ?>&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=4">Level 4</a></li>
                    <li><a href="walloffame.php?tab=1&amp;type=time&amp;level=<?php echo urlencode($_GET['level']); ?>&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=5">Level 5</a></li>
                </ul>
            </li>
    </th>
    <?php
while ($n<=10){
    echo '<tr><td>'.'N°'.$n.'</td><td>'.'$login'.'</td><td>'.'$temps'.'</td></tr>';
    ++$n;
}?>
</table>
</section>

<?php

?>

<br><br><br>



</html>