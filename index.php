<?php
$page="";
include "header.php";
//include "db.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $c = $_POST['cname'];
    $msg = $_POST['comments'];
    
    $file_name = $_FILES['file']['name'];
    $file_tmp =$_FILES['file']['tmp_name'];
    $path = 'images/testmonials/' . $file_name;
    $fname = $file_name;
    //echo $path;
    move_uploaded_file($file_tmp, $path);
    $stmt = $db->prepare('INSERT INTO `testimonial` ( `Name`, `Company_Name`, `Message`, `Profile_pic`, `Date`) VALUES(?,?,?,?,now())');
            $stmt->bindParam(1,$name);
            $stmt->bindParam(2,$c);
            $stmt->bindParam(3,$msg);
            $stmt->bindParam(4,$fname);
            $stmt->execute();
            $count = $stmt->rowCount();
            
            if($count > 0){
       echo "<script type='text/javascript'>";
echo "alert('success!')";
echo "</script>";     
    }
    else {
        echo "<script type='text/javascript'>";
echo "alert('success!')";
echo "</script>"; 
    }
            
}   

?>
<section id="main-slider" class="no-margin">
        <div class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">

                <div class="item active" style="background-image: url(images/slider/bg1.jpg)">
                    <div class="container-fluid">
                        <div class="row slide-margin">
                            <div class="col-sm-6 col-sm-offset-1">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Create high impact professional resumes in minutes at minimal cost</h1>
                                    <h2 class="animation animated-item-2">

Jatka.in ensures your profile has a winning ‘first impression’ with potential employers</h2>
<a class="btn-slide animation animated-item-3" href="<?php echo $my_path; ?>/about-us.aspx">Read More</a>
                                </div>
                            </div>

                           

                        </div>
                    </div>
                </div><!--/.item-->
                <div class="item" style="background-image: url(images/slider/bg2.jpg)">
                    <div class="container-fluid">
                        <div class="row slide-margin">
                            <div class="col-sm-6 col-sm-offset-1">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Build a professional standout resume that catches the eye</h1>
                                    <h2 class="animation animated-item-2">Jatka.in has dynamic predefined templates with industry-specific keywords</h2>
<a class="btn-slide animation animated-item-3" href="<?php echo $my_path; ?>/about-us.aspx">Read More</a>
                                </div>
                            </div>

                           

                        </div>
                    </div>
                </div><!--/.item-->
                <div class="item" style="background-image: url(images/slider/bg3.jpg)">
                    <div class="container-fluid">
                        <div class="row slide-margin">
                            <div class="col-sm-6 col-sm-offset-1">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Get that perfect resume you require to land the job!</h1>
                                    <h2 class="animation animated-item-2">Jatka.in is an easy-to- use advanced, powerful tool that matches top industry expectations</h2>
<a class="btn-slide animation animated-item-3" href="<?php echo $my_path; ?>/about-us.aspx">Read More</a>
                                </div>
                            </div>

                           

                        </div>
                    </div>
                </div><!--/.item-->
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
<a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="fa fa-chevron-left"></i>
        </a>
<a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="fa fa-chevron-right"></i>
        </a>        
    </section><!--/#main-slider-->

    <section id="feature" >
        <div class="container">
           <div class="center wow fadeInDown">
                <h2>Features</h2>
                <p class="lead">Jatka.in bridges the gap between job seekers and employers and emerges as the only platform for<br />

candidates to build crisp and high-impact résumés that catch the eye, maximizing their chances to

nail their dream job.</p>
            </div>

            <div class="row">
                <div class="features">
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-bullhorn"></i>
                            <h2>Student and Entry level Resume</h2>
                            <h3>Whether you’re about to start your professional career or if you’re embarking on an entirely new

career phase or switching industries, our advanced resume making platform is your ultimate solution

to maximize your chances of sailing ahead of the competition out there.</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-comments"></i>
                            <h2>Professional and Mid-Career</h2>
                            <h3>If you’re an experienced working professional, irrespective of your industry, Jatka.in enables you to

create a resume that depicts you in a manner that matches the current industry standards so that

you get connected to the best working environment.</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-cloud-download"></i>
                            <h2>Executive</h2>
                            <h3>Keen on getting that much coveted leadership position faster, place your trust on Jakta.in and you

can rest assured that yours will be one of the best crafted interview-winning executive profiles,

which in turn raises your visibility and credibility in and around your business circles.</h3>
                        </div>
                    </div><!--/.col-md-4-->
                
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-leaf"></i>
                            <h2>Experience</h2>
                            <h3>Hard pressed for time? Not to worry. We connect you to a team of certified professional content writers with decades of expertise, who can assist, suggest and rightly guide job seekers all through, thanks to their in-depth understanding of present job market and articulating the best skills.</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-cogs"></i>
                            <h2>Quality</h2>
                            <h3>When it comes to quality, our motto is to work towards creating highly authoritative profiles which present yours as a powerful business case explaining why a potential employer should hire you. Our resume experts with a successful track record across all industries ensure a winning resume.</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-heart"></i>
                            <h2>Results</h2>
                            <h3>We have the expertise. We have the knowledge. We have the right talent and this is what makes us excel at what we do. We strive to provide our customers with THE BEST RESULTS with only one ultimate motive – to maximize their chances of nailing their dream job.</h3>
                        </div>
                    </div><!--/.col-md-4-->
                </div><!--/.services-->
            </div><!--/.row-->    
        </div><!--/.container-->
    </section><!--/#feature-->

    

    <section id="services" class="service-item">
	   <div class="container">
            <div class="center wow fadeInDown">
                <h2>Services we offer</h2>
                <p class="lead">Jatka.in is a resume making software that emerges as THE ONLY platform that helps a jobseeker create a perfect high impact resume and depict the best of their skills, talents and accomplishments in a professionally appropriate manner so as to connect them to a better career.</p>
            </div>

            <div class="row">

                <div class="col-sm-6 col-md-6">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img class="img-responsive" src="images/services/services1.png">
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Jobseeker</h3>
                            <p>This unique resume creating engine helps you win that job you deserve by creating professional-looking resumes for any industry with just a few clicks via context-sensitive and keyword-rich predefined templates.</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img class="img-responsive" src="images/services/services2.png">
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Recruiter</h3>
                            <p>Jatka.in enables recruiters to create a specific predetermined resume format which captures only specific details of candidates, as required by their respective company. </p>
                            <br />
                        </div>
                    </div>
                </div>
<!--
                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img class="img-responsive" src="images/services/services3.png">
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Visual Resume </h3>
                            <p>High Impact Resume with relevant images &amp; graphics. Recruiters retain visuals more than text giving you a competitive advantage.</p>
                        </div>
                    </div>
                </div>  

                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img class="img-responsive" src="images/services/services4.png">
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Resume Distribution</h3>
                            <p>Maximise your reach amongst the most relevant Job consultants and recruiters across India and gulf countries.</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img class="img-responsive" src="images/services/services5.png">
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Get Referred Today</h3>
                            <p>Earn job referrals from company insider and get hired. Get Referred in up to 2500+ top companies.</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img class="img-responsive" src="images/services/services6.png">
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Profile Highlighter</h3>
                            <p>Improve profile visibility among recruiters on Resume Portals. Highlight your Profile in Recruiters paid search list.</p>
                        </div>
                    </div>
                </div>   -->                                             
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

    <section id="middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 wow fadeInDown">
                    <div class="skill">
                        <h2>Our Skills</h2>
                        <p>Whether you’re about to start your professional career or if you’re embarking on an entirely new career phase or switching industries, Jatka.in is your ultimate solution to maximize your chances of sailing ahead of the fierce job market competition out there.</p>

                        <div class="progress-wrap">
                            <h3>Global Class experience</h3>
                            <div class="progress">
                              <div class="progress-bar  color1" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
                                <span class="bar-width">85%</span>
                              </div>

                            </div>
                        </div>

                        <div class="progress-wrap">
                            <h3>Multi Domain Experience</h3>
                            <div class="progress">
                              <div class="progress-bar color2" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
                               <span class="bar-width">95%</span>
                              </div>
                            </div>
                        </div>

                        <div class="progress-wrap">
                            <h3>Strategically Analytical</h3>
                            <div class="progress">
                              <div class="progress-bar color3" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                <span class="bar-width">80%</span>
                              </div>
                            </div>
                        </div>

                        <div class="progress-wrap">
                            <h3>Recognized by Professional Association of Resume Writers and Career Coaches</h3>
                            <div class="progress">
                              <div class="progress-bar color4" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                <span class="bar-width">90%</span>
                              </div>
                            </div>
                        </div>
                    </div>

                </div><!--/.col-sm-6-->

                <div class="col-sm-6 wow fadeInDown">
                    <div class="accordion">
                        <h2>Why Jatka.in?</h2>
                        <div class="panel-group" id="accordion1">
                          <div class="panel panel-default">
                            <div class="panel-heading active">
                              <h3 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1">
                                  Streamlined and Easy
                                  <i class="fa fa-angle-right pull-right"></i>
                                </a>
                              </h3>
                            </div>

                            <div id="collapseOne1" class="panel-collapse collapse in">
                              <div class="panel-body">
                                  <div class="media accordion-inner">
                                       
                                        <div class="media-body">
                                             <p>The job seeker can login to Jatka.in and select from a pool of predefined resume templates that are tailor made to match their respective profile type, industry and domain.</p>
											 <p>Need the assistance of a professional? Don’t worry, you can use this platform and get connected to our industry experts, send your enquiry and get their assistance and suggestions to help you all along the way.</p>
                                        </div>
                                  </div>
                              </div>
                            </div>
                          </div>

                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo1">
                                  Only the Best Resume Writers
                                  <i class="fa fa-angle-right pull-right"></i>
                                </a>
                              </h3>
                            </div>
                            <div id="collapseTwo1" class="panel-collapse collapse">
                              <div class="panel-body">
                                    We never compromise on quality. We have the best of industry experts, who are top professional certified resume writers located across the globe in order to boost up your employment prospects. You can work closely with them and they will suggest the best strategy to work out the best profile.<br>
									 With the assistance of a professional, you can witness the 360 degree transformation of your old, beaten profile into one that is worthy enough to earn you an interview, ensuring that recruiters take notice of all your unique skills and accomplishments
                              </div>
                            </div>
                          </div>

                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseThree1">
                                  A Multidisciplinary Team of Experts
                                  <i class="fa fa-angle-right pull-right"></i>
                                </a>
                              </h3>
                            </div>
                            <div id="collapseThree1" class="panel-collapse collapse">
                              <div class="panel-body">
                                Our resume experts consist of a team of professional content writers and industry experts having decades of experience, who are ever ready to assist and suggest job seekers to articulate and depict the details of their roles and accomplishments effectively onto paper.
They ensure that your profile is fine-tuned and skilfully crafted as per current recruiting trends and technologies, thus creating a high impact eye-catching resume that gets you the attention it deserves.
                            </div>
                          </div>

                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseFour1">
                                  Affordable and Guaranteed
                                  <i class="fa fa-angle-right pull-right"></i>
                                </a>
                              </h3>
                            </div>
                            <div id="collapseFour1" class="panel-collapse collapse">
                              <div class="panel-body">
One of the key factors that make Jatka.in stand out in the competitive industry is affordability and uncompromised quality and the passion our team has for its clients.<br>
								It is the complete package for a job seeker and comprises of the best tools, the best predefined templates, the best of passionate experts who work together towards the success of clients by striving and ensuring that their dreams are fulfilled. 
                              </div>
                            </div>
                          </div>
                        </div><!--/#accordion1-->
                    </div>
                </div>

            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#middle-->

    <section id="content">
        <div class="container">
            <div class="row">
               <!--  <div class="col-xs-12 col-sm-8 wow fadeInDown">
                   <div class="tab-wrap"> 
                        <div class="media">
                            <div class="parrent pull-left">
                                <ul class="nav nav-tabs nav-stacked">
                                    <li class=""><a href="#tab1" data-toggle="tab" class="analistic-01">Responsive Web Design</a></li>
                                    <li class="active"><a href="#tab2" data-toggle="tab" class="analistic-02">Premium Plugin Included</a></li>
                                    <li class=""><a href="#tab3" data-toggle="tab" class="tehnical">Predefine Layout</a></li>
                                    <li class=""><a href="#tab4" data-toggle="tab" class="tehnical">Our Philosopy</a></li>
                                    <li class=""><a href="#tab5" data-toggle="tab" class="tehnical">What We Do?</a></li>
                                </ul>
                            </div>

                            <div class="parrent media-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade" id="tab1">
                                        <div class="media">
                                           <div class="pull-left">
                                                <img class="img-responsive" src="images/tab2.png">
                                            </div>
                                            <div class="media-body">
                                                 <h2>Adipisicing elit</h2>
                                                 <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use.</p>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="tab-pane fade active in" id="tab2">
                                        <div class="media">
                                           <div class="pull-left">
                                                <img class="img-responsive" src="images/tab1.png">
                                            </div>
                                            <div class="media-body">
                                                 <h2>Adipisicing elit</h2>
                                                 <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use.
                                                 </p>
                                            </div>
                                        </div>
                                     </div>

                                     <div class="tab-pane fade" id="tab3">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.</p>
                                     </div>
                                     
                                     <div class="tab-pane fade" id="tab4">
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words</p>
                                     </div>

                                     <div class="tab-pane fade" id="tab5">
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures,</p>
                                     </div>
                                </div>  
                            </div> 
                        </div> 
                    </div>             
                </div> -->

                <div class="col-md-12">
                    <div class="testimonial">
                        <h2>Testimonials</h2>
                         
                <div class="col-md-12">
                <form enctype="multipart/form-data" method="post" >
		<div class="row">
		<div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control" id="emnameail" name="name" placeholder="Name" type="text" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="cname" name="cname" placeholder="Company Name" type="text" required>
                    </div>
                    <div class="form-group">
                            <input type="file" name="file" id="file" class="form-control filestyle" accept='image/*' required>

                        </div>
                    </div>
                    <div class="col-md-6">
                <textarea class="form-control" id="comments" name="comments" placeholder="Message" rows="5"></textarea>
                </div>
                <br>
                
                    <div class="col-md-12 form-group">
                        <button class="btn btn-default pull-right" name="test" type="submit">Send</button>
                    </div>
                </div>
</form>
                </div>

            </div>
        </div><!--/.container-->
    </section><!--/#content-->

    
<?php
include "footer.php";
?>    
<script>
$(document).ready(function () {
$("#main-slider").carousel({
interval: 3500 //TIME IN MILLI SECONDS
});
});
</script>