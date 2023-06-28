@extends('layouts.main')

@section('title', 'Peminjaman | Create')
@section('container')
<div class="row">
    <div class="col">
        <div class="card mt-3">
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col-4">
                        <h5 class="card-title text-capitalize">Create Peminjaman</h5>
                    </div>
                </div>
                <form action="{{ route('peminjaman.store') }}" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="user_id" class="col-sm-2 col-form-label">User Peminjam</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="user_id" aria-label="Default select example">
                                <option selected>Choose Your User</option>
                                @foreach ($user as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="book_id" class="col-sm-2 col-form-label">Book Peminjam</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="book_id" aria-label="Default select example">
                                <option selected>Choose Your Book</option>
                                @foreach ($book as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-4 text-end">
                            <button type="submit" class="btn btn-success">Create</button>
                            <a href="{{ route('peminjaman.index') }}" type="submit" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection