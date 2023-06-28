<?php

namespace App\Http\Controllers;

use App\Models\BookPeminjam;
use App\Models\Peminjaman;
use App\Models\UserPeminjam;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Peminjaman::with('user_peminjam', 'book_peminjam')->get();

        return view('peminjaman.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = UserPeminjam::all();
        $book = BookPeminjam::all();
        return view('peminjaman.create', compact('user', 'book'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Peminjaman::create($request->all());
        return redirect('/peminjaman');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjaman $peminjaman, $id)
    {
        //
        $peminjaman = Peminjaman::find($id);
        return view('peminjaman.show', compact('peminjaman'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
        $user = UserPeminjam::all();
        $book = BookPeminjam::all();
        $data = $peminjaman;
        return view('peminjaman.edit', compact('user', 'book', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        //
        $peminjaman->update($request->all());
        return redirect('/peminjaman');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //
        $peminjaman->delete();
        return redirect('/peminjaman');
    }

    public function booksBorrowedThisMonth()
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $count = Peminjaman::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();

        return $count;
    }

    public function showBooksBorrowedThisMonth()
    {
        $count = $this->booksBorrowedThisMonth();

        return view('peminjaman.index', compact('count'));
    }
}
