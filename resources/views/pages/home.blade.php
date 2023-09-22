@extends('template.index')

@section('content')
<div class="home">
    <div class="container">
        <div class="row">
            @if (session()->has('pesan'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('pesan') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <div class="col-lg-7">

                <h1>While you are still standing, try to reach out to the people who are falling.</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                <button class="btn-donate">Donate Now</button>
            </div>
            <div class="col-lg-4">
                <img src="/images/gambar-1.png" class="gambar-1" alt="">
            </div>
        </div>
    </div>
</div>
<div class="home-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <img src="/images/gambar-2.png" class="gambar-2" alt="">
            </div>
            <div class="col-lg-7">
                <h1>Your donation is very helpful for people affected by forest fires in Kalimantan.</h1>
                <div class="d-flex">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                </p>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="donate">
    <h1>Donate Now</h1>
    <div class="container">
        <div class="row">
            @if ($funds->count() > 0)
            @foreach ($funds as $fund)
            <div class="col-lg-4">
                <div class="card mt-3" style="width: 18rem;">
                    <img src="https://source.unsplash.com/1600x500/?computer" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{ $fund->title }}</h5>
                      <p class="card-text">{{ $fund->description }}</p>
                      <div class="progress my-2" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar" style="width: 0%"></div>
                      </div>
                      <div class="d-flex justify-content-between align-items-center">
                        <span>{{ $fund->goals }}</span>
                        <a href="/fund/{{ $fund->id }}" class="btn btn-primary btn-sm">Donate</a>
                      </div>
                    </div>
                  </div>
            </div>
            @endforeach
            @else
            <h4 class="text-center">Not Found</h4>
            @endif
        </div>
    </div>
</div>
@endsection
