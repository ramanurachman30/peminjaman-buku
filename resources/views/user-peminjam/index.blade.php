@extends('layouts.main')

@section('title', 'User Peminjam')
@section('container')
<div class="row justify-content-between my-4">
    <div class="col-4">
        <h5 class="card-title">User Peminjam</h5>
    </div>
    <div class="col-4 text-end">
        <a href="{{ route('user-peminjam.create') }}"
            class="btn btn-outline-primary m-b-xs">ADD</a>
    </div>
</div>
<hr>
<table id="example" class="table table-striped">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $d)
        <tr>
          <th scope="row">{{ $d->id }}</th>
          <td>{{ $d->name }}</td>
          <td>
            <div class="d-flex justify-content-end">
                <a href="{{ route('user-peminjam.edit', $d->id) }}"class="btn btn-outline-info me-1"> Edit</a>
                <form action="{{ route('user-peminjam.destroy', $d->id) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" onclick="return confirm('Are you sure?')"
                        class="btn btn-outline-danger m-b-xs">
                        Delete
                    </button>
                </form>
            </div>

        </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection