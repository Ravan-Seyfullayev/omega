var navbar = document.getElementById('navbarIlForLi'),
    hamburgerButton = document.getElementById('hamburgerMenu');
    hamburgerButton.addEventListener('click', () => {
        if(navbar.style.display == "flex") {
            navbar.style.display = "none";
        }
        else {
            navbar.style.display = "flex";
            
        }
    });
    