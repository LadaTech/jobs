$(function () {
//Language
    $(document).on("click", ".btn-lang-del", function () {
        var r = confirm("Do you want to delete this section");
        var num = $(".clone-lang-div").length;
        if (r == true) {
            if (num >= 1) {
                $(this).closest(".clone-lang-div").remove();
                var existed_divs = $("#personal_details .clonedInput_3").length + 1;
                $('.cloning-lang-data .clone-lang-div').each(function(){
                        $(this).children('h4').html('Language #'+ existed_divs);
                        existed_divs++;
                });
                
            }
        }
    });

// Skills
    $(document).on("click", ".btn-del", function () {
        var r = confirm("Do you want to delete this section");
        var num = $(".clone-skill-div").length;
        if (r == true) {
            if (num >= 1) {
                $(this).closest(".clone-skill-div").remove();
                var existed_divs = $("#skills .clonedInput_4").length + 1;
                $('.cloning-skill-data .clone-skill-div').each(function(){
                        $(this).children('h4').html('Skill #'+ existed_divs);
                        existed_divs++;
                });
            }
        }
    });

//Experince
    $(document).on("click", ".btn-exp-del", function () {
        var r = confirm("Do you want to delete this section");
        var num = $(".clone-exp-div").length;
        if (r == true) {
            if (num >= 1) {
                $(this).closest(".clone-exp-div").remove();
                var existed_divs = $("#experience .clonedInput_1").length + 1;
                $('.cloning-exp-data .clone-exp-div').each(function(){
                        $(this).children('h4').html('Company #'+ existed_divs);
                        existed_divs++;
                });
            }
        }
    });

//Education
    $(document).on("click", ".btn-edu-del", function () {
        var r = confirm("Do you want to delete this section");
        var num = $(".clone-edu-div").length;
        if (r == true) {
            if (num >= 1) {
                $(this).closest(".clone-edu-div").remove();
                var existed_divs = $("#educational_details .clonedInput_2").length + 1;
                $('.cloning-edu-data .clone-edu-div').each(function(){
                        $(this).children('h4').html('Education #'+ existed_divs);
                        existed_divs++;
                });
            }
        }
    });

    /******************Languages******************************/
    $('#add-lang').click(function () {
        var existed_divs = $("#personal_details .clonedInput_3").length;
        var totalDivs = (existed_divs + $('.cloning-lang-data .clone-lang-div').length + 1 );
        var title = 'Language #' + totalDivs;
        $('.cloned-lang').clone().removeClass("hide cloned-lang").addClass("clone-lang-div").appendTo(".cloning-lang-data").fadeIn('slow');
        $('.cloning-lang-data .clone-lang-div:last h4').html(title);
        var nameVal = 'lang_read'+totalDivs+'[]';
        $('.cloning-lang-data .clone-lang-div:last .lang-read').attr('name',nameVal);
        var nameVal = 'writes'+totalDivs+'[]';
        $('.cloning-lang-data .clone-lang-div:last .writes').attr('name',nameVal);
        var nameVal = 'speaks'+totalDivs+'[]';
        $('.cloning-lang-data .clone-lang-div:last .speaks').attr('name',nameVal);

    });
    /*******Education******/
    $('#add-edu').click(function () {
        var existed_divs = $("#educational_details .clonedInput_2").length;
        var title = 'Education #' + ( existed_divs + $('.cloning-edu-data .clone-edu-div').length + 1 );
        $('.cloned-edu').clone().removeClass("hide cloned-edu").addClass("clone-edu-div").appendTo(".cloning-edu-data").fadeIn('slow');
        $('.cloning-edu-data .clone-edu-div:last h4').html(title);
    });
    /**************Exp Deatils*****************************/
    $('#add-exp').click(function () {
        var existed_divs = $("#experience .clonedInput_1").length;
        var title = 'Company #' + (existed_divs + $('.cloning-exp-data .clone-exp-div').length + 1 );
        $('.cloned-exp').clone().removeClass("hide cloned-exp").addClass("clone-exp-div").appendTo(".cloning-exp-data").fadeIn('slow');
        $('.cloning-exp-data .clone-exp-div:last h4').html(title);
    });
    /******************Skills******************************/
    $('#add-skill').click(function () {
        var existed_divs = $("#skills .clonedInput_4").length;
        var title = 'Skill #' + ( existed_divs + $('.cloning-skill-data .clone-skill-div').length + 1 );
        $('.cloned-skill').clone().removeClass("hide cloned-skill").addClass("clone-skill-div").appendTo(".cloning-skill-data").fadeIn('slow');
        $('.cloning-skill-data .clone-skill-div:last h4').html(title);
    });
});