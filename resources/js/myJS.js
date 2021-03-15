
const navSlide = () => {
    const burger = document.querySelector(".burger");
    const nav = document.querySelector(".navbar-nav");

    const navLinks = document.querySelectorAll(".navbar-nav li");


    burger.addEventListener('click', () => {
        nav.classList.toggle('nav-active');
        //Animate links
        navLinks.forEach((link, index) => {
            if (link.style.animation) {
                link.style.animation = '';
            } else {
                link.style.animation = `navbar-navFade 0.5s ease forwards ${index / 7 + 0.5}s`;
            }

        });
    });





}

navSlide();