@extends('template.index')

@section('content')
    <div class="container">
        <div class="row">
            @if (session()->has('pesan'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('pesan') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <div class="col-lg-7">
                <h1 class="my-4">Profile</h1>
                <h4>Username : {{ Auth::user()->username }}</h4>
                <h4>Fullname : {{ Auth::user()->fullname }}</h4>
            </div>
            <div class="col-lg-5">
                <h2 class="my-4">History Donation</h2>
                @foreach ($donateds as $donated)
                <div class="card mt-2">
                    <div class="card-body">
                        <h5 class="card-title">{{ $donated->title }}</h5>
                        <p class="card-text">{{ $donated->description }}</p>
                        <div class="d-flex align-items-center justify-content-between">
                            <p>{{ $donated->amount }}</p>
                                @if ($donated->status === 'paid')
                                    <span class="badge bg-success">Success</span>
                                @else
                                    <button class="btn btn-sm btn-primary" id="pay-button">Donate</button>
                                @endif

                        </div>
                    </div>
                  </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
