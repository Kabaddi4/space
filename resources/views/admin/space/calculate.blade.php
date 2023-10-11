@extends('layouts.admin')
@section('title', 'Damage Calculate')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <select name="name" class="form-select mb3" label="form-label">
                    <option select>Select</option>
                    @foreach($lists as $character)
                        <option value="{{ $character->name }}">{{ $character->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="row">
        
        </div>
    </div>
@endsection