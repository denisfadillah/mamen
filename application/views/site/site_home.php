<?php

$projectTitle = '';
$projectTagline = '';
$headerBackground = '';
$aboutTagline = '';
$aboutContent = '';

if(!empty($settingInfo))
{
    
    foreach ($settingInfo as $si)
    {
        $projectTitle = $si->project_title;
        $projectTagline = $si->project_tagline;
        $headerBackground = $si->header_background;
        $aboutTagline = $si->about_tagline;
        $aboutContent = $si->about_content;
    }
}

?>

<!DOCTYPE html>
<!--[if lt IE 9 ]><html class="no-js oldie" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Hola</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/hola/css/base.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/hola/css/vendor.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/hola/css/main.css">

    <!-- script
    ================================================== -->
    <script src="<?php echo base_url();?>assets/hola/js/modernizr.js"></script>
    <script src="<?php echo base_url();?>assets/hola/js/pace.min.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

    <!-- header
    ================================================== -->
    <header class="s-header">

        <div class="header-logo">
            <a class="site-logo" href="index.html"><img src="<?php echo base_url();?>assets/hola/images/logo.png" alt="Homepage"></a>
        </div>

        <nav class="header-nav-wrap">
            <ul class="header-nav">
                <li class="current"><a class="smoothscroll"  href="#home" title="home">Home</a></li>
                <li><a class="smoothscroll"  href="#about" title="about">About</a></li>
                <li><a class="smoothscroll"  href="#works" title="works">Works</a></li>
                <li><a class="smoothscroll"  href="#contact" title="contact">Contact</a></li>
                <li><a href="<?php echo base_url();?>news" title="blog">Blog</a></li>                
            </ul>
        </nav>

        <a class="header-menu-toggle" href="#0"><span>Menu</span></a>

    </header> <!-- end s-header -->


   <!-- home
   ================================================== -->
   <section id="home" class="s-home page-hero target-section" data-parallax="scroll" data-image-src="<?php echo base_url();?>assets/hola/images/hero-bg.jpg" data-natural-width=3000 data-natural-height=2000 data-position-y=center>

        <div class="overlay"></div>
        <div class="shadow-overlay"></div>

        <div class="home-content">

            <div class="row home-content__main">

                <h3>Hello There</h3>

                <h1>
                   <?php echo $projectTagline; ?>
                </h1>

                <div class="home-content__buttons">
                    <a href="#works" class="smoothscroll btn btn--stroke">
                        Latest Projects
                    </a>
                    <a href="#about" class="smoothscroll btn btn--stroke">
                        More About Me
                    </a>
                </div>

                <div class="home-content__scroll">
                    <a href="#about" class="scroll-link smoothscroll">
                        <span>Scroll Down</span>
                    </a>
                </div>

            </div>

        </div> <!-- end home-content -->

        <ul class="home-social">
            <li>
                <a href="#"><i class="im im-facebook" aria-hidden="true"></i><span>Facebook</span></a>
            </li>
            <li>
                <a href="#"><i class="im im-twitter" aria-hidden="true"></i><span>Twiiter</span></a>
            </li>
            <li>
                <a href="#"><i class="im im-instagram" aria-hidden="true"></i><span>Instagram</span></a>
            </li>
            <li>
                <a href="#"><i class="im im-behance" aria-hidden="true"></i><span>Behance</span></a>
            </li>
            <li>
                <a href="#"><i class="im im-pinterest" aria-hidden="true"></i><span>Pinterest</span></a>
            </li>
        </ul> 
        <!-- end home-social -->

    </section> <!-- end s-home -->


    <!-- about
    ================================================== -->
    <section id="about" class="s-about target-section">
        
        <div class="row narrow section-intro has-bottom-sep">
            <div class="col-full text-center">
                <h3>About</h3>
                <h1>More About Me</h1>
                <p class="lead">
                    <?php echo $aboutTagline; ?>                        
                </p>
            </div>
        </div>

        <div class="row about-content">

            <div class="col-six tab-full left">
                <?php echo $aboutContent; ?>
            </div>

            <div class="col-six tab-full right">
                <h3>I've Got Some skills.</h3>

                <ul class="skill-bars">
                    <li>
                    <div class="progress percent90"><span>90%</span></div>
                    <strong>HTML5</strong>
                    </li>
                    <li>
                    <div class="progress percent85"><span>85%</span></div>
                    <strong>CSS3</strong>
                    </li>
                    <li>
                    <div class="progress percent70"><span>70%</span></div>
                    <strong>JQuery</strong>
                    </li>
                    <li>
                    <div class="progress percent95"><span>95%</span></div>
                    <strong>PHP</strong>
                    </li>
                    <li>
                    <div class="progress percent75"><span>75%</span></div>
                    <strong>Wordpress</strong>
                    </li>   
                    <li>
                    <div class="progress percent90"><span>90%</span></div>
                    <strong>Angular JS</strong>
                    </li>   
                </ul>
            </div>

        </div> <!-- end about-content -->

        <div class="row about-content about-content--buttons">

            <div class="col-six tab-full left">
                <a href="#0" class="btn btn--primary full-width">Download My CV</a>
            </div>
            <div class="col-six tab-full right">
                <a href="#0" class="btn full-width">Hire Me Now</a>
            </div>

        </div> <!-- end about-content buttons -->

        <div class="row about-content about-content--timeline">

            <div class="col-full text-center">
                <h3>My Work Experience.</h3>
            </div>

            <div class="col-six tab-full left">
                <div class="timeline">

                <?php
                    $lenght = floor(count($work)/2);
                    $output1 = array_slice($work, 0, $lenght);
                    $output2 = array_slice($work, $lenght);                

                    foreach ($output1 as $work_item): ?>
                        <div class="timeline__block">
                            <div class="timeline__bullet"></div>
                            <div class="timeline__header">
                                <p class="timeline__timeframe"><?php echo date("F Y", strtotime($work_item['start_work'])); ?> - 
                                <?php 
                                if($work_item['end_work'] == "0000-00-00")
                                    echo "PRESENT";
                                else
                                    echo date("F Y", strtotime($work_item['end_work'])); 
                                ?>
                                    
                                </p>
                                <h3><?php echo $work_item['title']; ?></h3>
                                <h5><?php echo $work_item['tags']; ?></h5>
                            </div>
                            <div class="timeline__desc">
                                <p><?php echo $work_item['work_content']; ?></p>
                            </div>
                        </div> <!-- end timeline__block -->
                <?php
                    endforeach; 
                ?>   

                </div> <!-- end timeline -->
            </div> <!-- end left -->

            <div class="col-six tab-full right">
                <div class="timeline">

                <?php foreach ($output2 as $work_item): ?>
                        <div class="timeline__block">
                            <div class="timeline__bullet"></div>
                            <div class="timeline__header">
                                <p class="timeline__timeframe"><?php echo date("F Y", strtotime($work_item['start_work'])); ?> - <?php echo date("F Y", strtotime($work_item['end_work'])); ?></p>
                                <h3><?php echo $work_item['title']; ?></h3>
                                <h5><?php echo $work_item['tags']; ?></h5>
                            </div>
                            <div class="timeline__desc">
                                <p><?php echo $work_item['work_content']; ?></p>
                            </div>
                        </div> <!-- end timeline__block -->
                <?php
                    endforeach; 
                ?>                    

                </div> <!-- end timeline -->
            </div> <!-- end right -->

        </div> <!-- end about-content timeline -->

    </section> <!-- end about -->
    

    <!-- works
    ================================================== -->
    <section id="works" class="s-works target-section">

        <div class="row narrow section-intro has-bottom-sep">
            <div class="col-full">
                <h3>Portfolio</h3>
                <h1>See My Latest Projects.</h1>
                
                <p class="lead">Lorem ipsum Dolor adipisicing nostrud et aute Excepteur amet commodo ea dolore irure esse Duis nulla sint fugiat cillum ullamco proident aliquip quis qui voluptate dolore veniam Ut laborum non est in officia.</p>
            </div>
        </div>

        <div class="row masonry-wrap">
            <div class="masonry">
<?php foreach ($portfolio as $portfolio_item): ?>
                <div class="masonry__brick">
                    <div class="item-folio">
                        <div class="item-folio__thumb">
                            <a href="<?php echo base_url();?>assets/hola/images/portfolio/gallery/g-<?php echo $portfolio_item['image']; ?>" class="thumb-link" title="The Beetle Car" data-size="1050x700">
                                <img src="<?php echo base_url();?>assets/hola/images/portfolio/<?php echo $portfolio_item['image']; ?>" 
                                     srcset="<?php echo base_url();?>assets/hola/images/portfolio/<?php echo $portfolio_item['image']; ?> 1x, <?php echo base_url();?>assets/hola/images/portfolio/beetle@2x.jpg 2x" alt="">
                                <span class="shadow-overlay"></span>
                            </a>
                        </div>
 
                        <div class="item-folio__text">
                            <h3 class="item-folio__title">
                                <?php echo $portfolio_item['title']; ?>
                            </h3>
                            <p class="item-folio__cat">
                                <?php echo $portfolio_item['tags']; ?>
                            </p>
                        </div>

                        <a href="https://www.behance.net/" class="item-folio__project-link" title="Project link">
                            <i class="im im-link"></i>
                        </a>

                        <div class="item-folio__caption">
                            <p><?php echo $portfolio_item['caption']; ?></p>
                        </div>

                    </div> <!-- end item-folio -->
                </div> <!-- end masonry__brick -->
<?php endforeach; ?> 
                
            </div>
        </div> <!-- end masonry -->

    </section> <!-- end works -->



    <!-- testimonials
    ================================================== -->
    <div class="s-testimonials">

        <div class="overlay"></div>

        <div class="row testimonials-header">
            <div class="col-full">
                <h1 class="h02">What People Say.</h1>
            </div>
        </div>

        <div class="row testimonials">

            <div class="col-full testimonials__slider">

                <div class="testimonials__slide">
                    <img src="<?php echo base_url();?>assets/hola/images/avatars/user-01.jpg" alt="Author image" class="testimonials__avatar">
                    <p>Qui ipsam temporibus quisquam velMaiores eos cumque distinctio nam accusantium ipsum. 
                    Laudantium quia consequatur molestias delectus culpa facere hic dolores aperiam. Accusantium quos qui praesentium corpori.</p>
                    <div class="testimonials__author h06">
                        Tim Cook
                        <span>CEO, Apple</span>
                    </div>
                </div>

                <div class="testimonials__slide">
                    <img src="<?php echo base_url();?>assets/hola/images/avatars/user-05.jpg" alt="Author image" class="testimonials__avatar">
                    <p>Excepturi nam cupiditate culpa doloremque deleniti repellat. Veniam quos repellat voluptas animi adipisci.
                    Nisi eaque consequatur. Quasi voluptas eius distinctio. Atque eos maxime. Qui ipsam temporibus quisquam vel.</p>
                    <div class="testimonials__author h06">
                        Sundar Pichai
                        <span>CEO, Google</span>
                    </div>
                </div>

                <div class="testimonials__slide">
                    <img src="<?php echo base_url();?>assets/hola/images/avatars/user-02.jpg" alt="Author image" class="testimonials__avatar">
                    <p>Repellat dignissimos libero. Qui sed at corrupti expedita voluptas odit. Nihil ea quia nesciunt. Ducimus aut sed ipsam.  
                    Autem eaque officia cum exercitationem sunt voluptatum accusamus. Quasi voluptas eius distinctio.</p>
                    <div class="testimonials__author h06">
                        Satya Nadella
                        <span>CEO, Microsoft</span>
                    </div>
                </div>
                
            </div> <!-- end testimonials__slider -->

        </div> <!-- end testimonials -->

    </div> <!-- end s-testimonials -->



    <!-- s-stats
    ================================================== -->
    <section id="contact" class="s-contact target-section">
        <div class="row narrow section-intro">
            <div class="col-full">
                <h3>Contact</h3>
                <h1>Say Hello.</h1>
                
                <p class="lead">Lorem ipsum Dolor adipisicing nostrud et aute Excepteur amet commodo ea dolore irure esse Duis nulla sint fugiat cillum ullamco proident aliquip quis qui voluptate dolore veniam Ut laborum non est in officia.</p>
            </div>
        </div>

        <div class="row contact__main">
            <div class="col-eight tab-full contact__form">
                <form name="contactForm" id="contactForm" method="post" action="">
                    <fieldset>
    
                    <div class="form-field">
                        <input name="contactName" type="text" id="contactName" placeholder="Name" value="" minlength="2" required="" aria-required="true" class="full-width">
                    </div>
                    <div class="form-field">
                        <input name="contactEmail" type="email" id="contactEmail" placeholder="Email" value="" required="" aria-required="true" class="full-width">
                    </div>
                    <div class="form-field">
                        <input name="contactSubject" type="text" id="contactSubject" placeholder="Subject" value="" class="full-width">
                    </div>
                    <div class="form-field">
                        <textarea name="contactMessage" id="contactMessage" placeholder="message" rows="10" cols="50" required="" aria-required="true" class="full-width"></textarea>
                    </div>
                    <div class="form-field">
                        <button class="full-width btn--primary">Submit</button>
                        <div class="submit-loader">
                            <div class="text-loader">Sending...</div>
                            <div class="s-loader">
                                <div class="bounce1"></div>
                                <div class="bounce2"></div>
                                <div class="bounce3"></div>
                            </div>
                        </div>
                    </div>
    
                    </fieldset>
                </form>

                <!-- contact-warning -->
                <div class="message-warning">
                    Something went wrong. Please try again.
                </div> 
            
                <!-- contact-success -->
                <div class="message-success">
                    Your message was sent, thank you!<br>
                </div>
                        
            </div>
            <div class="col-four tab-full contact__infos">
                <h4 class="h06">Phone</h4>
                <p>Phone: (+63) 555 1212<br>
                Mobile: (+63) 555 0100<br>
                Fax: (+63) 555 0101
                </p>

                <h4 class="h06">Email</h4>
                <p>someone@holawebsite.com<br>
                info@holawebsite.com
                </p>

                <h4 class="h06">Address</h4>
                <p>
                1600 Amphitheatre Parkway<br>
                Mountain View, CA<br>
                94043 US
                </p>
            </div>

        </div>

    </section> <!-- end s-contact -->


    <!-- footer
    ================================================== -->
    <footer>
        <div class="row">
            <div class="col-full">

                <div class="footer-logo">
                    <a class="footer-site-logo" href="#0"><img src="<?php echo base_url();?>assets/hola/images/logo.png" alt="Homepage"></a>
                </div>

                <ul class="footer-social">
                    <li><a href="#0">
                        <i class="im im-facebook" aria-hidden="true"></i>
                        <span>Facebook</span>
                    </a></li>
                    <li><a href="#0">
                        <i class="im im-twitter" aria-hidden="true"></i>
                        <span>Twitter</span>
                    </a></li>
                    <li><a href="#0">
                        <i class="im im-instagram" aria-hidden="true"></i>
                        <span>Instagram</span>
                    </a></li>
                    <li><a href="#0">
                        <i class="im im-behance" aria-hidden="true"></i>
                        <span>Behance</span>
                    </a></li>
                    <li><a href="#0">
                        <i class="im im-pinterest" aria-hidden="true"></i>
                        <span>Pinterest</span>
                    </a></li>
                </ul>
                    
            </div>
        </div>

        <div class="row footer-bottom">

            <div class="col-twelve">
                <div class="copyright">
                    <span>© Copyright Hola 2017</span> 
                    <span>Design by <a href="https://www.styleshout.com/">styleshout</a></span>	
                </div>

                <div class="go-top">
                <a class="smoothscroll" title="Back to Top" href="#top"><i class="im im-arrow-up" aria-hidden="true"></i></a>
                </div>
            </div>

        </div> <!-- end footer-bottom -->

    </footer> <!-- end footer -->


    <!-- photoswipe background
    ================================================== -->
    <div aria-hidden="true" class="pswp" role="dialog" tabindex="-1">

        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">

            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button> <button class="pswp__button pswp__button--share" title=
                    "Share"></button> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title=
                    "Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button> <button class="pswp__button pswp__button--arrow--right" title=
                "Next (arrow right)"></button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>

        </div>

    </div><!-- end photoSwipe background -->

    <div id="preloader">
        <div id="loader"></div>
    </div>


    <!-- Java Script
    ================================================== -->
    <script src="<?php echo base_url();?>assets/hola/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/hola/js/plugins.js"></script>
    <script src="<?php echo base_url();?>assets/hola/js/main.js"></script>

</body>

</html>