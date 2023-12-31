<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Produk extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::deleted(function (self $produk) {
            Keranjang::where('produk_id', $produk->id)->delete();
        });
    }

    /**
     * Set table untuk model.
     *
     * @var string
     */
    protected $table = 'produk';

    /**
     * Selalu generate data.
     *
     * @var array
     */
    protected $appends = ['gambar_url'];

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

    /**
     * Dapatkan lokasi folder gambar,
     */
    public function path(): string
    {
        return 'produk/' . $this->id;
    }

    /**
     * Get link image.
     */
    protected function gambarUrl(): Attribute
    {
        return new Attribute(
            get: function () {
                if ($this->gambar) {
                    return Storage::url($this->path() . '/' . $this->gambar);
                }
                return '';
            }
        );
    }
}
