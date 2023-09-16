@extends('layouts.admin')
@section('title', 'Top Page');

@section('content')
    <div class="container">
        <div class="row">
            <h3>Character List</h3>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('admin.space.add') }}" role="button" class="btn btn-primary">
                    New create
                </a>
            </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="40%">Name</th>
                                <th width="20%">Element</th>
                                <th width="20%">Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lists as $list)
                                <tr>
                                    <th>{{ $list->id }}</th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>