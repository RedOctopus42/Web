<div id="explain">
    <p class="grey">Pour toutes questions ou requête, utilisez le formulaire ci-dessous.</p>
    <p class="grey">Si vous avez des suggestions pour le jeu, vous pouvez nous les partager aussi !</p>
</div>

<?php
/*
	********************************************************************************************
	CONFIGURATION
	********************************************************************************************
*/
// destinataire est votre adresse mail. Pour envoyer à plusieurs à la fois, séparez-les par une virgule
$destinataire = 'contact@themothmanprophecies.com, lemondeoqp@gmail.com';

// copie ? (envoie une copie au visiteur)
$copie = 'non';

// Action du formulaire (si votre page a des paramètres dans l'URL)
// si cette page est index.php?page=contact alors mettez index.php?page=contact
// sinon, laissez vide
$form_action = '';

// Messages de confirmation du mail
$message_envoye = "<p class='erreur'>Your message was well sent!</p>";
$message_non_envoye = "<p class='erreur'>The sending of the e-mail failed, try again PLEASE.</p>";

// Message d'erreur du formulaire
$message_formulaire_invalide = "<p class='erreur'>Check that all the fields are well filled and that the e-mail is without error.</p>";

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
$name  = (isset($_POST['name']))        ? Rec($_POST['name'])        : '';
$email      = (isset($_POST['email']))      ? Rec($_POST['email'])      : '';
$object      = (isset($_POST['object']))      ? Rec($_POST['object'])      : '';
$message    = (isset($_POST['message']))    ? Rec($_POST['message'])    : '';
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
        echo '<p class="erreur">the captcha is false! Try again please.</p>';
    }
    else
    {
        if (($name != '')  && ($email != '') && ($object != '') && ($message != ''))
        {
            // les 4 variables sont remplies, on génère puis envoie le mail
            $headers  = 'From:'.$name.' <'.$email.'>' . "\r\n";
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
            $message = "Name : ".$_POST['name']."\r\nEmail : ".$_POST['email']."\r\nMessage : ".$_POST['message']."\r\n";

            // Envoi du mail
            if (mail($cible, $object, $message, $headers))
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
    ?>

        <form action="page_contact.php" method="post">
            <div class="barre">
                <label for="name">Nom* </label><input type="text" id="name" name="name"/>
            </div>
            <div class="barre">
                <label for="email">Email* </label><input type="email" id="email" name="email"/>
            </div>
            <div class="barre">
                <label for="object">Objet* </label><input type="text" id="object" name="object"/>
            </div>
            <div class="barre">
                <label for="message">Message* </label><textarea id="message" name="message"></textarea>
            </div>
            <div class="barre">
                <label for="antispam_h">Captcha:<br /> <?php echo $nospam['question'] ?></label><input type="text" name="antispam_h" id="antispam_h" /><input type="hidden" name="antispam_r" value="<?php echo $nospam['num'] ?>" />
            </div>
            <div class="button">
                <button type="submit" name="envoi" class="submit">Envoyer</button>
            </div>
        </form>
        <p class="grey">*Champs obligatoires.</p>';
<?php
}
?>


