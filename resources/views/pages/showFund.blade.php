@extends('template.index')

@section('content')
    <div class="container mt-5">
        <div class="row">



            <div class="col-lg-7">
                <img src="https://source.unsplash.com/1600x500/?computer" class="card-img-top" alt="...">
            </div>
            <div class="col-lg-5">
                <h1>{{ $fund->title }}</h1>
                <div class="d-flex justify-content-between align-items-center">
                    <p>0</p>
                    <span>Gathered from </span>
                    <p>{{ $fund->goals }}</p>
                </div>
                <div class="progress my-2" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar" style="width: 0%"></div>
                  </div>
                <p>{{ $fund->description }}</p>
                <button type="button" class="btn btn-primary btn-sm w-100" data-bs-toggle="modal" data-bs-target="#btnDonate">Donate Now</button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="btnDonate" tabindex="-1" aria-labelledby="btnDonate" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <form action="{{ route('donate.store', $fund->id) }}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="donate" name="amount" placeholder="name@example.com">
                    <label for="donate">Donate Amount</label>
                  </div>
                <button class="btn btn-primary btn-sm w-100" type="submit">Donate</button>
              </form>
            </div>
          </div>
        </div>
      </div>

@endsection
