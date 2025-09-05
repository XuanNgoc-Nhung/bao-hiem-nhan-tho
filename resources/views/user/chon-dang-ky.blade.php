@extends('user.layouts.app')

@section('content')
<div class="container-fluid py-5">
    <div class="row">
        <div class="col-12">
            <div class="text-center mb-5">
                <h2 class="display-3 fw-bold text-primary">Đối Tác Tin Cậy</h2>
                <p class="lead text-muted fs-5">Chúng tôi tự hào được hợp tác với những đối tác uy tín hàng đầu</p>
            </div>
        </div>
    </div>
    <div class="row">
        @if($list_partner && $list_partner->count() > 0)
        @foreach($list_partner as $partner)
        <div class="col-lg-2 col-md-3 col-sm-6 col-12 mb-4">
            <div class="logo-wrapper">
                <div class="logo-container">
                    <img src="{{ $partner->logo }}" alt="{{ $partner->ten_cong_ty }}" class="logo-image">
                </div>
                <a href="{{ route('user.check-cccd', ['cty' => $partner->id]) }}">
                    <div class="logo-overlay">
                        <div class="logo-info">
                            <h5>{{ $partner->ten }}</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
        @else
        <div class="col-12">
            <div class="alert alert-info">
                <p>Chưa có đối tác tin cậy nào</p>
            </div>
        </div>
        @endif
    </div>
</div>

<!-- CSS cho logo grid với hover overlay -->
<style>
    .logo-wrapper {
        background: #ffffff;
        border-radius: 12px;
        padding: 0;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        height: 200px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #e9ecef;
        text-align: center;
        position: relative;
        overflow: hidden;
        cursor: pointer;
    }

    .logo-wrapper:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        border-color: #007bff;
    }

    .logo-container {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 30px;
    }

    .logo-image {
        max-width: 100%;
        max-height: 100%;
        width: auto;
        height: auto;
        object-fit: contain;
        transition: all 0.3s ease;
    }

    /* Logo Overlay */
    .logo-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(0, 123, 255, 0.95), rgba(0, 86, 179, 0.95));
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: all 0.3s ease;
        border-radius: 12px;
        padding: 20px;
    }

    .logo-wrapper:hover .logo-overlay {
        opacity: 1;
    }

    .logo-wrapper:hover .logo-image {
        transform: scale(1.05);
    }

    .logo-info {
        text-align: center;
        width: 100%;
    }

    .logo-info h5 {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 8px;
        color: white;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
    }

    .logo-info p {
        font-size: 14px;
        margin-bottom: 10px;
        color: rgba(255, 255, 255, 0.9);
        line-height: 1.3;
    }

    .logo-info .badge {
        font-size: 12px;
        padding: 6px 12px;
        border-radius: 12px;
    }

    /* Responsive design cho grid */
    /* Màn hình lớn (1200px+) - 6 logo trên 1 hàng */
    @media (min-width: 1200px) {
        .logo-wrapper {
            height: 220px;
        }

        .logo-container {
            padding: 35px;
        }

        .logo-info h5 {
            font-size: 20px;
        }

        .logo-info p {
            font-size: 16px;
        }

        .logo-info .badge {
            font-size: 14px;
            padding: 8px 14px;
        }
    }

    /* Màn hình trung bình (992px - 1199px) - 4 logo trên 1 hàng */
    @media (max-width: 1199px) and (min-width: 992px) {
        .logo-wrapper {
            height: 210px;
        }

        .logo-container {
            padding: 32px;
        }

        .logo-info h5 {
            font-size: 19px;
        }

        .logo-info p {
            font-size: 15px;
        }

        .logo-info .badge {
            font-size: 13px;
            padding: 7px 13px;
        }
    }

    /* Màn hình nhỏ (768px - 991px) - 4 logo trên 1 hàng */
    @media (max-width: 991px) and (min-width: 768px) {
        .logo-wrapper {
            height: 200px;
        }

        .logo-container {
            padding: 30px;
        }

        .logo-info h5 {
            font-size: 18px;
        }

        .logo-info p {
            font-size: 14px;
        }

        .logo-info .badge {
            font-size: 12px;
            padding: 6px 12px;
        }
    }

    /* Màn hình tablet (576px - 767px) - 3 logo trên 1 hàng */
    @media (max-width: 767px) and (min-width: 576px) {
        .logo-wrapper {
            height: 190px;
        }

        .logo-container {
            padding: 28px;
        }

        .logo-info h5 {
            font-size: 17px;
        }

        .logo-info p {
            font-size: 13px;
        }

        .logo-info .badge {
            font-size: 11px;
            padding: 5px 11px;
        }

        .logo-overlay {
            padding: 15px;
        }
    }

    /* Màn hình mobile nhỏ (< 576px) - 2 logo trên 1 hàng */
    @media (max-width: 575px) {
        .logo-wrapper {
            height: 180px;
        }

        .logo-container {
            padding: 25px;
        }

        .logo-info h5 {
            font-size: 16px;
        }

        .logo-info p {
            font-size: 12px;
        }

        .logo-info .badge {
            font-size: 10px;
            padding: 4px 10px;
        }

        .logo-overlay {
            padding: 12px;
        }
    }

    /* Đảm bảo grid items có cùng kích thước */
    .col-lg-2,
    .col-md-3,
    .col-sm-6,
    .col-12 {
        display: flex;
        flex-direction: column;
    }

    .logo-wrapper {
        flex: 1;
    }

</style>

@endsection
