<form class="form" method="POST" data-method="{{ $method }}" data-module="{{ $module }}" data-id="{{ $id }}">
    {{ csrf_field() }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit Module Details</h4>
    </div>
    <div class="modal-body">
        <div class="validation"></div>
        <div class="form-group">
            <label>Module Title</label>
            <input type="text" name="title" value="{{ $data->title }}" placeholder="Module Title" class="form-control">
        </div>
        <div class="form-group">
            <label>Module Description</label>
            <textarea name="description" placeholder="Module Description" class="form-control">{{ $data->description }}</textarea>
        </div>
        <div class="form-group">
            <label>Module Prefix (ex. same as module title)</label>
            <input type="text" name="prefix" value="{{ $data->prefix }}" placeholder="Module Prefix" class="form-control">
        </div>
        <div class="form-group">
            <label>Module Icon (ex.fa-user) source: <a href="http://fontawesome.io/icons/" target="_blank">fontawesome.io font list</a></label>
            <input type="text" name="icon" value="{{ $data->icon }}" placeholder="Module Icon" class="form-control">
        </div>
        <div class="form-group">
            <label>Sort Order ( optional )</label>
            <input type="text" name="sort_order" value="{{ $data->sort_order }}" placeholder="Sort Order" class="form-control">
        </div>
        <div class="form-group">
            <label>Status</label>
            <select class="form-control select2" name="status">
                <option value="">Select Status</option>
                <option <?php echo ($data->status == 'active') ? 'selected="selected"' : '';?> value="active">Active</option>
                <option <?php echo ($data->status == 'disabled') ? 'selected="selected"' : '';?> value="disabled">Disabled</option>
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info"><i class="fa fa-save"></i>&nbsp;Update</button>
    </div>
</form>
<script src="{{ asset('js/module/module/module.js') }}"></script>