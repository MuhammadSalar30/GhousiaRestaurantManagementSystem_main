<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'order_type',
        'table_no',
        'delivery_address',
        'delivery_area',
        'delivery_city',
        'payment_method',
        'payment_status',
        'subtotal',
        'tax_amount',
        'delivery_fee',
        'discount_amount',
        'total_price',
        'status',
        'notes',
        'estimated_delivery_time'
    ];

    protected $casts = [
        'estimated_delivery_time' => 'datetime',
        'subtotal' => 'decimal:2',
        'tax_amount' => 'decimal:2',
        'delivery_fee' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'total_price' => 'decimal:2',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Scopes
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }

    public function scopePreparing($query)
    {
        return $query->where('status', 'preparing');
    }

    public function scopeReady($query)
    {
        return $query->where('status', 'ready');
    }

    public function scopeOnTheWay($query)
    {
        return $query->where('status', 'on_the_way');
    }

    public function scopeDelivered($query)
    {
        return $query->where('status', 'delivered');
    }

    public function scopeCancelled($query)
    {
        return $query->where('status', 'cancelled');
    }

    public function scopeDelivery($query)
    {
        return $query->where('order_type', 'delivery');
    }

    public function scopeTakeaway($query)
    {
        return $query->where('order_type', 'takeaway');
    }

    public function scopeDineIn($query)
    {
        return $query->where('order_type', 'dine-in');
    }

    // Accessors
    public function getFormattedTotalAttribute()
    {
        return 'Rs. ' . number_format($this->total_price, 2);
    }

    public function getFormattedSubtotalAttribute()
    {
        return 'Rs. ' . number_format($this->subtotal, 2);
    }

    public function getStatusBadgeAttribute()
    {
        $badges = [
            'pending' => 'bg-green-500/20 text-green-500',
            'confirmed' => 'bg-green-500/20 text-green-500',
            'preparing' => 'bg-orange-500/20 text-orange-500',
            'ready' => 'bg-purple-500/20 text-purple-500',
            'on_the_way' => 'bg-indigo-500/20 text-indigo-500',
            'delivered' => 'bg-green-500/20 text-green-500',
            'cancelled' => 'bg-red-500/20 text-red-500',
        ];

        return $badges[$this->status] ?? 'bg-gray-500/20 text-gray-500';
    }

    public function getStatusLabelAttribute()
    {
        $labels = [
            'pending' => 'Received',
            'confirmed' => 'Received',
            'preparing' => 'Preparing',
            'ready' => 'Ready',
            'on_the_way' => 'On the Way',
            'delivered' => 'Delivered',
            'cancelled' => 'Cancelled',
        ];

        return $labels[$this->status] ?? 'Unknown';
    }

    // Methods
    public function canBeCancelled()
    {
        return in_array($this->status, ['pending', 'confirmed']);
    }

    public function canBeUpdated()
    {
        return in_array($this->status, ['pending', 'confirmed', 'preparing']);
    }

    public function getTotalItemsCount()
    {
        return $this->orderItems->sum('quantity');
    }

    public function generateOrderNumber()
    {
        return 'ORD-' . str_pad($this->id, 6, '0', STR_PAD_LEFT);
    }

    public function getEstimatedDeliveryTimeAttribute($value)
    {
        if ($value) {
            return Carbon::parse($value);
        }
        return null;
    }

    public function setEstimatedDeliveryTime($minutes = 30)
    {
        $this->estimated_delivery_time = Carbon::now()->addMinutes($minutes);
        $this->save();
    }
}
