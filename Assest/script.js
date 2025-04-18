const navToggler = document.querySelector(".navbar-toggler");
    const navLinks = document.getElementById("navbarNav");
    const bookNowBtn = document.querySelector(".nav__btn button");

    navToggler.addEventListener("click", () => {
        navLinks.classList.toggle("show");
    });

    document.addEventListener("DOMContentLoaded", function () {
        const navbar = document.querySelector(".navbar");

        window.addEventListener("scroll", function () {
            if (window.scrollY > 50) {
                navbar.classList.add("scrolled");
                bookNowBtn.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
                bookNowBtn.classList.remove("scrolled");
            }
        });
    });






// Function to check if an element is in the viewport
function isInViewport(element) {
  const rect = element.getBoundingClientRect();
  return rect.top <= window.innerHeight && rect.bottom >= 0;
}

// Function to handle scroll events
function handleScroll() {
  const revealElements = document.querySelectorAll('.reveal');

  revealElements.forEach(element => {
    if (isInViewport(element)) {
      element.classList.add('revealed');
    }
  });
}

// Attach the handleScroll function to the scroll event
window.addEventListener("scroll", handleScroll);

// Trigger the handleScroll function on page load to check initial visibility
handleScroll();








