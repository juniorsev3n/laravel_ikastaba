@extends('layouts.app')
@section('title', 'Registrasi Alumni')
@section('content')
<section>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 order-2">
            <div class="p-5">
              <img class="img-fluid rounded-circle" src="https://unsplash.it/500/500?image=836" alt="">
            </div>
          </div>
          <div class="col-md-6 order-1">
            <div class="p-5">
              <div class="container">
                <h1 class="well">Form Registrasi</h1>
                <form action="{{ url('register') }}" method="post" enctype="multipart/form-data">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-10 form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" placeholder="wajib diisi" value="{{ old('nama_lengkap') }}" required>
                            </div>
                        </div>                  
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea colspan="3" name="alamat" rowspan="2" class="form-control" placeholder="wajib diisi">{{ old('alamat') }}</textarea>
                        </div>  
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label>Kota/Kabupaten</label>
                                <input type="text" name="kotakab" class="form-control" placeholder="wajib diisi" value="{{ old('kotakab') }}" required>
                            </div>  
                            <div class="col-sm-4 form-group">
                                <label>Propinsi</label>
                                <input type="text" name="propinsi" class="form-control" placeholder="wajib diisi" value="{{ old('propinsi') }}" required>
                            </div>  
                            <div class="col-sm-4 form-group">
                                <label>Kode Pos</label>
                                <input type="text" name="kodepos" class="form-control" value="{{ old('kodepos') }}" required>
                            </div>      
                        </div>
                        <div class="row">
                            <div class="col-sm-10 form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="wajib diisi" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>      
                            <div class="col-sm-6 form-group">
                                <label>Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>  
                        </div> 
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Telepon</label>
                                <input type="text" name="telepon" class="form-control" value="{{ old('telepon') }}">
                            </div>      
                            <div class="col-sm-6 form-group">
                                <label>No. Handphone</label>
                                <input type="text" name="nohp" class="form-control" value="{{ old('nohp') }}" placeholder="wajib diisi" required>
                            </div>  
                        </div>                          
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="avatar" class="form-control" required>
                        <span>Ukuran maksimal: 512Kb</span>
                    </div>  
                    <div class="form-group">
                        <label>Tahun Masuk/Angkatan</label>
                        <select class="form-control" name="angkatan" required>
                          <option value="">Silahkan Pilih Tahun Angkatan</option>
                          @for($i = 1999; $i< date('Y')+1; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                          @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jurusan</label>
                        <select class="form-control" name="jurusan" required>
                          <option value="">Silahkan Pilih Jurusan</option>
                          @foreach($jurusan as $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class"form-group">
                            <label>Verifikasi</label>
                            {!! captcha_image_html('RegisterCaptcha') !!}
                            <input type="text" id="CaptchaCode" name="CaptchaCode" required>
                    </div>
                    <hr>
                    <div class"form-group">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-md btn-info" value="Submit">
                        <input type="reset" class="btn btn-md btn-danger" name="reset" value="Reset">                   
                    </div>

                    <div class="form-group">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </form> 
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
