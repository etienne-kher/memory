<header>
	<ul>
		<li><a href="index.php">Jeu</a></li>
		<li><a href="walloffame.php">wall of fame </a></li>
		<?php if(!isset($_SESSION['id'])){?>
		<li><a href="connexion.php">Connexion</a></li>
		<li><a href="inscription.php">Inscription</a></li>
		<?php } else{ ?>
		<li><?=$_SESSION['login']?></li>
		<li><a href="index.php?deco=true">Deconnexion</a></li>
		<?php }?>
	</ul>
</header>