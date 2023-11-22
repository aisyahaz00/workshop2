<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PemesananDetail extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pemesanan_detail';

    /**
     * Casting data native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'harga_produk' => 'integer',
        'qty' => 'integer',
    ];

    /**
     * Matikan timestamp bawaan laravel.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Detail data produk.
     */
    public function produk(): BelongsTo
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }

    /**
     * Detail data pemesanan.
     */
    public function pemesanan(): BelongsTo
    {
        return $this->belongsTo(Pemesanan::class, 'pemesanan_id');
    }
}
