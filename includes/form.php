<?php 

// The form class, has all the properties and methods for interacting with the form elements

class formObject{
    public $errors = array();
    public $values = array();
    public $errorCount;

    // Constructor class, gets the values when there is an error with the submitted form 
    public function __construct(){
        $this->values = $_SESSION['values'] ?? array();
        $this->errors = $_SESSION['errors'] ?? array();
        $this->errorCount = $_SESSION['errorCount'] ?? NULL;

        if(isset($_SESSION['values'])) unset($_SESSION['values']);
        if(isset($_SESSION['errors'])) unset($_SESSION['errors']);
        if(isset($_SESSION['errorCount'])) unset($_SESSION['errorCount']);
    }

    // Set value - stores the value of an input field
    public function setValue($field, $value){
        $this->values[$field] = $value;
    }

    // Get value - returns the value of an input field, returns empty string if none exists.
    public function getValue($field){
        if(array_key_exists($field,$this->values)){
            return htmlspecialchars(stripslashes($this->values[$field]));
         }else{
            return "";
         }
    }

    // Set error - stores the error of an input field
    public function setError($field, $errorMessage){
        $this->errors[$field] = $errorMessage;
        $this->errorCount = count($this->errors);
    }

    // Get error - returns the error of an input field, returns empty string if none exists.
    public function getError($field){
        if(array_key_exists($field,$this->errors)){
            return $this->errors[$field];
         }else{
            return "";
         }
    }

    // Get errors - returns the array of error messages 
    public function getErrors(){
        return $this->errors;
    }
}



?>