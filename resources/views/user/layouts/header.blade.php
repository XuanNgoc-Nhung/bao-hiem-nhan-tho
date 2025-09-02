<app-portal-header _ngcontent-c3="" class="bhxh-header header-fixed clearfix portal-home" _nghost-c4="">
    <div _ngcontent-c4="" id="header">
        <div _ngcontent-c4="" class="banner" style="height:auto">
            <div _ngcontent-c4="" class="pot-header container">
                <div _ngcontent-c4="" class="row">
                    <div _ngcontent-c4="" class="col-2 col-sm-2 col-md-6">
                        <div _ngcontent-c4="" class="left"><a _ngcontent-c4="" href="#/index"><img _ngcontent-c4=""
                                    alt="logo" src="../../../../assets/images/logo_text.svg"><img _ngcontent-c4=""
                                    alt="logo_white" src="../../../../assets/images/logo_white .svg"></a>
                        </div>
                    </div>
                    <div _ngcontent-c4="" class="col-10 col-sm-10 col-md-6">
                        <div _ngcontent-c4="" class="ke-khai-nav right" style="padding-top:10px; bottom: 15px !important">
                            <!---->
                            <!---->
                            <!---->
                            <!---->
                            <div _ngcontent-c4="" style="padding-top:0px" class="sub-nav">
                                @if(!Session::has('user'))
                                <a href="#" id="btn-show-login">
                                    <button _ngcontent-c4="" class="btn mat-button" mat-button=""><span
                                            class="mat-button-wrapper">
                                            Đăng nhập </span>
                                        <div class="mat-button-ripple mat-ripple" matripple=""></div>
                                        <div class="mat-button-focus-overlay"></div>
                                    </button>
                                </a>
                                <a href="{{ route('chon-dang-ky') }}">
                                    <button _ngcontent-c4="" class="btn mat-button" mat-button=""><span
                                            class="mat-button-wrapper"> Đăng ký </span>
                                        <div class="mat-button-ripple mat-ripple" matripple=""></div>
                                        <div class="mat-button-focus-overlay"></div>
                                    </button>
                                </a>
                                @else
                                <div class="dropdown">
                                    <div class="dropdown-toggle" id="profileDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;">
                                        <button _ngcontent-c4="" class="btn mat-button" mat-button="">
                                            <span class="mat-button-wrapper">
                                                <mat-icon _ngcontent-c4="" class="mat-icon material-icons" role="img"
                                                    aria-hidden="true">account_circle</mat-icon>
                                                    @if (Session::get('user')->loaiTaiKhoan == 'caNhan')
                                                        {{ Session::get('user')->hoTen }}
                                                    @elseif (Session::get('user')->loaiTaiKhoan == 'coQuan')
                                                        {{ Session::get('user')->tenCoQuan }}
                                                    @elseif (Session::get('user')->loaiTaiKhoan == 'choCon')
                                                        {{ Session::get('user')->hoTen }}
                                                    @else
                                                        {{ Session::get('user')->hoTen }}
                                                    @endif
                                            </span>
                                        </button>
                                    </div>
                                    <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                                        <li><a class="dropdown-item" href="{{ route('profile') }}">
                                                <i class="material-icons">person</i> Cá nhân
                                            </a></li>
                                        @if(Session::get('user')->role == 1)
                                        
                                        <li><a class="dropdown-item" href="{{ route('admin') }}">
                                                <i class="material-icons">person</i> Trang quản trị
                                            </a></li>
                                        @endif
                                        <li><a class="dropdown-item" href="{{ route('logout') }}">
                                                <i class="material-icons">exit_to_app</i> Đăng xuất
                                            </a></li>
                                    </ul>
                                </div>

                                <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        const dropdownToggle = document.getElementById('profileDropdown');
                                        const dropdownMenu = dropdownToggle.nextElementSibling;

                                        dropdownToggle.addEventListener('click', function (e) {
                                            e.preventDefault();
                                            dropdownMenu.classList.toggle('show');
                                        });

                                        // Close dropdown when clicking outside
                                        document.addEventListener('click', function (e) {
                                            if (!dropdownToggle.contains(e.target) && !dropdownMenu
                                                .contains(e.target)) {
                                                dropdownMenu.classList.remove('show');
                                            }
                                        });
                                    });

                                </script>

                                <style>
                                    .dropdown-menu {
                                        display: none;
                                        position: absolute;
                                        background-color: #fff;
                                        min-width: 160px;
                                        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
                                        z-index: 1000;
                                    }

                                    .dropdown-menu.show {
                                        display: block;
                                    }

                                    .dropdown-item {
                                        padding: 8px 16px;
                                        display: flex;
                                        align-items: center;
                                        gap: 8px;
                                        color: #333;
                                        text-decoration: none;
                                    }

                                    .dropdown-item:hover {
                                        background-color: #f8f9fa;
                                    }

                                </style>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!---->
    </div>
</app-portal-header>
