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
    
    public function Blade() {
        //モデルから、bladeという値のnameカラムを
        $blade = Space::where('name', 'blade')->get();
        $blade_attack = $blade->value('attack');
        $blade_damage = $blade->value('damage_parsent') / 100;
        return $blade_attack * $blade_damage;
    }
    
    public function Kafka() {
        $kafka = Space::where('name', 'kafka')->get();
        return $kafka;
    }
    
    
}
