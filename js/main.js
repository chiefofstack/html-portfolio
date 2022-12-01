// Mobile Menu toggle
const $grid = $('.grid');
const $nav = $('.sidebar > .nav');
const $toggle = $('.btn-toggle');
const $hamburger = $('.btn-toggle > .hamburger');

// Show or Hide Nav menu and toggle button
function toggleMenu(status){
    if(status == "hide"){        
        $grid.removeClass('active');        
        $nav.removeClass('active');
        $hamburger.removeClass('active');
    }
    else{
        $grid.addClass('active');    
        $nav.addClass('active');
        $hamburger.addClass('active');        
    }
}

// Toggle active state of button and nav 
$('.btn-toggle').on('click', function(){    
    if($nav.hasClass('active')){ 
        toggleMenu('hide');      
    }
    else{     
        toggleMenu('show');
    }  
});

// Hide menu on window resize
$(window).on("resize", function(e){
    toggleMenu('hide');
});


// Hide menu if clicked outside the toggler
$(document).on('mouseDown click',function(e) 
{   //do not process the mouse click if on toggle button
    if(!($toggle.is(e.target) || $toggle.has(e.target).length)){ 
        toggleMenu('hide');
    }   

});


//  iOS inner height solution
const appHeight = () => {
    const doc = document.documentElement
    doc.style.setProperty('--app-height', `${window.innerHeight}px`)
}
window.addEventListener('resize', appHeight)
appHeight()
