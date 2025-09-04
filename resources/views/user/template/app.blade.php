<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="styles.0d3c7203ee65bc47357c.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @include('user.layouts.css')
    @include('user.layouts.css-index')
</head>

<body hold-transition="" class=" none-sidebar sidebar-open" cz-shortcut-listen="true"><audio class="audio-for-speech"
        src=""></audio>
    <div class="translate-tooltip-mtz translator-hidden">
        <div class="header">
            <div class="header-controls">
                Translator
            </div>
            <div class="header-controls">
                <span class="support"></span>
            </div>
            <div class="header-controls">
                <span class="settings"></span>
            </div>
        </div>
        <div class="translated-text">
            <div class="words"></div>
            <div class="sentences"></div>
        </div>
    </div><span class="translate-button-mtz translator-hidden"></span>
    <!-- <div id="root" class="flex"> -->
    <app-root _nghost-c0="" ng-version="6.1.6">
        <ngx-loading-bar _ngcontent-c0="" _nghost-c1="" class="loading-bar-fixed">
            <!---->
        </ngx-loading-bar>
        <ngx-loading _ngcontent-c0="" _nghost-c2="">
            <!---->
            <!---->
        </ngx-loading>
        <router-outlet _ngcontent-c0=""></router-outlet>
        <app-portal _nghost-c3="">
            @include('user.template.header')
            @yield('content')
            @include('user.template.footer')
        </app-portal>
    </app-root>


    {{-- Modal đăng nhập --}}
    @include('user.template.dang-nhap')
    <!-- </div> -->
    @include('user.template.connect')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('js/toast.js') }}"></script>
</body>

</html>
