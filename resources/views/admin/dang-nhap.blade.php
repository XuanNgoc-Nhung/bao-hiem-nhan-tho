<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            position: relative;
            overflow-x: hidden;
        }
        
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="white" opacity="0.05"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            pointer-events: none;
        }
        
        .floating-shapes {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
        }
        
        .shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }
        
        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }
        
        .shape:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }
        
        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
        
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            z-index: 1;
        }
        
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 25px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            overflow: hidden;
            max-width: 480px;
            width: 100%;
            transform: translateY(0);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .login-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 35px 70px rgba(0, 0, 0, 0.2);
        }
        
        .login-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-align: center;
            padding: 50px 30px;
            position: relative;
            overflow: hidden;
        }
        
        .login-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }
        
        .login-header::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }
        
        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        .login-header h2 {
            margin: 0;
            font-size: 2.2rem;
            font-weight: 700;
            position: relative;
            z-index: 2;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }
        
        .login-header p {
            margin: 15px 0 0 0;
            opacity: 0.95;
            position: relative;
            z-index: 2;
            font-size: 1.1rem;
            font-weight: 300;
        }
        
        .login-body {
            padding: 50px 40px;
        }
        
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }
        
        .form-label {
            display: block;
            margin-bottom: 8px;
            color: #495057;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        
        .form-control {
            border: 2px solid #e1e5e9;
            border-radius: 15px;
            padding: 18px 20px;
            font-size: 16px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            width: 100%;
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.25rem rgba(102, 126, 234, 0.15);
            transform: translateY(-2px);
            background: rgba(255, 255, 255, 1);
            outline: none;
        }
        
        .form-control:focus + .form-label {
            color: #667eea;
        }
        
        .password-input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }
        
        .password-input-wrapper .form-control {
            border-radius: 15px;
            padding-right: 50px;
        }
        
        .password-toggle-btn {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: transparent;
            border: none;
            color: #6c757d;
            padding: 8px;
            border-radius: 8px;
            transition: all 0.3s ease;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .password-toggle-btn:hover {
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
        }
        
        .password-toggle-btn:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(102, 126, 234, 0.25);
        }
        
        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 15px;
            padding: 18px 30px;
            font-size: 18px;
            font-weight: 600;
            color: white;
            width: 100%;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            margin-top: 10px;
        }
        
        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
            background: linear-gradient(135deg, #5a6fd8 0%, #6a4190 100%);
        }
        
        .btn-login:active {
            transform: translateY(-1px);
        }
        
        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s;
        }
        
        .btn-login:hover::before {
            left: 100%;
        }
        
        .form-check {
            margin: 25px 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .form-check-input {
            width: 20px;
            height: 20px;
            border-radius: 6px;
            border: 2px solid #e1e5e9;
            transition: all 0.3s ease;
        }
        
        .form-check-input:checked {
            background-color: #667eea;
            border-color: #667eea;
            transform: scale(1.1);
        }
        
        .form-check-label {
            font-weight: 500;
            color: #495057;
            cursor: pointer;
        }
        
        .error-message {
            color: #dc3545;
            font-size: 14px;
            margin-top: 8px;
            display: none;
            padding: 8px 12px;
            background: rgba(220, 53, 69, 0.1);
            border-radius: 8px;
            border-left: 3px solid #dc3545;
        }
        
        @media (max-width: 576px) {
            .login-card {
                margin: 10px;
                border-radius: 20px;
            }
            
            .login-header {
                padding: 40px 25px;
            }
            
            .login-body {
                padding: 40px 25px;
            }
            
            .login-header h2 {
                font-size: 1.8rem;
            }
        }
        
        .loading-spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255,255,255,0.3);
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-right: 10px;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>


        <!-- Toast Container -->
        <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1055;">
            <!-- Toasts will be dynamically inserted here -->
        </div>
<body>
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h2><i class="fas fa-user-shield me-3"></i>Admin Panel</h2>
                <p>Đăng nhập để truy cập hệ thống quản trị</p>
            </div>
            
            <div class="login-body">
                <div id="loginForm">
                    <!-- Tên đăng nhập -->
                    <div class="form-group">
                        <label for="username" class="form-label">
                            <i class="fas fa-user me-2"></i>Tên đăng nhập
                        </label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Nhập tên đăng nhập" required>
                        <div class="error-message" id="username-error"></div>
                    </div>
                    
                    <!-- Mật khẩu -->
                    <div class="form-group">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock me-2"></i>Mật khẩu
                        </label>
                        <div class="password-input-wrapper">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" required>
                            <button type="button" class="password-toggle-btn" onclick="togglePassword()">
                                <i class="fas fa-eye" id="password-icon"></i>
                            </button>
                        </div>
                        <div class="error-message" id="password-error"></div>
                    </div>
                    
                    <!-- Ghi nhớ đăng nhập -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember" name="remember">
                        <label class="form-check-label" for="remember">
                            <i></i>Ghi nhớ đăng nhập
                        </label>
                    </div>
                    
                    <!-- Nút đăng nhập -->
                    <button type="button" class="btn btn-login" id="loginBtn" onclick="handleLogin()">
                        <div class="loading-spinner" id="loadingSpinner"></div>
                        <i class="fas fa-sign-in-alt me-2" id="loginIcon"></i>Đăng nhập
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        // Cấu hình Toastr
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        // Chuyển đổi hiển thị mật khẩu
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('password-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.className = 'fas fa-eye-slash';
            } else {
                passwordInput.type = 'password';
                passwordIcon.className = 'fas fa-eye';
            }
        }
        
        // Xử lý đăng nhập bằng axios
        async function handleLogin() {
            // Reset error messages
            document.querySelectorAll('.error-message').forEach(el => el.style.display = 'none');
            
            // Show loading state
            const loginBtn = document.getElementById('loginBtn');
            const loadingSpinner = document.getElementById('loadingSpinner');
            const loginIcon = document.getElementById('loginIcon');
            
            loadingSpinner.style.display = 'inline-block';
            loginIcon.style.display = 'none';
            loginBtn.disabled = true;
            
            // Validate form
            let isValid = true;
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value;
            const remember = document.getElementById('remember').checked;
            
            // Validate username
            if (!username) {
                document.getElementById('username-error').textContent = 'Vui lòng nhập tên đăng nhập';
                document.getElementById('username-error').style.display = 'block';
                isValid = false;
            }
            
            // Validate password
            if (!password) {
                document.getElementById('password-error').textContent = 'Vui lòng nhập mật khẩu';
                document.getElementById('password-error').style.display = 'block';
                isValid = false;
            } else if (password.length < 6) {
                document.getElementById('password-error').textContent = 'Mật khẩu phải có ít nhất 6 ký tự';
                document.getElementById('password-error').style.display = 'block';
                isValid = false;
            }
            
            if (!isValid) {
                // Reset loading state if validation fails
                loadingSpinner.style.display = 'none';
                loginIcon.style.display = 'inline-block';
                loginBtn.disabled = false;
                return;
            }
            
            try {
                // Chuẩn bị dữ liệu
                const formData = {
                    username: username,
                    password: password,
                    remember: remember,
                    _token: '{{ csrf_token() }}'
                };
                
                // Gửi request bằng axios
                const response = await axios.post('{{ route("admin.login") }}', formData, {
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                });
                
                // Xử lý response thành công
                if (response.data.success) {
                    // Hiển thị toast thành công
                    showToast('Đăng nhập thành công! Đang chuyển hướng...', 'success');
                    
                    // Chuyển hướng sau 1 giây
                    setTimeout(() => {
                        if (response.data.redirect) {
                            window.location.href = response.data.redirect;
                        } else {
                            window.location.href = '{{ route("admin.dashboard") }}';
                        }
                    }, 3000);
                } else {
                    // Hiển thị toast lỗi từ server
                    showToast(response.data.message || 'Đăng nhập thất bại', 'error');
                }
                
            } catch (error) {
                console.error('Login error:', error);
                
                // Xử lý các loại lỗi khác nhau
                if (error.response) {
                    // Server trả về response với status code lỗi
                    const errorData = error.response.data;
                    if (errorData.errors) {
                        showToast(errorData.errors, 'error');
                    } else {
                        showToast('Đăng nhập thất bại. Vui lòng thử lại.', 'error');
                    }
                } else if (error.request) {
                    // Request được gửi nhưng không nhận được response
                    showToast('Không thể kết nối đến server. Vui lòng kiểm tra kết nối mạng.', 'error');
                } else {
                    // Lỗi khác
                    showToast('Có lỗi xảy ra. Vui lòng thử lại.', 'error');
                }
            } finally {
                // Reset loading state
                loadingSpinner.style.display = 'none';
                loginIcon.style.display = 'inline-block';
                loginBtn.disabled = false;
            }
        }
        
        // Xử lý Enter key để submit form
        document.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                handleLogin();
            }
        });
        
        // Add floating animation to form elements
        document.addEventListener('DOMContentLoaded', function() {
            const formElements = document.querySelectorAll('.form-group');
            
            formElements.forEach((element, index) => {
                element.style.opacity = '0';
                element.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    element.style.transition = 'all 0.6s ease';
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }, index * 200);
            });
        });
        
        // Add hover effects to form inputs
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });
            
            input.addEventListener('mouseleave', function() {
                if (!this.matches(':focus')) {
                    this.style.transform = 'translateY(0)';
                }
            });
        });
    </script>

    <!-- Custom JS -->
    <script>
        // Toast helper function
        function showToast(message, type = 'success', duration = 5000) {
            const toastContainer = document.querySelector('.toast-container');
            const toastId = 'toast-' + Date.now();
            
            const iconClass = {
                'success': 'bi-check-circle',
                'error': 'bi-exclamation-triangle',
                'warning': 'bi-exclamation-triangle',
                'info': 'bi-info-circle'
            }[type] || 'bi-info-circle';
            
            const bgClass = {
                'success': 'bg-success',
                'error': 'bg-danger',
                'warning': 'bg-warning',
                'info': 'bg-info'
            }[type] || 'bg-info';
            
            const toastHtml = `
                <div id="${toastId}" class="toast ${bgClass} text-white" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header ${bgClass} text-white border-0">
                        <i class="bi ${iconClass} me-2"></i>
                        <strong class="me-auto">Thông báo</strong>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        ${message}
                    </div>
                </div>
            `;
            
            toastContainer.insertAdjacentHTML('beforeend', toastHtml);
            
            const toastElement = document.getElementById(toastId);
            const toast = new bootstrap.Toast(toastElement, {
                autohide: true,
                delay: duration
            });
            
            toast.show();
            
            // Remove toast element after it's hidden
            toastElement.addEventListener('hidden.bs.toast', function() {
                toastElement.remove();
            });
        }
    </script>
</body>
</html>
