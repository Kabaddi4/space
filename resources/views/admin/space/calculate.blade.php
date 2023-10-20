@extends('layouts.admin')
@section('title', 'Damage Calculate')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <select name="name" class="form-select mb3" label="form-label">
                    <option select name="name" id="chara_name">Select</option>
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
                    <td>result:{{ $result_seele[0] }}</td>
                    <td>(Attack * Damage parsent) * 1.7</td>
                    <td></td>
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
        var num = $(this).val();
        
        var attackVal = '';
        var skillVal = '';
        var ultVal = '';
        
        switch(num){
            case 'Travelar':
                attackVal = 0.8;
                skillVal = 2.1;
                ultVal = 2.3;
                break;
            case 'Kafka':
                attackVal = 1.2;
                skillVal = 2.9;
                ultVal = 3.1;
                break;
        }
        });
    });
</script>