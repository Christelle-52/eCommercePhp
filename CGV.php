<?php
session_start();
include('pdo.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <!-- Font Awesome : synth ex linkedin : [<a href=”mon lien linkedin” target=”_blank”> <i class="bi bi-linkedin"></i></a>] -->
  <link rel="stylesheet" href="icons/awesome/css/all.min.css">

  <!-- Fonts Google -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Klee+One:wght@400;600&family=Lato:wght@300&family=Nunito+Sans:ital,wght@0,400;0,500;0,600;0,700;0,900;1,400;1,500;1,700;1,800;1,900&family=Open+Sans:wght@300&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sriracha&display=swap"
    rel="stylesheet">
  <link href="styles/style.css" rel="stylesheet">
  <link href="styles/body.css" rel="stylesheet">
  <link href="styles/header.css" rel="stylesheet">
  <link href="styles/footer.css" rel="stylesheet">
  <link href="styles/mediaQuerie.css" rel="stylesheet">
  <link rel="stylesheet" href="styles/connexion.css">
  <link rel="stylesheet" href="styles/form.css">
  <link rel="stylesheet" href="styles/article.css">
  <link rel="stylesheet" href="styles/panier.css">
  <link rel="stylesheet" href="styles/paiement.css">
  <link rel="stylesheet" href="styles/profil.css">


  <script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

  <title>ZenDog - CGV</title>

</head>

<body>
<?php include ('header.php');?>

  
  <main>
    <section class="container">

      <h2>1. Procédure de commande</h2>
      <p>ZenDog propose à ses clients un large choix d'articles destinés aux animaux domestiques. Le client
        accède aux détails concernant le produit comme sa présentation, ses dimensions ou son goût, en
        cliquant sur les produits ou les désignations d'articles. Le produit est placé dans le panier virtuel en
        entrant la quantité demandée et en cliquant sur l'icône du panier.</p>
      <p>Lorsqu'il clique sur le bouton "mon panier" dans la boutique en ligne, en haut à droite de l'écran, le
        client accède à une page récapitulative et peut vérifier à tout moment quels articles se trouvent dans
        son panier virtuel et si nécessaire, procéder à des changements.</p>
      <p>Si le client souhaite terminer ses achats, il peut poursuivre la procédure en cliquant sur le bouton
        "Passer commande". Les clients déjà enregistrés peuvent entrer ici leur nom d'utilisateur et leur mot
        de passe afin d'utiliser automatiquement leurs informations sauvegardées pour passer leur
        commande. Le client peut aussi s'enregistrer en tant que nouveau client et créer un compte-client
        ou poursuivre ses achats sans recourir à un compte de client. Dans ce cas, le client doit entrer les
        informations relatives à son adresse et à sa facture, sur la page suivante.</p>
      <p>En cliquant une nouvelle fois sur le bouton "suivant", le client parvient à l'avant-dernière étape de la
        commande "Aperçu". Le client obtient alors un aperçu de sa commande avec la mention du prix (TVA
        légale comprise) ainsi que des renseignements sur le service et les frais de livraison.</p>
      <p>La commande est terminée dès que le client clique sur le bouton "Passer commande". Une offre
        ferme est alors remise.</p>
      <p>ZenDog ne facture pas de frais pour l'utilisation des systèmes de communication à distance, mais le
        client peut avoir à supporter les coûts habituels liés à l'utilisation de ces services vis-à-vis de tiers
        (par exemple, opérateur de téléphonie mobile, fournisseur d'accès à Internet).</p>
      <h2>2. Conclusion du contrat</h2>
      <p>a. Notre boutique en ligne ne propose que des produits destinés à un usage domestique et privé. Vous
        acceptez donc de ne pas les utiliser à des fins commerciales, d'affaires ou de revente. Les offres
        proposées sur le site www.ZenDog.fr ne sont de fait pas destinées aux entreprises. Les entreprises sont
        des personnes physiques ou morales ou une société de personnes juridiquement reconnue qui, en
        effectuant une transaction juridique, exercent une activité commerciale ou une activité professionnelle
        indépendante.</p>
      <p>b. Les photographies de l'assortiment de produits sur la boutique en ligne permettent seulement de les
        visualiser, elles ne sont en aucun cas des offres d'achat fermes. Le client fait quant à lui, une offre ferme
      </p>
      <p>1. Champ d'application</p>
      <p>2. Procédure de commande, conclusion du contrat, limite de quantités et
        revente
        de conclusion d'un contrat de vente dès lors qu'il termine le processus de commande en cliquant sur le
        bouton "Passer commande". Le client reçoit alors un accusé de réception de commande automatique
        par courrier électronique (confirmation de commande). Cette confirmation de commande ne constitue
        pas encore une acceptation de l'offre. Le contrat avec ZenDog n'est conclu que lorsque ZenDog expédie
        le produit commandé au client et confirme l'expédition au client par courrier électronique (confirmation
        de commande).</p>
      <p>c. Nonobstant le point 2.2.b., si le client choisit de payer à l'avance, un contrat est déjà conclu lorsque
        ZenDog envoie les informations relatives au paiement. Ces informations de paiement sont envoyées au
        client dans les 24 heures suivant la passation de la commande. La confirmation de la commande ne
        constitue pas une information de paiement. En cas de paiement anticipé, le montant de la facture est
        exigible à la réception de l'information de paiement et doit être payé dans les 7 jours suivant la
        réception, par virement bancaire sur l'un des comptes mentionnés au point 8.1.b.. La réception du
        montant de la facture sur notre compte est déterminante pour le respect du délai de paiement. Si
        aucun paiement n'est enregistré sur l'un des comptes mentionnés au point 8.1.b. après 7 jours, la
        commande sera automatiquement annulée.</p>
      <p>Le délai de traitement d’un virement par nos services est de 3 jours.</p>
      <p>d. La langue du contrat est le français.</p>
      <p>3. Texte du contrat</p>
      <p>Les produits ne sont vendus qu'en quantités habituelles pour un usage domestique et uniquement à
        des personnes majeures. Il vous est interdit d’acheter de la marchandise à des fins de revente. ZenDog
        se réserve le droit de refuser ou d’annuler votre commande si tout porte à croire que votre achat est
        effectué à cette fin.</p>
      <p>Le texte du contrat est conservé par ZenDog jusqu'au traitement complet de la commande, après quoi il
        est archivé pour être conservé conformément au droit fiscal et commercial. Dès réception de la
        commande par ZenDog, l'acheteur recevra un e-mail de confirmation séparé de ZenDog contenant les
        éléments essentiels du contrat, y compris les conditions générales de vente en vigueur au moment de la
        conclusion du contrat. Si vous perdez les documents relatifs à vos commandes, veuillez nous contacter.
        Nous vous enverrons volontiers une copie de vos données de commande.</p>
      <p>4. Limitation de la quantité, valeur maximale de la commande, revente commerciale
        Les produits ne sont vendus qu'en quantités habituelles pour un usage domestique et uniquement à
        des personnes majeures. Il vous est interdit d’acheter de la marchandise à des fins de revente. ZenDog
        se réserve le droit de refuser ou d’annuler votre commande si tout porte à croire que votre achat est
        effectué à cette fin.</p>
      <h2>3. Prix et frais de livraison</h2>
      <p>Tous les prix incluent la TVA légale et les autres éléments de prix et s'entendent hors frais d'expédition.</p>

      <p>Veuillez consulter <a href="shipping.html">cette page</a> pour connaître les frais et les modalités de
        livraison dans les différents pays.
        Si vous commandez des produits auprès de ZenDog pour une livraison en dehors de l'UE, vous pouvez être soumis à
        des droits et taxes à l'importation qui seront prélevés une fois que le colis aura atteint la destination
        indiquée. Tous les frais supplémentaires de dédouanement sont à votre charge. Nous n'avons aucun contrôle sur
        ces frais. Les réglementations douanières varient considérablement d'un pays à l'autre, vous devez donc
        contacter votre bureau de douane local pour plus d'informations.</p>
      <h2>4. Livraison</h2>
      <p>La plupart des commandes sont expédiées sous 2 à 4 jours en fonction du jour de passation de la commande et
        sous réserve de paiement. Les colis sont ensuite généralement livrés le lendemain de leur expédition. Le délai
        peut cependant varier en fonction de l'offre. Pour plus d'informations sur les délais de livraison, veuillez
        consulter notre rubrique <a href="shipping.html">Informations et tarifs de livraison ZenDog.</a></p>
      <p>Si tous les produits commandés ne sont pas en stock, ZenDog est autorisée à effectuer des livraisons
        partielles à ses frais, si cette mesure est envisageable pour le client.</p>
      <p>Dans le cas où ZenDog ne pourrait pas livrer le produit commandé parce que ZenDog ne serait pas
        livrée par ses fournisseurs pour des raisons dont elle ne pourrait être tenue pour responsable, ZenDog
        pourrait se rétracter du présent contrat. Dans ce cas, ZenDog en informera immédiatement le client et
        lui proposera un produit comparable. Si aucun produit comparable n'est disponible ou si le client ne
        souhaite pas que ce produit lui soit livré, ZenDog lui remboursera immédiatement les montants déjà
        payés.</p>
      <p>Sur le territoire de l'Union Européenne, la livraison est exemptée de droits de douane. Pour une livraison
        dans un pays hors de l'Union Européenne, en particulier en Suisse, le client devra acquitter lui-même
        d'éventuels droits de douane, impôts et autres taxes.</p>
      <p>Si les articles livrés ont été endommagés pendant le transport, le service-clients de ZenDog doit en être
        informé le plus rapidement possible. ZenDog aura ainsi la possibilité d'adresser des réclamations au
        transporteur ou à l'assurance-transport. Si le client ne déclare pas une avarie de transport, cette
        négligence n'aura aucune répercussion sur ses droits légaux à la garantie.</p>
      <p>Afin de traiter les commandes le mieux possible et d'informer nos clients de façon optimale sur l'état
        d'avancement de leur commande, ZenDog transmet l'adresse e-mail aux entreprises chargées du
        transport et, s'il a été indiqué, le numéro de téléphone des clients (en cas de livraison par transporteur).
        ZenDog y voit non seulement l'intérêt du client mais aussi son propre intérêt pour établir une relation
        équilibrée, sachant que les entreprises chargées du transport se sont solennellement engagées à
        protéger les données personnelles et à ne les utiliser qu'en tant qu'informations de transport. Vous
        trouverez d'autres informations à ce sujet dans la rubrique
        Informations relatives à la protection des données personnelles.</p>
      <h2>5. Réserve de propriété</h2>
      <p>Les produits demeurent la propriété de ZenDog jusqu'à leur paiement intégral. Il est interdit de mettre
        les produits en gage, de les remettre à titre de garantie, de les transformer ou de les modifier avant le
        transfert de propriété, sans l'autorisation de ZenDog.</p>

      <h2>6. Droit de rétractation</h2>
      <h2>7. Garantie et responsabilité</h2>
      <h2>8. Modes de paiement</h2>
      <h2>9. Protection des données informatiques</h2>
      <p>ZenDog prend la protection des données informatiques de ses clients très au sérieux. Vous pouvez
        consulter ici la déclaration de protection des données informatiques.</p>
      <h2>10. Marketing et communication client</h2>
      <p> Si le client conclut un contrat avec ZenDog et renseigne son adresse électronique (e-mail), ZenDog a le
        droit d'utiliser l'adresse électronique (e-mail) du client à des fins de publipostage pour ses produits et
        services similaires.</p>
      <p>Le client a le droit de s'opposer à tout moment à une telle utilisation de son adresse électronique (e-
        mail) en envoyant un courrier faisant part de sa volonté à service@ZenDog.fr, sans que cela n’engendre
        des frais autres que les coûts de transmission selon les tarifs de base.</p>
      <h2>11. Exploitant de la boutique en ligne</h2>
      <h2>12. Programme bonus</h2>
      <p>Lors de l'inscription du client et de l'ouverture d'un compte « mon ZenDog » ainsi qu'à la première
        commande, le client obtient automatiquement le droit de participer gratuitement à notre programme</p>
      <p>L'adresse électronique (e-mail) communiquée est utilisée par ZenDog pour informer le client sur le
        nombre de points bonus cumulés sur son compte. Le client a le droit de révoquer à tout moment son
        autorisation d'utilisation de son adresse électronique (adresse e-mail) sans supporter d'autres frais que
        les frais de transmission aux tarifs de base.</p>
      <h2>13. Règlement en ligne des litiges de consommation</h2>
      <p>La Commission Européenne met à disposition une plateforme en ligne de résolution des litiges (RLL) qui
        est accessible à l’adresse suivante : www.ec.europa.eu/consumers/odr. Nous ne sommes ni obligés ni
        disposés à participer à une procédure de règlement des litiges devant un conseil d'arbitrage des
        consommateurs.</p>
      <h2>14. Dispositions finales</h2>
      <p>Si une clause des présentes Conditions Générales de Vente devrait être nulle, toutes les autres clauses
        du contrat restent valables. Seul le droit allemand s'applique, à l'exclusion de la convention des Nations
        unies sur les contrats de vente internationale de marchandises (CVIM). Le choix du droit applicable
        s’applique uniquement dans la mesure où la protection accordée par des réglementations obligatoires
        du droit de l’état dans lequel le consommateur a son lieu de résidence habituel, n'est pas déchue.</p>

    </section>
  </main>
  <?php include ('footer.php');?>

  
  <!-- script js bootstrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
    integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
    crossorigin="anonymous"></script>
  <!-- script popper et bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>

  <!-- script js -->
  <!-- <script src="script/script.js" type="text/javascript"></script> -->
  <!-- <script src="script/eye.js" type="text/javascript"></script> -->
  <!-- <script src="script/formulaire.js" type="text/javascript"></script> -->
  <!-- <script src="script/plusMoins.js" type="text/javascript"></script> -->
</body>

</html>