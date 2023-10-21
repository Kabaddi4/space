@extends('layouts.admin')
@section('title', 'Damage Calculate')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <select name="name" class="form-select mb3" id="chara_name" label="form-label">
                    <option select name="name">Select</option>
                    @foreach($lists as $character)
                        <option name="name" value="{{ $character->name }}">{{ $character->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="row">
            <table class="my-5">
                <tr>
                    <th>Attack Damage</th>
                    <th>Skill Damage</th>
                    <th>Ult Damage</th>
                </tr>
                <tr>
                    <td id="Attack_result"></td>
                    <td id="Skill_result"></td>
                    <td id="Ult_result"></td>
                </tr>
            </table>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
<script>
    $(function(){
        //chara_nameが選択された時
        $('#chara_name').change( function() {
            console.log('click');
        //選択された情報を取得
        var Selected = $(this).val();
        //変数作成
        var attackDamage, skillDamage, ultDamage;
        
        if (Selected == 'Seele'){
            attackDamage = {{ intval($result_seele[1]) }}
            skillDamage = {{ intval($result_seele[3]) }}
            ultDamage = {{ intval($result_seele[5]) }}
        } else {
        }
        $('#Attack_result').text(attackDamage);
        $('#Skill_result').text(skillDamage);
        $('#Ult_result').text(ultDamage);
        });
    });
</script>