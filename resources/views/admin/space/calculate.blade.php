@extends('layouts.admin')
@section('title', 'Damage Calculate')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($lists as $character)
                <option value="{{ $character->name }}"></option>
            @endforeach
        </div>
    </div>
@endsection