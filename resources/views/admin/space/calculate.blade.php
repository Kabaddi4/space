@extends('layouts.admin')
@section('title', 'Damage Calculate')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <select name="name" class="form-select mb3" id="chara_name" label="form-label">
                    <option select name="name">Select</option>
                    @foreach($lists as $character)
                        <option name="name" value="{{ $character->id }}">{{ $character->name }}</option>
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

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function(){
        $('#chara_name').change(function(){
           
        {{--ID取得--}}
        var id = $(this).val();
         console.log(id);
        $.ajax({
            {{--Route名--}}
            url: "result",
            method: "POST",
            {{--data: key:var id--}}
            data: { id : id },
            dataType: "json",
        }).done(function(res){
            $('#NomalAttack_result').append(res.normal_attack);
            $('#CritAttack_result').append(res.skill);
            $('#NomalSkill_result').append(res.ult);
        }).fail(function(){
            alert('Result get Failed');
        });
    });
});
</script>