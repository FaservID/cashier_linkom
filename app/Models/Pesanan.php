<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $guarded = ['id'];


    public function barang(): HasMany
    {
        return $this->hasMany(Barang::class, 'id', 'barang_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Pembayaran::class, 'id', 'pesanan_id');
    }

    public function detailOrders():HasMany {
        return $this->hasMany(DetailOrder::class, 'pesanan_id', 'id');
    }

    public function getRouteKeyName()
    {
        return 'order_id';
    }
}
