<!DOCTYPE html>
<html lang="zxx">
    <head>
        <title>About Me - HTML Portfolio by Mark Jason Acab - Using CSS Grid and Flexbox</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">   
        <meta charset="utf-8">    
        
        <meta content="About Mark Jason Acab - Full Stack Web Developer" name="title">
        <meta content="Web Developer, Portfolio, Full Stack Developer, Mark Jason Acab" name="keywords">
        <meta content="Mark Jason Acab is a full stack web developer based in UK. He uses Laravel for backend and VueJS for front end development." name="description">

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
    </head>
    <body class="grid">
        <?php require 'includes/sidebar.php'; ?>

        <!-- Main Content -->
        <main class="content about-content">
            <div id="header" class="header" >                
                    <h1 id="typing">
                        About Me
                    </h1>                
            </div>
            <div id="about" class="about"> 
                <div class="row">
                    <div class="col-12">
                        <div class="card card-about">
                            <div class="row">
                                <div class="col-12 col-lg-7 col-xl-8">
                                    <div class="top-pic">
                                        <img src="images/mark-jason-acab.jpg" alt="Mark Jason Acab">
                                    </div>
                                    <h3>About Me</h3>
                                    <p>Hi! I have a Bachelor’s Degree in Computing and I majored in Computer Science. I’m looking to secure a role in web development. 
                                        I have experience working on the tech industry back in the Philippines. My last role required me to work on the management side of things, 
                                        where I had the opportunity to lead a small team of developers. Aside from being their lead developer, my duties involved making sure all milestones were completed on time.
                                    </p>
                                    <p>
                                        I migrated to the UK just this year and as part of my journey to build a career here, I decided to start from the basics and join the SCS Scheme with Netmatters. 
                                        As a student I find the course to be very rewarding, it not only refreshes what I know but it also enhances it, as it allowed me to re-learn other parts that I overlooked before.
                                    </p>
                                    <p>                                       
                                        I have a very keen eye on detail and I don’t stop until I find solutions to a given problem. Some of my previous works can be found <a href="https://www.chiefofstack.com/" target="_blank">here</a> 
                                    </p>
                                        
                                    <h3>Skills</h3>
                                    <p>PHP, Javascript, CSS, SASS, jQuery, Vue, Laravel, cPanel, AWS, Docker, Wordpress </p>
                                </div>
                                <div class="col-12 col-lg-5 col-xl-4">
                                    <img src="images/mark-jason-acab.jpg" alt="Mark Jason Acab" class="right-pic">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="footer">
                <a href="#header" class="scroll-btn">                        
                    <div class="chevron-up"></div>
                    <div class="chevron-up"></div>
                    <span class="label">Back to top</span>
                </a>
            </div>

        </main>
        <script src="https://kit.fontawesome.com/efff71aefd.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="js/typewriter.js"></script>
        <script src="js/main.js"></script>
        <script src="js/about.js"></script>
    </body>
</html>