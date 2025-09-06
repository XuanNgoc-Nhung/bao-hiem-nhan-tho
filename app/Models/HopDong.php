<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HopDong extends Model
{
    protected $table = 'hop_dong';
    protected $fillable = ['id', 'cccd', 'ma_hop_dong', 'ho_ten', 'gioi_tinh', 'ngay_sinh', 'dia_chi', 'so_dien_thoai', 'so_tien_mua', 'so_tien_dong_hang_nam', 'thoi_gian_mua', 'ngay_cap_hop_dong', 'ngay_dao_han', 'ngan_hang', 'so_tai_khoan', 'chu_tai_khoan', 'anh_mat_truoc', 'anh_mat_sau', 'anh_chan_dung', 'th_cccd', 'th_moi_quan_he', 'th_ho_ten', 'th_gioi_tinh', 'th_ngay_sinh', 'th_dia_chi', 'th_so_dien_thoai', 'th_ngan_hang', 'th_so_tai_khoan', 'th_chu_tai_khoan', 'th_anh_mat_truoc', 'th_anh_mat_sau', 'th_anh_chan_dung', 'loai_hop_dong', 'cong_ty_id']; 
}
