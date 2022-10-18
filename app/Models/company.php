<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;
    protected $fillable = ['id_firma','nip','nazwa'];

    public function lead(){
        return $this->belongsTo(lead::class, 'id_lead','id_lead');
    }
}
