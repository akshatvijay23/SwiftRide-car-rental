let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');
let menubar = document.querySelector('#menu');

let menuClick = false;

menu.onclick = () => {
    menuClick = !menuClick;  // toggle the boolean

    if (menuClick) {
        menubar.id = "menu";  // set id to "menuBar"
    } else {
        menubar.id = "";  // remove the id
    }

      // check in console
};

// menubar.onclick=()=>{

// }


window.onscroll = () => {
    menu.classList.remove('bx-x');
    navbar.classList.remove('active')
}
const sr = ScrollReveal(
    {
        distance: '60px',
        duration: 2500,
        delay: 400,
        reset: true
    }
)
sr.reveal('.text',{delay: 400, origin: 'top'})
sr.reveal('.form-container form',{delay: 400, origin: 'left'})
sr.reveal('.heading',{delay: 400, origin: 'top'})
sr.reveal('.ride-container .box',{delay: 400, origin: 'top'})
sr.reveal('.services-container .box',{delay: 400, origin: 'top'})
sr.reveal('.about-container .box',{delay: 400, origin: 'top'})
sr.reveal('.reviews-container',{delay: 300, origin: 'top'})
sr.reveal('.newsletter .newsletter-container',{delay: 300, origin: 'bottom'})
