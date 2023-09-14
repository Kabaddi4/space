<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Space extends Model
{
    use HasFactory;
    //バリデーション
    protected $guard = array('id');
    protected $fillable = ['name', 'role', 'element', 'attack', 'damage_parsent', 'crit_rate', 'crit_damage'];
    
    public static $rules = array(
        'name' => 'required',
        'role' => 'required',
        'element' => 'required',
        'attack' => 'numeric',
        'damage_parsent' => 'numeric',
        'crit_rate' => 'numeric',
        'crit_damage' => 'numeric',
    );
}
