@extends('layouts.main')

@section('title', 'Peminjaman | Edit')
@section('container')
<div class="row">
    <div class="col">
        <div class="card mt-3">
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col-4">
                        <h5 class="card-title text-capitalize">Update Peminjaman</h5>
                    </div>
                </div>
                <form action="{{ route('peminjaman.update', $data->id) }}" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="user_id" class="col-sm-3 col-form-label">User Peminjamn id</label>
                        <div class="col-sm-9">
                            <div class="col-sm-9">
                                <select class="form-select" name="user_id" id="user_id" value="{{ $data->user_id }}">
                                    @foreach ($user as $item)
                                    <option value="{{ $item->id }}" {{ $data->user_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->id }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="book_id" class="col-sm-3 col-form-label">Book Peminjam id</label>
                        <div class="col-sm-9">
                                <div class="col-sm-9">
                                    <select class="form-select" name="book_id" id="book_id" value="{{ $data->book_id }}">
                                        @foreach ($book as $item)
                                        <option value="{{ $item->id }}" {{ $data->book_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->id }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-4 text-end">
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="{{ route('peminjaman.index') }}" type="submit" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection