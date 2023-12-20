<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pemesanan extends Model
{
    use HasFactory;

    /**
     * Set table untuk model.
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
    public const CREATED_AT = 'tanggal_pemesanan';

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
        return $this->hasMany(PemesananDetail::class, 'pemesanan_id');
    }

    /**
     * List pembayaran.
     */
    public function pembayaran(): HasMany
    {
        return $this->hasMany(PemesananPembayaran::class, 'pemesanan_id');
    }

    /**
     * Buat unique nomor invoice.
     */
    public static function buatNomorInvoice(Carbon $tanggal): string
    {
        $cekTotalPemesanan = Pemesanan::query()
            ->whereBetween(
                'pemesanan.tanggal_pemesanan',
                [$tanggal->toImmutable()->startOfMonth(), $tanggal->toImmutable()->endOfMonth()]
            )
            ->count();

        return now()->format('Ymd') . '-' . ($cekTotalPemesanan + 1);
    }

    /**
     * Hitung total tagihan.
     */
    public function totalTagihan(): int
    {
        return $this->detail->reduce(
            fn (int $carry, PemesananDetail $detail) => $carry + $detail->qty * $detail->harga_produk,
            0,
        );
    }
}
