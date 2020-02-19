<?php

class User{

    
    public $login="";
    public $id;
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
            $_SESSION['login']=$login;
            $_SESSION['id']=$id;
            header('location:walloffame.php');
        }
        else{
            echo '<br/>'.'LOGIN OU MOT DE PASSE INCORRECT'.'<br/>';
        }
        
    }

    public function deconnecte(){
        session_destroy();

    }










}






?>

<?php



?>

<html>

<title>Formulaire</title>
<link rel="stylesheet" href="walloffame.css">

<?php
$memory=new User;


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



<br><br><br>



</html>