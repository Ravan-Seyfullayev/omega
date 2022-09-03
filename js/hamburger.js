
var navbar = document.getElementById('ul')
    btn = document.getElementById('menu');

btn.addEventListener('click', () => {
    if(navbar.style.display == "flex") {
	    navbar.style.display = "none";
    }
    else {
        navbar.style.display = "flex";
        
    }
});
