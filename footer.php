<footer class="container-fluid footerContainer p-0 m-0">
    <div class="container-fluid newsletter justify-content-center newsletter">
      <h2 id="bottom">Newsletter</h2>
      <form action="newsReq.php" method="POST">
        <div class="row justify-content-between w-75 gy-2 mx-auto">
          <div class="col-xl-6 col-md-12 mail d-flex">
            <input class="form-control py-2" type="email" id="newsletter" name="email"
              placeholder="Votre adresse mail" aria-label="email" required>
          </div>
          <!-- CTA -->
          <input type="submit" value="Je m'inscris" class="col-xl-2 col-md-3 cta py-0">
        </div>
      </form>
    </div>

    <div class="container-fluid">
      <div class="row containerFooterItems justify-content-center m-auto gx-5 my-3">
        <div class="col-lg-3 col-sm-6 col-12 footerItem">
          <h4>Services</h4>
          <?php if(isset($_SESSION['userId'])){ ?>
          <a href="profil.php">Mon compte</a>
        <?php } else {?>
          <a href="connexion.php">Mon compte</a>

        <?php } ?>
          <a href="contact.php">FAQ & Contact</a>
          <a href="CGV.php">Conditions générales de vente</a>
          <a href="shipping.php">Frais de livraison</a>
          <a href="politiqConf.php">Politique de confidentialité</a>

        </div>
        <div class="col-lg-3 col-sm-6 col-12 footerItem">
          <h4>Acheter malin</h4>
          <a href="#">Offres spéciales</a>
          <a href="#">Offres du moment</a>
          <a href="#">Destockage</a>
          <a href="#">Points fidélité</a>

        </div>
        <div class="col-lg-3 col-sm-6 col-12 footerItem">
          <h4>Où nous trouver</h4>
          <a href="coordonnees.php" class="coordonnees">
            <div class="address">
              <p>46, rue du Code</p>
              <p>57190 FLORANGE</p>
              <p class="bodyBold">06.57.69.29.40</p>
              <p class="bodyBold">projet@afpa.com</p>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-sm-6 col-12 footerItem mx-auto">
          <h4>Suivez nous</h4>
          <div class="icons w-100">
            <a href="#"><img src="icons/facebook.svg" width="50px" height="50px" alt="facebook"></a>
            <a href="#"><img src="icons/instagram.svg" width="50px" height="50px" alt="instagram"></a>
            <a href="#"><img src="icons/twitter.svg" width="50px" height="50px" alt="twitter"></a>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row footerIcon">
        <div class="col-md-6 col-12 ">
          <h3>Moyens de paiement</h3>
          <div class="cardIcon">
            <img src="icons/visa.svg" alt="carte visa" width="133px" height="44px">
            <img src="icons/cb.svg" alt="carte bleue" width="87px" height="48px">
            <img src="icons/mastercard.svg" alt="carte mastercard" width="71px" height="55px">
            <img src="icons/american-express.svg" alt="carte american express" width="80px" height="53px">
          </div>
        </div>
        <div class="col-md-6 col-12">
          <h3>Livraison</h3>
          <div class="shipIcon">
            <img src="icons/chronopost.svg" alt="chronopost">
            <img src="icons/mondial-relay.svg" alt="mondial-relay">
            <img src="icons/gls.svg" alt="gls">
          </div>
        </div>
      </div>
    </div>
    <div class="copyright">
      <p>Copyright <span><img src="icons/copyright.svg" alt="copyright" width="24px" height="24px"></span> 2023</p>
    </div>
  </footer>