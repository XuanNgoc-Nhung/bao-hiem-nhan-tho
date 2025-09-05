@extends('user.layouts.app')

@section('content')
<div class="container-fluid py-5" style="min-height: 76vh;">
    <div class="row">
        <div class="col-12">
            <div class="text-center">
                <h1 style="font-size: 100px;">404</h1>
                <p style="font-size: 20px; color: #ff0000;">Trang không tồn tại</p>
                <p style="font-size: 16px; color: #2f00ff;">Bạn đang cố gắng truy cập vào một trang không tồn tại.</p>
                <div class="mt-5">
                    <p style="font-size: 18px; color: #ff6b35; font-weight: bold; margin-bottom: 20px;">
                        Tự động chuyển về trang chủ sau:
                    </p>
                    <div class="countdown-container" style="display: flex; justify-content: center; align-items: center; margin: 30px 0;">
                        <div class="countdown-circle" style="
                            width: 120px;
                            height: 120px;
                            border: 6px solid #ff6b35;
                            border-radius: 50%;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            background: linear-gradient(135deg, #fff5f0, #ffe8e0);
                            box-shadow: 0 8px 25px rgba(255, 107, 53, 0.3);
                            position: relative;
                            animation: pulse 2s infinite;
                        ">
                            <span id="countdown" style="
                                color: #ff0000;
                                font-size: 36px;
                                font-weight: bold;
                                text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
                            ">60</span>
                        </div>
                    </div>
                    <p style="font-size: 16px; color: #666; margin-top: 15px;">
                        giây
                    </p>
                </div>
                <a style="font-size: 16px; color: #ffffff;" href="{{ route('user.index') }}" class="btn btn-primary">Quay về trang chủ ngay</a>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes pulse {
    0% {
        transform: scale(1);
        box-shadow: 0 8px 25px rgba(255, 107, 53, 0.3);
    }
    50% {
        transform: scale(1.05);
        box-shadow: 0 12px 35px rgba(255, 107, 53, 0.5);
    }
    100% {
        transform: scale(1);
        box-shadow: 0 8px 25px rgba(255, 107, 53, 0.3);
    }
}

@keyframes countdownGlow {
    0% {
        text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
    }
    50% {
        text-shadow: 0 0 20px rgba(255, 0, 0, 0.8), 2px 2px 4px rgba(0,0,0,0.1);
    }
    100% {
        text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
    }
}

.countdown-circle:hover {
    transform: scale(1.1);
    transition: transform 0.3s ease;
}

.countdown-circle {
    transition: all 0.3s ease;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let countdown = 60;
    const countdownElement = document.getElementById('countdown');
    const homeUrl = '{{ route("user.index") }}';
    
    const timer = setInterval(function() {
        countdown--;
        countdownElement.textContent = countdown;
        
        // Thêm hiệu ứng khi còn 10 giây
        if (countdown <= 10) {
            countdownElement.style.animation = 'countdownGlow 1s infinite';
        }
        
        if (countdown <= 0) {
            clearInterval(timer);
            window.location.href = homeUrl;
        }
    }, 1000);
});
</script>

@endsection
