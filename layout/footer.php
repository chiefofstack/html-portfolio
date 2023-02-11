        <script src="https://kit.fontawesome.com/efff71aefd.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <?php 
        if($currentPage == "Coding Examples"){
    
            echo'<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>    
            <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>    
            <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/normalize-whitespace/prism-normalize-whitespace.min.js"></script>';
            }
        ?>

        <script src="js/typewriter.js"></script> 
        <script src="js/main.js"></script>       
        <?php 
        switch($currentPage){
            case "Home": $pageJS = "home.js"; break;
            case "About Me": $pageJS = "about.js"; break;
            case "Coding Examples": $pageJS = "coding-examples.js"; break;
            case "SCS Scheme": $pageJS = "scs-scheme.js"; break;
        } 
        ?>    
        <script src="js/<?php echo $pageJS; ?>"></script>
    </body>
</html>