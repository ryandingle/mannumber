/*DYNAMIQ MODAL*/
$(document).on('click', '.view_modal', function(){
	var dis 		= $(this)
	var id 			= dis.data('id') ? dis.data('id') : '';
	var modal 		= dis.data('modal') ? dis.data('modal') : '';
	var size 		= dis.data('size') ? dis.data('size') : '';
	var isdelete 	= dis.data('isdelete') ? dis.data('isdelete') : '';
	var module 		= dis.data('module') ? dis.data('module') : '';
	var method 		= dis.data('method') ? dis.data('method') : '';
	var param1 		= dis.data('param1') ? dis.data('param1') : '';
	var param2 		= dis.data('param2') ? dis.data('param2') : '';
	var param3 		= dis.data('param3') ? dis.data('param3') : '';
	var param4 		= dis.data('param4') ? dis.data('param4') : '';
	var param5 		= dis.data('param5') ? dis.data('param5') : '';

	var data = {
		id 		: id,
		modal 	: modal,
		size	: size,
		method 	: method,
		module 	: module,
		param1 	: param1,
		param2 	: param2,
		param3 	: param3,
		param4 	: param4,
		param5 	: param5,
	};

	var template = '<div class="modal fade '+modal+'" id="'+modal+'">';
    template += '    <div class="modal-dialog modal-'+size+'" style="width: '+size+'">';
    template += '        <div class="modal-content">';
    template += '            <div class="modal-body">';
    template += '                <div class="row"><p class="text-center"><img style="width:35px" src="/img/loader.gif" /></p></div>';
    template += '            </div>';
    template += '        </div>';
    template += '    </div>';
    template += '</div>';

    var modal_delete = '<div class="modal" id="'+modal+'">';
    modal_delete += '    <div class="modal-dialog modal-sm">';
    modal_delete += '        <div class="modal-content">';
    modal_delete += '        	<div class="modal-header">';
    modal_delete += '            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
    modal_delete += '            	<span aria-hidden="true">&times;</span></button>';
    modal_delete += '            	<h4 class="modal-title"><i class="fa fa-trash"></i>&nbsp;&nbsp;Delete</h4>';
    modal_delete += '        	 </div>';
    modal_delete += '            <div class="modal-body">';
    modal_delete += '                <div class="row"><h4 class="text-center">Are you sure you want to delete this data ?</h4></div>';
    modal_delete += '            </div>';
    modal_delete += '			 <div class="modal-footer">';
    modal_delete += '    			 <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>';
    modal_delete += '    			 <button type="button" class="btn btn-danger delete_action" data-module="'+module+'" data-method="'+method+'" data-id="'+id+'" data-param1="'+param1+'"  data-param2="'+param2+'"  data-param3="'+param3+'"  data-param4="'+param4+'"  data-param5="'+param5+'">Delete</button>';
    modal_delete += '			</div>';
    modal_delete += '        </div>';
    modal_delete += '    </div>';
    modal_delete += '</div>';

    if(modal == ''){ console.log('Please specify modal name.'); alert('Please specify modal name.'); return false;}
    if(method == ''){ console.log('Please specify method name.'); alert('Please specify method name.'); return false;}
    if(module == ''){ console.log('Please specify module name.'); alert('Please specify module name.'); return false;}

    if(modal == 'delete' || isdelete == '1')
    {
    	if($('#'+modal).length == 0){
			$('body').append(modal_delete);
			$('#'+modal).modal('show');
		}else{
			
			$('#'+modal).remove();
			$('body').append(modal_delete);
			$('#'+modal).modal('show');
		} 
    }
    else
    {
    	if($('#'+modal).length == 0){
			$('body').append(template);
			$('#'+modal).modal('show');
			$.get($path+''+module+'/'+method+'/',data, function(response){
				$('#'+modal+' .modal-content').html(response);
			});
		}else{
			$('#'+modal).remove();
			$('body').append(template);
			$('#'+modal).modal('show');
			$.get($path+''+module+'/'+method+'/',data, function(response){
				$('#'+modal+' .modal-content').html(response);
			});
		} 
    }
});
/*END DYNAMIQ MODAL*/

/*DYNAMIQ DELETE POST*/
$(document).on('click', '.delete_action', function(){

	var dis 		= $(this)
	var id 			= dis.data('id') ? dis.data('id') : '';
	var module 		= dis.data('module') ? dis.data('module') : '';
	var param1 		= dis.data('param1') ? dis.data('param1') : '';
	var param2 		= dis.data('param2') ? dis.data('param2') : '';
	var param3 		= dis.data('param3') ? dis.data('param3') : '';
	var param4 		= dis.data('param4') ? dis.data('param4') : '';
	var param5 		= dis.data('param5') ? dis.data('param5') : '';
	var method 		= dis.data('method') ? dis.data('method') : '';

	var form = new FormData();
		form.append('id', id);
		form.append('method' ,method);
		form.append('module' ,module);
		form.append('param1' ,param1);
		form.append('param2' ,param2);
		form.append('param3' ,param3);
		form.append('param4' ,param4);
		form.append('param5' ,param5);

	$.ajax({
		type: 'POST',
		url: $path+module+'/'+method,
		data: form,
		processData: false,
		contentType: false,
		beforeSend: function(){
			$(dis).find('button').attr('disabled', 'disabled');
			$('.delete .modal-body').html('<div class="row"><p class="text-center"><img style="width:35px" src="/img/loader.gif" /></p></div>');
		},
		success: function(response){
			$(dis).find('button').removeAttr('disabled', 'disabled');
			$('.delete .modal-body').html('<div class="row"><h4 class="text-center">Are you sure you want to delete this data ?</h4></div>');

			$.notify(response.message, "success");

			if($('#dataTableBuilder').length !== 0){
				var table = $('#dataTableBuilder').dataTable();
			  	table.api().ajax.reload();
			}

			$('.close').trigger('click');
		},
		error: function(response){
			$.notify(response.responseJSON.message, "error");
			$('.delete .modal-body').html('<div class="row"><h4 class="text-center">Are you sure you want to delete this data ?</h4></div>');
			$(dis).find('button').removeAttr('disabled', 'disabled');
		}
	});
});
/*END DYNAMIQ DELETE POST*/

/*DYNAMIQ FORM POST*/
$(document).on('submit', '.form', function(e){

	e.preventDefault();

	var dis 		= $(this)
	var id 			= dis.data('id') ? dis.data('id') : '';
	var element 	= dis.data('element') ? dis.data('element') : 'validation';
	var modal 		= dis.data('modal') ? dis.data('modal') : '';
	var size 		= dis.data('size') ? dis.data('size') : '';
	var isdelete 	= dis.data('isdelete') ? dis.data('isdelete') : '';
	var module 		= dis.data('module') ? dis.data('module') : '';
	var param1 		= dis.data('param1') ? dis.data('param1') : '';
	var param2 		= dis.data('param2') ? dis.data('param2') : '';
	var param3 		= dis.data('param3') ? dis.data('param3') : '';
	var param4 		= dis.data('param4') ? dis.data('param4') : '';
	var param5 		= dis.data('param5') ? dis.data('param5') : '';
	var method 		= dis.data('method') ? dis.data('method') : '';

	var form = new FormData(dis[0]);
		form.append('id', id);
		form.append('modal' ,modal);
		form.append('size' ,size);
		form.append('method' ,method);
		form.append('module' ,module);
		form.append('param1' ,param1);
		form.append('param2' ,param2);
		form.append('param3' ,param3);
		form.append('param4' ,param4);
		form.append('param5' ,param5);

	$.ajax({
		type: 'POST',
		url: $path+module+'/'+method,
		data: form,
		processData: false,
		contentType: false,
		beforeSend: function(){
			$(dis).find('button, input, textarea, select, radio, checkbox').attr('disabled', 'disabled');
		},
		success: function(response){
			$(dis).find('button, input, textarea, select, radio, checkbox').removeAttr('disabled', 'disabled');
			if(id == ''){
				$(dis).find('button, input, textarea, radio, checkbox').val('');
			}

			$.notify(response.message, "success");
			//alert_template(response.message, '', element);

			/*CHECK IF DATATABLE IF PRESENT*/
			if($('#dataTableBuilder').length !== 0){
				var table = $('#dataTableBuilder').dataTable();
			  	table.api().ajax.reload();
			}

			/*CHECK IF IN STATE OF ACCOUNT PAGE*/
			if($('.account-page').length !== 0)
			{
				get_account_info(id);
			}

			$('.close').trigger('click');
		},
		error: function(response){
			$.notify(response.responseJSON.message, "error");
			alert_template(response.responseJSON.message, response.responseJSON.errors, element);
			$(dis).find('button, input, textarea, select, radio, checkbox').removeAttr('disabled', 'disabled');
		}
	});
});
/*END DYNAMIQ FORM POST*/

/*COMMON FUNCTIONS*/
function alert_template(message, error, element) {

	var template = '<div class="callout callout-danger">';
    template 	+= '<h4><i class="fa fa-info"></i> '+message+'</h4>';

    if(error != ''){
		$.each(error, function(key){
	    	template 	+= '<p>'+error[key]+'</p>';
		});
	}

    template 	+= '</div>';

    $('.'+element).html(template);
}

/*SET SELECT VALUE*/
function set_select2_value(name, url, data) {
	$(name).select2().val(data).trigger('change');
}

/*UPDATE ACCOUNT INFO*/
function get_account_info(id) {

	$.get($path+'account/'+id+'/show', function(data){

		if(data.image){
			$('.text-section').hide();
			$('.image-section').show().attr('src', data.image);
		}else{
			$('.text-section').show();
		}

		$('.name').html(data.name);
		$('.firstname').html(data.firstname);
		$('.middlename').html(data.middlename);
		$('.lastname').html(data.lastname);
		$('.username').html(data.username);
		$('.email').html(data.email);
		$('.employee_number').html(data.employee_number);
		$('.employee_no').html(data.employee_no);
		$('.sss_no').html(data.sss_no);
		$('.status').html(data.status);
	});
}


/*INITIALIZE PLUGIN*/
/*initialize select2*/
if($('.select2').length !== 0)
{
	$('.select2').select2();
}

/*initialize datepicker*/
if($('.datepicker').length !== 0)
{
	$('.datepicker').datepicker({
	  autoclose: true,
	  defaultDate: new Date()
	});
}

/*initialize tooltip*/
$('[data-toggle="tooltip"]').tooltip();