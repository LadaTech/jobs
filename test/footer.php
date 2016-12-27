<div class="clear clearfix"></div>
<footer class="page-footer">
    <div class="container">

        <?php
        if (!isset($_SESSION["uid"]) && !isset($_SESSION["cwid"])) {
            ?>
            <div class="row page-footer-top">
                <div class="col-md-3 col-xs-6">
                    <h5 class="title">Resume Tools</h5>
                    <ul>
                        <li><a href="<?php echo $path; ?>">Resume Builder</a></li>
                        <li><a href="<?php echo $path; ?>">Online Editor</a></li>
                        <li><a href="<?php echo $path; ?>">Resume Builder Tips</a></li>
                    </ul>

                    <h5 class="title">Resume Services</h5>
                    <ul>
                        <li><a href="<?php echo $path; ?>">Resume Review</a></li>
                        <li><a href="<?php echo $path; ?>">Resume Writing</a></li>
                        <li><a href="<?php echo $path; ?>">Jobseeker Reviews</a></li>
                    </ul>

                </div>

                <div class="col-md-3 col-xs-6">

                    <h5 class="title">Recruiter</h5>
                    <ul>
                        <li><a href="<?php echo $path; ?>">Resume Builder</a></li>
                        <li><a href="<?php echo $path; ?>">On Demand Resume</a></li>
                    </ul>
                    <h5 class="title">Help &amp; Support</h5>
                    <ul>
                        <li><a href="<?php echo $path; ?>">Customer Service/Billing</a></li>
                        <li><a href="<?php echo $path; ?>/contact.aspx">Contact Us</a></li>
                        <li><a href="<?php echo $path; ?>">Forgot Password</a></li>
                    </ul>

                </div>
                <div class="col-md-3 col-xs-6">

                    <h5 class="title">About</h5>
                    <ul>
                        <li><a href="<?php echo $path; ?>">Who We Are</a></li>
                        <li><a href="<?php echo $path; ?>">Work Here</a></li>          
                        <li><a href="<?php echo $path; ?>">Affiliates</a></li>
                        <li><a href="<?php echo $path; ?>">Privacy Policy</a></li>
                        <li><a href="<?php echo $path; ?>">Terms of Use</a></li>
                        <li><a href="<?php echo $path; ?>/login.aspx">Sign In</a></li>
                    </ul>
                </div>

                <div class="col-md-3 col-xs-6">
                    <h5 class="title">Address</h5>
                    <address>
                        Survey No : 12(P), White Field Road,
                        Opp: Ramalayam Temple, Kothaguda,<br />
                        Kondapur, Hyderabad - 500081<br />
                        Telangana.<br />

                    </address>

                    <aside>
                        <h5 class="title">Stay in touch with us</h5>
                        <ul class="social-links">
                            <li> <a target="_blank" href="https://www.facebook.com/jatka.in/"> <i class="fa fa-facebook"></i></a> </li>
                            <li> <a target="_blank" href="https://twitter.com/jatkaservices"> <i class="fa fa-twitter"></i></a> </li>
                        </ul>
                    </aside>

                </div>

            </div>
        <?php } ?>
        <div class="copyright">

            <div class="col-md-6\12">
                <p class="pull-left"> © 2016, <a href="<?php echo $path; ?>">jatka.in</a> All rights reserved.</p>
                <p class="pull-right">Powered by <a href="http://compas5.com/">Compass5 IT Solutions </a> & IT Partner <a href="http://virtuelltech.com/">Virtuell Technologies</a></p>
            </div>
        </div>
    </div>
</footer>
<!--/#footer-->

    <!--<script src="<?php echo $my_path; ?>/js/jquery.js"></script>-->
<script src="<?PHP echo $my_path; ?>/js/jquery-2.2.4.min.js"></script>
<script src="<?php echo $my_path; ?>/js/bootstrap.min.js"></script>


<script src="<?php echo $my_path; ?>/js/main.js"></script>
<script src="<?php echo $my_path; ?>/js/star-rating.min.js"></script>
<script src="<?php echo $my_path; ?>/js/bootstrap-filestyle.js"></script>
<script src="<?php echo $my_path; ?>/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo $my_path; ?>/js/userdefined.js" type="text/javascript"></script>
<script>
$(":file").filestyle({
    icon: false,
    buttonText: "Upload your Pic",
    input: false
});

</script>
<script>

    $("#Industry1").on('change', function () {
        var id = $(this).val();
//  alert("ff");
        $.ajax({
            type: "get",
            url: "<?php echo $my_path; ?>/get_domains.php",
            data: {"q": id},
            success: function (data) {
//  alert(data);
                $("#Domain1").empty().append(data);
            }
        });
    });

</script>


</body>
</html>