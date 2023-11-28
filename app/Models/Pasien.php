<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = ['nama_pasien','alamat','telepon','id_rs','user_id'];
    protected $table = 'pasien';

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function rs(){
        return $this->belongsTo(Rs::class, 'id_rs');
    }
}
