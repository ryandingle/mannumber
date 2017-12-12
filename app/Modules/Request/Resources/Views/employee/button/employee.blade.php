@foreach(session('permissions') as $permission)
	@if($permission->prefix == 'read')
		<a href="javascript:void(0)" 
			data-id="{{ $data }}" 
			data-size="lg" 
			data-modal="employee" 
			data-module="request" 
			data-method="employee/{{$data}}/show" 
			data-toggle="tooltip" 
			data-placement="left" 
			title="View Details" 
			class="view_modal label label-default"><i class="fa fa-eye"></i></a>
	@elseif($permission->prefix == 'update')
		<a href="javascript:void(0)" 
			data-id="{{ $data }}" 
			data-size="lg" data-modal="employee" 
			data-module="request" 
			data-toggle="tooltip" 
			data-placement="Top" 
			title="Edit Details"
			data-method="employee/{{$data}}/edit" class="view_modal label label-info"><i class="fa fa-edit"></i></a>  
	@elseif($permission->prefix == 'delete')
		<a href="javascript:void(0)" 
			data-id="{{ $data }}" 
			data-modal="delete" 
			data-module="request" 
			data-toggle="tooltip" 
			data-placement="right" 
			title="Delete Data" 
			data-method="employee/{{$data}}/destroy" class="view_modal label label-danger"><i class="fa fa-trash"></i></a
	@endif
@endforeach



   
