<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'produk';

    /**
     * Casting data native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'harga' => 'integer',
    ];

    /**
     * Custom tanggal created_at.
     *
     * @var string|null
     */
    public const created_at = 'tanggal_dibuat';

    /**
     * Custom tanggal updated_at.
     *
     * @var string|null
     */
    public const UPDATED_AT = 'tanggal_diperbarui';
}
