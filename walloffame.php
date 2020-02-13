<?php



class User{

    public $nb_cout;
    public $level;
    public $temps;
    public $login="";
    public $id;
    public $défi="";
    public $pasword="";
    public $connexion="";


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
        $requete1="SELECT id,login,password FROM utilisateurs WHERE login='".$login."'";
        $query=mysqli_query($connexion,$requete1);
        $resultat=mysqli_fetch_all($query);

        if($resultat[0][1]==$login and $resultat[0][2]==$password){
            session_start();
            $this->id=$resultat[0][0];
            $id=$this->id;
            var_dump($resultat);
            echo 'Id= '.$id.'<br/>';
            echo 'login= '.$login.'<br/>';
            echo '<br/>'.'VOUS ETES BIEN CONNECTEE'.'<br/>';
        }
        else{
            echo '<br/>'.'LOGIN OU MOT DE PASSE INCORRECT'.'<br/>';
        }
    }

    public function deconnecte(){
        session_destroy();

    }



    Public function scoreperso($défi,$level,$nb_cout,$temps) {


        if(isset($défi) and isset($level) and isset($nb_cout) and isset($temps)){
            $connexion=mysqli_connect("Localhost","root","","memory");
            $requete1="SELECT * FROM score WHERE id=1";
            $query=mysqli_query($connexion,$requete1);
            $resultat=mysqli_fetch_all($query);
            var_dump($resultat);

            session_start();

            $this->défi=$défi;
            $this->level=$level;
            $this->temps=$temps;
            $this->nb_cout=$nb_cout;
            $id=$this->id;
            $login=$this->login;
            
            

            $connexion=mysqli_connect('localhost','root','','memory');
            $requete="INSERT INTO score (temps,tentative,level,defi,id_utilisateur) VALUES ('".$temps."','".$nb_cout."','".$level."','".$défi."'.'".$id."') WHERE login='".$login."'";
            $query=mysqli_query($connexion,$requete);
            echo ($query);

            echo '<br/>Défi = '.$défi.'<br>';
            echo 'Level = '.$level.'<br>';
            echo 'Nb_cout = '.$nb_cout.'<br/>';
            echo 'Temps= '.$temps.'<br/>';
            echo 'Id= '.$id.'<br/>';
            echo 'login= '.$login.'<br/>';

        }
    }






}






?>

<?php



?>

<html>

<title>Wall of Fame</title>
<link rel="stylesheet" href="walloffame.css">

<?php
$memory=new User;
if(isset($_POST['valider'])){
    $memory->scoreperso($_POST['défi'],$_POST['level'],$_POST['nb_cout'],$_POST['temps']);
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
if(isset($memory->login)){

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
            <SELECT type="text" name="défi" size="1">
            <OPTION>TIME
            <OPTION>TENTATIVE
        </SELECT><br>
            <input type="text" name="level" placeholder="level"><br>
            <input type="text" name="nb_cout" placeholder="Nb_cout"><br>
            <input type="text" name="temps" placeholder="Temps"><br>
            <input type="submit" name="valider">
        </form>
    </div>
</section>


<!-- TEST PRINCIPALE TIME -->
<?php
if(!isset($levelbis)){
    $levelbis=$_GET['levelbis'];
}

if(!isset($levelbis2)){
    $levelbis2=$_GET['levelbis2'];
}

if(!isset($level)){
    $level=0;
}
else{
    $level=$_GET['level'];
}
$n=1;
?>
<section class="aligntab">
    <table>
        <th>TOP 10</th>
        <th>---TIME---</th>
        <th>
            <ul id="menu-accordeon">
                <li><a href="#">Level</a>
                    <ul>
                        <li><a
                                href="walloffame.php?tab=1&amp;type=time&amp;level=1&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=<?php echo urlencode($levelbis); ?>&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=<?php echo urlencode($levelbis2); ?>">Level
                                1</a></li>
                        <li><a
                                href="walloffame.php?tab=1&amp;type=time&amp;level=2&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=<?php echo urlencode($levelbis); ?>&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=<?php echo urlencode($levelbis2); ?>">Level
                                2</a></li>
                        <li><a
                                href="walloffame.php?tab=1&amp;type=time&amp;level=3&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=<?php echo urlencode($levelbis); ?>&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=<?php echo urlencode($levelbis2); ?>">Level
                                3</a></li>
                        <li><a
                                href="walloffame.php?tab=1&amp;type=time&amp;level=4&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=<?php echo urlencode($levelbis); ?>&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=<?php echo urlencode($levelbis2); ?>">Level
                                4</a></li>
                        <li><a
                                href="walloffame.php?tab=1&amp;type=time&amp;level=5&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=<?php echo urlencode($levelbis); ?>&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=<?php echo urlencode($levelbis2); ?>">Level
                                5</a></li>


                    </ul>
                </li>
        </th>
        <?php
while ($n<=10){
    echo '<tr><td>'.'N°'.$n.'</td><td>'.'$login'.'</td><td>'.'$temps'.'</td></tr>';
    ++$n;
}?>
    </table>
    <br><br><br><br>
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
    <br><br>

    <?php
if($_GET['tabbis2']=='3'){
    if($_GET['typebis2']=="bestscore"){
        echo 'TYPE '.$_GET['typebis2'].'<br/>';
        if($levelbis2<=5){
            echo 'LEVEL '.$levelbis2.'<br/>';
            if(!isset($levelbis2)){
                $levelbis2=0;
            }
        }
    }
}
?>

    <form action="" method="post">
        <SELECT name="nom" size="1">
            <OPTION>time
            <OPTION>tentative
        </SELECT>
        <SELECT name="level" size="1">
            <OPTION>1
            <OPTION>2
            <OPTION>3
            <OPTION>4
            <OPTION>5
        </SELECT>
        <input type="submit" name="valider3">
    </form>


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
                        <li><a
                                href="walloffame.php?tab=1&amp;type=time&amp;level=<?php echo urlencode($_GET['level']); ?>&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=1&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=<?php echo urlencode($levelbis2); ?>">Level
                                1</a></li>
                        <li><a
                                href="walloffame.php?tab=1&amp;type=time&amp;level=<?php echo urlencode($_GET['level']); ?>&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=2&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=<?php echo urlencode($levelbis2); ?>">Level
                                2</a></li>
                        <li><a
                                href="walloffame.php?tab=1&amp;type=time&amp;level=<?php echo urlencode($_GET['level']); ?>&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=3&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=<?php echo urlencode($levelbis2); ?>">Level
                                3</a></li>
                        <li><a
                                href="walloffame.php?tab=1&amp;type=time&amp;level=<?php echo urlencode($_GET['level']); ?>&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=4&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=<?php echo urlencode($levelbis2); ?>">Level
                                4</a></li>
                        <li><a
                                href="walloffame.php?tab=1&amp;type=time&amp;level=<?php echo urlencode($_GET['level']); ?>&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=5&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=<?php echo urlencode($levelbis2); ?>">Level
                                5</a></li>
                    </ul>
                </li>
        </th>
        <?php
while ($n<=10){
    echo '<tr><td>'.'N°'.$n.'</td><td>'.'$login'.'</td><td>'.'$temps'.'</td></tr>';
    ++$n;
}?>
    </table>

    <br>
    <!-- TEST PRINCIPALE BESTSCORE -->

    <?php

$n=1;
?> <table>
        <th>TOP 10</th>
        <th>---BESTSCORE---</th>
        <th>
            <ul id="menu-accordeon">
                <li><a href="#">Level</a>
                    <ul>
                        <li><a
                                href="walloffame.php?tab=1&amp;type=time&amp;level=<?php echo urlencode($_GET['level']); ?>&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=<?php echo urlencode($levelbis); ?>&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=1">Level
                                1</a></li>
                        <li><a
                                href="walloffame.php?tab=1&amp;type=time&amp;level=<?php echo urlencode($_GET['level']); ?>&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=<?php echo urlencode($levelbis); ?>&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=2">Level
                                2</a></li>
                        <li><a
                                href="walloffame.php?tab=1&amp;type=time&amp;level=<?php echo urlencode($_GET['level']); ?>&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=<?php echo urlencode($levelbis); ?>&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=3">Level
                                3</a></li>
                        <li><a
                                href="walloffame.php?tab=1&amp;type=time&amp;level=<?php echo urlencode($_GET['level']); ?>&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=<?php echo urlencode($levelbis); ?>&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=4">Level
                                4</a></li>
                        <li><a
                                href="walloffame.php?tab=1&amp;type=time&amp;level=<?php echo urlencode($_GET['level']); ?>&amp;tabbis=2&amp;typebis=tentative&amp;levelbis=<?php echo urlencode($levelbis); ?>&amp;tabbis2=3&amp;typebis2=bestscore&amp;levelbis2=5">Level
                                5</a></li>
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