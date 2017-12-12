<form class="form" method="POST" data-method="{{ $method }}" data-module="{{ $module }}" data-id="{{ $id }}">
    {{ csrf_field() }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit Account Details</h4>
    </div>
    <div class="modal-body">
        <div class="validation"></div>
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#basic" aria-controls="basic" role="tab" data-toggle="tab"><b>Basic Information</b></a></li>
            <li role="presentation"><a href="#credential" aria-controls="credential" role="tab" data-toggle="tab"><b>Credential Information</b></a></li>
        </ul>
        <br>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="basic">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Profile Picture</label>
                            <input type="file" name="image" placeholder="Profile Picture">
                        </div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="firstname" value="{{ $data->firstname }}" placeholder="Employee Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Middle Name</label>
                            <input type="text" name="middlename" value="{{ $data->middlename }}" placeholder="Middle Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="lastname" value="{{ $data->lastname }}" placeholder="Last Name" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="credential">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" readonly="readonly" name="username" value="{{ $data->username }}" placeholder="Username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" value="{{ $data->email }}" placeholder="Email Address" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Employee Number</label>
                            <input type="text" name="employee_no" value="{{ $data->employee_no }}" placeholder="Employee Number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>SSS Number</label>
                            <input type="text" name="sss_no" value="{{ $data->sss_no }}" placeholder="SSS Number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Repeat Password</label>
                            <input type="password" name="password_confirmation" placeholder="Repeat password" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info"><i class="fa fa-save"></i>&nbsp;Update</button>
    </div>
</form>