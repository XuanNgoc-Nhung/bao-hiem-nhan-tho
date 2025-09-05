<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LichSu extends Model
{
    protected $table = 'lich_su';
    protected $fillable = ['nguoi_dung', 'hanh_dong', 'chi_tiet', 'thoi_gian', 'created_at', 'updated_at'];
    
}
