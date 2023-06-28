<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    protected $fillable = ['user_id', 'book_id'];

    public function user_peminjam(){
        return $this->hasOne(UserPeminjam::class, 'id', 'user_id');
    }

    public function book_peminjam(){
        return $this->hasOne(BookPeminjam::class, 'id', 'book_id');
    }
}
