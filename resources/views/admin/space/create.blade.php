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
                    <select name="name" class="form-select" aria-label="Default select example">
                        <option selected>Chose Character</option>
                        <option value="travelar" {{ old('name') === 'travelar' ? 'selected' : '' }}>Travelar</option>
                        <option value="Kafka">Kafka</option>
                        <option value="Blade">刃</option>
                        <option value="青雀">青雀</option>
                    </select>
                    
                    <select name="role" class="form-select" aria-label="Default select example">
                        <option selected>Role</option>
                        <option value="Maindps">MainDPS</option>
                        <option value="Subdps">SubDPS</option>
                        <option value="Supporter">Support</option>
                        <option value="Tanker">Tank</option>
                        <option value="Healer">Heal</option>
                    </select>
                    
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
                            <input type="number" name="crit_rate" class="form-control" value="{{ old('crit_rate') }}" max=100 min=0>%
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-6">Critical damage</label>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="crit_damage" value="{{ old('crit_damage') }}" max=300 min=0>%
                        </div>
                    </div>
                    @csrf
                    <input type="submit" class="btn btn-primary" value="作成">
                </form>
            </div>
        </div>
    </div>
@endsection

{{--js--}}