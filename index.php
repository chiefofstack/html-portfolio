<?php
$currentPage = "Home";
include 'includes/session.php';
include 'layout/header.php';
?>

        <!-- Main Content -->
        <main class="content">
            <div id="home" class="home" >
                <div class="message">
                    <h1 id="typing">
                        Hey! My name is Mark Acab. <br>I'm a Web Developer 
                    </h1>
                </div>

                <a href="#portfolio" class="scroll-btn">                        
                    <div class="chevron-down"></div>
                    <div class="chevron-down"></div>
                    <span class="label">Scroll down</span>
                </a>
            </div>

            <div id="portfolio" class="portfolio">
                <div class="heading">
                    <h2>My Portfolio</h2>
                </div>        
                <div class="row">
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="card">
                            <img src="images/laravel-company-management.jpg" alt="this is an alt text">
                            <h2>Laravel Company Management</h2>
                            <p>A simple Laravel demo of an admin panel to manage companies and employees. I followed Test Driven Development (TDD) to test that routes are reached after form validation or other queries were made. </p>
                            <a href="https://company.mark-acab.netmatters-scs.co.uk/" class="btn btn-sm btn-read-more" target="_blank">View Project <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="card">
                            <img src="images/js-image-picker.jpg" alt="this is an alt text">
                            <h2>JS Image Picker</h2>
                            <p>A simple demo of javascript arrays in conjuction with input validation and third party API integration. The email field is validated using JS and stored together with the selected image in an array of objects. </p>
                            <a href="https://image-picker.mark-acab.netmatters-scs.co.uk/" class="btn btn-sm btn-read-more" target="_blank">View Project <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="card">
                            <img src="images/contact-form.jpg" alt="this is an alt text">
                            <h2>Frontend and Backend Validation</h2>
                            <p>The form gives realtime feedback as the user types in to the input fields using JS. PHP server side validation is also implemented prior to persisting the data into the database.</p>
                            <a href="#contact" class="btn btn-sm btn-read-more" target="_blank">View Project <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="card">
                            <img src="images/netmatters-rebuild.jpg" alt="this is an alt text">
                            <h2>Netmatters Website</h2>
                            <p>Fully responsive rebuild of the Netmatters homepage using PHP, Javascript, jQuery, SASS, Bootstrap, and HTML. Features a drop-down mega menu, slideshow, sidebar, contact form and cookie consent popup which are all based on PHP and JS. Compatible with screen sizes 280px and up.</p>
                            <a href="https://netmatters.mark-acab.netmatters-scs.co.uk/" class="btn btn-sm btn-read-more" target="_blank">View Project <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="card">
                            <img src="images/digest-website.jpg" alt="this is an alt text">
                            <h2>Digest Web App</h2>
                            <p>The project was built using Laravel and VueJS, it features a stepper form for the contract generator, Elastic Search integration for the Legal researh library, CMS, taxonomoy, messaging/chat, blog and directory. Here I guided junior developers as they improved the site based on company requirements.</p>
                            <a href="https://digest.ph" class="btn btn-sm btn-read-more" target="_blank">View Project <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="card">
                            <img src="images/istar-website.jpg" alt="this is an alt text">
                            <h2>iStar Website</h2>
                            <p>Complete website build using Wordpress. I customized a ready made theme based on the company requirements and integrated 3rd party shopping cart into the UI. The site features full width slideshow, contact form, blog pages as well. It also utilized 3rd pary Wordpress plugins.</p>
                            <a href="https://istarwebsolutions.com" class="btn btn-sm btn-read-more" target="_blank">View Project <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>

            <div id="contact" class="contact">
                <div class="heading">
                    <h2>Contact Me</h2>
                </div>        
                <div class="row">
                    <div class="col-12">
                        <div class="card card-contact">
                            <div class="row">
                                <div class="col-12 col-lg-6">                                    
                                    <h3>Get In Touch</h3>
                                    <p>Please feel free to contact me by telephone or email and I will be sure to get back to you as soon as possible. </p>
                                    <p class="contact-number">
                                        <a href="tel:07479879607">07479879697</a><br>
                                        <span class="email-address"><a href="mailto:mark.acab@netmatters-scs.co.uk">mark.acab@netmatters-scs.co.uk</a></span>
                                    </p>
                                    <p>"A water bottle at the store cost $1. The same bottle at a hotel is $3. At an airport $5. Same bottle, same brand. The only thing that changed is the place. If ever you feel unappreciated, worthless, or undervalued remember that each place gives a different value to the same things."</p>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <h3>Send Me A Message</h3>
                                    <?php 
                                    $message = "";
                                    $messageColor = "";
                                    if(isset($_SESSION['success'])) { 
                                        switch($_SESSION['success']){
                                            case 0: 
                                                $message = "There were errors found in the form."; 
                                                $messageColor = "danger";
                                                break;
                                            case -1: 
                                                $message = "Could not connect to the database."; 
                                                $messageColor = "warning";
                                                break;
                                            case -2: 
                                                $message = "Could not save to the database"; 
                                                $messageColor = "warning";
                                                break;
                                            case 1: 
                                                $message = "Thanks ".$_SESSION['name'].", your message has been sent!"; 
                                                $messageColor = "success";
                                                break;
                                        }
                                    } else {
                                        $message = "* Required";
                                    }
                                    ?>                                    
                                    <p class="form-message <?php echo $messageColor; ?>"><?php echo $message; ?></p>

                                    <div class="contact-form">
                                        <form action="process.php" method="post">
                                            <input type="hidden" name="sendMessage" value="1">
                                            <div class="input-fields">
                                                <div class="form-group">
                                                    <input 
                                                        type="text" 
                                                        id="firstName" 
                                                        name="firstName" 
                                                        class="input-field <?php if($form->getError('firstName')) echo "input-field-error"; ?>" 
                                                        placeholder="First Name *" 
                                                        value="<?php echo $form->getValue('firstName'); ?>"
                                                    >
                                                    <span class="input-error"><?php echo $form->getError('firstName'); ?></span>
                                                </div>
                                                <div class="form-group">
                                                    <input 
                                                        type="text" 
                                                        id="lastName" 
                                                        name="lastName" 
                                                        class="input-field <?php if($form->getError('lastName')) echo "input-field-error"; ?>" 
                                                        placeholder="Last Name *" 
                                                        value="<?php echo $form->getValue('lastName'); ?>"
                                                    >
                                                    <span class="input-error"><?php echo $form->getError('lastName'); ?></span>
                                                </div>
                                            </div>           
                                            <div class="form-group">
                                                <input 
                                                    type="text" 
                                                    id="email" 
                                                    name="email" 
                                                    class="input-field <?php if($form->getError('email')) echo "input-field-error"; ?>" 
                                                    placeholder="Email *  (ex. name@email.com)" 
                                                    value="<?php echo $form->getValue('email'); ?>"
                                                >
                                                <span class="input-error"><?php echo $form->getError('email'); ?></span>                                                
                                            </div>
                                            <div class="form-group">
                                                <input 
                                                    type="text" 
                                                    id="telephone" 
                                                    name="telephone" 
                                                    class="input-field <?php if($form->getError('telephone')) echo "input-field-error"; ?>" 
                                                    placeholder="Telephone (ex. +447471434452, 07471434452)"
                                                    value="<?php echo $form->getValue('telephone'); ?>"
                                                >
                                                <span class="input-error"><?php echo $form->getError('telephone'); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <input 
                                                    type="text" 
                                                    id="subject" 
                                                    name="subject" 
                                                    class="input-field <?php if($form->getError('subject')) echo "input-field-error"; ?>" 
                                                    placeholder="Subject *"
                                                    value="<?php echo $form->getValue('subject'); ?>"
                                                >
                                                <span class="input-error"><?php echo $form->getError('subject'); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <textarea 
                                                    id="message-field" 
                                                    name="message-field" 
                                                    class="message-field input-field <?php if($form->getError('message')) echo "input-field-error"; ?>" 
                                                    placeholder="Message *" 
                                                    rows="10"
                                                ><?php echo $form->getValue('message'); ?></textarea>
                                                <span class="input-error"><?php echo $form->getError('message'); ?></span>
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-read-more">Send Message<i class="fa fa-paper-plane"></i></button>
                                            <?php 
                                            /* Comment out link to disable client side validation*/
                                            // echo '<a href="#" id="sendMessage" class="btn btn-sm btn-read-more">Send Message<i class="fa fa-paper-plane"></i></a>';
                                            ?>                                     
                                        </form>               
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="footer">
                <a href="#home" class="scroll-btn">                        
                    <div class="chevron-up"></div>
                    <div class="chevron-up"></div>
                    <span class="label">Back to top</span>
                </a>
            </div>

        </main>

<?php
include 'layout/footer.php';
?>