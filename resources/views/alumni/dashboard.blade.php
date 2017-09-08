@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
@if(!empty($messages))
<div class="alert alert-info">
  <strong> {{ $messages }}</strong>
</div>
@endif
    <section>
        <div class="container">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/')}}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ url('dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ul>
        </div>
    </section>

    <section>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-lg-8">
                <h1 class="h1">Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="container">
    <div class="row">
        <div class="col-md-4">
            <ul>
                <li>Edit Profile</li>
                <li>Posting berita/pengumuman</li>
                <li>Buat email ikastaba.or.id</li>
                <li>Buat Album</li>
                <li>Upload Galeri</li>
            </ul>
        </div>
        <div class="col-md-8">
            <p>konten</p>
        </div>
    </div>
</div>
    </section>

@endsection
