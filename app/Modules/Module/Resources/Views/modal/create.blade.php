<form class="form" method="POST" data-method="{{ $method }}" data-module="{{ $module }}" data-element="validation">
    {{ csrf_field() }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add New Module</h4>
    </div>
    <div class="modal-body">
        <div class="validation"></div>
        <div class="form-group">
            <label>Module Title</label>
            <input type="text" name="title" placeholder="Module Title" class="form-control">
        </div>
        <div class="form-group">
            <label>Module Description</label>
            <textarea name="description" placeholder="Module Description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>Module Prefix (ex. same as module title)</label>
            <input type="text" name="prefix" placeholder="Module Prefix" class="form-control">
        </div>
        <div class="form-group">
            <label>Module Icon (ex.fa-user) source: <a href="http://fontawesome.io/icons/" target="_blank">fontawesome.io font list</a></label>
            <input type="text" name="icon" placeholder="Module Icon" class="form-control">
        </div>
        <div class="form-group">
            <label>Sort Order ( optional )</label>
            <input type="text" name="sort_order" placeholder="Sort Order" class="form-control">
        </div>
        <div class="form-group">
            <label>Status</label>
            <select class="form-control select2" name="status">
                <option value="">Select Status</option>
                <option value="active" selected="selected">Active</option>
                <option value="disabled">Disabled</option>
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Save</button>
    </div>
</form>
<script src="{{ asset('js/module/module/module.js') }}"></script>