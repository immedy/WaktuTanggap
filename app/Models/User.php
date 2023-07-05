<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guarded =['id'];
    protected $hidden = [
        'password',
        'remember_token',
    ];  
    public function pegawai(): HasOne
    {
        return $this->hasOne(pegawai::class,'id','pegawai_id');
    }

    public function hakakses():BelongsTo
    {
        return $this->belongsTo(hakakses::class,'id','hakakses');
    }
}
