@extends('layouts.admin')
@section('title', 'Chara Details')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h2 class="title_test">Character Detail</h2>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto p-3">
                <h6 class="display-6">{{ $chara_detail->name }}</h6>
                {{ $chara_detail->image_path}}
            </div>
        </div>

        <div class="row ">
            <table class="mx-auto">
                <tr class="p-2">
                        {{-- {->element}部分だけ書いて、色を変える。--}}
                    <td class="p-2">Elements avaliable
                    <p id="color_element">{{ $chara_detail->element }}</p></td>
                </tr>
                <tr class="p-2">
                    <td class="p-2">Role Position: {{ $chara_detail->role }}</td>
                </tr>
            </table>
        </div>
        
        <div class="row">
            <table class="mx-auto">
                <tr>
                    <th>Attack</th>
                    <th>Damage Parsent</th>
                    <th>Crit Rate</th>
                    <th>Crit Damage</th>
                </tr>
                <tr>
                    <td>{{ $chara_detail->attack }}</td>
                    <td>{{ $chara_detail->damage_parsent }}%</td>
                    <td>{{ $chara_detail->crit_rate }}%</td>
                    <td>{{ $chara_detail->crit_damage }}%</td>
                </tr>
            </table>
        </div>
        
        <div class="row">
            <div class="col-md-6 mx-auto">
                <a href="{{ route('admin.space.edit', ['id' => $chara_detail]) }}" class="btn btn-outline-success">Status Edit</a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mx-auto">
                
            </div>
        </div>
        {{-- dd($chara_detail)  --}}
    </div>
@endsection


<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
<script>
    $(function() {
        //IDから、text要素取得
        var colorText = $('#color_element').text();
        
        //動く
        switch(colorText) {
            case 'Fire':
                $('#color_element').addClass('firetype');
                break;
            case 'Wind':
                $('#color_element').addClass('windtype');
                break;
        }
    });
</script>
{{--・elementの要素を取得し、値に応じて色を変えるシステムを作ろうとしている--}}


{{--@php --}}
