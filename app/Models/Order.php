<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    use HasFactory;

    const CODE = "OR";

    const STATUSES = [
        'WAITING_PAYMENT' => 'WAITING PAYMENT',
        'WAITING_PAYMENT_CONFIRMATION' => 'WAITING_PAYNMENT_CONFIRMATION',
        'SELLER_PROCESS' => 'SELLER_PROCESS',
        'ON_SHIPMENT' => 'ON_SHIPMENT',
        'DELIVERED' => 'DELIVERED',
        'DUE_PAYMENT' => 'DUE_PAYMENT',
        'PAYMENT_FAIL' => 'PAYMENT_FAIL',
        'CANCELLED_BY_CUSTOMER' => 'CANCELLED_BY_CUSTOMER',
        'CANCELLED_BY_SELLER' => 'CANCELLED_BY_SELLER',
    ];

    const SHIPPING_FEE = 10000;

    protected $fillable = [
        'customer_id',
        'updated_by',
        'store_id',
        'code',
        'payment_due',
        'destination',
        'shipping_fee',
        'total_price',
        'grand_total',
        'shipping_code',
        'note'
    ];

    protected static function boot() {
        parent::boot();
    
        static::creating(function ($order) {
            $order->code = self::CODE.'-'.date('dmyhis');
            $order->status = self::STATUSES['WAITING_PAYMENT'];
            $order->payment_due = new DateTime('tomorrow');
            $order->updated_by = $order->customer_id;
        });

        static::created(function ($order) {
            $order->logs()->create([
                'status' => $order->status,
                'note' => $order->note,
                'user_id' => $order->customer_id
            ]);
        });

        static::updated(function ($order) {
            $order->logs()->create([
                'status' => $order->status,
                'note' => $order->note,
                'user_id' => $order->updated_by
            ]);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function stores()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function detail()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function logs()
    {
        return $this->hasMany(OrderLog::class);
    }
}
