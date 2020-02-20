<header>
	<ul id="ul-head">
		<li><a class="a-head" href="index.php">Jeu</a></li>
		<li><a class="a-head" href="walloffame.php">wall of fame </a></li>
		<?php if(!isset($_SESSION['id'])){?>
		<li><a  class="a-head" href="connexion.php">Connexion</a></li>
		<li><a  class="a-head" href="inscription.php">Inscription</a></li>
		<?php } else{ ?>
		<li><a  class="a-head" href="profil.php"><?=$_SESSION['login']?></a></li>
		<li><a  class="a-head" href="index.php?deco=true">Deconnexion</a></li>
		<?php }?>
	</ul>
</header>