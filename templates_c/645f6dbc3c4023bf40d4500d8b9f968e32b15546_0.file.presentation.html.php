<?php
/* Smarty version 3.1.30, created on 2017-03-07 09:32:47
  from "/Applications/MAMP/htdocs/TLI/projet/presentation.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58be702f5fca23_94554641',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '645f6dbc3c4023bf40d4500d8b9f968e32b15546' => 
    array (
      0 => '/Applications/MAMP/htdocs/TLI/projet/presentation.html',
      1 => 1488797914,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58be702f5fca23_94554641 (Smarty_Internal_Template $_smarty_tpl) {
?>
	<!DOCTYPE html>

	    <html lang="fr">
		    <head>
		        <link rel="stylesheet" href="design.css">
		        <link rel="stylesheet" href="responsive.css">
		        <meta charset="UTF-8">
			    <title>Remède par l'acupuncture</title>
			    <meta name="keywords" content="HTMLW3C">
			    <link rel="shortcut icon" type="image/ico" href="favicon.png" />
			    <?php echo '<script'; ?>
 type='text/javascript' src='scripts/script.js'><?php echo '</script'; ?>
>
			</head>

			<body>

			<div id="menu">
				<section id="section">
					<ul>
		 				<li><a href="">Accueil</a></li>
		 				<li><a href="">Présentation</a></li>
		  				<li><a href="">A propos</a></li>
		 				<li><a href="">Recherche</a></li>
					</ul> 
				</section>
			</div>

			<div class="center">
				<section></section>
			</div>

			<div class="center">
			<p>
				ification Commission for Acupuncture and Oriental Medicine, and licensed by the Pennsylvania Medical Board. Brandy first became interested in acupuncture after seeing the quick, positive response in her performance horses that were treated with acupuncture.

 

Knowing that animals are incapable of being subject to a “placebo” effect, it was easy for Brandy to see that acupuncture truly does work. Brandy’s primary interests include pain management, emotional balancing and health maintenance. By understanding that the mind and body are connected, Brandy believes that a balanced and pain free body enables the mind to focus on day-to-day life with more clarity and a sense of well being.
Brandy Maupin L.Ac., Dipl.Ac. (NCCAOM)


Murrysville Acupuncture strives to provide quality one-on-one service to the people of Murrysville and surrounding areas. The office is centrally located in Murrysville in a multidisciplinary healthcare environment at Murrysville Healing Arts which includes massage, yoga and chiropractic care dedicated to the well being of each person that walks through the door.

 

The setting is quiet and inviting, allowing patients to relax and enjoy a little peace and quiet. Office hours are structured to provide easy access to working people and their families. The primary goal of Murrysville Acupuncture is to provide an alternative to standard health care where the body is treated as a whole and the patient is given the opportunity to participate in his or her health and well being.
			</p>
			</div>




			
			<h1>Inscription </h1>
			<form oninput="getTotal(this)" method="post" action="lib/main.php?variable=truc" id="formulaire">

				<ul>
					<li>
						<label for="name">Nom&nbsp;:</label>
						<input type="text" id="name" name="name" placeholder="Dupont" required>
					</li>
					<li>
						<label for="firstname">Prénom&nbsp;:</label>
						<input type="text" id="firstname" name="firstname" placeholder="Camille" required>
					</li>
					<li>
						<label for="birthdate">Date de naissance&nbsp;:</label>
						<input type="date" id="birthdate" name="birthdate" required>
					</li>
					<li>
						<label for="email_addr">Adresse e-mail&nbsp;:</label>
						<input type="email" id="email_addr" name="email_addr" required>
					</li>
					<li>
						<label for="email_addr_repeat">Confirmez l'adresse e-mail&nbsp;:</label>
						<input type="email" id="email_addr_repeat" name="email_addr_repeat" required 
						oninput="check(this)">
					</li>
					<li>
						<label for="phone">Numéro de téléphone&nbsp;:</label>
						<input type="text" id="phone" name="phone" pattern="[0-9]<?php echo 10;?>
" required>
					</li>

					<li>
						<label for="login">Login&nbsp;:</label>
						<input type="text" id="login" name="login" required>
					</li>
					<li>
						<label for="password">Mot de passe&nbsp;:</label>
						<input type="password" id="password" name="password" pattern="[a-z]+[A-Z]+[0-9]+]<?php echo 6;?>
" required>
					</li>
					<li>
						<label for="password_addr_repeat">Confirmez votre mot de passe&nbsp;:</label>
						<input type="password" id="password_repeat" name="password_repeat" required 
						oninput="checkPassword(this)">
					</li>	
					<li>
						<input type="submit" value="Valider le formulaire" /> 
					</li>
				</ul>
			</form>
			
			


			</body>





		  </html><?php }
}
