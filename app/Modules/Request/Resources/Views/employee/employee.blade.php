@extends('layouts.app')

@section('content')
<div class="content-wrapper" style="padding-top: 45px">
    <section class="content-header">
      <h1>
        Employees on Request Batch #{{$data->id}}
        <a href="{{ route('request') }}" class="btn btn-info pull-right" ><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Back to request</a>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">
                            Employee List
                        </h3>
                        <!-- <button class="btn btn-success pull-right view_modal" data-id="{{$data->id}}" data-size="lg" data-method="employee/{{$data->id}}/create" data-module="request" data-modal="employee"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add New Employee</button> -->
                    </div>
                    <div class="box-body">
                        {!! $dataTable->table()  !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/plugins/notify/notify.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
@endpush

@push('custom')
<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
{!! $dataTable->scripts() !!}
<script src="{{ asset('js/common.js') }}"></script>
@endpush