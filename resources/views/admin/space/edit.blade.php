@extends('layouts.admin')
@section('title', 'Chara Data Edit')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h3>Chara Edit</h3>
                <form action="{{ route('admin.space.update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
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
                </form>
            </div>
        </div>
    </div>