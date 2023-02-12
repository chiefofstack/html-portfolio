<?php
$currentPage = "Coding Examples";
include 'layout/header.php';
?>

        <!-- Main Content -->
        <main class="content">
            <div id="header" class="header" >                
                    <h1 id="typing">
                        Coding Examples
                    </h1>                
            </div>
            <div id="coding-examples" class="coding-examples">
            <h3>Back-end validation with PHP</h3>
                <pre>
                    <code class="language-php">
                        public function sendMessage($firstName,$lastName,$email,$telephone,$subject,$message){
                        global $form, $dbConnection;

                        /* Validate inputs */

                        // firstName error checking
                        $field = "firstName";  
                        if(!$firstName || strlen($firstName = trim($firstName)) == 0){
                            $form->setError($field, "* First name is required");
                        }
                        else{
                            $firstName = stripslashes($firstName);
                            if(strlen($firstName) < 2){
                                $form->setError($field, "* First name too short");
                            }
                            else if(strlen($firstName) > 35){
                                $form->setError($field, "* First name too long");
                            }
                            /* Check if name is not alphanumeric */
                            else if(!preg_match("/^[a-zA-Z-\s']*$/", $firstName)){
                                $form->setError($field, "* Please enter a valid first name");
                            }            
                        }
                
                
                        // Email error checking 
                        $field = "email"; 
                        if(!$email || strlen($email = trim($email)) == 0){
                            $form->setError($field, "* Email is required");
                        }
                        else{
                            $email = stripslashes($email);
                            if(strlen($email) > 254){
                                $form->setError($field, "* Email too long");
                            }
                            /* Check if valid email address */
                            if(!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/", $email)){
                                $form->setError($field, "* Please enter a valid email");
                            }            
                        }
                    
                        // Telephone error checking 
                        $field = "telephone"; 
                        if(!$telephone || strlen($telephone = trim($telephone)) == 0){
                            $form->setError($field, "* Telephone is required");
                        }
                        else{
                            $telephone = stripslashes($telephone);
                            if(strlen($telephone) < 11){
                                $form->setError($field, "* Telephone too short");
                            }
                            else if(strlen($telephone) > 13){
                                $form->setError($field, "* Telephone too long");
                            }
                            /* Check if name is not alphanumeric */
                            else if(!preg_match("/^(((\+44\s?\d{4}|\(?0\d{4}\)?)\s?\d{3}\s?\d{3})|((\+44\s?\d{3}|\(?0\d{3}\)?)\s?\d{3}\s?\d{4})|((\+44\s?\d{2}|\(?0\d{2}\)?)\s?\d{4}\s?\d{4}))(\s?\#(\d{4}|\d{3}))?$/", $telephone)){
                                $form->setError($field, "* Please enter a valid telephone");
                            }     
                        }                    

                        // Message error checking
                        $field = "message";  
                        if(!$message || strlen($message = trim($message)) == 0){
                            $form->setError($field, "* Message is required");
                        }
                        else{
                            $message = stripslashes($message);
                            if(strlen($message) < 2){
                                $form->setError($field, "* Message too short");
                            }
                            else if(strlen($message) > 2000){
                                $form->setError($field, "* Message too long");
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
                                $result = $dbConnection->saveMessage($firstName, $lastName, $email, $telephone, $subject, $message);
                                if(!$result){
                                    return -2; // -2 = error while saving
                                }
                                else{
                                    return 1; // success!
                                }
                            }
                        }
                    }
                    </code>     
                </pre>
                <p>This method accepts input fields, and saves it to the database if it passes validation. Otherwise it returns the errors and values back to the form.
                    This method resides inside a "session class" that has other methods such as filterInputs() and is used in conjuction with a "form class" that handle how to return errors and values back to the form. 
                </p>        

                
                <h3>Front-end validation with Javascript</h3>
                <pre>
                    <code class="language-js">
                    function validate(field, label, required, type){
                        const inputField = $(`#${field}`);    
                        const namePattern = /^[a-zA-Z-\s']*$/; 
                        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/; 
                        const phonePattern = /^(((\+44\s?\d{4}|\(?0\d{4}\)?)\s?\d{3}\s?\d{3})|((\+44\s?\d{3}|\(?0\d{3}\)?)\s?\d{3}\s?\d{4})|((\+44\s?\d{2}|\(?0\d{2}\)?)\s?\d{4}\s?\d{4}))(\s?\#(\d{4}|\d{3}))?$/; //UK phone regex , 
                        const textPattern = /^[\w\-\s\.\,]+$/; 
                        
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
                            else if(!textPattern.test(inputField.val().trim())){
                                error = `${label} not alphanumeric`;
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
                    </code>     
                </pre>
                <p>The validate() method accepts the type of field to be tested and returns true if the input is valid and false otherwise. Input fields are tested for string length and compared to a pattern. 
                    I used this together with jQuery on('input') event to fire the validation as the user types on the field. 
                </p>           

                <h3>Laravel Trait</h3>
                <pre>
                    <code class="language-php">
                        trait SearchTrait
                        {
                          public function extractCommonWords($string){
                            $stopWords = array('i','a','about','an','and','are','as','at','be','by','vs','v','com','de','en','for','from','how','in','is','it','la','of','on','or');   //sample array of stop words
                            $acronyms = array('ca'=>'court of appeals','nlrc'=>'national labor relations commission','comelec'=>'commission on election', 'up' => 'university of the philippines' ); //sample array of acronymns used

                            $string = preg_replace('/\s\s+/i', '', $string); // replace whitespace
                            $string = trim($string); // trim the string
                            $string = preg_replace('/[^a-zA-Z0-9 -]/', '', $string); // only take alphanumerical characters, but keep the spaces and dashes too…
                            $string = strtolower($string); // lowercase
                        
                            //put words in array
                            preg_match_all('/\b.*?\b/i', $string, $matchWords);
                            $matchWords = $matchWords[0];
                        
                            //add acronym equivalent
                            foreach ( $matchWords as $key=>$item ) {
                                foreach ( $acronyms as $short=>$long ) {
                                    if (strcmp($item,$short) == 0 ) {
                                        $acroWords =  explode(" ",$long);
                                        foreach($acroWords as $acroWord){
                                          array_push ($matchWords, $acroWord);
                                        }
                                    }
                                }
                            }
                        
                            //remove all stop words, empty matches and single letters
                            foreach ( $matchWords as $key=>$item ) {
                                if ( $item == '' || in_array(strtolower($item), $stopWords) || strlen($item) <= 1 ) {
                                    unset($matchWords[$key]);
                                }
                            }
                        
                            $wordCountArr = array();
                            if ( is_array($matchWords) ) {
                                foreach ( $matchWords as $key => $val ) {
                                    $val = strtolower($val);
                                    if ( isset($wordCountArr[$val]) ) {
                                        $wordCountArr[$val]++;
                                    } else {
                                        $wordCountArr[$val] = 1;
                                    }
                                }
                            }
                            arsort($wordCountArr);
                            return $wordCountArr;
                          }

                    </code>     
                </pre>
                <p>This function filters out unnecessary stop words and replaces acronymns with equivalent values. It is essential as it makes the search string produce more relevant results. 
                    The function first removes whitespace and non-alphanumeric characters, then puts words in an array and loops through it to replace the acronymns, then do another loop to remove stop words (and 1 letter words).
                    The last and final loop is used to count the number of occurance of a keyword and store it in an associative array. Finally a sorted array is returned based on the number of occurance of the keyword.
                    I placed this method inside a Laravel Trait so that it can be reused across all controllers by simply including the trait 'SearchTrait'.</p>
                   

                
                <h3>Eloquent Query with Elastic Search</h3>
                <pre>
                    <code class="language-php">
                        public function index(Request $request)
                        {
                            // Convert special characters to HTML entities                            
                            $keyword = htmlspecialchars($request->keyword);
                            $ponente = htmlspecialchars($request->ponente);
                            $gr_no = htmlspecialchars($request->gr_no);
                            $gteyear = htmlspecialchars($request->gteyear);
                            $lteyear = htmlspecialchars($request->lteyear);
                            $sort = ($request->sort) ? $request->sort: 0;
                            $order = $this->getOrder($sort);
                            $filtered = $this->filtered =  $this->isFiltered($request);
                    
                            $this->keyword = 0;
                            $numberOfEntries = 10;                    
                            
                            // Define the search rules for Elastic Search
                            if($keyword || $filtered){

                               $selectfields = ['id','title', 'ponente', 'gr_no','decision_date','search_title','common_title','slug','landmark','cited_last','cited_count','views'];
                               $this->search_rules = array();
                               if($keyword){
                                  $this->search_rules[] = array(
                                    'match' => [
                                        'title' => [
                                            'query' => $keyword,
                                            'boost' => 3,
                                        ]
                                    ]
                                  );
                               }
                    
                               if($gr_no){
                                  $this->search_rules[] = array(
                                    'match' => [
                                        'gr_no' => [
                                            'query' => $gr_no,
                                            'boost' => 3
                                        ]
                                    ]
                                  );
                               }
                               if($ponente){
                                  $this->search_rules[] = array(
                                    'match' => [
                                        'ponente' => [
                                            'query' => $ponente,
                                            'boost' => 3
                                        ]
                                    ]
                                  );
                               }
                               if($gteyear || $lteyear){
                                  $this->search_rules[] = array(
                                      'range' => [
                                          'decision_date' => [
                                              'gte' => $gteyear."||/y",
                                              'lte' => $lteyear."||/y",
                                              'format' => "yyyy"
                                          ]
                                      ]
                                  );
                               }
                               
                               // Apply Search Rule
                               if($keyword){
                                   $query = Decision::search($keyword)->select($selectfields)
                                       ->rule(function($builder) {
                                           return [
                                               ($this->keyword && $this->filtered) ? 'must':'should' =>
                                               [  $this->search_rules
                                               ]
                                            ];
                                       });
                               }
                               else {
                                   $query = Decision::search(' ')->select($selectfields)
                                   ->rule(function($builder) {
                                       return [
                                           'must' =>
                                           [  $this->search_rules
                                           ]
                                        ];
                                   });
                               }                   
                    
                    
                               if($sort)
                               {  $sort = $this->getSortKeyword($sort);
                                  $query = $query->orderBy($sort, $order);
                               }
                    
                              $decisions = $query->paginate($numberOfEntries)->appends('sort',$request->sort)->appends('keyword',$keyword)->appends('ponente',$ponente)->appends('gteyear',$gteyear)->appends('lteyear',$lteyear);
                           }                        
                    
                    
                          return view('frontend.decisions.index',['decisions' => $decisions,'keyword' => $keyword,'gr_no' => $gr_no,'ponente' => $ponente]);
                        }
                    
                    
                    </code>     
                </pre>
                <p>The function shown above is a trimed version of the index page controller for Decisions (Court Case Decisions). 
                    The search form on the page has a keyword field and other fields to filter the results such as ponente, gr_no and decision date.
                    Special characters that are submitted are converted to HTML entities. Then search rules are defined based on which fields have values.
                    The search rules are then applied to the Model using the search() method followed by the select() method.
                    The function returns the index view containing the paginated decisions and previous entries
                   </p>
                
                
                <h3>SASS Mixin</h3>
                <pre>
                    <code class="language-scss">
                        @mixin triangle($color: null, $size: 90px) {
                            width: 0;
                            height: 0;
                            content: '';
                            z-index: 1;
                            border-style: solid;
                            border-width: 35px $size 0;
                            z-index:4;
                            @if($color != null){
                                border-color: $color transparent transparent;
                            }
                        }
                    </code>     
                </pre>
                <p>This is a simple example of a reusable mixin in SASS which I call on other class styles. I added a size parameter to accomodate different widths and also color for custom colors as needed. </p>
                                
                <h3>Simple SQL Subquery</h3>                
                <p> 
                    The objective of this simple SQL sub-query is to find all movies of type comedy which only run 2 hours or less, it should display the movie title and run-time columns. <br>
                </p>
                <pre>
                    <code class="language-sql">
                        SELECT mov_title, mov_time FROM movie 
                        WHERE mov_id IN(
                            SELECT mov_id FROM movie_genres 
                            WHERE gen_id IN (
                                SELECT gen_id FROM genres 
                                WHERE gen_title = 'Comedy')
                            ) 
                        AND mov_time <= 120
                    </code>     
                </pre>                
                <p> 
                    <b>Breakdown:</b> On the innermost select statement, I simply retrieved the gen_id of 'Comedy' from the genres table. I then used that gen_id to get all the movies that have that genre from the movie_genres table. On the last query, I used all the mov_ids to get the titles and mov_times, and also where I used the mov_time to filter out movies that are greater than 120 minutes (2 hours).
                </p>
                
                <img src="images/result.jpg" class="result" alt="Query result">
                <p> 
                   <b>Result:</b> After running the SQL code on the online editor, this is the result. <br>
                </p>

                <img src="images/movie-database.png" alt="Movie Database"><br>
                <p> 
                   <b>Database:</b> This is the database from w3resource for reference. <br>
                </p>

                                
            </div>

            <div class="footer">
                <a href="#header" class="scroll-btn">                        
                    <div class="chevron-up"></div>
                    <div class="chevron-up"></div>
                    <span class="label">Back to top</span>
                </a>
            </div>

        </main>
<?php
include 'layout/footer.php';
?>