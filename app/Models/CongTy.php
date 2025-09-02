<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CongTy extends Model
{
    protected $table = 'cong_ty';
    protected $fillable = [
        'ten', 
        'logo', 
        'trang_thai', 
        'mo_ta',
        'email',
        'so_dien_thoai',    
        'dia_chi',
        'loai_hinh',
        'ngay_dang_ky',
        'ma_so_thue',
        'website',
        'nguoi_dai_dien'
    ];
}
