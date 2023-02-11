<?php 

// The session class, handles starting the session
include 'db.php';
include 'form.php';

class sessionObject{
    public $errors = array();
    public $values = array();
    public $errorCount;

    // Constructor class, start the session 
    public function __construct(){
        session_start();   //Tell PHP to start the session
    }

    // Filter inputs
    public function filterInputs($post = array()){
        foreach($post as $key => $value){
            if($key == 'email'){
                $post[$key] = filter_var( $value, FILTER_SANITIZE_EMAIL );
            }
            else{
                $post[$key] = filter_var( $value, FILTER_SANITIZE_STRING );
            }
        }
        return $post;
    }

    public function enquire($name,$company,$email,$telephone,$subject,$message,$optIn){
        global $form, $dbConnection;

        /* Validate inputs */

        // Name error checking
        $field = "name";  
        if(!$name || strlen($name = trim($name)) == 0){
            $form->setError($field, "* Name not entered");
        }
        else{
            $name = stripslashes($name);
            if(strlen($name) < 2){
                $form->setError($field, "* Name below 2 characters");
            }
            else if(strlen($name) > 150){
                $form->setError($field, "* Name above 150 characters");
            }
            /* Check if name is not alphanumeric */
            else if(!preg_match("/^[\w\-\s\.\,]+$/", $name)){
                $form->setError($field, "* Name not alphanumeric");
            }            
        }
 

        // Company error checking
        $field = "company"; 
        if($company != NULL){
            $company = stripslashes($company);
            if(strlen($company) < 2){
                $form->setError($field, "* Company below 2 characters");
            }
            else if(strlen($company) > 150){
                $form->setError($field, "* Company above 150 characters");
            }
            /* Check if company is not alphanumeric */
            else if(!preg_match("/^[\w\-\s\.\,]+$/", $company)){
                $form->setError($field, "* Company not alphanumeric");
            }            
        }

        // Email error checking 
        $field = "email"; 
        if(!$email || strlen($email = trim($email)) == 0){
            $form->setError($field, "* Email not entered");
        }
        else{
            /* Check if valid email address */
            $regEx = "/^[_+a-z0-9-]+(\.[_+a-z0-9-]+)*"
            ."@[a-z0-9-]+(\.[a-z0-9-]{1,})*"
            ."\.([a-z]{2,}){1}$/i";
            
            if(!preg_match($regEx, $email)){
                $form->setError($field, "* Email invalid");
            }
            $email = stripslashes($email);
        }
      
        // Telephone error checking 
        $field = "telephone"; 
        if(!$telephone || strlen($telephone = trim($telephone)) == 0){
            $form->setError($field, "* Telephone not entered");
        }
        else{
            if (!ctype_digit($telephone)) {
                $form->setError($field,"Only numbers are allowed");
            } else if(strlen($telephone) > 11){
                $form->setError($field,"Telephone must not exceed 11 digits");
            }
        }
      
        // Subject error checking
        $field = "subject";  
        if(!$subject || strlen($subject = trim($subject)) == 0){
            $form->setError($field, "* Subject not entered");
        }
        else{
            $subject = stripslashes($subject);
            if(strlen($subject) < 2){
                $form->setError($field, "* Subject below 2 characters");
            }
            else if(strlen($subject) > 150){
                $form->setError($field, "* Subject above 150 characters");
            }
            /* Check if subject is not alphanumeric */
            else if(!preg_match("/^[\w\-\s\.\,]+$/", $subject)){
                $form->setError($field, "* Subject not alphanumeric");
            }            
        }

        // Message error checking
        $field = "message";  
        if(!$message || strlen($message = trim($message)) == 0){
            $form->setError($field, "* Message not entered");
        }
        else{
            $message = stripslashes($message);
            if(strlen($message) < 2){
                $form->setError($field, "* Message below 2 characters");
            }
            else if(strlen($message) > 2000){
                $form->setError($field, "* Message above 2000 characters");
            }
            /* Check if message is not alphanumeric */
            else if(!preg_match("/^[\w\-\s\.\,]+$/", $message)){
                $form->setError($field, "* Message not alphanumeric");
            }            
        }


        // If errors found show form again with error messages, else save to database
        if($form->errorCount > 0 ){
            return 0; // 0 = have validation errors
        }
        else{
            if($dbConnection->error)
            {   
                return -1; // -1 = connection error
                
            }else{
                $result = $dbConnection->saveEnquiry($name, $company, $email, $telephone, $subject, $message, $optIn);
                if(!$result){
                    return -2; // -2 = error while saving
                }
                else{
                    return 1; // success!
                }
            }
        }
    }
}

$session = new sessionObject();
$form = new formObject();

?>