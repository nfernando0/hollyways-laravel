@extends('template.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="d-flex justify-content-between align-items-center">
            <h2>My Fund</h2>
        <a href="/fund/create" class="btn btn-primary">Add Fund</a>
        </div>
        @foreach ($funds as $fund)
        <div class="col-lg-4">
            <div class="card mt-3">
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
    </div>
</div>
@endsection
