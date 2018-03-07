// Inserting Country Data Into The Select Option
$(document).ready(function() {
    $.ajax({
        url: '/api/countries',
        type: 'GET',

        success: function (response) {

            if (response.error == false) {
                $.each(response.data, function (k, v) {
                    $('#countryInsert').append($('<option>', {
                        value: v.id,
                        text: v.country_name
                    }));
                });
            } else {
                $('#countryInsert').append($('<option>', {
                    value: null,
                    text: response.message
                }));
            }
        }
    });
})