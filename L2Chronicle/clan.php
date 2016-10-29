<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="eng" xml:lang="eng">
<head>

<title>L2 Chronicle</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="description" content="L2 Chronicle" />

<meta name="keywords" content="L2, Lineage, High Five, Chronicle, PvP, server, private serveur l2, top site l2, top serveur lineage II, lineage II" />

<meta name="viewport" content="width=device-width, user-scalable=yes" />

<meta name="robots" content="all" />

<meta name="revisit-after" content="1 days" />
<link rel="search" type="application/opensearchdescription+xml" href="engine/opensearch.php" title=".:L2 Chronicle:. - Private Lineage 2 Interlude Server" />
<link rel="alternate" type="application/rss+xml" title=".:L2 Chronicle:. - Private Lineage 2 High Five Server" href="rss.xml" />
<link rel="shortcut icon" href="templates/l2/images/favicon.png"/>
<link rel="stylesheet" type="text/css" href="templates/l2/css/droidsans.css" />
<link rel="stylesheet" type="text/css" media="screen" href="templates/l2/css/style.css" />
<link rel="stylesheet" type="text/css" href="css/lightbox.css" />
<style type="text/css">
</style>
</head>
<body>
	<div class="lightboxcontent">
		<div class="lightboxcontentb">
			<div id="titlec">
				<img src="templates/l2/images/special_offer.png" />
			</div>
			<div class="lightboxcenter">
<?php
/*
	********************************************************************************************
	CONFIGURATION
	********************************************************************************************
*/
// destinataire est votre adresse mail. Pour envoyer à plusieurs à la fois, séparez-les par une virgule
$destinataire = 'admin@l2-chronicle.eu, djpat_13@hotmail.com';

// copie ? (envoie une copie au visiteur)
$copie = 'non';

// Action du formulaire (si votre page a des paramètres dans l'URL)
// si cette page est index.php?page=contact alors mettez index.php?page=contact
// sinon, laissez vide
$form_action = '';

// Messages de confirmation du mail
$message_envoye = "Your message was well sent!";
$message_non_envoye = "The sending of the e-mail failed, try again PLEASE.";

// Message d'erreur du formulaire
$message_formulaire_invalide = "Check that all the fields are well filled and that the e-mail is without error.";

/*
 * NoSpamQuestion affiche une question pour la validation d'un formulaire ...
 * $mode, mode question ou réponse par défaut tirage au sort de question {string}
 * $answer, lors de la demande d'une réponse à la question numero tant ... {int}
 *
 * @returns array
 *
 * Ajouter une question :
 * copier/coller ces lignes et remplir le contenu entre guillemets doubles :
 *
 * $array_pictures[$j]['num'] = $j; // ne pas changer cette ligne
 * $array_pictures[$j]['question'] = "mettre ici la question (correspondant à l'image si vous utilisez une image)";
 * $array_pictures[$j]['answer'] = "mettre ici la réponse à l'énigme";
 * $j++; // ne pas oublier cette ligne dans la copie :-)
 *
 * C'est tout. Question suivante ? :-)
 *
 */
function NoSpamQuestion($mode = 'ask', $answer = 0)
{
	$array_pictures = array(); $j = 0;

	$array_pictures[$j]['num'] = $j;
	$array_pictures[$j]['question'] = "(5+2)*(4-1)-5=";
	$array_pictures[$j]['answer'] = "16";
	$j++;

	$array_pictures[$j]['num'] = $j;
	$array_pictures[$j]['question'] = "12+5+8+3=";
	$array_pictures[$j]['answer'] = "28";
	$j++;

	$array_pictures[$j]['num'] = $j;
	$array_pictures[$j]['question'] = "(12*2)*2=";
	$array_pictures[$j]['answer'] = "48";
	$j++;

	$array_pictures[$j]['num'] = $j;
	$array_pictures[$j]['question'] = "122+61-15=";
	$array_pictures[$j]['answer'] = "168";
	$j++;

	$array_pictures[$j]['num'] = $j;
	$array_pictures[$j]['question'] = "(86/2)+(52/4)+(25*2)=";
	$array_pictures[$j]['answer'] = "106";
	$j++;

	if ($mode != 'ans')
	{
		// on est en mode 'tirer au sort', on tire une image aléatoire
		$lambda = rand(0, count($array_pictures)-1);
		return $array_pictures[$lambda];
	}
	else
	{
		// on demande une vraie réponse
		foreach($array_pictures as $i => $array)
		{
			if ($i == $answer)
			{
				return $array;
				break;
			};
		};
	}; // Fin if ($mode != 'ans')
};
/*
	********************************************************************************************
	FIN DE LA CONFIGURATION
	********************************************************************************************
*/
	// on tire au sort une question
	$nospam = NoSpamQuestion();

/*
 * cette fonction sert à nettoyer et enregistrer un texte
 */
function Rec($text)
{
	$text = htmlspecialchars(trim($text), ENT_QUOTES);
	if (1 === get_magic_quotes_gpc())
	{
		$text = stripslashes($text);
	}

	$text = nl2br($text);
	return $text;
};

/*
 * Cette fonction sert à vérifier la syntaxe d'un email
 */
function IsEmail($email)
{
	$value = preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email);
	return (($value === 0) || ($value === false)) ? false : true;
}

// formulaire envoyé, on récupère tous les champs.
$clan_name  = (isset($_POST['clan_name']))        ? Rec($_POST['clan_name'])        : '';
$leader_name  = (isset($_POST['leader_name']))      ? Rec($_POST['leader_name'])      : '';
$members  = (isset($_POST['members']))      ? Rec($_POST['members'])      : '';
$email      = (isset($_POST['email']))      ? Rec($_POST['email'])      : '';
$antispam_h = (isset($_POST['antispam_h'])) ? Rec($_POST['antispam_h']) : '';
$antispam_r = (isset($_POST['antispam_r'])) ? Rec($_POST['antispam_r']) : '';

// On va vérifier les variables et l'email ...
$email = (IsEmail($email)) ? $email : ''; // soit l'email est vide si erroné, soit il vaut l'email entré
$err_formulaire = false; // sert pour remplir le formulaire en cas d'erreur si besoin

if (isset($_POST['envoi']))
{
	// On demande la vraie réponse
	$verif_nospam = NoSpamQuestion('ans', $antispam_r);

	if (strtolower($antispam_h) != strtolower($verif_nospam['answer']))
	{
		// le formulaire s'arrête ici
		echo '<p>the captcha is false! Try again please.</p>';
	}
	else
	{
		if (($clan_name != '')  && ($leader_name != '') && ($email != '') && ($members != ''))
		{
			// les 4 variables sont remplies, on génère puis envoie le mail
			$headers  = 'From:'.$leader_name.' <'.$email.'>' . "\r\n";
			//$headers .= 'Reply-To: '.$email. "\r\n" ;
			//$headers .= 'X-Mailer:PHP/'.phpversion();

			// envoyer une copie au visiteur ?
			if ($copie == 'oui')
			{
				$cible = $destinataire.','.$email;
			}
			else
			{
				$cible = $destinataire;
			};

			// Remplacement de certains caractères spéciaux
			$message = "leader_name : ".$_POST['leader_name']."\r\nclan_name : ".$_POST['clan_name']."\r\nEmail : ".$_POST['email']."\r\nmembers :".$_POST['members']."\r\n";
			$objet= "Offre Clan L2-Chronicle: ".$_POST['leader_name']."\r\n";

			// Envoi du mail
			if (mail($cible, $objet, $message, $headers))
			{
				echo '<p>'.$message_envoye.'</p>';
			}
			else
			{
				echo '<p>'.$message_non_envoye.'</p>';
			};
		}
		else
		{
			// une des 3 variables (ou plus) est vide ...
			echo '<p>'.$message_formulaire_invalide.'</p>';
			$err_formulaire = true;
		};
	};
}; // fin du if (!isset($_POST['envoi']))

if (($err_formulaire) || (!isset($_POST['envoi'])))
{
	// afficher le formulaire
	echo '
				<form action="clan.php" method="post">
					<div id="form">
						<label for="clan_name">Clan Name:</label> 
						<input type="text" name="clan_name" id="clan_name"/></div>
					<div id="form">
						<label for="character_name">Leader Name: </label>
						<input type="text" name="leader_name" id="leader_name"/></div>
					<div id="form">
						<label for="email">Email: </label>
						<input type="text" name="email" id="email"/></div>
					<div id="form">
						<label for="members">Members: </label>
						<textarea class ="clan" name="members" id="members"></textarea></div>
					<div id="form">
						<label for="antispam_h">'.$nospam['question'].'</label><input type="text" name="antispam_h" id="antispam_h" /><input type="hidden" name="antispam_r" value="'.$nospam['num'].'" /></div>
					<div id="formb">
						<input type="submit" name="envoi" value="Send"/>
					</div>
				</form>';
};
?>
			</div>
		</div>
	</div>

</body>
</html>