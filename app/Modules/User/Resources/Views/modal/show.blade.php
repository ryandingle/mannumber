<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title"><i class="fa fa-info"></i>&nbsp;&nbsp;User Details</h4>
</div>
<div class="modal-body">
	<table width="100%" cellpadding="0" cellspacing="0">
    	<tr>
    		<td width="30%">First Name</td>
    		<td class="text-left"><b>{{ $data->firstname }}</b></td>
    	</tr>
    	<tr>
    		<td width="30%">Middle Name</td>
    		<td class="text-left"><b>{{ $data->middlename }}</b></td>
    	</tr>
    	<tr>
    		<td width="30%">Last Name</td>
    		<td class="text-left"><b>{{ $data->lastname }}</b></td>
    	</tr>
        <tr>
            <td width="30%">Employee Number</td>
            <td class="text-left"><b>{{ $data->employee_no }}</b></td>
        </tr>
        <tr>
            <td width="30%">SSS Number</td>
            <td class="text-left"><b>{{ $data->sss_no }}</b></td>
        </tr>
        <tr>
            <td width="30%">Username</td>
            <td class="text-left"><b>{{ $data->username }}</b></td>
        </tr>
        <tr>
            <td width="30%">Email</td>
            <td class="text-left"><b>{{ $data->email }}</b></td>
        </tr>


        <tr>
            <td width="30%" colspan="2">&nbsp;</td>
        </tr>

        <tr>
            <td width="30%">Role</td>
            <td class="text-left">
                <b>{{ $roles->title }}</b>
            </td>
        </tr>

        <tr>
            <td width="30%" colspan="2">&nbsp;</td>
        </tr>

        <tr>
            <td width="30%">Modules</td>
            <td class="text-left">
                @foreach($modules as $module)
                <b>{{ $module->title }}</b><br>
                @endforeach
            </td>
        </tr>

        <tr>
            <td width="30%" colspan="2">&nbsp;</td>
        </tr>

        <tr>
            <td width="30%">Permission</td>
            <td class="text-left">
                @foreach($permissions as $permission)
                <b>{{ $permission->title }}</b><br>
                @endforeach
            </td>
        </tr>

        <tr>
            <td width="30%" colspan="2">&nbsp;</td>
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