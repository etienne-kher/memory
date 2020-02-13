<?php



class score{


    

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