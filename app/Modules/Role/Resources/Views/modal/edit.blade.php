<form class="form" method="POST" data-method="{{ $method }}" data-module="{{ $module }}" data-id="{{ $id }}">
    {{ csrf_field() }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit Role Details</h4>
    </div>
    <div class="modal-body">
        <div class="validation"></div>
        <div class="form-group">
            <label>Role Title</label>
            <input type="text" name="title" placeholder="Role Title" value="{{ $data->title }}" class="form-control">
        </div>
        <div class="form-group">
            <label>Role Prefix</label>
            <input type="text" name="prefix" placeholder="Role Prefix" value="{{ $data->prefix }}" class="form-control">
        </div>
        <div class="form-group">
            <label>Role Description</label>
            <textarea name="description" placeholder="Role Description" class="form-control">{{ $data->description }}</textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info"><i class="fa fa-save"></i>&nbsp;Update</button>
    </div>
</form>