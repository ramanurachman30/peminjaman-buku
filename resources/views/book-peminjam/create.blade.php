@extends('layouts.main')

@section('title', 'Book Peminjam | Create')
@section('container')
<div class="row">
    <div class="col">
        <div class="card mt-3">
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col-4">
                        <h5 class="card-title text-capitalize">Create Book Peminjam</h5>
                    </div>
                </div>
                <form action="{{ route('book-peminjam.store') }}" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-4 text-end">
                            <button type="submit" class="btn btn-success">Create</button>
                            <a href="{{ route('book-peminjam.index') }}" type="submit" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection