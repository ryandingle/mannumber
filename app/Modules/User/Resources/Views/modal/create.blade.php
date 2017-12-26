<form class="form" method="POST" data-method="{{ $method }}" data-module="{{ $module }}" data-element="validation">
    {{ csrf_field() }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add New User</h4>
    </div>
    <div class="modal-body">
        <div class="validation"></div>
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#basic" aria-controls="basic" role="tab" data-toggle="tab"><b>Basic Information</b></a></li>
            <li role="presentation"><a href="#credential" aria-controls="credential" role="tab" data-toggle="tab"><b>Credential Information</b></a></li>
            <li role="presentation"><a href="#security" aria-controls="security" role="tab" data-toggle="tab"><b>Security Access</b></a></li>
        </ul>
        <br>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="basic">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="firstname" placeholder="Employee Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Middle Name</label>
                            <input type="text" name="middlename" placeholder="Middle Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="lastname" placeholder="Last Name" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="credential">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" placeholder="Username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" placeholder="Email Address" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Employee Number</label>
                            <input type="text" name="employee_no" placeholder="Employee Number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>SSS Number</label>
                            <input type="text" name="sss_no" placeholder="SSS Number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password (default: password)</label>
                            <input type="password" name="password" value="password" placeholder="Password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Repeat Password</label>
                            <input type="password" name="password_confirmation" value="password" placeholder="Repeat password" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="security">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>User Access</label>
                            <select name="roles" data-placeholder="Select Role" class="form-control select2">
                                <option value=""></option>
                                @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Module Access</label>
                            <select name="modules[]" data-placeholder="Select Modules" class="form-control select2" multiple>
                                @foreach($modules as $module)
                                <option value="{{ $module->id }}">{{ $module->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Permission</label>
                            <select name="permissions[]" data-placeholder="Select Permissions" class="form-control select2" multiple>
                                @foreach($permissions as $permission)
                                <option value="{{ $permission->id }}">{{ $permission->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="status" data-placeholder="Select Status" class="form-control select2">
                                <option selected="selected" value="active">Active</option>
                                <option value="disabled">Disabled</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Save</button>
    </div>
</form>
<script src="{{ asset('js/module/user/user.js') }}"></script>