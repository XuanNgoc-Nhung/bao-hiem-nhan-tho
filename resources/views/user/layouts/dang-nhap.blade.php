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
                                    <br>
                                    <div class="text-center" style="display: flex; justify-content: center; align-items: center; width: 100%;">
                                        <div _ngcontent-c15=""
                                            class="col-sm-3 col-xs-3 text-right none-padding ca-nhan"
                                            style="max-width: 30%;">
                                            <div _ngcontent-c15="" class="radio-group">
                                                <label class="radio-option">
                                                    <input type="radio" name="userType" value="caNhan"
                                                        id="radio-ca-nhan" checked>
                                                    <span class="radio-custom"></span>
                                                    <span class="radio-label">Cá nhân</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div _ngcontent-c15=""
                                            class="col-sm-3 col-xs-3 text-right none-padding to-chuc"
                                            style="max-width: 30%;">
                                            <div _ngcontent-c15="" class="radio-group">
                                                <label class="radio-option">
                                                    <input type="radio" name="userType" value="toChuc"
                                                        id="radio-to-chuc">
                                                    <span class="radio-custom"></span>
                                                    <span class="radio-label">Tổ chức</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div _ngcontent-c15=""
                                            class="col-sm-3 col-xs-3 text-right none-padding nguoi-giam-ho " style="max-width: 39%;">
                                            <div _ngcontent-c15="" class="radio-group">
                                                <label class="radio-option">
                                                    <input type="radio" name="userType" value="choCon"
                                                        id="radio-nguoi-giam-ho">
                                                    <span class="radio-custom"></span>
                                                    <span class="radio-label">Người giám hộ</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div _ngcontent-c15="" class="modal-body">
                                    <mat-form-field _ngcontent-c15=""
                                        class="mat-form-field ng-tns-c17-5 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-legacy mat-form-field-can-float mat-form-field-hide-placeholder ng-untouched ng-pristine ng-invalid"
                                        floatplaceholder="never">
                                        <div class="mat-form-field-wrapper">
                                            <div class="mat-form-field-flex">
                                                <!---->
                                                <!---->
                                                <div class="mat-form-field-prefix ng-tns-c17-5 ng-star-inserted"
                                                    style=""><span _ngcontent-c15="" matprefix=""><img _ngcontent-c15=""
                                                            alt="username" class="icon"
                                                            src="../../../assets/images/user_name.svg">
                                                        &nbsp;</span></div>
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
                                    <mat-form-field _ngcontent-c15=""
                                        class="mat-form-field ng-tns-c17-6 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-legacy mat-form-field-can-float mat-form-field-hide-placeholder ng-untouched ng-pristine ng-invalid"
                                        floatplaceholder="never">
                                        <div class="mat-form-field-wrapper">
                                            <div class="mat-form-field-flex">
                                                <!---->
                                                <!---->
                                                <div class="mat-form-field-prefix ng-tns-c17-6 ng-star-inserted"
                                                    style=""><span _ngcontent-c15="" matprefix=""><img _ngcontent-c15=""
                                                            alt="password" class="icon"
                                                            src="../../../assets/images/pass.svg"> &nbsp;</span>
                                                </div>
                                                <div class="mat-form-field-infix"><input _ngcontent-c15=""
                                                        class="mat-input-element mat-form-field-autofill-control cdk-text-field-autofill-monitored ng-untouched ng-pristine ng-invalid"
                                                        formcontrolname="password" matinput="" placeholder="Mật khẩu"
                                                        type="password" id="mat-input-4" aria-invalid="false"
                                                        aria-required="false"><span
                                                        class="mat-form-field-label-wrapper">
                                                        <!----><label
                                                            class="mat-form-field-label ng-tns-c17-6 mat-empty mat-form-field-empty ng-star-inserted"
                                                            id="mat-form-field-label-9" for="mat-input-4"
                                                            aria-owns="mat-input-4" style="">
                                                            <!---->
                                                            <!---->Số cccd
                                                            <!---->
                                                            <!----></label></span></div>
                                                <!---->
                                                <div class="mat-form-field-suffix ng-tns-c17-6 ng-star-inserted"
                                                    style=""><button _ngcontent-c15="" aria-label="Show password"
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
                                                    </button></div>
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
<div class="text-center" style="padding: 20px;">
    <h3>Bạn đã đăng nhập</h3>
    <p>Chuyển hướng về trang chủ...</p>

</div>
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
        const captcha = getRandomCaptcha();
        const captchaImg = document.querySelector('#captcha-img');
        captchaImg.src = captcha.img;
        captchaImg.setAttribute('data-value', captcha.value);

        // In ra giá trị captcha mới
        console.log('Captcha mới:', captcha.value);
    }

    // Hiển thị captcha khi trang được tải
    document.addEventListener('DOMContentLoaded', function () {
        displayCaptcha();

        // Thêm sự kiện click cho nút đăng nhập
        const btnDangNhap = document.getElementById('dang-nhap');
        if (btnDangNhap) {
            btnDangNhap.addEventListener('click', function () {
                const maSoBHXH = document.getElementById('mat-input-3').value;
                const soCCCD = document.getElementById('mat-input-4').value;
                const maCaptcha = document.getElementById('mat-input-5').value;
                const captchaValue = document.querySelector('.captcha-img img').getAttribute(
                    'data-value');

                // Lấy loại người đăng nhập được chọn
                let userType = 'ca_nhan'; // Mặc định là cá nhân
                if (document.getElementById('radio-to-chuc').checked) {
                    userType = 'to_chuc';
                } else if (document.getElementById('radio-nguoi-giam-ho').checked) {
                    userType = 'nguoi_giam_ho';
                }

                // Kiểm tra dữ liệu
                if (!maSoBHXH) {
                    showToast('error', 'Vui lòng nhập mã số BHXH');
                    return;
                }

                if (!soCCCD) {
                    showToast('error', 'Vui lòng nhập số CCCD');
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
                formData.append('user_type', userType);

                axios.post('/check-login', formData)
                    .then(response => {
                        if (response.data.success) {
                            window.location.href = response.data.redirect_url;
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
                console.log('Loại người đăng nhập:', userType);
            });
        } else {
            console.error('Không tìm thấy nút đăng nhập');
        }

        // Thêm sự kiện cho các radio button
        const radioButtons = [
            document.getElementById('radio-ca-nhan'), // Cá nhân
            document.getElementById('radio-to-chuc'), // Tổ chức
            document.getElementById('radio-nguoi-giam-ho') // Người giám hộ
        ];

        // Radio button tự động chỉ cho phép chọn một loại, không cần xử lý thêm
        radioButtons.forEach(radio => {
            if (radio) {
                radio.addEventListener('change', function () {
                    console.log('Selected user type:', this.value);
                });
            }
        });

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

    // Thêm nút refresh captcha
    document.querySelector('.refresh a').addEventListener('click', function () {
        displayCaptcha();
    });

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
            /* Tùy chỉnh giao diện cho 3 radio button loại người đăng nhập */
            .modal-header {
                display: flex;
                flex-wrap: wrap;
                align-items: center;
                padding: 15px 20px;
                border-bottom: 1px solid #e0e0e0;
                gap: 10px;
            }

            .modal-header .title-login {
                flex: 0 0 auto;
                min-width: 120px;
            }

            .modal-header .ca-nhan,
            .modal-header .to-chuc,
            .modal-header .nguoi-giam-ho {
                flex: 0 0 auto;
                min-width: 80px;
                text-align: center;
            }

            .modal-header .radio-group {
                margin: 0;
            }

            .modal-header .checkbox p {
                margin: 0;
                font-weight: bold;
                color: #333;
                font-size: 14px;
            }

            /* Tùy chỉnh radio button */
            .radio-option {
                display: flex;
                align-items: center;
                cursor: pointer;
                padding: 8px 12px;
                border-radius: 6px;
                transition: all 0.3s ease;
                margin: 0;
            }

            .radio-option:hover {
                background-color: #f0f8ff;
            }

            .radio-option input[type="radio"] {
                display: none;
            }

            .radio-custom {
                width: 16px;
                height: 16px;
                border: 2px solid #ccc;
                border-radius: 50%;
                margin-right: 8px;
                position: relative;
                transition: all 0.3s ease;
            }

            .radio-option input[type="radio"]:checked + .radio-custom {
                border-color: #0099FF;
                background-color: #0099FF;
            }

            .radio-option input[type="radio"]:checked + .radio-custom::after {
                content: '';
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 6px;
                height: 6px;
                background-color: white;
                border-radius: 50%;
            }

            .radio-label {
                font-size: 12px;
                font-weight: 500;
                color: #333;
                white-space: nowrap;
            }

            .radio-option input[type="radio"]:checked ~ .radio-label {
                color: #0099FF;
                font-weight: 600;
            }

            /* Responsive cho mobile */
            @media (max-width: 768px) {
                .modal-header {
                    flex-direction: column;
                    gap: 10px;
                }

                .modal-header .title-login,
                .modal-header .ca-nhan,
                .modal-header .to-chuc,
                .modal-header .nguoi-giam-ho {
                    width: 100%;
                    text-align: center;
                }

                .modal-header .checkbox p {
                    font-size: 16px;
                }

                .radio-label {
                    font-size: 14px;
                }

                .radio-option {
                    padding: 10px 15px;
                    justify-content: center;
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

                .radio-label {
                    font-size: 11px;
                }
            }

            /* Hiệu ứng focus cho accessibility */
            .radio-option:focus-within {
                outline: 2px solid #0099FF;
                outline-offset: 2px;
            }

            /* Animation cho radio button */
            .radio-custom {
                transition: all 0.2s ease;
            }

            .radio-option input[type="radio"]:checked + .radio-custom {
                transform: scale(1.1);
            }
        </style>
    `;

    // Thêm CSS vào head
    document.head.insertAdjacentHTML('beforeend', customCSS);

</script>
