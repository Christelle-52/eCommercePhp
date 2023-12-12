// fonction carousel items, produits phares

productScroll();
        
        function productScroll() {
          let slider = document.getElementById("slider");
          let next = document.getElementsByClassName("pro-next");
          let prev = document.getElementsByClassName("pro-prev");
          let slide = document.getElementById("slide");
          let item = document.getElementById("slide");
        
          for (let i = 0; i < next.length; i++) {
            //refer elements by class name
        
            let position = 0; //slider postion
        
            prev[i].addEventListener("click", function() {
              //click previos button
              if (position > 0) {
                //avoid slide left beyond the first item
                position -= 1;
                translateX(position); //translate items
              }
            });
        
            next[i].addEventListener("click", function() {
              if (position >= 0 && position < hiddenItems()) {
                //avoid slide right beyond the last item
                position += 1;
                translateX(position); //translate items
              }
            });
					}
        
          function hiddenItems() {
            //get hidden items
            let items = getCount(item, false);
            let visibleItems = slider.offsetWidth / 260;
            return items - Math.ceil(visibleItems);
          }
        }
        
        function translateX(position) {
          //translate items
          slide.style.left = position * -260 + "px";
        }
        
        function getCount(parent, getChildrensChildren) {
          //count no of items
          let relevantChildren = 0;
          let children = parent.childNodes.length;
          for (let i = 0; i < children; i++) {
            if (parent.childNodes[i].nodeType != 4) { //nombre articles en dehors
              if (getChildrensChildren)
                relevantChildren += getCount(parent.childNodes[i], true);
              relevantChildren++;
            }
          }
          return relevantChildren;
        }

// function de vérification des champs du formulaire d'inscription
        // déclaration de variables à tester

        //   let nom = document.getElementById("nom");
        //   let prenom = document.getElementById("prenom");
        //   let email = document.getElementById("email").value;
        //   let mdp = document.getElementById("mdp").value;
        //   let confirmMdp = document.getElementById("confirmMdp").value;


// const submitInscription=document.getElementById('submitInscription');

// submitInscription.addEventListener('click',() =>{
// console.log("hello");
let input=document.querySelectorAll("input[type=text]");
let email=document.querySelector("input[type=email]");
let password=document.querySelectorAll("input[type=password]");

let i=0;
for (i=0;i<2;i++){
  if(input[i].value=="") {
    input[i].placeholder="Vous devez remplir le champ";
    input[i].style.boxShadow="5px 5px 10px red";
  } 
  else if (input[i].value.length<3){
    // console.log(input[0].value);
    // input[i].value="Minimum 3 car";
    input[i].style.boxShadow="5px 5px 10px red";
   }
  if (email.value=="") {
    email.placeholder="Vous devez remplir le champ";
    email.style.boxShadow="5px 5px 10px red";
}
if(password[i].value=="") {
    password[i].placeholder="Vous devez remplir le champ";
    password[i].style.boxShadow="5px 5px 10px red";
};
console.log(input[i].value);

}
// });
        // function verifForm() { 
         
        //   //déclaration des variables de renvoi d'erreurs
        //   let erreurNom = document.getElementById("erreurNom");
        //   let erreurPrenom = document.getElementById("erreurPrenom");
        //   let erreurEmail = document.getElementById("erreurEmail");
        //   let erreurMdp = document.getElementById("erreurMdp");
        //   let erreurConfirmMdp = document.getElementById("erreurConfirmMdp");
          
        //   //regex de vérification email, mdp
        //   let regexEmail = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(email);
        //   let regexPassword = /^((?=.*[\d])(?=.*[a-z])(?=.*[A-Z])|(?=.*[a-z])(?=.*[A-Z])(?=.*[^\w\d\s])|(?=.*[\d])(?=.*[A-Z])(?=.*[^\w\d\s])|(?=.*[\d])(?=.*[a-z]) (?=.*[^\w\d\s])).{5,}$/.test(mdp);
          
        //   // test de la longueur du nom 
        //   if (nom.value.length<=3){
        //       erreurNom.innerText="Vous devez saisir votre nom";
        //       nom.value = "";
        //   }else{
        //       erreurNom.innerText="";
        //   }
        //   // test de la longueur du prénom 
        //   if (prenom.value.length<=3){
        //       erreurPrenom.innerText="Vous devez saisir votre prénom";
        //       prenom.value ="";
        //   }else{
        //       erreurPrenom.innerText="";
        //   }
          
        //   // test du format de email avec @ et .com, .fr ...
        //   if(!regexEmail){
        //       erreurEmail.innerText="Vous devez saisir votre email";
        //   }else{
        //       erreurEmail.innerText="";
        //   }
        //   //test regex format mot de passe 5 min + 1 M + 1 chiffre + 1 car spé
        //   if(!regexPassword){
        //       erreurMdp.innerText="Vous devez saisir un mdp valide (5 caractères minimum, 1 majuscule, 1 symbole (#,?,!,@,$,%,^,&,*ou-) et 1 chiffre";
        //   }else{
        //       erreurMdp.innerText="";
        //   }
        //   // test confirmation mdp
        //   if(confirmMdp !== mdp){
        //       erreurConfirmMdp.innerText="Vous devez confirmer votre mot de passe";
        //   }else{
        //       erreurConfirmMdp.innerText="";
        //   }
         
        //   if (prenom.length<=3 || nom.length<=3||!regexEmail ||!regexPassword || confirmMdp !== mdp ){
        //       return false;
        //   }
        //   };

//fonction pour passe de l'oeil à l'oeil masqué ie mdp visible ou non

