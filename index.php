<?php
$currentPage = "Home";
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
                            <img src="images/netmatters-rebuild.jpg" alt="this is an alt text">
                            <h2>Netmatters Website</h2>
                            <p>Fully responsive rebuild of the Netmatters homepage using SASS, Bootstrap, HTML and Javascript. Features a drop-down mega menu, slideshow, sidebar and cookie consent popup which are all based on jQuery. Compatible with screen sizes 280px and up.</p>
                            <a href="https://netmatters.mark-acab.netmatters-scs.co.uk/" class="btn btn-sm btn-read-more" target="_blank">View Project <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="card">
                            <img src="images/digest-website.jpg" alt="this is an alt text">
                            <h2>Digest.ph Website</h2>
                            <p>I built the backbone of the project using Laravel and VueJS, it features a CMS, taxonomoy, Video Call, Messaging/Chat, Document Search and much more. I also helped train junior developers and supervised them as they improved the site based on the owner's requests.</p>
                            <a href="https://digest.ph" class="btn btn-sm btn-read-more" target="_blank">View Project <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="card">
                            <img src="images/istar-website.jpg" alt="this is an alt text">
                            <h2>iStar Website</h2>
                            <p>Complete website build using Wordpress. I created a theme based on a ready made HTML template and customized it based on the wireframe we designed. The site features 3rd party shopping cart integration, full width slideshow, contact form and blog pages.</p>
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
                                        <span class="email-address"><a href="mailto:mark@netmatters-scs.co.uk">mark@netmatters-scs.co.uk</a></span>
                                    </p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <h3>Send Me A Message</h3>
                                    <p class="form-message">* Required</p>                                    
                                    <div class="contact-form">
                                        <form method="post">
                                            <div class="input-fields">
                                                <div class="form-group">
                                                    <input type="text" id="firstName" name="firstName" class="input-field" placeholder="First Name *">
                                                    <span class="input-error"></span>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" id="lastName" name="lastName" class="input-field" placeholder="Last Name *">
                                                    <span class="input-error"></span>
                                                </div>
                                            </div>           
                                            <div class="form-group">
                                                <input type="text" id="email" name="email" class="input-field" placeholder="Email *  (ex. name@email.com)">
                                                <span class="input-error"></span>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" id="telephone" name="telephone" class="input-field" placeholder="Telephone (ex. +447471434452, 07471434452)">
                                                <span class="input-error"></span>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" id="subject" name="subject" class="input-field" placeholder="Subject *">
                                                <span class="input-error"></span>
                                            </div>
                                            <div class="form-group">
                                                <textarea id="message-field" name="message-field" class="message-field input-field" placeholder="Message *" rows="10"></textarea>
                                                <span class="input-error"></span>
                                            </div>
                                            <a href="#" id="sendMessage" class="btn btn-sm btn-read-more">Send Message<i class="fa fa-paper-plane"></i></a>
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