@extends('layouts.admin')
@section('title', 'Chara Data Edit')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h3>Chara Edit</h3>
                <form action="{{ route('admin.space.update') }}" method="post" enctype="multipart/form-data">
                    
                </form>
            </div>
        </div>
    </div>