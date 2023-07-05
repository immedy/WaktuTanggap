<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class subreferensi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded =['id'];
    public function referensi():BelongsTo
    {
        return $this->belongsTo(referensi::class);
    }
}
