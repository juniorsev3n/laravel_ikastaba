@extends('layouts.app')

@section('title', 'Responden Alumni')
@section('head')
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>
@endsection

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
          <li class="breadcrumb-item active">Responden Alumni</li>
        </ul>
        </div>
    </section>
    <section>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-12">
            <div class="p-5">
            <h2> Alumni</h2>
            <!-- Inline CSS based on choices in "Settings" tab -->


            <!-- HTML Form (wrapped in a .bootstrap-iso div) -->
            <div class="bootstrap-iso">
             <div class="container-fluid">
              <div class="row">
               <div class="col-md-6 col-sm-6 col-xs-12">
                <form method="post">
                 <div class="form-group ">
                  <label class="control-label requiredField" for="nameasd">
                   Nama
                   <span class="asteriskField">
                    *
                   </span>
                  </label>
                  <input class="form-control" id="nameasd" name="nameasd" type="text"/>
                 </div>
                 <div class="form-group ">
                  <label class="control-label requiredField" for="tempatlahir">
                   Tempat Lahir
                   <span class="asteriskField">
                    *
                   </span>
                  </label>
                  <input class="form-control" id="tempatlahir" name="tempatlahir" type="text"/>
                 </div>
                 <div class="form-group ">
                  <label class="control-label requiredField" for="date">
                   Tanggal Lahir
                   <span class="asteriskField">
                    *
                   </span>
                  </label>
                  <input class="form-control" id="date" name="date" placeholder="DD/MM/YYYY" type="text"/>
                 </div>
                 <div class="form-group ">
                  <label class="control-label requiredField">
                   Jenis Kelamin
                   <span class="asteriskField">
                    *
                   </span>
                  </label>
                  <div class=" ">
                   <div class="checkbox">
                    <label class="checkbox">
                     <input name="jeniskelamin" type="checkbox" value="Laki-laki"/>
                     Laki-laki
                    </label>
                   </div>
                   <div class="checkbox">
                    <label class="checkbox">
                     <input name="jeniskelamin" type="checkbox" value="Perempuan"/>
                     Perempuan
                    </label>
                   </div>
                  </div>
                 </div>
                 <div class="form-group ">
                  <label class="control-label requiredField">
                   Status Perkawinan
                   <span class="asteriskField">
                    *
                   </span>
                  </label>
                  <div class=" ">
                   <div class="checkbox">
                    <label class="checkbox">
                     <input name="statusperkawinan" type="checkbox" value="Belum Menikah"/>
                     Belum Menikah
                    </label>
                   </div>
                   <div class="checkbox">
                    <label class="checkbox">
                     <input name="statusperkawinan" type="checkbox" value="Menikah"/>
                     Menikah
                    </label>
                   </div>
                   <div class="checkbox">
                    <label class="checkbox">
                     <input name="statusperkawinan" type="checkbox" value="Janda/Duda"/>
                     Janda/Duda
                    </label>
                   </div>
                  </div>
                 </div>
                 <div class="form-group ">
                  <label class="control-label requiredField" for="alamat">
                   Alamat
                   <span class="asteriskField">
                    *
                   </span>
                  </label>
                  <input class="form-control" id="alamat" name="alamat" type="text"/>
                 </div>
                 <div class="form-group ">
                  <label class="control-label requiredField" for="kota">
                   Kota
                   <span class="asteriskField">
                    *
                   </span>
                  </label>
                  <input class="form-control" id="kota" name="kota" type="text"/>
                 </div>
                 <div class="form-group ">
                  <label class="control-label requiredField" for="nohp">
                   No. HP
                   <span class="asteriskField">
                    *
                   </span>
                  </label>
                  <input class="form-control" id="nohp" name="nohp" type="text"/>
                 </div>
                 <div class="form-group ">
                  <label class="control-label requiredField" for="email">
                   Email
                   <span class="asteriskField">
                    *
                   </span>
                  </label>
                  <input class="form-control" id="email" name="email" type="text"/>
                 </div>
                 <div class="form-group ">
                  <label class="control-label requiredField" for="tempatbekerja">
                   Tempat Bekerja
                   <span class="asteriskField">
                    *
                   </span>
                  </label>
                  <input class="form-control" id="tempatbekerja" name="tempatbekerja" type="text"/>
                  <span class="help-block" id="hint_tempatbekerja">
                   Jika Belum Bekerja Isikan "Belum"
                  </span>
                 </div>
                 <div class="form-group ">
                  <label class="control-label requiredField" for="angkatan">
                   Tahun Angkatan
                   <span class="asteriskField">
                    *
                   </span>
                  </label>
                  <input class="form-control" id="angkatan" name="angkatan" placeholder="YYYY" type="text"/>
                 </div>
                 <div class="form-group ">
                  <label class="control-label requiredField" for="tanggallulus">
                   Tanggal Lulus
                   <span class="asteriskField">
                    *
                   </span>
                  </label>
                  <input class="form-control" id="tanggallulus" name="tanggallulus" placeholder="DD/MM/YYYY" type="text"/>
                 </div>
                 <div class="form-group ">
                  <label class="control-label requiredField" for="ipk">
                   Indeks Prestasi Kumulatif
                   <span class="asteriskField">
                    *
                   </span>
                  </label>
                  <select class="select form-control" id="ipk" name="ipk">
                   <option value="Cumlaude; IPK &ge; 3,51, dengan masa studi &le; 4 tahun">
                    Cumlaude; IPK &ge; 3,51, dengan masa studi &le; 4 tahun
                   </option>
                   <option value="Sangat Memuaskan; IPK 3,00 - 3,50, dengan masa studi &ge; 4 tahun">
                    Sangat Memuaskan; IPK 3,00 - 3,50, dengan masa studi &ge; 4 tahun
                   </option>
                   <option value="Memuaskan; IPK 2,75 &le; 3,00">
                    Memuaskan; IPK 2,75 &le; 3,00
                   </option>
                   <option value="Memuaskan; IPK 2,00 &le; 2,75">
                    Memuaskan; IPK 2,00 &le; 2,75
                   </option>
                  </select>
                 </div>
                 <div class="form-group ">
                  <label class="control-label requiredField" for="select1">
                   Berapa % Lulusan STABA di Tempat Anda Bekerja? Mohon Disebutkan Bila Saudara Mengetahui.
                   <span class="asteriskField">
                    *
                   </span>
                  </label>
                  <select class="select form-control" id="select1" name="select1">
                   <option value="0-20%">
                    0-20%
                   </option>
                   <option value="21-40%">
                    21-40%
                   </option>
                   <option value="41-60%">
                    41-60%
                   </option>
                   <option value="61-80%">
                    61-80%
                   </option>
                   <option value="81-100%">
                    81-100%
                   </option>
                  </select>
                 </div>
                 <div class="form-group ">
                  <label class="control-label requiredField">
                   Pengalaman Akademik
                   <span class="asteriskField">
                    *
                   </span>
                  </label>
                  <div class=" ">
                   <div class="checkbox">
                    <label class="checkbox">
                     <input name="checkbox2" type="checkbox" value="Asisten Kuliah"/>
                     Asisten Kuliah
                    </label>
                   </div>
                   <div class="checkbox">
                    <label class="checkbox">
                     <input name="checkbox2" type="checkbox" value="Asisten Praktikum"/>
                     Asisten Praktikum
                    </label>
                   </div>
                   <div class="checkbox">
                    <label class="checkbox">
                     <input name="checkbox2" type="checkbox" value="Membantu Penelitian Dosen"/>
                     Membantu Penelitian Dosen
                    </label>
                   </div>
                   <div class="checkbox">
                    <label class="checkbox">
                     <input name="checkbox2" type="checkbox" value="Penelitian Mandiri (lomba Penelitian Ilmiah Mahasiswa)"/>
                     Penelitian Mandiri (lomba Penelitian Ilmiah Mahasiswa)
                    </label>
                   </div>
                   <div class="checkbox">
                    <label class="checkbox">
                     <input name="checkbox2" type="checkbox" value="Publikasi Ilmiah"/>
                     Publikasi Ilmiah
                    </label>
                   </div>
                   <div class="checkbox">
                    <label class="checkbox">
                     <input name="checkbox2" type="checkbox" value="Lainnya, Sebutkan..."/>
                     Lainnya, Sebutkan...
                    </label>
                   </div>
                  </div>
                 </div>
                 <div class="form-group ">
                  <label class="control-label requiredField">
                   Aktivitas Kemahasiswaan
                   <span class="asteriskField">
                    *
                   </span>
                  </label>
                  <div class=" ">
                   <div class="checkbox">
                    <label class="checkbox">
                     <input name="checkbox3" type="checkbox" value="Menjadi Pengurus Unit Aktivitas Mahasiswa di Tingkat Universitas"/>
                     Menjadi Pengurus Unit Aktivitas Mahasiswa di Tingkat Universitas
                    </label>
                   </div>
                   <div class="checkbox">
                    <label class="checkbox">
                     <input name="checkbox3" type="checkbox" value="Menjadi Pengurus Organisasi Masyarakat di Luar Kampus"/>
                     Menjadi Pengurus Organisasi Masyarakat di Luar Kampus
                    </label>
                   </div>
                   <div class="checkbox">
                    <label class="checkbox">
                     <input name="checkbox3" type="checkbox" value="Tidak Menjadi Aktivis"/>
                     Tidak Menjadi Aktivis
                    </label>
                   </div>
                  </div>
                 </div>
                 <div class="form-group">
                  <div>
                   <button class="btn btn-primary " name="submit" type="submit">
                    Submit
                   </button>
                  </div>
                 </div>
                </form>
               </div>
              </div>
             </div>
            </div>
            <hr>
            </div>

          </div>
        </div>
      </div>
    </section>

@endsection
