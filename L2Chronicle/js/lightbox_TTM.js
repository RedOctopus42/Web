/*
LIGHTBOX TTM V0.2 PAR SKY DE TUTOMANIA.COM
Auteur :  Xavier FRACHOT (sky@tutomania.com)
*/

$(document).ready(function() { /* Dès que le DOM est  prêt */

$('a.lightbox,a.lightbox2').click(function() { /* Lorsque que l'on clique sur un lien "a" ayant comme class lightbox */

	var typeElement = $(this).attr("rel"); /* On récupère avec attr() ce que contient l'attribut rel */

		/* On va charger tout de suite le loader sans l'afficher */
		//$("#load").html("<img src='images/ajax-loader.gif' alt='' />");
		/* La on l'affiche avec un effet fade */
		//$("#load").fadeIn("fast");

		if( typeElement == "image") { /* Si rel="image" */
				/* On récupère avec attr() ce que contient l'attribut name */
				var image = $(this).attr("name");
				/* On déclare une variable photo */
				var photo;
				/* Qu'on attribut à une image */
				photo = new Image();
				/* Qui a pour source ce qui a écrit dans "name" */
				photo.src = image;
			
				/* On récupère avec attr() ce que contient l'attribut title */
				var title = $(this).attr("title");

				
/* On charge l'image, tant que celle ci n'est pas chargée on exécute pas le reste */
/* Idem que $(photo).load(function() { ... */
$(photo).bind('load', function() {

/* On commence à analyser l'image et son futur affichage */
/* on récupère la taille de fenêtre actuelle du visiteur en jQuery moins 100 px */
var axe_x = $(window).width() - 100;
var axe_y = $(window).height() - 100;
/* on récupère la taille de l'image avec LargeurImg et HauteurImg */
var LargeurImg = photo.width;
var HauteurImg = photo.height;

/* Script pour redimensionner les images trop grandes en hauteur et/ou largeur */
if (LargeurImg > axe_x)
{
    HauteurImg = HauteurImg * (axe_x / LargeurImg);
    LargeurImg = axe_x;
				
    if (HauteurImg > axe_y)
    {
        LargeurImg = LargeurImg * (axe_y / HauteurImg);
        HauteurImg = axe_y;
    }
}
else if (HauteurImg > axe_y)
{
    LargeurImg = LargeurImg * (axe_y / HauteurImg);
    HauteurImg = axe_y;
    if (LargeurImg > axe_x)
    {
    HauteurImg = HauteurImg * (axe_x / LargeurImg);
    LargeurImg = axe_x;
    }
}
// FIN SCRIPT IMAGE

/* C'est parti !!!! */
/* On cache en fade out le bloc de loading */
$("#load").fadeOut("fast"); 
/* On met une opacité de 0.8 au bloc "bgPopup" */
$("#bgPopup").css({ "opacity": "0.8" }); 
/* et on l'affiche en fade */
$("#bgPopup").fadeIn("normal"); 

/* Ici on imbrique deux animate() en callback */
/* La première function animate() va redimensionner la largeur de #Popup à celle de l'image précédemment chargée */
/* La deuxième function animate() va redimensionner la hauteur fr #Popup à celle de l'image précédemment chargée */
$("#Popup").animate({"width" : ""+LargeurImg+"px"}, 300, function () {
$("#Popup").animate({"height" : ""+HauteurImg+"px"}, 300, function () {
/* On appel la function de centrage de popup - disponible ci-dessous */
popupcentre();

/* on redimensionne la barre de titre on affiche le titre */
$("#my_logo").css({"width":""+LargeurImg-50+"px"});
$("#my_logo").fadeIn("normal"); 
$("#my_logo").html("&nbsp;<img style='margin-bottom:-2px;' src='images/icones/page.png' alt='' />&nbsp;<small>"+title+"</small>&nbsp;&nbsp;");

/* On affiche la popup en fade */
$("#Popup").fadeIn("normal"); 
/* On efface le bloc de loading */
$("#load").fadeOut("fast"); 
/* On affiche le contenu image souhaitée*/
$("#contenu").html("<img src='"+image+"' width='"+LargeurImg+"' height='"+HauteurImg+"' alt='' />");
$("#contenu").fadeIn("normal");
/* On cache les balises object car sous ie il y a un problème de transparence :) */
$("object").hide();  

}); 
}); 
// FIN CHARGEMENT bind('load')
});

/* FIN DU SCRIPT SI REL EST IMAGE */
}

/* Si rel="frame" */
else if(typeElement == "license"){

/* On récupère les infos des attributs title, name, et value */
var title = $(this).attr("title");
var ma_frame = $(this).attr("href");
var vars = $(this).attr("value");

/* Si value n'est pas défini on met des valeurs par défaut */
if(!vars ) {
var largeur = 600;
var hauteur = 380;
}else{
/* sinon on split le champ value ce qui nous retourne un tableau avec deux éléments largeur et hauteur */
var mes_vars = vars.split('?');
var largeur = mes_vars[0];
var hauteur = mes_vars[1];
}

/* COMME POUR IMAGE CI DESSUS */
$("#load").fadeOut("fast"); 
$("#bgPopup").css({ "opacity": "0.8" }); 
$("#bgPopup").fadeIn("normal"); 
$("#Popup").animate({"width" : ""+largeur+"px"}, 300, function () {
$("#Popup").animate({"height" : ""+hauteur+"px"}, 300, function () {
popupcentre();
$("#my_logo").css({"width":""+largeur-50+"px"});
$("#my_logo").fadeIn("normal"); 
$("#my_logo").html("&nbsp;<img style='margin-bottom:-2px;' src='images/icones/page.png' alt='' />&nbsp;"+title+"&nbsp;&nbsp;");
$("#Popup").fadeIn("normal"); 
$("#load").fadeOut("fast"); 
$("#contenu").fadeIn("normal");

/* SEUL ICI CHANGE, CHARGEMENT DU CONTENU FRAME DANS UNE IFRAME */
/* IFRAME AVEC UN overflow vertical , overflow horizontal caché */
$("#contenu").html("<iframe style='overflow-x:hidden;overflow-y:auto;' allowtransparency='true' src='"+ma_frame+"' width='"+largeur+"' height='"+hauteur+"' scrolling='yes' frameborder='0'></iframe>");
$("object").hide(); 
}); 
}); 

/* FIN DU SCRIPT SI REL EST FRAME */
}

/* SI REL N'EST NI UNE IMAGE NI UNE FRAME ON AFFICHE UNE LIGHTBOX D'ERREUR */
else{ 
$("#load").fadeOut("fast"); 
$("#bgPopup").css({ "opacity": "0.8" }); 
$("#bgPopup").fadeIn("normal"); 
$("#Popup").animate({"width" : "300px"}, 300, function () {
$("#Popup").animate({"height" : "300px"}, 300, function () {
popupcentre();
$("#my_logo").css({"width":"250px"});
$("#my_logo").fadeIn("normal"); 
$("#my_logo").html("&nbsp;<img style='margin-bottom:-2px;' src='images/icones/page.png' alt='' />&nbsp;ERREUR !&nbsp;&nbsp;");
$("#Popup").fadeIn("normal"); 
$("#contenu").fadeIn("normal");
$("#contenu").html("<img src='images/icones/error.png' alt='' />");
$("object").hide(); 
}); 
}); 

/* FIN DU SCRIPT REL IMAGE / FRAME / ERROR */

}

/* FIN click(function... */
});  


/* FERMETURE DE LA LIGHTBOX EN CLIQUANT SUR LE BACKGROUND */
$('#bgPopup').click(function() {
$("#bgPopup").fadeOut("normal"); 
$("#Popup").fadeOut("normal"); 
$("#my_logo").fadeOut("normal"); 
$("#contenu").hide(); 
/* On réaffiche les balises objects notemment pour les videos Youtube */
$("object").show(); 
});	


/* FERMETURE DE LA LIGHTBOX EN CLIQUANT SUR LE BACKGROUND (X) */
$('#fermer').click(function() {
$("#bgPopup").fadeOut("normal"); 
$("#Popup").fadeOut("normal"); 
$("#my_logo").fadeOut("normal"); 
$("#contenu").hide(); 
$("object").show(); 
});	

// CENTRAGE DE LA BOX

function popupcentre(){  
var windowWidth = $(window).width();
var windowHeight = $(window).height();
var popupWidth = $("#Popup").width();  
var popupHeight = $("#Popup").height();  
var alih = windowWidth/2-popupWidth/2;
var alig = windowHeight/2-popupHeight/2;
$("#Popup").animate({"top":""+alig+"px", "left":""+alih+"px"}, 500, 'easeOutElastic');  
// FIN CENTRAGE DE LA BOX
}  

// FIN DOM READY
});