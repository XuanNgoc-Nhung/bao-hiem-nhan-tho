@extends('user.layouts.app')

@section('content')
<div class="container-fluid py-5" style="min-height: 76vh;">
    <div class="row">
        <div class="col-12">
            <div class="text-center">
                <h1 style="font-size: 100px;">404</h1>
                <p style="font-size: 20px; color: #ff0000;">Trang không tồn tại</p>
                <p style="font-size: 16px; color: #2f00ff;">Bạn đang cố gắng truy cập vào một trang không tồn tại.</p>
                <a style="font-size: 16px; color: #ffffff;" href="{{ route('user.index') }}" class="btn btn-primary">Quay về trang chủ</a>
            </div>
        </div>
    </div>
</div>

@endsection
