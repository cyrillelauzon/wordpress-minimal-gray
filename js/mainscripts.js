



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