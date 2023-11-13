<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//モデルを追加
use App\Models\Space;
use App\Models\Skill;

class SpaceController extends Controller
{
    //追加機能
    public function add()
    {   
        //$relation = Space::find(id);
        return view('admin.space.create');
    }
    public function create(Request $request)
    {
        //dd('ok');
        //dd($request);
        //バリデーション、うけとった$requestを、$rulesの制限に掛ける？
        $this->validate($request, Space::$rules);

        $chara = new Space;
        $form = $request->only(['name', 'role', 'element', 'attack', 'damage_parsent', 'crit_rate', 'crit_damage']);
        //dd($form);
        //フォームから画像が送られる場合、保存
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $chara->image_path = basename($path);
        } else {
            $chara->image_path = null;
        }
        
        //フォームから送信された_tokenとimageを削除
        unset($form['_token']);
        unset($form['image']);
        //Skillのインスタンス
        $skill = new Skill;
        $skill_form = $request->only(['normal_attack', 'skill', 'ult',]);
        
        //dd($skill);
        //保存
        $chara->fill($form);
        //dd($chara);
        
        //error解決の為、順番を逆に
        $chara->save();
        //$skill_form['space_id'] = $chara->id;
        $skill->fill($skill_form);
        $skill->space_id = $chara->id;
        //dd($skill_form);
        $skill->save();
    
        return redirect('admin/space');
    }
    
    public function index(Request $request)
    {
        //検索機能
        $cond_name = $request->cond_name;
        if ($cond_name != '') {
            //結果を取得
            $lists = Space::where('name', $cond_name)->get();
        } else {
            $lists = Space::all();
        }
        return view('admin.space.index', ['lists' => $lists, 'cond_name' => $cond_name]);
    }
    
    public function show(Request $request)
    {
        //モデルからデータ取得
        $chara_detail = Space::find($request->id);
        $skills = $chara_detail->skills;
        //dd($skills);
        return view('admin.space.show', ['chara_detail' => $chara_detail]);
    }
    
    public function edit(Request $request)
    {   
        //モデルからIDに対応するデータ取得
        $chara_detail = Space::find($request->id);
        if (empty($chara_detail)) {
            abort(404);
        }
        return view('admin.space.edit', ['state_form' => $chara_detail]);
    }
    
    public function update(Request $request)
    {
       //バリデーションを適用させないカラム設定
        $exclide_validate = ['name', 'element', 'role'];
        foreach ($exclide_validate as $colum){
            unset(Space::$rules[$colum]);
        }
         //バリデーション実装
        $this->validate($request, Space::$rules);
        //IDを取得
        $chara_detail = Space::find($request->id);
        //フォームデータの格納
        $state_form = $request->only(['attack', 'damage_parsent', 'crit_rate', 'crit_damage',]);
        
        if ($request->remove == 'true') {
            $state_form['image_path'] = null;
        } else if($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $state_form['image_path'] = basename($path);
        } else {
            $state_form['image_path'] = $chara_detail->image_path;
        }
        
        unset($state_form['image']);
        unset($state_form['remove']);
        unset($state_form['_token']);
        
        //上書きして保存
        $chara_detail->fill($state_form)->save();
        
        return redirect('admin/space');
    }
    
    public function delete(Request $request)
    {
        $chara_detail = Space::find($request->id);
        //deleteメソッド
        $chara_detail->delete();
        
        return redirect('admin/space/');
    }
    
    public function calculate(Request $request) {
        $lists = Space::all();
        //name毎のリクエスト
        $chara_name = $request->input('name');
        //インスタンス
        $caluclate = new Space;
        //method呼び出し
        $result_seele = $caluclate->Seele();
        $result_kafka = $caluclate->Kafka();
        $result_lunae = $caluclate->ImbibitorLunae();
        $result_jingliu = $caluclate->Jingliu();
        //dd($result_seele);
        //$blade_skill = $caluclate_blade * 1.5; 成功
        //$caluclate_kafka = $caluclate_1->Kafka();　成功
        
        //$attack = $status->attack;
        return view('admin.space.calculate', ['lists' => $lists, 'result_seele' => $result_seele, 'result_kafka'=> $result_kafka, 'result_lunae' => $result_lunae, 'result_jingliu' => $result_jingliu]);
    }
    
    public function result(){
        //値取得
        $id = request()->get('id');
        //SpaceModel
        $space = Space::find($id);
        //Skill Model
        $relation = $space->skill;
        
        $normal_hit = $space->attack * ($space->damage_parsent / 100);
        $crit_hit = $normal_hit * (1 + $space->crit_damage / 100);
        //基礎計算
        $attack_normal = $normal_hit * ($relation->normal_attack / 100);
        $attack_crit = $crit_hit * ($relation->normal_attack /100);
        $skill_normal = $normal_hit * ($relation->skill / 100);
        $skill_crit = $crit_hit * ($relation->skill / 100);
        $ult_normal = $normal_hit * ($relation->ult / 100);
        $ult_crit = $crit_hit * ($relation->ult / 100);
        //個別の計算 (これを、hiddenで対応できるようにしたい)
        $kafka_dot = $space->attack * 2.9;
        $lunae_attack_single = $crit_hit * 5;
        $lunae_attack_aoe = $crit_hit * 1.8;
        $jingliu_skill_single = $crit_hit * 2.5;
        $jingliu_skill_aoe = $crit_hit * 1.25;
        
        //json形式で res に返す。
        return response()->json([
            'name' => $space->name,
            'attack_normal' => $attack_normal,
            'attack_crit' => $attack_crit,
            'skill_normal' => $skill_normal,
            'skill_crit' => $skill_crit,
            'ult_normal' => $ult_normal,
            'ult_crit' => $ult_crit,
            'kafka_dot' => $kafka_dot,
            'lunae_attack_single' => $lunae_attack_single,
            'lunae_attack_aoe' => $lunae_attack_aoe,
            'jingliu_skill_single' => $jingliu_skill_single,
            'jingliu_skill_aoe' => $jingliu_skill_aoe,
            ]);
        //relationで取得した$relationから、対応した$space_idの値を取得できる。
        //例だとskill2は成功。
    }
    //@php
}
