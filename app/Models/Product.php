<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_name',
        'product_detail',
        'product_images',
        'product_price',
        'product_quantity',
        'product_category'
    ];

    protected $casts = [
        'product_images' => 'array'
    ];

    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
