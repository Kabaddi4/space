@extends('layouts.admin')
@section('title', 'Top Page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Character List</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('admin.space.add') }}" role="button" class="btn btn-outline-dark">
                    New create
                </a>
            </div>
            <div class="col-md-8">
                <form action="{{ route('admin.space.index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_name" value="{{ $cond_name }}">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">Name</th>
                                <th width="30%">Element</th>
                                <th width="30%">Role</th>
                                <th width="30%">Edit</th>
                                <th width="20%"></th>
                                <th width="20%">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lists as $list)
                            <tr>
                                <td><a href="{{ route('admin.space.show', ['id' => $list->id]) }}">{{ Str::limit($list->name, 15) }}</a></td>
                                <td>{{ Str::limit($list->element, 10) }}</td>
                                <td>{{ Str::limit($list->role, 10) }}</td>
                                <td>
                                    <div>
                                        <a href="{{ route('admin.space.edit', ['id' => $list->id]) }}" class="btn btn-success">Edit</a>
                                    </div>
                                </td>
                                <td></td>
                                <td>
                                    <div>
                                        <a href="{{ route('admin.space.delete', ['id' => $list->id]) }}" class="btn btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="row">
                    <a href="{{ route('admin.space.calculate') }}" class="btn btn-primary">Damage Calculate</a>
                </div>
            </div>
        </div>
    </div>
@endsection
    