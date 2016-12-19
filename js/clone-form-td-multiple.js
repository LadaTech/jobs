$(function () {
    
    /**************Exp Deatils*****************************/
    $('#add-exp').click(function () {
        $('.cloned-exp').clone().removeClass("hide cloned-exp").addClass("clone-exp-div").appendTo(".cloning-exp-data").fadeIn('slow');
    });
    
   
    
    
    
    
    
    
    
    /*******Education******/
    
 $('#add-edu').click(function () {
        $('.cloned-edu').clone().removeClass("hide cloned-edu").addClass("clone-edu-div").appendTo(".cloning-edu-data").fadeIn('slow');
    });

    
    
    
    
    /******************Languages******************************/
       
 $('#add-lang').click(function () {
      $('.cloned-lang').clone().removeClass("hide cloned-lang").addClass("clone-lang-div").appendTo(".cloning-lang-data").fadeIn('slow');
    });
    
    
    
    /******************Skills******************************/
       
 $('#add-skill').click(function () {
           $('.cloned-skill').clone().removeClass("hide cloned-skill").addClass("clone-skill-div").appendTo(".cloning-data").fadeIn('slow');
    });

  
    
      
    
    
    
    
    
    
    
});