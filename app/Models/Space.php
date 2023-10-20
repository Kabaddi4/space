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
        //モデルから、bladeという値のnameカラムを取得
        $blade = Space::where('name', 'Blade')->get();
        $blade_attack = $blade->value('attack');
        $blade_damage = $blade->value('damage_parsent') / 100;
        $blade_crit = $blade->value('crit_damage') / 100 + 1;
        
        $blade_nomalhit = $blade_attack * $blade_damage;
        $blade_crithit = $blade_nomalhit * $blade_crit;
    }
    
    public function Kafka() {
        $kafka = Space::where('name', 'Kafka')->get();
        $kafka_attack = $kafka->value('attack');
        $kafka_damage = $kafka->value('damage_parsent') / 100;
        $kafka_crit = $kafka->value('crit_damage') / 100 + 1;
        
        $kafka_dot = $kafka_attack * 2.9;
        return $kafka_dot;
    }
    
    public function Seele() {
        $seele = Space::where('name', 'Seele')->get();
        $seele_attack = $seele->value('attack');
        $seele_damage = $seele->value('damage_parsent') / 100;
        $seele_crit = $seele->value('crit_damage') / 100 + 1;
        
        $seele_nomalhit = $seele_attack * $seele_damage;
        $seele_crithit = $seele_nomalhit * $seele_crit;
        return [$seele_nomalhit, $seele_crithit];
    }
    
    public function ImbibitorLunae() {
        $lunae = Space::where('name', 'Imbibitor Lunae')->get();
        $lunae_attack = $lunae->value('attack');
        $lunae_damage = $lunae->value('damage_parsent') / 100;
        $lunae_crit = $lunae->value('crit_damage') / 100 + 1;
        
        $lunae_nomalhit = $lunae_attack * $lunae_damage;
        $lunae_crithit = $lunae_nomalhit * $lunae_crit;
    }
    
    public function Jingliu() {
        $jingliu = Space::where('name', 'Jingliu')->get();
        $jingliu_attack = $jingliu->value('attack');
        $jingliu_damage = $jingliu->value('damage_parsent') / 100;
        $jingliu_crit = $jingliu->value('crit_damage') / 100 + 1;
        
        $jingliu_nomalhit = $jingliu_attack * $jingliu_damage;
        $jingliu_crithit = $jingliu_nomalhit * $jingliu_crit;
    }
    
}
