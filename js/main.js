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