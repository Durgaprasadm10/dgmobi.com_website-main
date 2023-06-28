<?php
$language = (isset($_GET["lang"]) && (($_GET["lang"] == "en") || ($_GET["lang"] == "fr") )) ? $_GET["lang"] : "";
if($language == "en"){
	header("Location: ../");
}

$adPublisherUniqueID = filter_input(INPUT_GET, "adp");
if ($adPublisherUniqueID) {
	$siteNameForAds = "dgmobi";
	require_once "../../dg_ads_analytics/update_ads_analytics.php";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>DGMobi - Calcule placardage de HAZMAT. Temps d'Inspection réduit</title>
               
        <meta name="description" content="DGMobi - App Android pour Camionneurs, SME. Placardage correct de HAZMAT/DG lors de charger/décharger les cargaisons. ERG inclus. Inspections en format électronique">

        <meta name="keywords" content="Réseau, Android, Plaque, Dangereuse, TDG, étiqueter, Étiquettes, Séparation, Danger, Formateur, Chimique, Déclaration, EGR, hazmat, inspecteur, Consulter, Certfié, Violation, Règlements, étiquetage, Hors de Service, 49 CFR, Français, Espagnol, Termes de Licence, Ideabytes, DGSMS,1 888-409-8057, +91-40-6555-5959, 1-613-800-7368">
 <?php
		include "header_nav.php";
		$pageId = '1485';
		?>
		
		 <!-- About Section -->
            <section class="page-section">
                <div class="container relative">
                    
                    <h2 class="section-title font-alt align-left mb-sm-40">
                    <img src="images/dgmobi-logo.png" width="250" height="49" alt="DGMobi-logo- Android Based Placard Calculator – that can function stand alone or networked to DGSMS. Compliant to TDG and 49 CFR"/> </h2>
                    
                    <div class="section-text mb-30 mb-sm-20">
                        <div class="row">
                                                    
                            <div class="col-md-12  mb-xs-30">
                            <img src="images/DGMobi-banner.jpg" width="1100" height="400" class="marbot" alt="DGMobi - Android Based Placard Calculator – that can function stand alone or networked to DGSMS. Compliant to TDG and 49 CFR. Don’t leave home without it. Avoid placarding infractions"/>

<p>Le transport des marchandises de HAZMAT augmente l'activité commerciale d’une entreprise de camionnage. DGMobi™ permet aux conducteurs et les compagnies de camionnage de SME d'être conformes aux réglémentations de HAZMAT.</p>
<p>En tant que conducteur - vous devez être en route - pour empocher des recettes afin de maximiser vos revenues. Lorsque vous transportez HAZMAT ça commence par une déclaration correcte par l'expéditeur. Comment peut-on vérifier que toutes les informations sont sur la déclaration?. Vous l’aurez deviné, DGMobi™ vous invitera à saisir les informations requises, et si elles font défaut ou sont incorrectes sur la déclaration – on peut demander à l'expéditeur d'amender le document sur-le-champ. Une fois que vous ramassez le document – vous êtes responsable de l’erreur.</p>

<p>Comme vous arrimez des chargements sur votre camion, la plaque-étiquette peut changer. Même si les quantités de HAZMAT chargées par les d'expéditeurs sont inférieurs aux niveaux réglémentaires du placardage, ça ne signifie pas que le chargement sur le camion n'exigerait pas du placardage supplémentaire. Prenez une habitude d'entrer chaque cargaison collectée et DGMobi™ va afficher le placardage requis sur le camion.</p>

<p>Lors d'une inspection, un inspecteur doit passer par un relieur de paperasserie pour déterminer le placardage exigé. Cela peut prendre une heure. Avec DGMobi™, tous les chargements sur le camion sont affichés par un résumé facile à lire, qui a pour résultat une inspection très brève. Les résultats obtenus sur le terrain ont montré que le temps exigé pour une inspection est de moins que 10 minutes – avec DGMobi™ ou DGSMS™</p>


<p>Apprenez davantage sur les points importants ci-dessous et contactez-nous pour faire l'essai de ce produit et savoir comment il améliore l’efficacité et la sécurité.</p>
<p>Téléchargez la version d'essai gratuite depuis l'Android dans la boutique Google App Store <a rel="canonical" href="https://play.google.com/store/apps/details?id=com.ideabytes.dgsms.canada&hl=en" target="_blank"><img src="images/android.png" width="150" height="49" alt="For free trial download the Android version from google app store"/></a></p>
<p>
<a rel="canonical" href="https://www.facebook.com/dialog/feed?app_id=184683071273&amp;link=https%3A%2F%2Fwww.dgsms.ca/dgmobi/&amp;picture=http%3A%2F%2Fwww.insert-image-share-url-here.jpg&amp;name=DGSMS%20&amp;caption=%20&amp;description=Share%2C%20to%20your%20friends.%20https://www.dgsms.ca/dgmobi/&amp;redirect_uri=http%3A%2F%2Fwww.facebook.com%2F" target="_blank"><img src="images/box-facebook.png" alt="facebook" /></a> <strong>Soyez notre "ami" sur Facebook </strong> – et recevez  un service de Deuxième Opinion de nos experts de HAZMAT

<br /><br />

<a rel="canonical" href="refer-a-friend.php"><img src="images/share-friends.png" alt="Refer a friend" /></a> <strong>Référez-nous un ami</strong> – et vous pourrez gagner une licence gratuite de DGMobi™


								
                           </p>     										
                          </div>
                          <div class="col-md-12  mb-xs-30">
	                            <h2 class="section-title font-alt align-left mb-sm-40">
                        CARACTÉ RISTIQUES
                    </h2>
                                <ul><li>Déterminer de manière  Rapide et Indépendante du placardage de chargement mixte de HAZMAT  basé sur les lots mis sur le camion.</li>
<li>L’utilisation de la plaque-étiquette de Danger sanctionnée pour maximiser les capacités de HAZMAT du matériel.</li>
<li>Les situations d'ERAP rapidement déterminées et validées.</li>
<li>ERG (Emergency Response Guide) pour une référence rapide.</li>
<li>L'éxpéditeur peut transférer le manifeste électroniquement au Mobile Placard Validator du conducteur.</li>
<li>Services aux Canada et États-Unis.</li>
<li>Interface disponible en Anglais, Français et Espagnol.</li>
<li>Toutes les transactions enregistrées automatiquement au format numérique  pendant 2 ans.</li>
<li>Formation de DG en ligne incluse avec la licence.</li>
<li>Répond aux normes de Transports Canada, / D.O.T 49 CFR</li></ul>


								
                                										
                          </div>
                          <div class="col-md-12 mb-xs-30">
	                            <h2 class="section-title font-alt align-left mb-sm-40">
                      DGMOBI™, C'EST QUOI? 
                    </h2>
                                <ul><li>Une application Android qui opère sur un téléphone ou une tablette. À chaque point de ramassage, le conducteur entre les données de HAZMAT et la calculatrice affiche les plaques-étiquettes (placardages) nécessaires. </li>
<li>Les Distributeurs peuvent faire avancer les demandes des ramassages ou des manifestes pour le conducteur. Le conducteur a également un accès instantané à l’Emergency Response Guide relatifs aux HAZMAT transportés</li></ul>


								
    <p><a rel="canonical" href="http://www.phmsa.dot.gov/staticfiles/PHMSA/Hazmat/digipak/pdfs/presentation/Placarding_Requirements(04-07).pdf" target="_blank">Référence en ligne de Regulatory Authority  </a>                            	</p>									
                          </div>
                            
                           
                            
                            
                            
                        </div>
                    </div>
                    
                </div>
               <div class="hs-line-4 align-center mt-10">
                               Appelez-nous pour un essai gratuit | <a rel="canonical" href="contact.php">Contactez Nous</a></div>

                              <div class="hs-line-3">
                                <ul class="nav tpl-alt-tabs  ">
                        
                        <li>
                                
                               CANADA<br>
								1-613-800-7368
                        </li>
                        <li>
                                
                                USA (Sans Frais)<br>
								+1 888-409-8057
                        </li>
                        <li>
                               
                               INDIA<br>
								+91-40-6555-5959
                        </li>
                        <li>                                
                               
                                Sans Frais<br>
								+1 888-409-8057
                                
                        </li>
                        <li> <a rel="canonical" href="http://www.ideabytes.com" target="_blank"><img src="images/ideabytes.png" width="150" height="51" alt="Ideabytes logo Web/mobile Solutions Dangerous Goods/HAZMAT Air, Road Sea Transport (TDG, IATA, IMDG, 49-CFR, ADR)"/></a> </li>
                    </ul>
                            </div>
                 
            </section>
            <!-- End About Section -->
            
            <!-- Divider -->
            <hr class="mt-0 mb-0 "/>
            <!-- End Divider -->
            <?php
			include "footer.php";
			?>