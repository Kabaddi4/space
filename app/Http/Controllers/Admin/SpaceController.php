<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//モデルを追加
use App\Models\Space;

class SpaceController extends Controller
{
    //追加機能
    public function add()
    {
        return view('admin.space.create');
    }
    public function create(Request $request)
    {
        //バリデーション、うけとった$requestを、$rulesの制限に掛ける？
        $this->validate($request, Space::$rules);

        $chara = new Space;
        $form = $request->all();
        
        
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
        
        //dd($form);
        //保存
        $chara->fill($form);
        //dd($chara);
        $chara->save();
        
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
        $skills = Space::find(1)->skills;
        foreach ($skills as $skill) {
            dd($skill->skill);
        }
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
    
    //@php
}
