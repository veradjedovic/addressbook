$(document).ready(function() {

    // Load Avatar Img To #avatar-img Div On Change Input File
    function readPath(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#avatar-img').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#avatar-upload").change(function(){
        readPath(this);
    });

    // Inserting Agency Data Into The Select Option
    $.ajax({
        url: '/api/agencies/list',
        type: 'GET',

        success: function (response) {

            if (response.error == false) {
                $.each( response.data, function( k, v ) {
                    $('#agencyInsert').append($('<option>', {
                        value: v.id,
                        text : v.agency_name
                    }));
                });
            } else {
                $('#agencyInsert').append($('<option>', {
                    value: null,
                    text : response.message
                }));
            }
        }
    });
});