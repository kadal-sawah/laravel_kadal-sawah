<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Rs extends Model
{
    use HasFactory;
    // use Searchable;

    protected $fillable = ['nama_rs','alamat','email','telepon','user_id'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
