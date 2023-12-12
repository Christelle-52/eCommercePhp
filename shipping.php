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
  <link rel="stylesheet" href="styles/categories.css">
  <link rel="stylesheet" href="styles/ship.css">

  <script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

  <title>ZenDog - Livraisons</title>

</head>

<body>
<?php include ('header.php');?>

  
  <main>
    <section class="container my-4">
      <h2 class="p-0 text-center">Informations et tarifs de livraison</h2>
      <div class="d-flex flex-lg-row shipping flex-column">
        <!-- <aside class="tabs "> -->
        <ul class="tabs col-lg-3 col-12 px-2 text-start">
          <li> <a href="#" class="active" data-open="tab1"> Tarifs de livraison en France </a> </li>
          <li> <a href="#" data-open="tab2"> Délai de livraison en France </a> </li>
          <li> <a href="#" data-open="tab3"> Modalité de livraison </a> </li>
          <li> <a href="#" data-open="tab4"> Livraison à l'international </a> </li>
        </ul>
        <!-- </aside> -->
        <!-- <article class=""> -->
        <div class="tabContent active tab1 col-lg-9 col-12 text-left" id="tab1">
          <h3 class="text-start">Résumé de nos tarifs de livraison pour la France métropolitaine *:</h3>
          <table>
            <thead>
              <tr>
                <th>Prestataire de livraison</th>
                <th></th>
                <th>Commande jusqu'à 38,99 €</th>
                <th>Commande entre 39,00 € et 48,99 €</th>
                <th>Commande dès 49 €</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Sans préférence</td>
                <td></td>
                <td>4,99 €</td>
                <td>1,99 €</td>
                <td>Offerts</td>
              </tr>
              <tr>
                <td>Chronopost</td>
                <td><img src="icons/chronopost.svg" alt=""></td>
                <td>5,49 €</td>
                <td>2,49 €</td>
                <td>0,49 €</td>
              </tr>
              <tr>
                <td>GLS</td>
                <td><img src="icons/gls.svg" alt=""></td>
                <td>5,49 €</td>
                <td>2,49 €</td>
                <td>0,49 €</td>
              </tr>
              <tr>
                <td>Chronopost pickup**</td>
                <td><img src="icons/chronopost.svg" alt=""></td>
                <td>4,99 €</td>
                <td>1,99 €</td>
                <td>Offerts</td>
              </tr>
              <tr>
                <td>Mondial Relay**</td>
                <td><img src="icons/mondial-relay.svg" alt=""></td>
                <td>3,49 €</td>
                <td>0,99 €</td>
                <td>Offerts</td>
              </tr>
            </tbody>
          </table>
          <p>* Sauf livraison en Corse : 3,99 € quel que soit le montant de la commande.</p>
          <p>** La livraison en Relais est limitée à un poids maximum de 20 kilogrammes avec Chronopost Pickup et de
            30 kg avec Mondial Relay.</p>
          <p>Les frais de livraison et éventuels frais annexes sont résumés dans votre panier.
          <p>
          <p>Les frais de livraison, calculés en fonction du montant du panier, de l'option de livraison choisie et de
            l’adresse de livraison, vous seront indiqués après la connexion à votre compte client ou après avoir
            indiqué votre adresse dans l'aperçu de commande.</p>
          </p>Si pour des raisons techniques ou logistiques, la commande doit être envoyée en plusieurs fois, nous ne
          vous facturons bien sûr les frais de port qu'une seule fois. </p>
        </div>

        <div class="tabContent tab2 text-left" aria-labelledby="tab2" id="tab2">
          <h3>Délai de livraison en France métropolitaine:</h3>
          <p>Toute commande effectuée sur le site avant 13h un jour ouvré est remise au transporteur le jour même sauf
            incident exceptionnel. Passé 13h, la plupart des commandes sont traitées dans les 24h après validation.
            Les
            commandes sont ensuite généralement livrées sous 2 à 4 jours ouvrés après le départ de notre entrepôt.</p>
          <p>Ce délai de livraison peut cependant varier en fonction du mode de paiement, du transporteur choisi, des
            jours fériés ou d'anomalies météorologiques.
          <p>
          <table>
            <thead>
              <tr>
                <th>Jour de la commande</th>
                <th>Délai de livraison estimé (en jours ouvrés)</th>
                <th>1er jour de livraison possible</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Lundi</td>
                <td>2 à 4 jours</td>
                <td>Mercredi</td>
              </tr>
              <tr>
                <td>Mardi</td>
                <td>2 à 4 jours</td>
                <td>Jeudi</td>
              </tr>
              <tr>
                <td>Mercredi</td>
                <td>2 à 4 jours</td>
                <td>Vendredi</td>
              </tr>
              <tr>
                <td>Jeudi</td>
                <td>2 à 4 jours</td>
                <td>Samedi ou lundi (selon transporteur)</td>
              </tr>
              <tr>
                <td>Vendredi</td>
                <td>2 à 4 jours</td>
                <td>Le lundi de la semaine suivante</td>
              </tr>
              <tr>
                <td>Samedi</td>
                <td>2 à 4 jours</td>
                <td>Le mardi de la semaine suivante</td>
              </tr>
              <tr>
                <td>Dimanche</td>
                <td>2 à 4 jours</td>
                <td>Le mardi de la semaine suivante</td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="tabContent tab3 text-left" aria-labelledby="tab3" id="tab3">
          <h3>Modalités de livraison</h3>
          <h4>Spécificités pour la livraison à domicile :</h4>
          <p>Nous utilisons actuellement 2 prestataires pour assurer la livraison de votre colis à domicile :
            Chronopost
            / DPD et GLS. Vous avez la possiblité de sélectionner votre transporteur ou de laisser zooplus choisir
            celui
            qui le prestataire idéal en fonction du poids, du volume, mais aussi de la localisation de votre domicile.
            Tous ces prestataires livrent généralement vos colis sous 2 à 4 jours ouvrés.</p>
          <h4>Spécificités pour la livraison en Relais :</h4>
          <p>La livraison en Relais est limitée à un poids maximum de 20 kilogrammes avec Chronopost Pickup et de 30
            kg
            avec Mondial Relay. A la réception de votre colis en Relais, vous recevrez un SMS pour vous confirmer son
            arrivée. Votre colis sera conservé 8 jours dans votre Relais. Au delà de ce délai, votre colis sera
            retourné
            dans notre entrepôt et vous serez remboursé dans les plus brefs délais.</p>
          <h4>Spécificités pour la livraison des produits encombrants ou surgelés :</h4>
          <p>Quelques produits particulièrement encombrants (niches, clapiers, aquariums, arbres à chat...) ne peuvent
            être livrés par GLS ou DPD/Chronopost et ne sont donc pas livrables dans tous les pays. Ces articles sont
            désignés expressément dans la boutique.</p>
          <p>Les commandes contenant des produits surgelés ou volumineux sont susceptibles d'être livrées dans des
            colis
            séparés et avec des délais de livraison différents des délais habituels. Pour la livraison de ces
            produits,
            ainsi que l’envoi de marchandises vers des régions difficiles d´accès, nous sélectionnons automatiquement
            le
            partenaire le plus approprié pour livrer votre colis. Les informations de livraison spécifiques sont
            directement mentionnées dans la page de description du produit.</p>
          <h4>Cas spécifiques pour lesquels la livraison est impossible :</h4>
          <p>La livraison vers les DOM-TOM ainsi qu'aux adresses militaires, boites postales et autres points de
            retrait
            sont impossibles.</p>

        </div>

        <div class="tabContent tab4 text-left" aria-labelledby="tab4" id="tab4">
          <h3>Résumé de nos tarifs de livraison à l'international</h3>
          <h4>Livraisons à l’international : </h4>
          <p>Nous livrons également à l’international, dans les pays mentionnés ci-dessous. Vous retrouverez les
            conditions et tarifs de livraison dans le tableau ci-dessous. Si le pays souhaité ne figure pas dans la
            liste, nous ne pouvons malheureusement pas vous proposer de livraison vers ce pays. Le montant minimum de
            commande est de 9,00 € (hors frais de port).</p>
          <p>Les frais de livraisons sont listés par pays, dans le tableau ci-dessous. Veuillez noter que ces frais
            s’appliquent par colis. Nos colis peuvent atteindre un poids de 31 kg maximum. Les commandes de poids
            supérieur seront expédiées en deux colis voire plus, selon leur poids. </p>
          <p>Pour les livraisons à l’international, les délais de livraison varient en fonction du pays de livraison
            et du transporteur. Dans certains cas et pour certains pays, les frais de livraison et les frais de
            certains transporteurs partenaires peuvent différer des montants indiqués dans le tableau. Nous vous
            remercions pour votre compréhension. </p>
          <p>En fonction du contenu de votre commande, de l’option de livraison choisie et de l’adresse de livraison
            saisie, vous pouvez connaître les frais de livraison définitifs après vous être identifié(e) ou avoir
            entré votre adresse depuis le récapitulatif de commande.</p>
          <p>Les produits encombrants sont soumis à des conditions d’expédition spécifiques. C’est la raison pour
            laquelle ils sont expressément présentés comme tels sur notre site. Ces produits peuvent être expédiés par
            transporteur ou par DHL et ne sont donc pas éligibles à la livraison dans tous les pays. </p>

          <table>
            <thead>
              <tr>
                <th>Pays</th>
                <th>Commande jusqu'à 48,99 €</th>
                <th>Commande dès 49 €</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Luxembourg</td>
                <td>3,99 €</td>
                <td>Offerts</td>
              </tr>
              <tr>
                <td>Monaco</td>
                <td>3,99 €</td>
                <td>Offerts</td>
              </tr>
              <tr>
                <td>Belgique</td>
                <td>3,99 €</td>
                <td>Offerts</td>
              </tr>
              <tr>
                <td>Livraison avec Mondial Relay</td>
                <td>Commande jusqu'à 48,99 €</td>
                <td>Commande dès 49 €</td>
              </tr>
              <tr>
                <td>Belgique</td>
                <td>3,99 €</td>
                <td>Offerts</td>
              </tr>

              <tr>
                <td>Livraison à domicile*</td>
                <td>Commande dès 9 €</td>
                <td></td>
              </tr>
              <tr>
                <td>Suisse</td>
                <td>9,99 €</td>
                <td></td>
              </tr>
            </tbody>
          </table>
          <p>*Livraison à domicile sans choix du transporteur.</p>

        </div>
        <!-- </article> -->
      </div>
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
  <script src="script/tabs.js"></script>
</body>

</html>