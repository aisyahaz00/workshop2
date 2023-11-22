<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pemesanan extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pemesanan';

    /**
     * Casting data native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal_pemesanan' => 'datetime',
        'tanggal_diperbarui' => 'datetime',
    ];

    /**
     * Custom tanggal created_at.
     *
     * @var string|null
     */
    public const created_at = 'tanggal_pemesanan';

    /**
     * Custom tanggal updated_at.
     *
     * @var string|null
     */
    public const UPDATED_AT = 'tanggal_diperbarui';

    /**
     * Detail owner.
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * List detail pesanan.
     */
    public function detail(): HasMany
    {
        return $this->hasMany(PemesananDetail::class);
    }

    /**
     * List pembayaran.
     */
    public function pembayaran(): HasMany
    {
        return $this->hasMany(PemesananPembayaran::class, 'pemesanan_id');
    }

    /**
     * Hitung total tagihan.
     */
    public function totalTagihan(): int
    {
        return $this->detail->reduce(fn (PemesananDetail $detail) => $detail->qty * $detail->harga_produk);
    }
}
