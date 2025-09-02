@extends('admin.layouts.app')
@section('title', 'Quản lý công ty')
@section('page-title', 'Quản lý công ty')

@section('content')
<div class="page-header">
    <h1 class="page-title">Quản lý CCCD</h1>
    <p class="page-subtitle">Quản lý thông tin các CCCD trong hệ thống</p>
</div>
<!-- Search and Filter -->
<div class="card mb-4">
    <div class="card-body">
        <div class="row g-3">
            <form action="{{ route('admin.cccd') }}" class="input-group" method="get">
                <div class="col-12 col-md-4 mb-3">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" class="form-control" name="search" placeholder="Tìm kiếm công ty..." value="{{ request('search') }}">
                    </div>
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <select class="form-select" name="status" id="statusFilter">
                        <option {{ request('status') == '' ? 'selected' : '' }} value="">Tất cả trạng thái</option>
                        <option {{ request('status') == 1 ? 'selected' : '' }} value="1">Được phép đăng ký</option>
                        <option {{ request('status') == 2 ? 'selected' : '' }} value="2">Không được phép đăng ký</option>
                    </select>
                </div>
                <div class="col-12 col-md-2 mb-3">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-search me-2"></i>Tìm kiếm
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Companies Table -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">
            <i class="bi bi-building me-2"></i>
            Danh sách công ty bảo hiểm
        </h5>
        <div class="d-flex gap-2">
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addCccdModal">
                <i class="bi bi-plus-circle me-2"></i>Thêm mới
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered table-sm" id="companiesTable">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Số CCCD</th>
                        <th>Mã bảo mật</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($danh_sach_cccd) > 0)
                    @foreach ($danh_sach_cccd as $cccd)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $cccd->ccccd }}</td>
                        <td>{{ $cccd->ma_bao_mat }}</td>
                        <td>{{ $cccd->trang_thai == 1 ? 'Được phép đăng ký' : 'Không được phép đăng ký' }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-warning" 
                                        title="Chỉnh sửa"
                                        onclick="editCccd({{ json_encode($cccd) }})">
                                    <i class="bi bi-pencil btn-sm"></i>
                                </button>
                                <button class="btn btn-danger" onclick="deleteCccd({{ json_encode($cccd) }})" title="Xóa">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6" class="text-center">Không có dữ liệu</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            {{ $danh_sach_cccd->links(app()->getLocale() == 'vi' ? 'pagination::bootstrap-5' : 'pagination::bootstrap-4') }}
        </div>

    </div>
</div>
<!-- Add CCCD Modal -->
<div class="modal fade" id="addCccdModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm CCCD</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formAddCccd">
                    <div class="mb-3">
                        <label class="form-label">Số CCCD</label>
                        <input type="text" class="form-control" name="ccccd" placeholder="Nhập số CCCD">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mã bảo mật</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="ma_bao_mat" placeholder="Nhập mã bảo mật">
                            <button type="button" class="btn btn-outline-secondary" id="addToggleMbm" aria-label="Ẩn/hiện" style="display: inline-flex; align-items: center; justify-content: center;">
                                <i class="bi bi-eye" id="addToggleMbmIcon" style="font-size: 1.25rem;"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="button" id="btnFillCccdSample" class="btn btn-outline-secondary">Điền dữ liệu mẫu</button>
                <button type="button" id="btnSaveCccd" class="btn btn-primary" data-store-url="{{ route('admin.cccd.store') }}">Lưu</button>
            </div>
        </div>
    </div>
    
</div>
<!-- Edit CCCD Modal -->
<div class="modal fade" id="editCccdModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chỉnh sửa CCCD</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditCccd">
                    <input type="hidden" name="id">
                    <div class="mb-3">
                        <label class="form-label">Số CCCD</label>
                        <input type="text" class="form-control" name="ccccd" placeholder="Nhập số CCCD">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mã bảo mật</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="ma_bao_mat" placeholder="Nhập mã bảo mật">
                            <button type="button" class="btn btn-outline-secondary" id="editToggleMbm" aria-label="Ẩn/hiện" style="display: inline-flex; align-items: center; justify-content: center;">
                                <i class="bi bi-eye" id="editToggleMbmIcon" style="font-size: 1.25rem;"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Trạng thái</label>
                        <select class="form-select" name="trang_thai">
                            <option value="1">Được phép đăng ký</option>
                            <option value="2">Không được phép đăng ký</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="button" id="btnUpdateCccd" class="btn btn-primary">Cập nhật</button>
            </div>
        </div>
    </div>
    

</div>
<!-- Confirm Modal (Reusable) -->
<div class="modal fade" id="confirmModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Xác nhận</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p id="confirmModalMessage" class="mb-0">Bạn có chắc không?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-primary" id="confirmModalOkBtn">Xác nhận</button>
            </div>
        </div>
    </div>
    

</div>
<style>
    .modal-backdrop {
        --bs-backdrop-bg: #000;
        --bs-backdrop-opacity: 0.7;
    }
    .modal-backdrop.modal-backdrop-elevated { z-index: 2000; }
    .modal.modal-elevated { z-index: 2005; }
    body.modal-open { background-color: rgba(0,0,0,0.02); }
</style>
<script>
    function showConfirm(message, { okText = 'Xác nhận', cancelText = 'Hủy', okVariant = 'primary' } = {}) {
        return new Promise((resolve) => {
            const modalEl = document.getElementById('confirmModal');
            const msgEl = document.getElementById('confirmModalMessage');
            const okBtn = document.getElementById('confirmModalOkBtn');

            if (!modalEl || !msgEl || !okBtn || typeof bootstrap === 'undefined') {
                const fallback = window.confirm(message || 'Bạn có chắc không?');
                resolve(!!fallback);
                return;
            }

            msgEl.textContent = message || 'Bạn có chắc không?';
            okBtn.textContent = okText;
            okBtn.className = 'btn btn-' + okVariant;

            const bsModal = new bootstrap.Modal(modalEl, { backdrop: 'static' });

            const onOk = () => {
                cleanup();
                bsModal.hide();
                resolve(true);
            };
            const onHide = () => {
                cleanup();
                resolve(false);
            };
            function cleanup() {
                okBtn.removeEventListener('click', onOk);
                modalEl.removeEventListener('hidden.bs.modal', onHide);
                modalEl.classList.remove('modal-elevated');
                const backdrops = document.querySelectorAll('.modal-backdrop');
                if (backdrops.length) {
                    backdrops[backdrops.length - 1].classList.remove('modal-backdrop-elevated');
                }
            }

            okBtn.addEventListener('click', onOk);
            modalEl.addEventListener('hidden.bs.modal', onHide);

            bsModal.show();

            modalEl.classList.add('modal-elevated');
            const backdrops = document.querySelectorAll('.modal-backdrop');
            if (backdrops.length) {
                backdrops[backdrops.length - 1].classList.add('modal-backdrop-elevated');
            }
        });
    }
</script>
<script>
    (function() {
        const sampleButton = document.getElementById('btnFillCccdSample');
        if (sampleButton) {
            sampleButton.addEventListener('click', function() {
                const form = document.getElementById('formAddCccd');
                if (!form) return;
                const ccccdInput = form.querySelector('input[name="ccccd"]');
                const maBaoMatInput = form.querySelector('input[name="ma_bao_mat"]');
                if (ccccdInput) ccccdInput.value = '012345678901';
                if (maBaoMatInput) maBaoMatInput.value = '123456';
            });
        }

        const saveButton = document.getElementById('btnSaveCccd');
        if (saveButton) {
            saveButton.addEventListener('click', async function() {
                const form = document.getElementById('formAddCccd');
                if (!form) return;
                const ccccd = form.querySelector('input[name="ccccd"]').value.trim();
                const maBaoMat = form.querySelector('input[name="ma_bao_mat"]').value.trim();

                try {
                    const url = this.getAttribute('data-store-url');
                    const response = await axios.post(url, {
                        ccccd: ccccd,
                        ma_bao_mat: maBaoMat
                    });

                    if (typeof showToast === 'function') {
                        showToast('Thêm CCCD thành công', 'success');
                    }

                    // Close modal
                    const modalElement = document.getElementById('addCccdModal');
                    const modal = bootstrap.Modal.getInstance(modalElement) || new bootstrap.Modal(modalElement);
                    modal.hide();

                    // Optional: reload to refresh the table
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                } catch (error) {
                    let message = 'Không thể thêm CCCD';
                    if (error.response) {
                        if (error.response.status === 422 && error.response.data && error.response.data.errors) {
                            const errs = error.response.data.errors;
                            const firstKey = Object.keys(errs)[0];
                            if (firstKey) {
                                message = errs[firstKey][0] || message;
                            }
                        } else if (error.response.data && error.response.data.message) {
                            message = error.response.data.message;
                        }
                    }
                    if (typeof showToast === 'function') {
                        showToast(message, 'error');
                    } else {
                        alert(message);
                    }
                }
            });
        }
        // Toggle show/hide for Add modal
        (function() {
            const toggleBtn = document.getElementById('addToggleMbm');
            if (!toggleBtn) return;
            const icon = document.getElementById('addToggleMbmIcon');
            const input = document.querySelector('#addCccdModal input[name="ma_bao_mat"]');
            if (!input) return;
            toggleBtn.addEventListener('click', function() {
                const hidden = input.getAttribute('type') === 'password';
                input.setAttribute('type', hidden ? 'text' : 'password');
                icon.className = hidden ? 'bi bi-eye-slash' : 'bi bi-eye';
            });
        })();

        // Toggle show/hide for Edit modal
        ;(function() {
            const toggleBtn = document.getElementById('editToggleMbm');
            if (!toggleBtn) return;
            const icon = document.getElementById('editToggleMbmIcon');
            const input = document.querySelector('#editCccdModal input[name="ma_bao_mat"]');
            if (!input) return;
            toggleBtn.addEventListener('click', function() {
                const hidden = input.getAttribute('type') === 'password';
                input.setAttribute('type', hidden ? 'text' : 'password');
                icon.className = hidden ? 'bi bi-eye-slash' : 'bi bi-eye';
            });
        })();
    })();
</script>
<script>
    function editCccd(cccd) {
        const form = document.getElementById('formEditCccd');
        if (!form) return;
        form.querySelector('input[name="id"]').value = cccd.id;
        form.querySelector('input[name="ccccd"]').value = cccd.ccccd || cccd.cccd || '';
        form.querySelector('input[name="ma_bao_mat"]').value = cccd.ma_bao_mat || '';
        form.querySelector('select[name="trang_thai"]').value = String(cccd.trang_thai ?? 1);

        const modalElement = document.getElementById('editCccdModal');
        const modal = bootstrap.Modal.getInstance(modalElement) || new bootstrap.Modal(modalElement);
        modal.show();
    }

    (function() {
        const updateBtn = document.getElementById('btnUpdateCccd');
        if (!updateBtn) return;
        updateBtn.addEventListener('click', async function() {
            const form = document.getElementById('formEditCccd');
            if (!form) return;
            const id = form.querySelector('input[name="id"]').value;
            const ccccd = form.querySelector('input[name="ccccd"]').value.trim();
            const maBaoMat = form.querySelector('input[name="ma_bao_mat"]').value.trim();
            const trangThai = form.querySelector('select[name="trang_thai"]').value;

            try {
                const url = '{{ route('admin.cccd.update', ['id' => ':id']) }}'.replace(':id', id);
                await axios.put(url, {
                    ccccd: ccccd,
                    ma_bao_mat: maBaoMat,
                    trang_thai: trangThai
                });
                if (typeof showToast === 'function') {
                    showToast('Cập nhật CCCD thành công', 'success');
                }
                const modalElement = document.getElementById('editCccdModal');
                const modal = bootstrap.Modal.getInstance(modalElement) || new bootstrap.Modal(modalElement);
                modal.hide();
                setTimeout(function() {
                    window.location.reload();
                }, 800);
            } catch (error) {
                let message = 'Không thể cập nhật CCCD';
                if (error.response) {
                    if (error.response.status === 422 && error.response.data && error.response.data.errors) {
                        const errs = error.response.data.errors;
                        const firstKey = Object.keys(errs)[0];
                        if (firstKey) {
                            message = errs[firstKey][0] || message;
                        }
                    } else if (error.response.data && error.response.data.message) {
                        message = error.response.data.message;
                    }
                }
                if (typeof showToast === 'function') {
                    showToast(message, 'error');
                } else {
                    alert(message);
                }
            }
        });
    })();

    async function deleteCccd(cccd) {
        const confirmed = await showConfirm('Xác nhận xóa CCCD này?', { okVariant: 'danger', okText: 'Xóa' });
        if (!confirmed) return;

        try {
            const url = '{{ route('admin.cccd.delete', ['id' => ':id']) }}'.replace(':id', cccd.id);
            await axios.delete(url);
            if (typeof showToast === 'function') {
                showToast('Xóa CCCD thành công', 'success');
            }
            setTimeout(function() {
                window.location.reload();
            }, 800);
        } catch (error) {
            let message = 'Không thể xóa CCCD';
            if (error.response && error.response.data && error.response.data.message) {
                message = error.response.data.message;
            }
            if (typeof showToast === 'function') {
                showToast(message, 'error');
            } else {
                alert(message);
            }
        }
    }
</script>
@endsection
