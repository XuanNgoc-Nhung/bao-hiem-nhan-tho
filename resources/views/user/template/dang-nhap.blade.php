@if(!session('user'))
<div class="cdk-overlay-container" id="modal-login" style="display: none;">
    <div class="cdk-overlay-backdrop cdk-overlay-dark-backdrop cdk-overlay-backdrop-showing"></div>
    <div class="cdk-global-overlay-wrapper" dir="ltr" style="justify-content: center; align-items: center;">
        <div id="cdk-overlay-1" class="cdk-overlay-pane custom-dialog-container login-dialog"
            style="max-width: 80vw; pointer-events: auto; width: 425px; position: static;">
            <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor"></div>
            <mat-dialog-container aria-modal="true"
                class="mat-dialog-container ng-tns-c14-4 ng-trigger ng-trigger-slideDialog ng-star-inserted"
                tabindex="-1" id="mat-dialog-1" role="dialog" style="transform: none; opacity: 1;">
                <!---->
                <app-dialog-login _nghost-c15="" class="ng-star-inserted">
                    <form _ngcontent-c15="" novalidate="" class="ng-pristine ng-invalid ng-touched">
                        <div _ngcontent-c15="" class="mat-dialog-content" mat-dialog-content="">
                            <div _ngcontent-c15="" class="mat-elevation-z24">
                                <div _ngcontent-c15="" class="modal-header">
                                    <div _ngcontent-c15="" class="col-sm-3 col-xs-3 none-padding title-login">
                                        <div _ngcontent-c15="" class="checkbox">
                                            <p _ngcontent-c15="">ĐĂNG NHẬP</p>
                                        </div>
                                    </div>
                                </div>
                                <div _ngcontent-c15="" class="modal-body">

                                    <mat-form-field _ngcontent-c15=""
                                        class="mat-form-field ng-tns-c17-6 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-legacy mat-form-field-can-float mat-form-field-hide-placeholder ng-untouched ng-pristine ng-invalid"
                                        floatplaceholder="never">
                                        <div class="mat-form-field-wrapper">
                                            <div class="mat-form-field-flex">
                                                <!---->
                                                <!---->
                                                <div class="mat-form-field-prefix ng-tns-c17-6 ng-star-inserted"
                                                    style=""><span _ngcontent-c15="" matprefix="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                            fill="currentColor" class="bi bi-person-bounding-box"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5" />
                                                            <path
                                                                d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                                        </svg>&nbsp;</span>
                                                </div>
                                                <div class="mat-form-field-infix"><input _ngcontent-c15=""
                                                        class="mat-input-element mat-form-field-autofill-control cdk-text-field-autofill-monitored ng-untouched ng-pristine ng-invalid"
                                                        formcontrolname="text" matinput="" placeholder="Nhập số cccd"
                                                        type="text" id="mat-input-4" aria-invalid="false"
                                                        aria-required="false"><span
                                                        class="mat-form-field-label-wrapper">
                                                        <!----><label
                                                            class="mat-form-field-label ng-tns-c17-6 mat-empty mat-form-field-empty ng-star-inserted"
                                                            id="mat-form-field-label-9" for="mat-input-4"
                                                            aria-owns="mat-input-4" style="">
                                                            <!---->
                                                            <!---->Nhập số cccd
                                                            <!---->
                                                            <!----></label></span></div>
                                                <!---->
                                                {{-- <div class="mat-form-field-suffix ng-tns-c17-6 ng-star-inserted"
                                                    style="">
                                                    <button _ngcontent-c15="" aria-label="Show password"
                                                        mat-button="" mat-icon-button="" matsuffix=""
                                                        class="mat-button mat-icon-button"><span
                                                            class="mat-button-wrapper">
                                                            <!---->
                                                            <mat-icon _ngcontent-c15=""
                                                                class="mat-icon material-icons ng-star-inserted"
                                                                role="img" aria-hidden="true">visibility</mat-icon>
                                                            <!---->
                                                        </span>
                                                        <div class="mat-button-ripple mat-ripple mat-button-ripple-round"
                                                            matripple=""></div>
                                                        <div class="mat-button-focus-overlay"></div>
                                                    </button>
                                                </div> --}}
                                            </div>
                                            <!---->
                                            <div class="mat-form-field-underline ng-tns-c17-6 ng-star-inserted"
                                                style=""><span class="mat-form-field-ripple"></span></div>
                                            <div class="mat-form-field-subscript-wrapper">
                                                <!---->
                                                <!---->
                                                <div class="mat-form-field-hint-wrapper ng-tns-c17-6 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                    style="opacity: 1; transform: translateY(0%);">
                                                    <!---->
                                                    <div class="mat-form-field-hint-spacer"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </mat-form-field>
                                    <mat-form-field _ngcontent-c15=""
                                        class="mat-form-field ng-tns-c17-5 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-legacy mat-form-field-can-float mat-form-field-hide-placeholder ng-untouched ng-pristine ng-invalid"
                                        floatplaceholder="never">
                                        <div class="mat-form-field-wrapper">
                                            <div class="mat-form-field-flex">
                                                <!---->
                                                <!---->
                                                <div class="mat-form-field-prefix ng-tns-c17-5 ng-star-inserted"
                                                    style=""><span _ngcontent-c15="" matprefix="">

                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                            fill="currentColor" class="bi bi-file-earmark-break"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M14 4.5V9h-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v7H2V2a2 2 0 0 1 2-2h5.5zM13 12h1v2a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-2h1v2a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1zM.5 10a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1z" />
                                                        </svg>
                                                        &nbsp;</span>
                                                </div>
                                                <div class="mat-form-field-infix"><input _ngcontent-c15=""
                                                        class="mat-input-element mat-form-field-autofill-control cdk-text-field-autofill-monitored ng-untouched ng-pristine ng-invalid"
                                                        formcontrolname="username" matinput="" type="text"
                                                        id="mat-input-3" placeholder="Mã số BHXH" aria-invalid="false"
                                                        aria-required="false"><span
                                                        class="mat-form-field-label-wrapper">
                                                        <!----><label
                                                            class="mat-form-field-label ng-tns-c17-5 mat-empty mat-form-field-empty ng-star-inserted"
                                                            id="mat-form-field-label-7" for="mat-input-3"
                                                            aria-owns="mat-input-3" style="">
                                                            <!---->
                                                            <!---->Mã số BHXH
                                                            <!---->
                                                            <!----></label></span></div>
                                                <!---->
                                            </div>
                                            <!---->
                                            <div class="mat-form-field-underline ng-tns-c17-5 ng-star-inserted"
                                                style=""><span class="mat-form-field-ripple"></span></div>
                                            <div class="mat-form-field-subscript-wrapper">
                                                <!---->
                                                <!---->
                                                <div class="mat-form-field-hint-wrapper ng-tns-c17-5 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                    style="opacity: 1; transform: translateY(0%);">
                                                    <!---->
                                                    <div class="mat-form-field-hint-spacer"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </mat-form-field>
                                    <div _ngcontent-c15="" class="form-group captcha">
                                        <div _ngcontent-c15="" class="captcha-img"><img _ngcontent-c15=""
                                                id="captcha-img" alt="captcha" src="">
                                        </div>
                                        <div _ngcontent-c15="" class="refresh"><a _ngcontent-c15=""
                                                href="javascript:void(0)"><img _ngcontent-c15="" id="refresh-captcha"
                                                    alt="reset" height="auto"
                                                    src="../../../assets/images/reset_login.svg" width="20px"></a></div>
                                    </div>
                                    <mat-form-field _ngcontent-c15=""
                                        class="mat-form-field ng-tns-c17-7 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-legacy mat-form-field-can-float mat-form-field-hide-placeholder ng-untouched ng-pristine ng-invalid"
                                        floatplaceholder="never">
                                        <div class="mat-form-field-wrapper">
                                            <div class="mat-form-field-flex">
                                                <!---->
                                                <!---->
                                                <div class="mat-form-field-prefix ng-tns-c17-7 ng-star-inserted"
                                                    style=""><span _ngcontent-c15="" matprefix=""><img _ngcontent-c15=""
                                                            alt="captcha" class="icon"
                                                            src="../../../assets/images/nhapma.svg"> &nbsp;</span>
                                                </div>
                                                <div class="mat-form-field-infix"><input _ngcontent-c15=""
                                                        class="mat-input-element mat-form-field-autofill-control cdk-text-field-autofill-monitored ng-untouched ng-pristine ng-invalid"
                                                        formcontrolname="textCaptcha" matinput=""
                                                        placeholder="Nhập mã kiểm tra" id="mat-input-5"
                                                        aria-invalid="false" aria-required="false"><span
                                                        class="mat-form-field-label-wrapper">
                                                        <!----><label
                                                            class="mat-form-field-label ng-tns-c17-7 mat-empty mat-form-field-empty ng-star-inserted"
                                                            id="mat-form-field-label-11" for="mat-input-5"
                                                            aria-owns="mat-input-5" style="">
                                                            <!---->
                                                            <!---->Nhập mã kiểm tra
                                                            <!---->
                                                            <!----></label></span></div>
                                                <!---->
                                            </div>
                                            <!---->
                                            <div class="mat-form-field-underline ng-tns-c17-7 ng-star-inserted"
                                                style=""><span class="mat-form-field-ripple"></span></div>
                                            <div class="mat-form-field-subscript-wrapper">
                                                <!---->
                                                <!---->
                                                <div class="mat-form-field-hint-wrapper ng-tns-c17-7 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                    style="opacity: 1; transform: translateY(0%);">
                                                    <!---->
                                                    <div class="mat-form-field-hint-spacer"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </mat-form-field>
                                    <div _ngcontent-c15="" class="forgotpassword text-right"><span
                                            _ngcontent-c15="">Quên mật khẩu</span></div>
                                </div>
                            </div>
                            <div _ngcontent-c15="" class="modal-footer">
                                <a href="{{ route('chon-dang-ky') }}"
                                    style="text-decoration: none; width: 100%; display: contents;">
                                    <button _ngcontent-c15="" class="register mat-raised-button" mat-raised-button=""
                                        type="button"><span class="mat-button-wrapper">ĐĂNG KÝ</span>
                                        <div class="mat-button-ripple mat-ripple" matripple=""></div>
                                        <div class="mat-button-focus-overlay"></div>
                                    </button>
                                </a>
                                <button _ngcontent-c15="" id="dang-nhap" class="login mat-raised-button mat-primary"
                                    color="primary" mat-raised-button="" type="button"><span
                                        class="mat-button-wrapper">ĐĂNG NHẬP</span>
                                    <div class="mat-button-ripple mat-ripple" matripple=""></div>
                                    <div class="mat-button-focus-overlay"></div>
                                </button></div>
                            <div _ngcontent-c15="" class="modal-footer"><button _ngcontent-c15=""
                                    class="login login-dvcqg mat-raised-button mat-primary" color="primary"
                                    mat-raised-button="" type="button"><span class="mat-button-wrapper"><img
                                            _ngcontent-c15="" class="logo-dvcqg"
                                            src="../../../assets/images/quoc_huy.svg">ĐĂNG NHẬP QUA DỊCH VỤ CÔNG
                                        QUỐC GIA</span>
                                    <div class="mat-button-ripple mat-ripple" matripple=""></div>
                                    <div class="mat-button-focus-overlay"></div>
                                </button></div>
                            <div _ngcontent-c15="" class="modal-footer"><button _ngcontent-c15=""
                                    class="login login-vneid mat-raised-button mat-warn" color="warn"
                                    mat-raised-button="" type="button"><span class="mat-button-wrapper"><img
                                            _ngcontent-c15="" class="logo-vneid"
                                            src="../../../assets/images/logo-vneid.svg"><span _ngcontent-c15="">Đăng
                                            nhập bằng tài khoản<br _ngcontent-c15="">Định danh điện tử</span></span>
                                    <div class="mat-button-ripple mat-ripple" matripple=""></div>
                                    <div class="mat-button-focus-overlay"></div>
                                </button></div>
                        </div>
                    </form>
                </app-dialog-login>
            </mat-dialog-container>
            <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor"></div>
        </div>
    </div>
</div>
@else
@endif

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    console.log('dang nhap');
    // Mảng chứa các captcha
    const captchas = [{
            img: '{{ asset("images/captcha/3CMT.png") }}',
            value: '3CMT'
        },
        {
            img: '{{ asset("images/captcha/8TNK.png") }}',
            value: '8TNK'
        },
        {
            img: '{{ asset("images/captcha/LER3.png") }}',
            value: 'LER3'
        },
        {
            img: '{{ asset("images/captcha/NKX6.png") }}',
            value: 'NKX6'
        },
        {
            img: '{{ asset("images/captcha/TP7H.png") }}',
            value: 'TP7H'
        }, {
            img: '{{ asset("images/captcha/RCH7.png") }}',
            value: 'RCH7'
        }
    ];

    // Hàm hiển thị toast thông báo
    function showToast(icon, title) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: icon,
            title: title
        })
    }

    // Hàm lấy ngẫu nhiên một captcha
    function getRandomCaptcha() {
        const randomIndex = Math.floor(Math.random() * captchas.length);
        return captchas[randomIndex];
    }

    // Hàm hiển thị captcha
    function displayCaptcha() {
        console.log('displayCaptcha');
        const captchaImg = document.querySelector('#captcha-img');
        if (!captchaImg) {
            return; // Không có phần tử captcha trên trang hiện tại
        }
        const captcha = getRandomCaptcha();
        captchaImg.src = captcha.img;
        captchaImg.setAttribute('data-value', captcha.value);

        // In ra giá trị captcha mới
        console.log('Captcha mới:', captcha.value);
    }

    // Hiển thị captcha khi trang được tải (chỉ khi có phần tử captcha)
    document.addEventListener('DOMContentLoaded', function () {
        if (document.querySelector('#captcha-img')) {
            displayCaptcha();
        }

        // Thêm sự kiện click cho nút đăng nhập
        const btnDangNhap = document.getElementById('dang-nhap');
        if (btnDangNhap) {
            btnDangNhap.addEventListener('click', function () {
                const maSoBHXH = document.getElementById('mat-input-3').value;
                const soCCCD = document.getElementById('mat-input-4').value;
                const maCaptcha = document.getElementById('mat-input-5').value;
                const captchaValue = document.querySelector('.captcha-img img').getAttribute(
                    'data-value');


                // Kiểm tra dữ liệu
                

                if (!soCCCD) {
                    showToast('error', 'Vui lòng nhập số CCCD');
                    return;
                }
                if (!maSoBHXH) {
                    showToast('error', 'Vui lòng nhập mã số BHXH');
                    return;
                }

                if (!maCaptcha) {
                    showToast('error', 'Vui lòng nhập mã captcha');
                    return;
                }

                if (maCaptcha !== captchaValue) {
                    showToast('error', 'Mã captcha không chính xác');
                    return;
                }

                // Nếu tất cả đều hợp lệ, gửi dữ liệu qua backend
                const formData = new FormData();
                formData.append('ma_so_bhxh', maSoBHXH);
                formData.append('so_cccd', soCCCD);

                axios.post('/check-login', formData)
                    .then(response => {
                        if (response.data.success) {
                            // window.location.href = response.data.redirect_url;
                            showToast('success', response.data.message || 'Đăng nhập thành công');
                            setTimeout(() => {
                                window.location.href = response.data.redirect_url;
                            }, 3000);
                        } else {
                            showToast('error', response.data.message || 'Đăng nhập thất bại');
                        }
                    })
                    .catch(error => {
                        console.error('Lỗi:', error);
                        showToast('error', 'Có lỗi xảy ra, vui lòng thử lại');
                    });

                console.log('Mã số BHXH:', maSoBHXH);
                console.log('Số CCCD:', soCCCD);
            });
        } else {
            console.error('Không tìm thấy nút đăng nhập');
        }


        // Gọi hàm xử lý label sau khi DOM đã tải xong
        handleLabel('mat-input-3', 'Mã số BHXH');
        handleLabel('mat-input-4', 'Số cccd');
        handleLabel('mat-input-5', 'Nhập mã kiểm tra');
    });

    // Thêm sự kiện click cho nút hiển thị modal đăng nhập
    const btnShowLogin = document.getElementById('btn-show-login');
    if (btnShowLogin) {
        btnShowLogin.addEventListener('click', function (e) {
            e.preventDefault(); // Ngăn chặn sự kiện mặc định
            const modalLogin = document.getElementById('modal-login');
            if (modalLogin) {
                modalLogin.style.display = 'block';
            }
        });
    }

    // Thêm sự kiện click cho backdrop để đóng modal
    const backdrop = document.querySelector('.cdk-overlay-backdrop');
    if (backdrop) {
        backdrop.addEventListener('click', function () {
            const modalLogin = document.getElementById('modal-login');
            if (modalLogin) {
                modalLogin.style.display = 'none';
            }
        });
    }

    // Thêm nút refresh captcha (nếu tồn tại)
    const refreshAnchor = document.querySelector('.refresh a');
    if (refreshAnchor) {
        refreshAnchor.addEventListener('click', function () {
            displayCaptcha();
        });
    }

    // Thêm sự kiện click cho nút refresh captcha
    const refreshCaptchaBtn = document.getElementById('refresh-captcha');
    if (refreshCaptchaBtn) {
        refreshCaptchaBtn.addEventListener('click', function (e) {
            e.preventDefault(); // Ngăn chặn sự kiện mặc định
            displayCaptcha();
        });
    }

    // Hàm xử lý label cho input
    function handleLabel(inputId, labelText) {
        console.log('handleLabel');
        const input = document.getElementById(inputId);
        const label = document.querySelector(`label[for="${inputId}"]`);

        if (input && label) {
            // Xử lý khi input thay đổi
            input.addEventListener('input', function () {
                if (this.value.trim() !== '') {
                    label.style.display = 'none';
                } else {
                    label.style.display = 'block';
                }
            });

            // Xử lý khi input mất focus
            input.addEventListener('blur', function () {
                if (this.value.trim() === '') {
                    label.style.display = 'block';
                }
            });

            // Xử lý khi input được focus
            input.addEventListener('focus', function () {
                if (this.value.trim() === '') {
                    label.style.display = 'block';
                } else {
                    label.style.display = 'none';
                }
            });

            // Kiểm tra giá trị ban đầu
            if (input.value.trim() !== '') {
                label.style.display = 'none';
            }
        }
    }

    // Thêm CSS tùy chỉnh cho giao diện
    const customCSS = `
        <style>
            /* Tùy chỉnh giao diện cho modal header */
            .modal-header {
                display: flex;
                align-items: center;
                padding: 15px 20px;
                border-bottom: 1px solid #e0e0e0;
            }

            .modal-header .title-login {
                flex: 1;
                text-align: center;
            }

            .modal-header .checkbox p {
                margin: 0;
                font-weight: bold;
                color: #333;
                font-size: 14px;
            }

            /* Responsive cho mobile */
            @media (max-width: 768px) {
                .modal-header .checkbox p {
                    font-size: 16px;
                }

                /* Tăng kích thước modal trên mobile */
                .login-dialog {
                    width: 95vw !important;
                    max-width: 400px !important;
                }
            }

            /* Tùy chỉnh cho tablet */
            @media (min-width: 769px) and (max-width: 1024px) {
                .modal-header .checkbox p {
                    font-size: 13px;
                }
            }
        </style>
    `;

    // Thêm CSS vào head
    document.head.insertAdjacentHTML('beforeend', customCSS);

</script>
