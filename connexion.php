<?php
	session_start();
	include('fonction.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>connexion</title>
	<link rel="stylesheet" type="text/css" href="memo.css">
</head>
<body>
<?php 
	include('header.php');
	if(isset($_POST['conn'])&&!empty($_POST['login'])&&!empty($_POST['psw']))
	{
		$_POST['psw']=chiffre($_POST['psw']);
		$res=sql("SELECT `id`,`login` FROM `utilisateurs` WHERE login = '".$_POST['login']."' AND password = '".$_POST['psw']."';");
		if(!empty($res))
		{
			$_SESSION['id']=$res[0][0];
			$_SESSION['login']=$res[0][1];
			header('Location: index.php');
		}
		else
		{
			$err="Erreur de mots de passe ou de login";
		}

	}
	
?>

<section class="formco">
	<form action="connexion.php" method="post">
		<label>Login </label><input type="text" name="login" required><br>
		<label>Password </label><input type="password" name="psw" required><br>
		<input type="submit" name="conn" value="Se connecter">
	</form>
	</section>
	<br>
	<?php 
		if (isset($err)) 
		{ ?>
			<div class="err"><?php echo $err; ?></div>
		<?php			
		}
	?>
</body>
</html