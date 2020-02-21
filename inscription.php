<?php
	session_start();
	include('fonction.php');

?>
<!DOCTYPE html> 
<html>
<head>
	<title>inscription</title>
	<link rel="stylesheet" type="text/css" href="memo.css">
</head>
<body id="bodyinscription" >
<?php 
	include('header.php');
	if(isset($_POST['insc'])&&!empty($_POST['login'])&&!empty($_POST['psw'])&&!empty($_POST['repsw']))
	{
		if ($_POST['psw']==$_POST['repsw']) 
		{  
			$count = sql("SELECT COUNT(*) FROM `utilisateurs` WHERE login = '".$_POST['login']."'");
			if($count[0][0]==0)
			{	
				if ($_POST['login']!=$_POST['psw']) 
				{
					//final
					$_POST['psw']=chiffre($_POST['psw']);
					sql("INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES (NULL, '".$_POST['login']."', '".$_POST['psw']."')");
					header('Location: connexion.php');
					//final	
				}
				else
				{
					$err="<h3>Votre login doit être different de votre mots de passe</h3>";
				}
				
			}
			else
			{
				$err="<h3>Login déja pris essayé ".$_POST['login']."123</h3>";
			}			
		}
		else
		{
			$err="<h3>Erreur mot de passe ou de confirmation de mot de passe</h3>";
		}
	}
	
?>
<section class="formco2 frigo1">
	<form action="inscription.php" method="post">
		<label>Login </label><input class="inputform" type="text" name="login" required><br>
		<label>Password </label><input class="inputform" type="password" name="psw" required><br>
		<label>Confirmation </label><input class="inputform" type="password" name="repsw" required><br>
		<input class="inputformval" type="submit" name="insc" value="S'inscrire">
	</form>
	</section>
	<?php 
		if (isset($err)) 
		{ ?><br>
			<div class="err"><?php echo $err; ?></div>
		<?php			
		}
	?>
</body>
</html>