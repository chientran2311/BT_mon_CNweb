<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Medicine extends Model
{
    use HasFactory;

    // Tên bảng (nếu không sử dụng chuẩn Laravel đặt tên bảng)
    protected $table = 'medicines';

    // Khóa chính
    protected $primaryKey = 'medicine_id';

    // Các cột có thể được gán giá trị hàng loạt
    protected $fillable = [
        'name',
        'brand',
        'dosage',
        'form',
        'price',
        'stock',
    ];

    /**
     * Thiết lập mối quan hệ 1-n với Sale.
     */
    public function sales()
    {
        return $this->hasMany(Sale::class, 'medicine_id', 'medicine_id');
    }
}
