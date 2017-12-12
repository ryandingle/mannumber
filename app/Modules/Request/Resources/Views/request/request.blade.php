@extends('layouts.app')

@section('content')
<div class="content-wrapper" style="padding-top: 45px">
    <section class="content-header">
        <h1>
            Request
            <small>Control panel</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">
                            Requests List
                        </h3>
                        @foreach(session('permissions') as $permission)
                            @if($permission->prefix == 'create')
                                <button class="btn btn-success pull-right view_modal" data-method="create" data-module="request" data-modal="request"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add New Request</button>
                            @endif
                        @endforeach
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
@endpush

@push('scripts')
<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/plugins/notify/notify.min.js') }}"></script>
@endpush

@push('custom')
<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
{!! $dataTable->scripts() !!}
<script src="{{ asset('js/common.js') }}"></script>
<script src="{{ asset('js/module/request/request.js') }}"></script>
@endpush