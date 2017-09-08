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
            <div class="col-md-12">
                <div class="card-deck">
                    <div class="card">
                        <img class="card-img-top" src="https://unsplash.it/350/350" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                        <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
                <div class="card">
                    <img class="card-img-top" src="https://unsplash.it/350/359" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
                <div class="card">
                <img class="card-img-top" src="https://unsplash.it/350/350" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
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
                    <h2 class="display-4">For those about to rock...</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
                </div>
            </div>
        </div>
    </div>
</section>

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

    <section>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 order-2">
            <div class="p-5">
              <img class="img-fluid rounded-circle" src="https://unsplash.it/500/500?image=453" alt="">
            </div>
          </div>
          <div class="col-md-6 order-1">
            <div class="p-5">
              <h2 class="display-4">Let there be rock!</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
