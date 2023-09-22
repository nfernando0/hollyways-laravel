@extends('template.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h4>Add Fund</h4>
            <form action="{{ route('fund.store') }}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="title" id="title">
                    <label for="title">Title</label>
                  </div>

                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="goals" id="goals">
                    <label for="goals">Goals</label>
                  </div>
                  <div class="form-floating">
                    <textarea class="form-control" name="description" id="description" style="height: 100px"></textarea>
                    <label for="description">Description</label>
                  </div>
                  <button class="btn btn-primary btn-sm w-100" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
