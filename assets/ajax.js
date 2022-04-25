$(document).ready(function () {
    var base_url = $("#base").val();
    $('#table_data').DataTable({
        'processing': true,
        'serverSide': true,
        'searching': true,
        'serverMethod': 'post',
        'ajax': {
            'url': base_url + 'Registration/details_list',
            "type": "POST",
        },
        "order": [[ 0, "desc" ]],
        'columns': [
            { data: 'user_id' },
            { data: 'first_name' },
            { data: 'last_name' },
            { data: 'email' },
            { data: 'gender' },
            { data: 'city' },
            { data: 'country' },
            { data: 'phone_no' },
            { data: 'user_dob' },
            { data: 'edit' },
            { data: 'delete' }
        ],
        columnDefs: [{
            targets: [9, 10],
            orderable: false,
        }],
    });

    /*ajax for insertion function */
    $("#save").click(function () {
        var name = $('#fname').val();
        var name = $('#lname').val();
        var email = $("#email").val();
        var city = $("#city").val();
        var gender = $("#gender").val();
        var country = $("#count").val();
        var age = $('#phone_no').val();
        var address = $('#dob').val();

        var form_data = new FormData($('#first_form')[0]);
        /*Empty validation */
        if (name != "" && age != "" && address != "" && city != "" && blood_gp != "" && image != "" && email != "" && nationality != "" && country != "" && gender != "") {
            jQuery.ajax({
                type: "POST",
                data: form_data,
                url: base_url + 'Crud_controller/index',
                dataType: 'html',

                contentType: false,
                cache: false,
                processData: false,

                success: function (res) {
                    if (res == 1) {
                        alert('not success in insertion');
                    } else {
                        alert(' Your data is going to submit..');
                    }
                },

            });
        } else {
            alert("pls fill all fields first");
        }
    });
    /*Ajax code for data fetching */

    /*ajax for deletion */

    /*Ajax for updation  */
    $(document).on('click', '#update', function () {
        // var form_data = new FormData($('#first_form')[0]);
        var id = $(this).attr("id");
        $.ajax({
            url: base_url + 'Crud_controller/update_data',
            method: "POST",
            data: {
                id: id,
                fname: $('#fname').val(),
                lname: $('#lname').val(),
                age: $('#email').val(),
                address: $('#gender').val(),
                city: $('#city').val(),
                blood_group: $("#I").val(),
                image: $("#image").val(),
                email: $("#email").val(),
            },
            cashe: false,
            dataType: 'JSON',
            success: function (data) {
                $('#new_form').html(data);
            }
        })
    });

});

$(document).on('click','.delete',function(){    
    var ans = confirm('Are you sure you want to delete this record ?');
    if(ans){
        return true;
    }else{
        return false;
    }
})