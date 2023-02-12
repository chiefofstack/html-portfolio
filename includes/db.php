<?php 
include 'constants.php';

// The database class, has all the methods for interacting with the database

class databaseObject{
    protected $connection;
    public $error;

    // Constructor class, attempts a connection using the credentials and the default options 
    public function __construct($host, $username, $password, $database){
        $dataSourceName = "mysql:host=$host;dbname=$database;charset=utf8mb4";
        $options = [
            PDO::ATTR_EMULATE_PREPARES   => false,  // use real statements
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //enable errors as exception
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //fetch are associative
        ];

        try {
            $this->connection = new PDO($dataSourceName, $username, $password, $options);
        } catch (Exception $e) {
            error_log($e->getMessage());
            $this->error =  $e->getMessage(); //Error  
        }

    }

    // save message to table
    public function saveMessage($firstName, $lastName, $email, $telephone, $subject, $message){
        try {
            $query = $this->connection->prepare("INSERT into `messages` (`first_name`, `last_name`, `email`, `telephone`, `subject`, `message` ) VALUES ('$firstName','$lastName','$email', '$telephone', '$subject', '$message')");
            $query->execute();
        } catch (Exception $e) {
            error_log($e->getMessage());
            $this->error =  $e->getMessage(); 
            return -2; //Error  
        }

        return 1;
    }

    // returns an array of messages from the database query
    public function getMessages(){
        try {
            $query = $this->connection->prepare('SELECT * FROM messages ORDER BY id ASC ');
            $query->execute();
            $results = $query->fetchAll();
            return $results;
        } catch (Exception $e) {
            error_log($e->getMessage());
            $this->error =  $e->getMessage(); //Error  
        }
    }
}

$dbConnection = new databaseObject(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

?>