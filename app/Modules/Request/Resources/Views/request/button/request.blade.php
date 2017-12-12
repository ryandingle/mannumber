@foreach(session('permissions') as $permission)
	@if($permission->prefix == 'read')
		<a href="javascript:void(0)" 
			data-id="{{ $data }}" 
			data-modal="request" 
			data-module="request" 
			data-toggle="tooltip" 
			data-placement="left" 
			title="View Details" 
			data-method="{{$data}}/show" class="view_modal label label-default"><i class="fa fa-eye"></i></a>
		<a data-toggle="tooltip" 
			data-placement="bottom" 
			title="Add Employees" href="{{ route('employee', ['id' => $data]) }}" class="label label-primary"><i class="fa fa-plus"></i></a>   
	@elseif($permission->prefix == 'update')
		<a href="javascript:void(0)" 
			data-id="{{ $data }}" 
			data-modal="request" 
			data-module="request" 
			data-toggle="tooltip" 
			data-placement="top" 
			title="Edit Details" 
			data-method="{{$data}}/edit" class="view_modal label label-info"><i class="fa fa-edit"></i></a>
	@elseif($permission->prefix == 'delete')
		<a href="javascript:void(0)" 
			data-id="{{ $data }}" 
			data-modal="delete" 
			data-module="request" 
			data-toggle="tooltip" 
			data-placement="right" 
			title="Delete Data" 
			data-method="{{$data}}/destroy" class="view_modal label label-danger"><i class="fa fa-trash"></i></a
	@endif
@endforeach
