<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;
    protected $fillable = ['id_projekt', 'nazwa', 'opis', 'kwota_netto', 'rodzaj', 'id_osoba'];
    public function leadProject(){
        return $this->belongsTo(leadproject::class,'id_project','id_projekt');
    }
}
