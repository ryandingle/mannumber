@foreach(session('permissions') as $permission)
	@if($permission->prefix == 'read')
		<a href="javascript:void(0)" data-id="{{ $data }}" data-modal="module" data-module="module" data-method="{{$data}}/show" class="view_modal label label-default"><i class="fa fa-eye"></i></a>
	@elseif($permission->prefix == 'update')
		<a href="javascript:void(0)" data-id="{{ $data }}" data-modal="module" data-module="module" data-method="{{$data}}/edit" class="view_modal label label-info"><i class="fa fa-edit"></i></a>   
	@elseif($permission->prefix == 'delete')
		<a href="javascript:void(0)" data-id="{{ $data }}" data-modal="delete" data-module="module" data-method="{{$data}}/destroy" class="view_modal label label-danger"><i class="fa fa-trash"></i></a>   
	@endif
@endforeach

