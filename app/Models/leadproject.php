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
        'id_firma_partner',
        ];
    public function lead(){
        return $this->belongsTo(lead::class,'id_lead','id_lead');
    }
    public function project(){
        return $this->hasOne(project::class,'id_projekt','id_project');
    }
}
