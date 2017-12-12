<form class="form" method="POST" data-method="{{ $method }}" data-module="{{ $module }}" data-id="{{ $id }}" data-element="validation">
    {{ csrf_field() }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit Employee Details</h4>
    </div>
    <div class="modal-body">
        <div class="validation"></div>
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#primary" aria-controls="home" role="tab" data-toggle="tab"><b>Primary Information</b></a></li>
            <li role="presentation"><a href="#government" aria-controls="profile" role="tab" data-toggle="tab"><b>Government Mandatory</b></a></li>
            <li role="presentation"><a href="#others" aria-controls="messages" role="tab" data-toggle="tab"><b>Others</b></a></li>
        </ul>
        <br>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="primary">
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label>Employee Number</label>
                        <div class="input-group">
                            <input disabled="disabled" name="employee_number" value="{{ $data->employee_number }}" type="text" class="form-control" placeholder="To be generated upon saving.">
                            <span class="input-group-addon"><i class="fa fa-vcard"></i></span>
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label>Company</label>
                        <div class="input-group">
                            <input name="company" value="{{$data->company}}" type="text" class="form-control" placeholder="Your Company">
                            <span class="input-group-addon"><i class="fa fa-institution"></i></span>
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label>Branch</label>
                        <div class="input-group">
                            <input name="branch" value="{{$data->branch}}" type="text" class="form-control" placeholder="Your Branch">
                            <span class="input-group-addon"><i class="fa fa-institution"></i></span>
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label>Date Hired</label>
                        <div class="input-group">
                            <input type="text" value="{{ ($data->date_hire !== NULL) ? date('m/d/Y', strtotime($data->date_hire)) : '' }}" name="date_hired" class="form-control datepicker" placeholder="Select Date">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div>
                    <div class="col-md-12"><hr></div>
                    <div class="form-group col-lg-4">
                        <label>First Name</label>
                        <input name="first_name" value="{{ $data->first_name }}" type="text" class="form-control" placeholder="First Name">
                    </div>
                    <div class="form-group col-lg-4">
                        <label>Middle Name</label>
                        <input name="middle_name" value="{{ $data->middle_name }}" type="text" class="form-control" placeholder="Middle Name">
                    </div>
                    <div class="form-group col-lg-4">
                        <label>Last Name</label>
                        <input name="last_name" type="text" value="{{ $data->last_name }}" class="form-control" placeholder="Last Name.">
                    </div>
                    <div class="form-group col-lg-4">
                        <label>Age</label>
                        <input name="age" type="text" value="{{ $data->age }}" class="form-control" placeholder="age.">
                    </div>
                    <div class="form-group col-lg-4">
                        <label>Birth Date</label>
                        <div class="input-group">
                            <input type="text" name="birth_date" value="{{ ($data->birth_date !== NULL) ? date('m/d/Y', strtotime($data->birth_date)) : '' }}" class="form-control datepicker" placeholder="Select Date">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label>Gender</label>
                        <select name="gender" class="form-control select2">
                            <option value=""> Select Gender </option>
                            <option <?php echo ($data->gender == 'male') ? 'selected="selected"' : '';?> value="male">Male</option>
                            <option <?php echo ($data->gender == 'female') ? 'selected="selected"' : '';?> value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-4">
                        <label>Marital Status</label>
                        <select name="marital_status" class="form-control select2">
                            <option value=""> Select Status </option>
                            <option <?php echo ($data->marital_status == 'single') ? 'selected="selected"' : '';?> value="single">Single</option>
                            <option <?php echo ($data->marital_status == 'married') ? 'selected="selected"' : '';?> value="married">Married</option>
                            <option <?php echo ($data->marital_status == 'others') ? 'selected="selected"' : '';?> value="others">Others</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Address</label>
                        <textarea class="form-control" name="address" placeholder="Address">{{ $data->address }}</textarea>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label>Religion</label>
                            <input name="religion" type="text" value="{{ $data->religion }}" class="form-control" placeholder="Religion">
                        </div>
                        <div class="col-lg-3">
                            <label>Contact Number</label>
                            <input name="contact" type="text" value="{{ $data->contact }}" class="form-control" placeholder="Contact Number">
                        </div>
                        <div class="col-lg-3">
                            <label>Zip Code</label>
                            <input name="zip_code" type="text" value="{{ $data->zip_code }}" class="form-control" placeholder="Zip Code">
                        </div>
                        <div class="col-lg-3">
                            <label>Post Code</label>
                            <input name="post_code" type="text" value="{{ $data->post_code }}" class="form-control" placeholder="Post Code">
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="government">
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label>TIN Number</label>
                        <input name="tin_number" type="text" value="{{ $data->tin_number }}" class="form-control" placeholder="TIN Number">
                    </div>
                    <div class="form-group col-lg-4">
                        <label>SSS Number</label>
                        <input name="sss_number" type="text" value="{{ $data->sss_number }}" class="form-control" placeholder="SSS Number">
                    </div>
                    <div class="form-group col-lg-4">
                        <label>HDMF Number</label>
                        <input name="hdmf_number" type="text" value="{{ $data->hdmf_number }}" class="form-control" placeholder="HDMF Number">
                    </div>
                    <div class="form-group col-lg-4">
                        <label>Philhealth Number</label>
                        <input name="phic_number" type="text" value="{{ $data->phic_number }}" class="form-control" placeholder="Philhealth Number.">
                    </div>
                    <div class="form-group col-lg-4">
                        <label>Pagibig Number</label>
                        <input name="pagibig_number" type="text" value="{{ $data->pagibig_number }}" class="form-control" placeholder="Pagibig Number.">
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="others">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="col-lg-2">Date Regularized</label>
                        <div class="col-lg-4">
                            <input name="date_regularized" value="{{ ($data->date_regularized !== NULL) ? date('m/d/Y', strtotime($data->date_regularized)) : '' }}" type="text" class="form-control datepicker" placeholder="Date Regularized.">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-lg-2">Department</label>
                        <div class="col-lg-4">
                            <input name="department" type="text" value="{{ $data->department }}" class="form-control" placeholder="Department.">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-lg-2">Previous Branch</label>
                        <div class="col-lg-4">
                            <input name="previous_branch" value="{{ $data->previous_branch }}" type="text" class="form-control" placeholder="Previous Branch.">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-lg-2">Daily Rate</label>
                        <div class="col-lg-4">
                            <input name="daily_rate" type="text" value="{{ $data->daily_rate }}" class="form-control" placeholder="Daily Rate.">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-lg-2">Hourly Rate</label>
                        <div class="col-lg-4">
                            <input name="hourly_rate" type="text" value="{{ $data->hourly_rate }}" class="form-control" placeholder="Hourly Rate.">
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
<script src="{{ asset('js/module/request/employee.js') }}"></script>