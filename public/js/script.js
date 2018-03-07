$(document).ready(function() {

// --------------------------------------------------------------------------------------
// Begin - Load Avatar Img To #avatar-img Div On Change Input File

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
// ----------------------------------------------------------------------------------------
// End - Load Avatar Img To #avatar-img Div On Change Input File

// ----------------------------------------------------------------------------------------
// Begin - Initialization of The Datatable of Agency

    var dt = $('#datatable').DataTable({
        "stateSave": true,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": '/api/agencies',
            "type": "GET",

            "error": function () {
                console.log('Error, data are not found');
            }
        },

        "columns": [
            {"title": "id", "data": 'DT_Row_Index'},
            {"title": "Name of Agency", "data": "agency_name"},
            {"title": "Address", "data": "address"},
            {"title": "Phone", "data": "phone"},
            {"title": "Email", "data": "email"},
            {"title": "Web", "data": "web"},
            {"title": "City", "data": "city.city_name"},
            {"title": "Contacts", "data": {"id": "id", "agency_name": "agency_name"}, 'searchable': false, 'orderable': false,  "render": function(data, type, full, meta){
                return '<a class="show-contacts-link" id="'+data.id+'" data-value="'+data.agency_name+'" href="#scroll">Show Contacts</a>';
            }},
            {
                "title": "Edit | Delete", "data": "id", "render": function (data, type, full, meta) {
                return '<center><a href="" class="updateBtnAgency"  id="row-update-agency'+data+'" data-id="'+data+'"><i class="far fa-edit"></i></a> | <a href="" class="deleteBtnAgency" id="row-agency'+data+'" data-id="'+data+'"><i class="far fa-trash-alt"></i></a></center>';
            }}
        ],

        "order": [[1, 'asc']]
    });
// -----------------------------------------------------------------------------------------
// End - Initialization of The Datatable of Agency

// -----------------------------------------------------------------------------------------
// Begin - Inserting Agency Data Into The Select Option

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
// ------------------------------------------------------------------------------------------
// End - Inserting Agency Data Into The Select Option

// ------------------------------------------------------------------------------------------
// Begin - Inserting Country Data Into The Select Option

    $.ajax({
        url: '/api/countries',
        type: 'GET',

        success: function (response) {

            if (response.error == false) {
                $.each( response.data, function( k, v ) {
                    $('#countryInsert').append($('<option>', {
                        value: v.id,
                        text : v.country_name
                    }));
                });
            } else {
                $('#countryInsert').append($('<option>', {
                    value: null,
                    text : response.message
                }));
            }
        }
    });
// -------------------------------------------------------------------------------------------
// End - Inserting Country Data Into The Select Option

// -------------------------------------------------------------------------------------------
// Begin - On Change The Country Select, Inserting City Data Into The City Select Option
    $('body').on('change', '#countryInsert', function (e) {

        var country_id = $('option:selected',this).attr('value');

        if(country_id==false) {
            $('#cityInsert').html('');
            $('#cityInsert').append($('<option>', {
                value: null,
                text : 'Choose a country first'
            }));
        }

        $.ajax({
            url:  '/api/countries/'+country_id+'/cities',
            type: 'GET',
            data: {
                "_token": "{{ csrf_token() }}",
                "id": country_id
            },
            dataType: 'json',

            success: function (response) {

                $('#cityInsert').html('');

                if (response.error == false) {
                    $.each( response.data, function( k, v ) {
                        $('#cityInsert').append($('<option>', {
                            value: v.id,
                            text : v.city_name
                        }));
                    });
                } else {
                    $('#cityInsert').append($('<option>', {
                        value: null,
                        text : response.message
                    }));
                }
            }
        });
    });
// ---------------------------------------------------------------------------------------------
// End - On Change The Country Select, Inserting City Data Into The City Select Option

// ---------------------------------------------------------------------------------------------
// Begin - Initialization of The Datatable of Contact When Clicking on A Show Contacts Link

    $('body').on('click', '.show-contacts-link', function (e) {

        var agency_id = $(this).attr('id');
        var agency_name = $(this).attr('data-value');

        $('#datatable-contacts-body').html('');
        $("#datatable-title").html('<strong>Agency: '+agency_name+' - <small>Contacts</small></strong>').addClass( "panel-heading" );
        $("#datatable-contacts-body").html('<table id="datatable-contacts" class="table table-striped"></table>').addClass( "panel-body" );

        var dtContacts = $('#datatable-contacts').DataTable({
            "stateSave": true,
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": '/api/agencies/'+agency_id+'/contacts',
                "type": "GET",

                "error": function () {
                    console.log('Error, data are not found');
                }
            },

            "columns": [
                {"title": "id", "data": 'DT_Row_Index'},
                {"title": "Avatar", "data": "avatar", 'searchable': false, "render": function(data, type, full, meta){
                    return '<img id="avatar-img" src="'+(data ? "/storage/avatars/"+data+"" : "/img/dummyavatar.png")+'" alt="your image" width="50" height="50"/>';
                }},
                {"title": "First Name", "data": "first_name"},
                {"title": "Last Name", "data": "last_name"},
                {"title": "Phone", "data": "phone"},
                {"title": "Email", "data": "email"},
                {"title": "Web", "data": "web"},
                {
                    "title": "Edit | Delete", "data": "id", "render": function (data, type, full, meta) {
                    return '<center><a href="" class="updateBtnContact"  id="row-update-contact'+data+'" data-id="'+data+'"><i class="far fa-edit"></i></a> | <a href="" class="deleteBtnContact" id="row-contact'+data+'" data-id="'+data+'"><i class="far fa-trash-alt"></i></a></center>';
                }}
            ],

            "order": [[2, 'asc']]
        });

        // Begin Delete Contact
        $('body').on('click', '.deleteBtnContact', function (e) {

            var id = $(this).attr('data-id');

            e.preventDefault();
            swal({
                    title: "Are you sure you want to execute this action?",
                    text: "If you delete this, you will permanently lose the data!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel the action!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm){
                    if (isConfirm) {
                        $.ajax({
                            url: '/api/contacts/'+id,
                            type: 'DELETE',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "id": id
                            },
                            dataType: 'json',

                            success: function (response) {

                                console.log(response);
                                if (response.error == false) {
                                    swal("Deleted!", response.message, "success");
                                    $('a#row-contact'+response.id).parents()[2].remove();
                                    dtContacts.ajax.reload();
                                } else {
                                    swal("Error happened!", response.message, "error");
                                }
                            }
                        });
                    } else {
                        swal("Canceled!", "Your data is still preserved :)", "error");
                    }
                });
        }); // End Delete Contact
    });
// ----------------------------------------------------------------------------------------------------
// End - Initialization of The Datatable of Contact When Clicking on A Show Contacts Link

// ----------------------------------------------------------------------------------------------------
// Begin - Delete An Agency

    $('body').on('click', '.deleteBtnAgency', function (e) {

        var id = $(this).attr('data-id');

        e.preventDefault();
        swal({
                title: "Are you sure you want to execute this action?",
                text: "If you delete this, you will permanently lose the data!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete!",
                cancelButtonText: "No, cancel the action!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm){
                if (isConfirm) {
                    $.ajax({
                        url: '/api/agencies/'+id,
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": id
                        },
                        dataType: 'json',

                        success: function (response) {

                            console.log(response);
                            if (response.error == false) {
                                swal("Deleted!", response.message, "success");
                                $('a#row-agency'+response.id).parents()[2].remove();
                                dt.ajax.reload();
                                $('#datatable-contacts-body').html('').removeClass('panel-body');
                                $('#datatable-title').html('').removeClass('panel-heading');

                                // Begin Ajax For Refresh Agency Data Into The Select Option In Add New Contact Form
                                $.ajax({
                                    url: '/api/agencies/list',
                                    type: 'GET',

                                    success: function (response) {

                                        if (response.error == false) {
                                            $('#agencyInsert').html('<option>Choose an Agency</option>');
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
                                }); // End Ajax For Refresh Agency Data Into The Select Option In Add New Contact Form

                            } else {
                                swal("Error happened!", response.message, "error");
                            }
                        }
                    });
                } else {
                    swal("Canceled!", "Your data is still preserved :)", "error");
                }
            });
    });
// ----------------------------------------------------------------------------------------------
// End - Initialization of The Datatable of Contact When Clicking on A Show Contacts Link

// ----------------------------------------------------------------------------------------------
// Begin - Update The Agency

    $('body').on('click', '.updateBtnAgency', function (e) {

        var id = $(this).attr('data-id');
        e.preventDefault();

        $('.content').load("/agencies/edit");
        $("#message").html("").removeClass("alert alert-success alert-danger alert-dismissable");

        // Begin Ajax For Inserting Data From The Server Into The Edit Agency Form
        $.ajax({

            url: '/api/agencies/'+id+'/edit',
            type: 'GET',

            success: function(response) {
                $('#agency_name').attr('value', response.data.agency_name);
                $('#address').attr('value', response.data.address);
                $('#phone').attr('value', response.data.phone);
                $('#email').attr('value', response.data.email);
                $('#web').attr('value', response.data.web);

                // The code bellow doesn't working
                $("#countryInsert option[value='" + response.data.country_id + "']").attr("selected","selected");
                $("#cityInsert option[value='" + response.data.city_id + "']").attr("selected","selected");
            } ,
            error: function () {
                console.log('Error happend!');
            }
        }); // End Ajax For Inserting Data From The Server Into The Edit Agency Form

        // Begin Ajax for Update The Agency
        $('body').on('click', '#submitBtnAgency', function (e) {

            e.preventDefault();
            $("#message").html("").removeClass("alert alert-success alert-danger alert-dismissable");

            $.ajax({

                url: '/api/agencies/'+id,
                type: 'PUT',
                data: $('#form-edit-agency').serialize(),
                dataType: 'json',

                success: function(response) {
//                        console.log(response);

                    if(response.error == false){
                        swal({
                                title: "Success!",
                                text: "Action successfully executed!",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonColor: "#009933",
                                confirmButtonText: "OK",
                                closeOnConfirm: false
                            },
                            function(isConfirm){
                                if (isConfirm) {
                                    window.location.href = "/";
                                }
                            });
                    } else {
                        swal("Error happened!", response.message, "error");
                    }
                },
                error: function (response) {
                    var errors = response.responseJSON.errors;
                    console.log(errors);

                    if (errors) {
                        $.each( errors, function( k, v ) {
                            $('#message').append('<li>'+v[0]+'</li>').addClass("alert alert-success alert-danger alert-dismissable");
                        });
                    } else {
                        swal("Oops...", 'Somethings wrong', "error");
                    }
                }
            });
        }); // Begin Ajax for Update The Agency
    });
// -------------------------------------------------------------------------------------------
// End - Update The Agency

// -------------------------------------------------------------------------------------------
// Begin - Insert New Agency

    $('#submit-agency').click(function(e){

        e.preventDefault();
        $("#message").html("").removeClass("alert alert-success alert-danger alert-dismissable");

        $.ajax({

            url: $('.form-insert-agency').attr('action'),
            type: $('.form-insert-agency').attr('method'),
            data: $('.form-insert-agency').serialize(),
            dataType: 'json',

            success: function(response) {
//                    console.log(response);

                if(response.error == false){

                    swal("Action successfully executed!", response.message, "success");
                    $(".form-insert-agency")[0].reset();
                    dt.ajax.reload();

                    // Begin Ajax For Refresh Agency Data Into The Select Option In Add New Contact Form
                    $.ajax({
                        url: '/api/agencies/list',
                        type: 'GET',

                        success: function (response) {

                            if (response.error == false) {
                                $('#agencyInsert').html('<option>Choose an Agency</option>');
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
                    }); // End Ajax For Refresh Agency Data Into The Select Option In Add New Contact Form

                } else {
                    swal("Error happened!", response.message, "error");
                }
            },
            error: function (response) {
                var errors = response.responseJSON.errors;

                if (errors) {
                    $.each( errors, function( k, v ) {
                        $('#message').append('<li>'+v[0]+'</li>').addClass("alert alert-success alert-danger alert-dismissable");
                    });
                } else {
                    swal("Oops...", 'Somethings wrong', "error");
                }
            }
        });
    });
// -----------------------------------------------------------------------------------------
// End - Insert New Agency

// -----------------------------------------------------------------------------------------
// Begin - Insert New Contact

    $('#submit-contact').click(function(e){

        e.preventDefault();
        $("#message").html("").removeClass("alert alert-success alert-danger alert-dismissable");

        $.ajax({

            url: $('.form-insert-contact').attr('action'),
            type: $('.form-insert-contact').attr('method'),
            data: new FormData($('.form-insert-contact')[0]),
            cache: false,
            processData: false,
            contentType: false,
            dataType: 'json',

            success: function(response) {

                if(response.error == false){

                    swal("Action successfully executed!", response.message, "success");
                    $(".form-insert-contact")[0].reset();
                    $("#avatar-img").attr('src', '/img/dummyavatar.png')

                } else {
                    swal("Error happened!", response.message, "error");
                }
            },
            error: function (response) {
                var errors = response.responseJSON.errors;

                if (errors) {
                    $.each( errors, function( k, v ) {
                        $('#message').append('<li>'+v[0]+'</li>').addClass("alert alert-success alert-danger alert-dismissable");
                    });
                } else {
                    swal("Oops...", 'Somethings wrong', "error");
                }
            }
        });
    });
// -----------------------------------------------------------------------------------------------
// End - Insert New Contact

// -----------------------------------------------------------------------------------------------
// Begin - Update Contact

    $('body').on('click', '.updateBtnContact', function (e) {

        var id = $(this).attr('data-id');
        console.log(id);
        e.preventDefault();

        $('.content').load("/contacts/edit");
        $("#message").html("").removeClass("alert alert-success alert-danger alert-dismissable");

        // Begin Ajax For Inserting Data From The Server Into The Edit Contact Form
        $.ajax({

            url: '/api/contacts/'+id+'/edit',
            type: 'GET',

            success: function(response) {
                $('#avatar-img').attr('src', (response.data.avatar ? '/storage/avatars/'+response.data.avatar+'' : '/img/dummyavatar.png'));
                $('#first_name').attr('value', response.data.first_name);
                $('#last_name').attr('value', response.data.last_name);
                $('#phone').attr('value', response.data.phone);
                $('#email').attr('value', response.data.email);
                $('#web').attr('value', response.data.web);

//                    $("#contactInsert option[value='" + response.data.agency_id + "']").attr("selected","selected");
            } ,
            error: function () {
                console.log('Error happend!');
            }
        }); // End Ajax For Inserting Data From The Server Into The Edit Contact Form

        $('body').on('click', '#submitBtnContact', function (e) {

            e.preventDefault();
            $("#message").html("").removeClass("alert alert-success alert-danger alert-dismissable");

            // Begin Ajax for Update Contact
            $.ajax({

                url: '/api/contacts/'+id+'/update',
                type: 'POST',
                data: new FormData($('#form-edit-contact')[0]),
                cache: false,
                processData: false,
                contentType: false,
                dataType: 'json',

                success: function(response) {
                    console.log(response);

                    if(response.error == false){
                        swal({
                                title: "Success!",
                                text: "Action successfully executed!",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonColor: "#009933",
                                confirmButtonText: "OK",
                                closeOnConfirm: false
                            },
                            function(isConfirm){
                                if (isConfirm) {
                                    window.location.href = "/";
                                }
                            });
                    } else {
                        swal("Error happened!", response.message, "error");
                    }
                },
                error: function (response) {
                    var errors = response.responseJSON.errors;
                    console.log(errors);

                    if (errors) {
                        $.each( errors, function( k, v ) {
                            $('#message').append('<li>'+v[0]+'</li>').addClass("alert alert-success alert-danger alert-dismissable");
                        });
                    } else {
                        swal("Oops...", 'Somethings wrong', "error");
                    }
                }
            }); // End Ajax for Update Contact
        });
    });
// --------------------------------------------------------------------------------------------------
// End - Update Contact
});