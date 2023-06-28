<?php

namespace App\Http\Controllers;

use App\Models\BookPeminjam;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookPeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = BookPeminjam::all();
        return view('book-peminjam.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('book-peminjam.create');
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
        BookPeminjam::create($request->all());
        return redirect('/book-peminjam');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookPeminjam  $bookPeminjam
     * @return \Illuminate\Http\Response
     */
    public function show(BookPeminjam $bookPeminjam, $id)
    {
        //
        $bookPeminjam = BookPeminjam::find($id);
        return view('book-peminjam.show', compact('bookPeminjam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookPeminjam  $bookPeminjam
     * @return \Illuminate\Http\Response
     */
    public function edit(BookPeminjam $bookPeminjam)
    {
        //

        $data = $bookPeminjam;
        return view('book-peminjam.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookPeminjam  $bookPeminjam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookPeminjam $bookPeminjam)
    {
        //
        $bookPeminjam->update($request->all());
        return redirect('/book-peminjam');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookPeminjam  $bookPeminjam
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookPeminjam $bookPeminjam)
    {
        //
        $bookPeminjam->delete();
        return redirect('/book-peminjam');
    }
}
