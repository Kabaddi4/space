{{--layouts.admin.blade読み込み--}}
@extends('layouts.admin')

{{--admin.bladeの@yield(title)に、値を埋め込む--}}
@section('title', 'myspace')

{{--@yield(content)に埋め込む--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>Make Character</h2>
                <form action="{{ route('admin.space.create') }}" method="post">
                    
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <select name="name" id="chara_name" class="form-select mb-3" aria-label="Default select example">
                        <option selected>Chose Character</option>
                        <option value="travelar" {{ old('name') === 'travelar' ? 'selected' : '' }}>Travelar</option>
                        <option value="Kafka">Kaf</option>
                        <option value="Blade">Chen</option>
                        <option value="Qingque">Ryuson</option>
                    </select>
                    
                    <input type="hidden" name="role" value="{{ old('role') }}">
                    
                    <select name="element" class="form-select" aria-label="Default select example">
                        <option selected>Element</option>
                        <option value="fire">火</option>
                        <option value="ice">氷</option>
                        <option value="elect">雷</option>
                        <option value="wind">風</option>
                        <option value="quantum">量子</option>
                        <option value="imaginary">虚数</option>
                    </select>
                    
                    <div class="form-group row">
                        <label class="col-md-6">Attack</label>
                        <div class="col-md-4">
                            <input type="number" name="attack" class="form-control" value="{{ old('attack') }}" max=9999 mix=0>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-6">Damage Parsent</label>
                        <div class="col-md-4">
                            <input type="number" name="damage_parsent" class="form-control" value="{{ old('damage_parsent') }}" max=200 min=0>%
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-6">Critical rate</label>
                        <div class="col-md-4">
                            <input type="number" name="crit_rate" class="form-control" value="{{ old('crit_rate') }}">%
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-6">Critical damage</label>
                        <div class="col-md-4">
                            <input type="number"  name="crit_damage" class="form-control" value="{{ old('crit_damage') }}" max=300 min=0>%
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2"></label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    @csrf
                    <input type="submit" class="btn btn-primary" value="作成">
                </form>
            </div>
        </div>
    </div>
    
    
@endsection
{{--jsファイル読み込み(asset→public dir)--}}

<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
<script>
    $(document).ready(function(){
        $('#chara_name').change( function() {
            console.log('click');
            // chara_name id が選択された時のイベント
        
        //選択されたnameを取得
        var conf = $(this).val();
        //対応する値の選択
        var roleVal = '';
        //対応した値をswitch文で選択
        switch(conf) {
            case 'travelar':
                roleVal = 'Tanker';
                break;
            case 'Kafka':
               roleVal = 'Maindps';
                break;
            case 'Blade':
               roleVal = 'Maindps';
               break;
            case 'Qingque':
               roleVal = 'Maindps';
               break;
       }
        
        // input type hiddenでroleカラムに値設定
      $('input[name="role"]').val(roleVal);
        });
    });
        // chara_name id が選択された時のイベント
        
        //選択されたnameを取得
        //var conf = $(this).val();
        //対応する値の選択
        //var roleVal = '';
        //対応した値をswitch文で選択
        //switch(conf) {
            //case 'travelar';
                //roleVal = 'Tanker';
                //break;
            //case 'Kafka';
               // roleVal = 'Maindps';
                //break;
            //case 'Blade';
               // roleVal = 'Maindps';
               // break;
          //  case 'Qingque';
               // roleVal = 'Maindps';
              //  break;
       // }
        
        // input type hiddenでroleカラムに値設定
      //  $('input[name="role"]').val(roleVal);
       
</script>