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
    .start();


// Contact form validation
// returns true if input is valid 
function validate(field, label, required, type){
    const inputField = $(`#${field}`);    
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/; //email regex
    const phonePattern = /^(((\+44\s?\d{4}|\(?0\d{4}\)?)\s?\d{3}\s?\d{3})|((\+44\s?\d{3}|\(?0\d{3}\)?)\s?\d{3}\s?\d{4})|((\+44\s?\d{2}|\(?0\d{2}\)?)\s?\d{4}\s?\d{4}))(\s?\#(\d{4}|\d{3}))?$/ //UK phone regex
    var option;
    let passed = true;
    
    // Validate required
    if (required){        
        if(inputField.val()==""){
            inputField.addClass('input-field-error');
            inputField.siblings('.input-error').text(`${label} is required`);
            return false;
        }
        else{
            // Validate patterns 
            if(type == 'email'){
                passed = emailPattern.test(inputField.val().trim());
            }
            else if(type == 'phone'){
                passed = phonePattern.test(inputField.val().trim());
            }
            else{
                passed = true;
            }
                        
            //show errors
            if(!passed ){
                inputField.addClass('input-field-error');
                inputField.siblings('.input-error').text(`Please enter a valid ${label}`);
                return false;        
            }
            else{
                inputField.removeClass('input-field-error');
                inputField.siblings('.input-error').text('');
                return true;
            }        
        }
    }
    else{
        if(inputField.val()!=""){
            // Validate patterns 
            if(type == 'email'){
                passed = emailPattern.test(inputField.val().trim());
            }
            else if(type == 'phone'){
                passed = phonePattern.test(inputField.val().trim());
            }
            else{
                passed = true;
            }
                        
            //show errors
            if(!passed ){
                inputField.addClass('input-field-error');
                inputField.siblings('.input-error').text(`Please enter a valid ${label}`);
                return false;        
            }
            else{
                inputField.removeClass('input-field-error');
                inputField.siblings('.input-error').text('');
                return true;
            }       
        }
        else{
            return true;            
        }
    }
}


$('#sendMessage').on('click', ()=>{    
    const firstName = $('#firstName');
    const lastName = $('#lastName');
    const email = $('#email');
    const subject = $('#subject');
    const message = $('#message-field');
    let errorCount = 0;

    if(!validate('firstName','First name', true, "text")) {errorCount++};
    if(!validate('lastName','Last name', true,"text")) {errorCount++};
    if(!validate('email','Email', true, "email")) {errorCount++}; 
    if(!validate('telephone','Telephone', false, 'phone')) {errorCount++};
    if(!validate('subject','Subject', true, "text")) {errorCount++};
    if(!validate('message-field','Message', true, "text")) {errorCount++};


    if(errorCount > 0){
        $('.form-message').removeClass('success');
        $('.form-message').addClass('not-success');
        $('.form-message').text(`Sorry there were ${errorCount} errors in the form.`);
    }
    else{
        let displayName = firstName.val();
        $('form :input').val('');
        $('.form-message').removeClass('not-success');
        $('.form-message').addClass('success');
        $('.form-message').text(`Thanks ${displayName}! your message has been sent.`);
    }

});