<form class="form" method="POST" data-method="{{ $method }}" data-module="{{ $module }}" data-element="validation">
    {{ csrf_field() }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add New Permission</h4>
    </div>
    <div class="modal-body">
        <div class="validation"></div>
        <div class="form-group">
            <label>Permission Title</label>
            <input type="text" name="title" placeholder="Permission Title" class="form-control">
        </div>
        <div class="form-group">
            <label>Permission Prefix</label>
            <input type="text" name="prefix" placeholder="Permission Prefix" class="form-control">
        </div>
        <div class="form-group">
            <label>Permission Description</label>
            <textarea name="description" placeholder="Permission Description" class="form-control"></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Save</button>
    </div>
</form>