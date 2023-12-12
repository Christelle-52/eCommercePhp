
let selectedSizeId = "";
let selectedSizePrice = "";
let selectedSizeTaille = "";

  function modifierPrix(selectElement) {
    // Obtenir la valeur de taille sélectionnée, par son attribut data-price et son attribut data-taille
    selectedSizeId = selectElement.value;
    selectedSizePrice = selectElement.options[selectElement.selectedIndex].getAttribute("data-prix");
    selectedSizeTaille = selectElement.options[selectElement.selectedIndex].getAttribute("data-taille");
    selectedSizeId = selectElement.value;

    // Mettre à jour les champs cachés
    document.querySelector('input[name="selectedSizeId"]').value = selectedSizeId;
    document.querySelector('input[name="selectedSizePrice"]').value = selectedSizePrice;
    document.querySelector('input[name="selectedSizeTaille"]').value = selectedSizeTaille;

    // Mettre à jour l'élément prix avec le nouveau prix
    let priceElement = document.getElementById("prix");
    if (selectedSizePrice !== null) {
      priceElement.innerText = selectedSizePrice + " €";
    } else {
      priceElement.innerText = " - ";
    }
}