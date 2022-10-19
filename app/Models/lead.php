<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lead extends Model
{
    protected $fillable = ['id_firma',];
    use HasFactory;
    public function company(){

        return $this->hasOne(company::class, 'id_firma', 'id_firma');
    }
}
