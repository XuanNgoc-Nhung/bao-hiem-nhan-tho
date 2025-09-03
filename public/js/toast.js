// Cấu hình mặc định cho Toastr
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

// Hàm hiển thị thông báo thành công
function showSuccess(message) {
    toastr.success(message);
}

// Hàm hiển thị thông báo lỗi
function showError(message) {
    toastr.error(message);
}

// Hàm hiển thị thông báo cảnh báo
function showWarning(message) {
    toastr.warning(message);
}

// Hàm hiển thị thông báo thông tin
function showInfo(message) {
    toastr.info(message);
} 