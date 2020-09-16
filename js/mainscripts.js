



function toggleClass(element, classToggle){
    if(element.classList.contains(classToggle)){
        element.classList.remove(classToggle);
    }
    else{
        element.classList.add(classToggle);
    }

}


/**
 * @description
 */
function afficherOverlay(){
    
    //Affichage de l'overlay
    var overlay = document.getElementById("overlay");
    toggleClass(overlay, "overlay-on");

    //Toggle du menu hamburger vers X et vice-versa
    var toggleMenu = document.getElementById("toggler-button");
    toggleClass(toggleMenu, "toggler-button-on");

}



/**
 * @description RetourHautPage retour animé vers haut de la page
 * NB nécessite JQuery
 */
function RetourHautPage(){
    event.preventDefault();
    $('html, body').animate({
        scrollTop: "0px"
    }, 800);
}

/**
 * @description Intialisation des fonctions de gestion d'affichage des animations slide du menu mobile
 */
function InitWindow(){
    var modalMenu = document.querySelector("#modalMenu");
    modalMenu.addEventListener("animationend", function(){

        if(modalMenu.classList.contains("quickSlideInAnimation")){
            modalMenu.classList.remove("quickSlideInAnimation");
            //modalMenu.classList.add("quickSlideInAnimation");

        }
        else if (modalMenu.classList.contains("quickSlideOutAnimation")){
            modalMenu.classList.remove("quickSlideOutAnimation");
            $('#modalMenu').modal('hide');
        }

    },false);
}


/**
 * @description Handler Lorsque le bouton hamburger est appuyé sur menu mobile
 */
function PlaySlideIn(){

    //Afin de conserver la mise en page mobile de la fenetre de menu modal si la fenêtre est redimensionnée au dela de LG
    var navBarContainer = document.querySelector("#navBarContainer");
    navBarContainer.classList.remove("navbar-expand-lg");
    
    //Play slide-in
    var modalMenu = document.querySelector("#modalMenu");
    modalMenu.classList.add("quickSlideInAnimation");
    $('#modalMenu').modal('show');
}


/**
 * @description Handler Lorsque le bouton X est appuyé sur menu mobile
 */
function PlaySlideOut(){

    //Afin de restaurer la mise en page appropriée de la barre de menu 
    var navBarContainer = document.querySelector("#navBarContainer");
    navBarContainer.classList.add("navbar-expand-lg");

    //Jouer animation slide-out   
    var modalMenu = document.querySelector("#modalMenu");
    modalMenu.classList.add("quickSlideOutAnimation");
    
}