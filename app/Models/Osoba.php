<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Osoba extends Model
{
    use HasFactory;
    protected $fillable = [
        'imie',
        'nazwisko',
        'dział',
        'miejscowość',
        'stanowisko',
        'numer_telefonu',
        'email',
        'id_firma',
    ];
    public function contact(){
        return $this->hasMany(contact::class,'id_osoba','id_osoba');
    }
}
