<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use App\Models\Brand;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::latest()->get();
        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        $brand = Brand::all();
        return view('produk.create', compact('kategori', 'brand'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required',

            'harga' => 'required|numeric',
            'gambar' => 'required|max:4000|mimes:png,jpg',
            'deskripsi' => 'required',
            'id_kategori' => 'required',
            'id_brand' => 'required',
        ]);

        $produk = new Produk();
        $produk->nama_produk = $request->nama_produk;
        $produk->harga = $request->harga;
        $produk->deskripsi = $request->deskripsi;
        $produk->id_kategori = $request->id_kategori;
        $produk->id_brand = $request->id_brand;

        // upload foto
        if ($request->hasFile('gambar')) {
            $img = $request->file('gambar');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/produk/', $name);
            $produk->gambar = $name;
        }

        $produk->save();
        return redirect()->route('produk.index')
            ->with('success', 'data berhasil ditambahkan');
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.show', compact('produk'));
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();
        $brand = Brand::all();
        return view('produk.edit', compact('produk', 'kategori', 'brand'));

    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            // 'gambar' => 'required|max:4000|mimes:png,jpg',
            'id_kategori' => 'required',
            'id_brand' => 'required',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->nama_produk = $request->nama_produk;
        $produk->harga = $request->harga;
        $produk->deskripsi = $request->deskripsi;
        $produk->id_kategori = $request->id_kategori;
        $produk->id_brand = $request->id_brand;

        // upload foto
        if ($request->hasFile('gambar')) {
            $produk->deleteImage(); // untuk hapus gambar sebelum diganti gambar baru
            $img = $request->file('gambar');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/produk/', $name);
            $produk->gambar = $name;
        }

        $produk->save();
        return redirect()->route('produk.index')
            ->with('success', 'data berhasil diperbarui');

    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->deleteImage();
        $produk->delete();
        return redirect()->route('produk.index')
            ->with('success', 'data berhasil dihapus');
    }
}
