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
<body>
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
					$err="Votre login doit étres different de votre mots de passe";
				}
				
			}
			else
			{
				$err="Login déja pris essayé ".$_POST['login']."123";
			}			
		}
		else
		{
			$err="erreur mots de passe";
		}
	}
	
?>
<form action="inscription.php" method="post">
	<label>Login : </label><input type="text" name="login" required><br>
	<label>Password : </label><input type="password" name="psw" required><br>
	<label>Confirmation : </label><input type="password" name="repsw" required><br>
	<input type="submit" name="insc">
</form>
<?php 
	if (isset($err)) 
	{ ?>
		<div id="erreur"><?php echo $err; ?></div>
	<?php			
	}
?>
</body>
</html>