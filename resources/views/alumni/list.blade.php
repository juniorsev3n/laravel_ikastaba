@extends('layouts.app')

@section('title', 'Direktori Alumni')

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
          <li class="breadcrumb-item"><a href="{{ url('alumni')}}">Alumni</a></li>
          <li class="breadcrumb-item active">Direktori Alumni</li>
        </ul>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="col-md-12">
                <div class="form-group">
                <form action="{{ url('alumni/direktori') }}" method="get" class="form-group">
                <h2>Pencarian Alumni</h2>
                <hr>
                <div class="row">
                <div class="col-md-6">
                <input class="form-control" type="text" class="form-inline" name="q" value="{{ old('q') }}" placeholder="masukan nama" required>
                </div>
                <div class="col-md-4">
                <input type="submit" class="btn btn-primary" value="Search">
                </div>
                </div>
                </form>
                </div>
              </div>
        </div>
    </section>
    <section>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-12">
            <div class="p-5">
            <h2>Direktori Alumni</h2>
            <hr>
              @foreach($list as $value)
              <div class="row">
              <div class="col-md-2">
              <a href="{{ url('alumni/') }}"><span class="fa fa-list"></span></a>
              </div>
              <div class="col-md-6">
                <h4>{{ $value->nama_lengkap }}</h4>
                <h5>Angkatan : {{ $value->angkatan }}</h5>
                <h5>Jurusan : {{ $value->name }}</h5>
              </div>
              <div class="col-md-4"><img src="{{ url('avatar/'.$value->avatar) }}" class="img-fluid rounded-circle" width="200"></div>
              </div>
              <hr>
              @endforeach
              <div class="row">
              {{ $list->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection
