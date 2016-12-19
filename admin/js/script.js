$(document).ready(function()
{
    /****************************************
	*
	*    	Ajax Code 
	*   	Starts from here   
	**
	*************************************/
	  $("#vuniv").change(function()
    {
       var id=$(this).val();
      // alert(id);
       $.ajax({
           type:"post",
           url:"get_ins.php",
           data:{"id":id},
           success:function(data){
              //alert(data);
               $("#vins").empty().append(data);
           }
       });
    });
	
	 $("#change_menu").change(function()
    {
       var id=$(this).val();
      // alert(id);
       $.ajax({
           type:"post",
           url:"get_max_pages.php",
           data:{"id":id},
           success:function(data){
              //alert(data);
               $("#page_max_status").empty().append(data);
           }
       });
    });
	
		 $("#change_menu1").change(function()
    {
       var id=$(this).val();
	   var pid=$("#pid_v").val();
      // alert(id);
       $.ajax({
           type:"get",
           url:"get_max_pages.php",
	   data:"id="+id+"&pid="+pid,
           success:function(data){
            //  alert(data);
               $("#page_max_status").empty().append(data);
           }
       });
    });

   
   /**
    *  V university
    * 
    */
   
    $("#nstate").change(function()
    {
       var id=$(this).val();
      // alert(id);
       $.ajax({
           type:"post",
           url:"get_univ.php",
           data:{"id":id},
           success:function(data){
              //alert(data);
               $("#nuniv").empty().append(data);
           }
       });
    });
    
       /**
    *  V Institute
    * 
    */
        $("#nuniv").change(function()
    {
       var id=$(this).val();
      // alert(id);
       $.ajax({
           type:"post",
           url:"get_ins.php",
           data:{"id":id},
           success:function(data){
              //alert(data);
               $("#nins").empty().append(data);
           }
       });
    });
    
    
    
          /**
    *  a_mode listings
    * 
    */
        $(".a_mode").change(function()
        {
        var id=$(this).val();
       
         var radioValue = $("input[name='a_mode']:checked").val();
         // alert(radioValue);
          if(radioValue=='file')
          {
              $("#imagead").show();
              $("#js_code").hide();
              $("#jscode").prop('required', false);
               $("#image1").prop('required', true);  
          }
          else {
              $("#imagead").hide();
              $("#js_code").show();
              $("#image1").prop('required', false);
               $("#jscode").prop('required', true);
          }
     });
     
   
   
$('.continue').click(function(){
  $('.nav-tabs > .active').next('li').find('a').trigger('click');
});
$('.back').click(function(){
  $('.nav-tabs > .active').prev('li').find('a').trigger('click');
});

   
   
})
