@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Edit Produk
                        <a href="{{ route('produk.index') }}" class="btn btn-sm btn-primary" style="float: right">Kembali</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('produk.update', $produk->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col">
                                    <div class="mb-2">
                                        <label for="nama_produk">Nama Produk</label>
                                        <input type="text" class="form-control @error('nama_produk') is-invalid @enderror"
                                            name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}">
                                        @error('nama_produk')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="harga">Harga</label>
                                <input type="number" class="form-control @error('harga') is-invalid @enderror"
                                    name="harga" value="{{ old('harga', $produk->harga) }}">
                                @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-2">

                                <label for="gambar">gambar</label>
                                @if ($produk->gambar)
                                    <p><img src="{{ asset('images/produk/' . $produk->gambar) }}" alt="gambar" width="100px">
                                    </p>
                                @endif
                                <input type="file" name="gambar"
                                    class="form-control @error('gambar') is-invalid @enderror">
                                @error('gambar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="mb-2">
                                <label for="deskripsi">Deskripsi</label>
                                <input type="text" class="form-control @error('deskripsi') is-invalid @enderror"
                                    name="deskripsi" value="{{ old('deskripsi', $produk->deskripsi) }}">
                                @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="id_kategori">Kategori</label>
                                <select name="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($kategori as $data)
                                        <option value="{{ $data->id }}"
                                            {{ $data->id == $produk->id_kategori ? 'selected' : '' }}>
                                            {{ $data->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                @error('id_kategori')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="id_brand">Brand</label>
                                <select name="id_brand" class="form-control @error('id_brand') is-invalid @enderror">
                                    <option value="">Pilih brand</option>
                                    @foreach ($brand as $data)
                                        <option value="{{ $data->id }}"
                                            {{ $data->id == $produk->id_brand ? 'selected' : '' }}>
                                            {{ $data->nama_brand }}</option>
                                    @endforeach
                                </select>
                                @error('id_brand')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <button class="btn btn-sm btn-success" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
