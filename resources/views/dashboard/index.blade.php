@extends('layouts.main')

@section('title', 'Dashboard')
@section('container')
<?php
use App\Models\Peminjaman;
use Carbon\Carbon;
use App\Models\UserPeminjam;
use Illuminate\Support\Facades\DB;


// fungsi menampilkan jumlah data peminjaman bulan ini
$startOfMonth = Carbon::now()->startOfMonth();
$endOfMonth = Carbon::now()->endOfMonth();

$countBulanIni = Peminjaman::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();

// fungsi menampilkan jumlah data peminjaman buku 6 bulan kedepan
$startDate = Carbon::now()->subMonths(6)->startOfMonth();
$endDate = Carbon::now()->endOfMonth();

$countEnamBulan = Peminjaman::selectRaw('DATE_FORMAT(created_at, "%Y-%m") AS month, COUNT(*) AS count')
        ->whereBetween('created_at', [$startDate, $endDate])
        ->groupBy('month')
        ->orderBy('month')
        ->pluck('count', 'month')
        ->all();

    $months = [];
    $counts = [];

    foreach ($countEnamBulan as $month => $countEnamBulans) {
        $months[] = Carbon::createFromFormat('Y-m', $month)->format('F Y');
        $counts[] = $countEnamBulans;
    }


// fungsi menampilakn jumlah 5 user yang meminjam buku paling banyak
    $users = UserPeminjam::select('user.id', 'user.name', DB::raw('COUNT(peminjaman.id) as peminjaman_books_count'))
            ->leftJoin('peminjaman', 'user.id', '=', 'peminjaman.user_id')
            ->groupBy('user.id', 'user.name')
            ->orderByDesc('peminjaman_books_count')
            ->limit(5)
            ->get();
?>

<div class="row mt-4 mx-4">
    <div class="col-6">
      <div class="card">
        <div class="card-header text-light bg-primary">
          <h5 class="card-title">Jumlah buku yang dipinjam bulan ini</h5>
        </div>
        <div class="card-body">
          <h5 class="card-title">{{ $countBulanIni }}</h5>
        </div>
      </div>
    </div>
    <div class="col-6">
      <div class="card">
        <div class="card-header text-light bg-primary">
          <h5 class="card-title">Jumlah buku yang dipinjam selama 6 bulan ini</h5>
        </div>
        <div class="card-body">
          <h5 class="card-text">{{ $countEnamBulans }}</h5>
        </div>
      </div>
    </div>
</div>
    <div class="mt-5">
      <h5>5 User dengan peminjaman buku terbanyak</h5>
    </div>

    <hr>

    <table id="example" class="table table-striped">
        <thead>
            <tr>
                <th scope="col">User ID</th>
                <th scope="col">Name</th>
                <th scope="col">Jumlah peminjaman Buku</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->peminjaman_books_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection