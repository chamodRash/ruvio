//------------------------ Go to top button function ----------------------------
window.onscroll = function() {
    scrollFunction();
    stickyNavbar()
};

//Get the button
var scrolltoupBtn = document.getElementById("scrolltoupBtn");

function scrollFunction() {
    if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
        scrolltoupBtn.style.display = "block";
    } else {
        scrolltoupBtn.style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

// --------------------------Sticky Navigation Bar-----------------------
// Get the navbar
var navBar = document.getElementById('navBar');
var services = document.getElementById('services');

// Get the offset position of the navbar
var sticky = navBar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function stickyNavbar() {
  if (window.pageYOffset >= sticky) {
    navBar.classList.add("sticky");
    services.style.marginTop = "90px";
  } else {
    navBar.classList.remove("sticky");
    services.style.marginTop = "";
  };
};



//------------------------------Slider Section-------------------------------
// variables
const items = document.querySelectorAll('.item');
const dots  = document.querySelectorAll('.dot');
const nextBtn = document.querySelector('.right-control');
const prevBtn = document.querySelector('.left-control');
const auto = true;
const intervalTime = 6000;
let slideInterval;

// next button function
const nextSlide = () => {
    //switch the active class in slides
    const active = document.querySelector('.active');
    active.classList.remove('active');
    if (active.nextElementSibling) {
        active.nextElementSibling.classList.add('active');
    } else {
        items[0].classList.add('active');
    }
    //switch the current class in dots
    const current = document.querySelector('.current');
    current.classList.remove('current');
    if (current.nextElementSibling) {
        current.nextElementSibling.classList.add('current');
    } else {
        dots[0].classList.add('current');
    }
};

//Previous button function
const prevSlide = () => {
    //switch the active class in slides
    const active = document.querySelector('.active');
    active.classList.remove('active');
    if (active.previousElementSibling) {
        active.previousElementSibling.classList.add('active');
    } else {
        items[items.length - 1].classList.add('active');

    }
    //switch the current class in dots
    const current = document.querySelector('.current');
    current.classList.remove('current');
    if (current.previousElementSibling) {
        current.previousElementSibling.classList.add('current');
    } else {
        dots[dots.length - 1].classList.add('current');
    }
};

//click event
nextBtn.addEventListener('click', () => {
    nextSlide();
    if(auto) {
        clearInterval(slideInterval);
        slideInterval = setInterval(nextSlide, intervalTime);
    }
});
prevBtn.addEventListener('click', () => {
    prevSlide();
    if(auto) {
        clearInterval(slideInterval);
        slideInterval = setInterval(nextSlide, intervalTime);
    }
});

//auto slide
if (auto) {
    //run next slide at interval
    slideInterval = setInterval(nextSlide, intervalTime);
};


//-------------------------- When user click a navBar link scrolling effect----------------------
//navigation bar links
$(".navBar .Container .navLinks li a[href^='#']").click(function(e) {
	e.preventDefault();
	
	var position = $($(this).attr("href")).offset().top - 90;

	$("body, html").animate({
		scrollTop: position
	} /* speed */ );
});

//head slider button links
$(".slider .item .caption a[href^='#']").click(function(e) {
	e.preventDefault();
	
	var position = $($(this).attr("href")).offset().top - 90;

	$("body, html").animate({
		scrollTop: position
	} /* speed */ );
});


function validateForm() {
    const email = document.getElementById('email');
    const content = document.getElementById('content');
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if(!email.value.match(mailformat)) {
        //alert("You have entered an invalid email address!");
        email.classList.add('contact-error');
        return false;
    } else if (email.value.match(mailformat)) {
        email.classList.remove('contact-error');
    } else if (content.value.length < 25) {
        content.classList.add('contact-error');
        return false;
    } else  if (content.value.length >= 25) {
        content.classList.remove('contact-error');
    }

}

