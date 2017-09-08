@extends('layouts.app')

@section('title', 'Home')

@section('content')
@if(!empty($messages))
<div class="alert alert-info">
  <strong> {{ $messages }}</strong>
</div>
@endif
    <section>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="p-5">
              <img class="img-fluid rounded-circle" src="https://unsplash.it/500/500?image=452" alt="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="p-5">
              <h2 class="display-4">We salute you!</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection
