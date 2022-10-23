<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    use HasFactory;
    protected $fillable =[
        'id_osoba',
        'id_lead',
    ];
    public function osoba(){
        return $this->belongsTo(Osoba::class,'id_osoba','id_osoba');
    }
    public function lead(){
        return $this->belongsTo(contact::class,'id_lead','id_lead');
    }
}
