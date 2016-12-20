<div class="clear clearfix"></div>
<footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; <?php echo date("Y"); ?> <a target="_blank" href="#" title="Jathka.in">Jatka.in</a>. All Rights Reserved.
                </div>
                <div class="col-sm-6">
<!--                    <ul class="pull-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Faq</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>-->
<ul class="pull-right">Powered by <a href="http://virtuelltech.com/">virtuelltech</a></ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="<?php echo $my_path; ?>/js/jquery.js"></script>
    <script src="<?php echo $my_path; ?>/js/bootstrap.min.js"></script>
  
    
    <script src="<?php echo $my_path; ?>/js/main.js"></script>
  <script src="<?php echo $my_path; ?>/js/star-rating.min.js"></script>
  
  <script>

$("#Industry1").on('change', function(){
var id=$(this).val();
//  alert("ff");
$.ajax({
type:"get",
url:"<?php echo $my_path; ?>/get_domains.php",
data:{"q":id},
success:function(data){
//  alert(data);
$("#Domain1").empty().append(data);
}
});
});    
    
</script>


</body>
</html>