<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    
    protected $guard = array('id');
    protected $fillable = ['normal_attack', 'skill', 'ult'];
    
    public function chara(){
        return $this->belongsTo('App\Models\Space');
    }
}
