<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Sale extends Model
{
    use HasFactory;

    // Tên bảng (nếu không sử dụng chuẩn Laravel đặt tên bảng)
    protected $table = 'sales';

    // Khóa chính
    protected $primaryKey = 'sales_id';

    // Các cột có thể được gán giá trị hàng loạt
    protected $fillable = [
        'medicine_id',
        'quantity',
        'sale_date',
        'customer_phone',
    ];

    /**
     * Thiết lập mối quan hệ n-1 với Medicine.
     */
    public function medicine()
{
    return $this->belongsTo(Medicine::class, 'medicine_id', 'medicine_id');
}
}
