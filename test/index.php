<?PHP
@session_start();
include_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Jatka.in</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="shortcut icon" href="assets/img/favicon/favicon.ico">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/etlinefont.css">
        <link rel="stylesheet" type="text/css" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" type="text/css" href="assets/css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css"/>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
        <link href='https://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css' />
        <!--[if lt IE 9]> <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script> <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> <![endif]-->
    </head>
    <body>
        <div class="pageloader gray-bg">
            <div class="loader"> <img src="assets/img/logo/logo.png" alt="Company Logo" > <br>
                <span>Jatka.in</span>
                <div class="sp-hydrogen"></div>
            </div>
        </div>
        <nav class="main-menu navbar navbar-down navbar-fixed-top">
            <div class="container"><a class="navbar-brand goto" href="#"><img src="assets/img/logo/logo.png" alt="Your logo"></a>
                <button type="button" class="navbar-toggle menu-collapse-btn collapsed" data-toggle="collapse" data-target=".navMenuCollapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <div class="collapse navbar-collapse navMenuCollapse navbar-right">
                    <ul class="nav">
                        <li><a href="#about">About</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#portfolio">Portfolio</a></li>
                        <li><a href="#team">Why Jatka.in</a></li>
                        <li><a href="#testimonial">Testimonial</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="main-content">
            <header class="intro intro-basic cover-bg fixed-bg double-padding dark-bg">
                <div class="color_overlay"></div>
                <div class="slider-fade-bg">
                    <div class="slide">
                        <div class="cover-bg fixed-bg" style="background-image: url(assets/img/background/bg18.jpg);"></div>
                    </div>
                    <div class="slide">
                        <div class="cover-bg fixed-bg" style="background-image: url(assets/img/background/bg17.jpg);"></div>
                    </div>
                    <div class="slide">
                        <div class="cover-bg fixed-bg" style="background-image: url(assets/img/background/bg19.jpg);"></div>
                    </div>
                </div>
                <div class="container mar-bottom-1">
                    <div class="row flex-row-center text-center">
                        <div class="col-md-12">
                            <div class="caption">
                                <h1 class="title">Welcome To <br>
                                    <strong>Jatka.in</strong></h1>
                                <!--            <h2 class="subtitle">Sky is tssshe limit of your dream lorem ipsum.</h2>-->
                                <h2 class="subtitle">Jatka.in bridges the gap between job seekers and employers and emerges as the only platform for <br>
                                    candidates to build crisp and high-impact résumés that catch the eye, maximizing their chances to nail their dream job.</h2>
                                <div class="button-box"> <a class="btn btn-primary" href="<?PHP echo $my_path; ?>/register.aspx">Register Now</a> <a class="btn btn-default" href="<?PHP echo $my_path; ?>/login.aspx">Login</a></div>
                                <p class="desc">Lorem ipsum dolor sit amet, consectetur. Lorem ipsum dolor sit amet, consectetur amet, consectetur.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <section id="content" class="content-section padding">
                <div class="container">
                    <header class="heading_1 text-center">
                        <h2 class="main_title"> Our <span class="base-highlight">Contents</span></h2>
                    </header>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="content_slide_1">
                                <div class="item"> <img class="img-responsive" src="assets/img/background/bga.jpg" alt="Image"></div>
                                <div class="item"> <img class="img-responsive" src="assets/img/background/bgb.jpg" alt="Image"></div>
                                <div class="item"> <img class="img-responsive" src="assets/img/background/bgc.jpg" alt="Image"></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel">
                                    <div class="title" id="headingOne"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">first Message
                                            <p>Create high impact professional resumes in minutes at minimal cost</p>
                                        </a></div>
                                    <div id="collapseOne" class="desc panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne"> Jatka.in ensures your profile has a winning ‘first impression’ with potential employers</div>
                                </div>
                                <div class="panel">
                                    <div class="title" id="headingTwo"> <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">second Message
                                            <p>Build a professional standout resume that catches the eye</p>
                                        </a></div>
                                    <div id="collapseTwo" class="desc panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo"> Jatka.in has dynamic predefined templates with industry-specific keywords</div>
                                </div>
                                <div class="panel">
                                    <div class="title" id="headingThree"> <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">third Message
                                            <p>Get that perfect resume you require to land the job!</p>
                                        </a></div>
                                    <div id="collapseThree" class="desc panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree"> Jatka.in is an easy-to- use advanced, powerful tool that matches top industry expectations</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="about" class="about-us padding gray-bg">
                <div class="container">
                    <header class="heading_1 text-center">
                        <h2 class="main_title"> <span class="sub_title"></span> What We <span class="base-highlight">Are..</span></h2>
                    </header>
                    <ul class="nav nav-tabs alt">
                        <li class="active"><a href="#third-tab" data-toggle="tab" aria-expanded="false">About</a></li>
                        <li class=""><a href="#first-tab" data-toggle="tab" aria-expanded="true">Work</a></li>
                        <li class=""><a href="#second-tab" data-toggle="tab" aria-expanded="false">Nutshell</a></li>
                    </ul>
                    <div class="tab-content alt">
                        <div class="tab-pane fade active in" id="third-tab">
                            <div class="row flex-row-center">
                                <div class="col-md-12">
                                    <h4>About</h4>
                                    <p style="color: black"> When it comes to the job scenario in the professional market, the competition out there is extremely fierce and getting that one interview call seems like <br>
                                        a distant dream for a job seeker.One of the major problems, we must admit, is a weak resume! It is important that a resume has that appeal, relevance and content <br>
                                        that reflects professionalism and effectiveness in a way that depicts a job seeker as the best candidate for the job.</p>
                                    <p style="color: black">Most people struggle with writing their own resumes and often rely on their friends to create a profile of their own. The result, an incomplete weak <br>
                                        resume! When it comes to resume writing, one needs to ensure that it is effective enough to grab the attention of potential recruiters. Some crucial aspects that a well-structured resume needs to address are -<br>
                                    </p>
                                    <ul class="ul-list-slider">
                                        <li>Make a first impression as it is key to a successful interview,</li>
                                        <li>Create a compelling case of one’s candidature,</li>
                                        <li>Adapt to the market dynamics,</li>
                                        <li>Engage content in order to keep ahead of the competition,</li>
                                    </ul>
                                    <!-- <a href="#" class="read-more">Read More</a> --></div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="first-tab">
                            <div class="row flex-row-center">
                                <div class="col-md-8">
                                    <h4>How does Jatka.in work?</h4>
                                    <p style="color: black"> The job seeker can login to Jatka.in and select from a pool of predefined resume templates that are tailor made to match their respective profile so as to highlight and showcase their skills and achievements in a professionally appealing way.The best part about Jatka.in is that it consists of predefined customizable templates, which are formed keeping in mind what employers and recruitment firms ideally look for in a CV in terms of its content and format. They also contain industry-specific keywords which appeal to potential employers when a profile is browsed. </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="second-tab">
                            <div class="row flex-row-center">
                                <div class="col-md-8">
                                    <h4>Jatka.in in a nutshells</h4>
                                    <p style="color: black"> If you want to unlock your chances for an exceptional career path, try Jatka.in, the one and only ideal resume making engine that helps create, depict and connect you to a better professional world. </p>
                                    <p style="color: black"> To conclude, here’s what it’s all about -</p>
                                    <ul class="ul-list-slider">
                                        <li>Resume making engine that caters to job seekers (fresher or experienced professionals)</li>
                                        <li>Consists of dynamic predefined templates containing industry-specific keywords </li>
                                        <li>Assistance of certified professional content writers with 10+ years of expertise</li>
                                        <li>A recruiter’s tool to get specific candidate details as per a pre-set company format</li>
                                    </ul>
                                    <!-- <a href="#" class="read-more">Read More</a> --></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="features-grid pad-top-1 pad-bottom-2 bb-1">
                <div class="container">
                    <header class="heading_1 text-center">
                        <h2 class="main_title"> <span class="sub_title"></span> What Our <span class="base-highlight">Features..</span></h2>
                    </header>
                    <div class="row text-center">
                        <div class="col-sm-4"> <i class="fa fa-bullhorn icon-color-1"></i>
                            <h4>Entry level Resume</h4>
                            <p>Whether you’re about to start your professional career or if you’re embarking on an entirely new

                                career phase or switching industries, our advanced resume making platform is your ultimate solution

                                to maximize your chances of sailing ahead of the competition out there.</p>
                        </div>
                        <div class="col-sm-4"> <i class="fa fa-comments icon-color-2"></i>
                            <h4>Professional and Mid-Career</h4>
                            <p>If you’re an experienced working professional, irrespective of your industry, Jatka.in enables you to

                                create a resume that depicts you in a manner that matches the current industry standards so that

                                you get connected to the best working environment.</p>
                        </div>
                        <div class="col-sm-4"> <i class="fa fa-cloud-download icon-color-3"></i>
                            <h4>Executive</h4>
                            <p>Keen on getting that much coveted leadership position faster, place your trust on Jakta.in and you

                                can rest assured that yours will be one of the best crafted interview-winning executive profiles,

                                which in turn raises your visibility and credibility in and around your business circles.</p>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-sm-4"> <i class="fa fa-leaf icon-color-4"></i>
                            <h4>Experience</h4>
                            <p>Hard pressed for time? Not to worry. We connect you to a team of certified professional content writers with decades of expertise, who can assist, suggest and rightly guide job seekers all through, thanks to their in-depth understanding of present job market and articulating the best skills.</p>
                        </div>
                        <div class="col-sm-4"> <i class="fa fa-cogs icon-color-5"></i>
                            <h4>Quality</h4>
                            <p>When it comes to quality, our motto is to work towards creating highly authoritative profiles which present yours as a powerful business case explaining why a potential employer should hire you. Our resume experts with a successful track record across all industries ensure a winning resume.</p>
                        </div>
                        <div class="col-sm-4"> <i class="fa fa-heart icon-color-6"></i>
                            <h4>Results</h4>
                            <p>We have the expertise. We have the knowledge. We have the right talent and this is what makes us excel at what we do. We strive to provide our customers with THE BEST RESULTS with only one ultimate motive – to maximize their chances of nailing their dream job.</p>
                        </div>
                    </div>
                </div>
            </section>
            <section id="services" class="about-us padding">
                <div class="container">
                    <header class="heading_1 text-center">
                        <h2 class="main_title"> Services We <span class="base-highlight">Provide</span></h2>
                    </header>
                    <ul class="nav nav-tabs alt">
                        <li class="active"><a href="#third-tab" data-toggle="tab" aria-expanded="false">Jobseeker</a></li>
                        <li class=""><a href="#first-tab" data-toggle="tab" aria-expanded="true">CONTENT WRITER</a></li>
                        <li class=""><a href="#second-tab" data-toggle="tab" aria-expanded="false">Recruiter</a></li>
                    </ul>
                    <div class="tab-content alt">
                        <div class="tab-pane fade active in" id="third-tab">
                            <div class="row flex-row-center">
                                <div class="col-md-5"> <img class="img-responsive" src="<?PHP echo $my_path; ?>/images/services/1_jobseeker.jpg" style="width: 350px;height: 280px"> </div>
                                <div class="col-md-6 col-md-offset-1">
                                    <h4>Jobseeker</h4>
                                    <p> Jatka.in is the perfect solution and one-stop software that enables them to independently and effortlessly create their resume with just a few clicks. It consists of a plethora of dynamic predefined templates from which the job seeker may choose from based on their respective industry, domain and of course, their level of experience. </p>
                                    <!-- <a href="#" class="read-more">Read More</a> --></div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="first-tab">
                            <div class="row flex-row-center">
                                <div class="col-md-5">
                                    <div> <img src="<?PHP echo $my_path; ?>/images/about_us/resume_writing_001.jpg"> </div>
                                </div>
                                <div class="col-md-6 col-md-offset-1">
                                    <h4>CONTENT WRITER</h4>
                                    <p> Jatka.in is a unique technology that also bridges the gap for professionals who are hard-pressed for time to create their resume. The platform connects job seekers to a team of certified professional content writers with 10+ years of expertise in writing, who are always happy to assist and suggest them to help articulate.The details of their roles and accomplishments effectively onto paper. In other words, the professional writers will work with professionals until they are completely satisfied with the final order and outlook of their resume. </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="second-tab">
                            <div class="row flex-row-center">
                                <div class="col-md-5"> <img class="img-responsive" src="<?PHP echo $my_path; ?>/assets/images/about_us/recruiter.jpg" style="width: 350px;height: 280px"> </div>
                                <div class="col-md-6 col-md-offset-1">
                                    <h4>Recruiters</h4>
                                    <p> Jatka.in has a unique benefit of giving them a chance where they can demand their potential candidates to submit their details via a specified and predetermined resume format according to their respective company norms. In other words, the resume making engine enables recruiters to create a customized specific resume format so that they can gather only specific candidate details. </p>
                                    <!-- <a href="#" class="read-more">Read More</a> --></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="portfolio" class="portfolio bg-color3 pad-top-1">
                <header class="heading_1 text-center">
                    <h2 class="main_title"> Our <span class="base-highlight">Templates</span></h2>
                </header>
                <!-- <div id="filters-container" class="filters container pad-bottom-2">
                    <button type="button" data-filter="*" class="filter-item-active filter-item tooltip-x"> All <span class="tooltip-x-content"> <span class="tooltip-x-front"><i class="fa fa-check"></i></span> <span class="tooltip-x-back">*<br>
                    All<br>
                    Items</span> </span> </button>
                    <button type="button" data-filter=".web-design" class="filter-item tooltip-x">Web Design <span class="tooltip-x-content"> <span class="tooltip-x-front"><i class="fa fa-css3"></i></span> <span class="tooltip-x-back">5<br>
                    Web Design<br>
                    Item</span> </span> </button>
                    <button type="button" data-filter=".web_dev" class="filter-item tooltip-x">Web Development <span class="tooltip-x-content"> <span class="tooltip-x-front"><i class="fa fa-code"></i></span> <span class="tooltip-x-back">4<br>
                    Web Dev<br>
                    Item</span> </span> </button>
                    <button type="button" data-filter=".uncategorized" class="filter-item tooltip-x">Uncategorized <span class="tooltip-x-content"> <span class="tooltip-x-front"><i class="fa fa-list"></i></span> <span class="tooltip-x-back">2<br>
                    Uncategorized<br>
                    Item</span> </span> </button>
                  </div> -->
                <div id="grid-container" class="bg-color1" style="padding-top: 20px;padding-bottom: 20px;padding-left: 50px;padding-right: 50px;">
                    <ul class="row">
                        <li class="col-md-3 col-sm-6 item web_dev web-design" style="margin-bottom: 20px;">
                            <div class="item-wrapper">
                                <div class="image"> <a href="<?PHP echo $my_path; ?>/assets/img/resume-img/resume2.jpg" class="image_pop" title="Project Title"> <img class="img-responsive" src="<?PHP echo $my_path; ?>/assets/img/resume-img/resume2.jpg" alt="Portfolio" style="width: 700px;height: 350px;" /> </a> 
                                  <!--              <p> <a href="#">Bootstrap</a> <a href="#">Landing</a> <a href="#">css</a> <a href="#">jQuery</a></p>--> 
                                </div>
                                <div class="text"> <span><strong>Technical Architect</strong></div>
                            </div>
                        </li>
                        <li class="col-md-3 col-sm-6 item web_dev web-design" style="margin-bottom: 20px;">
                            <div class="item-wrapper">
                                <div class="image"> <a href="<?PHP echo $my_path; ?>/assets/img/resume-img/resume3.png" class="image_pop" title="Project Title"> <img class="img-responsive" src="<?PHP echo $my_path; ?>/assets/img/resume-img/resume3.png" alt="Portfolio" style="width: 700px;height: 350px;" /> </a> 
                                  <!--              <p> <a href="#">Bootstrap</a> <a href="#">Landing</a> <a href="#">css</a> <a href="#">jQuery</a></p>--> 
                                </div>
                                <div class="text"> <span><strong>Art Director & Designer</strong></div>
                            </div>
                        </li>
                        <li class="col-md-3 col-sm-6 item web_dev web-design" style="margin-bottom: 20px;">
                            <div class="item-wrapper">
                                <div class="image"> <a href="<?PHP echo $my_path; ?>/assets/img/resume-img/resume4.jpg" class="image_pop" title="Project Title"> <img class="img-responsive" src="<?PHP echo $my_path; ?>/assets/img/resume-img/resume4.jpg" alt="Portfolio" style="width: 700px;height: 350px;" /> </a> 
                                  <!--              <p> <a href="#">Bootstrap</a> <a href="#">Landing</a> <a href="#">css</a> <a href="#">jQuery</a></p>--> 
                                </div>
                                <div class="text"> <span><strong>Customer Care Representative</strong></div>
                            </div>
                        </li>
                        <li class="col-md-3 col-sm-6 item web_dev web-design" style="margin-bottom: 20px;">
                            <div class="item-wrapper">
                                <div class="image"> <a href="<?PHP echo $my_path; ?>/assets/img/resume-img/resume5.jpg" class="image_pop" title="Project Title"> <img class="img-responsive" src="<?PHP echo $my_path; ?>/assets/img/resume-img/resume5.jpg" alt="Portfolio" style="width: 700px;height: 350px;" /> </a> 
                                  <!--              <p> <a href="#">Bootstrap</a> <a href="#">Landing</a> <a href="#">css</a> <a href="#">jQuery</a></p>--> 
                                </div>
                                <div class="text"> <span><strong>Photography</strong></div>
                            </div>
                        </li>
                        <li class="col-md-3 col-sm-6 item web_dev web-design">
                            <div class="item-wrapper">
                                <div class="image"> <a href="<?PHP echo $my_path; ?>/assets/img/resume-img/resume9.png" class="image_pop" title="Project Title"> <img class="img-responsive" src="<?PHP echo $my_path; ?>/assets/img/resume-img/resume9.png" alt="Portfolio" style="width: 700px;height: 350px;" /> </a> 
                                  <!--              <p> <a href="#">Bootstrap</a> <a href="#">Landing</a> <a href="#">css</a> <a href="#">jQuery</a></p>--> 
                                </div>
                                <div class="text"> <span><strong>System Analyst</strong></div>
                            </div>
                        </li>
                        <li class="col-md-3 col-sm-6 item web_dev web-design">
                            <div class="item-wrapper">
                                <div class="image"> <a href="<?PHP echo $my_path; ?>/assets/img/resume-img/resume8.jpg" class="image_pop" title="Project Title"> <img class="img-responsive" src="<?PHP echo $my_path; ?>/assets/img/resume-img/resume8.jpg" alt="Portfolio" style="width: 700px;height: 350px;" /> </a> 
                                  <!--              <p> <a href="#">Bootstrap</a> <a href="#">Landing</a> <a href="#">css</a> <a href="#">jQuery</a></p>--> 
                                </div>
                                <div class="text"> <span><strong>Business Analyst</strong></div>
                            </div>
                        </li>
                        <li class="col-md-3 col-sm-6 item web_dev web-design">
                            <div class="item-wrapper">
                                <div class="image"> <a href="<?PHP echo $my_path; ?>/assets/img/resume-img/resume7.jpg" class="image_pop" title="Project Title"> <img class="img-responsive" src="<?PHP echo $my_path; ?>/assets/img/resume-img/resume7.jpg" alt="Portfolio" style="width: 700px;height: 350px;" /> </a> 
                                  <!--              <p> <a href="#">Bootstrap</a> <a href="#">Landing</a> <a href="#">css</a> <a href="#">jQuery</a></p>--> 
                                </div>
                                <div class="text"> <span><strong>Accountant</strong></div>
                            </div>
                        </li>
                        <li class="col-md-3 col-sm-6 item web_dev web-design">
                            <div class="item-wrapper">
                                <div class="image"> <a href="<?PHP echo $my_path; ?>/assets/img/resume-img/resume6.png" class="image_pop" title="Project Title"> <img class="img-responsive" src="<?PHP echo $my_path; ?>/assets/img/resume-img/resume6.png" alt="Portfolio" style="width: 700px;height: 350px;" /> </a> 
                                  <!--              <p> <a href="#">Bootstrap</a> <a href="#">Landing</a> <a href="#">css</a> <a href="#">jQuery</a></p>--> 
                                </div>
                                <div class="text"> <span><strong>Web Designer</strong></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>
            <section id="team" class="team padding">
                <div class="container">
                    <header class="heading_1 text-center">
                        <h2 class="main_title"> Why <span class="base-highlight">Jatka.in? </span></h2>
                    </header>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="skill">
                                <h4>Our Skills</h4>
                                <p>Whether a mid-career professional, a senior executive or just starting out, our entire team is skill full to ensure you get the attention you deserve.</p>
                                <div class="progress-wrap">
                                    <h5>Global Class experience</h5>
                                    <div class="progress">
                                        <div class="progress-bar  color1" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 85%"> <span class="bar-width">85%</span> </div>
                                    </div>
                                </div>
                                <div class="progress-wrap">
                                    <h5>Multi Domain Experience</h5>
                                    <div class="progress">
                                        <div class="progress-bar color2" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 95%"> <span class="bar-width">95%</span> </div>
                                    </div>
                                </div>
                                <div class="progress-wrap">
                                    <h5>Strategically Analytical</h5>
                                    <div class="progress">
                                        <div class="progress-bar color3" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%"> <span class="bar-width">80%</span> </div>
                                    </div>
                                </div>
                                <div class="progress-wrap">
                                    <h5>Recognized by Professional Association of Resume Writers and Career Coaches</h5>
                                    <div class="progress">
                                        <div class="progress-bar color4" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 90%"> <span class="bar-width">90%</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.col-sm-6-->

                        <div class="col-sm-6">
                            <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel">
                                    <div class="title" id="headingOne"> <a data-toggle="collapse" data-parent="#accordion" href="#One" aria-expanded="true" aria-controls="collapseOne">
                                            <p>Streamlined and Easy</p>
                                        </a></div>
                                    <div id="One" class="desc panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <p>The job seeker can login to Jatka.in and select from a pool of predefined resume templates that are tailor made to match their respective profile type, industry and domain.</p>
                                        <p>Need the assistance of a professional? Don’t worry, you can use this platform and get connected to our industry experts, send your enquiry and get their assistance and suggestions to help you all along the way.</p>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="title" id="headingTwo"> <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#Two" aria-expanded="false" aria-controls="collapseTwo">
                                            <p>Only the Best Resume Writers</p>
                                        </a></div>
                                    <div id="Two" class="desc panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo"> We never compromise on quality. We have the best of industry experts, who are top professional certified resume writers located across the globe in order to boost up your employment prospects. You can work closely with them and they will suggest the best strategy to work out the best profile. <br>
                                        With the assistance of a professional, you can witness the 360 degree transformation of your old, beaten profile into one that is worthy enough to earn you an interview, ensuring that recruiters take notice of all your unique skills and accomplishments.</div>
                                </div>
                                <div class="panel">
                                    <div class="title" id="headingThree"> <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#Three" aria-expanded="false" aria-controls="collapseThree">
                                            <p>A Multidisciplinary Team of Experts</p>
                                        </a></div>
                                    <div id="Three" class="desc panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">Our resume experts consist of a team of professional content writers and industry experts having decades of experience, who are ever ready to assist and suggest job seekers to articulate and depict the details of their roles and accomplishments effectively onto paper. They ensure that your profile is fine-tuned and skilfully crafted as per current recruiting trends and technologies, thus creating a high impact eye-catching resume that gets you the attention it deserves.</div>
                                </div>
                                <div class="panel">
                                    <div class="title" id="headingThree"> <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#Four" aria-expanded="false" aria-controls="collapseThree">
                                            <p>Affordable and Guaranteed</p>
                                        </a></div>
                                    <div id="Four" class="desc panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">One of the key factors that make Jatka.in stand out in the competitive industry is affordability and uncompromised quality and the passion our team has for its clients. <br>
                                        It is the complete package for a job seeker and comprises of the best tools, the best predefined templates, the best of passionate experts who work together towards the success of clients by striving and ensuring that their dreams are fulfilled.</div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
            <section id="statistics" class="statistics text-center">
                <div class="counter_wraper single-padding cover-bg dark-bg" data-stellar-background-ratio="0.3" style="background-image: url(assets/img/background/bg24.jpg);">
                    <div class="container">
                        <h3 class="h4 mar-bottom-1">70% People Belive Another Consumer's Opinion Posted Online</h3>
                        <div align="center">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="count" style="display: inline-block;"> <i class="icon-facebook"></i> <span data-from="500" data-to="5000" data-speed="5000"></span>
                                        <p>Facebook Like</p>
                                    </div>
                                    <div class="count" style="display: inline-block;margin-left: 80px;"> <i class="icon-twitter"></i> <span data-from="700" data-to="3000" data-speed="5000"></span>
                                        <p>Twitter Follower</p>
                                    </div>
                                </div>
                                <!-- <div class="col-md-3 col-sm-6 count"> <i class="icon-happy"></i> <span data-from="100" data-to="900" data-speed="5000"></span>
                                  <p>Happy Clients</p>
                                </div>
                                <div class="col-md-3 col-sm-6 count"> <i class="icon-globe"></i> <span data-from="500" data-to="7000" data-speed="10000"></span>
                                  <p>Money Earned</p>
                                </div> --> 
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- <section class="subscribe single-padding cover-bg bb-1" style="background-image: url(assets/img/background/bg8.jpg);">
              <div class="container">
                <div class="row">
                  <div class="col-md-5 col-md-offset-7">
                    <h4 class="h3">Subscribe</h4>
                    <form class="mailchimp">
                      <div class="input-group">
                        <input class="email_input" type="email" name="email" placeholder="Enter your email">
                        <div class="input-group-btn">
                          <button type="submit" class="subscribe-submit"><i class="fa fa-envelope"></i></button>
                        </div>
                      </div>
                      <p class="mar-top-1">Subscribe to our weekly newsletter, We promise you that we wont spam you. Asperiores totam molestias eaque sunt maiores delectus modi ut ab!</p>
                      <h4 class="subscription-success notice">Success notice here</h4>
                      <h4 class="subscription-error notice">Error notice here</h4>
                    </form>
                  </div>
                </div>
              </div>
            </section> --> 
            <!--   <section id="pricing_table" class="pricing-tables bg-color3 single-padding">
              <div class="container text-center">
                <header class="heading_1 text-center"> <i class="icon icon-presentation"></i>
                  <h2 class="main_title"> <span class="sub_title">Product Packages</span> Select your <span class="base-highlight">best deal !</span></h2>
                </header>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="pricing-table padding">
                      <h5 class="text-uppercase">Basic</h5>
                      <h4 class="price">$59</h4>
                      <p class="lead">Per Month</p>
                      <ul>
                        <li><i class="icon-key"></i><strong>Unlimited</strong> Bandwidth</li>
                        <li><i class="icon-tools-2"></i><strong>Unlimited</strong> Space</li>
                        <li><i class="icon-lightbulb"></i><strong>One Time</strong> Fees</li>
                        <li><i class="icon-globe"></i><strong>24/7</strong> Free Support</li>
                        <li><i class="icon-mobile"></i><strong>Cpanel</strong> Access</li>
                      </ul>
                      <a class="btn btn-primary" href="#">Get Started</a>
                      <p> 30 Day One User <br>
                        Try Our Product Now</p>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="pricing-table suggested dark-bg padding">
                      <h5 class="text-uppercase">Premium</h5>
                      <h4 class="price">$99</h4>
                      <p class="lead">Per Month</p>
                      <ul>
                        <li><i class="icon-key"></i><strong>Unlimited</strong> Bandwidth</li>
                        <li><i class="icon-tools-2"></i><strong>Unlimited</strong> Space</li>
                        <li><i class="icon-lightbulb"></i><strong>One Time</strong> Fees</li>
                        <li><i class="icon-globe"></i><strong>24/7</strong> Free Support</li>
                        <li><i class="icon-mobile"></i><strong>Cpanel</strong> Access</li>
                      </ul>
                      <a class="btn btn-primary btn-primary-white" href="#">Get Started</a>
                      <p> 30 Day Starter Pack <br>
                        Try Our Product Now</p>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="pricing-table padding">
                      <h5 class="text-uppercase">Ultimate</h5>
                      <h4 class="price">$149</h4>
                      <p class="lead">Per Month</p>
                      <ul>
                        <li><i class="icon-key"></i><strong>Unlimited</strong> Bandwidth</li>
                        <li><i class="icon-tools-2"></i><strong>Unlimited</strong> Space</li>
                        <li><i class="icon-lightbulb"></i><strong>One Time</strong> Fees</li>
                        <li><i class="icon-globe"></i><strong>24/7</strong> Free Support</li>
                        <li><i class="icon-mobile"></i><strong>Cpanel</strong> Access</li>
                      </ul>
                      <a class="btn btn-primary" href="#">Get Started</a>
                      <p> 30 Day Ultimate Pack <br>
                        Try Our Product Now</p>
                    </div>
                  </div>
                </div>
                <p class="mar-top dull">Want to know more ? <a href="#">read article</a>, check <a href="#">FAQ</a>, or <a href="#contact" class="goto">contact us</a></p>
              </div>
            </section> -->
            <section id="testimonial" class="client-testimonial dark-bg text-center padding pad-bottom-2" data-stellar-background-ratio="0.3" style="background-image: url(assets/img/background/bg12.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 testmonial_slider_1">
                            <div class="testimonial"> <img src="assets/img/testimonial/1.png" alt="Testimonial" class="mar-bottom-1 mar-cen">
                                <p class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i></p>
                                <p class="context mar-bottom-1">The most appealing part of the theme it's very clean and light. I liked the level of the provided service. <br>
                                    It reveals an individual approach to each customer</p>
                                <span class="mar-bottom-1"><i class="fa fa-twitter twitter"></i> @someone</span></div>
                            <div class="testimonial"> <img src="assets/img/testimonial/2.png" alt="Testimonial" class="mar-bottom-1 mar-cen">
                                <p class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i></p>
                                <p class="context mar-bottom-1">The most appealing part of the theme it's very clean and light. I liked the level of the provided service. <br>
                                    It reveals an individual approach to each customer</p>
                                <span class="mar-bottom-1"><i class="fa fa-facebook facebook"></i> @someone</span></div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="padding bg-light-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <h4 class="text-center base-highlight mar-top-1">Featured in -:</h4>
                        </div>
                        <div class="col-md-10">
                            <div class="company mar-top-1">
                                <label class="text-muted" style="font-size: 20px;font-weight: normal;margin-right: 40px;">Virtuell Technologies</label>
                                <label class="text-muted" style="font-size: 20px;font-weight: normal;">Compass5 IT Solutions</label>
                                <!--    <div><img src="assets/img/company/5.png" alt="Client Company"></div>
                                <div><img src="assets/img/company/6.png" alt="Client Company"></div> --> 
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="contact" class="contact cover-bg padding">
                <div class="container">
                  <header class="heading_1 text-center"> <!-- <i class="icon icon-chat"></i> -->
                        <h2 class="main_title"> Contact <span class="base-highlight">US</span></h2>
                    </header>
                    <div class="row">
                        <div class="col-md-7">
                            <form id="contact-form" class="contact-form mar-z" role="form">
                                <div class="field-wrapper form-group col-md-6">
                                    <div class="help-block with-errors form-tooltip"></div>
                                    <input class="form-control input-box" id="contact-name" type="text" name="contact-name" placeholder="Your Name" data-error="Write Down Your Name Please !" required>
                                </div>
                                <div class="field-wrapper form-group col-md-6">
                                    <div class="help-block with-errors form-tooltip"></div>
                                    <input class="form-control input-box" id="contact-email" type="email" name="contact-email" placeholder="Email" data-error="Bruh, that email address is invalid" required>
                                </div>
                                <div class="field-wrapper form-group col-md-12">
                                    <div class="help-block with-errors form-tooltip"></div>
                                    <input class="form-control input-box" id="contact-subject" type="text" name="contact-subject" placeholder="Subject" data-error="Subject Is Empty !" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <h6 class="form-success">You Message was sent successfully !</h6>
                                    <h6 class="form-error">You Message Wasn't Sent Try Again !</h6>
                                    <button class="btn btn-primary" type="submit" id="contact-submit" name="contact-submit" style="margin-top: 10px;">Send Message</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-5" style="margin-top: 0px;padding-top: 0px;">
                            <div class="field-wrapper form-group" style="margin-top: -15px;">
                                <div class="help-block with-errors form-tooltip"></div>
                                <textarea class="form-control textarea-box" id="contact-message" rows="7" name="contact-message" placeholder="Your Message" data-error="This field can not be empty." required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content-contact-section gray-bg">
                <div class="container">
                    <div class="row right-row-border">
                        <div class="col-sm-4">
                            <div class="content-contact">
                                <div class="icon"><i class="icon-phone"></i></div>
                                <div class="key">Have a question?</div>
                                <div class="val"><a href="tel:1234567890">+91 9581 9582 06</a></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="content-contact">
                                <div class="icon"><i class="icon-clock"></i></div>
                                <div class="key">OPEN</div>
                                <div class="val" style="color: #ff8700">24/7</div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="content-contact">
                                <div class="icon"><i class="icon-chat"></i></div>
                                <div class="key">Drop us an email</div>
                                <div class="val"><a href="mailto:support@jatka.in">support@jatka.in</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="footer bg-color1 dark-bg">
            <footer class="page-footer ">
                <div class="container">
                    <div class="row page-footer-top">
                        <div class="col-md-3 col-xs-6">
                            <h5 class="title">Resume Tools</h5>
                            <ul>
                                <li><a href="http://jatka.in/">Resume Builder</a></li>
                                <li><a href="http://jatka.in/">Online Editor</a></li>
                                <li><a href="http://jatka.in/">Resume Builder Tips</a></li>
                            </ul>
                            <br />
                            <h5 class="title">Resume Services</h5>
                            <ul>
                                <li><a href="http://jatka.in/">Resume Review</a></li>
                                <li><a href="http://jatka.in/">Resume Writing</a></li>
                                <li><a href="http://jatka.in/">Jobseeker Reviews</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <h5 class="title">Recruiter</h5>
                            <ul>
                                <li><a href="http://jatka.in/">Resume Builder</a></li>
                                <li><a href="http://jatka.in/">On Demand Resume</a></li>
                            </ul>
                            <br />
                            <h5 class="title">Help &amp; Support</h5>
                            <ul>
                                <li><a href="http://jatka.in/">Customer Service/Billing</a></li>
                                <li><a href="http://jatka.in//contact.aspx">Contact Us</a></li>
                                <li><a href="http://jatka.in/">Forgot Password</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <h5 class="title">About</h5>
                            <ul>
                                <li><a href="http://jatka.in/">Who We Are</a></li>
                                <li><a href="http://jatka.in/">Work Here</a></li>
                                <li><a href="http://jatka.in/">Affiliates</a></li>
                                <li><a href="http://jatka.in/">Privacy Policy</a></li>
                                <li><a href="http://jatka.in/">Terms of Use</a></li>
                                <li><a href="http://jatka.in//login.aspx">Sign In</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <h5 class="title">Address</h5>
                            <address>
                                Survey No : 12(P), White Field Road,
                                Opp: Ramalayam Temple, Kothaguda,<br>
                                Kondapur, Hyderabad - 500081<br>
                                Telangana.<br>
                            </address>
                            <aside>
                                <h5 class="title">Stay in touch with us</h5>
                                <ul class="soc-list">
                                    <li><a href="#" target="_blank" class="fa fa-facebook facebook"></a></li>
                                    <li><a href="#" target="_blank" class="fa fa-twitter twitter"></a></li>
                                </ul>
                            </aside>
                        </div>
                    </div>
                    <br />
                    <div class="copyright">
                        <div class="col-md-6\12">
                            <p class="pull-left"> © 2016, <a href="http://jatka.in/">jatka.in</a> All rights reserved.</p>
                            <p class="pull-right">Powered by <a href="http://compas5.com/">Compass5 IT Solutions </a> &amp; IT Partner <a href="http://virtuelltech.com/">Virtuell Technologies</a></p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <a href="#0" class="back-to-top-link">Top</a> 
        <script type="text/javascript">
            var Tawk_API = Tawk_API || {},
                    Tawk_LoadStart = new Date();
            (function () {
                var s1 = document.createElement("script"),
                        s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = 'https://embed.tawk.to/576ce0eb05d23aa31b19ba08/default';
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
        </script> 
        <script type="text/javascript" src="assets/js/jquery-2.1.4.min.js"></script> 
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script> 
        <script type="text/javascript" src="assets/js/jquery.smooth-scroll.min.js"></script> 
        <script type="text/javascript" src="assets/js/smoothscroll.js"></script> 
        <script type="text/javascript" src="assets/js/slick.min.js"></script> 
        <script type="text/javascript" src="assets/js/jquery.magnific-popup.min.js"></script> 
        <script type="text/javascript" src="assets/js/jquery.stellar.min.js"></script> 
        <script type="text/javascript" src="assets/js/jquery.waypoints.min.js"></script> 
        <script type="text/javascript" src="assets/js/inview.min.js"></script> 
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
        <script type="text/javascript" src="assets/js/jquery.gmap.min.js"></script> 
        <script type="text/javascript" src="assets/js/jquery.countTo.js"></script> 
        <script type="text/javascript" src="assets/js/jquery.ajaxchimp.min.js"></script> 
        <script type="text/javascript" src="assets/js/validator.js"></script> 
        <script type="text/javascript" src="assets/js/custom.js"></script>
    </body>
</html>

