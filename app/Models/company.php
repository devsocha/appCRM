<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;
    protected $fillable = ['id_firma','nip','nazwa','ulica','kod_pocztowy','miasto','usługi','partnerstwo'];

    public function lead(){
        return $this->belongsTo(lead::class,'id_firma');
    }
}
