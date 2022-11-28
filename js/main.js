// Typing Effect
const typing = document.getElementById('typing');
var typewriter = new Typewriter(typing, {
    loop: true,
    cursor:'|'
});

typewriter.typeString("Hey! My name is Mark Acab. ")
    .pauseFor(3000)    
    .deleteChars(27)    
    .typeString("I'm a Web Developer.")    
    .pauseFor(3000)
    .deleteAll()
    .typeString('Please check out my works.')
    .pauseFor(3000)
    .deleteAll()
    .start()




    


// Mobile Menu toggle
const $nav = $('.sidebar > .nav');
const $toggle = $('.btn-toggle');
const $hamburger = $('.btn-toggle > .hamburger');

// Toggle active state of button and nav 
$('.btn-toggle').on('click', function(e){    

    if($nav.hasClass('active')){
        $nav.removeClass('active');
        $hamburger.removeClass('active');       
    }
    else{
        $nav.addClass('active');
        $hamburger.addClass('active');       
    }  
    console.log($nav.hasClass('active'));
});

// Hide menu on window resize
$(window).on("resize", function(event){
    $nav.removeClass('active');
    $hamburger.removeClass('active');
});


// Hide menu if clicked outside the toggler or navigation
$(document).on('mouseup',function(e) 
{   //do not process the mouse click if on toggle button
    if(!($toggle.is(e.target) || $toggle.has(e.target).length)){ 
        //remove active class if outside the navigation
        if (!$nav.is(e.target) && $nav.has(e.target).length === 0) 
        {
            $nav.removeClass('active');        
            $hamburger.removeClass('active');
        } 
    }   
});
