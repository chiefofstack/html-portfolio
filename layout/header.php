<!DOCTYPE html>
<html lang="zxx">
    <head>
        <title><?php echo $currentPage != "Home" ? $currentPage. " - ": ""; ?>HTML Portfolio by Mark Jason Acab - Using CSS Grid and Flexbox</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">   
        <meta charset="utf-8">
        <?php
        if($currentPage =="Home"){
            $metaTitle = "Mark Jason Acab Web Developer Portfolio";
            $metaKeywords = "Web Developer, Portfolio, Full Stack Developer";
            $metaDescription = "Mark Jason Acab is a full stack web developer based in UK. He uses Laravel for backend and VueJS for front end development.";
        }
        else if($currentPage =="About Me"){
            $metaTitle = "About Mark Jason Acab - Full Stack Web Developer";
            $metaKeywords = "Web Developer, Portfolio, Full Stack Developer, Mark Jason Acab";
            $metaDescription = "Mark Jason Acab is a full stack web developer based in UK. He uses Laravel for backend and VueJS for front end development.";            
        }
        else if($currentPage =="Coding Examples"){
            $metaTitle = "Coding Examples - Mark Jason Acab - Full Stack Web Developer";
            $metaKeywords = "PHP, Javascript, Laravel, SASS, VueJS, Bootstrap, HTML";
            $metaDescription = "Coding examples on my recent works in the Scion Coalition Scheme Bootcamp and my previous work as a Web Developer.";            
        }
        else if($currentPage =="SCS Scheme"){
            $metaTitle = "Scions Coalition Scheme - Mark Jason Acab - Full Stack Web Developer";
            $metaKeywords = "SCS, Scions, Coalition, Scheme, HTML, CSS, Portfolio";
            $metaDescription = "The Scion Coalition Scheme is an intensive, specially tailored training program run by Netmatters in order to give willing candidates the opportunity to enter the industry as web developers.";            
        }
        ?>

        <meta content="<?php echo $metaTitle; ?>" name="title">
        <meta content="<?php echo $metaKeywords; ?>" name="keywords">
        <meta content="<?php echo $metaDescription; ?>" name="description">
        
        <link href='https://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet'>
        <link href="https://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">

        <link rel="apple-touch-icon" sizes="76x76" href="images/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
        <link rel="manifest" href="images/favicon/site.webmanifest">
        <link rel="mask-icon" href="images/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">

        <link rel="stylesheet" href="css/application.css">
        <?php if($currentPage == "Coding Examples") {
        echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-okaidia.min.css">';
         } ?>

    </head>
    <body class="grid">
        <?php require 'sidebar.php'; ?>