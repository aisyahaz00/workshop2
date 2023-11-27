<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PemesananPembayaran extends Model
{
    use HasFactory;

    /**
     * Set table untuk model.
     *
     * @var string
     */
    protected $table = 'pemesanan_pembayaran';

    /**
     * Casting data native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'total' => 'integer',
    ];

    /**
     * Custom tanggal created_at.
     *
     * @var string|null
     */
    public const CREATED_AT = 'tanggal_dibuat';

    /**
     * Custom tanggal updated_at.
     *
     * @var string|null
     */
    public const UPDATED_AT = 'tanggal_diperbarui';

    /**
     * Detail admin.
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    /**
     * Detail pemesanan.
     */
    public function pemesanan(): BelongsTo
    {
        return $this->belongsTo(Pemesanan::class);
    }
}
