<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lead extends Model
{

    use HasFactory;
    protected $fillable = ['id_firma','id_firma_partner'];
    public function company(){

        return $this->hasOne(company::class, 'id_firma', 'id_firma');
    }
    public function contact(){
        return $this->hasOne(contact::class,'id_lead','id_lead');
    }
}
