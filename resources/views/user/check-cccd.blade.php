<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kiểm tra CCCD</title>
    <style>
        :root {
            --bg-1: #0f2027;
            --bg-2: #203a43;
            --bg-3: #2c5364;
            --card-bg: rgba(255, 255, 255, 0.1);
            --card-border: rgba(255, 255, 255, 0.2);
            --text: #edf2f7;
            --muted: #cbd5e0;
            --accent: #38b2ac;
            --accent-hover: #2c7a7b;
            --error: #feb2b2;
        }

        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji";
            color: var(--text);
            background: linear-gradient(135deg, var(--bg-1), var(--bg-2), var(--bg-3));
            display: grid;
            place-items: center;
            padding: 24px;
        }

        .card {
            width: 100%;
            max-width: 520px;
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid var(--card-border);
            border-radius: 16px;
            padding: 28px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
        }

        .title {
            margin: 0 0 8px;
            font-size: 22px;
            font-weight: 700;
            letter-spacing: 0.2px;
        }

        .subtitle {
            margin: 0 0 22px;
            color: var(--muted);
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: var(--muted);
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px 14px;
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.25);
            outline: none;
            color: var(--text);
            background: rgba(255, 255, 255, 0.05);
            transition: border-color 0.2s ease, background 0.2s ease, box-shadow 0.2s ease;
        }

        input::placeholder {
            color: rgba(255, 255, 255, 0.55);
        }

        input:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(56, 178, 172, 0.25);
            background: rgba(255, 255, 255, 0.08);
        }

        .is-invalid {
            border-color: var(--error) !important;
            box-shadow: 0 0 0 3px rgba(254, 178, 178, 0.25) !important;
        }

        .actions {
            margin-top: 22px;
        }

        .btn {
            appearance: none;
            border: 0;
            color: white;
            background: linear-gradient(135deg, var(--accent), #63b3ed);
            padding: 12px 16px;
            border-radius: 10px;
            cursor: pointer;
            width: 100%;
            font-weight: 600;
            letter-spacing: 0.3px;
            transition: transform 0.05s ease, filter 0.2s ease, box-shadow 0.2s ease;
            box-shadow: 0 8px 18px rgba(56, 178, 172, 0.35);
        }

        .btn:hover {
            filter: brightness(1.05);
        }

        .btn:active {
            transform: translateY(1px);
        }

        .btn:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        .btn-loading {
            display: none;
        }

        .btn:disabled .btn-loading {
            display: inline-block;
        }

        .btn:disabled .btn-text {
            display: none;
        }

        .btn-outline {
            margin-top: 10px;
            display: inline-block;
            width: 100%;
            text-align: center;
            padding: 11px 16px;
            border-radius: 10px;
            color: var(--text);
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.35);
            text-decoration: none;
            transition: background 0.2s ease, border-color 0.2s ease;
        }

        .btn-outline:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.55);
        }

        .helper {
            margin-top: 14px;
            font-size: 12px;
            color: var(--muted);
            text-align: center;
        }

        .error {
            color: var(--error);
            font-size: 13px;
            margin-top: 8px;
        }

        .brand {
            position: fixed;
            bottom: 14px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.7);
        }

        /* Toast */
        .toast-container {
            position: fixed;
            top: 16px;
            right: 16px;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .toast {
            min-width: 260px;
            max-width: 360px;
            padding: 12px 14px;
            border-radius: 10px;
            color: #1a202c;
            background: #edf2f7;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
            display: grid;
            grid-template-columns: 20px 1fr 20px;
            grid-gap: 10px;
            align-items: start;
        }

        .toast.toast-error {
            background: #fed7d7;
            color: #742a2a;
        }

        .toast.toast-success {
            background: #c6f6d5;
            color: #22543d;
        }

        .toast .toast-icon {
            font-size: 18px;
            line-height: 1;
        }

        .toast .toast-close {
            cursor: pointer;
            opacity: 0.7;
        }

        .toast .toast-close:hover {
            opacity: 1;
        }

        /* Logo */
        .logo-wrap {
            text-align: center;
            margin-bottom: 6px;
        }

        .logo {
            display: inline-block;
            max-width: 50%;
            height: auto;
        }

    </style>
</head>

<body>
    <div class="card">
        <div class="logo-wrap">
            <img class="logo" src="{{ $congTy->logo }}" alt="Logo">
        </div>
        <hr>  
        <h1 class="title">Xác minh thông tin CCCD</h1>
        <p class="subtitle">Nhập số CCCD và mã số hợp đồng để tiếp tục.</p>

        <form id="verify-form" novalidate>
            @csrf
            <div class="form-group">
                <label for="ccccd">Số CCCD</label>
                <input id="ccccd" name="ccccd" type="text" inputmode="numeric" pattern="[0-9]{9,12}"
                    placeholder="Nhập số CCCD (9-12 số)" required>
                <div class="error" id="ccccd_error" aria-live="polite"></div>
            </div>

            <div class="form-group">
                <label for="ma_bao_mat">Mã số hợp đồng</label>
                <div style="position: relative;">
                    <input id="ma_bao_mat" name="ma_bao_mat" type="password" placeholder="Nhập mã bảo mật" required
                        style="padding-right: 42px;">
                    <button type="button" id="toggle_mbm" aria-label="Ẩn/hiện mã bảo mật" title="Ẩn/hiện"
                        style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: transparent; border: 0; color: rgba(255,255,255,0.9); cursor: pointer; padding: 4px; font-size: 20px; line-height: 1;">
                        <span id="icon_mbm" aria-hidden="true" style="font-size: 20px;">👁️</span>
                    </button>
                </div>
                <div class="error" id="ma_bao_mat_error" aria-live="polite"></div>
            </div>

            <div class="actions">
                <button type="submit" class="btn" id="submit-btn">
                    <span class="btn-text">Xác minh</span>
                    <span class="btn-loading" style="display: none;">Đang xử lý...</span>
                </button>
                <a href="{{ url('/') }}" class="btn-outline">Về trang chủ</a>
            </div>
            <div class="helper">Chúng tôi bảo mật thông tin của bạn.</div>
        </form>
    </div>

    <div class="brand">© <?php echo date('Y'); ?> {{ $congTy->ten }}</div>
    <div class="toast-container" id="toast-container"></div>
    <script src="https://cdn.jsdelivr.net/npm/axios@1.6.7/dist/axios.min.js"></script>
    <script>
        (function () {
            const form = document.getElementById('verify-form');
            const cccdInput = document.getElementById('ccccd');
            const mbmInput = document.getElementById('ma_bao_mat');
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const cccdError = document.getElementById('ccccd_error');
            const mbmError = document.getElementById('ma_bao_mat_error');
            const toggleBtn = document.getElementById('toggle_mbm');
            const iconMbm = document.getElementById('icon_mbm');
            const submitBtn = document.getElementById('submit-btn');
            const btnText = submitBtn.querySelector('.btn-text');
            const btnLoading = submitBtn.querySelector('.btn-loading');

            if (toggleBtn && mbmInput) {
                toggleBtn.addEventListener('click', function () {
                    const isHidden = mbmInput.getAttribute('type') === 'password';
                    mbmInput.setAttribute('type', isHidden ? 'text' : 'password');
                    iconMbm.textContent = isHidden ? '🙈' : '👁️';
                });
            }

            function showToast(message, type = 'error', duration = 4000) {
                const container = document.getElementById('toast-container');
                const toast = document.createElement('div');
                toast.className = `toast toast-${type === 'success' ? 'success' : 'error'}`;
                toast.innerHTML = `
                    <div class="toast-icon">${type === 'success' ? '✔️' : '⚠️'}</div>
                    <div class="toast-message">${message}</div>
                    <div class="toast-close" aria-label="Đóng">✖</div>
                `;
                container.appendChild(toast);

                const remove = () => {
                    if (!toast.parentNode) return;
                    toast.style.transition = 'opacity .25s ease, transform .25s ease';
                    toast.style.opacity = '0';
                    toast.style.transform = 'translateY(-6px)';
                    setTimeout(() => toast.remove(), 250);
                };
                toast.querySelector('.toast-close').addEventListener('click', remove);
                setTimeout(remove, duration);
            }

            function showMessage(msg, ok) {
                let el = document.getElementById('resp-msg');
                if (!el) {
                    el = document.createElement('div');
                    el.id = 'resp-msg';
                    el.style.marginTop = '12px';
                    form.appendChild(el);
                }
                el.textContent = msg;
                el.style.color = ok ? '#c6f6d5' : '#feb2b2';
                el.style.fontSize = '13px';
            }

            function clearFieldErrors() {
                cccdError.textContent = '';
                mbmError.textContent = '';
                cccdInput.classList.remove('is-invalid');
                mbmInput.classList.remove('is-invalid');
            }

            function clientValidate() {
                clearFieldErrors();
                let ok = true;
                const cccdVal = cccdInput.value.trim();
                const mbmVal = mbmInput.value.trim();
                const cccdPattern = /^\d{9,12}$/;
                if (!cccdVal) {
                    cccdError.textContent = 'Vui lòng nhập số CCCD.';
                    cccdInput.classList.add('is-invalid');
                    ok = false;
                } else if (!cccdPattern.test(cccdVal)) {
                    cccdError.textContent = 'Số CCCD phải gồm 9-12 chữ số.';
                    cccdInput.classList.add('is-invalid');
                    ok = false;
                }
                if (!mbmVal) {
                    mbmError.textContent = 'Vui lòng nhập mã số hợp đồng.';
                    mbmInput.classList.add('is-invalid');
                    ok = false;
                }
                return ok;
            }

            form.addEventListener('submit', async function (e) {
                e.preventDefault();
                if (!clientValidate()) {
                    return;
                }
                try {
                    // Disable submit button and show loading state
                    submitBtn.disabled = true;
                    btnText.style.display = 'none';
                    btnLoading.style.display = 'inline-block';

                    const res = await axios.post('{{ route('user.verify-cccd') }}', {
                        ccccd: cccdInput.value.trim(),
                        ma_bao_mat: mbmInput.value.trim(),
                    }, {
                        headers: {
                            'X-CSRF-TOKEN': token,
                            'Accept': 'application/json'
                        }
                    });
                    
                    const data = res.data || {};
                    showToast(data.message || 'Xác minh thành công.', 'success');
                    
                    // Redirect to registration page with parameters
                    let url = '{{ route('user.register') }}?cty={{ $congTy->id }}&ccccd=' + cccdInput.value.trim() + '&ma_bao_mat=' + mbmInput.value.trim();
                    window.location.href = url;
                } catch (err) {
                    clearFieldErrors();
                    let msg = 'Có lỗi xảy ra.';
                    if (err.response) {
                        if (err.response.status === 422 && err.response.data && err.response.data
                            .errors) {
                            const errors = err.response.data.errors;
                            if (errors.ccccd && errors.ccccd.length) {
                                cccdError.textContent = errors.ccccd[0];
                                cccdInput.classList.add('is-invalid');
                            }
                            if (errors.ma_bao_mat && errors.ma_bao_mat.length) {
                                mbmError.textContent = errors.ma_bao_mat[0];
                                mbmInput.classList.add('is-invalid');
                            }
                            msg = 'Vui lòng kiểm tra các trường nhập.';
                        } else if (err.response.data && err.response.data.message) {
                            msg = err.response.data.message;
                        }
                    }
                    if (msg) {
                        showToast(msg, 'error');
                    } else {
                        showToast('Xác minh thành công.', 'success');
                    }
                } finally {
                    // Reset button state
                    submitBtn.disabled = false;
                    btnText.style.display = 'inline-block';
                    btnLoading.style.display = 'none';
                }
            });
        })();

    </script>
</body>

</html>
