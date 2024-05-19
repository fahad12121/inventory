<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'vehicles', 'service_id', 'location', 'date', 'note', 'order_type', 'file', 'technician_id'];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
    public function employee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'technician_id', 'id');
    }
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

    public function statuses()
    {
        return $this->hasMany(OrderStatus::class, 'order_id', 'id');
    }

    public function Techstatuses()
    {
        return $this->hasMany(TechnicianStatus::class, 'order_id', 'id');
    }

    public function DeliveryImages()
    {
        return $this->hasMany(OrderDeliveryImg::class, 'order_id', 'id');
    }

    public function uploadImg($img)
    {
        $file = $img;
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('orders/', $filename);
        $image = $filename;

        return $image;
    }
}
