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
        
        $nomalhit = $kafka_attack *$kafka_damage;
        $crithit = $kafka_attack * $kafka_damage * $kafka_crit;
        
        $kafka_dot = $kafka_attack * 2.9;
        $skill_nomal = $nomalhit * 1.6;
        $skill_crit = $crithit * 1.6;
        $skill_dot = $kafka_dot * 0.75;
        $ult_nomal = $nomalhit * 0.8;
        $ult_crit = $crithit * 0.8;
        $passive_nomal = $nomalhit * 1.4;
        $passive_crit = $crithit * 1.4;
        
        return [$nomalhit, $crithit, $skill_nomal, $skill_crit, $ult_nomal, $ult_crit, $kafka_dot, $skill_dot, $passive_nomal, $passive_crit];
    }
    
    public function Seele() {
        $seele = Space::where('name', 'Seele')->get();
        $seele_attack = $seele->value('attack');
        $seele_damage = $seele->value('damage_parsent') / 100;
        $seele_crit = $seele->value('crit_damage') / 100 + 1;
        
        $nomalhit = $seele_attack * $seele_damage;
        $crithit = $seele_nomalhit * $seele_crit;
        $passive = 1.8;
        
        $skill_nomal = $nomalhit * 2.2;
        $skil_crit = $crithit * 2.2;
        $ult_nomal = ($nomalhit + $passive) * 4.25;
        $ult_crit = ($crithit + $passive) * 4.25;
        return [$nomalhit, $crithit, $skill_nomal, $skil_crit, $ult_nomal, $ult_crit];
    }
    
    public function ImbibitorLunae() {
        $lunae = Space::where('name', 'Imbibitor Lunae')->get();
        $lunae_attack = $lunae->value('attack');
        $lunae_damage = $lunae->value('damage_parsent') / 100;
        $lunae_crit = $lunae->value('crit_damage') / 100 + 1;
        
        $nomalhit = $lunae_attack * $lunae_damage;
        $crithit = $lunae_nomalhit * $lunae_crit;
        
        $attack1_nomal = $nomalhit * 2.6;
        $attack1_crit = $crithit * 2.6;
        $attack2_nomal = $nomalhit * 3.8;
        $attack2_crit = $crithit * 3.8;
        $attack3_nomal = $nomalhit * 5;
        $attack3_crit = $crithit * 5;
        $ult_nomal = $nomalhit * 3;
        $ult_crit = $crithit * 3;
        return[$nomalhit, $crithit, $attack1_nomal, $attack1_crit, $attack2_nomal, $attack2_crit, $attack3_nomal, $attack3_crit, $ult_nomal, $ult_crit];
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
