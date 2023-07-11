<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kerusakan extends Model
{
    use HasFactory;
    protected $guarded = ['notiket'];
    protected $primaryKey = 'notiket';
    public function getIncrementing()
    {
        return true;
    }
    public function subreferensi()
    {
        return $this->hasOne(subreferensi::class,'id','ruangan');
    }
    public function pegawai()
    {
        return $this->belongsTo(pegawai::class,'pegawai_id');
    }
    public function getWaktuLaporAttribute()
    {
        return Carbon::parse($this->waktu_pelaporan)->isoFormat('dddd, D MMMM Y, H:mm:ss');
    }
    public function getResponTimeAttribute()
    {
        return Carbon::parse($this->waktu_respon)->isoFormat('dddd, D MMMM Y, H:mm:ss');
    }
}
