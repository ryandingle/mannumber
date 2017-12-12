@extends('layouts.app')

@section('content')
<div class="content-wrapper account-page" style="padding-top: 45px">
    <section class="content-header">
      <h1>
        My Account
        <small>Account Management</small>
      </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <div class="col-md-4 col-md-offset-4">
                            <div class="image-content">
                                <img style="{{ (!$data->image) ? 'display: none' : '' }}" class="profile-user-img img-responsive img-circle image-section" src="{{ $data->image }}" alt="User profile picture">
                                <p style="{{ ($data->image) ? 'display: none' : '' }}" class="text-muted text-center text-section">No Profile Picture</p>
                            </div>

                            <h3 class="profile-username text-center name">{{ $data->name }}</h3>
                            <p class="text-muted text-center">{{ session('role')[0]->title }}</p>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>First Name</b> <a class="pull-right firstname">{{ $data->firstname }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Middle Name</b> <a class="pull-right middlename">{{ $data->middlename }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Last Name</b> <a class="pull-right lastname">{{ $data->lastname }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Username</b> <a class="pull-right username">{{ $data->username }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Email</b> <a class="pull-right email">{{ $data->email }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Employee Number</b> <a class="pull-right employee_no">{{ $data->employee_no }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>SSS Number</b> <a class="pull-right sss_no">{{ $data->sss_no }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Status</b> <a class="pull-right status">{{ $data->status }}</a>
                                </li>
                                <li class="list-group-item text-center">
                                    <a class="btn btn-info view_modal" data-modal="account" data-id="{{ $data->id }}" data-module="account" data-method="{{ $data->id }}/edit">Edit Account&nbsp;&nbsp;<i class="fa fa-pencil"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('css')
@endpush

@push('scripts')
<script src="{{ asset('admin/plugins/notify/notify.min.js') }}"></script>
@endpush

@push('custom')
<script src="{{ asset('js/common.js') }}"></script>
<script src="{{ asset('js/module/account/account.js') }}"></script>
@endpush