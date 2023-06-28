<?php

namespace App\Http\Controllers;

use App\Models\UserPeminjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserPeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = UserPeminjam::all();
        return view('user-peminjam.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user-peminjam.create');
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
        UserPeminjam::create($request->all());
        return redirect('/user-peminjam');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserPeminjam  $userPeminjam
     * @return \Illuminate\Http\Response
     */
    public function show(UserPeminjam $userPeminjam, $id)
    {
        //
        $userPeminjam = UserPeminjam::find($id);
        return view('user-peminjam.show', compact('userPeminjam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserPeminjam  $userPeminjam
     * @return \Illuminate\Http\Response
     */
    public function edit(UserPeminjam $userPeminjam)
    {
        //
        $data = $userPeminjam;
        return view('user-peminjam.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserPeminjam  $userPeminjam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserPeminjam $userPeminjam)
    {
        //
        $userPeminjam->update($request->all());
        return redirect('/user-peminjam');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserPeminjam  $userPeminjam
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPeminjam $userPeminjam)
    {
        //
        $userPeminjam->delete();
        return redirect('/user-peminjam');
    }

    public function topBorrowers()
    {
        $users = UserPeminjam::select('user.id', 'user.name', DB::raw('COUNT(peminjaman.id) as peminjaman_books_count'))
            ->leftJoin('peminjaman', 'user.id', '=', 'peminjaman.user_id')
            ->groupBy('user.id', 'user.name')
            ->orderByDesc('peminjaman_books_count')
            ->limit(5)
            ->get();

        return $users;
    }

    public function showTopBorrowers()
    {
        $users = $this->topBorrowers();

        return view('dashboard.index', compact('users'));
    }
}
