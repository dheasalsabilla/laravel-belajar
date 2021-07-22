<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table        = 'nilai';
    protected $fillable     = ['makul_id', 'mahasiswa_id', 'nilai'];
    public    $timestamps   = false;

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'makul_id', 'mahasiswa_id', 'id');
    }
}
