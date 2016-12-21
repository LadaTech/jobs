/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function(){
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
            exp_yrs:{
                required: true
            },
            exp_mnths:{
                required: true
            },
            selected_template:{
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
            selected_template:{
                required: "Please select template"
            }
        }
    });
 
    
});
