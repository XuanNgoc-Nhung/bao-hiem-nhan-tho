@extends('user.layouts.app')

@section('content')
<div class="container-fluid py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Thông tin tài khoản</h5>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Thông tin tài khoản</h5>
                    {{ $user }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
