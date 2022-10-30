<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leadproject extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_lead',
        'id_project',
        ];
    public function project(){
        return $this->hasOne(project::class,'id_projekt');
    }
}
