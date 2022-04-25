$(document).ready(function () {
    //validation on form using jquery validator
    // $("#registration_form").click(function () {
    jQuery.validator.addMethod('email_rule', function (value, element) {
        if (/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value)) {
            return true;
        } else {
            return false;
        };
    });
    //no space validation
    jQuery.validator.addMethod("nospace", function (value, element) {
        return value.indexOf(" ") < 0 && value != "";
    }, "No space please and don't leave it empty");

    //function for lettersonly validation
    jQuery.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^[a-zA-Z\s]+$/i.test(value);
    }, "Letters only please");
    //function for number only validation
    jQuery.validator.addMethod("numbersonly", function (value, element) {
        return this.optional(element) || /^[0-9\s]+$/.test(value);
    }, "<p class='text-danger'>Only number value<p>");


    //validation on the input fields using jquery validator
    var form = $("#update_form")
    form.validate({
        rules: {

            'phone_no': {
                required: true,
                numbersonly: true,
                maxlength:10,
            },
            'fname': {
                required: true,
                lettersonly: true,
                nospace: true,
            },
            'lname': {
                required: true,
                lettersonly: true,
                nospace: true,
            },
            'dob': {
                required: true,

            },
            "email": {
                required: true,
                email_rule: true,
            },
            "city": {
                required: true,
                lettersonly: true,

            },
            "country": {
                required: true,
            },
            "gender": {
                required: true,
            }
        },
        errorPlacement: function (error, element) {
            if (element.attr("type") == "radio") {
                error.appendTo(element.closest(".form-group"));
            } else {
                error.insertAfter(element);
            }
        },
        
    });
});

