var $ = jQuery;
$(document).ready(function() {
    // load the validation on the fields
    $('#contact_form').validate({
        rules: {
            first_name: "required",
            last_name: "required",
            email: {
                required: true,
                email: true
            },
            contact_number: {
                required: true,
                number:true,
                minlength:10,
                maxlength:10
            }
        },
        messages: {
            first_name: "Please enter First Name",
            last_name: "Please enter Last Name",
            email: {
                required: "Email Address is required",
                email: "Oops!! Invalid Email Address"
            },
            contact_number: {
                required: "Please enter Contact Number",
                number: "Invalid Numbre",
                minlength: "Exactly 10 numbers required",
                maxlength: "Exactly 10 numbers required",
            }
        }
    });
});