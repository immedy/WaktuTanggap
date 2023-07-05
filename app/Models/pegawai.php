<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class pegawai extends Model
{
    use HasFactory;
    public function user():HasOne
    {
        return $this->hasOne(User::class,'pegawai_id','id');
    }
    public function subreferensi():HasOne
    {
        return $this->hasOne(subreferensi::class,'id','ruangan');
    }
    public function scopeFilter($query)
    {
        if (request('caripegawai')){
            $query->where('nip','like',''.request('caripegawai').'')
                    ->orWhere('nama','like','%'.request('caripegawai').'%');
        }
    }
}
