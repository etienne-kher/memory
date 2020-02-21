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
<body class="bodyconnexion ">
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
			$err="<h3>Erreur de mot de passe ou de login</h3>";
		}

	}
	
?>

<section class="formco frigo2">
	<form action="connexion.php" method="post">
		<label>Login </label><input class="inputform" type="text" name="login" required><br>
		<label>Password </label><input class="inputform" type="password" name="psw" required><br>
		<input class="inputformval" type="submit" name="conn" value="Se connecter">
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