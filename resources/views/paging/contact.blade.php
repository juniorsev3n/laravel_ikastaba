@extends('layouts.app')

@section('title', 'Kontak')

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
          <li class="breadcrumb-item"><a href="{{ url('kontak')}}">Kontak</a></li>
          <li class="breadcrumb-item active">Kontak</li>
        </ul>
        </div>
    </section>

    <section>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-lg-8">
                <h1 class="h1">
                    Kontak</h1>
            </div>
        </div>
    </div>
    <div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Subject</label>
                            <select id="subject" name="subject" class="form-control" required="required">
                                <option value="na" selected="">Choose One:</option>
                                <option value="service">General Customer Service</option>
                                <option value="suggestions">Suggestions</option>
                                <option value="product">Product Support</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                            Send Message</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <form>
            <legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
            <address>
                <strong>Ikatan Alumni STABA</strong><br>
                Sekretariat: Jl. Padasuka Atas No. 233 Bandung 40192 Telp: <br>
                <abbr title="Phone">
                    P:</abbr>
                (022) 20522845
            </address>
            <address>
                <strong>Administrator</strong><br>
                <a href="mailto:info@ikastaba.or.id">info@ikastaba.or.id</a>
            </address>
            </form>
        </div>
    </div>
</div>
    </section>

@endsection
