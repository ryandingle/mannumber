<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title"><i class="fa fa-info"></i>&nbsp;&nbsp;Employee Details</h4>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
		    <h4>Primary Information</h4>
		    <hr>
		    <table width="100%" cellpadding="0" cellspacing="0">
		    	<tr>
		    		<td width="30%">Employee Number</td>
		    		<td class="text-left"><b>{{ $data->employee_number }}</b></td>
		    	</tr>
		    	<tr>
		    		<td width="30%">Employee Company</td>
		    		<td class="text-left"><b>{{ $data->company }}</b></td>
		    	</tr>
		    	<tr>
		    		<td width="30%">Employee Branch</td>
		    		<td class="text-left"><b>{{ $data->branch }}</b></td>
		    	</tr>
		    	<tr>
		    		<td width="30%">Date Hired</td>
		    		<td class="text-left"><b>{{ $data->date_hire }}</b></td>
		    	</tr>
		    	<tr>
		    		<td width="30%">Full Name</td>
		    		<td class="text-left"><b>{{ $data->full_name }}</b></td>
		    	</tr>
		    	<tr>
		    		<td width="30%">First Name</td>
		    		<td class="text-left"><b>{{ $data->first_name }}</b></td>
		    	</tr>
		    	<tr>
		    		<td width="30%">Middle Name</td>
		    		<td class="text-left"><b>{{ $data->middle_name }}</b></td>
		    	</tr>
		    	<tr>
		    		<td width="30%">Last Name</td>
		    		<td class="text-left"><b>{{ $data->last_name }}</b></td>
		    	</tr>
		    	<tr>
		    		<td width="30%">Age</td>
		    		<td class="text-left"><b>{{ $data->age }}</b></td>
		    	</tr>
		    	<tr>
		    		<td width="30%">Birth Date</td>
		    		<td class="text-left"><b>{{ $data->birth_date }}</b></td>
		    	</tr>
		    	<tr>
		    		<td width="30%">Gender</td>
		    		<td class="text-left"><b>{{ $data->gender }}</b></td>
		    	</tr>
		    	<tr>
		    		<td width="30%">Marital Status</td>
		    		<td class="text-left"><b>{{ $data->marital_status }}</b></td>
		    	</tr>
		    	<tr>
		    		<td width="30%">Religion</td>
		    		<td class="text-left"><b>{{ $data->religion }}</b></td>
		    	</tr>
		    	<tr>
		    		<td width="30%">Contact</td>
		    		<td class="text-left"><b>{{ $data->contact }}</b></td>
		    	</tr>
		    	<tr>
		    		<td width="30%">Address</td>
		    		<td class="text-left"><b>{{ $data->address }}</b></td>
		    	</tr>
		    	<tr>
		    		<td width="30%">Zip Code</td>
		    		<td class="text-left"><b>{{ $data->zip_code }}</b></td>
		    	</tr>
		    	<tr>
		    		<td width="30%">Post Code</td>
		    		<td class="text-left"><b>{{ $data->post_code }}</b></td>
		    	</tr>
		    </table>
		    <hr>
		</div>
		<div class="col-md-12">
		    <h4>Government Mandatory</h4>
		    <hr>
		    <table width="100%" cellpadding="0" cellspacing="0">
		    	<tr>
		    		<td width="30%">SSS Number</td>
		    		<td class="text-left"><b>{{ $data->sss_number }}</b></td>
		    	</tr>
		    	<tr>
		    		<td width="30%">Philhealth Number</td>
		    		<td class="text-left"><b>{{ $data->phic_number }}</b></td>
		    	</tr>
		    	<tr>
		    		<td width="30%">Pagibig Number</td>
		    		<td class="text-left"><b>{{ $data->pagibig_number }}</b></td>
		    	</tr>
		    	<tr>
		    		<td width="30%">HDMF Number</td>
		    		<td class="text-left"><b>{{ $data->hdmf_number }}</b></td>
		    	</tr>
		    </table>
		    <hr>
		</div>
		<div class="col-md-12">
		    <h4>Others</h4>
		    <hr>
		    <table width="100%" cellpadding="0" cellspacing="0">
		    	<tr>
		    		<td width="30%">Date Regularized</td>
		    		<td class="text-left"><b>{{ $data->date_regularized }}</b></td>
		    	</tr>
		    	<tr>
		    		<td width="30%">Department</td>
		    		<td class="text-left"><b>{{ $data->department }}</b></td>
		    	</tr>
		    	<tr>
		    		<td width="30%">Previous Branch</td>
		    		<td class="text-left"><b>{{ $data->previous_branch }}</b></td>
		    	</tr>
		    	<tr>
		    		<td width="30%">Daily rate</td>
		    		<td class="text-left"><b>{{ $data->daily_rate }}</b></td>
		    	</tr>
		    	<tr>
		    		<td width="30%">Hourly Rate</td>
		    		<td class="text-left"><b>{{ $data->hourly_rate }}</b></td>
		    	</tr>
		    </table>
		    <hr>
		</div>
		<div class="col-md-12">
			<table width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td width="30%">Created At</td>
					<td class="text-left"><b>{{ $data->created_at }}</b></td>
				</tr>
				<tr>
					<td width="30%">Created By</td>
					<td class="text-left"><b>{{ $created_by }}</b></td>
				</tr>
				<tr>
					<td width="30%">Updated At</td>
					<td class="text-left"><b>{{ $data->updated_at }}</b></td>
				</tr>
				<tr>
					<td width="30%">Updated By</td>
					<td class="text-left"><b>{{ $updated_by }}</b></td>
				</tr>
			</table>
		</div>
	</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>