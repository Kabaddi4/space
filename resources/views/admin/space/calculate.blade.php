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
        
        <div class="row mx-auto my-4">
            <table class="table table-stripd">
                <tr>
                    <th></th>
                    <th>Nomal</th>
                    <th>Critical</th>
                </tr>
                <tr>
                    <td>Attack</td>
                    <td id="NomalAttack_result"></td>
                    <td id="CritAttack_result"></td>
                </tr>
                <tr>
                    <td>Skill</td>
                    <td id="NomalSkill_result"></td>
                    <td id="CritSkill_result"></td>
                </tr>
                <tr>
                    <td>Ult</td>
                    <td id="NomalUlt_result"></td>
                    <td id="CritUlt_result"></td>
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
        var NomalAttackDamage,CritAttackDamage, NomalSkillDamage, CritSkillDamage, NomalUltDamage, CritUltDamage;
        
        if (Selected == 'Seele'){
            NomalAttackDamage = {{ intval($result_seele[0]) }}
            CritAttackDamage = {{ intval($result_seele[1]) }}
            NomalSkillDamage = {{ intval($result_seele[2]) }}
            CritSkillDamage = {{ intval($result_seele[3]) }}
            NomalUltDamage = {{ intval($result_seele[4]) }}
            CritUltDamage = {{ intval($result_seele[5]) }}
        } else if(Selected == 'Kafka') {
            attackDamage = {{ intval($result_kafka[1]) }}
            skillDamage = {{ intval($result_kafka[3]) }}
            ultDamage = {{ intval($result_kafka[5]) }}
        }
        
        $('#NomalAttack_result').text(NomalAttackDamage);
        $('#CritAttack_result').text(CritAttackDamage)
        $('#NomalSkill_result').text(NomalSkillDamage);
        $('#CritSkill_result').text(CritSkillDamage);
        $('#NomalUlt_result').text(NomalUltDamage);
        $('#CritUlt_result').text(CritUltDamage);
        });
    });
</script>