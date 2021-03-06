/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function () {

    $.validator.addMethod("validProfilePic", function (value, element) {
        var ext = value.split('.').pop().toLowerCase();
        if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            alert('invalid extension!');
        }
    }, "Please Upload Valid file format");

    $("#identicalForm").validate({
        rules: {
            Industry: {
                required: true
            },
            Domain: {
                required: true
            },
            Experience_level: {
                required: true
            },
            exp_yrs: {
                required: true
            },
            exp_mnths: {
                required: true
            },
            selected_template: {
                required: true
            }
        },
        messages: {
            Industry: {
                required: 'Please select industry'
            },
            Domain: {
                required: 'Please selecct domain'
            },
            Experience_level: {
                required: 'Please select experience level'
            },
            exp_yrs: {
                required: 'Please select years'
            },
            exp_mnths: {
                required: 'Please select months'
            },
            selected_template: {
                required: "Please select template"
            }
        }
    });

    $("#cwEditPaymentInfo").validate({
        rules: {
            iid: {
                required: true
            },
            Domain: {
                required: true
            },
            special_fresher: {
                required: true
            },
            special_1_exp: {
                required: true
            },
            special_2_exp: {
                required: true
            },
            special_3_exp: {
                required: true
            },
            special_4_exp: {
                required: true
            },
            expected_special_delivery: {
                required: true
            },
            general_fresher: {
                required: true
            },
            general_1_exp: {
                required: true
            },
            general_2_exp: {
                required: true
            },
            general_3_exp: {
                required: true
            },
            general_4_exp: {
                required: true
            },
            expected_delivery: {
                required: true
            }
        },
        messages: {
            iid: {
                required: 'Please select industry'
            },
            Domain: {
                required: 'Please selecct domain'
            },
            special_fresher: {
                required: 'Please enter Fresher Price'
            },
            special_1_exp: {
                required: 'Please enter price for 1-3 Experience'
            },
            special_2_exp: {
                required: 'Please enter price for 3-5 Experience'
            },
            special_3_exp: {
                required: 'Please enter price for 5-10 Experience'
            },
            special_4_exp: {
                required: 'Please enter price for 10+ Experience'
            },
            expected_special_delivery: {
                required: 'Please selecct domain'
            },
            general_fresher: {
                required: 'Please enter Fresher Price'
            },
            general_1_exp: {
                required: 'Please enter price for 1-3 Experience'
            },
            general_2_exp: {
                required: 'Please enter price for 3-5 Experience'
            },
            general_3_exp: {
                required: 'Please enter price for 5-10 Experience'
            },
            general_4_exp: {
                required: 'Please enter price for 10+ Experience'
            },
            expected_delivery: {
                required: 'Please enter Expected Delivery'
            }
        }
    });

});
