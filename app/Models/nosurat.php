<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class nosurat extends Model
{
    use HasFactory;
    protected $table = 'no_surats';
    protected $guarded =['id'];
    public function getSuratTerbitAttribute()
    {
        return Carbon::parse($this->tanggal)->isoFormat('dddd, D MMMM Y');
    }   
}
