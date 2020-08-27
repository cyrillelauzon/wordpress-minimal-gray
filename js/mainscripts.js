



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

function PlaySlideIn(){
    var modalMenu = document.querySelector("#modalMenu");
    modalMenu.classList.add("quickSlideInAnimation");
    $('#modalMenu').modal('show');
}


function PlaySlideOut(){
   

    modalMenu.classList.add("quickSlideOutAnimation");
    
}