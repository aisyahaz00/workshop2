<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Keranjang extends Model
{
    use HasFactory;

    /**
     * Set table untuk model.
     *
     * @var string
     */
    protected $table = 'keranjang';

    /**
     * Casting data native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'qty' => 'integer',
    ];

    /**
     * Inaktif fitur created at dan updated at.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Dapatkan detail pengguna.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Dapatkan detail produk.
     */
    public function produk(): BelongsTo
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
