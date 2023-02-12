<?php
// The process class, processes the submitted form
include 'includes/session.php';


class processObject{    

    // Constructor class
    public function __construct(){
        //process the enquiry form
        if(isset($_POST['sendMessage'])){
            $this->procSendMessage();
        } else {
            // if not from form, redirect to homepage
            header("Location: index.php#contact"); 
        }
    }

    public function procSendMessage(){
        global $session, $form;

        $_POST = $session->filterInputs($_POST);      
        $result = $session->sendMessage($_POST['firstName'],$_POST['lastName'],$_POST['email'],$_POST['telephone'],$_POST['subject'],$_POST['message-field']);
    
        // Save to database successful 
        if($result == 1){
            $_SESSION['name'] = $_POST['firstName'];
            $_SESSION['success'] = 1;
            header("Location: index.php#contact");
        }
        // Validation errors in form
        else if($result == 0){
            $_SESSION['values'] = $_POST;
            $_SESSION['errors'] = $form->getErrors();
            $_SESSION['success'] = 0; //0 = validation errors
            header("Location: index.php#contact");
        }
        /* Database connection error */
        else if($result == -1){
            $_SESSION['name'] = $_POST['firstName'];
            $_SESSION['success'] = -1; //-1 = database connection error
            header("Location: index.php#contact");
        }
        /* Error while saving */
        else if($result == -2){
            $_SESSION['name'] = $_POST['firstName'];
            $_SESSION['success'] = -2; // -2 = error while saving
            header("Location: index.php#contact");
        }
    
    }

}

$process = new processObject();


 

?>