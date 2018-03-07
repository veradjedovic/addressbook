<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div id="message"></div>
            <form id="form-edit-contact" method="" action="" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Edit Contact</strong></div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label for="">Avatar</label>
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div id="prewAvatar" style="width: 200px; height: 200px;">
                                    <img id="avatar-img" src="/img/dummyavatar.png" alt="your image" height="200" width="200"/>
                                </div>
                                <div>
                                    <input id="avatar-upload" size="12" type="file" name="f_upload" value="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label for="first_name">First Name *</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="">
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label for="last_name">Last Name *</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="">
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
                            <label for="agencyInsert">Agency *</label>
                            <select id="agencyInsert" class="agencyInsert custom-select custom-select-lg" name="agency_id">
                                <option value="">Choose an agency...</option>
                            </select>
                        </div>
                    </div>

                    <div class="panel-footer">
                        <button id="submitBtnContact" type="submit" class="btn btn-primary">Edit</button>
                        <button class="btn btn-primary" onclick="history.go(-1);">Go back</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Custom Scripts For Edit Contact -->
<script type="text/javascript" src="/js/script_edit_contact.js"></script>