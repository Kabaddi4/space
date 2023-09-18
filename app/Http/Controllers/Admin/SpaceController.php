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
        
        //保存
        $chara->fill($form);
        $chara->save();
        
        return redirect('admin/space/create');
    }
    
    public function index(Request $request)
    {
        $lists = Space::all();
        
        return view('admin.space.index', ['lists' => $lists]);
    }
    
    public function show($id)
    {
        //モデルからデータ取得
        $chara_detail = Space::find($id);
        
        return view('admin.space.show', ['chara_detail' => $chara_detail]);
    }
    
    public function edit(Request $request)
    {   
        //モデルからIDに対応するデータ取得
        $chara_edit = Space::find($request->id);
        if (empty($chara_edit)) {
            abort(404);
        }
        return view('admin.space.edit', ['chara_form' => $chara_edit]);
    }
    
    public function update(Request $request)
    {
        //バリデーション実装
        $this->validate($request, Space::$rules);
        //Space Model
        $chara_edit = Space::find($request->id);
        //送信されたフォームデータの格納
        $chara_form = $request->all();
        unset($chara_form['_token']);
        
        //上書きして保存
        $chara_edit->fill($chara_form)->save();
        
        return redirect('admin/space');
    }
}
