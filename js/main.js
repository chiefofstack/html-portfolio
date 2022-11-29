// Mobile Menu toggle
const $grid = $('.grid');
const $nav = $('.sidebar > .nav');
const $toggle = $('.btn-toggle');
const $hamburger = $('.btn-toggle > .hamburger');

// Show or Hide Nav menu and toggle button
function toggleMenu(status){
    if(status == "hide"){
        $toggle.after($nav);
        $nav.removeClass('active');
        $hamburger.removeClass('active');
        $grid.removeClass('active');
    }
    else{        
        $nav.parent().after($nav);
        $nav.addClass('active');
        $hamburger.addClass('active');
        $grid.addClass('active');  
    }
}

// Toggle active state of button and nav 
$('.btn-toggle').on('click', function(){    
    if($nav.hasClass('active')){        
        toggleMenu('hide');
        $nav.slideUp(400);  
    }
    else{     
        toggleMenu('show');
        $nav.slideDown(400);     
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


