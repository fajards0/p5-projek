@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Data Produk
                        
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <label for="">Nama Produk:</label>
                            <b>{{ $produk->nama_produk }}</b>
                        </div>
                        <div class="mb-2">
                            <img src="{{ asset('images/produk/' . $produk->gambar) }}" alt="" style="width: 200px;">
                        </div>
                        <div class="mb-2">
                            <label for="">Kategori:</label>
                            <b>{{ $produk->kategori->nama_kategori }}</b>
                        </div>
                        <div class="mb-2">
                            <label for="">Brand:</label>
                            <b>{{ $produk->brand->nama_brand }}</b>
                        </div>

                        <div class="mb-2">
                            <label for="">Harga:</label>
                            <p>{{ $produk->harga }}</p>
                        </div>
                        <div class="mb-2">
                            <label for="">Deskripsi:</label>
                            <p>{{ $produk->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
