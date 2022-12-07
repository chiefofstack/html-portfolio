// Typing Effect
const typing = document.getElementById('typing');
var typewriter = new Typewriter(typing, {
    loop: true,
    cursor:'|'
});

typewriter.typeString("About Me ")
    .pauseFor(18000)  
    .start();
