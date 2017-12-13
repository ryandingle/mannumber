<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title"><i class="fa fa-info"></i>&nbsp;&nbsp;Log Details</h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <table width="100%" class="table" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="10%">Logged By</td>
                    <td class="text-left"><b>{{ $created_by }}</b></td>
                </tr>
                <tr>
                    <td>Module</td>
                    <td class="text-left"><b>{{ $data->module }}</b></td>
                </tr>
                <tr>
                    <td>Table</td>
                    <td class="text-left"><b>{{ $data->table }}</b></td>
                </tr>
                <tr>
                    <td>Object Id</td>
                    <td class="text-left"><b>{{ $data->object_id }}</b></td>
                </tr>
                <tr>
                    <td>Method Perform</td>
                    <td class="text-left"><b>{{ $data->method }}</b></td>
                </tr>
                <tr>
                    <td>Data</td>
                    <td class="text-left">
                        <b>
                        <textarea class="form-control" rows="5" readonly="readonly">{{ $data->new_data }}</textarea>
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>Old Data</td>
                    <td class="text-left">
                        <b>
                        <textarea class="form-control" rows="5" readonly="readonly">{{ $data->old_data }}</textarea>
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>Ip Address</td>
                    <td class="text-left"><b>{{ $data->ip_address }}</b></td>
                </tr>
                <tr>
                    <td>User Agent</td>
                    <td class="text-left"><b>{{ $data->user_agent }}</b></td>
                </tr>
                <tr>
                    <td>Logged At</td>
                    <td class="text-left"><b>{{ $data->created_at }}</b></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>