<!-- menggunakan kerangka dari halaman master.blade.php -->
@extends('master')

<!-- membuat komponen title sebagai judul halaman -->
@section('title', 'Artikel Pemerograman')

<!-- membuat header dan tombol tambah artikel di atas -->
@section('header')
<center>
    <h2 style="font-family: 'Marck Script', cursive;">Artikel Pemerograman</h2>
    <a href="/add"><button class="btn btn-success">Tambah Artikel</button></a>
</center>
@endsection

<!-- membuat komponen main yang berisi form untuk mengisi judul dan isi artikel -->
@section('main')
@foreach ($articles as $article)
<div class="col-md-4 col-sm-12 mt-4">
    <div class="card">
       <img src="{{asset('390179455-removebg-preview.png')}}" style="margin-left: auto;margin-right: auto; margin-top: auto;margin-bottom: auto;width:100px;" class="card-img-top" alt="gambar"> 
        <div class="card-body">
            <h5 class="card-title">{{ $article->judul }}</h5>
            <a href="/detail/{{ $article->id }}" class="btn btn-primary">Baca Artikel</a>
        </div>
    </div>
</div>
@endforeach
@endsection