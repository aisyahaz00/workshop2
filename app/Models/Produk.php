<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Set table untuk model.
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
    public const CREATED_AT = 'tanggal_dibuat';

    /**
     * Custom tanggal updated_at.
     *
     * @var string|null
     */
    public const UPDATED_AT = 'tanggal_diperbarui';
}
