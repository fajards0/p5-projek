<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    //Kolom(field) mana saja yang boleh di isi
    public $fillable = ['nama_kategori'];

    //Kolom(field) mana saja yang boleh di perlihatkan
    public $visible = ['nama_kategori'];
    public $timestamps = true;

    public function Produk()
    {
        return $this->hasMany(Produk::class, 'id_produk');
    }
}
