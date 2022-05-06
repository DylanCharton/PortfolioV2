/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
// import './styles/app.css';
import './bootstrap.min.css'
import 'bootstrap'
import './styles/app.css'


// ScrollReveal custom JS 
    // homepage
ScrollReveal().reveal('.simple-appearance');

// Switch colors button

let themeSelector = document.querySelector('#theme-select');
let body = document.body;



themeSelector.addEventListener('click', (e)=>{
    e.preventDefault();

    if(themeSelector.classList.contains('theme-switched')){
        themeSelector.classList.remove('theme-switched');
        themeSelector.classList.replace('fa-moon', 'fa-sun');
    } else {
        themeSelector.classList.add('theme-switched');
        themeSelector.classList.replace('fa-sun', 'fa-moon');
    }

    body.classList.toggle('dark-mode');

})
    



