<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div id="message"></div>
            <form id="form-edit-agency" method="" action="">
                {{--<input name="_method" type="hidden" value="PUT">--}}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Edit Agency</strong></div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label for="agency_name">Agency Name *</label>
                            <input type="text" class="form-control" id="agency_name" name="agency_name" value="">
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label for="address">Address *</label>
                            <input type="text" class="form-control" id="address" name="address" value="">
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label for="phone">Phone *</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="">
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="text" class="form-control" id="email" name="email" value="">
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label for="web">Web</label>
                            <input type="text" class="form-control" id="web" name="web" value="">
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label for="countryInsert">Country *</label>
                            <select id="countryInsert" class="countryInsert custom-select custom-select-lg" name="country_id">
                                <option value="">Choose a country...</option>
                            </select>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label for="cityInsert">City *</label>
                            <select id="cityInsert" class="cityInsert custom-select custom-select-lg" name="city_id">
                                <option value="">Choose a city...</option>
                            </select>
                        </div>
                    </div>

                    <div class="panel-footer">
                        <button id="submitBtnAgency" type="submit" class="btn btn-primary">Edit</button>
                        <button class="btn btn-primary" onclick="history.go(-1);">Go back</button>
                    </div>
                    </div>
                </form>
        </div>
    </div>
</div>
<!-- Custom Scripts For Edit Contact -->
<script type="text/javascript" src="/js/script_edit_agency.js"></script>
