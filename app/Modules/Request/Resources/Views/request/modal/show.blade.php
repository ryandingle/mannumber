<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title"><i class="fa fa-info"></i>&nbsp;&nbsp;Request Details</h4>
</div>
<div class="modal-body">
	<table width="100%" cellpadding="0" cellspacing="0">
    	<tr>
    		<td width="30%">Batch ID</td>
    		<td class="text-left"><b>{{ $data->request_number }}</b></td>
    	</tr>
    	<tr>
    		<td width="30%">Request Number</td>
    		<td class="text-left"><b>{{ $data->request_number }}</b></td>
    	</tr>
        <tr>
            <td width="30%">Company</td>
            <td class="text-left"><b>{{ $data->company }}</b></td>
        </tr>
        <tr>
            <td width="30%">Branch</td>
            <td class="text-left"><b>{{ $data->branch }}</b></td>
        </tr>
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
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>