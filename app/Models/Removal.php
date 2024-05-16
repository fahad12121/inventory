<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Removal extends Model
{
    use HasFactory;

    public function itemNo(): BelongsTo
    {
        return $this->belongsTo(ProductItem::class, 'item_no', 'id');
    }

    public function serialNo(): BelongsTo
    {
        return $this->belongsTo(ProductItem::class, 'serial_no', 'id');
    }
}
