<form class="form" method="POST" data-method="{{ $method }}" data-module="{{ $module }}" data-id="{{ $id }}" data-element="validation">
    {{ csrf_field() }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit Request Details</h4>
    </div>
    <div class="modal-body">
        <div class="validation"></div>
        <div class="form-group">
            <label>Request Number</label>
            <input type="text" name="request_number" placeholder="Request Number" value="{{ $data->request_number }}" class="form-control">
        </div>
        <div class="form-group">
            <label>Company Code</label>
            <input type="text" name="company" placeholder="Company" value="{{ $data->company }}" class="form-control">
        </div>
        <div class="form-group">
            <label>Branch Code</label>
            <input type="text" name="branch" placeholder="Branch" value="{{ $data->branch }}" class="form-control">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info"><i class="fa fa-save"></i>&nbsp;Update</button>
    </div>
</form>