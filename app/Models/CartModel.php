<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    use HasFactory;

    // Định nghĩa các thuộc tính và phương thức của mô hình Cart ở đây

    // Ví dụ:
    protected $fillable = [
        'customer_id',
        'product_id',
        'quantity',
        'price'
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}