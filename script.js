//section animation
const sections = document.querySelectorAll('section');
window.addEventListener('scroll', checkSections) ;// en gros ajouter une animaton de défilenemnt a partir du scroll down

function checkSections() {
  const triggerBottom = window.innerHeight;
  sections.forEach(section => {
    const sectionTop = section.getBoundingClientRect().top;

    if (sectionTop < triggerBottom ) {
        section.classList.add('active');
        
    }else{
        section.classList.remove('active');
        
    }
  })  
} 
// menu animation js
var menu = document.querySelector('.menu');
var nav = document.querySelector('.nav');

  menu.onclick = function () {
   menu.classList.toggle('show');
   nav.classList.toggle('show');
  }