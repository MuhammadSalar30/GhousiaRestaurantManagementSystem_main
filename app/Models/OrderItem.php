<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'menu_item_id',
        'item_name',
        'item_description',
        'item_size',
        'item_price',
        'quantity',
        'total_price'
    ];

    protected $casts = [
        'item_price' => 'decimal:2',
        'total_price' => 'decimal:2',
    ];

    // Relationships
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function menuItem()
    {
        return $this->belongsTo(MenuItem::class);
    }

    // Accessors
    public function getFormattedItemPriceAttribute()
    {
        return 'Rs. ' . number_format($this->item_price, 2);
    }

    public function getFormattedTotalPriceAttribute()
    {
        return 'Rs. ' . number_format($this->total_price, 2);
    }

    // Methods
    public function calculateTotalPrice()
    {
        $this->total_price = $this->item_price * $this->quantity;
        return $this->total_price;
    }

    // Boot method to automatically calculate total price
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($orderItem) {
            $orderItem->total_price = $orderItem->item_price * $orderItem->quantity;
        });
    }
}
