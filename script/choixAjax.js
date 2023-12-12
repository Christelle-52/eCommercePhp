$(document).ready(function () {
    // Attacher un événement à la modification de la taille
    
    $('#selectSize').change(function () {
      let idProduit = $('input[type = "hidden"]').val();

    //   console.log(idProduit);
      // Récupérer la taille
      let taille = $(this).val();
    //   console.log(taille);
      // Envoyer la requête AJAX au serveur
      $.ajax({
          url: 'traitementPrix.php?id_produit='+idProduit+'&taille='+taille,
          method: 'GET',
          data:{taille:taille,idProduit:idProduit},
          success: function (response) {
            // Mettre à jour le prix sur la page
            $('#prix').text(response);
            // Récupérer la valeur du prix pour effectuer des calculs
          },
          error: function (error) {
              console.log('Erreur AJAX :', error);
          }
      });
  });
});
