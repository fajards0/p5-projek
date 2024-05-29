@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    Selamat Datang @guest @else <strong>{{Auth::user()->name}}</strong> @endguest
                </div>
            </div>
            <div class="row py-4">
                @foreach ($produk as $item)
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('images/produk/'.$item->gambar)}}" class="card-img-top" alt="...">
                    <div align="center" class="card-body" style=" ">
                        <a href="/produk/{{$item->id}}" class="btn btn-sm btn-info">
                            <p class="card-text">{{$item->nama_produk}}</p>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
