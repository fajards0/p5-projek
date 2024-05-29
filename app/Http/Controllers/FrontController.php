<?php

namespace App\Http\Controllers;
use App\Models\Produk;

class FrontController extends Controller
{
    // menampilkan semua data produk
    public function produk()
    {
        $produk = Produk::latest()->get();
        return view('welcome', compact('produk'));
    }

    public function detailProduk($id)
    {
        $produk = Produk::findOrFail($id);
        return view('detail_produk', compact('produk'));
    }
}
