/*jshint esversion: 6 */

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
// validate - returns true if input is valid 
function validate(field, label, required, type){
    const inputField = $(`#${field}`);    
    const namePattern = /^[a-zA-Z-\s']*$/; 
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/; 
    const phonePattern = /^(((\+44\s?\d{4}|\(?0\d{4}\)?)\s?\d{3}\s?\d{3})|((\+44\s?\d{3}|\(?0\d{3}\)?)\s?\d{3}\s?\d{4})|((\+44\s?\d{2}|\(?0\d{2}\)?)\s?\d{4}\s?\d{4}))(\s?\#(\d{4}|\d{3}))?$/; //UK phone regex , 
    
    let error = false;
    // If required and empty, show error and return false right away.
    if (required && inputField.val() == ""){ 
        inputField.addClass('input-field-error');
        inputField.siblings('.input-error').text(`${label} is required`);
        return false;       
    }
    
    // Check lengths and patterns
    // Name
    if(type == 'name'){        
        if (inputField.val().length > 35) {
            error =  `${label} is too long`;
        } 
        else if (inputField.val().length  < 2) {
            error =  `${label} is too short`;
        }
        else if(!namePattern.test(inputField.val().trim())){
            error = `Please enter a valid ${label}`;
        }

    }
    // Email
    else if(type == 'email'){
        if (inputField.val().length > 254) {
            error =  `${label} is too long`;
        } 
        else if(!emailPattern.test(inputField.val().trim())){
            error = `Please enter a valid ${label}`;
        } 
    }
    // Phone
    else if(type == 'phone'){
        if (inputField.val().length > 13) {
            error =  `${label} is too long`;
        } 
        else if (inputField.val().length  < 11) {
            error =  `${label} is too short`;
        }
        else if(!phonePattern.test(inputField.val().trim())){
            error = `Please enter a valid ${label}`;
        } 
    }
    // Subject
    else if(type == 'subject'){
        if (inputField.val().length > 254) {
            error =  `${label} is too long`;
        } 
        else if (inputField.val().length  < 2) {
            error =  `${label} is too short`;
        }
    }
    // Message
    else if(type == 'message'){
        if (inputField.val().length > 2000) {
            error =  `${label} is too long`;
        } 
        else if (inputField.val().length  < 2) {
            error =  `${label} is too short`;
        }
    }

    // Show and return result
    if(error){
        inputField.addClass('input-field-error');
        inputField.siblings('.input-error').text(error);
        return false;        
    }
    else{
        inputField.removeClass('input-field-error');
        inputField.siblings('.input-error').text('');
        return true;
    }
    
}

function displayFormAlert(errorCount, displayName = null){
    if(errorCount > 0){
        $('.form-message').removeClass('success');
        $('.form-message').addClass('not-success');
        $('.form-message').text(`Sorry there were ${errorCount} errors in the form.`);
    }
    else{
        $('form :input').val('');
        $('.form-message').removeClass('not-success');
        $('.form-message').addClass('success');
        $('.form-message').text(`Thanks ${displayName}! your message has been sent.`);
    }
}

// Check each input field
$('#firstName').on('input', ()=>{ validate('firstName','First name', true, "name"); });
$('#lastName').on('input', ()=>{ validate('lastName','Last name', true, "name"); });
$('#email').on('input', ()=>{ validate('email','Email', true, "email"); });
$('#telephone').on('input', ()=>{ validate('telephone','Telephone', true, "phone"); });
$('#subject').on('input', ()=>{ validate('subject','Subject', true, "subject"); });
$('#message-field').on('input', ()=>{ validate('message-field','Message', true, "message"); });

// Check all fields
$('#sendMessage').on('click', ()=>{    
    const displayName = $('#firstName').val();
    let errorCount = 0;

    !validate('firstName','First name', true, "name") && errorCount++
    !validate('lastName','Last name', true,"name") && errorCount++
    !validate('email','Email', true, "email") && errorCount++
    !validate('telephone','Telephone', false, 'phone') && errorCount++
    !validate('subject','Subject', true, "subject") && errorCount++
    !validate('message-field','Message', true, "message") && errorCount++

    displayFormAlert(errorCount, displayName);
});