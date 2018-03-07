@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        
        <div class="panel-heading"><strong>Add New</strong></div>
        <div class="panel-body">

            <!-- Container For Error Messages -->
            <div id="message"></div>

            <!-- Insert Contact Form -->
            <form class="form-insert-contact" method="post" action="/api/contacts" enctype="multipart/form-data">
                <table id="insertContact" class="table table-striped">
                    <tr>
                        <th>Avatar</th>
                        <th>First name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Web</th>
                        <th>Agency</th>
                        <th> </th>
                    </tr>
                    <tr>
                        <td><input id="avatar-upload" size="12" type="file" name="f_upload" value=""><img id="avatar-img" src="/img/dummyavatar.png" alt="your image" width="100" height="100"/></td>
                        <td><input size="12" type="text" name="first_name" value=""></td>
                        <td><input size="12" type="text" name="last_name" value=""></td>
                        <td><input size="12" type="text" name="phone" value=""></td>
                        <td><input size="12" type="text" name="email" value=""></td>
                        <td><input size="12" type="text" name="web" value=""></td>
                        <td>
                            <select id="agencyInsert" class="agencyInsert" name="agency_id">
                                <option>Choose an Agency</option>
                            </select>
                        </td>
                        <td><input id="submit-contact" class="btn btn-primary" type="submit" name="btn_insert_contact" value="Add New Contact"></td>
                    </tr>
                </table>
            </form>
            <!-- End Insert Contact Form -->

            <!-- Insert Agency Form -->
            <form class="form-insert-agency" method="post" action="/api/agencies">
                <table id="insertAgency" class="table table-striped">
                    <tr>
                        <th>Agency name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Web</th>
                        <th>Country</th>
                        <th>City</th>
                        <th> </th>
                    </tr>
                    <tr>
                        <td><input size="12" type="text" name="agency_name" value=""></td>
                        <td><input size="12" type="text" name="address" value=""></td>
                        <td><input size="12" type="text" name="phone" value=""></td>
                        <td><input size="12" type="text" name="email" value=""></td>
                        <td><input size="12" type="text" name="web" value=""></td>
                        <td>
                            <select id="countryInsert" class="countryInsert" name="country_id">
                                <option value="">Choose a country</option>
                            </select>
                        </td>
                        <td>
                            <select id="cityInsert" class="cityInsert" name="city_id">
                                <option value="">Choose a city</option>
                            </select>
                        </td>
                        <td><input id="submit-agency" class="btn btn-primary" type="submit" name="btn_insert_agency" value="Add New Agency"></td>
                    </tr>
                </table>
            </form>
            <!-- End Insert Agency Form -->
            
        </div>

        <!-- Title of Datatable of Agency -->
        <div class="panel-heading"><strong>Agencies</strong></div>

        <!-- Datatable of Agency -->
        <div class="panel-body">
            <table id="datatable" class="table table-striped">
            </table>
        </div>
        <!-- End of Datatable of Agency -->

        <!-- Title of Datatable of Contact -->
        <div id="datatable-title" class=""><strong></strong></div>

        <!-- Datatable of Contact. The Table Was Initialized Via Javascript -->
        <div id="datatable-contacts-body" class="panel-body"></div>
        <!-- End of Datatable of Contact -->

        <p id="scroll"></p>

    </div>
@endsection
        
