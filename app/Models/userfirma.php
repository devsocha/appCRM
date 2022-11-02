<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userfirma extends Model
{
    use HasFactory;
    protected $fillable =[
        'id_firma',
        'id_osoba',
        'rola',
    ];

    public function user(){
        return $this->belongsTo(User::class,'id');
    }
}
